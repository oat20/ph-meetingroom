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
	font-size: 10pt;
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
	$sql="select *
	from meetingroom_croom
	where cr_id='$_GET[cr_id]'";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
	print "<h1>".$ob[name]." ".$ob[location]."</h1>";
	
		$sql2="select *,meetingroom_croom.name as r_name 
		from meetingroom_userq,meetingroom_croom,jos_users,room_time,book_status
		where meetingroom_userq.cr_id=meetingroom_croom.cr_id
		and meetingroom_userq.u_id=jos_users.id
		and meetingroom_userq.time_in=room_time.tim_id
		and meetingroom_userq.status1=book_status.sta_id
		and meetingroom_userq.cr_id='$_GET[cr_id]'
		and meetingroom_userq.Dater>='$today'
		order by meetingroom_userq.Dater,room_time.tim_id asc";
		$rs2=mysql_query($sql2);
		?>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#59993f">
        <th class="td1">ห้อง</th>
		<th class="td1"><div align="center" class="style3">วันที่ใช้ห้อง</div></th>
        <th class="td1"><div align="center" class="style3">ชื่องาน</div></th>
        <!--<th>ผู้จอง</th> -->
        <th class="td1">สถานะ</th>
		<!--<th>ยกเลิก</th> -->
        <th class="td1"></th>
        </tr>
	  <?php
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
			?>
      <tr bgcolor="#e9e9e9">
        <!--<td align="center"><a href="formbooking.php?mode=copy&keyuq_id=<?php print $ob2[uq_id]; ?>" title="คัดลอก"><img src="bookingroom/img/button_save.png" border="0"></a></td> -->
        <td><input type="text" readonly=true size="1" style="background:<?php print $ob2[color]; ?>; border:#FFFFFF" /> <?php print $ob2[r_name]; ?></td>
		<td align="center"><?php print dateThai2($ob2[Dater]); ?><br/><?php echo $ob2["start"]; ?> - <?php echo $ob2["end"]; ?></td>
	  	<td><?php echo $ob2["title"]; ?></td>
        <td align="center"><strong><?=$ob2["sta"];?></strong></td>
        <td align="center"><a href="bookingroom/inc/roomview.inc.php?ID=<?php print $ob2[uq_id]; ?>" title="รายละเอียดการจอง" rel="gb_page_center[640, 480]"><img src="<?=$livesite;?>bookingroom/img/edit.gif"/></a></td>
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
