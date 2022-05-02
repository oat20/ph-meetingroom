<?php
session_start();

include"../bookingroom/config.php";
include("../bookingroom/inc/checksession.inc.php");
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("../bookingroom/css-inc.php");?>
</head>

<body>
<?php include("../bookingroom/navbar-inc.php");?>

<div class="container-fluid">
	<div class="row">
    
    	<div class="col-sm-12">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">รายงาน</h3>
                </div>
                <div class="panel-body">
                	<div class="well well-sm">
                    	<legend class="text-uppercase"><i class="glyphicon glyphicon-filter"></i> Filter</legend>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="defaultForm">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control datepicker" name="startDate" id="startDate" placeholder="ตั้งแต่วันที่" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="endDate" id="endDate" placeholder="ถึงวันที่" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-2">
                                    	<button class="btn btn-default btn-block text-uppercase" type="submit"><i class="glyphicon glyphicon-ok"></i> Ok</button>
                                    </div>
                                    
                                </div>
                        </form>
                    </div><!--well-->
                    
                    <?php
					if(isset($_POST['startDate']) and isset($_POST['endDate'])){
						
						$sql2="select *, meetingroom_croom.name as r_name 
						from meetingroom_userq,
						meetingroom_croom,
						organization
						where meetingroom_userq.Dater between '$_POST[startDate]' and '$_POST[endDate]'
						and meetingroom_userq.cr_id = meetingroom_croom.cr_id
						and meetingroom_userq.DeID = organization.DeID
						order by meetingroom_userq.created desc, 
						meetingroom_userq.Dater asc, 
						meetingroom_userq.time_in asc";
						$rs2=mysql_query($sql2);
						$total=mysql_num_rows($rs2);
						
						echo '<div class="clearfix">
									<div class="pull-left">ข้อมูลตั้งวันที่ '.dateformat2($_POST['startDate']).' - '.dateformat2($_POST['endDate']).'</div>
									<div class="pull-right">'.number_format($total).' รายการ <a href="3_exportdata01_xls.php?startDate='.$_POST['startDate'].'&endDate='.$_POST['endDate'].'" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-file-excel-o"></i> Export to Excel</a></div>
							</div>
							<hr>';
							echo '<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>เลขที่รายการ</th>
													<th>ห้อง</th>
													<th><div class="style3">วันที่จอง</div></th>
													<th><div class="style3">วัตถุประสงค์</div></th>
													<th>ผู้จอง</th>
													<th>เลขาฯ อนุมัติ</th>
													<th>ยกเลิก</th>
												</tr>
											</thead>
											<tbody>';
											while($ob2=mysql_fetch_assoc($rs2)){
												echo '<tr>
															<td>'.$ob2["uq_id"].'</td>
															<td>'.$ob2[r_name].'</td>
															<td>'.dateThai2($ob2[Dater]).' '.$ob2["time_in"].' - '.$ob2["time_out"].'</td>
															<td>'.$ob2["title"].'</td>
															<td>'.$ob2[uname].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"].'</td>
															<td>'.$cf_msgicon2[$ob2['confirm']].'</td>
															<td>'.$cf_yn2[$ob2['uq_cancel']].'</td>
													</tr>';
											}
										echo '</tbody>
										</table>
								</div>';
						
					}
					?>
                    
                </div><!--panel-body-->
            </div><!--panel-->
        
        </div><!--col-12-->
        
    </div><!--row-->
</div><!--container-->

<?php include("../bookingroom/js-inc.php");?>
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
</body>
</html>