<?php
ob_start();
session_start();
$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";

#logfile($getip, $datelog, $url);


#$mode = $_GET["mode"];
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
<div style="clear:both"></div>

<div id="container">
	<div class="top"></div>
	    
        <!--<div id="header">
       </div> -->

<div id="warp">
	
        
            <div id="left">
        <?php
		#include"bookingroom/inc/checkbooking.php";
		#include"bookingroom/calendar/calendar2.php";
		#include"bookingroom/inc/menu.inc.php"; 
		#include"bookingroom/inc/mod_room.php";
		include("menu/index.html");
		?>
    </div>

        
	<div id="right">
        <div class="post">
            <?php #include"bookingroom/inc/index.inc.php"; 
			include("bookingroom/inc/_checkroom.htm"); ?>
        </div>
	</div>
    
 </div>

	<div class="bottom"></div>
</div>

</body>
</html>
