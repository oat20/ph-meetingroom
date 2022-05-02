<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");

$tm = $_GET['tm'];
if(date('D',strtotime($tm)) == 'Fri'){ $s='+1'; $e='+7'; }else if(date('D',strtotime($tm)) == 'Sun'){ $s='+1'; $e='+7'; }else{ $s='+1'; $e='+7';}

$html='';
for($i=$s;$i<=$e;$i++){
		$tm2=date('Y-m-d',strtotime($tm.' +'.$i.' days'));
		
$sql2="select *, meetingroom_croom.name as r_name
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where meetingroom_userq.Dater='$tm2' 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		order by meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc";
		$rs2 = mysql_query($sql2);

/*$html='<img src="Mahidol_PH_03.jpg">
	<h1>รายการจองห้องวันที่ '.dateThai($tm).'</h1>';*/
$html.='<table width="100%">
	<tbody>
		<tr>
		<td><img src="Mahidol_PH_03.jpg"></td>
		<td class="pmhTopRight font-18">รายการจองห้องวัน '.dateThai3($tm2).'</td>
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
		<tfoot>
		  <tr>
			<th>Status</th>
			<th>เวลา</th>
			<th>ห้อง</th>
			<th><div class="style3">วันที่จอง</div></th>
			<th><div class="style3">วัตถุประสงค์</div></th>
			<th>ผู้จอง</th>
			</tr>
		</tfoot>
		<tbody>';
			while($ob2 = mysql_fetch_assoc($rs2)){
				
				$media = '';
				$qMedia = mysql_query("select * from meetingroom_mediarelation as t1
					inner join meetingroom_media as t2 on (t1.media_id = t2.media_id)
					where t1.uq_id = '$ob2[uq_id]'
					order by convert(t2.media using tis620) asc");
				while($obMedia = mysql_fetch_assoc($qMedia)){
					$media.=$obMedia['media'].', ';
				}
			
				$html.='<tr>
					<td class="td-border-2">'.$cf_msgicon2_noicon[$ob2['confirm']]['title'].'</td>
          <td class="td-border-2">'.$ob2["time_in"].' - '.$ob2["time_out"].'</td>
	  	<td class="td-border-2"><strong>'.$ob2[r_name].' ('.$ob2['location'].')</strong></td>
		<td class="td-border-2">'.dateThai($ob2[Dater]).'</td>
	  	<td class="td-border-2">'.$ob2["title"].'<br><strong>อุปกรณ์ที่ต้องการใช้:</strong> '.substr($media,'0','-2').'</td>
        <td class="td-border-2">'.$ob2[uname].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"].'</td>
				</tr>';
			}
		$html.='</tbody>
	</table>';
	
	if($i != $e){$html.='<pagebreak>';}
	
	$footer='<p class="font-10 bpmClearC">หน้า {PAGENO}/{nbpg}</p>';
}

include("../bookingroom/MPDF54/mpdf.php");

$mpdf=new mPDF('th','A4-L','','thsarabun',6,6,6,6,0,5); //A4 แนวตั้ง, A4-L แนวนอน

$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

$stylesheet = file_get_contents('../bookingroom/MPDF54/examples/mpdfstyletables_02.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->SetAutoFont(AUTOFONT_ALL);

$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($html);
//$mpdf->setFooter('หน้า {PAGENO}/{nbpg}');

$mpdf->Output('weekagenda.pdf','I');
exit;
?>