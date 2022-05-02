<?php
session_start();
#$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include("bookingroom/inc/checksession.inc.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("bookingroom/css-inc.php");?>
</head>

<body>
<?php include("bookingroom/navbar2-inc.php");?>

<div class="container-fluid">

<?php
if($_SESSION['userType'] == 3){
	
	$created = $_POST["created_y"].'-'.$_POST["created_m"].'-'.$_POST["created_d"]; //ลงวันที่
	$startdate = $_POST["booking_y"].'-'.$_POST["booking_m"].'-'.$_POST["booking_d"]; //;วันที่จอง
	
//tb booking
$booking = mysql_query("update meetingroom_userq set 
created = '$created',
uname = '$_POST[uname]',
phone = '$_POST[phone]',
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
status1 = '$_POST[status1]',
confirm = '$_POST[confirm]',
comment = '$_POST[comment]',
uq_cancel = '$_POST[uq_cancel]',
modified_by = '$_SESSION[u]',
modified = '".date("Y-m-d H:i:s")."',
uq_snacknote='$_POST[uq_snacknote]'
where uq_id = '$_POST[uq_id]'");

//tb snack	
	mysql_query("delete from meetingroom_snack2
	where uq_id = '$_POST[uq_id]'");
	
	if($_POST["food_id"] != ""){
		foreach($_POST["food_id"] as $vv){
			$sql5="insert into meetingroom_snack2 (uq_id, food_id) values ('$_POST[uq_id]','$vv')";
			$rs5=mysql_query($sql5);
		}
	}

//tb media	
	mysql_query("delete from meetingroom_mediarelation
	where uq_id = '$_POST[uq_id]'");
	
	if($_POST["media_id"] != ""){
		foreach($_POST["media_id"] as $vv){
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
				
				$log2=mysql_query("insert into meetingroom_userq_log values ('',
				'$_POST[uq_id]',
				'".$datelog."',
				'".$getip."',
				'$_POST[cr_id]')");
				
				//header("location: 3_bookingconfirm.php?uq_id=".$_POST["uq_id"]);
				echo '<meta http-equiv="refresh" content="0;URL=3_bookingconfirm.php?uq_id='.$_POST["uq_id"].'">';
				
}else{
	include("bookingroom/alert-permission-inc.php");
}
?>

</div>

<?php include("bookingroom/js-inc.php");?>
</body>
</html>