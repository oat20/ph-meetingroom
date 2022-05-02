<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
include("../../config.php");
include("../../connect/connect.php");

$valid = true;

//$email=split("@",$_POST["email"]);

$sql="select username from jos_users 
where username = '$_POST[username]'";
$rs=mysql_query($sql);
$row=mysql_num_rows($rs);
/*if($email["1"] != "mahidol.ac.th" or $email["1"] != "mahidol.edu"){
	$valid   = false;
	$message="รูปแบบอีเมลต้องเป็น @mahidol.ac.th หรือ @mahidol.edu";
}else if($row != "0"){
	$valid = false;
    $message = 'มีอีเมลนี้ในระบบแล้ว';
}*/
if($row != "0"){
	$valid = false;
    $message = 'มี Username นี้ในระบบแล้ว';
}else{
	$valid = true;
}


/*echo json_encode(array(
    'valid' => $valid,
));*/
echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);