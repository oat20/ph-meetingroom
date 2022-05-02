<?php
session_start();

include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php print $sitename;?></title>
<?php include('../bookingroom/css-inc.php');?>
</head>

<body>
<?php 
//$tm=date('Y-m-d',strtotime($date_regis.' +1 days'));
$tm = $_GET['tm'];
?>
<div class="container-fluid">
	
    <img src="http://www.ph.mahidol.ac.th/img/logo.png" border="0" class="img-responsive">
    
    <?php
	for($i=1;$i<=2;$i++){
		$tm2=date('Y-m-d',strtotime($tm.' +'.$i.' days'));
	?>
    <div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">รายการจองห้องวันที่ <?php print dateThai3($tm2);?></h3>
        </div>
        <div class="panel-body">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-striped table-hover">
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
	  ?>
      <tr>
          <td>
		  	<?php echo '<p class="activity2" style="background-color:'.$cf_msgicon2_noicon[$ob2['confirm']]['status-color'].'">'.$cf_msgicon2_noicon[$ob2['confirm']]['icon'].' '.$cf_msgicon2_noicon[$ob2['confirm']]['title'].'</p>';?>
          </td>
          <td><?php print $ob2["time_in"].' - '.$ob2["time_out"];?></td>
	  	<td><div class="activity2" style="background-color:<?php echo $ob2["color"];?>"><?php echo $ob2[r_name]; ?></div></td>
		<td><?php print dateThai($ob2[Dater]);?></td>
	  	<td><?php echo $ob2["title"]; ?></td>
        <td><?php print $ob2[uname].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"]; ?></td>
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
    <p><a href="<?php echo $livesite;?>directmail/weekendagenda-pdf.php?tm=<?php echo $_GET['tm'];?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Download รายการจองห้อง</a></p>
    <p>**ดูรายละเอียดทั้งหมด <a href="http://ns2.ph.mahidol.ac.th/room/" target="_blank">http://ns2.ph.mahidol.ac.th/room/</a></p>
    
</div>

<?php include('../bookingroom/js-inc.php');?>
</body>
</html>