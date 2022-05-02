<style type="text/css">
<!--
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
-->
</style>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" id="merge" class="table table-hover table-bordered">
    	<thead>
      <tr bgcolor="#59993f">
        <th class="td1">เลขที่รายการ</th>
        <th class="td1">ผู้จอง</th>
        <th class="td1"><div class="style3">ชื่องาน</div></th>
        <th class="td1">ห้อง</th>
        <th class="td1"><div class="style3">วันที่จอง</div></th>
        <th class="td1">สถานภาพ</th>
        <th class="td1">Actions</th>
      </tr>
        </thead>
        <tbody>
	  <?php
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
			?>
      <tr bgcolor="#e9e9e9">      	
        <td><?php echo $ob2["uq_id"];?></td>
        <td><?php echo $ob2["uname"];?></td>
        <td>	<strong><?php echo $ob2["ob_title"];?></strong> <?php echo $ob2["title"]; ?></td>
        <td><div class="activity2" style="background-color:<?php echo $ob2["color"];?>"><?php print $ob2[r_name]; ?></div></td>
		<td><?php print dateThai($ob2[Dater]); ?> เวลา <?php echo $ob2["time_in"]; ?> - <?php echo $ob2["time_out"]; ?></td>       
        <!--<td align="center"><?php //echo $ob2['sta'];?></td>-->
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
        		<a href="bookingroom/inc/1_roomview.inc.php?<?php echo"keyID=$ob2[uq_id]"?>" title="แสดงรายละเอียด" class="btn btn-default"><i class="fa fa-eye"></i> รายละเอียด</a>
        		<a href="bookingroom/booking_detail2_pdf.php?<?php echo"uq_id=$ob2[uq_id]"?>" target="new" class="btn btn-default"><i class="fa fa-print"></i> พิมพ์</a>
        	</div>
         </td>
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
      </tbody>
    </table>