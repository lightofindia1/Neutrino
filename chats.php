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
    <title>Chats | Neutrino</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plugins/toastr/toastr.min.css">
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
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput-typeahead.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="build/css/third-layout.css">
	<style>
	.text-left{
		text-align:left !important;
	}
	.cursor-pointer{
		cursor:pointer !important;
	}
	.chat-list-bg{
		padding:10px !important;
		background:#efefef;
	}
	.chat-bg{
		background:#fcfcfc;
		padding-bottom:20px;
	}
	.chat-bg .chat-content{
		margin:10px;
		min-height:450px;
		max-height:450px;
		overflow:auto;
	}
	.chat-list{
		margin:10px;
		min-height:510px;
		max-height:510px;
		overflow:auto;
	}
	.chat-list li .active{
		background-color: #fafafa;
	}
	.chat-bg .media{
		width:100%;
	}
	.chat-bg .media .media-body{
		width:auto;
	}
	.chat-bg .other .media-body{
		float:right;
	}
	.chat-bg .other .avatar{
		float:right;
	}
	.chat-settings{
		left:-135px !important;
	}
	</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://--> 
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="preloader-screen"><div class="preloader"></div></div>
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
            <li><a href="profile.php"><i class="ti-user mr-5"></i> My Profile</a></li>
            <li><a href="settings.php"><i class="ti-settings mr-5"></i> Settings</a></li>
            <li><a href="logout.php"><i class="ti-power-off mr-5"></i> Logout</a></li>
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
          <li class="panel"><a href="home.php"><i class="ti-home"></i><span class="sidebar-title">Home</span></a></li>
          <li class="panel"><a href="chats.php" class="active bubble"><i class="ti-comments"></i><span class="sidebar-title">Chats</span><span class="badge bg-danger" id="total_new_msgs"><?php
		  $sql="SELECT c1.*,c2.* FROM `chats_members` c1, `chats_msgs` c2 WHERE c1.uid='$u_uid' AND c1.cid=c2.cid AND c2.mid>c1.last_seen_mid";
		  $result=$conn->query($sql);
		  if($result->num_rows>0){echo $result->num_rows;}
		  ?></span></a></li>
          <li class="panel"><a href="cv.php"><i class="ti-id-badge"></i><span class="sidebar-title">CV Designer </span><span class="label label-outline label-danger">New</span></a></li>
          <li class="panel"><a href="ideas.php"><i class="ti-light-bulb"></i><span class="sidebar-title">Ideas </span></a></li>
          <li class="panel"><a href="projects.php"><i class="ti-briefcase"></i><span class="sidebar-title">Projects </span></a></li>
          <li class="panel"><a href="kzone.php"><i class="ti-blackboard"></i><span class="sidebar-title">Knowledge Zone </span></a></li>
          <li class="panel"><a href="settings.php"><i class="ti-settings"></i><span class="sidebar-title">Settings </span></a></li>
          <li class="panel"><a href="logout.php"><i class="ti-power-off"></i><span class="sidebar-title">Logout </span></a></li>
		</ul>
      </aside>
      <!-- Main Sidebar end-->
      <div class="page-container">
        <div class="page-header clearfix">
          <div class="row">
            <div class="col-sm-4 chat-list-bg">
				<div id="chat" role="tabpanel" class="tab-pane fade in active">
					<form>
					  <div class="form-group has-feedback" id="chat_search">
						<input type="text" aria-describedby="inputChatSearch" placeholder="Chat with..." class="form-control rounded"><span aria-hidden="true" class="ti-search form-control-feedback"></span><span id="inputChatSearch" class="sr-only">(default)</span>
					  </div>
					</form>
					<ul class="chat-list mb-0 fs-12 media-list mCustomScrollbar">
					  <?php
					  $f_cid=0;
					  $convo_no_of_users=0;
					  $sql="SELECT * FROM `chats_members` WHERE `uid`='$u_uid'";
					  $result=$conn->query($sql);
					  if($result->num_rows>0){
						  while($row=$result->fetch_assoc()){
								$cid=$row["cid"];
								if(!$f_cid){$f_cid=$cid;}
								$sql2="SELECT * FROM `chats` WHERE `cid`='$cid' ORDER BY `last_mid`";
								$result2=$conn->query($sql2);
								while($row2=$result2->fetch_assoc()){
									if(!$convo_no_of_users){$convo_no_of_users=$row2["no_of_users"];}
									echo '<li class="media">
											<a href="javascript:;" class="conversation-toggle ';if($f_cid==$cid){echo "active";}echo '" id="convo_cid_'.$cid.'">
												<div class="media-left avatar">
													<img src="build/images/avatars/'.GetConvoPicture($cid).'.png" alt="" class="media-object img-circle">
													<span class="status bg-success"></span>
												</div>
												<div class="media-body">
													<h6 class="media-heading" id="convo_title_'.$cid.'">'.GetConvoName($cid).'</h6>
													<p class="text-muted mb-0">';$ls=substr(GetConvoLastMsg($cid),0,20);echo $ls;if(strlen($ls)==20){echo "...";} echo '</p>
												</div>
												<div class="media-right"><span class="badge bg-danger" id="new_msgs_count_'.$cid.'">'.CountNewMsgs($cid).'</span></div>
											 </a>
										  </li>';
								}
						  }
					  }
					  $sql="SELECT * FROM `users` WHERE uid!='$u_uid'";
					  $result=$conn->query($sql);
					  if($result->num_rows>0){
							while($row=$result->fetch_assoc()){
								$show_user=true;
								$sql2="SELECT * FROM `chats` WHERE no_of_users=2";
								$result2=$conn->query($sql2);
								if($result2->num_rows>0){
									while($row2=$result2->fetch_assoc()){
										$sql3="SELECT * FROM `chats_members` WHERE cid='$row2[cid]' AND (uid='$row[uid]' OR uid='$u_uid')";
										$result3=$conn->query($sql3);
										if($result3->num_rows==2){
											$show_user=false;
											break;
										}
									}
								}
								if($show_user){
								echo '<li class="media">
										<a href="javascript:;" class="conversation-toggle" id="convo_uid_0_'.$row["uid"].'">
											<div class="media-left avatar">
												<img src="build/images/avatars/'.$row["picture"].'.png" alt="" class="media-object img-circle">
												<span class="status bg-success"></span>
											</div>
											<div class="media-body">
												<h6 class="media-heading" id="convo_title_0_'.$row["uid"].'">'.$row["first_name"].' '.$row["last_name"].'</h6>
												<p class="text-muted mb-0">You haven\'t started conversation!</p>
											</div>
											<div class="media-right"><span class="badge bg-danger" id="new_msgs_count_0"></span></div>
										 </a>
									  </li>';
								}
							}
					  }
					  ?>
					  
					</ul>
				  </div>
            </div>
			<div class="col-sm-8 chat-bg hidden-xs <?php if(!$f_cid){ echo 'hidden';}?> text-left">
				<h5 class="text-center m-0 p-20">
					<span id="convo_title"><?php $f_name=GetConvoName($f_cid);echo $f_name;?></span>
					<div class="pull-right">
						<button class="btn btn-success btn-rounded btn-outline btn-sm"><i class="ti-headphone-alt"></i></button> 
						<button class="btn btn-success btn-rounded btn-outline btn-sm"><i class="ti-video-camera"></i></button>
						<button class="btn btn-default btn-sm" id="add_users_btn"><i class="ti-plus"></i></button> 
						<div class="btn-group mr-10">
							<button data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary btn-sm dropdown-toggle"><i class="ti-settings"></i> <span class="caret"></span></button>
							<ul class="dropdown-menu chat-settings">
							  <li><a href="javascript:;" class="convo_edit_name">Edit Name</a></li>
							  <li><a href="#">Change Picture</a></li>
							  <li><a href="#">Group Info</a></li>
							  <li role="separator" class="divider"></li>
							  <li><a href="#">Leave Conversation</a></li>
							</ul>
						</div>
					</div>
				</h5>
				<ul class="media-list chat-content fs-12 pl-20 pr-20" id="open_chat_ul">
				  <?php
				  $last_convo_mid=0;
				  $sql="SELECT * FROM `chats_msgs` WHERE `cid`='$f_cid' ORDER BY mid";
				  $result=$conn->query($sql);
				  if($result->num_rows>0){
						while($row=$result->fetch_assoc()){
							if($row["uid"]==$u_uid){
								echo '<li class="media other" id="chat_msg_'.$row["mid"].'">
										<div class="media-right avatar"><img src="'.$u_picture.'" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
										<div class="media-body">
										  <p>'.$row["msg"].'</p>
										  <time datetime="2015-12-10T20:50:48+05:30" class="fs-11 text-muted pull-right">'.gmdate("h:i A",$row["sent_on"]+19800).' <i class="ti-check text-success"></i></time>
										</div>
									  </li>';
							}
							else
							{
								$last_convo_mid=$row["mid"];
								echo '<li class="media" id="chat_msg_'.$row["mid"].'">
										<div class="media-left avatar"><img src="build/images/avatars/'.GetUserData($row["uid"],"picture").'.png" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
										<div class="media-body">
										  <p><strong>'.GetUserData($row["uid"],"first_name").'</strong>: '.$row["msg"].'</p>
										  <time datetime="2015-12-10T20:50:48+05:30" class="fs-11 text-muted">'.gmdate("h:i A",$row["sent_on"]+19800).' </time>
										</div>
									  </li>';
							}
						}
				  }
				  else
				  {
					  echo "<p align='center'>You haven't started conversation!</p>";
				  }
				  ?>
				</ul>
				<form class="pl-20 pr-20" id="chat_reply" autocomplete="off">
				  <div class="form-group has-feedback mb-0">
					<div class="row">
						<div class="col-xs-11">
							<input type="text" aria-describedby="inputSendMessage" placeholder="Send a message" class="form-control rounded" id="chat_msg">
						</div>
						<div class="col-xs-1 text-left">
							<button class="btn btn-primary"><i class="ti-pencil-alt"></i></button>
						</div>
						<input type="hidden" id="current_chat_open" value="<?php echo $f_cid;?>">
						<input type="hidden" id="last_convo_mid" value="<?php echo $last_convo_mid;?>">
						<input type="hidden" id="convo_no_of_users" value="<?php echo $convo_no_of_users;?>">
					</div>
				  </div>
				</form>
			</div>
          </div>
        </div>
        <div class="page-content container-fluid"></div>
        <div class="footer">2017 &copy;  <a href="https://www.neutrino.cf">Neutrino</a> by <a href="http://www.manikiran.tk" target="_blank">Manikiran.</a></div>
      </div>
      
    </div>
	<!-- Modals -->
	<div tabindex="-1" role="dialog" aria-labelledby="EditNameModalLabel" class="modal animated fadeInLeft" id="convo_edit_name">
		<div role="document" class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
			  <h4 id="EditNameModalLabel" class="modal-title">Edit Conversation Name</h4>
			</div>
			<div class="modal-body">
			  <div class="form-group">
				  <label for="edit_convo_name">Conversation Name</label>
				  <input id="edit_convo_name" type="text" placeholder="Enter name" class="form-control" value="" maxlength="50">
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" data-dismiss="modal" class="btn btn-raised btn-default">Close</button>
			  <button type="button" class="btn btn-raised btn-black" id="save_convo_name">Save changes</button>
			</div>
		  </div>
		</div>
	  </div>
	<div tabindex="-1" role="dialog" aria-labelledby="CreateGroupModalLabel" class="modal animated fadeInLeft" id="create_new_group">
		<div role="document" class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
			  <h4 id="CreateGroupModalLabel" class="modal-title">Create Group</h4>
			</div>
			<div class="modal-body">
			  <div class="form-group">
				  <label for="cg_convo_name">Conversation Name</label>
				  <input id="cg_convo_name" type="text" placeholder="Enter name" class="form-control" value="" maxlength="50">
			  </div>
			  <div class="form-group">
				  <label for="cg_convo_members">Add Members</label>
				  <input id="cg_convo_members" type="text" placeholder="Enter name" class="form-control" value="" autocomplete="off" data-provide="typeahead">
			  </div>
			</div>
			<div class="modal-footer">
			  <button type="button" data-dismiss="modal" class="btn btn-raised btn-default">Close</button>
			  <button type="button" class="btn btn-raised btn-black" id="cg_submit">Create</button>
			</div>
		  </div>
		</div>
	  </div>
	<div tabindex="-1" role="dialog" aria-labelledby="AddUsersToGroupModalLabel" class="modal animated fadeInLeft" id="add_users_to_group">
		<div role="document" class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="ti-close"></i></span></button>
			  <h4 id="AddUsersToGroupModalLabel" class="modal-title">Add Members to Group</h4>
			</div>
			<div class="modal-body">
			  <div class="form-group">
				  <label for="autg_convo_members">Add Members</label>
				  <input id="autg_convo_members" type="text" placeholder="Enter name" class="form-control" value="">
			  </div>
			</div>
			<div class="modal-footer">
			  <button type="button" data-dismiss="modal" class="btn btn-raised btn-default">Close</button>
			  <button type="button" class="btn btn-raised btn-black" id="cg_submit">Create</button>
			</div>
		  </div>
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
	<script type="text/javascript" src="plugins/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- Bootstrap Tags Input-->
    <script type="text/javascript" src="plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Typeahead-->
    <script type="text/javascript" src="plugins/typeahead.js/dist/typeahead.jquery.min.js"></script>
    <script type="text/javascript" src="plugins/typeahead.js/dist/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="plugins/typeahead.js/dist/bloodhound.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="build/js/third-layout/app.js"></script>
    <script type="text/javascript" src="plugins/toastr/toastr.min.js"></script>
	<script>
	toastr.options.timeOut = 30000;
	function formatAMPM(date) {
	  var hours = date.getHours();
	  var minutes = date.getMinutes();
	  var ampm = hours >= 12 ? 'PM' : 'AM';
	  hours = hours % 12;
	  hours = hours ? hours : 12; // the hour '0' should be '12'
	  hours = hours < 10 ? '0'+hours : hours;
	  minutes = minutes < 10 ? '0'+minutes : minutes;
	  var strTime = hours + ':' + minutes + ' ' + ampm;
	  return strTime;
	}
	function chk_scroll(e)
	{
		var elem = $(e.currentTarget);
		if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) 
		{
			alert("bottom");
		}

	}
	$(document).ready(function(){
		//$("#cg_convo_members").tagsinput('items');
		var chatDiv = document.getElementById("open_chat_ul");
		chatDiv.scrollTop = chatDiv.scrollHeight;
		var u_picture="<?php echo $u_picture;?>";
		var tick_count=1;
		$("#chat_reply").submit(function(){
			var msg=$("#chat_msg").val();
			var cid=$("#current_chat_open").val();
			if(msg.length<1){
				$("#chat_msg").focus();
			}
			else
			{
				var date=new Date();
				tick_count+=1;
				if($("#open_chat_ul").html()=="You haven't started conversation!"){$("#open_chat_ul").html("");}
				$("#open_chat_ul").append('<li class="media other"><div class="media-right avatar"><img src="'+u_picture+'" alt="" class="media-object img-circle"><span class="status bg-success"></span></div><div class="media-body"><p>'+msg+'</p><time datetime="2015-12-10T20:50:48+05:30" class="fs-11 text-muted pull-right">'+formatAMPM(date)+' <i class="ti-time text-success" id="tick_count_'+tick_count+'"></i></time></div></li>');
				$("#chat_msg").val("").focus();
				chatDiv.scrollTop = chatDiv.scrollHeight;
				$.ajax({
					url:"verify.php",
					type:"POST",
					data:{"send_new_msg":true,"msg":msg,"cid":cid},
					success:function(response){
						try{
							var resp=JSON.parse(response);
							if(resp.code=="SEND_NEW_MSG_SUC"){
								$('#tick_count_'+tick_count).removeClass("ti-time").addClass("ti-check");
							}
							else
							{
								toastr.remove();
								toastr["error"]("Please check your internet connection!", "Message Not Sent");
							}
						}
						catch(err){
							toastr.remove();
							toastr["error"]("Please check your internet connection!", "Message Not Sent");
						}
					},
					error:function(response){
						toastr.remove();
						toastr["error"]("Please check your internet connection!", "Message Not Sent");
					}
				});
			}
			return false;
		});
		var UpdateChat=setInterval(function(){
			var current_cid=$("#current_chat_open").val();
			var last_convo_mid=$("#last_convo_mid").val();
			$.ajax({
				url:"verify.php",
				type:"POST",
				data:{"update_chats":true,"cid":current_cid,"last_convo_mid":last_convo_mid},
				success:function(response){
					try{
						var resp=JSON.parse(response);
						if(resp.code=="UPDATE_CHATS_SUC"){
							$("#last_convo_mid").val(resp.last_convo_mid);
							if(resp.total_new_msgs>0){
								$("#total_new_msgs").html(resp.total_new_msgs);
							}
							else
							{
								$("#total_new_msgs").html("");
							}
							if(resp.new_current_msgs){
								$("#open_chat_ul").append(resp.new_current_msgs);
								var chatDiv = document.getElementById("open_chat_ul");
								chatDiv.scrollTop = chatDiv.scrollHeight;
							}
							var cids=JSON.parse(resp.new_msgs);
							for (var cid in cids) {
							  if (cids.hasOwnProperty(cid)) {
								var count = cids[cid];
								if(count>0){
									$("#new_msgs_count_"+cid).html(count);
								}
								else
								{
									$("#new_msgs_count_"+cid).html("");
								}
							  }
							}
						}
					}
					catch(err){}
				},
				error:function(response){},
				complete:function(x,y){
					$('[id]').each(function() {
						var $ids = $('[id=' + this.id + ']');
						if ($ids.length > 1) {
							$ids.not(':first').remove();
						}
					});
				}
			});
		},2000);

		$("body").on("click",".conversation-toggle",function(){
			var cid=this.id.split("_")[2];
			var current_cid=$("#current_chat_open").val();
			if(cid==0){
				uid=this.id.split("_")[3];
				$.ajax({
					url:"verify.php",
					type:"POST",
					data:{"create_convo":true,"uid":uid},
					success:function(response){
						try{
							var resp=JSON.parse(response);
							if(resp.code=="CREATE_CONVO_SUC"){
								$("#convo_cid_"+current_cid).removeClass("active");
								$("#convo_uid_0_"+uid).attr('id','convo_cid_'+resp.convo_cid);
								$("#convo_title_0_"+uid).attr('id','convo_title_'+resp.convo_cid);
								$("#convo_title").html($("#convo_title_"+resp.convo_cid).html());
								$("#convo_cid_"+resp.convo_cid).addClass("active");
								$("#convo_no_of_users").val("2");
								$("#current_chat_open").val(resp.convo_cid);
								$("#open_chat_ul").html("You haven't started conversation!");
								$("#last_convo_mid").val("0");
								var chatDiv = document.getElementById("open_chat_ul");
								chatDiv.scrollTop = chatDiv.scrollHeight;
								if(resp.new_current_msgs){
									$("#open_chat_ul").append(resp.new_current_msgs);
								}
								localStorage.setItem("current_mids",[]);
							}
							else
							{
								toastr.remove();toastr["error"]("Please check your internet connection!", "Unable to load chats");
							}
						}
						catch(err){
							toastr.remove();toastr["error"]("Please check your internet connection!", "Unable to load chats");
						}
					},
					error:function(response){
						toastr.remove();toastr["error"]("Please check your internet connection!", "Unable to load chats");
					}
				});
			}
			else
			{
				$.ajax({
					url:"verify.php",
					type:"POST",
					data:{"get_convo":true,"cid":cid},
					success:function(response){
						try{
							var resp=JSON.parse(response);
							if(resp.code=="GET_CONVO_SUC"){
								$("#convo_title").html(resp.convo_title);
								$("#convo_cid_"+current_cid).removeClass("active");
								$("#convo_cid_"+cid).addClass("active");
								$("#current_chat_open").val(cid);
								$("#convo_no_of_users").val(resp.convo_no_of_users);
								$("#open_chat_ul").html(resp.convo_msgs);
								$("#last_convo_mid").val(resp.last_convo_mid);
								var chatDiv = document.getElementById("open_chat_ul");
								chatDiv.scrollTop = chatDiv.scrollHeight;
								if(resp.new_current_msgs){
									$("#open_chat_ul").append(resp.new_current_msgs);
								}
								localStorage.setItem("current_mids",resp.current_mids);
							}
							else
							{
								toastr.remove();toastr["error"]("Please check your internet connection!", "Unable to load chats");
							}
						}
						catch(err){
							toastr.remove();toastr["error"]("Please check your internet connection!", "Unable to load chats");
						}
					},
					error:function(response){
							toastr.remove();toastr["error"]("Please check your internet connection!", "Unable to load chats");
					}
				});
			}
		});
		$(".convo_edit_name").click(function(){
			if($("#convo_no_of_users").val()=="2"){
				toastr.remove();
				toastr["error"]("Private chats cannot be renamed!", "Change of Name Denied");
			}
			else
			{
				$("#edit_convo_name").val($("#convo_title_"+$("#current_chat_open").val()).html());
				$("#edit_convo_name").maxlength({alwaysShow:!0,threshold:10,warningClass:"label label-info",limitReachedClass:"label label-warning"})
				$("#convo_edit_name").modal("show");
			}
		});
		$("#save_convo_name").click(function(){
			toastr.remove();
			var cid=$("#current_chat_open").val();
			var convo_name=$("#edit_convo_name").val();
			var convo_no_of_users=$("#convo_no_of_users").val();
			if(convo_no_of_users=="2"){
				toastr["error"]("Private chats cannot be renamed!", "Change of Name Denied");
			}
			else if(convo_name.length<2){
				toastr["error"]("Please Enter Valid Conversation Name!", "Invalid Name");
			}
			else
			{
				$.ajax({
					url:"verify.php",
					type:"POST",
					data:{"change_convo_name":true,"convo_name":convo_name,"cid":cid},
					success:function(response){
						try{
							var resp=JSON.parse(response);
							if(resp.code=="CHANGE_CONVO_NAME_SUC"){
								$("#convo_edit_name").modal("hide");
								$("#convo_title_"+cid).html(convo_name);
								$("#convo_title").html(convo_name);
							}
							else if(resp.code=="CHANGE_CONVO_NAME_ERR_2"){
								toastr["error"]("Private chats cannot be renamed!", "Change of Name Denied");
							}
							else
							{
								toastr["error"]("Please check your internet connection!", "Unable to Change Name");
							}
						}
						catch(err){
							toastr["error"]("Please check your internet connection!", "Unable to Change Name");
						}
					},
					error:function(response){
						toastr["error"]("Please check your internet connection!", "Unable to Change Name");
					}
				});
			}
		});
		$("#add_users_btn").click(function(){
			$(".preloader-screen").fadeIn();
			if($("#convo_no_of_users").val()==2){
				$("#create_new_group").modal("show");
				$("#cg_convo_name").maxlength({alwaysShow:!0,threshold:10,warningClass:"label label-info",limitReachedClass:"label label-danger"});
				var users=[];
				$.get('verify.php', { "get_users_list": true, "cid": $("#current_chat_open").val() }, function (data) {
					resp=JSON.parse(data);
					users=resp.options;
					var users = new Bloodhound({
					  datumTokenizer: Bloodhound.tokenizers.whitespace,
					  queryTokenizer: Bloodhound.tokenizers.whitespace,
					  // `states` is an array of state names defined in "The Basics"
					  local: users
					});
					users.initialize();
					if($("#cg_convo_members").val()!=""){$("#cg_convo_members").tagsinput('destroy');}
					$("#cg_convo_members").val(resp.current_user);
					$('#cg_convo_members').tagsinput({
					  /*itemText: function(item) {
						  return item.split("-")[0];
					  },*/
					  typeaheadjs: {
						name: 'users',
						source: users.ttAdapter(),
						freeInput: false
					  }
					});
					$(".preloader-screen").fadeOut();
				});
			}
			else
			{
				$("#add_users_to_group").modal("show");
				var users=[];
				$.get('verify.php', { "get_other_users_list": true, "cid": $("#current_chat_open").val() }, function (data) {
					resp=JSON.parse(data);
					users=resp.options;
					var users = new Bloodhound({
					  datumTokenizer: Bloodhound.tokenizers.whitespace,
					  queryTokenizer: Bloodhound.tokenizers.whitespace,
					  // `states` is an array of state names defined in "The Basics"
					  local: users
					});
					users.initialize();
					if($("#autg_convo_members").val()!=""){$("#autg_convo_members").tagsinput('destroy');}
					//$("#cg_convo_members").val(resp.current_user);
					$('#autg_convo_members').tagsinput({
					  /*itemText: function(item) {
						  return item.split("-")[0];
					  },*/
					  typeaheadjs: {
						name: 'users',
						source: users.ttAdapter(),
						freeInput: false
					  }
					});
					$(".preloader-screen").fadeOut();
				});
			}
		});

		$("#cg_submit").click(function(){
			$(".preloader-screen").fadeIn();
			var convo_name=$("#cg_convo_name").val();
			var convo_members=$("#cg_convo_members").tagsinput('items');
			if(convo_name.length<3)
			{
				$("#cg_convo_name").focus();
				toastr.remove();toastr["error"]("Please enter valid name!", "Invalid Conversation Name");
				$(".preloader-screen").fadeOut();
			}
			else if(convo_members.length<2){
				$("#cg_convo_members").tagsinput('focus');
				toastr.remove();toastr["error"]("Please add some users!", "Add Members");
				$(".preloader-screen").fadeOut();
			}
			else
			{
				$.ajax({
					url:"verify.php",
					type:"POST",
					data:{"create_new_group":true,"name":convo_name,"members":convo_members},
					success:function(response){
						console.log(response);
						try{
							var resp=JSON.parse(response);
							if(resp.code=="CREATE_NEW_GROUP_SUC"){
								$("#convo_title").html(resp.convo_title);
								$("#convo_cid_"+$("#current_chat_open").val()).removeClass("active");
								$(".chat-list").prepend('<li class="media"><a href="javascript:;" class="conversation-toggle active" id="convo_cid_'+resp.convo_cid+'"><div class="media-left avatar"><img src="build/images/avatars/'+resp.convo_picture+'.png" alt="" class="media-object img-circle"><span class="status bg-success"></span></div><div class="media-body"><h6 class="media-heading" id="convo_title_'+resp.convo_cid+'">'+convo_title+'</h6><p class="text-muted mb-0">You haven\'t started conversation!</p></div><div class="media-right"><span class="badge bg-danger" id="new_msgs_count_'+resp.convo_cid+'"></span></div></a></li>');
								$("#current_chat_open").val(resp.convo_cid);
								$("#convo_no_of_users").val(resp.convo_no_of_users);
								$("#open_chat_ul").html("You haven't started conversation!");
								$("#last_convo_mid").val("0");
								var chatDiv = document.getElementById("open_chat_ul");
								chatDiv.scrollTop = chatDiv.scrollHeight;
								if(resp.new_current_msgs){
									$("#open_chat_ul").append(resp.new_current_msgs);
								}
								$("#create_new_group").modal("hide");
								$("#chat_msg").focus();
								$(".preloader-screen").fadeOut();
							}
							else
							{
								toastr.remove();toastr["error"]("Server Error! Please try later!", "Unable to Create Group");
								$(".preloader-screen").fadeOut();
							}
						}
						catch(err){
							toastr.remove();toastr["error"]("Please check your internet connection!", "Unable to Create Group");
							$(".preloader-screen").fadeOut();
						}
					},
					error:function(response){
						toastr.remove();toastr["error"]("Please check your internet connection!", "Unable to Create Group");
						$(".preloader-screen").fadeOut();
					}
				});
			}
		});
		

	});
	</script>
  </body>
</html>