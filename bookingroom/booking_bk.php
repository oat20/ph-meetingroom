<?php
ob_start();
session_start();
include"config.php";
include"inc/checksession.inc.php";
//include $livepath."connect/connect.php";
include"connect/connect.php";
include"inc/function.php";
include"inc/function2.php";
#include("../mailer/mail.php");

$link=connect_db();

$room=$_POST["room"];
$startdate=$_POST["startdate"];
$bootime=$_POST['booTime'];
$title=$_POST["title"];
$text3=$_REQUEST["text3"];
$media_id=$_REQUEST[media_id];
$optionss=$_REQUEST[optionss];
$food_id=$_POST[food_id];
#$attname=$_FILES['att']['name'];
#$atttype=$_FILES['att']['type'];
#$attsize=$_FILES['att']['size'];
$condition=$_POST[condition];
$condition2=$_POST[condition2];

	if($room != "" && $startdate != "" && $bootime!="" && $title!="" && $condition!= ""){
		
		$date_amount = date_num($today, $startdate);

		$sql6="select days 
		from config";
		$rs6=mysql_query($sql6);
		$ob6=mysql_fetch_array($rs6);
		
		if($date_amount >= $ob6["days"])
		{	
		/*$sql="select meetingroom_userq.Dater, meetingroom_userq.T_in, meetingroom_userq.T_out, meetingroom_userq.title, jos_users.name, jos_users.tel, organization.Fname 
		from meetingroom_croom
		inner join meetingroom_userq on (meetingroom_croom.cr_id=meetingroom_userq.cr_id)
		inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
		inner join organization on (jos_users.DeID=organization.DeID) 
		where (('$startdate' between meetingroom_userq.Dater and meetingroom_userq.enddate) or ('$enddate' between meetingroom_userq.Dater and meetingroom_userq.enddate))
		and meetingroom_userq.cr_id='$room'
		and (('$time_in' between meetingroom_userq.T_in and meetingroom_userq.T_out) or ('$time_out' between meetingroom_userq.T_in and meetingroom_userq.T_out))";*/
		$sql="select * from meetingroom_userq
		where Dater = '$startdate'
		and time_in = '$bootime'
		and cr_id = '$room'";
		$rs=mysql_query($sql);
		$numrow=mysql_num_rows($rs);
		
		if($numrow==0){
			
			#$maxid=maxid(meetingroom_userq, uq_id);
				$maxid=random_ID("5","2");
				$condition3=$condition."/".$condition2;
			#if($enddate == ""){
				#$enddate = $startdate;
			#}
				$sql2="insert into meetingroom_userq(uq_id, u_id, cr_id, Dater, enddate, time_in, title, detail, optionss, created, status1, book_condition)
				values('$maxid', '$u', '$room', '$startdate', '$startdate', '$bootime', '$title', '$text3', '$optionss', '$datelog', '1', '$condition3')";
				$rs=mysql_query($sql2);
			
				#foreach($bootime as $k=>$v)
				#{
					#$sql3="insert into tb_booking_time (uq_id,tim_id) values ('$maxid','$v')";
					#$rs3=mysql_query($sql3);
				#}
				if($food_id != ""){
				foreach($food_id as $kk=>$vv)
				{
					$sql5="insert into meetingroom_foodrelation (uq_id, food_id) values ('$maxid','$vv')";
					$rs5=mysql_query($sql5);
				}
				}
			
				if($media_id != ""){
				foreach($media_id as $kk=>$vv)
				{
					$sql4="insert into meetingroom_mediarelation (uq_id,media_id) values ('$maxid','$vv')";
					$rs4=mysql_query($sql4);
				}
				}
		
				if($rs){
					$error_msg="บันทึกข้อมูลเรียบร้อย";
					print  warning2($error_msg)."<br/>";
					print"<a href=home.php><< ยืนยันรายการ</a>";
	  				print"<hr/>";
				}else{
					$error_msg="! ไม่สามารถทำการบันทึกข้อมูลได้";	
				}
					
		}else{
			print  warning2($msg[4])."<br/>";
			print '<table width="100%" cellspacing="1" bgcolor="#999999">';
			print "<tr bgcolor=#ececec>";
			print "<th>วันที่</th>";
			print "<th>รายการ</th>";
			print "<th>ผู้จอง</th>";
			print "</tr>";
			while($ob=mysql_fetch_array($rs)){
				print'<tr bgcolor="#ececec">';
    			print"<td>".dateThai($ob[Dater])."<br/>".$ob[T_in]." - ".$ob[T_out]."</td>";
				print"<td>".$ob[title]."</td>";
				print'<td>'.$ob[name].'<br/>'.$ob[Fname].'<br/>โทร. '.$ob[tel].'</td>';
    			print"</tr>";
			}
			print"</table>";
			print"<hr/>";
			#print'<br/><button class=buttonsubmit onclick="history.back();"><< ย้อนกลับ</button>';
		}
		
		}
		else
		{
			#echo"<script language='JavaScript'>";
			#echo"alert('ไม่สามารถจองได้ จำเป็นต้องล่วงหน้าไม่น้อยกว่า 2 วัน');";
			#echo"window.location='../formbooking.php';";
			$error_msg="ไม่สามารถจองได้ จำเป็นต้องล่วงหน้าไม่น้อยกว่า 2 วัน";
			print  warning2($error_msg)."<br/>";
		}

	}else{
		$error_msg="! กรุณากรอกข้อมูลให้ครบถ้วน";
		print  warning2($error_msg)."<br/>";
	}
	
mysql_close($link);	
ob_end_flush();
?>
