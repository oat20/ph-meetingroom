<?php 
ob_start();#setcookie("u","");
session_start();
session_destroy();

header("location: ../calendar.php");
?>