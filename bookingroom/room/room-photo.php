<?php
session_start();

include("../config.php");
include("../inc/checksession.inc.php");
include("../connect/connect.php");
include("../inc/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("../css-inc.php");?>
</head>

<body>
<?php include("../navbar-inc.php");?>

<div class="container">

	<ol class="breadcrumb">
  		<li><a href="3_controlpanel.php"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</a></li>
  		<li><a href="../../room.php">รายการห้อง</a></li>
	</ol>


	<?php
	if($_SESSION['userType'] == 3){
	?>
    
	<div class="row">
    	<div class="col-sm-12">
        
        	<div class="panel panel-primary">
  				<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-file-image-o" aria-hidden="true"></i> ภาพประกอบ</h3></div>
  				<div class="panel-body">
                	<?php
					$croom = mysql_query("select * from meetingroom_croom
					where cr_id = '$_GET[key_cid]'");
					$croom2 = mysql_fetch_assoc($croom);
					?>
                    <!--Show Roomname-->
                	<blockquote>
  						<p class="activity-font16" style="background-color:<?php echo $croom2["color"];?>"><?php echo $croom2["name"];?></p>
					</blockquote>
                    
                    <!--Show Room Photo-->
                    <div class="row">
                    <?php
					$croom_photo = mysql_query("select * from meetingroom_croom_photo
					where cr_id = '$_GET[key_cid]'
					order by cp_id asc");
					while($croom_photo2 = mysql_fetch_assoc($croom_photo)){
						echo '<div class="col-sm-3">
									<div class="thumbnail">
										<img src="'.$livesite.'bookingroom/img/room/'.$croom_photo2["cp_filename"].'" class="img-responsive">
										<div class="caption">
											<a href="room-photo-2.php?keyCpid='.$croom_photo2["cp_id"].'&action=delete&key_cid='.$_GET["key_cid"].'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> ลบ</a>
										</div>
									</div>
							</div>';
					}
					?>
                    </div>
                    <!--Show Room Photo-->
    				
                    <form action="room-photo-2.php?action=upload&key_cid=<?php echo $_GET["key_cid"];?>" method="post" enctype="multipart/form-data">
                    	<legend><i class="fa fa-paperclip" aria-hidden="true"></i> Upload File</legend>
                    	<div class="form-group">
                			<input id="cp_filename" name="cp_filename[]" multiple type="file" class="file file-loading" data-allowed-file-extensions='["jpg","png"]' data-show-upload="true" accept="image/*">
                            <span class="help-block">เป็นไฟล์ *.jpg หรือ *.png ขนาดไม่เกิน 1MB</span>
            			</div>
                        
                        <a href="../../room.php" class="btn btn-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>
                    </form>
  				</div>
			</div>

        </div><!--col-12-->
    </div><!--row-->
    
    <?php
	}else{
		include("../alert-permission-inc.php");
	}
	?>
    
</div><!--container-->

<?php include("../js-inc.php");?>
<script>
$("#cp_filename").fileinput({
	maxFileSize: 1024,
	language: "th",
    maxFileCount: 10,
	validateInitialCount: true,
    overwriteInitial: false
});
</script>
</body>
</html>