<?php
	ob_start();
	#session_start();
	 #include"inc/checksession.inc.php";
	 include"config.php";
	 include"connect/connect.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>�к��ͧ��ͧͺ������������</title>
<link href="inc/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="warp">

		<div id="header">
        	<h1>�к��ͧ��ͧͺ������������</h1>
            <h2>����Ҹ�ó�آ��ʵ�� ����Է�������Դ�</h2>
        </div>
		
		<div id="container">
			
			<div id="left">
    			<div class="menu">
					<h1>��¡�èͧ�ѹ���</h1>
				</div>
				
				<div class="menu">
					<h1>�������к�</h1>
				</div>
			</div>
    
    		<div id="right">
    			<?php
					#include"room.inc.php"
					include"stat.inc.php";
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