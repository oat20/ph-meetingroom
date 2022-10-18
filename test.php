<?php
//include("bookingroom/config.php");
//include("bookingroom/inc/function.php");
//include("bookingroom/connect/connect.php");
//require('mailer/mail.php');

//line notify
	$token = "BT3b9bLnTnRLQ51PrWezMYcwFl4BXL6D34m6AsaIULS"; //ใส่Token ที่copy เอาไว้
	$str = "แจ้งเตือนการจองใช้ห้องประชุม: วัน ".date('Y-m-d')." Click directmail/weekagenda.php?tm='".date('Y-m-d');
	$ch = curl_init();
	curl_setopt_array($ch,array(
		CURLOPT_URL=>"https://notify-api.line.me/api/notify",
		CURLOPT_POST=>true,
		CURLOPT_POSTFIELDS=>
          http_build_query(
			array(
				'message' => $str
			)),
			CURLOPT_RETURNTRANSFER=> true,
			CURLOPT_HTTPHEADER=> array(
		'Content-Type: application/x-www-form-urlencoded',
		'Authorization: Bearer '.$token
			),
			CURLOPT_SSL_VERIFYPEER=> false,
			CURLOPT_SSL_VERIFYHOST=> false
	));

/*curl_setopt($ch, CURLOPT_URL,"https://notify-api.line.me/api/notify");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(
			array(
				'message' => $str
			)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/x-www-form-urlencoded',
		'Authorization: Bearer '.$token
	));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);*/

$server_output = curl_exec($ch);

curl_close ($ch);
		
//line notify

//smtpGmail( 'chakkapan.cha@mahidol.ac.th' , 'ทดสอบ' , 'ทดสอบ' );
?>