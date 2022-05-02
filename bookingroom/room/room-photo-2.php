<?php
session_start();

include("../config.php");
include("../inc/checksession.inc.php");
include("../connect/connect.php");
include("../inc/function.php");


if($_GET["action"] == "upload"){
	
	for($p=0;$p<sizeof($_FILES['cp_filename']['name']);$p++){
		//echo $_FILES['input2']['name'][$p].'<br>';
		$cp_id = maxid("meetingroom_croom_photo", "cp_id");
		
		$cp_filename = $cp_id.'-'.$_FILES["cp_filename"]["name"][$p];
		
		move_uploaded_file($_FILES["cp_filename"]["tmp_name"][$p],"../img/room/".$cp_filename);
		
		mysql_query("insert into meetingroom_croom_photo values ('$cp_id',
		'$_GET[key_cid]',
		'$cp_filename',
		'$_SESSION[u]',
		'".date("Y-m-d H:i:s")."',
		'".$_SERVER['REMOTE_ADDR']."')
		");
		
		header("location: room-photo.php?key_cid=".$_GET["key_cid"]);
	
	}

}else if($_GET["action"] == "delete"){
	$croom_photo = mysql_query("delete from meetingroom_croom_photo
	where cp_id = '$_GET[keyCpid]'");
	header("location: room-photo.php?key_cid=".$_GET["key_cid"]);
}
?>