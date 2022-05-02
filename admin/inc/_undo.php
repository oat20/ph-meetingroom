<?php
include"../config.php";
include "connect/connect.php";

connect_db();

$key_cid = $_REQUEST[key_cid];
$keyno = $_REQUEST["keyno"];
$media_id = $_REQUEST["media_id"];
$food_id = $_REQUEST["food_id"];

if($key_cid != ""){
    #$cmd = "delete from meetingroom_croom where cr_id = '$key_cid' ";
	mysql_query("update meetingroom_croom set trash = '0', dater = '$lastupdate', created_by = '$u' where cr_id = '$key_cid'");
	header("location: ../room.php");
}
	
	if($keyno != ""){
		mysql_query("update jos_users set block = '0' where id = '$keyno'");
		header("location: ../user.php");
	}
	
	if($media_id != ""){
		mysql_query("update meetingroom_media set trash = '0', lastupdate = '$lastupdate' where media_id = '$media_id'");
		header("location: ../media.php");
	}
	
	if($food_id != ""){
		mysql_query("update meetingroom_food set trash = '0', lastupdate = '$lastupdate' where food_id = '$food_id'");
		header("location: ../food.php");
	}
?>