<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");
include('../mailer/mail.php');

include('../bookingroom/css-inc.php');
?>

<body>
<?php
if($_GET['action'] == 'sendmail'){
	
	//send email
	//$body = file_get_contents($livesite.'directmail/weekagenda.php?tm='.$_GET['tm']);
	$body = '<p><img src="http://www.ph.mahidol.ac.th/img/logo.png" border="0"></p>
				<p><strong>รายการจองห้องวันที่ '.dateThai(date('Y-m-d',strtotime($_GET['tm'].' +1 days'))).' สามารถดูตาม Link ด้านล่างนี้</strong><br><a href="'.$livesite.'directmail/weekagenda-pdf.php?tm='.$_GET['tm'].'" target="_blank">Download</a></p>
				<p>**ดูรายละเอียดทั้งหมด <a href="http://ns2.ph.mahidol.ac.th/room/" target="_blank">http://ns2.ph.mahidol.ac.th/room/</a></p>';
					
	//$body = eregi_replace("[\]",'',$body);
	//$attach = $livesite.'directmail/event-pdf.php';
	//@smtpmail('chakkapan.cha@mahidol.ac.th', 'รายการจองห้องวันที่ '.dateThai($tm), $body);
	$rs = mysql_query("select * from mail_contact_it order by email asc");
	while($ob = mysql_fetch_assoc($rs)){
		$send = smtpmail($ob['email'], 'รายการจองห้องวันที่ '.dateThai(date('Y-m-d',strtotime($_GET['tm'].' +1 days'))), $body);
		
		if($send){
			$send_msg = blog_alert_03('success','<i class="fa fa-check"></i> Success', $ob['email']);
		}else if(!$send){
			$send_msg = blog_alert_03('warning','<i class="fa fa-exclamation"></i> Warning',$ob['email']);
		}

	}
		
	mysql_query("insert into mail_contact_itlog (id, dateSent, ipSent) values ('".maxid('mail_contact_itlog', 'id')."', '".date('Y-m-d H:i:s')."', '".$_SERVER['REMOTE_ADDR']."')");
	//send email

}

$tm=date('Y-m-d');
?>

<div class="container-fluid">

	<div class="row">
    	<div class="col-lg-6 col-lg-offset-3">
        	<h4 class="page-header"><i class="fa fa-share-alt"></i> แจ้งกำหนดการจองห้องประจำวัน <?php echo dateThai3(date('Y-m-d',strtotime($tm.' +1 days')));?></h4>
            <?php echo $send_msg;?>
            <p><a href="<?php echo $_SERVER['PHP_SELF'];?>?action=sendmail&tm=<?php echo $tm;?>" class="btn btn-default btn-lg btn-block"><i class="fa fa-check"></i> Yes</a></p>
            <p><a href="../index.php" class="btn btn-danger btn-lg btn-block"><i class="fa fa-times"></i> No</a></p>
        </div><!--col-->
    </div><!--row-->
    
</div><!--container-->

<?php include('../bookingroom/js-inc.php');?>
</body>