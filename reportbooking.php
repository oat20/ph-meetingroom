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
<link rel="stylesheet" href="menu/menu_style.css" type="text/css">
<!--<script src="bookingroom/inc/SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="bookingroom/inc/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css">
 --></head>

<body>
<div id="container">
<div id="warp">
	
	<div id="right">
    <div id="header">
        <div class="logo">
        <h1>คณะสาธารณสุขศาสตร์ ม.มหิดล</h1>
        <h2>e-ReserveRoom</h2>
        </div>
	</div>
		<?php include"menu/index.php"; ?>
        
             	<div class="post">
  					<h1>ตรวจสอบการจอง</h1>
                    <p><a href="reportbooking.php?mode=new">รายการล่าสุด >></a> <a href="reportbooking.php?mode=last">รายการที่ผ่านมา >></a></p>
                    <?php
					switch($mode){
						case "new" : include"bookingroom/reportnewbooking.php"; break;
						case "last" : include"bookingroom/reportlastbooking.php"; break;
						default : include"bookingroom/reportallbooking.php"; break;
					}
					?>
                    <!--<div id="Accordion1" class="Accordion" tabindex="0">
                        <div class="AccordionPanel">
                        	<div class="AccordionPanelTab">รายการล่าสุด</div>
    						<div class="AccordionPanelContent"><?php #include"bookingroom/newbooking.php"; ?></div>
  						</div>
                        <div class="AccordionPanel">
                        	<div class="AccordionPanelTab">รายการที่ผ่านมา</div>
    						<div class="AccordionPanelContent"><?php #include"bookingroom/lastbooking.php"; ?></div>
  						</div>
					</div>-->

        	</div>
		</div>
        
    <div style="clear:both">
    </div>
</div>
</div>

</body>
</html>
