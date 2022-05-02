<?php
session_start();

include"../bookingroom/config.php";
//include("../bookingroom/check-intranet.php");
include"../bookingroom/connect/connect.php";
include("../bookingroom/inc/function.php");
include("../mailer/mail.php");
?>
<!doctype html>
<html>
	<head>
		<?php include("../bookingroom/css-inc.php");?>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:6px;
	top:7px;
	width:818px;
	height:893px;
	z-index:1;
}
#Layer14 {position:absolute;
	left:1px;
	top:50px;
	width:682px;
	height:158px;
	z-index:12;
}
#Layer2 {
	position:absolute;
	left:238px;
	top:36px;
	width:306px;
	height:20px;
	z-index:2;
}
-->
</style>
</head>
<body>
<?php 
include("../bookingroom/navbar-inc.php");

if($_POST['action']=='add' and isset($_POST['email']) and isset($_POST['m1']) and isset($_POST['org']) and isset($_POST['tel'])){
	
	$maxid = maxid("jos_users","id");
	$password=random_ID('2','2');
	
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
		'$_POST[m1]', 
		'$_POST[email]', 
		'$_POST[email]', 
		'$password', 
		'1', 
		'$datelog', 
		'$_POST[org]',
		'$_POST[tel]')";
		$rs=mysql_query($sql);
		
		if($rs){
			
			$message="สวัสดี คุณ ".$_POST['m1']." <p><table>";
						$message.="<tr>";
						$message.="<td><span>Account Name ของคุณคือ:</td>";
						$message.="<td class=fontred>".$_POST['email']."</td>";
						$message.="</tr>";
						$message.="<tr>";
						$message.="<td>Password ของคุณคือ:</td>";
						$message.="<td class=fontred>".$password."</td>";
						$message.="</tr>";
						$message.="<tr>";
						$message.="<td>สามารถเข้าสู่ระบบได้ที่:</td>";
						$message.="<td class=fontred><a href='".$livesite."login.php' target='_blank'>".$livesite."login.php</a></td>";
						$message.="</tr>";
						$message.="<table></p>";
						$message.='<p>*แนะนำใช้งานบน <a href="https://www.google.com/intl/th/chrome/browser/desktop/" target="_blank">Google Chrome</a> หรือ <a href="https://www.mozilla.org/th/firefox/new/" target="_blank">Firefox</a> เพื่อการแสดงผลที่สมบูรณ์</p>';
						$message.='<p>**มีปัญหาการใช้งานระบบติดต่องานบริหารทั่วไป หรืองานเทคโนโลยีสารสนเทศและการสื่อสาร</p>';
						#print $message;
						//smtpmail($_POST['email'],"Notification : ".$sitename_01." แจ้งรหัสผ่านระบบจองห้องประชุม",$message);
						smtpGmail($_POST['email'],"Notification : ".$sitename_01." แจ้งรหัสผ่านระบบจองห้องประชุม",$message);
						
			/*$error_msg= blog_alert_03('success','<i class="fa fa-check"></i> Success','ระบบได้ส่งรหัสผ่านไปยังอีเมลของท่านแล้ว <a href="http://webmail.mahidol.ac.th/" class="alert-link"><i class="fa fa-envelope" aria-hidden="true"></i> MU Webmail</a>');*/
			$error_msg= blog_alert_03('success','<i class="fa fa-check"></i> Success','ระบบได้ส่งรหัสผ่านไปยังอีเมลของท่านแล้ว');
			
		}
		
}
?>

<div class="container">
	
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">ลงทะเบียนเข้าใช้งาน</h3>	
        </div>
        <div class="panel-body">
        	<?php echo $error_msg;?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="form2" class="form-horizontal">
  	<div class="form-group form-group-lg">
    	<label class="control-label col-sm-3">Email Address:</label>
        <div class="col-sm-9">
        	<input type="email" name="email" class="form-control" required>
             <!--<span class="help-block">กรุณาใช้ Email ของทางมหาวิทยาลัยฯ ในการลงทะเบียน (@mahidol.ac.th)</span>-->
             <span class="help-block">ระบบจะส่งรหัสผ่านไปยังอีเมลของท่าน (กรุณาใช้ Email ที่ใช้งานจริง)</span>
        </div>
    </div>
    
  	<div class="form-group form-group-lg">
    	<label class="control-label col-sm-3">ชื่อ - นามสกุล:</label>
        <div class="col-sm-9">
        	<input name="m1" type="text" id="m1" value="<?php echo $m1; ?>" size="60" maxlength="255" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group form-group-lg">
    	<label class="control-label col-sm-3">ส่วนงาน:</label>
        <div class="col-sm-9">
        	<select name="org" class="form-control" required>
					<option value="">- เลือกรายการ -</option>
					<?php
						$sql="select * from organization
						order by DeID asc";
						$rs=mysql_query($sql);
						while($ob=mysql_fetch_assoc($rs)){
					?>
					<option value="<?php echo $ob[DeID];?>">- <?php echo $ob["Fname"]; ?></option>
					<?php
						}
					?>
				</select>
        </div>
    </div>
    
    <div class="form-group form-group-lg">
    	<label class="control-label col-sm-3">เบอร์ภายใน:</label>
        <div class="col-sm-4">
        	<input type="text" name="tel" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group">
    	<div class="col-sm-9 col-sm-offset-3">
        	<input name="action" type="hidden" value="add" />
            <input type="submit" name="Submit" value="Ok" class="btn btn-primary btn-lg"> 
           <a href="../login.php" class="btn btn-link btn-lg"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>
        </div>
    </div>
</form>
		</div><!--panel-body-->
	</div><!--panel-->

</div><!--container-->

<?php 
mysql_close();

include("../bookingroom/js-inc.php");
?>
<script>
$(document).ready(function() {
	
	$('#form2').bootstrapValidator({
		
		fields: {			
			 email: {
                validators: {
					notEmpty: {
                        //message: 'The username is required and cannot be empty'
                    },
                    remote: {
						type: 'POST',
                        url: 'repeat-username.php'
                        //message: 'โปรดใช้อีเมลของทางมหาวิทยาลัยฯ (@mahidol.ac.th)'
                    },
					emailAddress: {
                        	//message: 'The input is not a valid email address'
                    }
                }
            },
			 m1: {
                //message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        //message: 'The username is required and cannot be empty'
                    }
                }
            },
			org:{
				validators: {
                    notEmpty: {
                        //message: 'The username is required and cannot be empty'
                    }
                }
			},
			tel:{
				validators: {
                    notEmpty: {
                        //message: 'The username is required and cannot be empty'
                    }
                }
			}
		
		}
		
	});
		
});
</script>
</body>
</html>