<?php
include"config.php";
include "connect/connect.php";
include "inc/function.php";

$ID=$_GET["uq_id"];

//$html="<body>";
       $cmd = "select meetingroom_userq.Dater, meetingroom_userq.time_in, meetingroom_userq.time_out, jos_users.name, organization.Fname, meetingroom_userq.detail, meetingroom_userq.optionss, book_status.sta, meetingroom_userq.title, jos_users.name as name_created, meetingroom_croom.color, meetingroom_croom.name as room_name, meetingroom_userq.status1, meetingroom_userq.uq_id, meetingroom_croom.location, meetingroom_userq.book_condition, DATE_FORMAT(meetingroom_userq.created, '%d/%m/%Y') as create_date, meetingroom_userq.phone, meetingroom_croom.cr_number, meetingroom_userq.ff_id, meetingroom_userq.uname, meetingroom_userq.tf_id, meetingroom_objective.ob_title, meetingroom_userq.uq_snacknote
	   from meetingroom_userq, meetingroom_croom, jos_users, book_status, room_time, organization,
	   meetingroom_objective
	   where meetingroom_userq.u_id = jos_users.id
	   and meetingroom_userq.cr_id = meetingroom_croom.cr_id
	   and meetingroom_userq.status1 = book_status.sta_id
	   and jos_users.DeID = organization.DeID
	   and meetingroom_userq.uq_id = '$ID'
	   and meetingroom_userq.ob_id = meetingroom_objective.ob_id";
	#mysql_query($cmd, $link);
	$result = mysql_query($cmd);
	#while($row=mysql_fetch_row($result))
	#{
	$row=mysql_fetch_array($result);
			#$row[7]=nl2br($row[7]);
			$condition=explode("/",$row[book_condition]);
			
			$cmd2="select meetingroom_userq.modified, jos_users.name
			from meetingroom_userq, jos_users
			where meetingroom_userq.modified_by = jos_users.id
			and meetingroom_userq.uq_id = '$ID'";
			$rs2=mysql_query($cmd2);
			$row2=mysql_fetch_array($rs2);

/*$html='<pageheader name="booking_id" content-left="เลขที่รายการ: '.$row["uq_id"].'" header-style-right="color: #000000; font-style: italic;"/>
<pageheader name="created" content-right="วันที่: '.$row["created_date"].'" header-style-right="color: #000000; font-style: italic;"/>

<setpageheader name="booking_id" value="on" show-this-page="1" />
<setpageheader name="created" value="on" show-this-page="1" />';*/

