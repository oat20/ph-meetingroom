<?php
ob_start();
session_start();
$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include"bookingroom/inc/function2.php";

$Y=$_GET[Y];
$m=$_GET[m];
$d=$_GET[d];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $sitename; ?></title>
<link href="bookingroom/theme/style.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="menu/menu_style.css" type="text/css"> -->
<script type="text/javascript">
        var GB_ROOT_DIR = "bookingroom/GreyBox/greybox/";
    </script>

    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/gb_scripts.js"></script>
    <link href="bookingroom/GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
    </head>

<body>
<div id="container">
	    
        <div id="header">
    	<!--<a href="#"><img src="bookingroom/img/logo.png" border="0"></a> -->
        <!--<div class="logo"><img src="bookingroom/theme/room_it/images/mu.gif" border="0" width="90" height="90"></div> -->
       </div>

<div id="warp">
	
        
            <div id="left">
        <?php
		#include"bookingroom/inc/checkbooking.php";
		#include"bookingroom/calendar/calendar2.php";
		include"bookingroom/inc/menu.inc.php"; 
		#include"bookingroom/inc/mod_room.php";
		?>
    </div>

        
	<div id="right">
    
    	<div class="post">
        	<h1>Confirm</h1>
            <?php include"bookingroom/booking/insert_booking.php"; ?>
        </div>

    </div>
    
    <div style="clear:both">
    </div>
</div>
</div>

</body>
</html>
