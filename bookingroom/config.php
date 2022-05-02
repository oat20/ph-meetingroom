<?php
header ('Content-type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
	
	if($_SERVER['HTTP_HOST'] == 'localhost' or $_SERVER['SERVER_ADDR'] == '127.0.0.1'){
		$livesite='http://'.$_SERVER['HTTP_HOST'].'/www2/prototype/reserveroom/'; //on locahost
			#connect database
		$host="localhost";
		$userhost="root";
		$passhost="root";
		$dbhost="phroom";
		//$dbhost="demo_phroom";
		#connect database
	}else{
		$livesite="http://".$_SERVER['HTTP_HOST']."/room/"; //onserver
		#connect database
		$host="localhost";
		$userhost="chakkapan";
		$passhost="shk,g-hk";
		$dbhost="phroom";
		//$dbhost="demo_phroom";
		#connect database
	}
	
	//$livepath="d:/project/ph/eoffice/bookingroom/";
	$sitename_01='PH-Reservations Room'; $sitename="PH-MIS e-ReserveRoom คณะสาธารณสุขศาสตร์ ม.มหิดล, MUPH, ระบบจองห้องประชุมออนไลท์, e-ReserveRoom"; $siteicon='<i class="fa fa-bookmark"></i>';
	define('livepath', dirname(__FILE__));
	#$mailfrom = 'chakkapan@most.go.th';
		
	#connect ftp
	$ftphost="ns2.ph.mahidol.ac.th";
	$ftpuser="demowww";
	$ftppassword="Cy9YbGM";
	#connect ftp
	
	$datelog = date("Y-m-d H:i:s"); $getip=$_SERVER['REMOTE_ADDR']; $url = getenv("REQUEST_URI");
	
	$datelog2=$datelog." | ".$getip;
		
	$hm_array=array("07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00");
	
	$today=date("Y-m-d");
	
	$permission=array("สมาชิก","ผู้ดูแลระบบ");
	
	$month_present = date("Y-m"); 
	$year_present = date("Y");
	
	$msg=array("1"=>"ไม่มีรายการ",
	"2"=>"ไม่มีห้องว่าง",
	"3"=>"ไม่มีรายการซ้ำสามารถจองได้",
	"4"=>"! ช่วงเวลาที่ท่านจองมีรายการซ้ำไม่สามารถจองได้",
	"5"=>"บันทึกรายการเรียบร้อย",
	"6"=>"แก้ไขรายการเรียบร้อย",
	"7"=>"! ไม่สามารถทำการบันทึกได้");
	
	$img_path = "bookingroom/img/";
	
	$status_booking=array("รอยืนยันจากผู้จอง",
	"รอยืนยันจากหัวหน้าภาค/งาน",
	"ยืนยันจากหัวหน้าภาค/งาน",
	"รอจัดห้อง",
	"จัดห้อง",
	"ไม่สามารถจัดห้องให้ได้",
	"รออนุมัติ",
	"ไม่อนุมัติ",
	"อนุมัติ",
	"ยกเลิก");
	
	$usergroup=array("10000"=>"อาจารย์","10001"=>"เจ้าหน้าที่","10002"=>"นักศึกษา");
	
	$cf_yn = array("0"=>"<i class='fa fa-minus-square'></i> ไม่",
	"1"=>"<i class='fa fa-check'></i> ใช่");
	
	$cf_yn2 = array("No"=>"<i class='fa fa-minus-square'></i> No",
	"Yes"=>"<i class='fa fa-check'></i> Yes");
	
	$cf_yn_icon = array("0"=>"<i class='fa fa-minus-square'></i>",
	"1"=>"<i class='fa fa-check'></i>");
		
	$cf_msgicon = array("1"=>"tick.png",
	"2"=>"hourglass_icon.gif",
	"99"=>"publish_x.png"); //1=ยืนยัน,อนุมัติ 2=รอ 99=ยกเลิก
	
	//สถานะเลขาฯ อนุมัติ
	$cf_msgicon2 = array("1"=>"<i class='fa fa-check'></i> อนุมัติ/ยืนยัน",
	"2"=>"<i class='fa fa-hourglass'></i> รออนุมัติ",
	"99"=>"<i class='fa fa-times'></i> ไม่อนุมัติ"); 
	$cf_msgicon2_noicon = array(
		"1"=>array("title"=>"อนุมัติ/ยืนยัน","icon"=>"<i class='fa fa-check'></i>","color"=>"success","status-color"=>"#8BC34A"),
		"2"=>array("title"=>"รออนุมัติ","icon"=>"<i class='fa fa-hourglass'></i>","color"=>"warning","status-color"=>"#FFC107"),
		"99"=>array("title"=>"ไม่อนุมัติ","icon"=>"<i class='fa fa-times'></i>","color"=>"danger","status-color"=>"#F44336")
	); //1=ยืนยัน,อนุมัติ 2=รอ 99=ยกเลิก
	
	$cf_status_recive = array("1"=>"<i class='fa fa-hourglass'></i> รอรับเรื่องจากผู้จอง",
	"7"=>"<i class='fa fa-check'></i> รับเรื่องแล้ว ส่งอนุมัติ",
	"99"=>"<i class='fa fa-times'></i> ยังไม่ได้รับเรื่อง");
	$cf_status_recive02=array(
		"1"=>array("title"=>"รอรับเรื่องจากผู้จอง","icon"=>"<i class='fa fa-hourglass'></i>","color"=>"warning"),
		"7"=>array("title"=>"รับเรื่องแล้ว ส่งอนุมัติ","icon"=>"<i class='fa fa-check'></i>","color"=>"success"),
		"99"=>array("title"=>"ยังไม่ได้รับเรื่อง","icon"=>"<i class='fa fa-times'></i>","color"=>"danger")
	); //1=ยืนยัน,อนุมัติ 2=รอ 99=ยกเลิก
	
	#$edu_level=array("ปริญญาตรี","ปริญญาโท","ปริญญาเอก");
?>