<?php
session_start();
include"config.php";
include"connect/connect.php";
#require("../mailer/class.phpmailer.php");
include("../mailer/mail.php");

$email=$_POST[email];
#$capt=$_POST[capt];
$msg="";

		#if($_SESSION['captcha'] != $_POST['capt'] || $_SESSION['captcha']=='BADCODE'){
			#$msg="<span class=fontred>! อักษรในภาพไม่ถูกต้อง</span>";
			#print $msg;
		#}else{
		if($email != "")
		{
				$sql_login = "select username,password,email 
				from jos_users
				where email='$email'";
				$result_login = mysql_query($sql_login);
				$num_row=mysql_num_rows($result_login);
				$ob=mysql_fetch_array($result_login);
				$pw=$ob[password];

					if ($num_row != "0")
					{
						$message="<p><table>";
						$message.="<tr>";
						$message.="<td><span>Username ของคุณคือ:</td>";
						$message.="<td class=fontred>".$ob[username]."</td>";
						$message.="</tr>";
						$message.="<tr>";
						$message.="<td>Password ของคุณคือ:</td>";
						$message.="<td class=fontred>".$pw."</td>";
						$message.="</tr>";
						$message.="<tr>";
						$message.="<td>สามารถเข้าสู่ระบบได้ที่:</td>";
						$message.="<td class=fontred><a href='".$livesite."login.php' target='_blank'>".$livesite."login.php</a></td>";
						$message.="</tr>";
						$message.="<table></p>";
						#print $message;
						smtpmail($ob['email'],"แจ้งรหัสผ่านระบบจองห้องประชุม",$message);
						$msg = "<span class=fontred>ระบบได้ส่งรหัสผ่านไปยัง Email ของท่านแล้ว</span>";
						print $msg;
 					}
					else   
					{
							$msg = "<span class=fontred>! Email นี้ไม่อยู่ในระบบ</span>";
							print $msg;
					}
		}
?>