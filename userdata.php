<?php
if(!isset($conn)){
	include("config.php");
}
$u_uid=$_COOKIE["uid"];
$u_hash=$_COOKIE["hash"];
$sql="SELECT * FROM `users` WHERE `uid`='$u_uid' and `log_hash`='$u_hash'";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$u_fname=$row["first_name"];
		$u_lname=$row["last_name"];
		$u_username=$row["username"];
		$u_email=$row["email"];
		$u_picture="build/images/avatars/".$row["picture"].".png";
	}
}
else
{
	header("location: logout.php");
}
?>