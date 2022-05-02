<?php
ob_start();
session_start();
$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";

#logfile($getip, $datelog, $url);

$Y=$_GET[Y];
$m=$_GET[m];
$d=$_GET[d];
#$mode = $_GET["mode"];
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
    	<p>&nbsp;</p>
        <div class="post">
            <!--<h1>ตารางการจอง</h1> -->
            <?php include"bookingroom/stat.inc.php"; ?>
        </div>
	</div>
    
 </div>

	<div class="bottom"></div>
</div>

</body>
</html>
