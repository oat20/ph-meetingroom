<?php
ob_start();
session_start();
include"config.php";
include"inc/connect/connect.php";
include"inc/function.php";
#include"inc/checksession.inc.php";
$conn=connect_db();
$mode=$_REQUEST["mode"];
$keyno=$_REQUEST[keyno];
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
		<?php #include"menu/index.php"; ?>
        
             	<div class="post">
					<h1>สมาชิก</h1>
                <p><a href="user.php">แสดงรายการ >></a> <a href="user.php?mode=add">เพิ่มรายการ >></a></p>
            <?php 
			switch ($mode){
				case "add" : include"../bookingroom/register.php"; break;
				case "edit" : include"../bookingroom/inc/edituser.inc.php"; break;
				case "log" : include"inc/log.php"; break;
				default : include"inc/admin2.inc.php"; break;
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
<?php mysql_close($conn);