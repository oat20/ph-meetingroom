<?php
#header ("Content-Type: text/html; charset=tis-620");
ob_start();
session_start();
include"connect_db.php";

$conn=connect_db("reserveroom");

	$m1=$_POST["m1"];
	$m5=$_POST["m5"];
	$dep=$_POST["dep"];
	$us_id=$_POST["us_id"];
	$m6=$_REQUEST[m6];
	
	$error_msg1="";
	
	$sql="update user set USR_NAME='$m1', EMAIL='$m5', DEPARTMENT_NO='$dep', TEL='$m6'
	where NO='$us_id'";
	$rs=mysql_query($sql);
	if($rs){
		$error_msg1="แก้ไขข้อมูลเรียบร้อย";
		print $error_msg1;
	}else{
		$error_msg1="ไม่สามารถแก้ไขข้อมูลได้ !";
		print $error_msg1;
	}
	
	mysql_close($conn);
	ob_end_flush();
?>
