<?php
#?????/???????????
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
		$form_deid=$_REQUEST[form_deid];
		
		$cmd = "select * from user,organization 
		 where user.NO='$u'
		 and user.DEPARTMENT_NO=organization.DeID";
		 $result = mysql_query($cmd);
		$row=mysql_fetch_array($result);
		$u_id=$row["u_id"];
		$cr_id=$row["cr_id"];
		
			
		
    $maxid=maxid(meetingroom_userq, uq_id);
	#$dater=$datelog." | ".$getip;

if($action=="add"){
       $cmd= " insert into meetingroom_userq (uq_id,u_id,cr_id,uname,crname,Dater,time_in,time_out,title,detail,phone,type,pratan,optionss,T_in,T_out,created,status,confirm,confirm_by) 
	values ('$maxid','$u','$room','','','$startdate','','','$text2','','','','','','$time_in','$time_out','$datelog','','','')";
	mysql_query($cmd);
	#echo"mysql_query($cmd)";
	}else if($action=="edit"){
	$sql="update room_booking set subject='$subject', cid='$room', teacher='$teacher', subject2='$subject2', course='$course', starttime='$stime', endtime='$etime', startdate='$startdate', enddate='$enddate', depid='$dep', another='$comment', amount='$text3', useradd='$names'
	where id='$id'";
	$rs=mysql_query($sql);
	header("location: index.php");
	}
	?>