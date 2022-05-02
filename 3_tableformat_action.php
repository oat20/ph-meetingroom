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
	
	$tf_photo = random_ID2("5").$_FILES["tf_photo"]["name"];
	move_uploaded_file($_FILES["tf_photo"]["tmp_name"],"bookingroom/img/room/".$tf_photo);
	
	mysql_query("insert into meetingroom_tableformat (tf_id,
	tf_title,
	tf_photo)
	values ('".maxid("meetingroom_tableformat","tf_id")."',
	'$_POST[tf_title]',
	'$tf_photo')");
	
	echo '<meta http-equiv="refresh" content="0;URL=3_tableformat.php">';
	
}else if($_POST["action"] == "update"){
	
	if(empty($_FILES["tf_photo"]["name"])){
		$tf_photo = $_POST["tf_photoold"];
	}else{
		$tf_photo = random_ID2("5").$_FILES["tf_photo"]["name"];
		move_uploaded_file($_FILES["tf_photo"]["tmp_name"],"bookingroom/img/room/".$tf_photo);
	}
	
	mysql_query("update meetingroom_tableformat set
	tf_title = '$_POST[tf_title]',
	tf_photo = '$tf_photo'
	where tf_id = '$_POST[tf_id]'");
	
	echo '<meta http-equiv="refresh" content="0;URL=3_tableformat.php">';
	
}else if($_GET["action"] == "delete"){
	
	mysql_query("delete from meetingroom_tableformat where tf_id = '$_GET[tf_id]'");
	echo '<meta http-equiv="refresh" content="0;URL=3_tableformat.php">';
	
}
?>
</body>
</html>