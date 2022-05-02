<?php
session_start();
include"../config.php";
include"../connect/connect.php";
include("function2.php");

$keydater = $_POST["sel4"];
$room = $_POST["room"];
$booTime = $_POST["booTime"];

$sql1 = "select * from room_time
where tim_id = '$booTime'";
$rs1 = mysql_query($sql1);
$ob1 = mysql_fetch_array($rs1);
$time_in = $ob1["start"];
$time_out = $ob1["end"];

$sql2="select * from meetingroom_userq
		where meetingroom_userq.Dater = '$keydater'
		and meetingroom_userq.cr_id = '$room'
		and ((meetingroom_userq.T_in between '$time_in' and '$time_out') or (meetingroom_userq.T_out between '$time_in' and '$time_out'))";
$rs2=mysql_query($sql2);
$numrow2=mysql_num_rows($rs2);
$ob2 = mysql_fetch_array($rs2);

if($numrow2 == "0"){
	$rs = mysql_query("select * from meetingroom_croom where cr_id = '$room'");
	$ob = mysql_fetch_array($rs);
	print "<table>";
		print "<tr>";
			print "<td><img src=".$img_path."room/".$ob["picData"]." border=0 class=img_size200 /></td>";
			print "<td valign=top>".$ob["name"]."<br/><a href=formbooking.php?cr_id=".$ob['cr_id']."&name=".$ob['name']."&time=".$ob['tim_id'].">[จอง]</a></td>";
		print "</tr>";
	print "</table>";
	print warning2("ว่างสามารถจองได้");
}else{
	$rs = mysql_query("select * from meetingroom_croom where cr_id = '$room'");
	$ob = mysql_fetch_array($rs);
	print "<table>";
		print "<tr>";
			print "<td><img src=".$img_path."room/".$ob["picData"]." border=0 class=img_size200 /></td>";
			print "<td valign=top>".$ob["name"]."</td>";
		print "</tr>";
	print "</table>";
	print warning2("ไม่ว่าง ไม่สามารถจองได้");
}
?>