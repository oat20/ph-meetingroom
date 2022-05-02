<?php
ob_start();
session_start();

include("../bookingroom/config.php");
include("../bookingroom/connect/connect.php");
include("../bookingroom/inc/function.php");
include("../bookingroom/inc/checksession.inc.php");

$action=$_REQUEST["action"];
$name=$_POST["m1"];
	$org=$_POST["org"];
	$username=$_POST["m2"];
	$password=$_POST["m3"];
	//$email=$_REQUEST["email"];
	$usergroup=$_REQUEST["usergroup"];
	$email2 = explode("@",$_POST['email']);
	$maxid = maxid("jos_users","id");

if($action == "add")
{
	if($email2[1] == "mahidol.ac.th")
	{
		$sql="insert into jos_users (id, 
		name, 
		username, 
		email, 
		password, 
		usertype, 
		registerDate, 
		DeID,
		tel)"; 
		$sql.="values ('$maxid', 
		'$name', 
		'".trim($email2['0'])."', 
		'$_POST[email]', 
		'$password', 
		'$usergroup', 
		'$datelog', 
		'$org',
		'$_POST[tel]')";
		$rs=mysql_query($sql);
		if($rs)
		{
			echo"<script language='JavaScript'>";
			echo"alert('เพิ่มข้อมูลเรียบร้อย');";
			echo"window.location='../user.php';";
			echo"</script>";
		}
		else
		{
			echo"<script language='JavaScript'>";
			echo"alert('! ไม่สามารถเพิ่มขอมูลได้');";
			echo"window.location='../user.php';";
			echo"</script>";
		}
	}
	else
	{
		echo"<script language='JavaScript'>";
		echo"alert('! รูปแบบ Email ไม่ถูกต้อง หรือ ไม่ใช่ Email ของทางมหาวิทยาลัย');";
		echo"window.location='../user.php?mode=add';";
		echo"</script>";
	}
}
else if($action == "edit")
{
	
	$sql="update jos_users set usertype='$usergroup'
	where id='$_POST[us_id]'";
	$rs=mysql_query($sql);
	if($rs){
		echo"<script language='JavaScript'>";
		echo"alert('ทำการแก้ไขข้อมูลเรียบร้อย');";
		echo"window.location='../user.php';";
		echo"</script>";
	}
		
}
else if($action == "del")
{
	$sql="delete from jos_users where id='$_GET[keyno]'";
	mysql_query($sql);
	header("location: ../user.php");
}

ob_end_flush();
?>