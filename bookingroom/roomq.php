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
	<h3>��������´��èͧ</h3>
	<table border="0">
	<tr>
		<td><strong>�ѹ���ͧ :</strong></td>
		<td><?php echo dateThai($ob4["startdate"]); ?></td>
	</tr>
	<tr>
		<td><strong>��ǧ���� :</strong></td>
		<td><?php echo $ob4["starttime"]; ?> - <?php echo $ob4["endtime"]; ?></td>
	</tr>
      <tr> 
	  	<td><strong>������ͧ  :</strong></td>
		<td><?php echo $ob4["category"]; ?></td>
	</tr>
	<tr> 
		<td><strong>��Ǣ��ͺ��/�Ԫ�   :</strong></td>
		<td><?php echo $ob4["subject"]; ?></td>
	</tr>
	<tr> 
		<td><strong>�ӹǹ�ѡ�֡��/������ͺ��   :</strong></td>
		<td><?php echo $ob4["amount"]; ?> ��</td>
	</tr>
	<tr>
		<td><strong>����͹ :</strong></td>
		<td><?php echo $ob4["teacher"]; ?></td>
	</tr>
	<tr>
		<td><strong>��ѡ�ٵ� :</strong></td>
		<td><?php echo $ob4["course"]; ?></td>
	</tr>
		<tr>
		  <td><strong>˹��§ҹ���ͧ :</strong></td>
		  <td><?php echo $ob4["dp_name"]; ?></td>
	  </tr>
		<tr> 
			<td><strong>���ͼ��ͧ   :</strong></td>
			<td><?php echo $ob4["useradd"]; ?></td>
		</tr>
		<tr>
		  <td valign="top"><strong>�������������������ͧ����� :</strong></td>
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
			<td><font color="#FF0000"><strong>�����˵� : ��سҵ�Ǩ�ͺ�����١��ͧ㹡�èͧ�ͧ��ҹ������º���� ��������ͷ�ҹ�ӡ���׹�ѹ��èͧ���Ǩ��������ö��Ѻ����䢢����š�èͧ��</strong></font></td>
		</tr>
	</table> -->
	<br><p align='center'>
		<!--<table width="100%" border="0">
		<tr>
			<td align="center"><input type="button" value="�׹�ѹ��èͧ" class="buttonsubmit" onClick="location.href='index.php'"> <input type="button" value="��䢢�����" class="buttonsubmit" onClick="location.href='index.php?mode=editbook&id=<?php #echo $ob["id"]; ?>'"></td>
		</tr>
	</table> -->
    </p>
    <p align="left"></p>
</blockquote>
</body>
</html>
