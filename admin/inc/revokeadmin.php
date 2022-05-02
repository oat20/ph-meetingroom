<?php
ob_start();
session_start();
include"../config.php";
include"connect/connect.php";

$form_id=$_REQUEST[form_id];
$action=$_REQUEST[action];

if($action=="grant"){
	foreach($form_id as $key => $value){
		$sql="insert into admin values('$value');";
		mysql_query($sql);
	}
}else if($action=="revoke"){
	foreach($form_id as $key => $value){
		$sql="delete from admin where NO='$value'";
		mysql_query($sql);
	}
}

header("location: ".$livepath."admin.php");
ob_end_flush();
?>