<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");
include('../mailer/mail.php');
//include('../bookingroom/css-inc.php');
	$tm=date('Y-m-d');
	//send email
	$body=file_get_contents($livesite.'directmail/weekagenda.php?tm='.$tm);
	/*$body = '<p><img src="http://www.ph.mahidol.ac.th/img/logo.png" border="0"></p>
				<p><strong>รายการจองห้องวันที่ '.dateThai(date('Y-m-d',strtotime($tm.' +1 days'))).' สามารถดูตาม Link ด้านล่างนี้</strong><br><a href="'.$livesite.'directmail/weekagenda-pdf.php?tm='.$tm.'" target="_blank">Download</a></p>
				<p>**ดูรายละเอียดทั้งหมด <a href="http://ns2.ph.mahidol.ac.th/room/" target="_blank">http://ns2.ph.mahidol.ac.th/room/</a></p>';*/
					
	//$body = eregi_replace("[\]",'',$body);
	//$attach = $livesite.'directmail/event-pdf.php';
	//@smtpmail('chakkapan.cha@mahidol.ac.th', 'รายการจองห้องวันที่ '.dateThai($tm), $body);
	$rs = mysql_query("select * from mail_contact_it order by email asc");
	while($ob = mysql_fetch_assoc($rs)){
		$send = smtpmail($ob['email'], 'รายการจองห้องวันที่ '.dateThai(date('Y-m-d',strtotime($tm.' +1 days'))), $body);
		
		/*if($send){
			$send_msg = blog_alert_03('success','<i class="fa fa-check"></i> Success', $ob['email']);
		}else if(!$send){
			$send_msg = blog_alert_03('warning','<i class="fa fa-exclamation"></i> Warning',$ob['email']);
		}*/

	}
	
	//getcountry from ip
	/*$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
	$country = $details->country;*/
	mysql_query("insert into mail_contact_itlog (id, dateSent, ipSent) values ('".maxid('mail_contact_itlog', 'id')."', '".date('Y-m-d H:i:s')."', '".$_SERVER['REMOTE_ADDR']."')");
	//send email

//line notify
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
	//$token2 = 'TSO53WsLyFEH66QLjBuJwDzvFh9BYGG8UNSbHSv4YsV';
	
	$str = "แจ้งเตือนการจองใช้ห้องประชุม: วัน ".dateThai3(date('Y-m-d'))." Click ".$livesite.'directmail/weekagenda.php?tm='.date('Y-m-d', strtotime($tm.' -1 day'));
	
	notify_message($str,$token);

	//notify_message($str, $token2);
	
}
//line notify

//include('../bookingroom/js-inc.php');
?>
