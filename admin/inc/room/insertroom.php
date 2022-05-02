<?php
ob_start();
session_start();
include"../../config.php";
include"../connect/connect.php";
include"../function.php";
#include"../checksession.inc.php";

$text1=$_POST[text1];
$text2=$_POST[text2];
$location=$_POST[location];
$formcr_id=$_POST[formcr_id];
$action=$_POST[action];
$form_color=$_REQUEST[form_color];
   
$maxid=maxid(meetingroom_croom, cr_id);
$dater=$datelog." | ".$getip;

if($action == "add"){
	$cmd= " insert into meetingroom_croom (cr_id, name,net,dater,color) 
	values ('$maxid', '$text1','$text2','$dater','$form_color')";
	mysql_query($cmd);
    print "<meta http-equiv=refresh content=0;URL=../../room.php>";
}else if($action=="edit"){
	$cmd="update meetingroom_croom set name='$text1', net='$text2', dater='$dater', color='$form_color' 
	where cr_id='$formcr_id'";
	mysql_query($cmd);
	print "<meta http-equiv=refresh content=0;URL=../../room.php>";
}
?>