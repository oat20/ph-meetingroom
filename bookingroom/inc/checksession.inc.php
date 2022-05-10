<?php
$u=$_SESSION["u"];
$ses_deid=$_SESSION["ses_deid"];

	if($u == ""){
		#header("location: DevIT/index.php");
		header("location: ".$livesite."login.php");
	}else{
		#$url = getenv("REQUEST_URI");
		$sqlLog = "insert into user_log(us_id, ul_in, ul_ip, ul_url) values('$u', '$datelog', '$getip', '$url')";
		mysqli_query($mysqli, $sqlLog);
	}
?>