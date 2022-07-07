<style type="text/css">
#Layer11 {position:absolute;
	left:2px;
	top:5px;
	width:997px;
	height:755px;
	z-index:9;
}
#Layer14 {position:absolute;
	left:23px;
	top:36px;
	width:936px;
	height:299px;
	z-index:12;
}
#Layer15 {	position:absolute;
	left:22px;
	top:-1px;
	width:967px;
	height:32px;
	z-index:12;
}
a:link {
	color: #3399FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #3399FF;
}
a:hover {
	text-decoration: underline;
	color: #3399FF;
}
a:active {
	text-decoration: none;
	color: #3399FF;
}
.style3 {font-size: 12; }
</style>
<div class="table-responsive">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" id="merge" class="table table-striped table-bordered">
    	<thead>
      <tr bgcolor="#59993f">
        <th class="td1">เลขที่รายการ</th>
        <th class="td1">ผู้จอง</th>
        <th class="td1"><div class="style3">ชื่องาน</div></th>
        <th class="td1">ห้อง</th>
        <th class="td1"><div class="style3">วันที่จอง</div></th>
        <th class="td1">สถานภาพ</th>
        <th class="td1">Actions</th>
		<th></th>
      </tr>
        </thead>
        <tbody>
	  <?php
		$a=1;
		while($ob2=mysqli_fetch_array($rs2)){

			if(strtotime($ob2['Dater']) > strtotime($today)){
				$btnCancelDisable = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"
					data-refid="'.$ob2['uq_id'].'"
					data-date="'.dateThai($ob2['Dater']).' '.$ob2['time_in'].' - '.$ob2['time_out'].'"
					data-title="'.$ob2['title'].'"
					data-room="'.$ob2['r_name'].'">ต้องการยกเลิกการจอง <i class="fa fa-question fa-fw" aria-hidden="true"></i></button>';
			}else{
				$btnCancelDisable = '';
			}
			?>
      <tr bgcolor="#e9e9e9">      	
        <td><?php echo $ob2["uq_id"];?></td>
        <td><?php echo $ob2["uname"];?></td>
        <td>	<strong><?php echo $ob2["ob_title"];?></strong> <?php echo $ob2["title"]; ?></td>
        <td><div class="activity2" style="background-color:<?php echo $ob2["color"];?>"><?php print $ob2['r_name']; ?></div></td>
		<td data-order="<?php echo $ob2['Dater'].' '.$ob2['time_in'].' - '.$ob2['time_out'];?>"><?php print dateThai($ob2['Dater']); ?> เวลา <?php echo $ob2["time_in"]; ?> - <?php echo $ob2["time_out"]; ?></td>       
        <td>
        	<dl class="dl-horizontal">
  				<dt>รับเรื่อง:</dt>
  				<dd><?php echo $cf_status_recive[$ob2["status1"]];?></dd>
                <dt>เลขาฯ อนุมัติ:</dt>
  				<dd><?php echo $cf_msgicon2[$ob2["confirm"]];?></dd>
                <dt>ยกเลิก:</dt>
  				<dd><?php echo $cf_yn2[$ob2["uq_cancel"]];?></dd>
			</dl>
        </td>
        <td>
        	<div class="btn-group btn-group-sm">
        		<a href="bookingroom/inc/1_roomview.inc.php?<?php echo"keyID=$ob2[uq_id]"?>" title="แสดงรายละเอียด" class="btn btn-default"><i class="fa fa-eye fa-fw"></i> รายละเอียด</a>
        		<a href="bookingroom/booking_detail2_pdf.php?<?php echo"uq_id=$ob2[uq_id]"?>" target="_blank" class="btn btn-default"><i class="fa fa-print fa-fw"></i> พิมพ์</a>
        	</div>
         </td>
		 <td>
			<?php echo $btnCancelDisable;?>
		 </td>
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
      </tbody>
    </table>
	</div>