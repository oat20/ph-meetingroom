<?php
header("Access-Control-Allow-Origin: *");
	
	header("Content-Type: application/json; charset=UTF-8");
	
	header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
	
	header("Access-Control-Max-Age: 3600");
	
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
require_once '../bookingroom/config.php';
require_once '../bookingroom/mysqli_connect.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
    $response=array(
        'status'=>'OK',
    );
    $sql2=mysqli_query($mysqli,"SELECT date_format(t1.Dater, '%d/%m/%Y') as date_display,
t1.time_in,
t1.time_out,
t1.title,
concat(t2.name,' ',t2.location) as room
FROM meetingroom_userq AS t1
INNER JOIN meetingroom_croom AS t2 ON ( t1.cr_id = t2.cr_id )
WHERE CONCAT( t1.Dater, ' ', t1.time_in, ':00' ) >= CURRENT_TIMESTAMP( )
AND t1.uq_cancel LIKE 'No'
ORDER BY t1.Dater, t1.time_in, t1.time_out, CONVERT( CONCAT( t2.name, ' ', t2.location )
USING tis620 )
LIMIT 1");
$rs2=mysqli_fetch_assoc($sql2);
$response['data'][]=array(
    'dater'=>$rs2['date_display'],
    'timein'=>$rs2['time_in'],
    'timeout'=>$rs2['time_out'],
    'room'=>$rs2['room'],
    'title'=>$rs2['title']
);
//http_response_code(200);
echo json_encode($response);
}else{
    //http_response_code(400);
    echo json_encode(array(
        'status'=>'Error'
    ));
}
?>