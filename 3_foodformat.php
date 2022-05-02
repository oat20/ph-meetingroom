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
  		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>">รูปแบบจัดอาหาร</a></li>
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $food = mysql_query("select * from meetingroom_foodformat
								order by ff_id asc");
								while($food2 = mysql_fetch_assoc($food)){
									echo '<tr>
											<td>'.$food2["ff_title"].'</td>
											<td><div class="btn-group btn-group-sm">
												<a href="'.$_SERVER['PHP_SELF'].'?ff_id='.$food2["ff_id"].'" class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
												<a href="3_foodformat_action.php?ff_id='.$food2["ff_id"].'&action=delete" class="btn btn-warning"><i class="fa fa-times"></i> ลบ</a>
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
            	
                <?php $sql_food = mysql_query("select * from meetingroom_foodformat
								where ff_id = '$_GET[ff_id]'");
								 $ob2 = mysql_fetch_assoc($sql_food); ?>
            	<div class="post2">
                	<div class="blog_title2">เพิ่ม / แก้ไขรายการ</div>
                    <form action="3_foodformat_action.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="defaultForm">
                    	<div class="form-group">
                        	<label class="control-label col-sm-3">ชื่อรายการ:</label>
                            <div class="col-sm-9">
                            	<input type="text" name="ff_title" class="form-control" value="<?php echo $ob2["ff_title"];?>" required>
                            </div>
                        </div>
                                                
                        <div class="form-group">
                        	<div class="col-sm-9 col-sm-offset-3">
                            	<?php if(empty($_GET["ff_id"])){?>
                            	
                                <input name="action" type="hidden" value="insert">
                            	<button type="submit" class="btn formbutton2"><i class="fa fa-check"></i> Insert</button>
                                
                                <?php }else{ ?>
                                
                                <input name="ff_id" type="hidden" value="<?php echo $ob2["ff_id"];?>">
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
</script>
</body>
</html>