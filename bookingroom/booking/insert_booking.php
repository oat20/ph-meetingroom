<?
#include"../config.php";
#include $livepath."connect/connect.php";
$room=$_POST["room"];
$startdate=$_POST["startdate"];
$bootime=$_POST['booTime'];
$title=$_POST["title"];
$text3=$_REQUEST["text3"];
$media_id=$_REQUEST[media_id];
$optionss=$_REQUEST[optionss];
#$time_out=$_REQUEST[time_out];
#$action=$_REQUEST[action];
#$keyuq_id=$_REQUEST[keyuq_id];
#$DeID=$_REQUEST[DeID];

if($action == "add"){
	
	if($room != "" && $startdate != "" && $booTime != "" && $title != "" && $text3!=){
	
		$sql="select meetingroom_userq.Dater, meetingroom_userq.T_in, meetingroom_userq.T_out, meetingroom_userq.title, jos_users.name, jos_users.tel, organization.Fname 
		from meetingroom_croom
		inner join meetingroom_userq on (meetingroom_croom.cr_id=meetingroom_userq.cr_id)
		inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
		inner join organization on (jos_users.DeID=organization.DeID) 
		where meetingroom_userq.Dater = '$startdate'
		and meetingroom_userq.cr_id='$room'
		and (('$time_in' between meetingroom_userq.T_in and meetingroom_userq.T_out)
		or ('$time_out' between meetingroom_userq.T_in and meetingroom_userq.T_out))";
		$rs=mysql_query($sql);
		$numrow=mysql_num_rows($rs);
		
		if($numrow==0){
			$maxid=maxid(meetingroom_userq, uq_id);
			$sql2="insert into meetingroom_userq(uq_id, u_id, cr_id, Dater, title, detail, optionss, T_in, T_out, created, status1, DeID)
			values('$maxid', '$u', '$room', '$startdate', '$text2', '$text3', '$optionss', '$time_in', '$time_out', '$datelog', '1', '$form_deid')";
			$rs=mysql_query($sql2);
			
			foreach($bootime as $k=>$v)
			{
				$sql2="inser into tb_booking_time (uq_id,tim_id) values ('$maxid','$bootime')";
				$rs2=mysql_query($sql2);
			}
		
			if($rs){
				$error_msg="บันทึกข้อมูลเรียบร้อย";
				print  warning2($error_msg)."<br/>";
				#print "<meta http-equiv=refresh content=2;URL=mybooking.php>";
				 $cmd = "select *,meetingroom_croom.name as a 
	   from meetingroom_userq,meetingroom_croom,jos_users,organization
	   where meetingroom_userq.uq_id='$maxid'
	   and meetingroom_userq.u_id=jos_users.id
	   and jos_users.DeID=organization.DeID
	   and meetingroom_userq.cr_id=meetingroom_croom.cr_id";
	   $rs=mysql_query($cmd);
	   $row=mysql_fetch_array($rs);
				print'<table width="100%">';
				print"<tr>";
        	print"<td><strong>วันที่ทำีรายการ</strong></td>";
            print"<td></td>";
        print"</tr>";
        print"<tr>";
        	print"<td><strong>ผู้จอง</strong></td>";
            print'<td></td>';
        print"</tr>";
      	print"<tr>";
        	print"<td><strong>วันที่จอง</strong></td>";
            print"<td>".dateThai($row[Dater])." เวลา ".$row[T_in]." - ".$row[T_out]."</td>";
        print"</tr>";
        print"<tr>";
        	print"<td><strong>ห้อง</strong></td>";
            print'<td><input name="" type="text" size="1" readonly="true" style="background:'.$row[color].'; border:#FFFFFF"> '.$row[a].'</td>';
        print"</tr>";
        print"<tr>";
        	print'<td valign="top"><strong>ผู้จอง</strong></td>';
            print"<td>".$row[name]."<br/>".$row[Fname]."<br/>โทร. ".$row[tel]."</td>";
        print"</tr>";
        print"<tr>";
        	print"<td><strong>จำนวนผู้ใช้</strong></td>";
            print"<td>".$row[detail]." ท่าน</td>";
        print"</tr>";
        print"<tr>";
          print"<td><strong>Software ที่ต้องการใช้</strong></td>";
          print"<td>".$row[optionss]."</td>";
        print"</tr>";
        print"<tr>";
        	print"<td><strong>วันที่ทำรายการ</strong></td>";
            print"<td>".dateThai($row[created])."</td>";
        print"</tr>";
		print"<tr>";
			print "<td></td>";
		#print'<td><button class=buttonsubmit onclick="history.back();">ยืนยัน</button> <button class=buttonsubmit onclick="history.back();">แก้ไข</button></td>';
		print'<td><button class=buttonsubmit onclick="history.back();">กลับไปแก้ไข</button> <button class=buttonsubmit onclick="history.back();">ยืนยันการจอง</button></td>';
		print"</tr>";
      print"</table>";
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
    			print"<td align=center>".dateThai($ob[Dater])."<br/>".$ob[T_in]." - ".$ob[T_out]."</td>";
				print"<td>".$ob[title]."</td>";
				print'<td align="center">'.$ob[name].'<br/>'.$ob[Fname].'<br/>โทร. '.$ob[tel].'</td>';
    			print"</tr>";
			}
			print"</table>";
			print'<br/><button class=buttonsubmit onclick="history.back();"><< ย้อนกลับ</button>';
		}

	}else{
		$error_msg="! กรุณากรอกข้อมูลให้ครบถ้วน";
		print  warning2($error_msg)."<br/>";
	}
	
}else if($action == "edit"){
	
	if($room != "" && $startdate != "" && $time_in != "" && $time_out != ""){
		
		$sql2="update meetingroom_userq set cr_id='$room', Dater='$startdate', title='$text2', detail='$text3', optionss='$optionss', T_in='$time_in', T_out='$time_out', modified='$datelog'
		where uq_id=$keyuq_id";
		$rs=mysql_query($sql2);
		
		if($rs){
			$error_msg="แก้ไขข้อมูลเรียบร้อย";
			print "<meta http-equiv=refresh content=1;URL=mybooking.php>";
			#header("location: ".$livesite."booking.php?mode=editbook&maxid=$maxid");
		}else{
			$error_msg="! ไม่สามารถทำการบันทึกข้อมูลได้";	
		}

	}else{
		$error_msg="! กรุณากรอกข้อมูลให้ครบถ้วน";
	}
	
}
?>
