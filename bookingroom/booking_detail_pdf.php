<?php
include"config.php";
include "connect/connect.php";
include "inc/function.php";

$ID=$_GET[ID];

//$html="<body>";
       $cmd = "select meetingroom_userq.Dater, room_time.start, room_time.end, jos_users.name, organization.Fname, meetingroom_userq.detail, meetingroom_userq.optionss, meetingroom_userq.created, book_status.sta, meetingroom_userq.title, jos_users.name as name_created, meetingroom_croom.color, meetingroom_croom.name as room_name, meetingroom_userq.status1, meetingroom_userq.uq_id, meetingroom_croom.location, meetingroom_userq.book_condition
	   from meetingroom_userq, meetingroom_croom, jos_users, book_status, room_time, organization
	   where meetingroom_userq.time_in = room_time.tim_id
	   and meetingroom_userq.u_id = jos_users.id
	   and meetingroom_userq.cr_id = meetingroom_croom.cr_id
	   and meetingroom_userq.status1 = book_status.sta_id
	   and jos_users.DeID = organization.DeID
	   and meetingroom_userq.uq_id = '$ID'";
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

$html='<pageheader name="booking_id" content-left="เลขที่รายการ: '.$row["uq_id"].'" header-style-right="color: #000000; font-style: italic;"/>
<pageheader name="created" content-right="วันที่: '.$row["created"].'" header-style-right="color: #000000; font-style: italic;"/>

<setpageheader name="booking_id" value="on" show-this-page="1" />
<setpageheader name="created" value="on" show-this-page="1" />';

$html.="<table width='100%'><tr><td class='td3'><img src='img/logo2.png' border='0' /></td></tr></table>
	<h1>แบบการจองใช้สถานที่</h1>";
      $html.='<table width="100%">
      	<tr>
        	<td><strong>วันที่จอง</strong></td>
            <td>'.dateThai($row[Dater]).' เวลา '.$row["start"].'-'.$row["end"].'</td>
        </tr>
        <tr>
        	<td><strong>ห้อง</strong></td>
            <td><input name="" type="text" size="1" readonly="true" style="background:'.$row[color].'; border:#FFFFFF"> '.$row[a].' '.$row[room_name].' ('.$row[location].')</td>
        </tr>
        <tr>
          <td><strong>วัตถุประสงค์เพื่อ</strong></td>
          <td>'.$row[title].'</td>
        </tr>
        <tr>
        	<td valign="top"><strong>ชื่อผู้จอง</strong></td>
            <td>'.$row["name_created"].' <strong>ส่วนงาน</strong> '.$row["Fname"].'<br/>โทร. '.$row[tel].'</td>
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
				$html.="<img src='img/tick.png' /> ".$ob3[food]."<br/>";
			}
			
          $html.='</td>
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
				$html.="<img src='img/tick.png' /> ".$ob4[media]."<br/>";
			}
		  	
          $html.="</td>
        </tr>
        <tr>
          <td><strong>รายละเอียดเพิ่มเติ่ม</strong></td>
          <td>".$row["optionss"]."</td>
        </tr>
        <tr>
        	<td><strong>วันที่ทำรายการ</strong></td>
            <td>".dateThai($row[created])."</td>
        </tr>
		<tr>
          <td><strong>เงื่อนไขการใช้</strong></td>
          <td>";
		  $sql5="select * from room_condition_charges
		  where id = '$condition[0]'";
		  $rs5=mysql_query($sql5);
		  $ob5=mysql_fetch_array($rs5);
		 $html.= $ob5[name]."<br/>".$condition[1];
          $html.="</td>
        </tr>
        <tr>
          <td><strong>สถานะภาพใบจอง</strong></td>
          <td> 
		  <input name='' type='radio' value='' checked>".$row["sta"];
		  if($row[status1]=="3"){
			  $html.=" เมื่อ ".dateThai($row2["modified"])." โดย ".$row2["name"];
		  }
		  
          $html.="</td>
        </tr>
        </table>
        <br/>";
        /*$html.="<table width='100%'>
			<tr>
          <td align='right' class='td2'>วันที่พิมพ์ ".dateThai2($datelog)."</td>
        </tr>
      </table>";*/
	  $html.='<table width="100%">
	  	<tbody>
	  	<tr>
			<td width="50%" class="td-border">
				ลงชื่อผู้ใช้
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				( Name Surname )
			</td>
			<td width="50%" class="td-border">
				ลงชื่อหัวหน้าภาควิชา/หัวหน้างาน
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				(......................................................................................)
			</td>
		</tr>
		</tbody>
	  </table>';
	  
	   $html.='<hr><table width="100%">
	  	<tbody>
	  	<tr>
			<td width="60%">
				<strong>เรียน เลขานุการคณะฯ</strong>
				<p>&nbsp;</p>
				ได้ตรวจสอบแล้วห้อง <strong>room</strong> <input type=checkbox> ว่าง <input type=checkbox> ไม่ว่าง 
			</td>
			<td width="40%" class="td-border">
				<strong>อนุมัติและแจ้ง</strong>
				<br><input type=checkbox> การเงินจัดเก็บค่าบำรุง
				<br><input type=checkbox> ศูนยผลิตจัดอุปกรณ์โสตฯ
				<br><input type=checkbox> งานกายภายสิ่งแวดล้อม
				<br><input type=checkbox> หัวหน้าแม่บ้าน
				<br><input type=checkbox> หน่วยบริการการประชุม
				<br><br>
				<div>
					ทราบและดำเนินการในส่วนที่เกี่ยวข้อง
					<br><br>............................................................
					<br><br>................. / .................. / .................. 
				</div>
			</td>
		</tr>
		</tbody>
	  </table>';

include("MPDF54/mpdf.php");

$mpdf=new mPDF('th-GB-x','A4','','',10,10,10,10,5,0); //L,R,T,B,H,F

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

// LOAD a stylesheet
$stylesheet = file_get_contents('MPDF54/examples/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,2);

#$mpdf->Output('mpdf.pdf','I');
$mpdf->Output();
exit;
?>