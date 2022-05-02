<?php
ob_start();
session_start();
include"config.php";
include"inc/connect/connect.php";
include"inc/function.php";
#include"inc/checksession.inc.php";
$conn=connect_db();
$mode=$_REQUEST["mode"];
$key_cid=$_REQUEST["key_cid"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $sitename; ?></title>
<link href="theme/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="menu/menu_style.css" type="text/css">
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
<div id="container">

	<div id="header">
    	<?php include"inc/profile.php"; ?>
    </div>

<div id="warp">

	<div id="left">
    	<?php include"inc/menu.php"; ?>
    </div>
	
	<div id="right">
   		<h1>รายการห้อง</h1>
		<?php #include"menu/index.php"; ?>
        <div class="post">
            <?php 
				include"inc/admin3.php";
				include"inc/room/room.htm"; 
				?>
        </div>

    </div>
    
    <div style="clear:both">
    </div>
</div>
</div>

</body>
</html>
<?php mysql_close($conn); ?>