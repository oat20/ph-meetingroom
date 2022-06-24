<?php
session_start();

include"bookingroom/config.php";
require_once './bookingroom/mysqli_connect.php';
include"bookingroom/inc/function.php";
include"bookingroom/inc/checksession.inc.php";

$mode=$_REQUEST['mode'];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>ประวัติการจอง</title>
<?php include("bookingroom/css-inc.php");?>
 <style type="text/css">
 body,td,th {
	font-family: Kanit, "Open Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, Arial, Helvetica, Sans, FreeSans, Jamrul, Garuda, Kalimati, verdana, arial, tahoma, sans-serif;
}
 </style>
 </head>

<body>
<!--start header -->
<?php include("bookingroom/navbar-inc.php");?>
<!--end header -->

<div class="container-fluid">
    
    <div class="row">
    	<div class="col-sm-12">
        	
            <!--record booking-->
            <?php
			if(empty($_POST["keyWord"])){
				$sql2 = "select *,meetingroom_croom.name as r_name from meetingroom_userq
				inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
				inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
				inner join meetingroom_objective on (meetingroom_userq.ob_id = meetingroom_objective.ob_id)
				where meetingroom_userq.u_id = '$_SESSION[u]'
				order by meetingroom_userq.Dater desc,
				meetingroom_userq.time_in asc,
				meetingroom_userq.time_out";
			}else{
				$sql2 = "select *,meetingroom_croom.name as r_name from meetingroom_userq
				inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
				inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
				inner join meetingroom_objective on (meetingroom_userq.ob_id = meetingroom_objective.ob_id)
				where meetingroom_userq.u_id = '$_SESSION[u]'
				and meetingroom_userq.uq_id = '$_POST[keyWord]'
				order by meetingroom_userq.Dater desc,
				meetingroom_userq.time_in asc";
			}
			$rs2=mysqli_query($mysqli, $sql2);
			$total=mysqli_num_rows($rs2);
			?>
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><i class="fa fa-bars fa-fw"></i> ประวัติการจอง</h3>
                </div>
                <div class="panel-body">
                	<?php include"bookingroom/lastbooking.php"; ?>
                </div>
            </div>
            <!--record booking-->
        	           	
        </div><!--col-->
        
        <!--<div class="col-sm-2">-->
        
        	<!--search-->
            <!--<div class="panel panel-default">
            	<div class="panel-body">
                	<div class="blog_title2">ค้นหา</div>
                    <form action="<?php //echo $_SERVER['PHP_SELF'];?>" method="post" id="formSearch">
                    	<div class="form-group">
                        	<label class="control-label">กรอกเลขที่รายการ:</label>
                            <input type="number" name="keyWord" class="form-control" value="<?php //echo $_POST["keyWord"];?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> ค้นหา</button>
                    </form>
                </div>
            </div>-->
            <!--search-->
            
        <!--</div>--><!--col-->
    </div><!--row-->

    <!--<div class="bottom"></div> -->
</div><!--container-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
		<form action="./mybooking_cancel_action.php" method="POST">
			<dl class="dl-horizontal">
				...
			</dl>
			<input type="hidden" name="uq_id">
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        <button type="button" class="btn btn-danger">YES</button>
      </div>
    </div>
  </div>
</div>

<!--start footer -->
<?php include("bookingroom/js-inc.php");?>
<!--end footer -->
<script>
		$(document).ready(function() {

			$('#merge').DataTable({
				"order": [
					[4, 'desc']
				],
				"columnDefs": [
					{ 
						"orderable": false, 
						"targets": [6, 7] 
					}
				  ],
				  responsive: true
			});
			
			$('#formSearch').bootstrapValidator({
				message: 'This value is not valid'
			});

			$('#myModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var refid = button.data('refid') // Extract info from data-* attributes
				var dater = button.data('date')
				var title = button.data('title')
				var room = button.data('room')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var content = '<dt>วันที่จอง</dt>';
				content += '<dd>'+dater+'</dd>';
				content += '<dt>เรื่อง</dt>';
				content += '<dd>'+title+'</dd>';
				content += '<dt>ห้อง</dt>';
				content += '<dd>'+room+'</dd>';
				
				var modal = $(this)
				modal.find('.modal-title').html('ยืนยันยกเลิกรายการจองเลขที่ <strong>' + refid +'</strong>')
				modal.find('.modal-body .dl-horizontal').html(content);
				modal.find('.modal-body input[name="uq_id"]').val(refid)
			});
		});
</script>
</body>
</html>
