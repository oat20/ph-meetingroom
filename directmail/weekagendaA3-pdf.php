<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");

$tm = $_POST['tm'];
if(date('D',strtotime($tm)) == 'Fri'){ $s='0'; $e='4'; }else if(date('D',strtotime($tm)) == 'Sun'){ $s='0'; $e='4'; }else{ $s='0'; $e='4';}

$html.='<table width="100%">
	<tbody>
		<tr>
		<td><img src="Mahidol_PH_03.jpg"></td>
		<td class="pmhTopRight">
			<span class="font-20">PH-Weekly Calendar</span><br>
			http://www.ph.mahidol.ac.th
		</td>
		</tr>
	</tbody>
</table>';

$html.='<table width="100%">
		<thead>
		  <tr>
			<th class="bpmClearC"><div class="style3">วันที่</div></th>
			<th class="bpmClearC"><div class="style3">กิจกรรม</div></th>
			<th class="bpmClearC">สถานที่</th>
			</tr>
		</thead>
		<tfoot>
		  <tr>
			<th class="bpmClearC"><div class="style3">วันที่</div></th>
			<th class="bpmClearC"><div class="style3">กิจกรรม</div></th>
			<th class="bpmClearC">สถานที่</th>
			</tr>
		</tfoot>
		<tbody>';

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

		$html.='<tr>
						<td class="td-border-3"><strong>'.dateThai4($tm2).'</strong></td>
						<td class="td-border-3"></td>
						<td class="td-border-3"></td>
				</tr>';
	
			while($ob2 = mysql_fetch_assoc($rs2)){
							
				$html.='<tr>
					  <td class="td-border-2">'.$ob2["time_in"].' - '.$ob2["time_out"].'</td>					
					<td class="td-border-2 bpmClearC">'.$ob2["title"].'<br>จัดโดย '.$ob2["Fname"].' โทร.'.$ob2["phone"].'</td>
					<td class="td-border-2 bpmClearC">'.$ob2[r_name].' ('.$ob2['location'].')</td>
				</tr>';
			}
		
	//if($i != $e){$html.='<pagebreak>';}
	//$footer='<p class="font-10 bpmClearC">หน้า {PAGENO}/{nbpg}</p>';
}

$html.='</tbody>
	</table>';

include("../bookingroom/MPDF54/mpdf.php");

$mpdf=new mPDF('th','A3','0','dbhel',5,5,5,5,0,0); //A4 แนวตั้ง, A4-L แนวนอน

$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

$stylesheet = file_get_contents('../bookingroom/MPDF54/examples/mpdfstyletables_A3.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->SetAutoFont(AUTOFONT_ALL);

//$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($html);
//$mpdf->setFooter('หน้า {PAGENO}/{nbpg}');

$mpdf->Output('weekagenda.pdf','I');
exit;
?>