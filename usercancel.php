<?php
ob_start();
session_start();
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include"bookingroom/inc/checksession.inc.php";

$mode=$_REQUEST[mode];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $sitename; ?></title>
<link href="bookingroom/theme/style.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="menu/menu_style.css" type="text/css"> -->
<!--<script src="bookingroom/inc/SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="bookingroom/inc/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css">
 --></head>

<body>
<div id="container">
    <?php include"bookingroom/inc/header.htm"; ?>

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
		<?php #include"menu/index.php"; ?>
        
             	<div class="post">
  					<h1>รายการจองของส่วนงาน</h1>
                    <fieldset>
                    	<legend>รายการจองที่ยกเลิก</legend>
                        <?php include"bookingroom/booking/cancel.php"; ?>
                    </fieldset>
        	</div>
		</div>
        
        
    <div style="clear:both">
    </div>
</div>
</div>

</body>
</html>
