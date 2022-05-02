<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");

//$tm=date('Y-m-d',strtotime($date_regis.' +1 days'));
$sql2="select *, meetingroom_croom.name as r_name
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where meetingroom_userq.Dater='$_GET[tm]' 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		order by meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc";
		$rs2 = mysql_query($sql2);

/*$html='<img src="Mahidol_PH_03.jpg">
	<h1>รายการจองห้องวันที่ '.dateThai($tm).'</h1>';*/
$html='<table width="100%">
	<tbody>
		<tr>
		<td><img src="Mahidol_PH_03.jpg"></td>
		<td class="pmhTopRight font-18">รายการจองห้องวันที่ '.dateThai($tm).'</td>
		</tr>
	</tbody>
</table>';
	
	$html.='<table width="100%">
		<thead>
		  <tr>
			<th>Status</th>
			<th>เวลา</th>
			<th>ห้อง</th>
			<th><div class="style3">วันที่จอง</div></th>
			<th><div class="style3">วัตถุประสงค์</div></th>
			<th>ผู้จอง</th>
			</tr>
		</thead>
		<tbody>';
			while($ob2 = mysql_fetch_assoc($rs2)){
				$html.='<tr>
					<td class="td-border-2">'.$cf_msgicon2_noicon[$ob2['confirm']]['title'].'</td>
          <td class="td-border-2">'.$ob2["time_in"].' - '.$ob2["time_out"].'</td>
	  	<td class="td-border-2"><strong>'.$ob2[r_name].' ('.$ob2['location'].')</strong></td>
		<td class="td-border-2">'.dateThai($ob2[Dater]).'</td>
	  	<td class="td-border-2">'.$ob2["title"].'</td>
        <td class="td-border-2">'.$ob2[uname].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"].'</td>
				</tr>';
			}
		$html.='</tbody>
	</table>';

include("../bookingroom/MPDF54/mpdf.php");

$mpdf=new mPDF('th','A4-L','','thsarabun',6,6,6,6,0,0); //A4 แนวตั้ง, A4-L แนวนอน
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

$stylesheet = file_get_contents('../bookingroom/MPDF54/examples/mpdfstyletables_02.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->SetAutoFont(AUTOFONT_ALL);
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>