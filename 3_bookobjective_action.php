<?php
ob_start();
session_start();

include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include"bookingroom/inc/checksession.inc.php";

if($_SESSION['userType'] == 3){

        $action=$_REQUEST[action];
   
        if($action == "insert"){
	
			$cmd= " insert into meetingroom_objective (ob_id,
			ob_title) 
			values ('".maxid("meetingroom_objective","ob_id")."', 
			'$_POST[sendObtitle]')";
			mysql_query($cmd);
			header("location: 3_bookobjective.php");
    
	}else if($action=="update"){
    	
		$cmd="update meetingroom_objective set 
		ob_title = '$_POST[sendObtitle]'
where ob_id='$_POST[keyObid]'";
mysql_query($cmd);
header("location: 3_bookobjective.php");

}else if($action=="delete"){
	
	$cmd="delete from meetingroom_objective 
	where ob_id='$_GET[keyObid]'";
	mysql_query($cmd);
	header("location: 3_bookobjective.php");

}

}else{
	header("3_bookobjective.php");
}

ob_end_flush();
?>