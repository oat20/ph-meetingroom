<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
include("bookingroom/config.php");
include("bookingroom/connect/connect.php");

$valid = true;

//$email = explode("@",$_POST["email"]);
list($name, $address) = explode("@",$_POST["email"]);

//if($email['1'] == "mahidol.ac.th"){
if(trim($address) == "mahidol.ac.th"){
	
	$valid = true;
    //$message = 'The username is not available';
	$sql = mysql_query("select * from jos_users
	where email = '$_POST[email]'");
	$row = mysql_num_rows($sql);
	if($row == 0){
		$valid = true;
	}else if($row >= 1){
		$valid = false;
		$message = 'มีอีเมลนี้ในระบบแล้ว';
	}
	
}else{
	
	$valid = false;
	$message = 'โปรดใช้อีเมลของทางมหาวิทยาลัยฯ (@mahidol.ac.th)';

}

/*echo json_encode(array(
    'valid' => $valid
));*/
echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);
