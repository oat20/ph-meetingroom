<?php
ob_start();
session_start();
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
#include"bookingroom/inc/checksession.inc.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $sitename; ?></title>
<link href="bookingroom/theme/style.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="menu/menu_style.css" type="text/css"> -->
<link rel="stylesheet" type="text/css" media="all" href="bookingroom/inc/datepicker/themes/aqua.css" title="Calendar Theme - forest.css" >
<!-- import the calendar script -->
		<script type="text/javascript" src="bookingroom/inc/datepicker/script/utils.js"></script>
		<script type="text/javascript" src="bookingroom/inc/datepicker/script/calendar.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="bookingroom/inc/datepicker/script/calendar-th.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="bookingroom/inc/datepicker/script/calendar-setup.js"></script>
</head>

<body>
<!--start header -->
<?php  include("bookingroom/header.php"); 
include("bookingroom/show_profile.php"); ?>
<!--end header -->

<div id="container">
<div class="top"></div>
	<?php #include"bookingroom/inc/header.htm"; ?>

<div id="warp">
	<div id="left">
        <?php
		#include"bookingroom/inc/checkbooking.php";
		#include"bookingroom/calendar/calendar2.php";
		#include"bookingroom/inc/menu.inc.php"; 
		#include"bookingroom/inc/mod_room.php";
		include"bookingroom/inc/menu.inc.php";
		include"bookingroom/inc/mod_room.php";
		?>
    </div>

   	<div id="right">
    	<?php #include"menu/index.php"; ?>
        <div class="post">
        	<h1>ข้อมูลส่วนตัว</h1>
			<!--<div class="submenu3">
    			<ul><li><a href="profile.php">แก้ไขข้อมูลส่วนตัว</a></li><li><a href="profile.php?mode=log">ประวัติการเข้าระบบ</a></li></ul>
			</div> -->
            <?php include"bookingroom/inc/profile.php";
			print '<br/>';
            include"admin/inc/changepassword.php"; ?>
        </div>
	</div>
    
    
    <div style="clear:both">
    </div>
</div>
<div class="bottom"></div>
</div>

</body>
</html>
