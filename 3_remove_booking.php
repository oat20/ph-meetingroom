<?php
session_start();

include("bookingroom/config.php");
include("bookingroom/inc/checksession.inc.php");
include("bookingroom/connect/connect.php");

$rs=mysql_query("delete from meetingroom_userq
where uq_id='$_GET[uq_id]'");

header('location: 3_bookingall.php');
?>