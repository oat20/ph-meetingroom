<?php
include"../bookingroom/config.php";
include("../bookingroom/connect/connect.php");

$strFileName = "mail_it.txt";
#$objFopen = fopen($strFileName, 'r');
$objFopen = file($strFileName);
if ($objFopen) {
    #while (!feof($objFopen)) {
		for($i=0;$i<sizeof($objFopen);$i++){
        //$file = fgets($objFopen, 4096);
		//$f=explode(",",$file);
		//$f=explode(",",$objFopen[$i]);
		print $objFopen[$i];
		echo '<hr/>';
		//$ministry=trim($objFopen[$i]);
		//echo $ministry.'<hr/>';
		//$name=trim(iconv("tis-620","utf-8",$f["0"]));
		//$surname=trim(iconv("tis-620","utf-8",$f["1"]));
		//mysql_query("insert into mail_contact_it (email) values ('$objFopen[$i]')");
    }
    #fclose($objFopen);
}
?>