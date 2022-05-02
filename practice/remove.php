<?php
session_start();

include"../bookingroom/config.php";
include"../bookingroom/connect/connect.php";
include("../bookingroom/inc/checksession.inc.php");

$rs=mysql_query("delete from meetingroom_practice
where pr_id='$_GET[pr_id]'");

header('location: index.php');
?>