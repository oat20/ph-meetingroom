<?php
$datelog = date("Y-m-d H:i:s");
$ip=getenv(REMOTE_ADDR);
$url = getenv("REQUEST_URI"); 

$sql_userlog = "INSERT INTO user_log(ul_in, ul_ip, ul_url)
VALUES('$datelog', '$ip', '$url')";
mysql_query($sql_userlog);
?>