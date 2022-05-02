<?php
ob_start();
session_start();

#include"../../bookingroom/inc/function.php";
include("connect/connect.php");
   #$conn = connect_db();
   $key_cid = $_REQUEST["key_cid"];
   $keyId = $_REQUEST["keyId"];
   
   if($key_cid != ""){
    	$cmd = "delete from meetingroom_croom where cr_id = '$key_cid' ";
		$rs_mr=mysql_query($cmd);
		if($rs_mr)
		{
			print "<script language='javascript'>alert('ลบข้อมูลเรียบร้อย');</script>";
			print "<meta http-equiv='refresh' content='0;URL=../../room.php' />";
			#header("location: ../../room.php");
		}
		else
		{
			print "<script language='javascript'>alert('ไม่สามารถลบข้อมูลเรียบร้อย');</script>";
			print "<meta http-equiv='refresh' content='0;URL=../../room.php' />";
		}
   }
	
	if($keyId != ""){
		$cmd = "delete from room_type where id = '$keyId'";
		mysql_query($cmd);
		header("location: ../../room_cate.php");
	}
	
	ob_end_flush();
?>