<?php
	ob_start();
	session_start();
	 #include"inc/checksession.inc.php";
	 include"config.php";
	 include"connect/connect.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>ระบบจองห้องอบรมคอมพิวเตอร์</title>
<link href="inc/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="warp">

		<div id="header">
        	<h1>ระบบจองห้องอบรมคอมพิวเตอร์</h1>
            <h2>คณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล</h2>
        </div>
		
		<div id="container">
			
			<div id="left">
    			<!--<div class="menu">
					<?php
						#include"inc/bookingtoday.inc.php";
					?>
				</div> -->
				
				<div class="menu">
					<?php 
						#if($u == ""){
							#include"login.inc.php";
						#}else{
							include"left2.inc.php";
						#}	
					 ?>
				</div>
				<?php
					if($us_type=="admin"){
				?>
				<div class="menu">
					<?php 
							include"controlpanel.php";
					 ?>
				</div>
				<?php
				}
				?>
			</div>
    
    		<div id="right">
    			<?php
					#include"room.inc.php"
					include"room/admin3.php";
				?>
        	<!--<div style="clear:both">
    		</div> -->
    		</div>

			<div style="clear:both">
    		</div>
		
	</div>

</div>
</body>
</html>