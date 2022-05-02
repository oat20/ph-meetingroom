<?php
if($_SERVER['HTTP_HOST'] != 'localhost' and $_SERVER['SERVER_ADDR'] != '127.0.0.1' and $_SERVER['SERVER_ADDR'] != '10.13.101.2'){
	header('location: '.$livesite.'bookingroom/check-intranet-action.php');
}
?>