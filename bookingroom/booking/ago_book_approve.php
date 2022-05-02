<form method="post" action="bookingroom/booking/approve_action.php">
	<fieldset>
    	<legend>รายการที่ผ่านมา</legend>
<table width="100%" border="0" cellspacing="0">
	<tr>
    	<td colspan="7"><input name="" type="submit" value="ตรวจสอบ" class="button2" onclick="return confirm('ยืนยันการอนุมัติ');" /></td>
    </tr>
        <tr bgcolor="#B2DFFF">
			<!--<th></th>
			<th></th> -->
            <th></th>
          <th><div align="center">ชื่องาน</div></th>
          <th><div align="center">ห้อง</div></th>
          <th><div align="center">วันที่จอง</div></th>
          <th>ชื่อผู้จอง</th>
          <th><div align="center">สถานภาพ</div></th>
        </tr>
		<?php
		$sql="select meetingroom_userq.Dater, room_time.start, room_time.end, jos_users.name, organization.Fname, meetingroom_userq.detail, meetingroom_userq.optionss, meetingroom_userq.created, book_status.sta, meetingroom_userq.title, meetingroom_croom.color, meetingroom_croom.name as room_name, book_status.img, mid(meetingroom_userq.created,12,5) as time_created, meetingroom_userq.uq_id
	   from meetingroom_userq, meetingroom_croom, jos_users, book_status, room_time, organization
	   where meetingroom_userq.time_in = room_time.tim_id
	   and meetingroom_userq.u_id = jos_users.id
	   and meetingroom_userq.cr_id = meetingroom_croom.cr_id
	   and meetingroom_userq.status1 = book_status.sta_id
	   and jos_users.DeID = organization.DeID
	   and mid(meetingroom_userq.created,1,10) < '$today'
	   order by meetingroom_userq.created desc";
		$rs=mysql_query($sql);
		while($ob=mysql_fetch_array($rs)){
		?>
        <tr>
			<!--<td align="center"><a href="#"><img src="<?php #echo $livesite; ?>img/edit_icon.gif" border="0"></a></td> -->
			<!--<td align="center"><a href="#"><img src="<?php #echo $livesite; ?>img/delete_icon.gif" border="0"></a></td> -->
            <td align="center"><input name="keyuq_id[]" type="checkbox" value="<?=$ob["uq_id"];?>" /></td>
          <td><a href="#" onClick="NewWin=window.open('bookingroom/inc/roomview.inc.php?<? echo"ID=$ob[uq_id]"?>','NewWin','toolbar=no,status=no,width=800,height=600'); "><?php echo $ob["title"]; ?></a></td>
          <td><?php echo $ob["room_name"]; ?></td>
          <td><?=dateThai($ob["Dater"])."<br/>".$ob["start"]."-".$ob["end"];?></td>
          <td><?=$ob["name"]."<br/>".$ob["Fname"];?></td>
          <td align="center"><a href="#" title="<?=$ob[sta];?>"><img src="<?php print $img_path.$ob["img"]; ?>" /></a></td>
        </tr>
		<?php
		}
		?>
        <tr>
    	<td colspan="7"><input name="" type="submit" value="ตรวจสอบ" class="button2" onclick="return confirm('ยืนยันการอนุมัติ');" /></td>
    </tr>
      </table>
      	</fieldset>
      </form>