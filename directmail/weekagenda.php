<?php
session_start();

include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<base href="//ns2.ph.mahidol.ac.th/room/">
<title><?php print $sitename;?></title>
<?php include('../bookingroom/css-inc.php');?>
</head>

<body>
<?php 
//$tm = date('Y-m-d');
$tm=$_GET['tm'];
if(date('D',strtotime($tm)) == 'Fri'){ $s='+1'; $e='+7'; }else if(date('D',strtotime($tm)) == 'Sun'){ $s='+1'; $e='+7'; }else{ $s='+1'; $e='+7';}
?>
<div class="container-fluid">
	
    <img src="http://www.ph.mahidol.ac.th/img/logo.png" border="0" class="img-responsive">
    
    <?php
	for($i=$s;$i<=$e;$i++){
		$tm2=date('Y-m-d',strtotime($tm.' +'.$i.' days'));
	?>
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">รายการจองห้องวัน <?php print dateThai3($tm2);?></h3>
        </div>
        <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-striped table-hover table-bordered">
    	<thead>
      <tr>
        <th>Status</th>
        <th>เวลา</th>
        <th>ห้อง</th>
        <th><div class="style3">วันที่จอง</div></th>
        <th><div class="style3">วัตถุประสงค์</div></th>
        <th>ผู้จอง</th>
		  <th>หมายเหตุ</th>
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
		  <th>หมายเหตุ</th>
        </tr>
        	</tfoot>
            <tbody>
	  <?php	  
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
		$row = mysql_num_rows($rs2);
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
			
			$media = '';
			$qMedia = mysql_query("select * from meetingroom_mediarelation as t1
				inner join meetingroom_media as t2 on (t1.media_id = t2.media_id)
				where t1.uq_id = '$ob2[uq_id]'
				order by convert(t2.media using tis620) asc");
			while($obMedia = mysql_fetch_assoc($qMedia)){
				$media.=$obMedia['media'].', ';
			}
	  ?>
      <tr>
          <td>
		  	<?php echo '<p class="activity2" style="background-color:'.$cf_msgicon2_noicon[$ob2['confirm']]['status-color'].'">'.$cf_msgicon2_noicon[$ob2['confirm']]['icon'].' '.$cf_msgicon2_noicon[$ob2['confirm']]['title'].'</p>';?>
          </td>
          <td><?php print $ob2["time_in"].' - '.$ob2["time_out"];?></td>
	  	<td><div class="activity2" style="background-color:<?php echo $ob2["color"];?>"><?php echo $ob2[r_name]; ?></div></td>
		<td><?php print dateThai($ob2[Dater]);?></td>
	  	<td><?php echo $ob2["title"].'<br><strong>อุปกรณ์ที่ต้องการใช้:</strong> '.substr($media,'0','-2'); ?></td>
        <td><?php print $ob2[uname].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"]; ?></td>
		  <td><?php print $ob2['optionss'];?></td>
	  </tr>
	  <?php
	  	//$a++;
	  }
	  ?>
      </tbody>
    </table>
        
    	</div><!--body-->
    </div><!--panel-->
    
    	<?php
	}
	?>
    <p><a href="<?php echo $livesite;?>directmail/weekagenda-pdf.php?tm=<?php echo $tm;?>" target="_blank"><i class="fa fa-print"></i> พิมพ์รายการจองห้อง</a></p>
    <p>**ดูรายละเอียดทั้งหมด <a href="http://ns2.ph.mahidol.ac.th/room/" target="_blank">http://ns2.ph.mahidol.ac.th/room/</a></p>
    
</div>

<?php include('../bookingroom/js-inc.php');?>
</body>
</html>