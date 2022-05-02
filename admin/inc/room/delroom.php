<?php
include"../../config.php";
include $livepath."connect/connect.php";

connect_db();

$key_cid = $_REQUEST[key_cid];
$keyno = $_REQUEST["keyno"];
$media_id = $_REQUEST["media_id"];
$food_id = $_REQUEST["food_id"];
$tim_id = $_REQUEST["tim_id"];

if($key_cid != ""){
    #$cmd = "delete from meetingroom_croom where cr_id = '$key_cid' ";
	mysql_query("update meetingroom_croom set trash = '1', dater = '$lastupdate', created_by = '$u' where cr_id = '$key_cid'");
	header("location: ".$livepath2."room.php");
}
	
	if($keyno != ""){
		mysql_query("update jos_users set block = '1' where id = '$keyno'");
		header("location: ../../user.php");
	}
	
	if($media_id != ""){
		mysql_query("update meetingroom_media set trash = '1', lastupdate = '$lastupdate' where media_id = '$media_id'");
		header("location: ../../media.php");
	}
	
	if($food_id != ""){
		mysql_query("update meetingroom_food set trash = '1', lastupdate = '$lastupdate' where food_id = '$food_id'");
		header("location: ../../food.php");
	}
	
	if($tim_id != ""){
		mysql_query("update room_time set trash = '1', modified = '$lastupdate' where tim_id = '$tim_id'");
		header("location: ../../_time.php");
	}
?>