<?php
include("bookingroom/config.php");
include("bookingroom/inc/function.php");
include("bookingroom/connect/connect.php");
require('mailer/mail.php');

//line notify
/*$tm = date('Y-m-d');
$qEvent = mysql_query("select *
	from meetingroom_userq
	where Dater = '$tm'
");
$rowEvent = mysql_num_rows($qEvent);
if($rowEvent > 0){
	
	define('LINE_API',"https://notify-api.line.me/api/notify");
	function notify_message($message,$token){
	 $queryData = array('message' => $message);
	 $queryData = http_build_query($queryData,'','&');
	 $headerOptions = array( 
			 'http'=>array(
				'method'=>'POST',
				'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
						  ."Authorization: Bearer ".$token."\r\n"
						  ."Content-Length: ".strlen($queryData)."\r\n",
				'content' => $queryData
			 ),
	 );
	 $context = stream_context_create($headerOptions);
	 $result = file_get_contents(LINE_API,FALSE,$context);
	 $res = json_decode($result);
	 return $res;
	}
 
	$token = "97PZQvmxrLBM7jvPlCwMZ5yq6msIpMQCMtTpljfoqIP"; //ใส่Token ที่copy เอาไว้
	$str = "แจ้งเตือนการจองใช้ห้องประชุม: วัน ".dateThai3(date('Y-m-d'))." Click ".$livesite.'directmail/weekagenda.php?tm='.date('Y-m-d', strtotime($tm.' -1 day'));
	$res = notify_message($str,$token);
	
	
}*/
//line notify

smtpGmail( 'chakkapan.cha@mahidol.ac.th' , 'ทดสอบ' , 'ทดสอบ' );
?>