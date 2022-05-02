<?php
session_start();

include"bookingroom/config.php";
include("bookingroom/inc/function.php");
include("bookingroom/connect/connect.php");
?>

<title><?php echo $sitename;?></title>

<?php include("bookingroom/css-inc.php");?>
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
.style3 {font-size: 12; }
-->
</style>
<?php include("bookingroom/navbar-inc.php");?>

<div class="container-fluid">
	<div class="row">
    
    	<div class="col-sm-2">
        
        	<div class="well">
            	<legend><i class="fa fa-search"></i> Search</legend>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="defaultForm">
                	<div class="form-group">
                        <input type="text" class="form-control datepicker" name="startDate" id="startDate" placeholder="ตั้งแต่วันที่" value="<?php print $_POST['startDate'];?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="endDate" id="endDate" placeholder="ถึงวันที่" value="<?php print $_POST['endDate'];?>" required>
                    </div>
                    <input type="hidden" name="cr_id" value="<?php print $_GET['cr_id'];?>">
                    <button class="btn btn-default btn-block text-uppercase" type="submit"><i class="glyphicon glyphicon-ok"></i> Ok</button>
                </form>
            </div><!--well-->
        
        </div><!--col-->
    
    	<div class="col-sm-10">
			
            <div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> รายการรายห้อง</h3>
                    <div class="pull-right">
                    	<?php
							if(isset($_SESSION['u'])){
								echo '<a href="formbooking.php?keyID='.$_REQUEST['cr_id'].'" class="btn btn-primary btn-lg"><i class="fa fa-external-link" aria-hidden="true"></i> จองห้องนี้</a>';
							}
							?>
                    	<!--<div class="btn-group" role="group">
                          <a href="calendar.php" class="btn btn-default"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar View</a>
                          <a href="calendar-table.php" class="btn btn-default"><i class="fa fa-table"></i> Table View</a>
                        </div>-->
                    </div>
                </div>
                
                <div class="panel-body">
                
                	<div class="well well-sm">
                    	<div class="table-responsive">
                        	<table class="table">
                            	<thead>
                                	<tr>
                                    	<th></th>
                                        <th></th>
                                        <th>รองรับ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
									$sql = mysql_query("select * from meetingroom_croom where cr_id = '$_REQUEST[cr_id]'");
									while($ob = mysql_fetch_assoc($sql)){
										print '<tr>
											<td><p class="activity2" style="background-color:'.$ob['color'].'">'.$ob['name'].'</p></td>
											<td>'.$ob['location'].'</td>
											<td>'.$ob['net'].' ท่าน</td>
										</tr>';
									}
									?>
                                </tbody>
                            </table>
                        </div>
                    </div><!--well-->
	<?php
	if(empty($_POST['startDate']) and empty($_POST['endDate'])){
		$sql2="select *, meetingroom_croom.name as r_name, DATE_FORMAT(meetingroom_userq.created, '%d/%m/%Y') as created 
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where mid(meetingroom_userq.Dater,1,7)='".date('Y-m')."' 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		and meetingroom_userq.cr_id = '$_REQUEST[cr_id]'
		order by meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc";
	}else{
		$sql2="select *, meetingroom_croom.name as r_name, DATE_FORMAT(meetingroom_userq.created, '%d/%m/%Y') as created 
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where meetingroom_userq.Dater between '$_POST[startDate]' and '$_POST[endDate]' 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		and meetingroom_userq.cr_id = '$_REQUEST[cr_id]'
		order by  meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc";
	}
		$rs2=mysql_query($sql2);
		$total=mysql_num_rows($rs2);
		list($tel,$email) = explode("/",$ob2["email"]);
		?>
        <div class="table-responsive">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-hover table-striped">
    	<thead>
      <tr>
        <th>Status</th>
        <th>เลขที่</th>
        <!--<th>ลงวันที่</th>-->
        <!--<th>ห้อง</th>-->
        <th><div class="style3">วันที่จอง</div></th>
        <th><div class="style3">วัตถุประสงค์</div></th>
        <th>ผู้จอง</th>
        <th></th>
        </tr>
        	</thead>
            <tbody>
	  <?php
		$a=1;
		while($ob2=mysql_fetch_array($rs2)){
	  ?>
      <tr>
          <td>
		  	<?php echo '<p class="activity2" style="background-color:'.$cf_msgicon2_noicon[$ob2['confirm']]['status-color'].'">'.$cf_msgicon2_noicon[$ob2['confirm']]['icon'].' '.$cf_msgicon2_noicon[$ob2['confirm']]['title'].'</p>';?>
          </td>
      	<td><?php echo $ob2["uq_id"];?></td>
        <!--<td><?php //echo $ob2["created"];?></td>-->
	  	<!--<td><div class="activity2" style="background-color:<?php //echo $ob2["color"];?>"><?php //echo $ob2[r_name]; ?></div></td>-->
		<td><?php print dateThai2($ob2[Dater]).' เวลา '.$ob2["time_in"].' - '.$ob2["time_out"]; ?></td>
	  	<td><?php echo $ob2["title"]; ?></td>
        <td><?php print $ob2[uname].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"]; ?></td>
        <td><a href="bookingroom/inc/roomview.inc.php?keyID=<?php echo $ob2["uq_id"];?>" class="btn btn-primary btn-sm"><i class="fa fa-external-link"></i> View</a></td>        
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
      </tbody>
    </table>
</div>

				</div><!--panel-body-->
			</div><!--panel-->

		</div><!--col-12-->

	</div><!--row-->
</div><!--container-->

<?php include("bookingroom/js-inc.php");?>
<script>
$(document).ready(function() {
	
		$('#startDate').datepicker({language:'th',format:'yyyy-mm-dd',autoclose:'true'});
		$('#endDate').datepicker({language:'th',format:'yyyy-mm-dd',autoclose:'true'});
		
		$('#defaultForm').bootstrapValidator({
				message: 'This value is not valid'
			});
			
			 $('#startDate')
				.on('change show', function(e) {
					// Validate the date when user change it
					$('#defaultForm').data('bootstrapValidator').revalidateField('startDate');
					// You also can call it as following:
					// $('#defaultForm').bootstrapValidator('revalidateField', 'datetimePicker');
			});
			$('#endDate')
				.on('change show', function(e) {
					// Validate the date when user change it
					$('#defaultForm').data('bootstrapValidator').revalidateField('endDate');
					// You also can call it as following:
					// $('#defaultForm').bootstrapValidator('revalidateField', 'datetimePicker');
			});

});
</script>