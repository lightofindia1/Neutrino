<?php
if(isset($_COOKIE["uid"])){
	header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Neutrino</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/toastr/toastr.min.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="build/css/third-layout.css">
	<style>
	.logo{
		margin-top:-60px;
	}
	.logo img{
		border-radius:50%;
		background:#fff;
		border:3px solid #eee;
	}
	input{
		text-align:left !important;
		transition:0.5s linear all;
	}
	input:focus{
		border-bottom:2px solid #055bbd !important;
	}
	</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://--> 
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image: url(build/images/backgrounds/login.png)" class="body-bg-full v2">
    <div class="container page-container">
      <div class="page-content">
        <div class="v2">
          <div class="logo"><img src="build/images/avatars/<?php echo rand(1,12);?>.png" alt="" width="80"></div>
          <form method="post" action="#" class="form-horizontal" id="login">
            <div class="form-group">
			  <div class="col-xs-1" style="padding-top:10px;font-size:20px"><i class="fa fa-user"></i></div>
              <div class="col-xs-10">
                <input type="text" placeholder="Username" class="form-control" id="username" autofocus="autofocus">
              </div>
            </div>
            <div class="form-group">
			  <div class="col-xs-1" style="padding-top:10px;font-size:20px"><i class="fa fa-key"></i></div>
              <div class="col-xs-10">
                <input type="password" placeholder="Password" class="form-control" id="password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <div class="checkbox-inline checkbox-custom pull-left">
                  <input id="remember" type="checkbox" value="remember">
                  <label for="remember" class="checkbox-muted text-muted">Remember me</label>
                </div>
                <div class="pull-right"><a href="forgot.php" class="inline-block form-control-static">Forgot Password?</a></div>
              </div>
            </div>
            <button type="submit" class="btn-lg btn btn-primary btn-rounded btn-block"><i class="fa fa-sign-in"></i> Sign in</button>
          </form>
        </div>
      </div>
    </div>
    
    <!-- jQuery-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/toastr/toastr.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#login").submit(function(){
			var username=$("#username").val();
			var password=$("#password").val();
			var remember="false";
			if($("#remember").is(':checked')){
				remember="true";
			}
			if(username.length<3){
				toastr.remove();
				toastr["error"]("Please enter valid username!", "Invalid Username");
				$("#username").focus();
			}
			else if(password.length<5){
				toastr.remove();
				toastr["error"]("Please enter valid password!", "Invalid Password");
				$("#password").focus();
			}
			else
			{
				$.ajax({
					url:"verify.php",
					type:"POST",
					data:{"login":true,"username":username,"password":password,"remember":remember},
					success:function(response){
						console.log(response);
						try{
							var resp=JSON.parse(response);
							if(resp.code=="LOGIN_SUC"){
								var $_GET = {};
								if(document.location.toString().indexOf('?') !== -1) {
									var query = document.location
												   .toString()
												   // get the query string
												   .replace(/^.*?\?/, '')
												   // and remove any existing hash string (thanks, @vrijdenker)
												   .replace(/#.*$/, '')
												   .split('&');

									for(var i=0, l=query.length; i<l; i++) {
									   var aux = decodeURIComponent(query[i]).split('=');
									   $_GET[aux[0]] = aux[1];
									}
								}
								if ($_GET.hasOwnProperty('redirect')) {
									window.location=$_GET['redirect'];
								}
								else
								{
									window.location="home.php";
								}
							}
							else if(resp.code=="LOGIN_ERR_2")
							{
								toastr.remove();
								toastr["error"]("Please check your credentials!", "Invalid Username/Password");
								$("#username").focus();
							}
							else{
								toastr.remove();
								toastr["error"]("Please try after some time!", "Server Error");
							}
						}
						catch(err){
							toastr.remove();
							toastr["error"](err, "Client Error");
						}
					},
					error:function(response){
						toastr.remove();
						toastr["error"]("Please check your internet connection!", "Network Error");
					}
				});
			}
			return false;
		});
	});
	</script>
  </body>
</html>