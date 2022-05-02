<?php
ob_start();
session_start();
include"config.php";

$username=$_POST["username"];
$passwd=$_POST["passwd"];
$action=$_POST["action"];
		
#$error_msg="";
		
if($action == "true")
{
				require'inc/connect/connect.php';
				$sql_login = "select * from jos_users,admin
				where (jos_users.username='$username' or jos_users.email='$username') 
				and jos_users.password='$passwd'
				and jos_users.id=admin.NO";
				$result_login = mysql_query($sql_login);
				$num_row=mysql_num_rows($result_login);
				$object_login = mysql_fetch_array($result_login);
					
				$u=$object_login["id"];
				#$us_type=$object_login["G_ID"];

					if ($num_row != "0")
					{
						session_register("u");
						$_SESSION['u'] = $u;
						
						#session_register("us_type");
						
						#$datelog = date("Y-m-d H:i:s");
						#$ip=getenv(REMOTE_ADDR); 
					$sql_userlog = "INSERT INTO user_log(us_id, ul_in, ul_ip)
					VALUES('$u', '$datelog', '$ip')";
						#$result_userlog = mysql_query($sql_userlog, $link) or die("Error"); 
						/* header("location: admin/index.php"); */
						echo"<meta http-equiv=refresh content=0;URL=index.php>";
 					}
					else   
					{
							#$error_msg = "ตรวจสอบ ชื่อบัญชี และ รหัสผ่าน อีกครั้ง";
							#$error_msg = "Username หรือ รหัสผ่าน ไม่ถูกต้อง";
							echo"<meta http-equiv=refresh content=0;URL=login.php>";
					}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php print $sitename; ?></title>
<link href="theme/login2.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="warp">
    	<div id="login">
        	<form action="#" method="post">
            	<span class="font11"><STRONG>Username or Email :</STRONG></span><br/>
                <INPUT name=username maxlength="20" size="25"><br/>
                <span class="font11"><STRONG>รหัสผ่าน : </STRONG></span><br/>
                <INPUT type=password name=passwd maxlength="20" size="25"><br/>
                <input type="hidden" name="action" value="true"><br/>
                <INPUT class=button2 type=submit value=เข้าสู่ระบบ name=Save> 
                <!--<INPUT class=button2 type=button value=ลืมรหัสผ่าน> -->
            </form>
        </div>
        <div id="copyright">
        	พัฒนาโดย: หน่วยเทคโนโลยีสารสนเทศ<br/>คณะสาธารณสุขศาสตร์ ม.มหิดล
        </div>
    </div>
                  <SCRIPT language=javascript>
			    document.forms['loginform'].elements['username'].focus();
			  </SCRIPT>
</body>
</html>
<?php ob_end_flush(); ?>