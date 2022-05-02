<?php
$login_username=$_POST["login_username"];
$login_password=$_POST["login_password"];
$action=$_POST["action"];
		
$error_msg="";
		
if($action == "true")
{
		#include"config.php";
				$sql_login = "select * from jos_users
				where (username='$login_username' or email='$login_username') and password='$login_password'";
				$result_login = mysql_query($sql_login);
				$num_row=mysql_num_rows($result_login);
				$object_login = mysql_fetch_array($result_login);
					
				$u=$object_login["id"];
				$ses_deid=$object_login[DeID];
				#$us_type=$object_login["us_type"];

					if ($num_row != "0")
					{
						session_register("u");
						session_register("ses_deid");
						$_SESSION['u'] = $u;
						$_SESSION['ses_deid'] = $ses_deid;
						#session_register("us_type");
						
						$datelog = date("Y-m-d H:i:s");
						$ip=getenv(REMOTE_ADDR); 
					$sql_userlog = "INSERT INTO user_log(us_id, ul_in, ul_ip)
					VALUES('$u', '$datelog', '$ip')";
					mysql_query($sql_userlog);
						#$result_userlog = mysql_query($sql_userlog, $link) or die("Error"); 
						/* header("location: admin/index.php"); */
						echo"<meta http-equiv=refresh content=0;URL=formbooking.php?mode=add>";
 					}
					else   
					{
							#$error_msg = "Ǩͺ ͺѭ  ʼҹ ա";
							echo"<meta http-equiv=refresh content=0;URL=login.php>";
							#$error_msg = $error_msg."Username  หรือ รหัสผ่านไม่ถูกต้อง";
					}
}
?>


<p>
<form action="login.php" method="post">
<?
  if($error_msg != "")
  {
?>
	<font color="#CC0000"><strong><? echo $error_msg ?></strong></font><br/><br/>
<?
  }
?>
<label class="font14">Username หรือ Email</label><br />
<input size=50 value="<? echo $login_username ?>" name="login_username" maxlength="20" class="forminput"><br><br/>
<label class="font14">รหัสผ่าน</label><br>
<input type=password size=50 name=login_password maxlength="20" class="forminput"><br><br/>
<input type="submit" value=" เข้าสู่ระบบ " name="set_twig_authenticated" class="formbutton">
<!--<input type="button" value=" ลืมรหัสผ่าน " name="set_twig_authenticated" class="formbutton"> -->
<input type="hidden" name="action" value="true">
</form>
</p>