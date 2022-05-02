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
		$sql2="select *, meetingroom_croom.name as a 
		from meetingroom_userq,meetingroom_croom, jos_users, organization
		where meetingroom_userq.u_id=jos_users.id
		and meetingroom_userq.cr_id=meetingroom_croom.cr_id
		and jos_users.DeID=organization.DeID
		order by meetingroom_userq.Dater desc";
		$rs2=mysql_query($sql2);
		$total=mysql_num_rows($rs2);
		?>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
      <tr bgcolor="#59993f">
              <th><div align="center" class="style3">วันที่จอง</div></th>
        <th><div align="center" class="style3">หัวข้อ / วัตถุประสงค์</div></th>
        <th>ผู้จอง</th>
        <th>ห้อง</th>
		<!--<th>สถานะ</th> -->
        </tr>
	  <?php
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
	  ?>
      <tr bgcolor="#e9e9e9">
              <td align="center" valign="top"><?php print dateThai2($ob2[Dater]); ?><br/>
              <?php echo $ob2["T_in"]; ?> - <?php echo $ob2["T_out"]; ?></td>
		<td><a href="#" onclick="NewWin=window.open('inc/roomview.inc.php?<? echo"ID=$ob[id]"; ?>','NewWin','toolbar=no,status=no,width=800,height=600');" title="รายละเอียด"><?php echo $ob2["title"]; ?></a></td>
	  	<td align="center"><?php print $ob2[name]; ?><br/>
  	    <?php print $ob2[Fname]; ?><br/>
        โทร. <?php print $ob2[tel]; ?></td>
        <td><input name="" type="text" size="1" readonly="true" style="background:<?php print $ob2[color]; ?>; border:#FFF"> <?php print $ob2[a]; ?></td>
		<!--<td align="center"><?php #echo $ob2["status"]; ?></td> -->
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
    </table>
<script src="bookingroom/js/mergecell.js" type="text/javascript"></script>