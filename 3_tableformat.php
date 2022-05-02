<?php
session_start();

include("bookingroom/config.php");
include("bookingroom/inc/checksession.inc.php");
include("bookingroom/connect/connect.php");
include("bookingroom/inc/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("bookingroom/css-inc.php");?>
</head>

<body>
<?php include("bookingroom/navbar-inc.php");?>

<div class="container-fluid">

	<ol class="breadcrumb">
  		<li><a href="3_controlpanel.php"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</a></li>
  		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>">รูปแบบการจัดโต๊ะ</a></li>
	</ol>

	<?php
	if($_SESSION['userType'] == 3){
	?>
    
    	<div class="row">
        	<div class="col-sm-6">
            
            	<div class="post2">
                	<div class="blog_title2">รูปแบบการจัดโต๊ะ</div>
                    <div class="table-reponsive">
                    	<table class="table">
                        	<thead>
                            	<tr>
                                	<th>รูปแบบ</th>
                                    <th>ตัวอย่าง</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $table = mysql_query("select * from meetingroom_tableformat
								order by tf_id asc");
								while($table2 = mysql_fetch_assoc($table)){
									echo '<tr>
											<td>'.$table2["tf_title"].'</td>
											<td><a href="'.$livesite.'bookingroom/img/room/'.$table2["tf_photo"].'" target="new"><i class="fa fa-file-image-o" aria-hidden="true"></i> '.$table2["tf_photo"].'</a></td>
											<td><div class="btn-group btn-group-sm">
												<a href="'.$_SERVER['PHP_SELF'].'?tf_id='.$table2["tf_id"].'" class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
												<a href="3_tableformat_action.php?tf_id='.$table2["tf_id"].'&action=delete" class="btn btn-warning"><i class="fa fa-times"></i> ลบ</a>
											</div></td>
										</tr>';
								}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div><!--col-->
            
            <div class="col-sm-6">
            
            	<?php $sql2 = mysql_query("select * from meetingroom_tableformat
				where tf_id = '$_GET[tf_id]'");
				$ob2 = mysql_fetch_assoc($sql2); ?>
            	<div class="post2">
                	<div class="blog_title2">เพิ่ม / แก้ไขรายการ</div>
                    <form action="3_tableformat_action.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="defaultForm">
                    	<div class="form-group">
                        	<label class="control-label col-sm-2">ชื่อรายการ:</label>
                            <div class="col-sm-10">
                            	<input type="text" name="tf_title" class="form-control" value="<?php echo $ob2["tf_title"];?>" required>
                            </div>
                        </div>
                        
                        <?php if(isset($_GET["tf_id"])){ ?>
                        <div class="form-group">
                        	<div class="col-sm-10 col-sm-offset-2">
                            	<p class="form-control-static"><?php echo '<a href="'.$livesite.'bookingroom/img/room/'.$ob2["tf_photo"].'" target="new"><i class="fa fa-file-image-o" aria-hidden="true"></i> '.$ob2["tf_photo"].'</a>';?></p>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="form-group">
                        	<label class="control-label col-sm-2"><i class="fa fa-paperclip"></i> รูปตัวอย่าง:</label>
                            <div class="col-sm-10">
                            	<input id="tf_photo" name="tf_photo" type="file" class="file file-loading" data-allowed-file-extensions='["jpg","png"]' data-show-upload="false">
                            </div>
                        </div>
                        
                        <div class="form-group">
                        	<div class="col-sm-10 col-sm-offset-2">
                            	<?php if(empty($_GET["tf_id"])){?>
                            	
                                <input name="action" type="hidden" value="insert">
                            	<button type="submit" class="btn formbutton2"><i class="fa fa-check"></i> Insert</button>
                                
                                <?php }else{ ?>
                                
                                <input name="tf_id" type="hidden" value="<?php echo $ob2["tf_id"];?>">
                                <input name="tf_photoold" type="hidden" value="<?php echo $ob2["tf_photo"];?>">
                                <input name="action" type="hidden" value="update">
                                <button type="submit" class="btn formbutton2"><i class="fa fa-check"></i> Update</button>
                                
                                <?php } ?>
                            </div>
                        </div>
                    </form>
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
<!--form validator-->
$(document).ready(function() {
	
	$('#defaultForm').bootstrapValidator({
	});
	
});

<!--file upload-->
$("#tf_photo").fileinput({
	maxFileSize: 1000,
	language: "th",
});
</script>
</body>
</html>