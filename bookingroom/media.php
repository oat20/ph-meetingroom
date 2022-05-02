<?php
ob_start();
session_start();
include"config.php";
include"connect/connect.php";
include"inc/function.php";
include"inc/checksession.inc.php";

$media=$_POST[media];
        $media_id=$_REQUEST[media_id];
        $action=$_REQUEST[action];
   
	$maxid = maxid("meetingroom_media","media_id");

        if($action == "add"){
	$cmd= " insert into meetingroom_media (media_id, media, lastupdate) 
	values ('$maxid', '$media', '$datelog')";
	mysql_query($cmd);
    #print "<meta http-equiv=refresh content=0;URL=../media.php>";
	header("location: ../media.php");
    }else if($action=="edit"){
    	$cmd="update meetingroom_media set media='$media', lastupdate='$datelog' 
where media_id='$media_id'";
mysql_query($cmd);
#print "<meta http-equiv=refresh content=0;URL=../media.php>";
header("location: ../media.php");
}else if($action=="del"){
	$cmd="delete from meetingroom_media where media_id='$media_id'";
	mysql_query($cmd);
	header("location: ../media.php");
}

ob_end_flush();
?>