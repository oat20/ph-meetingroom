<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
require_once '../bookingroom/mysqli_connect.php';
include('../mailer/mail.php');
//include('../bookingroom/css-inc.php');
	$tm=date('Y-m-d H:i:s');
	//send email
	$body=file_get_contents($livesite.'directmail/weekagenda.php?tm='.$tm);
	$rs = mysqli_query($mysqli, "select * from mail_contact_it order by email asc");
	while($ob = mysqli_fetch_assoc($rs)){
		$send = smtpmail($ob['email'], 'รายการจองห้องวันที่ '.dateThai(date('Y-m-d',strtotime($tm.' +1 days'))), $body);
	}
	
	mysqli_query($mysqli, "insert into mail_contact_itlog (id, dateSent, ipSent) values ('', '".date('Y-m-d H:i:s')."', '".$_SERVER['REMOTE_ADDR']."')");
	//send email

//line notify
$qEvent = mysqli_query($mysqli, "select *
	from meetingroom_userq
	where concat(Dater,' ',time_in,':00') >= '$tm'
	and uq_cancel like 'No'
");
$rowEvent = mysqli_num_rows($qEvent);
if($rowEvent > 0){

	$sql_lastbooking = mysqli_query($mysqli, "SELECT *
		FROM meetingroom_userq AS t1
		INNER JOIN meetingroom_croom AS t2 ON ( t1.cr_id = t2.cr_id )
		WHERE CONCAT( t1.Dater, ' ', t1.time_in, ':00' ) >= CURRENT_TIMESTAMP( )
		and t1.uq_cancel like 'No'
		ORDER BY t1.Dater, t1.time_in, t1.time_out
		LIMIT 1");
	$rs_lastbooking = mysqli_fetch_assoc($sql_lastbooking);
	$lastbooking = date('d/m/Y', strtotime($rs_lastbooking['Dater'])).' '.$rs_lastbooking['time_in'].' - '.$rs_lastbooking['time_out'].' @'.$rs_lastbooking['name'].' - '.$rs_lastbooking['title'];
	 
	//send line notify
	$token = "97PZQvmxrLBM7jvPlCwMZ5yq6msIpMQCMtTpljfoqIP"; //ใส่Token ที่copy เอาไว้
	
	$str = "แจ้งเตือนใช้ห้องประชุม: ".$lastbooking." ".$livesite.'directmail/weekagenda.php?tm='.date('Y-m-d', strtotime($tm.' -1 day'));
	
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://notify-api.line.me/api/notify");
curl_setopt($ch, CURLOPT_POST, 1);
// In real life you should use something like:
curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(
			array(
				'message' => $str
			)));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/x-www-form-urlencoded',
		'Authorization: Bearer '.$token
	));
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

$server_output = curl_exec($ch);

curl_close ($ch);
	
}
//line notify

//include('../bookingroom/js-inc.php');
?>
