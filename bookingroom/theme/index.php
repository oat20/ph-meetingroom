<?php
ob_start();
session_start();
include"../config.php";
include"../connect/connect.php";

$today=date("Y-m-d");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ระบบขอใช้ห้องประชุมออนไลท์</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="warp">
	<div id="header">
    	<a href="#"><img src="../img/logo.png" border="0"></a>
    </div>
    
	<div id="left">
    	
        <!--<img src="room_it/images/life.png" width="200" height="200">
       <div class="line"></div> -->
       <!--เมนูหลัก -->
       <div class="menu">
        	<?php include"../inc/menu.inc.php"; ?>
        </div>
        <div class="line"></div>
        
        <!--<div class="module1">
        	<h3>ปฏิทินการจอง</h3>
            <?php #include"../calendar/calendar2.php"; ?>
        </div>
        <div class="line"></div> -->
        <div class="module1">
        	<?php include"../inc/search.php"; ?>
        </div>
        <div class="line"></div>

		<!--เข้าสู่ระบบ -->
      <?php include"../inc/login.php"; ?>
       
 	</div>
    
    <div id="right">
    	<div class="post">
    		<!--<h3>รายการจองวันที่ <?php #print dateThai($today); ?></h3> -->
            <?php include"../calendar/calendar2.php"; ?>
        </div>
            	<div class="post">
            <h2>ข้อมูลการจองวันที่ <?php print dateThai($today); ?></h2>
            <?php include"../inc/index.inc.php"; ?>
        </div>

    </div>
    
    <div style="clear:both">
    </div>
</div>
</body>
</html>
