<style type="text/css">
#Layer11 {position:absolute;
	left:2px;
	top:5px;
	width:997px;
	height:755px;
	z-index:9;
}
#Layer14 {position:absolute;
	left:23px;
	top:36px;
	width:936px;
	height:299px;
	z-index:12;
}
#Layer15 {	position:absolute;
	left:22px;
	top:-1px;
	width:967px;
	height:32px;
	z-index:12;     
}
a:link {
	color: #3399FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #3399FF;
}
a:hover {
	text-decoration: underline;
	color: #3399FF;
}
a:active {
	text-decoration: none;
	color: #3399FF;
}
.style3 {font-size: 12; }
</style>
	<?php
		#$sql2="select * from meetingroom_userq,meetingroom_croom
		#where meetingroom_userq.Dater >= '$today'
		#and meetingroom_userq.u_id='$u'
		#and meetingroom_userq.cr_id=meetingroom_croom.cr_id
		#order by meetingroom_userq.Dater asc";
		$sql2="select *, meetingroom_croom.name as r_name, DATE_FORMAT(meetingroom_userq.created, '%d/%m/%Y') as created 
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where mid(meetingroom_userq.created,1,7) = '".date("Y-m")."'
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		order by meetingroom_userq.created desc, 
		meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc
		limit 0,10";
		$rs2=mysqli_query($mysqli, $sql2);
		$total=mysqli_num_rows($rs2);
		list($tel,$email) = explode("/",$ob2["email"]);
		?>
        <div class="table-responsive">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-striped table-bordered">
    	<thead>
      <tr>
        <th>Actions</th>
        <th>เลขที่รายการ</th>
        <th>ลงวันที่</th>
        <th>ห้อง</th>
        <th><div class="style3">วันที่จอง</div></th>
        <th><div class="style3">วัตถุประสงค์</div></th>
        <th>ผู้จอง</th>
        <th>สถานภาพ</th>
        </tr>
        	</thead>
            <tbody>
	  <?php
		$a=1;
		while($ob2=mysqli_fetch_array($rs2)){
			if($ob2['uq_cancel'] == 'Yes'){
				$active = 'danger';
			}else if($ob2['confirm'] == '2'){
				$active = 'warning';
			}else{
				$active = '';
			}
	  ?>
      <tr bgcolor="#e9e9e9" class="<?php print $active;?>">
      	<td>
        	<div class="btn-group btn-group-sm">
            	<a href="3_bookingupdate.php?uq_id=<?php echo $ob2["uq_id"];?>" class="btn btn-default"><i class="fa fa-file-text"></i> จัดการใบจอง</a>
                <a href="bookingroom/booking_detail2_pdf.php?uq_id=<?php echo $ob2["uq_id"];?>" class="btn btn-default" target="new"><i class="fa fa-print"></i> พิมพ์</a>
                <a href="3_remove_booking.php?uq_id=<?php echo $ob2['uq_id'];?>" class="btn btn-default" onClick="return confirm('ยืนยันลบข้อมูล');"><i class="fa fa-trash"></i> Remove</a>
            </div>
        </td>
      	<td><?php echo $ob2["uq_id"];?></td>
        <td><?php echo $ob2["created"];?></td>
	  	<td><div class="activity2" style="background-color:<?php echo $ob2["color"];?>"><?php echo $ob2['r_name']; ?></div></td>
		<td><?php print dateThai2($ob2['Dater']).' เวลา '.$ob2["time_in"].' - '.$ob2["time_out"]; ?></td>
	  	<td><?php echo $ob2["title"]; ?></td>
        <td><?php print $ob2['uname'].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"]; ?></td>
        <td><small><dl class="dl-horizontal">
  				<dt>รับเรื่อง:</dt>
  				<dd><?php echo $cf_status_recive[$ob2["status1"]];?></dd>
                <dt>เลขาฯ อนุมัติ:</dt>
  				<dd><?php echo $cf_msgicon2[$ob2["confirm"]];?></dd>
                <dt>ยกเลิก:</dt>
  				<dd><?php echo $cf_yn2[$ob2["uq_cancel"]];?></dd>
			</dl></small></td>
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
      </tbody>
    </table>
</div>