<?php
ob_start();
session_start();
include"config.php";
include"inc/connect/connect.php";
#include"bookingroom/inc/function.php";
#include"bookingroom/inc/checksession.inc.php";
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
		<?php #include"menu/index.php"; ?>
        <div class="post">
        	<?php include("inc/_time.php"); ?>
       </div>
       <p>&nbsp;</p>
		<div class="post">
        	<?php include("inc/_addTime.php"); ?>
       </div>
    </div>
    
    <div style="clear:both"></div>
</div>
</div>

</body>
</html>
