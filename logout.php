<?php
setcookie("hash","",time()-3600);
setcookie("uid","",time()-3600);
header("location: login.php");
?>