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
		$sql2="select *,meetingroom_croom.name as r_name from meetingroom_userq
		inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
		inner join book_status on (meetingroom_userq.status1=book_status.sta_id)
		inner join room_time on (room_time.tim_id=meetingroom_userq.time_in)
		inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
		where meetingroom_userq.u_id='$_SESSION[u]'
		and meetingroom_userq.status1='$_GET[sta_id]'
		order by meetingroom_userq.Dater desc";
		$rs2=mysql_query($sql2);
		$total=mysql_num_rows($rs2);
		?>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" id="merge" class="table">
    	<thead>
      <tr bgcolor="#59993f">
      	<th colspan="3">Actions</th>
        <th class="td1">เลขที่รายการ</th>
        <th class="td1"><div align="center" class="style3">ชื่องาน</div></th>
        <th class="td1">ห้อง</th>
		<th class="td1"><div align="center" class="style3">วันที่จอง</div></th>
        <!--<th>ผู้จอง</th> -->
        <!--<th class="td1">ยืนยันจาก หน.ภาควิชา/งาน</th>-->
        <th class="td1">เลขานุการคณะฯ อนุมัติ</th>
        <th class="td1">สถานภาพ</th>
        <!--<th class="td1">ตรวจสอบ</th> -->
		<!--<th>ยกเลิก</th> -->
        </tr>
        </thead>
        <tbody>
	  <?php
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
			?>
      <tr bgcolor="#e9e9e9">
      	<td align="center"><a href="#" onclick="NewWin=window.open('bookingroom/inc/roomview.inc.php?<? echo"ID=$ob2[uq_id]"?>','NewWin','toolbar=no,status=no,width=800,height=600'); " title="แสดงรายละเอียด"><img src="bookingroom/img/edit.gif" border="0"></a></td>
      	<!--<td align="center"><a href="formbooking.php?mode=edit&keyuq_id=<?php print $ob2[uq_id]; ?>" title="แก้ไข"><img src="bookingroom/img/edit_icon.gif" border="0"></a></td> -->
        <td align="center"><a href="bookingroom/booking_detail_pdf.php?<? echo"ID=$ob2[uq_id]"?>" target="_blank"><img src="bookingroom/img/print.gif" border="0"/></a></td>
        <td align="center">
        	<?php
			if($ob2[status1] <> "3"){
			?>
        <a href="bookingroom/booking/delbook.php?keyuq_id=<?php print $ob2[uq_id]; ?>" title="ยกเลิกการใช้ห้อง" onClick="return confirm('คุณแน่ใจว่าต้องการยกเลิกข้อมูลนี้')"><img src="bookingroom/img/publish_x.png" border="0"></a>
        <?php
			}else{
				print "&nbsp;";
			}
		?>
        </td>
        <!--<td align="center"><a href="formbooking.php?mode=copy&keyuq_id=<?php //print $ob2[uq_id]; ?>" title="คัดลอก"><img src="bookingroom/img/button_save.png" border="0"></a></td> -->
        <td><?php echo $ob2["uq_id"];?></td>
        <td><?php echo $ob2["title"]; ?></td>
        <td><input type="text" readonly=true size="1" style="background:<?php print $ob2[color]; ?>; border:#FFFFFF" /> <?php print $ob2[r_name]; ?></td>
		<td><?php print dateThai($ob2[Dater]); ?><br/><?php echo $ob2["start"]; ?> - <?php echo $ob2["end"]; ?></td>
        <!--<td align="center"><?php print $ob2[name]; ?><br/><?php print $ob2[Fname]; ?><br/>โทร. <?php print $ob2[tel]; ?></td> -->
        <!--<td align="center"><strong><?=$ob2["sta"];?></strong></td> -->
        <!--<td>
        	<center>
        	<?php
			/*if($ob2['boss_confirm'] == '1'){
				echo '<img src="'.$livesite.'bookingroom/img/tick.png">';
			}else{
				echo '<img src="'.$livesite.'bookingroom/img/publish_x.png">';
			}*/
			?>
            </center>
        </td>-->
        <td>
        	<center>
        	<?php
			if($ob2['confirm'] == '1'){
				echo '<img src="'.$livesite.'bookingroom/img/tick.png">';
			}else{
				echo '<img src="'.$livesite.'bookingroom/img/publish_x.png">';
			}
			?>
            </center>
        </td>
        <td align="center"><?php echo $ob2['sta'];?></td>
        <!--<td align="center">
        <?php
		/*if($ob[confirm_by] == 0){
			print "<img src='bookingroom/img/flag_inprocess.gif' />";
		}else{
			print "<img src='bookingroom/img/tick.png' />";
		}*/
		?>
        </td> -->
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
      </tbody>
    </table>