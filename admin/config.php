<?php
header ('Content-type: text/html; charset=utf-8');
	#$livesite="http://localhost/ph/bookingroom/";
	#$livepath="d:/project/ph/eoffice/bookingroom/";
	$sitename="คณะสาธารณสุขศาสตร์ ม.มหิดล, ระบบจองห้องประชุม, ผู้ดูแลระบบ, Administrator,Faculty of Public Health,Mahidol University";
	#$mailfrom = 'chakkapan@most.go.th';
	
	$host="localhost";
	$userhost="chakkapan";
	$passhost="shk,g-hk";
	$dbhost="phroom";
	
	$ftphost="ns2.ph.mahidol.ac.th";
	$ftpuser="demo";
	$ftppassword="Cy9YbGM";
	
	#function dateThai($date){
	#$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	#$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	#$yy+=543;
	#$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	#$dateTY=intval($dd)." ".$_month_name[$mm]." ".$yy;
	#return $dateT;
	#}
	
	#function myThai($date){
	#$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	#$yy=substr($date,0,4); $mm=substr($date,5,2);
	#$yy+=543;
	#$dateT=$_month_name[$mm]." ".$yy;
	#return $dateT;
	#}
	
	$datelog = date("Y-m-d H:i:s"); $getip=getenv(REMOTE_ADDR); $lastupdate = $datelog." | ".$getip;

	#กำหนดเวลา
	$hm_array=array("08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00");
	
	$livepath="../"; $livepath2="../../";
	$img_path = "../bookingroom/img/";
	
	$permission=array("222"=>"Administrator", "333"=>"User");
?>