<?php
ob_start();
session_start();
include"config.php";
include"connect/connect.php";
include"inc/function.php";
include"inc/checksession.inc.php";

$food=$_POST[food];
        $food_id=$_REQUEST[food_id];
		$cost=$_REQUEST[cost];
        $action=$_REQUEST[action];
   
    $maxid = maxid("meetingroom_snack","food_id");
	#$dater=$datelog." | ".$getip;

if($action == "add"){
	$cmd= " insert into meetingroom_snack (food_id, food, lastupdate) 
	values ('$maxid', '$food', '$datelog')";
	mysql_query($cmd);
    #print "<meta http-equiv=refresh content=0;URL=../food.php>";
	header("location: ../food.php");
}else if($action=="edit"){
    	$cmd="update meetingroom_snack set food='$food', lastupdate='$datelog' 
		where food_id='$food_id'";
		mysql_query($cmd);
		#print "<meta http-equiv=refresh content=0;URL=../food.php>";
		header("location: ../food.php");
}else if($action=="del"){
	$cmd="delete from meetingroom_snack where food_id='$food_id'";
	mysql_query($cmd);
	#print "<meta http-equiv=refresh content=0;URL=../food.php>";
	header("location: ../food.php");
}
?>