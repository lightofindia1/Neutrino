<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
/* Setting Local Time */
date_default_timezone_set('asia/kolkata');

/* Connecting to Database */
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "neutrino";
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

/* Defining Functions */
function GenerateCode($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
function TimeAgo ($tm, $rcs = 0) {
  $cur_tm = time(); 
  $dif = $cur_tm - $tm;
  $pds = array('second','minute','hour','day','week','month','year','decade');
  $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);

  for ($v = count($lngh) - 1; ($v >= 0) && (($no = $dif / $lngh[$v]) <= 1); $v--);
    if ($v < 0)
      $v = 0;
  $_tm = $cur_tm - ($dif % $lngh[$v]);

  $no = ($rcs ? floor($no) : round($no)); // if last denomination, round

  if ($no != 1)
    $pds[$v] .= 's';
  $x = $no . ' ' . $pds[$v];

  if (($rcs > 0) && ($v >= 1))
    $x .= ' ' . $this->time_ago($_tm, $rcs - 1);

  return $x." ago";
}
function RestartDB(){
	global $db_host,$db_username,$db_password,$db_name,$conn;
	if(isset($conn)){
		$conn->close();
	}
	$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
}
function GetUserData($uid,$col){
	global $conn;
	$sql="SELECT * FROM `users` WHERE `uid`='$uid'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			return $row[$col];
		}
	}
	else
	{
		return false;
	}
}
function GetConvoName($cid){
	global $conn;
	$uid=$_COOKIE["uid"];
	$name="Untitled";
	$sql="SELECT * FROM `chats` WHERE `cid`='$cid'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$name=$row["name"];
			if(($row["name"]=="Untitled")&&($row["no_of_users"]=="2")){
				$sql2="SELECT u.*,c.* FROM `users` u,`chats_members` c WHERE c.cid='$cid' AND c.uid=u.uid AND c.uid!='$uid'";
				$result2=$conn->query($sql2);
				if($result2->num_rows>0){
					while($row2=$result2->fetch_assoc()){
						$name=$row2["first_name"]." ".$row2["last_name"];
					}
				}
			}

		}
	}
	return $name;
}
function GetConvoPicture($cid){
	global $conn;
	$uid=$_COOKIE["uid"];
	$sql="SELECT * FROM `chats` WHERE `cid`='$cid'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$picture=$row["picture"];
			if(($row["name"]=="Untitled")&&($row["no_of_users"]=="2")){
				$sql2="SELECT u.*,c.* FROM `users` u,`chats_members` c WHERE c.cid='$cid' AND c.uid=u.uid AND c.uid!='$uid'";
				$result2=$conn->query($sql2);
				if($result2->num_rows>0){
					while($row2=$result2->fetch_assoc()){
						$picture=$row2["picture"];
					}
				}
			}

		}
	}
	return $picture;
}
function GetConvoLastMsg($cid){
	global $conn;
	$msg="You haven't started conversation!";
	$sql="SELECT * FROM `chats_msgs` WHERE `cid`='$cid' ORDER BY mid DESC LIMIT 1";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$msg=$row["msg"];
		}
	}
	return $msg;
}
function CountNewMsgs($cid){
	global $conn;
	$uid=$_COOKIE["uid"];
	$sql="SELECT c1.*,c2.* FROM `chats_members` c1, `chats_msgs` c2 WHERE c1.uid='$uid' AND c1.cid=c2.cid AND c1.cid='$cid' AND c2.mid>c1.last_seen_mid";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		return $result->num_rows;
	}
	else
	{
		return "";
	}
}
?>