<?php
ob_start();
session_start();
include"bookingroom/config.php";
include"bookingroom/inc/checksession.inc.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
?>
<html>
<head>
<?php include("bookingroom/css-inc.php");?>
<meta charset="utf-8">
</head>

<body>
<?php include("bookingroom/navbar2-inc.php");?>

<?php
$room=$_POST["cr_id"];
//$startdate=$_POST["startdate"];
$created = $_POST["created_y"].'-'.$_POST["created_m"].'-'.$_POST["created_d"]; //ลงวันที่
$startdate = $_POST["booking_y"].'-'.$_POST["booking_m"].'-'.$_POST["booking_d"]; //;วันที่จอง
$bootime=$_POST['sendTime1'];
$title=$_POST["title"];
$text3=$_REQUEST["text3"];
$media_id=$_REQUEST[media_id];
$optionss=$_REQUEST[optionss];
$food_id=$_POST[food_id];
$condition=$_POST[condition];
$condition2=$_POST[condition2];

	if($room != "" && $startdate != "" && $title!="" && $condition!= ""){
				
		$sql="select * from meetingroom_userq
		where Dater = '$startdate'
		and cr_id = '$_POST[cr_id]'
		AND  '$_POST[sendTime1]' BETWEEN time_in AND time_out
		and uq_cancel='No'";
		$rs=mysql_query($sql);
		$numrow=mysql_num_rows($rs);
		
		if($numrow==0){
			
			#$maxid=maxid(meetingroom_userq, uq_id);
				$maxid = random_ID("5","2");
				$condition3 = $condition."/".$condition2;
			#if($enddate == ""){
				#$enddate = $startdate;
			#}
				$sql2 = "insert into meetingroom_userq (uq_id,
				created, 
				uname,
				DeID,
				phone,
				cr_id,
				Dater,
				enddate,
				time_in,
				time_out,
				ob_id,
				title,
				detail,
				tf_id,
				book_condition,
				optionss,
				status1,
				modified,
				modified_by,
				confirm,
				confirm_by,
				uq_confirm_date,
				comment,
				u_id,
				uq_snacknote)
				values ('$maxid',
				'$created', 
				'$_POST[uname]',
				'$_POST[DeID]',
				'$_POST[phone]',
				'$_POST[cr_id]',
				'$startdate',
				'$startdate',
				'$_POST[sendTime1]',
				'$_POST[sendTime2]',
				'$_POST[sendObid]',
				'$_POST[title]',
				'$_POST[detail]',
				'$_POST[tf_id]',
				'$condition3',
				'$_POST[optionss]',
				'$_POST[status1]',
				'".date("Y-m-d H:i:s")."',
				'$_SESSION[u]',
				'$_POST[confirm]',
				'$_SESSION[u]',
				'".date("Y-m-d H:i:s")."',
				'$_POST[comment]',
				'$_SESSION[u]',
				'$_POST[uq_snacknote]')";
				$rs=mysql_query($sql2);
			
				//อาหารว่าง
				if($food_id != ""){
					foreach($food_id as $vv){
						$sql5="insert into meetingroom_snack2 (uq_id, food_id) values ('$maxid','$vv')";
						$rs5=mysql_query($sql5);
					}
				}
			
				//อุปกรณ์เสริม
				if($media_id != ""){
					foreach($media_id as $vv){
						$sql4="insert into meetingroom_mediarelation (uq_id,media_id) values ('$maxid','$vv')";
						$rs4=mysql_query($sql4);
					}
				}
				
				//book status
				$sql6 = mysql_query("insert into meetingroom_userq_statusinfo values ('".random_ID2("5","2")."',
				'$maxid',
				'',
				'$_SESSION[u]',
				'".date("Y-m-d H:i:s")."',
				'".$_SERVER['REMOTE_ADDR']."')");
				
				//booking log
				$log = mysql_query("insert into meetingroom_userq_log values ('',
				'$maxid',
				'".date("Y-m-d H:i:s")."',
				'".$_SERVER['REMOTE_ADDR']."',
				'$_POST[cr_id]')");
		
				if($rs and $sql6){
					//$error_msg="บันทึกข้อมูลเรียบร้อย";
					//print  warning2($error_msg)."<br/>";
					//print"<a href=home.php><< ยืนยันรายการ</a>";
	  				print"<hr/>";
					//echo $sql2;
					//header("location: 3_bookingconfirm.php?uq_id=".$maxid);
					echo '<meta http-equiv="refresh" content="0;URL=3_bookingconfirm.php?uq_id='.$maxid.'">';
				}else{
					$error_msg="! ไม่สามารถทำการบันทึกข้อมูลได้";	
				}
					
		}else{
			//print  warning2($msg[4])."<br/>";
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
		//print  warning2($error_msg)."<br/>";
		echo blog_alert($error_msg.' <a href="3_bookinginsert.php" class="alert-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>');
	}
	
mysql_close($conn);
include("bookingroom/js-inc.php");
?>
</body>
</html>
<?php ob_end_flush();
?>
