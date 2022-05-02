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


#$mode = $_GET["mode"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?=$sitename;?>">
<title><?php print $sitename; ?></title>
<link href="bookingroom/theme/style.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="menu/menu_style.css" type="text/css"> -->
<!--<script type="text/javascript">
        var GB_ROOT_DIR = "bookingroom/GreyBox/greybox/";
    </script>

    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/gb_scripts.js"></script>
    <link href="bookingroom/GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" /> -->
    
    <script type="text/javascript" src="report/FusionCharts.js"></script>
    </head>

<body>
<!--start header -->
<?php include("bookingroom/header.php"); 
include("bookingroom/show_profile.php");
?>
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
		include"bookingroom/inc/menu.inc.php";
		include"bookingroom/inc/mod_room.php";
		#include("menu/index.html");
		?>
        	<!--<div class="module2">
            	<div class="title1"></div>
                <h3>Title</h3>
                <div class="title2"></div>
            </div> -->
    </div>

        
	<div id="right">
    	
    	<div class="post">
            <h1>สถิติการจอง</h1>
            	<div class="submenu">
                	<form action="<?=$PHP_SELF;?>" method="get">
                	<select name="y" class="forminput">
            	<?php
				$year_present=date("Y");
				$yc=$year_present+543;
				$ys=$yc-4;
				$yn=$yc+4;
				for($yy=$ys;$yy<=$yn;$yy++){
					if($yy == $yc){
            			print "<option value='".$yy."' selected='selected'>- ".$yy." -</option>";
					}else{
						print "<option value='".$yy."'>- ".$yy." -</option>";
					}
				}
				?>
            </select>
            <input name="action" type="hidden" value="display">
            <input name="" type="submit" value="แสดงข้อมูล" class="formbutton">
            		</form>
                </div>
            <?php #include"bookingroom/inc/index.inc.php"; 
			#include("report/PieData.php");
			if($_GET[action] == "display"){
				include("report/by_room.php");
				include("report/stat_org.php");
				include("report/by_status.php");
			}
			?>
        </div>
        
       
        
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
