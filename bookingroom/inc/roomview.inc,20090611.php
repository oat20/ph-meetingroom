<?php
session_start();
include"../config.php";
include $livepath."connect/connect.php";
include $livepath."inc/function.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title><?php echo $sitename; ?></title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:6px;
	top:7px;
	width:818px;
	height:893px;
	z-index:1;
	background-color: #CCCCCC;
}
body,td,th {
	font-family: "Courier New", Courier, monospace;
	font-size: 10pt;
}
h1{
	font-size: 12pt;
	margin-bottom: 10px;
	padding-bottom: 5px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #4d3123;
	color: #4d3123;
	border-left-width: 5px;
	border-left-style: solid;
	border-left-color: #4d3123;
	padding-left: 5px;
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
.style2 {color: #000099}
-->
</style>
</head>

<body>
<!--<div id="Layer1"> -->
  <!--<div align="center"><span class="style2"><br>
    <br>
    </span><strong> -->
	<?
       
    $cmd = "select  room_booking.id, room_booking.startdate, room_booking.starttime, room_booking.endtime, room_category.category, room_booking.subject, room_booking.amount, room_booking.teacher, room_booking.course, tb_department.dp_name, room_booking.useradd
	from room_booking, room_category, tb_department, tb_user 
	where  room_booking.cid=room_category.cid and room_booking.depid=tb_department.dp_id and room_booking.id='$ID'";
	#mysql_query($cmd, $link);
	$result = mysql_query($cmd, $link);
	#while($row=mysql_fetch_row($result))
	#{
	$row=mysql_fetch_array($result);
			#$row[7]=nl2br($row[7]);
			?>
	<h1>รายละเอียดการจอง</h1><!--</strong><br>
  <br>
  </div> -->
  <blockquote>
    <p align="left">
      
	  หัวข้ออบรม / วิชา : <font color = blue><?php echo $row["subject"]; ?></font><BR><BR>
			ห้องอบรม : <font color = blue><?php echo $row["category"]; ?></font><BR><BR>
			ผู้สอน : <font color = blue><?php echo $row["teacher"]; ?></font><BR><BR>
			หลักสูตร : <font color = blue><?php echo $row["course"]; ?></font><BR><BR>
			จำนวนนักศึกษา / ผู้เข้าอบรม : <font color = green><?php echo $row["amount"]; ?></font> คน<BR><BR>
			วันที่ทำการใช้ห้อง : <font color = blue><?php echo dateThai($row["startdate"]); ?></font><BR><BR>
			ช่วงเวลาที่ใช้ : <font color = blue><?php echo $row["starttime"]; ?> - <?php echo $row["endtime"]; ?></font><BR><Br>
			หน่วยงานที่จอง : <font color = blue><?php echo $row["dp_name"]; ?></font><BR><BR>
			ผู้จอง : <font color = blue><?php echo $row["useradd"]; ?></font><BR><BR>
		<?php	
			#$cmd = "select*from user where u_id='$row[1]'";
			#mysql_query($cmd,$link);
			#$result = mysql_query($cmd,$link);
			#$row=mysql_fetch_row($result);
			?>
			<?php
	#}		
	?>
	<fieldset>
		<legend>โปรแกรมคอมพิวเตอร์ที่ต้องการใช้</legend>
		<ol>
		<?php
			$room_program="select * from room_program
			where id='$ID'";
			$rs_room_program=mysql_query($room_program, $link);
			while($ob_room_program=mysql_fetch_array($rs_room_program)){
			?>
				<li><?php echo $ob_room_program["program"]; ?></li>	
			<?php
			}
		?>
		</ol>
	</fieldset>
      &nbsp;</p>
  </blockquote>
<!--</div> -->
</body>
</html>
