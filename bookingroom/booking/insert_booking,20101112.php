<?
#include"../config.php";
#include $livepath."connect/connect.php";

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

if($action == "add"){
	
	if($room != "" && $startdate != "" && $time_in != "" && $time_out != ""){
	
		$sql="select * from meetingroom_croom
		inner join meetingroom_userq on (meetingroom_croom.cr_id=meetingroom_userq.cr_id)
		where meetingroom_userq.Dater = '$startdate'
		and meetingroom_userq.cr_id='$room'
		and (('$time_in' between meetingroom_userq.T_in and meetingroom_userq.T_out)
		or ('$time_out' between meetingroom_userq.T_in and meetingroom_userq.T_out))";
		$rs=mysql_query($sql);
		$numrow=mysql_num_rows($rs);
		if($numrow==0){
			$sql2="insert into meetingroom_userq(u_id, cr_id, Dater, title, detail, optionss, T_in, T_out, created, status1, DeID)
			values('$u', '$room', '$startdate', '$text2', '$text3', '$optionss', '$time_in', '$time_out', '$datelog', '1', '$form_deid')";
			$rs=mysql_query($sql2);
		
			if($rs){
				$error_msg="บันทึกข้อมูลเรียบร้อย";
				print "<meta http-equiv=refresh content=1;URL=mybooking.php>";
				#header("location: ".$livesite."booking.php?mode=editbook&maxid=$maxid");
			}else{
				$error_msg="! ไม่สามารถทำการบันทึกข้อมูลได้";	
			}
		}else{
			$error_msg=$msg[4]."<br/>";
			$error_msg.='<table width="100%" cellspacing="1" bgcolor="#999999">';
			$error_msg.="<tr bgcolor=#ececec>";
			$error_msg.="<th>เวลา</th>";
			$error_msg.="<th>รายการ</th>";
			$error_msg.="</tr";
			while($ob=mysql_fetch_array($rs)){
			$error_msg.='<tr bgcolor="#ececec">';
    		$error_msg.="<td>".$ob[T_in]." - ".$ob[T_out]."</td>";
			$error_msg.="<td>".$ob[title]."</td>";
    		$error_msg.="</tr>";
			}
			$error_msg.="</table>";
		}

	}else{
		$error_msg="! กรุณากรอกข้อมูลให้ครบถ้วน";
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
