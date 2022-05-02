<?php
ob_start();

session_start();
include"config.php";
include"inc/checksession.inc.php";
include"connect/connect.php";
include"inc/function.php";

include("css-inc.php");

$room=$_POST["cr_id"];
//$startdate=$_POST["startdate"];
$startdate = $_POST["booking_y"].'-'.$_POST["booking_m"].'-'.$_POST["booking_d"];
$bootime=$_POST['sendTime1'];
$title=$_POST["title"];
$text3=$_REQUEST["text3"];
$media_id=$_REQUEST[media_id];
$optionss=$_REQUEST[optionss];
$food_id=$_POST[food_id];
$condition=$_POST[condition];
$condition2=$_POST[condition2];

include("navbar-inc.php");
?>

<div class="container">

<?php
	if($room != "" && $startdate != "" && $title!="" && $condition!= ""){
		
		$date_amount = date_num($today, $startdate);
		
		if($date_amount >= 3)
		{	
		$sql="select * from meetingroom_userq
		where Dater = '$startdate'
		and time_in = '$_POST[sendTime1]'
		and cr_id = '$_POST[cr_id]'";
		$rs=mysql_query($sql);
		$numrow=mysql_num_rows($rs);
		
		if($numrow==0){
			
				$maxid = random_ID("5","2");
				$condition3 = $condition."/".$condition2;
				
				$sql2 = "insert into meetingroom_userq (uq_id, 
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
				ff_id,
				book_condition,
				optionss,
				status1,
				confirm,
				created,
				modified_by,
				modified,
				uq_cancel)
				values ('$maxid', 
				'$_POST[uname]',
				'$_POST[DeID]',
				'".$_POST[tel]."',
				'$_POST[cr_id]',
				'$_POST[startdate]',
				'$_POST[startdate]',
				'$_POST[sendTime1]',
				'$_POST[sendTime2]',
				'$_POST[sendObid]',
				'$_POST[title]',
				'$_POST[text3]',
				'$_POST[ffID]',
				'$condition3',
				'$_POST[optionss]',
				'1',
				'2',
				'".date("Y-m-d H:i:s")."',
				'$_SESSION[u]',
				'".date("Y-m-d H:i:s").",
				'no')";
				$rs=mysql_query($sql2);
			
				//อาหารว่าง
				if($food_id != ""){
				foreach($food_id as $kk=>$vv)
				{
					$sql5="insert into meetingroom_snack2 (uq_id, food_id) values ('$maxid','$vv')";
					$rs5=mysql_query($sql5);
				}
				}
			
				//อุปกรณ์เสริม
				if($media_id != ""){
				foreach($media_id as $kk=>$vv)
				{
					$sql4="insert into meetingroom_mediarelation (uq_id,media_id) values ('$maxid','$vv')";
					$rs4=mysql_query($sql4);
				}
				}
				
				//book status
				$sql6 = mysql_query("insert into meetingroom_user_statusinfo values ('".random_ID2("5","2")."',
				'$maxid',
				'1',
				'$_SESSION[u]',
				'".date("Y-m-d H:i:s")."',
				'".$_SERVER['REMOTE_ADDR']."')");
				
				//booking log
				/*$log = mysql_query("insert into meetingroom_userq_log values ('',
				'$maxid',
				'".date("Y-m-d H:i:s")."',
				'".$_SERVER['REMOTE_ADDR']."')");*/
		
				if(isset($rs) and isset($sql6)){
					$error_msg="บันทึกข้อมูลเรียบร้อย";
					print  warning2($error_msg)."<br/>";
					print"<a href=home.php><< ยืนยันรายการ</a>";
	  				print"<hr/>";
					//header("location: ../formbooking.php?mode=confirm&uq_id=".$maxid);
					echo $sql2;
					//echo '<meta http-equiv="refresh" content="0;URL='.$livesite.'formbooking.php?mode=confirm&uq_id='.$maxid.'>';
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
			$error_msg='<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ไม่สามารถจองได้ จำเป็นต้องจองล่วงหน้าไม่น้อยกว่า 3 วัน';
			//print  warning2($error_msg)."<br/>";
			echo '<div class="alert alert-danger" role="alert"><p>'.$error_msg.' <a href="'.$livesite.'allrooms.php" class="alert-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a></p></div>';
			//echo '<meta http-equiv="refresh" content="5;URL='.$livesite.'allrooms.php">';
		}

	}else{
		$error_msg="! กรุณากรอกข้อมูลให้ครบถ้วน";
		//print  warning2($error_msg)."<br/>";
		echo '<div class="alert alert-danger" role="alert"><p>'.$error_msg.' <a href="'.$livesite.'allrooms.php" class="alert-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a></p></div>';
		//echo '<meta http-equiv="refresh" content="5;URL='.$livesite.'allrooms.php">';
	}
	
//mysql_close($conn);
?>

</div><!--container-->

<?php
include("js-inc.php");
	
ob_end_flush();
?>
