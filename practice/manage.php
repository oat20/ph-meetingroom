<?php
session_start();

include"../bookingroom/config.php";
include"../bookingroom/connect/connect.php";
include"../bookingroom/inc/function.php";
include("../bookingroom/inc/checksession.inc.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $sitename;?></title>
<?php include("../bookingroom/css-inc.php");?>
</head>

<body>
<?php include("../bookingroom/navbar-inc.php");?>

<div class="container">
	<div class="row">
    
    	<div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title">เพิ่ม/แก้ไขรายการ</h3>
                </div>
                <div class="panel-body">
                	
                    <?php
					$rs=mysql_query("select * from meetingroom_practice
					where pr_id='$_GET[pr_id]'");
					$ob=mysql_fetch_assoc($rs);
					?>
                    
                	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-horizontal" id="defaultForm">
                    	<div class="form-group">
                        	<label class="control-label col-sm-3">คำอธิบาย:</label>
                            <div class="col-sm-9">
                            	<textarea rows="4" class="form-control" name="pr_title" required><?php echo $ob['pr_title'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="control-label col-sm-3">ใช้งาน:</label>
                            <div class="col-sm-9">
                            	<?php
								foreach($cf_yn2 as $k=>$v){
									if($ob['pr_use']==$k){
										echo '<label class="radio-inline"><input type="radio" name="pr_use" value="'.$k.'" checked> '.$v.'</label>';
									}else{
										echo '<label class="radio-inline"><input type="radio" name="pr_use" value="'.$k.'"> '.$v.'</label>';
									}
								}
								?>
                            </div>
                        </div>
                        <div class="form-group">
                        	<div class="col-sm-9 col-sm-offset-3">
                            	<?php
								if(empty($_GET['pr_id'])){
									echo '<input type="hidden" name="action" value="insert">
									<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check"></i> Insert</button>';
								}else{
									echo '<input type="hidden" name="pr_id" value="'.$ob['pr_id'].'">
									<input type="hidden" name="action" value="update">
									<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check"></i> Update</button>';
								}
								?>
                            </div>
                        </div>
                    </form>
                    
                </div><!--panel-body-->
            </div><!--panel-->
        </div><!--col-12-->
        
    </div><!--row-->
</div><!--container-->

<?php 
if($_POST['action']=='insert' and isset($_POST['pr_title']) and isset($_POST['pr_use'])){
	
	$rs=mysql_query("insert into meetingroom_practice values ('".random_ID('6', '0')."',
	'$_POST[pr_title]',
	'$_POST[pr_use]',
	'".maxid('meetingroom_practice', 'pr_order')."',
	'".date('Y-m-d H:i:s')."',
	'".$_SERVER['REMOTE_ADDR']."')");
	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	
}else if($_POST['action']=='update' and isset($_POST['pr_title']) and isset($_POST['pr_use'])){
	
	$rs=mysql_query("update meetingroom_practice set
	pr_title='$_POST[pr_title]',
	pr_use='$_POST[pr_use]',
	pr_datestamp='".date('Y-m-d H:i:s')."',
	pr_ipstamp='".$_SERVER['REMOTE_ADDR']."'
	where pr_id='$_POST[pr_id]'");
	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}

include("../bookingroom/js-inc.php");
?>
<script>
$(document).ready(function() {
	
	$('#defaultForm').bootstrapValidator({
		fields: {
			pr_title: {
               			//message: 'The username is not valid',
                		validators: {
                    		notEmpty: {
                        		//message: 'The username is required and can\'t be empty'
                    		}
                		}
            		},
			pr_use: {
               			//message: 'The username is not valid',
                		validators: {
                    		notEmpty: {
                        		//message: 'The username is required and can\'t be empty'
                    		}
                		}
            		}
		}
	});
	
});
</script>
</body>
</html>