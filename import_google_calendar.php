<?php
session_start();

include"bookingroom/config.php";
include("bookingroom/inc/function.php");

$condb=mysqli_connect($host,$userhost, $passhost,$dbhost);
mysqli_query($condb,"set names utf8");

$strFileName = $_COOKIE['PHPSESSID'].".csv";
$objFopen = fopen($strFileName, 'w');

$strHeader="Subject,Start Date,Start Time,End Date,End Time,Description,Location\r\n";
fwrite($objFopen, $strHeader);

$sql=mysqli_query($condb, "select *, 
	meetingroom_croom.name as r_name, 
	DATE_FORMAT(meetingroom_userq.created, '%d/%m/%Y') as created 
		from meetingroom_userq
		inner join meetingroom_croom on (meetingroom_userq.cr_id = meetingroom_croom.cr_id)
		inner join organization on (meetingroom_userq.DeID = organization.DeID)
		where mid(meetingroom_userq.Dater,1,7) >='".date('Y-m')."' 
		and meetingroom_userq.uq_cancel='No'
		order by meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc
	");
while($rs=mysqli_fetch_assoc($sql)){
	
	$descripetion="ผู้จอง: ".$rs['uname'].' - '.$rs["Fname"].' โทร.'.$rs["phone"]." หมายเหตุ: ".$rs['optionss'];
	$location=$rs['r_name'];
	
	$strText3=$rs['title'].",".date("m/d/Y",strtotime($rs['Dater'])).",".date("h:i A",strtotime($rs['time_in'])).",".date("m/d/Y",strtotime($rs['enddate'])).",".date("h:i A",strtotime($rs['time_out'])).",".$descripetion.",".$location."\r\n";
	fwrite($objFopen, $strText3);
	
}

header("location: ".$strFileName);

//print date("h:i A",strtotime("13:00"));
?>