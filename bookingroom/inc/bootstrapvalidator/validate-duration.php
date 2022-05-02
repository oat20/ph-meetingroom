<?php
// This is a sample PHP script which demonstrates the 'remote' validator
// To make it work, point the web server to root Bootstrap Validate directory
// and open the remote.html file:
// http://domain.com/demo/remote.html

//sleep(5);
//include"../../config.php";
//include("../../connect/connect.php");
include("../function.php");

$valid = true;
$duration = date_num(date("Y-m-d"), $_POST["startdate"]);

if($duration >= '3'){
	$valid   = true;
   
}else{
	$valid   = false;
	 //$message = 'ไม่สามารถทำรายการได้ต้องจองล่วงหน้าอย่างน้อย 3 วัน';
}

echo json_encode(array(
    'valid' => $valid
));
/*echo json_encode(
    $valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
);*/
