<?php
session_start();

include"bookingroom/config.php";
require_once './bookingroom/mysqli_connect.php';
//include"bookingroom/connect/connect.php";
require_once './bookingroom/inc/function.php';

$login_username=$_POST["login_username"];
$login_password=$_POST["login_password"];
$action = $_POST["action"];
		
if($action == "login")
{
		#if($_SESSION['captcha'] != $_POST['capt'] || $_SESSION['captcha']=='BADCODE'){
			#$msgalert="อักษรในภาพไม่ถูต้อง";
		#}else{
				$sql_login = "select jos_users.id, jos_users.DeID, jos_users.usertype,
					jos_users.email
				from jos_users
				inner join user_type on (jos_users.usertype = user_type.id)
				inner join organization on (jos_users.DeID = organization.DeID)
				where (jos_users.username = '$login_username' 
				or jos_users.email = '$login_username') 
				and jos_users.password = '$login_password'
				and user_type.flag = '1'";
				$result_login = mysqli_query($mysqli, $sql_login);
				$num_row=mysqli_num_rows($result_login);
				$object_login = mysqli_fetch_assoc($result_login);
					
				$u=$object_login["id"];
				$ses_deid=$object_login['DeID'];

					if ($num_row != "0")
					{
						//session_register("u");// userid
						//session_register("ses_deid"); //user department
						$_SESSION['u'] = $u;
						$_SESSION['ses_deid'] = $ses_deid;
						$_SESSION['ses_email'] = $object_login['email'];
						$_SESSION["userType"] = $object_login["usertype"]; //usertype
						
						$datelog = date("Y-m-d H:i:s");
						$ip = $_SERVER['REMOTE_ADDR'];
					$sql_userlog = "INSERT INTO user_log (us_id, 
					ul_in, 
					ul_ip)
					VALUES ('$u', 
					'$datelog', 
					'$ip')";
					mysqli_query($mysqli, $sql_userlog);
					
					$sqlLast = "update jos_users set 
					lastvisitDate = '$datelog' 
					where id = '$u'";
					mysqli_query($mysqli, $sqlLast);
						#$result_userlog = mysql_query($sql_userlog, $link) or die("Error"); 
						header("location: allrooms.php");
						//header("location: home.php?sta_id=1");
						#echo"<meta http-equiv=refresh content=0;URL=formbooking.php?mode=add>";
 					}
					else   
					{
							echo"<script language='JavaScript'>";
								echo"alert('! Username หรือ รหัสผ่าน ไม่ถูกต้อง');";
								echo"window.location='".$_SERVER['PHP_SELF']."';";
								echo"</script>";
					}
		#}
}else if($action == "forgetpw"){
	
	if(isset($_POST['email']))
		{
				$sql_login = "select username,password,email 
				from jos_users
				where email = '$_POST[email]'";
				$result_login = mysqli_query($mysqli, $sql_login);
				$num_row=mysqli_num_rows($result_login);
				$ob=mysqli_fetch_array($result_login);
				$pw=$ob['password'];

					if ($num_row != "0")
					{
						$message="<p><table>";
						$message.="<tr>";
						$message.="<td><span>Username ของคุณคือ:</td>";
						$message.="<td class=fontred>".$ob['username']."</td>";
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
						include("mailer/mail.php");
						smtpmail($ob['email'],"แจ้งรหัสผ่านระบบจองห้องประชุม",$message);
						//smtpGmail($ob['email'],"แจ้งรหัสผ่านระบบจองห้องประชุม",$message);
						/*$msgalert = '<div class="alert alert-dismissible alert-success">
						<p><i class="fa fa-check" aria-hidden="true"></i> ระบบได้ส่งรหัสผ่านไปยัง Email ของท่านแล้ว <a href="http://webmail.mahidol.ac.th/" class="alert-link"><i class="fa fa-envelope" aria-hidden="true"></i> Check Email</a></p>
						</div>';*/
						$msgalert = '<div class="alert alert-dismissible alert-success">
						<p><i class="fa fa-check" aria-hidden="true"></i> ระบบได้ส่งรหัสผ่านไปยัง Email ของท่านแล้ว</p>
						</div>';
						//print $msg;
 					}
					else   
					{
							$msgalert = '<div class="alert alert-dismissible alert-warning">
							<p><i class="fa fa-exclamation" aria-hidden="true"></i> Email Address นี้ไม่อยู่ในระบบ</p>
							</div>';
							//print $msg;
					}
		}
		
}else if($action === 'login2'){
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$activation = mysqli_real_escape_string($mysqli, random_ID(2));

	$sql = mysqli_query($mysqli, "select * from jos_users where email like '$email'");
	if(mysqli_num_rows($sql) > 0){
		mysqli_query($mysqli, "update jos_users set
			activation = '$activation'
			where email like '$email'
		");
	}else{
		mysqli_query($mysqli, "insert into jos_users (name,
			email,
			usertype,
			registerDate,
			activation) 
			values ('$email',
			'$email',
			'1',
			CURRENT_TIMESTAMP(),
			'$activation')
		");
	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?=$sitename;?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $sitename;?></title>
<?php include("bookingroom/css-inc.php");?>
<!--<link href="bookingroom/css/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
        var GB_ROOT_DIR = "bookingroom/GreyBox/greybox/";
    </script>

    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/gb_scripts.js"></script>
    <link href="bookingroom/GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />-->
</head>

<body>
<?php include("bookingroom/navbar-inc.php");?>

<div class="container">

	<div class="row">
    
    	<div class="col-xs-12 col-sm-12 col-md-6">
        	<?php include("practice/view.php");?>
        </div>
        
    	<div class="col-xs-12 col-sm-12 col-md-6">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</h3>
                </div>
                <div class="panel-body">
                <?php
				echo $msgalert;
				
				$mode = $_GET['mode'];
				switch($mode){
					case "1" : include("bookingroom/forgetpw.htm"); break;
					//case "2"; include("bookingroom/register.php"); break;
					default : include("bookingroom/login.php"); break;
				}
				?>
                </div>
            </div>

			<!--<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-sign-in fa-fw" aria-hidden="true"></i> เข้าสู่ระบบ</h3>
				</div>
				<div class="panel-body">
					<form id="formlogin2" action="<?php //echo $_SERVER['PHP_SELF'];?>" method="POST">
						<div class="form-group">
							<label>ชื่อผู้ใช้ หรืออีเมลที่ลงทะเบียนไว้</label>
							<input type="email" class="form-control" placeholder="MU Email" name="email" required>
						</div>
						<input type="hidden" name="action" value="login2">
						<button type="submit" class="btn btn-primary btn-block">ถัดไป <i class="fa fa-arrow-right fa-fw" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>-->
        
        </div><!--col-12-->
    </div><!--row-->
    
</div><!--container-->

<?php include("bookingroom/web_analysic.php");
include("bookingroom/js-inc.php");
?>
<script>
$(document).ready(function() {

	$('#formlogin2').bootstrapValidator({
		fields: {
			email: {
                //message: 'The username is not valid',
                validators: {                    
                    remote: {
						type: 'post',
                        url: './bookingroom/inc/bootstrapvalidator/mu-emailformat.php',
                        //message: 'รูปแบบอีเมลไม่ถูกต้อง (@mahidol.ac.th เท่านั้น)'
                    }
                }
            }
		}
	});
	
	$('#formLogin').bootstrapValidator({
	});
	
	$('#forgetpw').bootstrapValidator({
		/*fields: {
			email: {
                //message: 'The username is not valid',
                validators: {                    
                    remote: {
                        url: 'bookingroom/inc/bootstrapvalidator/repeat-email.php',
                        //message: 'รูปแบบอีเมลไม่ถูกต้อง (@mahidol.ac.th เท่านั้น)'
                    }
                }
            }
		}*/
	});
	
});
</script>
</body>
</html>