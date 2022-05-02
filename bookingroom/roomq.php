<!doctype html>
<html>
<head>
<meta charset="windows-874">
<title>Untitled Document</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:6px;
	top:7px;
	width:818px;
	height:893px;
	z-index:1;
}
body,td,th {
	font-family: "Courier New", Courier, monospace;
	font-size: 10pt;
}
a:link {
	color: #0066CC;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0066CC;
}
a:hover {
	text-decoration: none;
	color: #33CCFF;
}
a:active {
	text-decoration: none;
	color: #33CCFF;
}
#Layer14 {position:absolute;
	left:1px;
	top:50px;
	width:682px;
	height:158px;
	z-index:12;
}
-->
</style>
</head>

<body>
<blockquote>
    <p align="left">
	<?php
		$sql4="select room_booking.id, room_booking.startdate, room_booking.starttime, room_booking.endtime, room_category.category, room_booking.subject, room_booking.amount, room_booking.teacher, room_booking.course, tb_department.dp_name, room_booking.useradd, room_booking.id 
		from room_booking, room_category, tb_department
		where room_booking.id='$maxid' and room_booking.cid=room_category.cid and room_booking.depid=tb_department.dp_id";
		$rs4=mysql_query($sql4, $link);
		$ob4=mysql_fetch_array($rs4);
	?>
	<h3>รายละเอียดการจอง</h3>
	<table border="0">
	<tr>
		<td><strong>วันที่จอง :</strong></td>
		<td><?php echo dateThai($ob4["startdate"]); ?></td>
	</tr>
	<tr>
		<td><strong>ช่วงเวลา :</strong></td>
		<td><?php echo $ob4["starttime"]; ?> - <?php echo $ob4["endtime"]; ?></td>
	</tr>
      <tr> 
	  	<td><strong>ขอใช้ห้อง  :</strong></td>
		<td><?php echo $ob4["category"]; ?></td>
	</tr>
	<tr> 
		<td><strong>หัวข้ออบรม/วิชา   :</strong></td>
		<td><?php echo $ob4["subject"]; ?></td>
	</tr>
	<tr> 
		<td><strong>จำนวนนักศึกษา/ผู้เข้าอบรม   :</strong></td>
		<td><?php echo $ob4["amount"]; ?> คน</td>
	</tr>
	<tr>
		<td><strong>ผู้สอน :</strong></td>
		<td><?php echo $ob4["teacher"]; ?></td>
	</tr>
	<tr>
		<td><strong>หลักสูตร :</strong></td>
		<td><?php echo $ob4["course"]; ?></td>
	</tr>
		<tr>
		  <td><strong>หน่วยงานที่จอง :</strong></td>
		  <td><?php echo $ob4["dp_name"]; ?></td>
	  </tr>
		<tr> 
			<td><strong>ชื่อผู้จอง   :</strong></td>
			<td><?php echo $ob4["useradd"]; ?></td>
		</tr>
		<tr>
		  <td valign="top"><strong>โปรแกรมคอมพิวเตอร์มี่ต้องการใช้ :</strong></td>
		  <td>
		  <?php
		  	$sql="select * from room_program
			where id='$maxid'";
			$rs=mysql_query($sql, $link);
			while($ob=mysql_fetch_array($rs)){
		   			echo - $ob["program"]."<br/>";
				}
			?>
		  </td>
	  </tr>
	</table> 
	<br>
	<!--<table width="100%" border="0">
		<tr>
			<td><font color="#FF0000"><strong>หมายเหตุ : กรุณาตรวจสอบความถูกต้องในการจองของท่านให้เรียบร้อย เพราะเมื่อท่านทำการยืนยันการจองแล้วจะไม่สามารถกลับมาแก้ไขข้อมูลการจองได้</strong></font></td>
		</tr>
	</table> -->
	<br><p align='center'>
		<!--<table width="100%" border="0">
		<tr>
			<td align="center"><input type="button" value="ยืนยันการจอง" class="buttonsubmit" onClick="location.href='index.php'"> <input type="button" value="แก้ไขข้อมูล" class="buttonsubmit" onClick="location.href='index.php?mode=editbook&id=<?php #echo $ob["id"]; ?>'"></td>
		</tr>
	</table> -->
    </p>
    <p align="left"></p>
</blockquote>
</body>
</html>
