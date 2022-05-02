<?php
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);

include("../config.php");
include("../connect/connect.php");

$sql = mysql_query("select * from meetingroom_userq
inner join meetingroom_croom on (meetingroom_userq.cr_id = meetingroom_croom.cr_id)
inner join meetingroom_objective as objective on (meetingroom_userq.ob_id = objective.ob_id)
where (meetingroom_userq.Dater >= '$_GET[start]'
and meetingroom_userq.enddate <= '$_GET[end]')
and meetingroom_userq.uq_cancel = 'No'
order by meetingroom_userq.time_in asc");
while($ob = mysql_fetch_assoc($sql)){
		$json_data[]=array(
		"id"=>$ob["uq_id"],
        //"title"=>$ob['name'].' '.$ob['ob_title'].' '.$ob["title"],
		"title"=>$ob['name'].', '.$ob['ob_title'].' '.$ob['title'],
        "start"=>$ob["Dater"].' '.$ob["time_in"].':00',
        "end"=>$ob["enddate"].' '.$ob["time_out"].':00',
         "url"=>$livesite."bookingroom/inc/roomview.inc.php?keyID=".$ob["uq_id"],
          //"allDay"=>(true)?true:false,
		  //"color"=>$ob["color"]
		  "color"=>$cf_msgicon2_noicon[$ob['confirm']]['status-color'],
			"textColor"=>"#000000",
		 //"allDay"=>$ob["uq_allday"]
	);
}
$json= json_encode($json_data);  
if(isset($_GET['callback']) && $_GET['callback']!=""){  
echo $_GET['callback']."(".$json.");";      
}else{  
echo $json;  
}
?>