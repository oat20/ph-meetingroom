<?php
ob_start();
session_start();
#$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include"bookingroom/inc/checksession.inc.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $sitename; ?></title>
<link href="bookingroom/theme/style.css" rel="stylesheet" type="text/css">
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
        <script src="bookingroom/js/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="bookingroom/js/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
<div id="warp">
	
    <div id="left">
    	<?php include"bookingroom/left.php"; ?>
	</div>
        
	<div id="right">
    <div id="header">
    	<!--<a href="#"><img src="bookingroom/img/logo.png" border="0"></a> -->
        <!--<div class="logo"><img src="bookingroom/theme/room_it/images/mu.gif" border="0" width="90" height="90"></div> -->
        <div class="logo">
        <h1>e-ReserveRoom</h1>
        <h2>Faculty of Public Health Mahidol University</h2>
        </div>
</div>
		<?php include"menu/index.php"; ?>
        
             <div class="post">
             	<h1>ประวัติการจอง</h1>
            	<div id="TabbedPanels1" class="TabbedPanels">
  					<ul class="TabbedPanelsTabGroup">
    					<li class="TabbedPanelsTab" tabindex="0">รายการจอง</li>
    					<li class="TabbedPanelsTab" tabindex="0">รายการยกเลิก</li>
  					</ul>
  					<div class="TabbedPanelsContentGroup">
    					<div class="TabbedPanelsContent"><?php include"bookingroom/booking/complete.php"; ?></div>
    					<div class="TabbedPanelsContent"><?php include"bookingroom/booking/cancel.php"; ?></div>
  					</div>
				</div>
				<script type="text/javascript">
				<!--
				var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
				//-->
				</script>
                <div style="clear:both">
   			 </div>
        </div> 

    </div>
    
    <div style="clear:both">
    </div>
</div>
</div>

</body>
</html>
<?php
mysql_close($conn);
ob_end_flush();
?>