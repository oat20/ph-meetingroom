<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
include("../bookingroom/config.php");
$conn = mysql_connect($host, $userhost, $passhost);
mysql_query("SET NAMES UTF8");

$valid = true;

$email=split("@",$_POST["email"]);

if(trim($email["1"]) == "mahidol.ac.th"){
	
	$valid = true;
	//$message="รูปแบบอีเมลต้องเป็น @mahidol.ac.th หรือ @mahidol.edu";
	$sql="select * from phroom.jos_users 
	where email = '$_POST[email]'";
	$rs=mysql_query($sql);
	$row=mysql_num_rows($rs);
	if($row==0){
		
		$valid = true;	
			
		$sql="select * from ph_hr_eform.personel_muerp
		where per_email='$_POST[email]'";
		$rs=mysql_query($sql);
		$ob=mysql_fetch_assoc($rs);
		if(isset($ob['per_id'])){
			$valid = true;	
		}else{
			$valid = false;
			$message='ไม่มีอีเมลนี้ในระบบนามานุกรมออนไลน์ (Phonebook)';
		}
	
	}else if($row>=1){
		$valid = false;
		$message = 'มี Email นี้ในระบบแล้ว';
	}

}else{
	
	$valid = false;
    $message = 'รูปแบบอีเมลต้องเป็น @mahidol.ac.th เท่านั้น';

}


/*echo json_encode(array(
    'valid' => $valid,
));*/
echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);