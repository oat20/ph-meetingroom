<?php
	#$host="localhost"; #host ??? mysql
	#$userhost="root"; #username ??? mysql
	#$passhost=""; #password ??? mysql
	
	$conn = mysql_connect($host, $userhost, $passhost);
	mysql_select_db($dbhost, $conn);  
	mysql_query("SET NAMES UTF8");
?>
