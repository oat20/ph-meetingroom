<?php
#$today=date("Y-m-d");
include("connect_db.php");
connect_db();
?>
<!--<h3>รายการจองวันนี้</h3> -->
<table width="100%" border="0" cellspacing="0">
	<tr bgcolor="#B2DFFF">
	<th>ห้อง</th>
	<th>เช้า</th>
	<th>บ่าย</th>
	</tr>
    <?php
	$sql="select id,name from room_type
	order by id asc";
	$rs=mysql_query($sql);
	while($ob=mysql_fetch_array($rs))
	{
	?>
    <tr>
    	<td colspan="3"><?=$ob[name];?></td>
    </tr>
    <?php
		$sql2="select cr_id,name from meetingroom_croom
		where parent='$ob[id]'
		order by cr_id asc";
		$rs2=mysql_query($sql2);
		while($ob2=mysql_fetch_array($rs2))
		{
			print "<tr>";
				print "<td>".$ob2[name]."</td>";
                print "<td></td>";
                print "<td></td>";
			print "</tr>";
		}
	}
	?>
    <ul>
<?php
#$room_booking="select * from room_booking
#where '$today' between startdate and enddate
#order by starttime asc";
$room_booking="select * from meetingroom_userq,meetingroom_croom
where meetingroom_userq.Dater='$today' and meetingroom_userq.cr_id=meetingroom_croom.cr_id
order by meetingroom_userq.T_in asc";
$rs_room_booking=mysql_query($room_booking);
$num_room_booking=mysql_num_rows($rs_room_booking);
#$a=1;
while($ob_room_booking=mysql_fetch_array($rs_room_booking)){
?>
	<li><?php print $ob_room_booking[T_in]."-".$ob_room_booking[T_out]; ?> <a href="#" title="<?php print $ob_room_booking[name]; ?>"><?php print $ob_room_booking[title]; ?></a></li>
	<!--<tr>
		<td align="center"><?php #echo $a; ?></td>
		<td align="center"><?php #echo $ob_room_booking["starttime"]; ?> - <?php #echo $ob_room_booking["endtime"]; ?></td>
		<td><?php #echo $ob_room_booking["category"]; ?></td>
		<td><?php #echo $ob_room_booking["subject"]; ?><br/><a href="#" onClick="NewWin=window.open('inc/roomview.inc.php?<? #echo"ID=$ob_room_booking[id]"; ?>','NewWin','toolbar=no,status=no,width=800,height=600');">´</a></td>
		<td><?php #echo $ob_room_booking["dp_name"]; ?></td>
	</tr> -->
<?php
		#$a++;
	}
	?>
	</table>
    </ul>
<?php
	if($num_room_booking == 0){
			echo "<center>- ไม่มีรายการ -</center>";
	}
?> 