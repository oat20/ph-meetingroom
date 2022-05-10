<?php
session_start();

include"bookingroom/config.php";
require("bookingroom/mysqli_connect.php");
include("bookingroom/inc/function.php");
//include("bookingroom/connect/connect.php");
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
<title><?php echo $sitename;?></title>

<?php include("bookingroom/css-inc.php");?>
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
.style3 {font-size: 12; }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<?php include("bookingroom/navbar-inc.php");?>

<div class="container-fluid">

	<div class="row">
    
    	<div class="col-lg-12">
			
            <div class="panel panel-default">
            
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><i class="fa fa-calendar fa-fw"></i> ปฏิทิน</h3>
                    <div class="pull-right">
                    	<div class="btn-group">
                        	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                View <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-right">
                          		<li><a href="calendar.php"><i class="fa fa-calendar fa-fw"></i> Calendar</a></li>
                          		<li><a href="calendar-table.php"><i class="fa fa-table fa-fw"></i> Table</a></li>
                          	</ul>
                        </div>
                    </div>
                </div>
                
                <div class="panel-body">
                
                	<!--<div class="well well-sm">
                    	<legend><i class="fa fa-search"></i> Search</legend>
                        <form method="post" action="<?php //echo $_SERVER['PHP_SELF'];?>" id="defaultForm">
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
                    </div>-->
	<?php
	if(empty($_POST['startDate']) and empty($_POST['endDate'])){
		/*$sql2="select *, meetingroom_croom.name as r_name, DATE_FORMAT(meetingroom_userq.created, '%d/%m/%Y') as created 
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where mid(meetingroom_userq.Dater,1,7)='".date('Y-m')."' 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		order by meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc";*/
		
		$sql2 = "select t1.uq_id,
			t1.confirm,
			t1.Dater,
			t1.time_in,
			t1.time_out,
			t1.title,
			t1.uname,
			t1.phone,
			t1.uq_owner,
			t1.optionss,
			t1.uq_onsite,
			t1.uq_online,
			t2.name as r_name,
			t2.location,
			t2.color,
			t3.Fname
			from meetingroom_userq as t1
			inner join meetingroom_croom as t2 on (t1.cr_id = t2.cr_id)
			inner join organization as t3 on (t1.DeID = t3.DeID)
			where t1.uq_cancel = 'No'
			and concat(t1.Dater,' ',REPLACE(t1.time_out, ':', '-'),'-00') >= NOW()
			order by t1.Dater,
			t1.time_in,
			t1.time_out
		";
		
	}else{
		$sql2="select *, meetingroom_croom.name as r_name, DATE_FORMAT(meetingroom_userq.created, '%d/%m/%Y') as created 
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where meetingroom_userq.Dater between '$_POST[startDate]' and '$_POST[endDate]' 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		order by  meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc";
	}
		$rs2=mysqli_query($mysqli,$sql2);
		$total=mysqli_num_rows($rs2);
		list($tel,$email) = explode("/",$ob2["email"]);
		?>
        <div class="table-responsive">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-hover table-striped" id="calendar-table">
    	<thead>
      <tr>
      	<th>#</th>
        <!--<th></th>-->
        <th>วันที่จอง</th>
        <!--<th>เลขที่</th>-->
        <!--<th>ลงวันที่</th>-->
        <th>ห้อง</th>     
        <th>วัตถุประสงค์</th>
		<th>On Site</th>
		<th>On Line</th>
        <th>ประสานงาน</th>
        <th>Note</th>
        <th></th>
        </tr>
        	</thead>
            <tbody>
	  <?php
		$a = 1;
		while($ob2=mysqli_fetch_assoc($rs2)){
			
			$owner = ($ob2['uq_owner'] == '') ? $ob2['uname'].'<br>'.$ob2["Fname"].' โทร.'.$ob2["phone"] : $ob2['uq_owner'];

			$uq_onsite = ($ob2['uq_onsite'] === 'YES') ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
			$uq_online = ($ob2['uq_online'] === 'YES') ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
	  ?>
      <tr>
      	<td><?php print $a;?></td>
          <!--<td>
		  	<?php //echo '<p class="activity2" style="background-color:'.$cf_msgicon2_noicon[$ob2['confirm']]['status-color'].'">'.$cf_msgicon2_noicon[$ob2['confirm']]['icon'].' '.$cf_msgicon2_noicon[$ob2['confirm']]['title'].'</p>';?>
          </td>-->
          <td><?php print dateThai3($ob2['Dater']).' เวลา '.$ob2["time_in"].' - '.$ob2["time_out"]; ?></td>
      	<!--<td><?php //echo $ob2["uq_id"];?></td>-->
        <!--<td><?php //echo $ob2["created"];?></td>-->
	  	<td><div class="activity2" style="background-color:<?php echo $ob2["color"];?>"><?php echo $ob2['r_name'].'<br>'.$ob2['location']; ?></div></td>	
	  	<td><?php echo $ob2["title"]; ?></td>
		  <td><?php echo $uq_onsite;?></td>
		  <td><?php echo $uq_online;?></td>
        <td><?php print $owner; ?></td>
        <td><?php print $ob2['optionss'];?></td>
        <td><a href="bookingroom/inc/roomview.inc.php?keyID=<?php echo $ob2["uq_id"];?>" class="btn btn-primary btn-sm"><i class="fa fa-external-link fa-fw"></i> View</a></td       
	  >
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
			
			$('#calendar-table').DataTable({
				"columnDefs": [
					{ "orderable": false, "targets": 8 }
				  ]
			});

});
</script>

</body>
</html>