<?php
ob_start();
session_start();
$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $sitename; ?></title>
<link href="bookingroom/theme/style.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="menu/menu_style.css" type="text/css"> -->
</head>

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
        	<h1>แบบประเมินความพึงพอใจ</h1>
            <p><a href="https://spreadsheets.google.com/pub?key=0AsJVwHZQ3Ey8dGFrcm5GVkVmYW5XWWcwX25Ia3dJZ3c&authkey=CO2x3tsJ&hl=th&output=html" target="_blank">รายงานความพึงพอใจ >></a></p>
        	<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dGFrcm5GVkVmYW5XWWcwX25Ia3dJZ3c6MQ" width="100%" height="660" frameborder="0" marginheight="0" marginwidth="0">กำลังโหลด...</iframe>
        </div>
             	<!--<div class="post">
            <h1>ข้อมูลการจองวันที่ <?php #print dateThai($today); ?></h1>
            <?php #include"bookingroom/inc/index.inc.php"; ?>
        </div> -->

    </div>
    
    <div style="clear:both">
    </div>
</div>
</div>

</body>
</html>
