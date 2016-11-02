<?php
if(!isset($_COOKIE["uid"])){
	header("location: login.php");
}
include("config.php");
require("userdata.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Neutrino</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="plugins/themify-icons/themify-icons.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="plugins/animo.js/animate-animo.min.css">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="build/css/third-layout.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://--> 
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Header start-->
    <header>
      <div class="search-bar closed">
        <form>
          <div class="input-group input-group-lg">
            <input type="text" placeholder="Search for..." class="form-control"><span class="input-group-btn">
              <button type="button" class="btn btn-default search-bar-toggle"><i class="ti-close"></i></button></span>
          </div>
        </form>
      </div><a href="index-2.html" class="brand pull-left"><img src="build/images/logo/logo-light.png" alt="" width="100" class="logo"><img src="build/images/logo/logo-sm-light.png" alt="" width="28" class="logo-sm"></a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
      <form class="mt-15 mb-15 pull-left hidden-xs">
        <div class="form-group has-feedback mb-0">
          <input type="text" aria-describedby="inputSearchFor" placeholder="Search for..." style="width: 200px" class="form-control rounded"><span aria-hidden="true" class="ti-search form-control-feedback"></span><span id="inputSearchFor" class="sr-only">(default)</span>
        </div>
      </form>
      <ul class="notification-bar list-inline pull-right">
        <li class="visible-xs"><a href="javascript:;" role="button" class="header-icon search-bar-toggle"><i class="ti-search"></i></a></li>
        <li class="dropdown"><a id="dropdownMenu1" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon"><i class="ti-world"></i><span class="badge bg-danger">6</span></a>
          <div aria-labelledby="dropdownMenu1" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">
            <h5 class="dropdown-header">You have 6 notifications</h5>
            <ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="build/images/users/17.jpg" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">William Carlson</h6>
                    <p class="text-muted mb-0">Commented on your post</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">5 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="build/images/users/19.jpg" alt="" class="media-object img-circle"><span class="status bg-danger"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Barbara Ortega</h6>
                    <p class="text-muted mb-0">Sent you a new email</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">8 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="build/images/users/02.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Mark Barnett</h6>
                    <p class="text-muted mb-0">Sent you a new message</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:50:48+07:00" class="fs-11">9 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="build/images/users/11.jpg" alt="" class="media-object img-circle"><span class="status bg-danger"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Alexander Gilbert</h6>
                    <p class="text-muted mb-0">Sent you a new email</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">15 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="build/images/users/12.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Amanda Collins</h6>
                    <p class="text-muted mb-0">You have 8 unread messages</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:35:35+07:00" class="fs-11">22 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="build/images/users/13.jpg" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Christian Lane</h6>
                    <p class="text-muted mb-0">Commented on your post</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">30 mins</time>
                  </div></a></li>
            </ul>
            <div class="dropdown-footer text-center p-10"><a href="javascript:;" class="fw-500 text-muted">See all notifications</a></div>
          </div>
        </li>
        <li class="dropdown hidden-xs"><a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
            <div class="media mt-0">
              <div class="media-left avatar"><img src="<?php echo $u_picture;?>" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
              <div class="media-right media-middle pl-0">
                <p class="fs-12 text-base mb-0">Hi, <?php echo $u_fname; ?></p>
              </div>
            </div></a>
          <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
            <li><a href="profile.html"><i class="ti-user mr-5"></i> My Profile</a></li>
            <li><a href="profile.html"><i class="ti-settings mr-5"></i> Settings</a></li>
            <li><a href="login-v2.html"><i class="ti-power-off mr-5"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Header end-->
    <div class="main-container">
      <!-- Main Sidebar start-->
      <aside class="main-sidebar">
        <div class="user">
          <div id="esp-user-profile" data-percent="90" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart"><img src="<?php echo $u_picture;?>" alt="" class="avatar img-circle"><span class="status bg-success"></span></div>
          <h4 class="fs-16 text-white mt-15 mb-5 fw-300"><?php echo $u_fname." ".$u_lname;?></h4>
          <p class="mb-0 text-muted">Designer</p>
        </div>
        <ul class="list-unstyled navigation mb-0">
          <li class="sidebar-category">Main</li>
          <li class="panel"><a href="home.php" class="active"><i class="ti-home"></i><span class="sidebar-title">Home</span></a></li>
          <li class="panel"><a href="chats.php" class="bubble"><i class="ti-comments"></i><span class="sidebar-title">Chats</span><span class="badge bg-danger">2</span></a></li>
          <li class="panel"><a href="cv.php"><i class="ti-id-badge"></i><span class="sidebar-title">CV Designer </span><span class="label label-outline label-danger">New</span></a></li>
          <li class="panel"><a href="projects.php"><i class="ti-briefcase"></i><span class="sidebar-title">Projects </span></a></li>
          <li class="panel"><a href="kzone.php"><i class="ti-blackboard"></i><span class="sidebar-title">Knowledge Zone </span></a></li>
          <li class="panel"><a href="settings.php"><i class="ti-settings"></i><span class="sidebar-title">Settings </span></a></li>
          <li class="panel"><a href="suggestions.php"><i class="ti-light-bulb"></i><span class="sidebar-title">Suggestion Box </span></a></li>
          <li class="panel"><a href="logout.php"><i class="ti-power-off"></i><span class="sidebar-title">Logout </span></a></li>
		</ul>
      </aside>
      <!-- Main Sidebar end-->
      <div class="page-container">
        <div class="page-header clearfix">
          <div class="row">
            <div class="col-sm-8">
				  <div class="row">
					<div class="col-md-6 col-sm-6">
					  <div class="widget text-center">
						<div class="widget-body">
						  <div class="clearfix">
							<div class="pull-left"><a href="javascript:;" class="widget-reload"><i class="ti-control-record text-muted"></i></a></div>
							<div class="pull-right"><a href="javascript:;" class="widget-remove"><i class="ti-trash text-muted"></i></a></div>
						  </div>
						  <h5 class="mb-5">New Comments</h5>
						  <div class="fs-36 fw-600 mb-20 counter">1,206</div>
						  <div id="esp-comment" data-percent="75" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-comment-alt text-muted"></i></div>
						  <div class="clearfix mt-20">
							<div class="pull-left">
							  <div class="fs-12">Today</div>
							  <div class="text-success">+2.43%</div>
							</div>
							<div class="pull-right">
							  <div class="fs-12">Yesterday</div>
							  <div class="text-danger">-1.02%</div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-6 col-sm-6">
					  <div class="widget text-center">
						<div class="widget-body">
						  <div class="clearfix">
							<div class="pull-left"><a href="javascript:;" class="widget-reload"><i class="ti-control-record text-muted"></i></a></div>
							<div class="pull-right"><a href="javascript:;" class="widget-remove"><i class="ti-trash text-muted"></i></a></div>
						  </div>
						  <h5 class="mb-5">New Photos</h5>
						  <div class="fs-36 fw-600 mb-20 counter">350</div>
						  <div id="esp-photo" data-percent="55" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-image text-muted"></i></div>
						  <div class="clearfix mt-20">
							<div class="pull-left">
							  <div class="fs-12">Today</div>
							  <div class="text-danger">-0.23%</div>
							</div>
							<div class="pull-right">
							  <div class="fs-12">Yesterday</div>
							  <div class="text-success">+1.02%</div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
					  <div class="widget text-center">
						<div class="widget-body">
						  <div class="clearfix">
							<div class="pull-left"><a href="javascript:;" class="widget-reload"><i class="ti-control-record text-muted"></i></a></div>
							<div class="pull-right"><a href="javascript:;" class="widget-remove"><i class="ti-trash text-muted"></i></a></div>
						  </div>
						  <h5 class="mb-5">New Users</h5>
						  <div class="fs-36 fw-600 mb-20 counter">890</div>
						  <div id="esp-user" data-percent="30" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-user text-muted"></i></div>
						  <div class="clearfix mt-20">
							<div class="pull-left">
							  <div class="fs-12">Today</div>
							  <div class="text-success">+0.09%</div>
							</div>
							<div class="pull-right">
							  <div class="fs-12">Yesterday</div>
							  <div class="text-danger">-0.02%</div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-md-6 col-sm-6">
					  <div class="widget text-center">
						<div class="widget-body">
						  <div class="clearfix">
							<div class="pull-left"><a href="javascript:;" class="widget-reload"><i class="ti-control-record text-muted"></i></a></div>
							<div class="pull-right"><a href="javascript:;" class="widget-remove"><i class="ti-trash text-muted"></i></a></div>
						  </div>
						  <h5 class="mb-5">New Feedbacks</h5>
						  <div class="fs-36 fw-600 mb-20 counter">1,609</div>
						  <div id="esp-feedback" data-percent="20" style="height: 140px; width: 140px; line-height: 120px; padding: 10px;" class="easy-pie-chart fs-36"><i class="ti-receipt text-muted"></i></div>
						  <div class="clearfix mt-20">
							<div class="pull-left">
							  <div class="fs-12">Today</div>
							  <div class="text-success">+3.29%</div>
							</div>
							<div class="pull-right">
							  <div class="fs-12">Yesterday</div>
							  <div class="text-success">+2.32%</div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
            </div>
			<div class="col-sm-4">
				<div class="row" style="text-align:left">
					<div class="widget no-border p-30 bg-danger">
						<div class="media">
						  <div class="media-left media-middle pr-20"><i class="ti-alarm-clock fs-60"></i></div>
						  <div class="media-body media-middle">
							<div class="fw-300" id="clock" style="font-size:42px"><?php echo gmdate("H:i:s",time()+(5.5*60*60));?></div>
							<p class="mb-0 fs-20"><?php echo gmdate("D d M Y",time()+(5.5*60*60));?></p>
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="widget no-border p-30 bg-primary">
						<div class="media">
						  <div class="media-left media-middle pr-20"><i class="ti-settings fs-100"></i></div>
						  <div class="media-body">
							<ul class="list-unstyled fs-12 mb-0">
							  <li class="pt-5 pb-5">
								<div class="block clearfix mb-5"><span class="pull-left">CPU Usage</span><span class="pull-right">36.45 %</span></div>
								<div class="progress progress-xs bg-light mb-0">
								  <div role="progressbar" data-transitiongoal="65" class="progress-bar progress-bar-white"></div>
								</div>
							  </li>
							  <li class="pt-5 pb-5">
								<div class="block clearfix mb-5"><span class="pull-left">Physical Memory</span><span class="pull-right">1.76 GB</span></div>
								<div class="progress progress-xs bg-light mb-0">
								  <div role="progressbar" data-transitiongoal="80" class="progress-bar progress-bar-white"></div>
								</div>
							  </li>
							  <li class="pt-5 pb-5">
								<div class="block clearfix mb-5"><span class="pull-left">Swap Memory</span><span class="pull-right">0.94 GB</span></div>
								<div class="progress progress-xs bg-light mb-0">
								  <div role="progressbar" data-transitiongoal="80" class="progress-bar progress-bar-white"></div>
								</div>
							  </li>
							</ul>
						  </div>
						</div>
					  </div>
				</div>
				<div class="row" style="text-align:left;">
					<div class="widget">
						<div class="widget-heading">
						  <h3 class="widget-title">Recent Activities</h3>
						</div>
						<div class="widget-body">
						  <ul class="activity-list activity-sm list-unstyled mb-0">
							<li class="activity-purple">
							  <time datetime="2015-12-10T20:50:48+07:00" class="fs-12 text-muted">9 minutes ago</time>
							  <p class="mt-10 mb-0">You <span class="label label-success">recommended</span> Karen Ortega</p>
							</li>
							<li class="activity-danger">
							  <time datetime="2015-12-10T20:42:40+07:00" class="fs-12 text-muted">15 minutes ago</time>
							  <p class="mt-10 mb-0">You followed Olivia Williamson</p>
							</li>
							<li class="activity-warning">
							  <time datetime="2015-12-10T20:35:35+07:00" class="fs-12 text-muted">22 minutes ago</time>
							  <p class="mt-10 mb-0">You <span class="text-danger">subscribed</span> to Harold Fuller</p>
							</li>
							<li class="activity-success">
							  <time datetime="2015-12-10T20:27:48+07:00" class="fs-12 text-muted">30 minutes ago</time>
							  <p class="mt-10 mb-0">You updated your profile picture</p>
							</li>
						  </ul>
						</div>
					  </div>
				</div>
			</div>
          </div>
        </div>
        <div class="page-content container-fluid"></div>
        <div class="footer">2017 &copy;  <a href="https://www.neutrino.cf">Neutrino</a> by <a href="http://www.manikiran.tk" target="_blank">Manikiran.</a></div>
      </div>
      
    </div>
    <!-- jQuery-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Malihu Scrollbar-->
    <script type="text/javascript" src="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Animo.js-->
    <script type="text/javascript" src="plugins/animo.js/animo.min.js"></script>
    <!-- Bootstrap Progressbar-->
    <script type="text/javascript" src="plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script type="text/javascript" src="plugins/blockUI/jquery.blockUI.js"></script>
    <!-- jQuery Counter Up-->
    <script type="text/javascript" src="plugins/jquery-waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="plugins/Counter-Up/jquery.counterup.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="build/js/third-layout/app.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$("#esp-user-profile").easyPieChart({barColor:"#0667D6",trackColor:"rgba(0,0,0,0)",scaleColor:!1,scaleLength:0,lineCap:"round",lineWidth:3,size:130,animate:{duration:2e3,enabled:!0}});
		$(".counter").counterUp({delay:10,time:1e3});
		$("#esp-comment").easyPieChart({barColor:"#8E23E0",trackColor:"#E6E6E6",scaleColor:!1,scaleLength:0,lineCap:"round",lineWidth:10,size:140,animate:{duration:2e3,enabled:!0}});
		$("#esp-photo").easyPieChart({barColor:"#0667D6",trackColor:"#E6E6E6",scaleColor:!1,scaleLength:0,lineCap:"round",lineWidth:10,size:140,animate:{duration:2e3,enabled:!0}});
		$("#esp-user").easyPieChart({barColor:"#17A88B",trackColor:"#E6E6E6",scaleColor:!1,scaleLength:0,lineCap:"round",lineWidth:10,size:140,animate:{duration:2e3,enabled:!0}});
		$("#esp-feedback").easyPieChart({barColor:"#E5343D",trackColor:"#E6E6E6",scaleColor:!1,scaleLength:0,lineCap:"round",lineWidth:10,size:140,animate:{duration:2e3,enabled:!0}});
		var date=new Date();
		function addZero(i){
			if (String(i).length<2)
			{
				return "0"+String(i);
			}
			else
			{
				return String(i);
			}
		}
		var timer=setInterval(function(){
			date=new Date();
			$("#clock").html(addZero(date.getHours())+":"+addZero(date.getMinutes())+":"+addZero(date.getSeconds()));
		},1000);
		timer;
	});
	</script>
  </body>
</html>