<?php
ob_start();#setcookie("u","");
session_start();
include"config.php";
include"inc/connect/connect.php";
#include"inc/function.php";
#include"inc/checksession.inc.php";
connect_db();
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
    
    	<div class="post">
        	<!--<h1>ข้อมูลส่วนตัว</h1> -->
        	<?php #include"inc/editmember.htm";
			include("config.htm"); 
			?>
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