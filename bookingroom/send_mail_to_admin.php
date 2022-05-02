<?
ob_start();
session_start();
include"config.php";
#include $livepath."connect/connect.php";
include"inc/connect_db.php";
include"inc/function.php";
include"inc/function2.php";
include("../mailer/mail.php");

$link=connect_db();

include"inc/checksession.inc.php";

$startdate=$_POST["startdate"];
$room=$_POST["room"];
$text2=$_POST["text2"];
$text3=$_POST["text3"];
$form_deid=$_REQUEST[form_deid];
$time_in=$_REQUEST[time_in];
$time_out=$_REQUEST[time_out];
$action=$_REQUEST[action];
$keyuq_id=$_REQUEST[keyuq_id];
$optionss=$_REQUEST[optionss];
$DeID=$_REQUEST[DeID];
$enddate=$_POST[enddate];
$edu_level=$_POST[edu_level];
$course=$_POST[course];
$major=$_POST[major];
$book_for2=$_POST["book_for2"];

	
	if($room != "" && $startdate != "" && $time_in != "" && $time_out != "" && $text2 != ""){
	
		$sql="select meetingroom_userq.Dater, meetingroom_userq.T_in, meetingroom_userq.T_out, meetingroom_userq.title, jos_users.name, jos_users.tel, organization.Fname 
		from meetingroom_croom
		inner join meetingroom_userq on (meetingroom_croom.cr_id=meetingroom_userq.cr_id)
		inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
		inner join organization on (jos_users.DeID=organization.DeID) 
		where (('$startdate' between meetingroom_userq.Dater and meetingroom_userq.enddate) or ('$enddate' between meetingroom_userq.Dater and meetingroom_userq.enddate))
		and meetingroom_userq.cr_id='$room'
		and (('$time_in' between meetingroom_userq.T_in and meetingroom_userq.T_out) or ('$time_out' between meetingroom_userq.T_in and meetingroom_userq.T_out))";
		$rs=mysql_query($sql);
		$numrow=mysql_num_rows($rs);
		
		if($numrow==0){
			$maxid=maxid(meetingroom_userq, uq_id);
			if($enddate == ""){
				$enddate = $startdate;
			}
			$sql2="insert into meetingroom_userq(uq_id, u_id, cr_id, Dater, enddate, title, edu_level, course, major, detail, optionss, T_in, T_out, created, status1, DeID,book_for)
			values('$maxid', '$u', '$room', '$startdate', '$enddate', '$text2', '$edu_level', '$course', '$major', '$text3', '$optionss', '$time_in', '$time_out', '$datelog', '1', '$form_deid','$book_for2')";
			$rs=mysql_query($sql2);
		
			if($rs){
				$error_msg="บันทึกข้อมูลเรียบร้อย";
				print  warning2($error_msg)."<br/>";
				print"<a href=mybooking.php><< ย้อนกลับรายการ</a>";
	  print"<hr/>";
	  
	  $cmd = "select *,meetingroom_croom.name as a 
	   from meetingroom_userq,meetingroom_croom,jos_users,organization
	   where meetingroom_userq.uq_id='$maxid'
	   and meetingroom_userq.u_id=jos_users.id
	   and jos_users.DeID=organization.DeID
	   and meetingroom_userq.cr_id=meetingroom_croom.cr_id
	   order by meetingroom_userq.Dater asc";
	   $rs=mysql_query($cmd);
	   				$body = '<table border=1 width=100%>';
					$body .= "<tr>";
        	$body .="<th><strong>วันที่จอง</strong></th>";
			$body .="<th><strong>ห้อง</strong></th>";
			$body .="<th><strong>จำนวนผู้ใช้</strong></th>";
			 $body .="<th><strong>Software ที่ต้องการใช้</strong></th>";
			 $body .='<th valign="top"><strong>ผู้จอง</strong></th>';
        $body .="</tr>";
	   while($row=mysql_fetch_array($rs)){
      	$body .="<tr>";
        	 $body .="<td>".dateThai($row[Dater])." เวลา ".$row[T_in]." - ".$row[T_out]."</td>";
            $body .='<td><input name="" type="text" size="1" readonly="true" style="background:'.$row[color].'; border:#FFFFFF"> '.$row[a].'</td>';
			$body .="<td>".$row[detail]." ท่าน</td>";
			$body .="<td>".$row[optionss]."</td>";
			$body .="<td>".$row[name]."<br/>".$row[Fname]."<br/>โทร. ".$row[tel]."</td>";
        $body .="</tr>";
	   }
	  			
				smtpmail("amila_na@hotmail.com","ระบบจองห้องปฏิบัติการคอมพิวเตอร์ (แจ้งการจองห้อง)",$body);

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

	}else{
		$error_msg="! กรุณากรอกข้อมูลให้ครบถ้วน";
		print  warning2($error_msg)."<br/>";
	}
	
mysql_close($link);	
ob_end_flush();
?>
