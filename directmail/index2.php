<?php
session_start();

include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");
include('../mailer/mail.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php print $sitename;?></title>
<?php include('../bookingroom/css-inc.php');?>
</head>

<body>
<?php
$tm=date('Y-m-d',strtotime($date_regis.' +1 days'));

if($_GET['action'] == 'sendmail'){
	
	//send email
	$body = file_get_contents($livesite.'directmail/event-html.php?tm='.$tm);
	/*$body = '<p><img src="http://www.ph.mahidol.ac.th/img/logo.png" border="0"></p>
				<p><strong>รายการจองห้องวันที่ '.dateThai($tm).' สามารถดูตาม Link ด้านล่างนี้</strong><br><a href="'.$livesite.'directmail/event-pdf.php?tm='.$tm.'" target="_blank">Download</a></p>
				<p>**ดูรายละเอียดทั้งหมด <a href="http://ns2.ph.mahidol.ac.th/room/" target="_blank">http://ns2.ph.mahidol.ac.th/room/</a></p>';*/
					
	//$body = eregi_replace("[\]",'',$body);
	//$attach = $livesite.'directmail/event-pdf.php';
	//@smtpmail('chakkapan.cha@mahidol.ac.th', 'รายการจองห้องวันที่ '.dateThai($tm), $body);
	$rs = mysql_query("select * from mail_contact_it order by email asc");
	while($ob = mysql_fetch_assoc($rs)){
		$send = smtpmail($ob['email'], 'รายการจองห้องวันที่ '.dateThai($tm), $body);
		
		if($send){
			$send_msg = blog_alert_03('success','<i class="fa fa-check"></i> Success', $ob['email']);
		}else if(!$send){
			$send_msg = blog_alert_03('warning','<i class="fa fa-exclamation"></i> Warning',$ob['email']);
		}

	}
		
	mysql_query("insert into mail_contact_itlog (id, dateSent, ipSent) values ('".maxid('mail_contact_itlog', 'id')."', '".date('Y-m-d H:i:s')."', '".$_SERVER['REMOTE_ADDR']."')");
	//send email

}
?>
<div class="container-fluid">
	
    <div class="page-header clearfix">
    	<div class="pull-left"><img src="<?php echo $livesite;?>bookingroom/img/logo2.png" class="img-responsive"></div>
    	<h3 class="pull-right">Notification Events (<?php print dateThai($tm);?>)</h3>
    </div>
    
    <?php print $send_msg;?>
    
    <table border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-striped">
    	<thead>
      <tr>
        <th>Status</th>
        <th>เวลา</th>
        <th>ห้อง</th>
        <th><div class="style3">วันที่จอง</div></th>
        <th><div class="style3">วัตถุประสงค์</div></th>
        <th>ผู้จอง</th>
        </tr>
        	</thead>
            <tbody>
	  <?php	  
	  $sql2="select *, meetingroom_croom.name as r_name
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where meetingroom_userq.Dater='$tm' 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		order by meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc";
		$rs2 = mysql_query($sql2);
		$row = mysql_num_rows($rs2);
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
	  ?>
      <tr>
          <td>
		  	<?php echo '<p class="activity2" style="background-color:'.$cf_msgicon2_noicon[$ob2['confirm']]['status-color'].'">'.$cf_msgicon2_noicon[$ob2['confirm']]['icon'].' '.$cf_msgicon2_noicon[$ob2['confirm']]['title'].'</p>';?>
          </td>
          <td><?php print $ob2["time_in"].' - '.$ob2["time_out"];?></td>
	  	<td><div class="activity2" style="background-color:<?php echo $ob2["color"];?>"><?php echo $ob2[r_name]; ?></div></td>
		<td><?php print dateThai($ob2[Dater]);?></td>
	  	<td><?php echo $ob2["title"]; ?></td>
        <td><?php print $ob2[uname].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"]; ?></td>
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
      </tbody>
    </table>
    
    <?php
	if($row != 0){
    	print '<p><a href="'.$_SERVER['PHP_SELF'].'?action=sendmail" class="btn btn-default btn-lg"><i class="fa fa-paper-plane"></i> Sendmail</a></p>';
	}else{
    	print '<p><a href="" class="btn btn-default btn-lg disabled"><i class="fa fa-paper-plane"></i> Sendmail</a></p>';
	}
	?>
    
</div>

<?php include('../bookingroom/js-inc.php');?>
</body>
</html>