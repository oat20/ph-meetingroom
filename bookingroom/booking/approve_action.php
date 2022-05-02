<?php
ob_start();
session_start();

include"../config.php";
include"../connect/connect.php";
include"../inc/function.php";
include("../inc/checksession.inc.php");

$keyuq_id = $_POST["keyuq_id"];

foreach($keyuq_id as $k => $v)
{
	$sql="update meetingroom_userq 
	set status1 = 1, modified = '$datelog', modified_by = '$u'
	where uq_id = '$v'";
	mysql_query($sql);
	
	echo"<script language='JavaScript'>";
	echo"alert('ทำการอนุมัติเรียบร้อย');";
	echo"window.location='../../approve.php?mode=1';";
	print "</script>";
}

ob_end_flush();
?>