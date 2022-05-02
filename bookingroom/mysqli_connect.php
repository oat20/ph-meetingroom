<?php
$mysqli= mysqli_connect($host,$userhost,$passhost,$dbhost);
mysqli_query($mysqli, "SET SESSION sql_mode=''");
mysqli_set_charset($mysqli, 'utf8');
?>