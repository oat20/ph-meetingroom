<?php
include"bookingroom/inc/connect_db.php";
#include"bookingroom/inc/procedure.php";

$link=connect_db();

$sql="call Numorg();";
$rs=mysql_query($sql);
#while($ob=mysql_fetch_array($rs)){
	#print $ob[Fname]."<br/>";
#}
?>