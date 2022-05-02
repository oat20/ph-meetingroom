<?
include"../config.php";
include $livepath."connect/connect.php";

$startdate=$_POST["startdate"];
$enddate=$_POST["enddate"];
$stime=$_POST["stime"];
$etime=$_POST["etime"];
#$allday=$_POST["allday"];
$room=$_POST["room"];
$dep=$_POST["dep"];
$text2=$_POST["text2"];
$teacher=$_POST["teacher"];
$course=$_POST["course"];
$text3=$_POST["text3"];
$names=$_POST["names"];
$program=$_POST["program"];

$sql="select max(id) as maxid
from room_booking";
$rs=mysql_query($sql, $link);
$ob=mysql_fetch_array($rs);
$maxid=$ob["maxid"];
if($maxid == 0 || $maxid == ""){
	$maxid = 1;
}else{
	$maxid = $maxid + 1;
}

if($enddate == ""){ $enddate = $startdate; }

$sql2="insert into room_booking(id, subject, cid, teacher, course, starttime, endtime, startdate, enddate, useradd, depid, amount)
values('$maxid', '$text2', '$room', '$teacher', '$course', '$stime', '$etime', '$startdate', '$enddate', '$names', '$dep', '$text3')";
mysql_query($sql2, $link);

foreach($program as $key => $key2){
	#echo $key2."<br/>";
	$sql3="insert into room_program(id, program)
	values('$maxid', '$key2')";
	mysql_query($sql3, $link);
}

header("location: ".$livesite."index.php?mode=confirmbook&maxid=$maxid");
?>
