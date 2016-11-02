<?php
$codex='<i class="ti-face-sad fs-100"></i>';
$code=0;
$msg="Unknown Error!";
$desc="";
if(isset($_GET["code"])){
	$code=$_GET["code"];
	if($code=="400"){
		$codex='4<i class="ti-face-sad fs-100"></i><i class="ti-face-sad fs-100"></i>';
		$msg="Bad Request!";
		$desc="Your browser sent a request that this server could not understand.";
	}
	else if($code=="401"){
		$codex='4<i class="ti-face-sad fs-100"></i>1';
		$msg="Not Authorized!";
		$desc="The requested resource requires user authentication.";
	}
	else if($code=="403"){
		$codex='4<i class="ti-face-sad fs-100"></i>3';
		$msg="Access Denied!";
		$desc="You don't have permission to access on this server.";
	}
	else if($code=="404"){
		$codex='4<i class="ti-face-sad fs-100"></i>4';
		$msg="Page Not Found!";
		$desc="Sorry! the page you are looking for doesn't exist.";
	}
	else if($code=="500"){
		$codex='5<i class="ti-face-sad fs-100"></i><i class="ti-face-sad fs-100"></i>';
		$msg="Unexpected Error!";
		$desc="An error occurred and your request couldn't be completed.";
	}
	else if($code=="503"){
		$codex='5<i class="ti-face-sad fs-100"></i>3';
		$msg="Service Unavailable!";
		$desc="The service is not available. Please try again later.";
	}
}
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $code." - ".$msg;?> | Neutrino</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="plugins/themify-icons/themify-icons.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="build/css/third-layout.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://--> 
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image: url(build/images/backgrounds/17.jpg)" class="body-bg-full">
    <div class="container page-container">
      <div class="page-content">
        <div class="logo"><img src="build/images/logo/logo-sm-light.png" alt="" width="80"></div>
        <h1 style="font-size: 130px" class="m-0 text-muted fw-300"><?php echo $codex;?></h1>
        <h4 class="fs-16 text-white fw-300"><?php echo $msg;?></h4>
        <p class="text-muted mb-15"><?php echo $desc;?></p><a href="home.php" role="button" style="width: 130px" class="btn btn-primary btn-rounded">Return home</a>
      </div>
    </div>
    
    <!-- Demo Settings end-->
    <!-- jQuery-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>