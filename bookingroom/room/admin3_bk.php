<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            	<?php
				$cmd2="select * from room_type order by id asc";
				$rs2=mysql_query($cmd2);
				while($ob2=mysql_fetch_array($rs2))
				{
            		echo '<tr>';
                	echo '<th colspan="8">'.$ob2['name'].'</th>';
                	echo '<tr>'
				?>
			<tr bgcolor="#B2DFFF">
            	<th>#</th>
				<th>ห้อง</th>
				<th>ความจุ (คน)</th>
                <th>ที่ตั้ง</th>
                <th>แก้ไขล่าสุด</th>
                <th>ใช้งาน</th>
                <th></th>
			</tr>
            </thead>
            <tbody>
          <?php
	$a=1;
    /*$cmd = "select meetingroom_croom.name as a, meetingroom_croom.color, meetingroom_croom.net, meetingroom_croom.location, meetingroom_croom.cr_id, room_type.name as b, mid(meetingroom_croom.dater,1,10) as c, meetingroom_croom.enable 
	from meetingroom_croom
	left join room_type on (meetingroom_croom.parent = room_type.id)
	order by meetingroom_croom.dater desc";*/
	$cmd = "select meetingroom_croom.name as a, meetingroom_croom.color, meetingroom_croom.net, meetingroom_croom.location, meetingroom_croom.cr_id, mid(meetingroom_croom.dater,1,10) as c, meetingroom_croom.enable 
	from meetingroom_croom
	where meetingroom_croom.parent = '$ob2[id]'
	order by meetingroom_croom.dater desc";
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
			#echo $a; ?>
			<tr bgcolor="<?php echo $color; ?>">
            	<td><?php echo ++$r;?>.</td>
				<td><input name="" type="text" size="1" readonly style="background:<?php echo $row["color"]; ?>; border:#FFF"> <?php echo $row["a"]; ?></td>
				<td align="center"><?php echo $row["net"]; ?></td>
                <td><?php echo $row["location"]; ?></td>
                <td align="center"><?php echo dateformat2($row[c]);?></td>
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
                <td align="center"><a href="room.php?key_cid=<?php echo $row["cr_id"]; ?>" title="แก้ไข"><img src="bookingroom/img/edit_icon.gif" border="0" /></a>
                <a href="bookingroom/room/admin3-2.php?key_cid=<?php echo $row["cr_id"]; ?>&action=del" onClick="return confirm('ยืนยันการลบรายการ');" title="ลบ"><img src="bookingroom/img/delete_icon.gif" border="0" /></a></td>
				 </tr>
			<?php
			#$a++;
	}		
	#mysql_close($link);
?>
	</tbody>
    <?php
				}
	?>
</table>
<?php include("bookingroom/room/room.htm");?>
</body>
</html>
