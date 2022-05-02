<?php
ob_start();
session_start();

include"../../bookingroom/inc/connect_db.php";

$conn=connect_db("reserveroom");

	$us_id=$_POST["us_id"];
	$oldpwd=$_POST["oldpwd"];
	$newpwd=$_POST["newpwd"];
	$error_msg2="";
	
	$sql="select USR_PAS 
	from user
	where NO='$us_id'";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
	
	if($ob["USR_PAS"] == $oldpwd){
	 	$sql="update user set USR_PAS='$newpwd'
		where NO='$us_id'";
		mysql_query($sql);
		$error_msg2="แก้ไขรหัสผ่านเรียบร้อย";
		print $error_msg2;
	}else{
		$error_msg2="รหัสผ่านเดิมไม่ถูกต้อง !";
		print $error_msg2;
	}

mysql_close($conn);
ob_end_flush();
?>
