<?php
session_start();
#$u=$_SESSION["u"];
include"config.php";
include"connect/connect.php";
include"inc/function.php";
include("inc/checksession.inc.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("css-inc.php");?>
</head>

<body>
<?php include("navbar2-inc.php");?>

<div class="container-fluid">

<?php
$startdate = $_POST["booking_y"].'-'.$_POST["booking_m"].'-'.$_POST["booking_d"];
$date_amount = date_num($today, $startdate);

if($date_amount >= 3){

//tb booking
$booking = mysql_query("update meetingroom_userq set
uname = '$_POST[uname]',
phone = '$_POST[tel]',
DeID = '$_POST[DeID]',
cr_id = '$_POST[cr_id]',
Dater = '$startdate',
enddate = '$startdate',
time_in = '$_POST[sendTime1]',
time_out = '$_POST[sendTime2]',
ob_id = '$_POST[sendObid]',
title = '$_POST[title]',
detail = '$_POST[detail]',
tf_id = '$_POST[tf_id]',
book_condition = '".$_POST["condition"]."/".$_POST["condition2"]."',
optionss = '$_POST[optionss]',
modified_by = '$_SESSION[u]',
modified = '".date('Y-m-d H:i:s')."',
uq_snacknote='$_POST[uq_snacknote]',
uq_owner = '$_POST[uq_owner]'
where uq_id = '$_POST[uq_id]'");

//tb snack
mysql_query("delete from meetingroom_snack2
	where uq_id = '$_POST[uq_id]'");
	
if($_POST["food_id"] != ""){
		
				foreach($_POST["food_id"] as $kk=>$vv){
					$sql5="insert into meetingroom_snack2 (uq_id, food_id) values ('$_POST[uq_id]','$vv')";
					$rs5=mysql_query($sql5);
				}
			
			}

//tb media
mysql_query("delete from meetingroom_mediarelation
	where uq_id = '$_POST[uq_id]'");
	
				if($_POST["media_id"] != ""){
						
				foreach($_POST["media_id"] as $kk=>$vv)
				{
					$sql4="insert into meetingroom_mediarelation (uq_id,media_id) values ('$_POST[uq_id]','$vv')";
					$rs4=mysql_query($sql4);
				}
				
				}

//tb booking log
$log = mysql_query("insert into meetingroom_userq_statusinfo (si_id,
uq_id,
si_userstamp,
si_datestamp,
si_ipstamp) 
values ('',
				'$_POST[uq_id]',
				'$_SESSION[u]',
				'".date("Y-m-d H:i:s")."',
				'".$_SERVER['REMOTE_ADDR']."')");
				
				$log2 = mysql_query("insert into meetingroom_userq_log values ('',
				'$_POST[uq_id]',
				'".date("Y-m-d H:i:s")."',
				'".$_SERVER['REMOTE_ADDR']."',
				'$_POST[cr_id]')");
				
				//header("location: ../formbooking.php?mode=confirm&uq_id=".$_POST["uq_id"]);
				echo '<meta http-equiv="refresh" content="0;URL='.$livesite.'formbooking.php?mode=confirm&uq_id='.$_POST["uq_id"].'">';
				
}else{
	echo blog_alert('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ไม่สามารถจองได้ จำเป็นต้องจองล่วงหน้าไม่น้อยกว่า 3 วัน หรือมีความจำเป็นติดต่อ <abbr>งานบริหารทั่วไป</abbr> โดยตรง โทร. 1104, 1112, 1199 <a href="'.$liveiste.'formbooking.php?mode=update&uq_id='.$_POST["uq_id"].'" class="alert-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>');
	echo '<meta http-equiv="refresh" content="0;URL='.$liveiste.'formbooking.php?mode=update&uq_id='.$_POST["uq_id"].'">';
}
?>

</div><!--container-->

<?php include("js-inc.php");?>
</body>
</html>