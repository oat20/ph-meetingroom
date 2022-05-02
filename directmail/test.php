<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include('../mailer/mail.php');

$email='chakkapan.cha@mahidol.ac.th';
$subject='ทดสอบ';
$body=file_get_contents('http://ns2.ph.mahidol.ac.th/room/directmail/weekagenda.php?tm=2017-03-07');
/*$body = '<p><img src="http://www.ph.mahidol.ac.th/img/logo.png" border="0"></p>
				<p><strong>รายการจองห้องวันที่ '.dateThai(date('Y-m-d',strtotime($_GET['tm'].' +1 days'))).' สามารถดูตาม Link ด้านล่างนี้</strong><br><a href="'.$livesite.'directmail/weekagenda02-pdf.php?tm='.$_GET['tm'].'" target="_blank">Download</a></p>
				<p>**ดูรายละเอียดทั้งหมด <a href="http://ns2.ph.mahidol.ac.th/room/" target="_blank">http://ns2.ph.mahidol.ac.th/room/</a></p>';*/
/*$headers = 'From: chakkapan.cha@mahidol.ac.th' . "\r\n" .
    'Reply-To: chakkapan.cha@mahidol.ac.th' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();*/
//echo smtpmail_02( $email , $subject , $body, 'weekagenda.pdf' );
//echo mail($email, $subject, $body, $headers);

//echo date('Y-m-d',strtotime("2017-03-07 +1 week"));
echo $body;
?>
<!--<iframe src="//ns2.ph.mahidol.ac.th/room/directmail/weekagenda.php?tm=2017-03-07" width="100%" height="100%"></iframe>-->