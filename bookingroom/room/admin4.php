<?php
ob_start();
session_start();
include"../config.php";
include"../connect/connect.php";
include"../inc/function.php";
include"../inc/checksession.inc.php";

	   	
        
		$time_in=$_POST[time_in];
        $time_out=$_POST[time_out];
        $location=$_POST[location];
        $room=$_POST[room];
        $action=$_POST[action];
		$text1=$_POST[text1];
        $text2=$_POST[text2];
		$media_id=$_POST[media_id];
		$food_id=$_POST[food_id];
		$startdate=$_POST[startdate];
		
		
   
    $cmd = "select * from user,organization 
		 where user.NO='$u'
		 and user.DEPARTMENT_NO=organization.DeID";
		 $result = mysql_query($cmd);
		$row=mysql_fetch_array($result);
		$u_id=$row["u_id"];
		$cr_id=$row["cr_id"];
		
			
		
    $maxid=maxid(meetingroom_userq, uq_id);
	#$dater=$datelog." | ".$getip;

       $cmd= " insert into meetingroom_userq (uq_id,u_id,cr_id,uname,crname,Dater,time_in,time_out,title,detail,phone,type,pratan,optionss,T_in,T_out,created,status,confirm,confirm_by) 
	values ('$maxid','$u','$room','','','$startdate','','','$text2','','','','','','$time_in','$time_out','$datelog','','','')";
	mysql_query($cmd);
	#echo"mysql_query($cmd)";
	
	foreach($media_id as $key => $value){
	$cmd_media= " insert into meetingroom_mediarelation (uq_id,media_id,net) 
	values ('$maxid','$value','')";
	mysql_query($cmd_media);
	#echo"mysql_query($cmd_media)";
	}
	
	foreach($food_id as $key2 => $value2){
	$cmd_food= " insert into meetingroom_foodrelation (or_id,uq_id,food_id,computer,projecter,other,status1,drink,status2) 
	values ('','$maxid','$value2','','','','','','')";
	mysql_query($cmd_food);
	#echo"mysql_query($cmd_food)";
	}
	?>