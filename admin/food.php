<?php
ob_start();
session_start();
include"config.php";
include"inc/connect/connect.php";
include"inc/function.php";
#include"inc/checksession.inc.php";
$conn=connect_db();
$mode=$_REQUEST["mode"];
$food_id=$_REQUEST["food_id"];
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
   		<h1>อาหาร</h1>
        <div class="submenu"><ul><li><a href="#">ถังขยะ</a></li></ul></div>
		<?php #include"menu/index.php"; ?>
        <div class="post">
            <?php include"../bookingroom/food_view.php"; ?>
        </div>
		<div class="post">
        	<?php include"../bookingroom/food.htm"; ?>
        </div>
    </div>
    
    <div style="clear:both">
    </div>
</div>
</div>

</body>
</html>
<?php mysql_close($conn); ?>