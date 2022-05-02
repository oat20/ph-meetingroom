<?php
ob_start();
session_start();
#$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include("bookingroom/inc/checksession.inc.php");
include("report/FusionCharts.php");
include("report/FC_Colors.php");


#logfile($getip, $datelog, $url);


$mode = $_GET["mode"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?=$sitename;?>">
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
    
    <SCRIPT LANGUAGE="Javascript" SRC="report/FusionCharts.js"></SCRIPT>
    </head>

<body>
<!--start header -->
<?php include("bookingroom/header.php"); 
include("bookingroom/show_profile.php"); ?>
<!--end header -->

<!--start center -->
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
		include"bookingroom/inc/menu.inc.php";
		include"bookingroom/inc/mod_room.php";
		?>
        	<!--<div class="module2">
            	<div class="title1"></div>
                <h3>Title</h3>
                <div class="title2"></div>
            </div> -->
    </div>

        
	<div id="right">
    	<div class="post">
            <h1>ตรวจสอบใบจอง</h1>
            	 <div class="submenu3">
                    	<ul>
                    		<li><a href="approve.php?mode=1">รายการเข้าใหม่</a></il>
                        <li><a href="approve.php?mode=2">รายการที่ผ่านมา</a></il>
                        </ul>
                    </div>
            <?php #include"bookingroom/inc/index.inc.php"; 
			switch($mode)
			{
				case "1" : include("bookingroom/booking/complete.php"); break;
				case "2" : include("bookingroom/booking/ago_book_approve.php"); break;
			}
			?>
        </div>
        <p class="blank_10"></p>
	</div>
    
    <div style="clear:both"></div>
 </div>

	<!--<div class="bottom"></div> -->
</div>
<!--end center -->

<!--start footer -->
<?php include("bookingroom/footer.html");
include("bookingroom/web_analysic.php");
?>
<!--end footer -->
</body>
</html>
