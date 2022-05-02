<?php
$keyDater=$_GET["times"];
$keyenddate=$_GET["times"];

if($keyenddate == ""){
	$keyenddate = $keyDater;
}
?>
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
<h1>ข้อมูลการจองวันที่ <?php print dateThai($keyDater); ?></h1>
	<?php
		$sql2="select *,jos_users.name as a 
			from meetingroom_userq,organization,jos_users,meetingroom_croom, book_status
			where meetingroom_userq.u_id=jos_users.id
			and jos_users.DeID=organization.DeID
			and meetingroom_userq.cr_id=meetingroom_croom.cr_id
			and ((meetingroom_userq.Dater between '$keyDater' and '$keyenddate') or (meetingroom_userq.enddate between '$keyDater' and '$keyenddate'))
			and meetingroom_userq.status1 = book_status.sta_id
			order by meetingroom_userq.Dater, meetingroom_userq.T_in asc";
		$rs2=mysql_query($sql2);
		$total=mysql_num_rows($rs2);
		?>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" id="merge">
      <tr bgcolor="#59993f">
      <th><div align="center" class="style3">วัน</div></th>
      <th>เวลา</th>
      <th>ห้อง</th>
		<th><div align="center" class="style3">หัวข้อ / วัตถุประสงค์</div></th>
        <th>ผู้จอง</th>
		<th>สถานะ</th>
        </tr>
 	  <?php
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
	  ?>
      <tr bgcolor="#e9e9e9">
      <td align="center"  valign="top" class="font12px_b"><?php print dateThai($ob2[Dater])." - ".dateThai($ob2[enddate]); ?></td>
      <td align="center"><?php echo $ob2["T_in"]; ?> - <?php echo $ob2["T_out"]; ?></td>
      	<td align="center"><!--<img src="bookingroom/img/room/<?php #print $ob2["picData"]; ?>" class="img_size150" /><br/><br/> --><input type="text" readonly=true size="1" style="background:<?php print $ob2[color]; ?>; border:#FFFFFF" /> <?php print $ob2[name]; ?></td>
		<td><a href="bookingroom/inc/roomview.inc.php?ID=<?php print $ob2[uq_id]; ?>" title="รายละเอียดการจอง" rel="gb_page_center[640, 480]"><?php echo $ob2["title"]; ?></a></td>
        <td><strong><?php print $ob2[a]; ?></strong><br/><?php print $ob2[Fname]; ?><br/>โทร. <?php print $ob2[tel]; ?></td>
		<td align="center"><?php /*if($ob2[status1]=='1'){
		print "<a href=# title=ใช้งาน><img src=bookingroom/img/tick.png border=0 /></a>";
	}else{
		print "<a href=# title=ยกเลิก><img src=bookingroom/img/publish_x.png border=0 /></a>";
	}*/ ?><img src=<?php print $img_path.$ob2["img"]; ?> /></td>
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
    </table>
<script type="text/javascript" src="bookingroom/js/mergecell.js"></script>
