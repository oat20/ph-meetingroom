<?php
session_start();
include"../config.php";
include "../connect/connect.php";
include "function.php";

$ID=$_GET[ID];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
	font-size: 12pt;
}
h1{
	font-size: 20pt;
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
	font-weight: bold;
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
       $cmd = "select meetingroom_userq.uq_id, meetingroom_userq.Dater, room_time.start, room_time.end, jos_users.name, organization.Fname, meetingroom_userq.detail, meetingroom_userq.optionss, meetingroom_userq.created, book_status.sta, meetingroom_userq.title, jos_users.name as name_created, meetingroom_croom.color, meetingroom_croom.name as room_name
	   from meetingroom_userq, meetingroom_croom, jos_users, book_status, room_time, organization
	   where meetingroom_userq.time_in = room_time.tim_id
	   and meetingroom_userq.u_id = jos_users.id
	   and meetingroom_userq.cr_id = meetingroom_croom.cr_id
	   and meetingroom_userq.status1 = book_status.sta_id
	   and jos_users.DeID = organization.DeID
	   and meetingroom_userq.uq_id = '$ID'";
	#mysql_query($cmd, $link);
	$result = mysql_query($cmd);
	#while($row=mysql_fetch_row($result))
	#{
	$row=mysql_fetch_array($result);
			#$row[7]=nl2br($row[7]);
			
			$cmd2="select meetingroom_userq.modified, jos_users.name
			from meetingroom_userq, jos_users
			where meetingroom_userq.modified_by = jos_users.id
			and meetingroom_userq.uq_id = '$ID'";
			$rs2=mysql_query($cmd2);
			$row2=mysql_fetch_array($rs2);
			?>
<h1><?php print $row[title]; ?></h1><!--</strong><br>
  <br>
  </div> -->
      <table width="100%">
      	<tr>
      	  <td><strong>เลขที่รายการ</strong></td>
      	  <td><?=$row[uq_id];?></td>
   	    </tr>
      	<tr>
        	<td><strong>วันที่จอง</strong></td>
            <td><?php print dateThai($row[Dater]); ?> เวลา <?php print $row["start"]."-".$row["end"]; ?></td>
        </tr>
        <tr>
        	<td><strong>ห้อง</strong></td>
            <td><input name="" type="text" size="1" readonly="true" style="background:<?php print $row[color]; ?>; border:#FFFFFF"> <?php print $row[a]; ?> <?php print $row[room_name]; ?></td>
        </tr>
        <tr>
        	<td valign="top"><strong>ผู้จอง</strong></td>
            <td><?php print $row["name_created"]." <strong>ส่วนงาน</strong> ".$row["Fname"]; ?><br/>โทร. <?php print $row[tel]; ?></td>
        </tr>
        <tr>
        	<td><strong>จำนวนผู้ใช้</strong></td>
            <td><?php print $row[detail]; ?> ท่าน</td>
        </tr>
        <tr>
          <td valign="top"><strong>อาหารว่าง</strong></td>
          <td>
          	<?php
			$cmd3="select * from meetingroom_food,meetingroom_foodrelation
			where meetingroom_food.food_id=meetingroom_foodrelation.food_id
			and meetingroom_foodrelation.uq_id='$ID'
			order by meetingroom_food.food_id asc";
			$rs3=mysql_query($cmd3);
			while($ob3=mysql_fetch_array($rs3)){
				print "<img src='".$livesite."bookingroom/img/tick.png'> ".$ob3[food]."<br/>";
			}
			?>
          </td>
        </tr>
        <tr>
          <td valign="top"><strong>อุปกรณ์ที่ต้องการใช้</strong></td>
          <td>
          	<?php
		  	$cmd4="select * from meetingroom_media, meetingroom_mediarelation
			where meetingroom_media.media_id=meetingroom_mediarelation.media_id
			and meetingroom_mediarelation.uq_id='$ID'
			order by meetingroom_media.media_id asc";
			$rs4=mysql_query($cmd4);
			while($ob4=mysql_fetch_array($rs4)){
				print "<img src='".$livesite."bookingroom/img/tick.png'> ".$ob4[media]."<br/>";
			}
		  	?>
          </td>
        </tr>
        <tr>
          <td><strong>รายละเอียดเพิ่มเติ่ม</strong></td>
          <td><?=$row["optionss"];?></td>
        </tr>
        <tr>
        	<td><strong>วันที่ทำรายการ</strong></td>
            <td><?php print dateThai($row[created]); ?></td>
        </tr>
        <tr>
          <td valign="top"><strong>เหตุผลในการยกเลิก</strong></td>
          <td><textarea name="comment" cols="60" rows="5" wrap="virtual"></textarea></td>
        </tr>
        <tr>
        	<td></td>
          <td><input name="" type="submit" value="ยืนยันการยกเลิก">
            <input type="button" name="button" id="button" value="ย้อนกลับ" onClick="location.href='<?=$live;?>mybooking.php'"></td>
        </tr>
      </table>
<!--</div> -->
</body>
</html>
