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
</head>

<body>
<div id="warp">

		<!--<div id="header">
        	<h1>�к��ͧ��ͧͺ������������</h1>
            <h2>����Ҹ�ó�آ��ʵ�� ����Է�������Դ�</h2>
        </div> -->
		
		
		<!--<div id="container"> -->
			
			<div id="left">
    			<!--<div class="menu">
					<?php
						#include"inc/bookingtoday.inc.php";
					?>
				</div> -->
				
				<div class="menu">
					<?php 
							#include"inc/checkbooking.php";
					 ?>
				</div>
				<div class="menu">
					<?php 
							include"left2.inc.php";
					 ?>
				</div>
				
				<?php
					#if($us_type=="admin"){
				?>
				<div class="menu">
					<?php 
							include"controlpanel.php";
					 ?>
				</div>
				<?php
				#}
				?>
			</div>
    
    		<div id="right">
    			<?php
					switch($mode){
						case "first" : include"booking/first.php"; break;
						case "confirmbook" : include"roomq.php"; break;
						case "editbook" : include"#"; break;
						#default : include"inc/bookingtoday.inc.php"; break;
						default : include"calendar/calendar.php"; break;
					}
					
				?>
			</div>

			<div style="clear:both">
    		</div>
		
	<!--</div> -->

</div>
</body>
</html>