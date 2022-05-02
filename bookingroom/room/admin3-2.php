<?php
ob_start();
session_start();
include"../config.php";
include"../connect/connect.php";
include"../inc/function.php";
include"../inc/checksession.inc.php";

$text1=$_POST[text1];
        $net=$_POST[net];
        $location=$_POST[location];
        $room_type=$_POST[room_type];
        $action=$_REQUEST[action];
		$color=$_REQUEST[color];
		$cr_id=$_REQUEST[cr_id];
		$enable=$_POST[enable];
   
	$maxid = maxid("meetingroom_croom","cr_id");

        if($action == "insert"){
	$cmd = " insert into meetingroom_croom (cr_id,
	name,
	parent,
	net,
	tf_id,
	cr_price_halfday,
	cr_price_fullday,
	cr_number,
	location,
	cr_tel,
	enable,
	cr_note,
	color,
	dater,
	cr_tablechange) 
	values ('$maxid', 
	'$text1',
	'$room_type',
	'$net', 
	'$_POST[tf_id]', 
	'$_POST[cr_price_halfday]',
	'$_POST[cr_price_fullday]', 
	'$_POST[cr_number]',
	'$_POST[location]',
	'$_POST[cr_tel]',
	'$_POST[enable]',
	'$_POST[cr_note]',
	'".random_color()."',
	'".date("Y-m-d H:i:s")."',
	'$_POST[cr_tablechange]')";
	mysql_query($cmd);
	
	//room media
	if(isset($_POST["media_id"])){
		foreach($_POST["media_id"] as $k){
			mysql_query("insert into meetingroom_croom_media (cr_id,
			media_id,
			rm_modifiedby,
			rm_datestamp,
			rm_ipstamp)
			values ('$maxid',
			'$k',
			'$_SESSION[u]',
			'".date("Y-m-d H:i:s")."',
			'".$_SERVER['REMOTE_ADDR']."'
			)");
		}
	}
	//room media
	
    print "<meta http-equiv=refresh content=0;URL=../../room.php>";
    
	}else if($action=="update"){
    	
		$cmd="update meetingroom_croom set name='$text1',
		parent = '$_POST[room_type]', 
		net='$_POST[net]',
		tf_id = '$_POST[tf_id]',
		cr_price_halfday = '$_POST[cr_price_halfday]',
		cr_price_fullday = '$_POST[cr_price_fullday]',
		cr_number = '$_POST[cr_number]', 
		location = '$_POST[location]', 
		cr_tel = '$_POST[cr_tel]', 
		enable='$enable',
		cr_note = '$_POST[cr_note]',
		dater = '".date("Y-m-d H:i:s")."',
		cr_tablechange='$_POST[cr_tablechange]' 
		where cr_id = '$_POST[cr_id]'";
		mysql_query($cmd);
		
		//room media
		mysql_query("delete from meetingroom_croom_media
		where cr_id = '$_POST[cr_id]'");
			
		if(isset($_POST["media_id"])){
			foreach($_POST["media_id"] as $k){
				mysql_query("insert into meetingroom_croom_media (cr_id,
				media_id,
				rm_modifiedby,
				rm_datestamp,
				rm_ipstamp)
				values ('$_POST[cr_id]',
				'$k',
				'$_SESSION[u]',
				'".date("Y-m-d H:i:s")."',
				'".$_SERVER['REMOTE_ADDR']."'
				)");
			}
		}
	//room media
		
		print "<meta http-equiv=refresh content=0;URL=../../room.php>";

}else if($action=="del"){
	$cmd="delete from meetingroom_croom
	where cr_id='$_GET[key_cid]'";
	mysql_query($cmd);
	
	mysql_query("delete from meetingroom_croom_media
	where cr_id='$_GET[key_cid]'");
	
	mysql_query("delete from meetingroom_croom_photo
	where cr_id='$_GET[key_cid]'");
	
	header("location: ../../room.php");
}

ob_end_flush();
?>