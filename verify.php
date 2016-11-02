<?php
include("config.php");

$response=array("msg"=>"Invalid Request","code"=>"INV_REQ");

if(isset($_POST["login"]))
{
	$username=$_POST["username"];
	$password=md5($_POST["password"]);
	$remember=$_POST["remember"];
	$stmt = $conn->stmt_init();
	$sql = 'SELECT `uid` FROM `users` WHERE `username` = ? AND `password` = ?';
	if($stmt->prepare($sql)){
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->bind_result($uid);
		$stmt->store_result();
		if($stmt->num_rows == 1){
			if($stmt->fetch()){
				$last_log=time();
				$log_hash=md5($last_log);
				$sql2 = "UPDATE `users` SET `log_hash` = '$log_hash', `last_log` = '$last_log' WHERE `uid` = '$uid'";
				if(mysqli_query($conn,$sql2)){
					if($remember=="true"){
						setcookie("hash", $log_hash,time()+60*60*24*7);
						setcookie("uid", $uid,time()+60*60*24*7);
					}
					else
					{
						setcookie("hash", $log_hash);
						setcookie("uid", $uid);
					}
					$response["msg"]="Login Successful";
					$response["code"]="LOGIN_SUC";
				}
				else
				{
					$response["msg"]="Unable To Login";
					$response["code"]="LOGIN_ERR_3";
				}
			}
		}
		else
		{
			$response["msg"]="Invalid Credentials";
			$response["code"]="LOGIN_ERR_2";
		}
	}
	else
	{
		$response["msg"]="Unable to Handle Database";
		$response["code"]="LOGIN_ERR_1";
	}

}
else if(isset($_POST["send_new_msg"])){
	$uid=$_COOKIE["uid"];
	$cid=$_POST["cid"];
	$msg=$_POST["msg"];
	$sent_on=time();
	$sql="INSERT INTO `chats_msgs` (`cid`,`uid`,`msg`,`sent_on`) VALUES ('$cid','$uid','$msg','$sent_on')";
	if($conn->query($sql)){
		$mid=$conn->insert_id;
		$sql="UPDATE `chats` SET `last_mid`='$mid' WHERE `cid`='$cid'";
		if(mysqli_query($conn,$sql)){
			$response["msg"]="Message Sent";
			$response["code"]="SEND_NEW_MSG_SUC";
		}
		else
		{
			$response["msg"]="Unable to Send Message";
			$response["code"]="SEND_NEW_MSG_ERR_2";
		}
	}
	else
	{
		$response["msg"]="Unable to Send Message";
		$response["code"]="SEND_NEW_MSG_ERR_1";
	}
}
else if(isset($_POST["update_chats"])){
	$uid=$_COOKIE["uid"];
	$current_cid=$_POST["cid"];
	$last_convo_mid=$_POST["last_convo_mid"];
	$new_current_msgs='';
	$sql="SELECT * FROM `chats_msgs` WHERE cid='$current_cid' AND mid>'$last_convo_mid'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		$picture=0;
		$fname="";
		while($row=$result->fetch_assoc()){
			if($picture==0){
				$picture=GetUserData($row["uid"],"picture");
				$fname=GetUserData($row["uid"],"first_name");
			}
			$last_convo_mid=$row["mid"];
			if($row["uid"]!=$uid){
				$new_current_msgs='<li class="media"><div class="media-left avatar"><img src="build/images/avatars/'.$picture.'.png" alt="" class="media-object img-circle"><span class="status bg-success"></span></div><div class="media-body"><p><strong>'.$fname.'</strong>: '.$row["msg"].'</p><time datetime="2015-12-10T20:50:48+05:30" class="fs-11 text-muted">'.gmdate("h:i A",$row["sent_on"]+19800).' </time></div></li>';
			}
		}
	}
	$sql="SELECT `mid` FROM `chats_msgs` WHERE `cid`='$current_cid' ORDER BY mid DESC LIMIT 1";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$mid=$row["mid"];
			$sql="UPDATE `chats_members` SET `last_seen_mid`='$mid' WHERE `cid`='$current_cid' AND `uid`='$uid'";
			if(mysqli_query($conn,$sql)){}
		}
	}
	$new_msgs=array();
	$sql="SELECT * FROM `chats_members` WHERE `uid`='$uid'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$cid=$row["cid"];
			$last_seen_mid=$row["last_seen_mid"];
			$sql2="SELECT * FROM `chats_msgs` WHERE mid>'$last_seen_mid' AND `cid`='$cid'";
			$result2=$conn->query($sql2);
			$new_msgs[$cid]=$result2->num_rows;
		}
	}
	$sql="SELECT c1.*,c2.* FROM `chats_members` c1, `chats_msgs` c2 WHERE c1.uid='$_COOKIE[uid]' AND c1.cid=c2.cid AND c2.mid>c1.last_seen_mid";
	$result=$conn->query($sql);
	$response["total_new_msgs"]=$result->num_rows;

	$response["msg"]="Chats Updated";
	$response["code"]="UPDATE_CHATS_SUC";
	$response["new_msgs"]=json_encode($new_msgs);
	$response["new_current_msgs"]=$new_current_msgs;
	$response["last_convo_mid"]=$last_convo_mid;

}
else if(isset($_POST["get_convo"])){
	$uid=$_COOKIE["uid"];
	$cid=$_POST["cid"];
	$convo_no_of_users=0;
	$sql="SELECT * FROM `chats` WHERE `cid`='$cid'";
	$result=$conn->query($sql);
	$last_convo_mid=0;
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$convo_title=$row["name"];
			$convo_no_of_users=$row["no_of_users"];
			if(($row["name"]=="Untitled")&&($row["no_of_users"]==2)){
				$sql2="SELECT u.*,c.* FROM `users` u,`chats_members` c WHERE c.cid='$cid' AND c.uid=u.uid AND c.uid!='$uid' LIMIT 1";
				$result2=$conn->query($sql2);
				if($result2->num_rows>0){
					while($row2=$result2->fetch_assoc()){
						$convo_title=$row2["first_name"]." ".$row2["last_name"];
					}
				}
			}
			$convo_msgs="";
			$sql2="SELECT * FROM (SELECT * FROM `chats_msgs` WHERE `cid`='$cid' ORDER BY mid DESC LIMIT 20) tmp ORDER BY tmp.mid ASC";
			$result2=$conn->query($sql2);
			if($result2->num_rows>0){
				while($row2=$result2->fetch_assoc()){
					if($row2["uid"]==$uid){
						$convo_msgs.= '<li class="media other">
								<div class="media-right avatar"><img src="build/images/avatars/'.GetUserData($row2["uid"],"picture").'.png" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
								<div class="media-body">
								  <p>'.$row2["msg"].'</p>
								  <time datetime="2015-12-10T20:50:48+05:30" class="fs-11 text-muted pull-right">'.gmdate("h:i A",$row2["sent_on"]+19800).' <i class="ti-check text-success"></i></time>
								</div>
							  </li>';
					}
					else
					{
						if($last_convo_mid==0){
							$last_convo_mid=$row2["mid"];
						}
						$convo_msgs.= '<li class="media">
								<div class="media-left avatar"><img src="build/images/avatars/'.GetUserData($row2["uid"],"picture").'.png" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
								<div class="media-body">
								  <p><strong>'.GetUserData($row2["uid"],"first_name").'</strong>: '.$row2["msg"].'</p>
								  <time datetime="2015-12-10T20:50:48+05:30" class="fs-11 text-muted">'.gmdate("h:i A",$row2["sent_on"]+19800).' </time>
								</div>
							  </li>';
					}
				}
			}
			else
			{
				$convo_msgs="You haven't started conversation!";
			}
			$response["msg"]="Conversation found";
			$response["code"]="GET_CONVO_SUC";
			$response["convo_title"]=$convo_title;
			$response["convo_msgs"]=$convo_msgs;
			$response["last_convo_mid"]=$last_convo_mid;
			$response["convo_no_of_users"]=$convo_no_of_users;
		}
	}
	else
	{
		$response["msg"]="Conversation not found";
		$response["code"]="GET_CONVO_ERR_1";
	}
}
else if(isset($_POST["create_convo"])){
	$u_uid=$_COOKIE["uid"];
	$uid=$_POST["uid"];
	$create_convo=true;
	$sql="SELECT * FROM `chats` WHERE no_of_users=2";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$sql2="SELECT * FROM `chats_members` WHERE cid='$row[cid]' AND (uid='$uid' OR uid='$u_uid')";
			$result2=$conn->query($sql2);
			if($result2->num_rows==2){
				$create_convo=false;
				break;
			}
		}
	}
	if($create_convo){
		$time=time();
		$sql="INSERT INTO `chats` (`name`,`picture`,`created_on`,`no_of_users`) VALUES ('Untitled','0','$time',2)";
		if(mysqli_query($conn,$sql)){
			$cid=mysqli_insert_id($conn);
			$sql="INSERT INTO `chats_members` (`cid`,`uid`,`joined_on`) VALUES ('$cid','$uid','$time');INSERT INTO `chats_members` (`cid`,`uid`,`joined_on`) VALUES ('$cid','$u_uid','$time')";
			if(mysqli_multi_query($conn,$sql)){
				$response["msg"]="Conversation created";
				$response["code"]="CREATE_CONVO_SUC";
				$response["convo_cid"]=$cid;
				$response["convo_title"]="Untitled";
			}
			else
			{
				$response["msg"]="Database Error";
				$response["code"]="CREATE_CONVO_ERR_3";
			}
		}
		else
		{
			$response["msg"]="Database Error";
			$response["code"]="CREATE_CONVO_ERR_2";
		}
	}
	else
	{
		$response["msg"]="Conversation already exists";
		$response["code"]="CREATE_CONVO_ERR_1";
	}
}
else if(isset($_POST["change_convo_name"])){
	$cid=$_POST["cid"];
	$name=$_POST["convo_name"];
	$sql="SELECT * FROM `chats` WHERE `cid`='$cid'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			if($row["no_of_users"]==2){
				$response["msg"]="Conversation name cannot be changed";
				$response["code"]="CHANGE_CONVO_NAME_ERR_2";
			}
			else
			{
				$sql="UPDATE chats SET name='$name' WHERE cid='$cid'";
				if(mysqli_query($conn,$sql)){
					$response["msg"]="Conversation name updated";
					$response["code"]="CHANGE_CONVO_NAME_SUC";
				}
				else
				{
					$response["msg"]="Conversation name not updated";
					$response["code"]="CHANGE_CONVO_NAME_ERR_3";
				}
			}
		}
	}
	else
	{
		$response["msg"]="Conversation not found";
		$response["code"]="CHANGE_CONVO_NAME_ERR_1";
	}
}
else if(isset($_GET["get_users_list"])){
	$u_uid=$_COOKIE["uid"];
	$cid=$_GET["cid"];
	$sql="SELECT * FROM `chats_members` WHERE `cid`='$cid' AND `uid`!='$u_uid'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$uid=$row["uid"];
		}
		$response=array("options"=>array(),"current_user"=>"");
		$sql="SELECT * FROM users WHERE uid!='$u_uid'";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc()){
			if($row["uid"]==$uid){
				$response["current_user"]=$row["first_name"]." ".$row["last_name"];
			}
			else
			{
				$response["options"][]=$row["first_name"]." ".$row["last_name"];
			}
		}
	}
	else
	{
		$response["msg"]="Conversation not found";
		$response["code"]="GET_USERS_LIST_ERR_1";
		$response["cid"]=$cid;
	}
}

echo json_encode($response);
?>