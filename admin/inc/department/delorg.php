<?php
include"../config.php";
include $livepath."connect/connect.php";
    $cmd = "delete from tb_department where dp_id = '$key_dp_id' ";
	mysql_query($cmd,$link);
	
	header("location: ".$livesite."org.php");
?>