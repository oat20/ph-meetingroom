<?php
#$today=date("Y-m-d");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="100%" border="0" cellspacing="1" bgcolor="#CCCCCC">
<tr bgcolor="#B2DFFF">
          <th><div align="center">ห้อง</div></th>
          <th><div align="center">วันที่ี</div></th>
          <th><div align="center">หัวข้อ / วัตถุประสงค์</div></th>
          <th><div align="center">ผู้จอง</div></th>
          <th><div align="center">วันที่ยกเลิก</div></th>
        </tr>
		<?php
		$sql="select  *, meetingroom_croom.name as r_name
		from meetingroom_userq,meetingroom_croom,organization,jos_users
		where meetingroom_userq.DeID='$ses_deid'
		and meetingroom_userq.cr_id=meetingroom_croom.cr_id
		and meetingroom_userq.u_id=jos_users.id
		and jos_users.DeID=organization.DeID
		and meetingroom_userq.status1='0' 
		order by meetingroom_userq.Dater desc";
		$rs=mysql_query($sql);
		while($ob=mysql_fetch_array($rs)){
		?>
        <tr bgcolor="#ffffff">
          <td align="center"><input type="text" readonly=true size="1" style="background:<?php print $ob[color]; ?>; border:#FFFFFF" /> <?php print $ob[r_name]; ?></td>
		<td align="center"><?php print dateThai2($ob[Dater]); ?><br/><?php echo $ob["T_in"]; ?> - <?php echo $ob["T_out"]; ?></td>
	  	<td><?php echo $ob["title"]; ?></td>
        <td align="center"><?php print $ob[name]; ?><br/><?php print $ob[Fname]; ?><br/>โทร. <?php print $ob[tel]; ?></td>
        <td><?php print dateThai2($ob[modified]); ?></td>
        </tr>
		<?php
		}
		?>
      </table>