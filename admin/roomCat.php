<?php
ob_start();#setcookie("u","");
session_start();
include"config.php";
include"inc/connect/connect.php";
include"inc/function.php";
#include"inc/checksession.inc.php";
connect_db();
$mode=$_REQUEST["mode"];
$key_cid=$_REQUEST["key_cid"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $sitename; ?></title>
<link href="theme/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">

	<div id="header">
    	<?php include"inc/profile.php"; ?>
    </div>
    
<div id="warp">
    
	<div id="left">
    	<?php include"inc/menu.php"; ?>	
    </div>
    
    <div id="right">
    	
        <!--<div class="post">
        	<h3>รายการจองของฉัน</h3>
            <div class="submenu">
        	<ul>
        		<li><a href="#">ทั้งหมด</a></li>
                <li><a href="#">รออนุมัติ</a></li>
                <li><a href="#">อนุมัติแล้ว</a></li>
                <li><a href="#">ยกเลิก</a></li>
        	</ul>
        	</div>
             sdjfkljasdlkfjlskadjflksdjafkl
        </div> -->
    	<h1>ประเภทห้อง</h1>
    	<div class="post">
        	<?php include"../bookingroom/admin3.php";
			include("../bookingroom/room/room.htm"); ?>
		</div>
        
    </div>
    
    <div style="clear:both">
    </div>
</div>
</div>
</body>
</html>
<?php 
#mysql_close($conn);
ob_end_flush(); 
?>