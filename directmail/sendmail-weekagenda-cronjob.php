<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
require_once '../bookingroom/mysqli_connect.php';
include('../mailer/mail.php');
//include('../bookingroom/css-inc.php');
	$tm=date('Y-m-d');
	//send email
	$body=file_get_contents($livesite.'directmail/weekagenda.php?tm='.$tm);
	$rs = mysqli_query($mysqli, "select * from mail_contact_it order by email asc");
	while($ob = mysqli_fetch_assoc($rs)){
		$send = smtpmail($ob['email'], 'รายการจองห้องวันที่ '.dateThai(date('Y-m-d',strtotime($tm.' +1 days'))), $body);
	}
	
	mysqli_query($mysqli, "insert into mail_contact_itlog (id, dateSent, ipSent) values ('".maxid('mail_contact_itlog', 'id')."', '".date('Y-m-d H:i:s')."', '".$_SERVER['REMOTE_ADDR']."')");
	//send email

//line notify
$qEvent = mysqli_query($mysqli, "select *
	from meetingroom_userq
	where Dater = '$tm'
");
$rowEvent = mysqli_num_rows($qEvent);
if($rowEvent > 0){

	$sql_lastbooking = mysqli_query($mysqli, "SELECT *
		FROM meetingroom_userq AS t1
		INNER JOIN meetingroom_croom AS t2 ON ( t1.cr_id = t2.cr_id )
		WHERE CONCAT( t1.Dater, ' ', t1.time_in, ':00' ) >= CURRENT_TIMESTAMP( )
		ORDER BY t1.Dater, t1.time_in, t1.time_out
		LIMIT 1");
	$rs_lastbooking = mysqli_fetch_assoc($sql_lastbooking);
	$lastbooking = date('d/m/Y', strtotime($rs_lastbooking['Dater'])).' '.$rs_lastbooking['time_in'].' - '.$rs_lastbooking['time_out'].' @'.$rs_lastbooking['name'].' - '.$rs_lastbooking['title'];
	
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
	//$token2 = 'TSO53WsLyFEH66QLjBuJwDzvFh9BYGG8UNSbHSv4YsV';
	
	$str = "แจ้งเตือนใช้ห้องประชุม: ".$lastbooking." More Info ".$livesite.'directmail/weekagenda.php?tm='.date('Y-m-d', strtotime($tm.' -1 day'));
	
	notify_message($str,$token);

	//notify_message($str, $token2);
	
}
//line notify

//include('../bookingroom/js-inc.php');
?>
