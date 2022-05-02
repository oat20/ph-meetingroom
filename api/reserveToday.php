<?php
include"../bookingroom/config.php";
include"../bookingroom/connect/connect.php";

$xml=array('<?xml version="1.0" encoding="utf-8"?>');

$xml[]="<booking>";
	
	$sql="select meetingroom_croom.name,meetingroom_croom.location,meetingroom_userq.title,room_time.start,room_time.end,book_status.sta,organization.Fname,organization.tel 
				from meetingroom_userq, meetingroom_croom, book_status, room_time,jos_users,organization
				where meetingroom_userq.cr_id = meetingroom_croom.cr_id
				and meetingroom_userq.status1 = book_status.sta_id
				and meetingroom_userq.time_in = room_time.tim_id
				and meetingroom_userq.u_id = jos_users.id
				and jos_users.DeID = organization.DeID
				and meetingroom_userq.Dater = '$today'
				and meetingroom_userq.status1 <> '3'
				order by room_time.tim_id asc";
	$result = mysql_query($sql);
	while($setinfo = mysql_fetch_array($result)){
		$xml[]="<item>";
			$xml[]="<time>".$setinfo[start]." - ".$setinfo[end]."</time>";
			$xml[]="<title>".$setinfo[title]."</title>";
			$xml[]="<department>".$setinfo[Fname]."</department>";
			$xml[]="<room>".$setinfo[name]."</room>";
			$xml[]="<location>".$setinfo[location]."</location>";
		$xml[]="</item>";
	}

$xml[]="</booking>";

$xmloutput=join("\n",$xml);

header("content-type: application/xml");

echo $xmloutput;
?>