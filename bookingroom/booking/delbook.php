<?php
ob_start();
session_start();
include"../config.php";
include"../connect/connect.php";
include("../inc/checksession.inc.php");

$keyuq_id=$_REQUEST[keyuq_id];

if(!empty($keyuq_id)){
    $cmd = "update meetingroom_userq set status1='3',modified='$datelog', modified_by='$u'
	where uq_id='$keyuq_id'";
	mysql_query($cmd);
	header("location: ../../mybooking.php?sta_id=3");
}
?>