<?php
#ob_start();
#session_start();
#$u=$_SESSION["u"];
include"bookingroom/config.php";
include("bookingroom/connect/connect.php");
include"bookingroom/inc/function.php";

$key=$_GET[key];
$room=$_GET[room];
$key2=explode("-",$key);
$y=$key2[0]+543;

		#$html='<pagebreak orientation="landscape" type="" margin-left="5mm" margin-right="5mm" margin-top="5mm" margin-bottom="5mm" margin-header="5mm" margin-footer="5mm" />';	

		$html="<h1 class='heading2'>รายงานประจำเดือน ".nameMonth($key2[1])." ปี ".$y."</h1>";
	
	if($room == 0)
	{
			$sql2="select *,jos_users.name as a, meetingroom_croom.name as a2
			from meetingroom_userq inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
			inner join  organization on (jos_users.DeID=organization.DeID)
			inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
			inner join book_status on (meetingroom_userq.status1 = book_status.sta_id)
			inner join room_time on (meetingroom_userq.time_in = room_time.tim_id)
			where mid(meetingroom_userq.Dater,1,7) = '$key'
			order by meetingroom_userq.Dater, room_time.tim_id asc";
	}
	else
	{
		$sql2="select *,jos_users.name as a, meetingroom_croom.name as a2
			from meetingroom_userq inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
			inner join  organization on (jos_users.DeID=organization.DeID)
			inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
			inner join book_status on (meetingroom_userq.status1 = book_status.sta_id)
			inner join room_time on (meetingroom_userq.time_in = room_time.tim_id)
			where mid(meetingroom_userq.Dater,1,7) = '$key'
			and meetingroom_userq.cr_id = '$room'
			order by meetingroom_userq.Dater, room_time.tim_id asc";
	}
		$rs2=mysql_query($sql2);
		$total=mysql_num_rows($rs2);
    $html.='<table width="100%" border="0" cellpadding="0" cellspacing="1" class="table">';
    	$html.="<tr>";
        	$html.='<td colspan="6"><strong>จำนวน '.$total.' รายการ</strong></td>';
        $html.="</tr>";
      $html.='<tr>';
      	$html.='<th>เลขที่รายการ</th>
      <th>ห้อง</th>
      	<th>วัน/เวลาจอง</th>
        <th>ชื่องาน</th>
        <th>ชื่อผู้จอง</th>
        <th>สถานภาพ</th>
        </tr>';
		$a=1;
		$ans=0;
		while($ob2=mysql_fetch_array($rs2)){
      $html.='<tr>';
      	$html.='<td>'.$ob2[uq_id].'</td>';
      	$html.='<td>'.$ob2[a2].' ('.$ob2[location].')</td>';
		$html.='<td>'.dateThai($ob2[Dater]).'<br/>'.$ob2[start].' - '.$ob2[end].'</td>';
		$html.='<td><a href="bookingroom/inc/roomview.inc.php?ID='.$ob2[uq_id].'" title="รายละเอียดการจอง" rel="gb_page_center[640, 480]">'.$ob2[title].'</a></td>';
    	$html.='<td>'.$ob2[a].'<br/>'.$ob2[Fname].'</td>';
        $html.='<td><a href="#" title="'.$ob2[sta].'"><img src="bookingroom/img/'.$ob2[img].'" /></td>';
	  $html.="</tr>";
	  	$a++;
	  }
    $html.="</table>";
	$html.="<br/>";
	$html.='<table width="100%" class="table2">';
		$html.="<tr>";
			$html.="<td class='td2'>วันที่พิมพ์รายงาน ".dateThai2($datelog)."</td>";
		$html.="</tr>";
	$html.="</table>";

	
include("bookingroom/MPDF54/mpdf.php");

$mpdf=new mPDF('th-GB-x','A4','','',5,5,5,5,0,0);
#$mpdf->mirrorMargins = true;

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 1;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('bookingroom/MPDF54/examples/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,2);

#$mpdf->Output('mpdf.pdf','I');
$mpdf->Output();
exit;
?>