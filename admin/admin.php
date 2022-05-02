<?php
ob_start();
session_start();
include"config.php";
include"inc/connect/connect.php";
#include"bookingroom/inc/function.php";
#include"bookingroom/inc/checksession.inc.php";
connect_db();
$mode=$_REQUEST["mode"];
$key_dp_id=$_REQUEST["key_dp_id"];
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
		<h1>ผู้ดูแลระบบ</h1>
		<?php #include"menu/index.php"; ?>
        <div class="post">
            <p><a href="admin.php">แสดงรายการ >></a> <a href="admin.php?mode=add">เพิ่มผู้ดูแลระบบ >></a></p>
            <?php 
			switch ($mode){
				case "add" : include"inc/add_admin.php"; break;
				default : include"inc/admin.php"; break;
			}
				?>
       </div>

    </div>
    
    <div style="clear:both">
    </div>
</div>
</div>

</body>
</html>
