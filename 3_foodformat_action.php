<?php
session_start();

include("bookingroom/config.php");
include("bookingroom/inc/checksession.inc.php");
include("bookingroom/connect/connect.php");
include("bookingroom/inc/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<?php
if($_POST["action"] == "insert"){
	
	mysql_query("insert into meetingroom_foodformat (ff_id,
	ff_title)
	values ('".maxid("meetingroom_foodformat","ff_id")."',
	'$_POST[ff_title]')");
	
	echo '<meta http-equiv="refresh" content="0;URL=3_foodformat.php">';
	
}else if($_POST["action"] == "update"){
	
	mysql_query("update meetingroom_foodformat set
	ff_title = '$_POST[ff_title]'
	where ff_id = '$_POST[ff_id]'");
	
	echo '<meta http-equiv="refresh" content="0;URL=3_foodformat.php">';
	
}else if($_GET["action"] == "delete"){
	
	mysql_query("delete from meetingroom_foodformat where ff_id = '$_GET[ff_id]'");
	echo '<meta http-equiv="refresh" content="0;URL=3_foodformat.php">';
	
}
?>
</body>
</html>