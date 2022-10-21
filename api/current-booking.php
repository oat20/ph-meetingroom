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
    $sql2="select *, meetingroom_croom.name as r_name
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where CONCAT( meetingroom_userq.Dater, ' ', meetingroom_userq.time_in, ':00' ) >= CURRENT_TIMESTAMP() 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		order by meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc,
        meetingroom_userq.time_out,
        convert(concat(meetingroom_croom.name,' ',meetingroom_croom.location) using tis620)";
		$rs2 = mysqli_query($mysqli, $sql2);
		while($ob2=mysqli_fetch_array($rs2)){
            $media = '';
			$qMedia = mysqli_query($mysqli, "select * from meetingroom_mediarelation as t1
				inner join meetingroom_media as t2 on (t1.media_id = t2.media_id)
				where t1.uq_id = '$ob2[uq_id]'
				order by convert(t2.media using tis620) asc");
			while($obMedia = mysqli_fetch_assoc($qMedia)){
				$media.=$obMedia['media'].', ';
			}
            $media_display='('.substr($media,'0','-2').')';
            $response['data'][]=array(
                'dater'=>date('d/m/Y',strtotime($ob2['Dater'])).', '.$ob2["time_in"].'-'.$ob2["time_out"],
                'title'=>$ob2["title"],
                'room'=>$ob2['r_name'].' '.$ob2['location'],
                'contact'=>$ob2['uname'].' '.$ob2["Fname"].' '.$ob2["phone"],
                'note'=>trim($ob2['optionss'].' '.$media_display)
            );
        }
         echo json_encode($response);
}else{
    echo json_encode(array(
        'status'=>'Error'
    ));
}

mysqli_close($mysqli);
?>