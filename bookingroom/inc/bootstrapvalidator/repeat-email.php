<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
//include("../../config.php");
//include("../../connect/connect.php");
$conn = mysql_connect("localhost", "root", "root");
	mysql_select_db("phroom", $conn);  
	mysql_query("SET NAMES UTF8");

$valid = true;

//$email = split("@",$_POST["email"]);

$sql="select email from jos_users 
where email = '$_POST[email]'";
$rs=mysql_query($sql);
$row=mysql_num_rows($rs);

if($row >= 1){
		$valid = true;
    	//$message = 'มีอีเมลนี้ในระบบแล้ว';
	}else{
		$valid = false;
    	$message = 'ไม่มีอีเมลนี้ในระบบ';
	}

/*echo json_encode(array(
    'valid' => $valid,
));*/
echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);