/*$html="<table width='100%'><tr><td class='td3'><img src='img/logo2.png' border='0' /></td></tr></table>
	<h1>แบบการจองใช้สถานที่</h1>";*/
	$html='<table width="100%">
		<tbody>
			<tr>
				<td>
					<img src="img/mulogo.jpg" border="0" />				
				</td>
				<td class="font-18">แบบฟอร์มขอใช้สถานที่</td>
				<td><strong>เลขที่รายการ:</strong> '.$row["uq_id"].'<br><strong>วันที่:</strong> '.$row["create_date"].'</td>
			</tr>
		</tbody>
		</table>';
	
      $html.='<table width="100%">
      	<tr>
        	<td><strong>วันที่จอง</strong></td>
            <td>'.dateThai($row[Dater]).' เวลา '.$row["time_in"].' - '.$row["time_out"].'</td>
        </tr>
        <tr>
        	<td><strong>ห้อง</strong></td>
            <td>'.$row[a].' '.$row[room_name].' '.$row["cr_number"].' ('.$row["location"].')</td>
        </tr>
        <tr>
          <td><strong>วัตถุประสงค์เพื่อ</strong></td>
          <td><strong>'.$row["ob_title"].'</strong> '.$row[title].'</td>
        </tr>
        <tr>
        	<td valign="top"><strong>ชื่อผู้จอง</strong></td>
            <td>'.$row["uname"].'<br>'.$row["Fname"].' โทร. '.$row[phone].'</td>
        </tr>
        <tr>
        	<td><strong>จำนวนผู้ใช้</strong></td>
            <td>'.$row[detail].' ท่าน</td>
        </tr>
        <tr>
          <td valign="top"><strong>อาหารว่าง</strong></td>
          <td>';
			$cmd3="select * from meetingroom_snack,meetingroom_snack2
			where meetingroom_snack.food_id=meetingroom_snack2.food_id
			and meetingroom_snack2.uq_id='$ID'
			order by meetingroom_snack.food_id asc";
			$rs3=mysql_query($cmd3);
			while($ob3=mysql_fetch_array($rs3)){
				$html.="&raquo;".$ob3[food]."&nbsp;&nbsp;";
			}
			
          $html.=$row['uq_snacknote'].'</td>
        </tr>
        <tr>
          <td valign="top"><strong>อุปกรณ์ที่ต้องการใช้</strong></td>
          <td>';
          	
		  	$cmd4="select * from meetingroom_media, meetingroom_mediarelation
			where meetingroom_media.media_id=meetingroom_mediarelation.media_id
			and meetingroom_mediarelation.uq_id='$ID'
			order by meetingroom_media.media_id asc";
			$rs4=mysql_query($cmd4);
			while($ob4=mysql_fetch_array($rs4)){
				$html.="&raquo;".$ob4[media]."&nbsp;&nbsp;";
			}
			$html.='</td>';
		  	
          /*$html.="</td>
        </tr>
		<tr>
			<td>	<strong>รูปแบบจัดอาหาร</strong></td>
			<td>";
			
			$sqlFood = mysql_query("select * from meetingroom_foodformat
			where ff_id = '$row[ff_id]'");
			$obFood = mysql_fetch_assoc($sqlFood);
				
			$html.=$obFood["ff_title"]."</td>
		</tr>";*/
		$html.="<tr>
			<td><strong>รูปแบบการจัดโต๊ะ</strong></td>
			<td>";
			$sqlTable = mysql_query("select * from meetingroom_tableformat
			where tf_id = '$row[tf_id]'");
			$obTable = mysql_fetch_assoc($sqlTable);
			$html.=$obTable["tf_title"]."</td>
		</tr>
		<tr>
          <td><strong>เงื่อนไขการใช้</strong></td>
          <td>";
		  $sql5="select * from room_condition_charges
		  where id = '$condition[0]'";
		  $rs5=mysql_query($sql5);
		  $ob5=mysql_fetch_array($rs5);
		 $html.= "<strong>".$ob5[name]."</strong> ".$condition[1];
          $html.="</td>
        </tr>
		<tr>
          <td><strong>หมายเหตุ</strong></td>
          <td>".$row["optionss"]."</td>
        </tr>
        </table>
        ";
        /*$html.="<table width='100%'>
			<tr>
          <td align='right' class='td2'>วันที่พิมพ์ ".dateThai2($datelog)."</td>
        </tr>
      </table>";*/
	  $html.='<table width="100%">
	  	<tbody>
	  	<tr>
			<td width="50%" class="td-border">
				<center>
				ลงชื่อผู้จอง
				<p>&nbsp;</p>
				( '.$row["uname"].' )
				</center>
			</td>
			<td width="50%" class="td-border">
				<center>
				ลงชื่อหัวหน้าภาควิชา/หัวหน้างาน
				<p>&nbsp;</p>
				(......................................................................................)
				</center>
			</td>
		</tr>
		</tbody>
	  </table>';
	  
	   $html.='<table width="100%">
	  	<tbody>
	  	<tr>
			<td width="55%">
				<strong>เรียน เลขานุการคณะฯ</strong>
				<br>
				ได้ตรวจสอบแล้ว <strong>'.$row[room_name].' '.$row["cr_number"].'</strong>
				<br><input type=checkbox> ว่าง <input type=checkbox> ไม่ว่าง 
			</td>
			<td width="45%" class="td-border">
				<strong>อนุมัติและแจ้ง</strong>
				<br><input type=checkbox> งานบริหารการเงิน
				<br><input type=checkbox> งานเทคโนโลยีการศึกษา
				<br><input type=checkbox> งานกายภาพสิ่งแวดล้อมและความปลอดภัย
				<br><input type=checkbox> หัวหน้าแม่บ้าน
				<br><input type=checkbox> งานบริหารทั่วไป
				<br>
				<div>
					ทราบและดำเนินการในส่วนที่เกี่ยวข้อง
					<br>............................................................
					<br>................. / .................. / .................. 
				</div>
			</td>
		</tr>
		</tbody>
	  </table>';
	  
	  /*$html.='<table class="table2" width="100%">
	  				<thead>
						<tr>
							<th class="td-border">ข้อปฏิบัติการจอง</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="td-border"></td>
						</tr>
					</tbody>
	  			</table>';*/

include("MPDF54/mpdf.php");

$mpdf=new mPDF('th','A4','','thsarabun',10,10,10,10,0,0); //L,R,T,B,H,F

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('MPDF54/examples/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

//set autofont
/*$mpdf->autoScriptToLang = true;
$mpdf->baseScript = 1;
$mpdf->autoVietnamese = true;
$mpdf->autoArabic = true;
$mpdf->autoLangToFont = true;*/
$mpdf->SetAutoFont(AUTOFONT_ALL);

$mpdf->WriteHTML($html,2);

$mpdf->Output($row['uq_id'].'.pdf','I');
//$mpdf->Output();
exit;
?>