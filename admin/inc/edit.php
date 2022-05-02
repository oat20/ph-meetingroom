<?php
$key_cid=$_GET[key_cid];

$action=$_POST[action];

if($action == "edit"){

$text1=$_POST[text1];
$text2=$_POST[text2];
#$myColorFld=$_POST[myColorFld];

	$lastupdate = date("Y-m-d H:i:s");
	
	if($key_cid != ""){
$cmd= " update room_category set category='$text1', amount='$text2', lastupdate='$lastupdate', color='$myColorFld' 
where cid='$key_cid'";
mysql_query($cmd, $link);
header("location: ".$livesite."room.php");
}

if($keyId != ""){
$cmd= " update room_category set category='$text1', amount='$text2', lastupdate='$lastupdate', color='$myColorFld' 
where cid='$keyId'";
mysql_query($cmd, $link);
header("location: ".$livesite."roomCat.php");
}

?>
