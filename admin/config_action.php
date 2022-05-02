<?php
ob_start();
session_start();
include("../bookingroom/config.php");
include("../bookingroom/connect/connect.php");
include("../bookingroom/inc/checksession.inc.php");

$sql="update config set days='$_POST[days]', filetype='$_POST[filetype]'";
mysql_query($sql);
header("location: ../config.php");

ob_end_flush();
?>