<?php
session_start();

include("bookingroom/config.php");
include("bookingroom/inc/checksession.inc.php");
include("bookingroom/connect/connect.php");
include("bookingroom/inc/function.php");

include("bookingroom/css-inc.php");
?>
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
<?php include("bookingroom/navbar-inc.php");?>

<div class="container-fluid">

	<?php
	if($_SESSION['userType'] == 3){
	?>

	<div class="row">
    	<div class="col-sm-10">
        
        	<div class="panel panel-default">
            	<div class="panel-body">
                                	
                    <?php
					if(empty($_POST["keyWord"])){
		$sql2="select * from meetingroom_userq
		inner join organization on (meetingroom_userq.DeID = organization.DeID)
		inner join meetingroom_croom on (meetingroom_userq.cr_id = meetingroom_croom.cr_id)
		inner join meetingroom_objective on (meetingroom_userq.ob_id = meetingroom_objective.ob_id)
		order by meetingroom_userq.Dater desc,
		meetingroom_userq.time_in asc";
					}else{
						$sql2="select * from meetingroom_userq
		inner join organization on (meetingroom_userq.DeID = organization.DeID)
		inner join meetingroom_croom on (meetingroom_userq.cr_id = meetingroom_croom.cr_id)
		inner join meetingroom_objective on (meetingroom_userq.ob_id = meetingroom_objective.ob_id)
		where meetingroom_userq.uq_id = '$_POST[keyWord]'
		or meetingroom_userq.uname like '%$_POST[keyWord]%'
		order by meetingroom_userq.Dater desc,
		meetingroom_userq.time_in asc";
					}
		$rs2=mysql_query($sql2);
		$total=mysql_num_rows($rs2);
		?>
        
        	<div class="blog_title2 clearfix">
            	<div class="pull-left">
                	<a href="3_controlpanel.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> รายการจอง
                </div>
                <div class="pull-right">
					<?php echo $total;?> รายการ
                	
                </div>
            </div>
            <p class="text-right"><a href="3_bookinginsert.php" class="btn btn-default btn-lg"><i class="fa fa-plus"></i> เพิ่มรายการ</a></p>
            
        <div class="table-responsive">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-hover table-bordered">
    	<thead>
      <tr class="td1">
        <th>Actions</th>
        <th>เลขที่รายการ</th>
        <th>ห้อง</th>
        <th><div class="style3">วันที่จอง</div></th>
        <th><div class="style3">วัตถุประสงค์</div></th>
        <th>ผู้จอง</th>
        <th>สถานภาพ</th>
        </tr>
        	</thead>
            <tbody>
	  <?php
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
			if($ob2['uq_cancel'] == 'Yes'){
				$active = 'danger';
			}else if($ob2['confirm'] == '2'){
				$active = 'warning';
			}else{
				$active = '';
			}
	  ?>
      <tr bgcolor="#e9e9e9" class="<?php print $active;?>">
      	<td>
        	<div class="btn-group btn-group-sm">
            	<a href="3_bookingupdate.php?uq_id=<?php echo $ob2["uq_id"];?>" class="btn btn-default"><i class="fa fa-file-text"></i> จัดการใบจอง</a>
                <a href="bookingroom/booking_detail2_pdf.php?uq_id=<?php echo $ob2["uq_id"];?>" class="btn btn-default" target="new"><i class="fa fa-print"></i> พิมพ์</a>
                <a href="3_remove_booking.php?uq_id=<?php echo $ob2['uq_id'];?>" class="btn btn-default" onClick="return confirm('ยืนยันลบข้อมูล');"><i class="fa fa-trash"></i> Remove</a>
            </div>
        </td>
      	<td><?php echo $ob2["uq_id"];?></td>
	  	<td><div class="activity2" style="background-color:<?php echo $ob2["color"];?>"><?php echo $ob2[name]; ?></div></td>
		<td><?php print dateThai2($ob2[Dater]).' '.$ob2["time_in"].' - '.$ob2["time_out"]; ?></td>
	  	<td><?php echo '<strong>'.$ob2["ob_title"].'</strong> '.$ob2["title"]; ?></td>
        <td><?php print $ob2[uname]; ?></td>
        <td><small><dl class="dl-horizontal">
          <dt>รับเรื่อง:</dt>
          <dd><?php echo $cf_status_recive[$ob2["status1"]];?></dd>
          <dt>เลขาฯ อนุมัติ:</dt>
          <dd><?php echo $cf_msgicon2[$ob2["confirm"]];?></dd>
          <dt>ยกเลิก:</dt>
          <dd><?php echo $cf_yn2[$ob2["uq_cancel"]];?></dd>
        </dl></small></td>
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
      </tbody>
    </table>
</div><!--tabble-responsive-->

                </div><!--panel-body-->
            </div><!--panel-->
            
        </div><!--col-->
        
        <div class="col-sm-2">
        	
            <div class="panel panel-default">
            	<div class="panel-body">
                	<div class="blog_title2">ค้นหา</div>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="formSearch">
                    	<div class="form-group">
                        	<label class="control-label">กรอกเลขที่รายการ หรือชื่อผู้จอง:</label>
                            <input type="text" name="keyWord" class="form-control" value="<?php echo $_POST["keyWord"];?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> ค้นหา</button>
                    </form>
                </div>
            </div>
            
        </div><!--col-->
    </div><!--row-->
    
    <?php
	}else{
		include("bookingroom/alert-permission-inc.php");
	}
	?>

</div><!--container-->

<?php include("bookingroom/js-inc.php");?>
<script>
		$(document).ready(function() {
			
			$('#formSearch').bootstrapValidator({
				message: 'This value is not valid'
			});
		});
</script>