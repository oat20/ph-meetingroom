<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
	top:0px;
	width:936px;
	height:299px;
	z-index:12;
}
#Layer15 {position:absolute;
	left:23px;
	top:2px;
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
	text-decoration: none;
	color: #66FFFF;
}
a:active {
	text-decoration: none;
	color: #66FFFF;
}
.style16 {color: #FF0000}
-->
</style>

<script type="text/javascript" src="../POPcolors/202pop.js"></script>
<link rel='stylesheet' href='../POPcolors/style.css'>
</head>

<body>
	
<table width="100%" cellspacing="1" class="table">
        	<thead>
			<tr bgcolor="#B2DFFF">
            	<th>#</th>
				<th>ห้อง</th>
				<th>ความจุ (คน)</th>
                <th>ที่ตั้ง</th>
                <th>ประเภท</th>
                <th>รูปแบบ</th>
                <th>ใช้งาน</th>
                <th>Actions</th>
			</tr>
            </thead>
            <tbody>
          <?php
	$a=1;
	$cmd = "select *, meetingroom_croom.name as a, meetingroom_croom.color, meetingroom_croom.net, meetingroom_croom.location, meetingroom_croom.cr_id, mid(meetingroom_croom.dater,1,10) as c, meetingroom_croom.enable 
	from meetingroom_croom
	inner join room_type on (meetingroom_croom.parent = room_type.id)
	order by meetingroom_croom.cr_id asc";
	#mysql_query($cmd,$link);
	$result = mysql_query($cmd);
	$swap="1";
	while($row=mysql_fetch_array($result))
	{
		if($swap=="1"){
			$color="";
			$swap="2";
		}else{
			$color="#C9D1CD";
			$swap="1";
		}
		
		$sql2 = mysql_query("select * from meetingroom_tableformat
		where tf_id = '$row[tf_id]'");
		$ob2 = mysql_fetch_assoc($sql2);
			#echo $a; ?>
			<tr bgcolor="<?php echo $color; ?>">
            	<td><?php echo ++$r;?></td>
				<td><div class="activity2" style="background-color:<?php echo $row["color"];?>"><?php echo $row["a"]; ?></div></td>
				<td align="center"><?php echo $row["net"]; ?></td>
                <td><?php echo $row["location"]; ?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $ob2["tf_title"].'<br><small>เปลี่ยนรูปการจัดโต๊ะได้ '.$cf_yn2[$row['cr_tablechange']].'</small>';?></td>
                <td align="center">
                	<?php
					if($row[enable] == 1)
					{
						print "<img src='bookingroom/img/tick.png' border='0' />";
					}
					else
					{
						print "<img src='bookingroom/img/publish_x.png' border='0' />";
					}
					?>
                </td>
                <td><div class="btn-group btn-group-sm"><a href="bookingroom/room/room.php?key_cid=<?php echo $row["cr_id"]; ?>" title="แก้ไข" class="btn btn-default"><i class="fa fa-edit"></i> แก้ไข</a>
                <a href="bookingroom/room/room-photo.php?key_cid=<?php echo $row["cr_id"]; ?>" class="btn btn-default"><i class="fa fa-file-image-o" aria-hidden="true"></i> ภาพประกอบ</a>
                <a href="bookingroom/room/admin3-2.php?key_cid=<?php echo $row["cr_id"]; ?>&action=del" onClick="return confirm('ยืนยันการลบรายการ');" title="ลบ" class="btn btn-default"><i class="fa fa-times"></i> ลบ</a></div></td>
				 </tr>
			<?php
			#$a++;
	}		
	#mysql_close($link);
?>
	</tbody>
</table>
<?php //include("bookingroom/room/room.htm");?>
</body>
</html>
