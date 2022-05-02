<?php
//Check if form submit with capt variable
if(!isset($_POST['submit']) || !isset($_POST['capt'])) {
	//Form not submit return error
	exit("Error");
}

//session must be start to perform check
session_start();

//check input capt with session captcha
if($_SESSION['captcha'] != $_POST['capt'] || $_SESSION['captcha']=='BADCODE')
    { 
     //wrong captcha exit the program not continue.
	 exit("wrong code");
	}

//correct captcha continue program
echo "Excellent";
// ....................
?>
