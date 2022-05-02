<?php
ob_start();
session_start();
#$u=$_SESSION["u"];
include"../config.php";
include"../connect/connect.php";
include"../inc/function.php";
include("../inc/checksession.inc.php");

$key_dp_id=$_GET[key_dp_id];
$text1=$_POST[text1];
$text2=$_POST[text2];
$email=$_POST[email];
$dp_id=$_POST[dp_id];
$action=$_REQUEST[action];

if($action=="add"){
	
	if($text1 != "" and $text2 != ""){
		$sql="insert into organization (DeID, Fname, tel, email) values ('".maxid("organization","DeID")."', '$text1', '$text2', '$email')";
		mysql_query($sql);
		header("location: ../../org.php");
	}else{
		echo"<script language='JavaScript'>";
		echo"alert('! ยังไม่ได้ใส่ชื่อส่วนงาน หรือ อีเมลติดต่อ');";
		echo"window.location='../../org.php';";
		echo"</script>";
	}
	
}else if($action=="edit"){
	
	$sql="update organization set Fname='$text1', tel='$text2', email='$email'
	where DeID='$dp_id'";
	mysql_query($sql);
	header("location: ../../org.php");
	
}else if($action=="del"){
	
    $cmd = "delete from organization 
	where DeID = '$key_dp_id' ";
	mysql_query($cmd);
	header("location: ../../org.php");
	
}
?>