<?php 
	ob_start();
	session_start();
	 #include"inc/checksession.inc.php";
	 include"config.php";
	 include"connect/connect.php";
	 include"inc/function.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title><?php echo $sitename; ?></title>

 <script type="text/javascript">
        var GB_ROOT_DIR = "./GreyBox/greybox/";
    </script>
<script type="text/javascript" src="GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="GreyBox/greybox/gb_scripts.js"></script>
    <link href="GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
	
<link href="inc/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" media="all" href="inc/datepicker/themes/aqua.css" title="Calendar Theme - forest.css" >
<!-- import the calendar script -->
		<script type="text/javascript" src="../inc/datepicker/script/utils.js"></script>
		<script type="text/javascript" src="../inc/datepicker/script/calendar.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="../inc/datepicker/script/calendar-th.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="../inc/datepicker/script/calendar-setup.js"></script>
</head>

<body>
<div id="top">
	<div id="menu">
		<ul>
			<li><a href="index.php">รายการจอง</a></li>
			<li><a href="index.php?times=<?php echo date("Y-m-d"); ?>&mode=booking">จองห้อง</a></li>
			<!--<li><a href="#">รายงาน</a></li> -->
			<li><a href="index.php?mode=controlpanel">การจัดการระบบ</a></li>
		</ul>
	</div>
</div>

<div id="warp">

		<!--<div id="header">
        	<h1>ระบบจองห้องอบรมคอมพิวเตอร์</h1>
            <h2>คณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล</h2>
        </div> -->
		
		
		<div id="container">
			
			
    
    		<div id="right">
    			<?php
					switch($mode){
						case "booking" : include"room1.inc.php"; break;
						
						
						case "first" : include"booking/first.php"; break;
						
						case "controlpanel" : include"controlpanel.php"; break; 
						
						case "room" : include"room/admin3.php"; break;
						case "editroom" : include"room/editroom.php"; break;
						
						case "editbook" : include"booking/edit_booking.php"; break;
						
						case "dep" : include"department/show_dep.inc.php"; break;
						case "editorg" : include"department/editorg.php"; break;
						
						#default : include"inc/bookingtoday.inc.php"; break;
						default : include"calendar/calendar.php"; break;
					}
				?>
			</div>

			<div style="clear:both">
    		</div>
		
	</div>

</div>
</body>
</html>