<style type="text/css">
<!--
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
body,td,th {
	font-family: "Courier New", Courier, monospace;
	font-size: 12px;
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
-->
</style>
	<?php
		#$sql2="select * from meetingroom_userq,meetingroom_croom
		#where meetingroom_userq.Dater >= '$today'
		#and meetingroom_userq.u_id='$u'
		#and meetingroom_userq.cr_id=meetingroom_croom.cr_id
		#order by meetingroom_userq.Dater asc";
		$sql2="select *, meetingroom_croom.name as r_name 
		from meetingroom_userq,meetingroom_croom,organization,jos_users,book_status
		where meetingroom_userq.Dater >= '$today'
		and meetingroom_userq.DeID='$ses_deid'
		and meetingroom_userq.cr_id=meetingroom_croom.cr_id
		and meetingroom_userq.u_id=jos_users.id
		and jos_users.DeID=organization.DeID
		and meetingroom_userq.status1 = book_status.sta_id
		order by meetingroom_userq.Dater asc";
		$rs2=mysql_query($sql2);
		$total=mysql_num_rows($rs2);
		?>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#59993f">
      	<th>&nbsp;</th>
       <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      <th>ห้อง</th>
		<th><div align="center" class="style3">วันที่จอง</div></th>
        <th><div align="center" class="style3">หัวข้อ / วัตถุประสงค์</div></th>
        <th>ผู้จอง</th>
        <th>สถานะ</th>
		<!--<th>ยกเลิก</th> -->
        </tr>
	  <?php
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
	  ?>
      <tr bgcolor="#e9e9e9">
      	<td align="center"><a href="formbooking.php?mode=edit&keyuq_id=<?php print $ob2[uq_id]; ?>" title="แสดง"><img src="bookingroom/img/edit.gif" border="0"></a></td>
      	<td align="center"><a href="formbooking.php?mode=edit&keyuq_id=<?php print $ob2[uq_id]; ?>" title="แก้ไข"><img src="bookingroom/img/edit_icon.gif" border="0"></a></td>
        <td align="center"><a href="bookingroom/booking/delbook.php?keyuq_id=<?php print $ob2[uq_id]; ?>" title="ยกเลิก" onClick="return confirm('คุณแน่ใจว่าต้องการยกเลิกข้อมูลนี้')"><img src="bookingroom/img/publish_x.png" border="0"></a></td>
        <td align="center"><a href="formbooking.php?mode=copy&keyuq_id=<?php print $ob2[uq_id]; ?>" title="คัดลอก"><img src="bookingroom/img/button_save.png" border="0"></a></td>
	  	<td align="center"><input type="text" readonly=true size="1" style="background:<?php print $ob2[color]; ?>; border:#FFFFFF" /> <?php echo $ob2[r_name]; ?></td>
		<td align="center"><?php print dateThai2($ob2[Dater]); ?><br/><?php echo $ob2["T_in"]; ?> - <?php echo $ob2["T_out"]; ?></td>
	  	<td><?php echo $ob2["title"]; ?></td>
        <td align="center"><?php print $ob2[name]; ?><br/><?php print $ob2[Fname]; ?><br/>โทร. <?php print $ob2[tel]; ?></td>
        <td align="center"><img src="<?php print $img_path.$ob2["img"]; ?>" /></td>
		<!--<td align="center">
			<?php
			#if($ob2[status1]==1){
				#print "NO";
			#}else{
				#print "YES";
			#} 
			?>
         </td> -->
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
    </table>
