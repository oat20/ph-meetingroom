<?php
include('../mailer/mail.php');

$email = 'chakkapan.cha@mahidol.ac.th';
$subject = 'ทดสอบ';

smtpmail( $email , $subject , $subject );
?>