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
<title><?php echo $sitename;?></title>
<?php include("bookingroom/css-inc.php");?>
</head>

<body>
<?php include("bookingroom/navbar-inc.php");?>

<div class="container-fluid">

	<ol class="breadcrumb">
  		<li><a href="3_controlpanel.php"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</a></li>
  		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>">วัตถุประสงค์การจอง</a></li>
	</ol>
    
    <?php
	if($_SESSION['userType'] == 3){
	?>
    
    <div class="row">
    
    	<div class="col-sm-6">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">วัตถุประสงค์การจอง</h3>
                </div>
                <div class="panel-body">
                	<div class="table-responsive">
                    	<table class="table" id="merge">
                        	<thead>
  								<tr>                              	
    								<th>#</th>
    								<th>วัตถุประสงค์</th>
                                    <th></th>    								
							  </tr>
                            </thead>
                            <tbody>
                            <?php
							$sql = mysql_query("select * from meetingroom_objective
							order by ob_id asc");
							while($ob = mysql_fetch_assoc($sql)){
  								echo '<tr>								
    								<td>'.++$i.'</td>
    								<td>'.$ob["ob_title"].'</td>
									<td>
										<div class="btn-group btn-group-sm">
											<a href="'.$_SERVER['PHP_SELF'].'?keyObid='.$ob["ob_id"].'" class="btn btn-default"><i class="fa fa-edit"></i> แก้ไข</a>
											<a href="3_bookobjective_action.php?action=delete&keyObid='.$ob["ob_id"].'" class="btn btn-default"><i class="fa fa-times"></i> ลบ</a>
										</div>
									</td>  								
  								</tr>';
							}
								?>
                             </tbody>
						</table>
                    </div>
                </div>
            </div>
            
        </div><!--col-6-->
        
        <div class="col-sm-6">
        
        	<form action="3_bookobjective_action.php" method="post" id="defaultForm" class="form-horizontal">
        	<div class="panel panel-primary">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left">เพิ่ม / แก้ไขรายการ</h3>
                   <!-- <div class="pull-right">
                    	<button type="submit" class="btn btn-default"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>-->
                </div>
                <div class="panel-body">
                	
					<?php
					$sql2 = mysql_query("select * from meetingroom_objective
					where ob_id = '$_GET[keyObid]'");
					$ob2 = mysql_fetch_assoc($sql2);
					?>
                	<div class="form-group">
                    	<label class="control-label col-sm-3">วัตถุประสงค์:</label>
                        <div class="col-sm-9">
                        	<input name="sendObtitle" type="text" class="form-control" value="<?php echo $ob2["ob_title"];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                    	<div class="col-sm-9 col-sm-offset-3">
                        	<?php
							if(empty($_GET["keyObid"])){
							?>
                        		<input name="action" type="hidden" value="insert">
                        		<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check" aria-hidden="true"></i> Insert</button>
                            <?php
                            }else{
							?>
                            	<input name="keyObid" type="hidden" value="<?php echo $ob2["ob_id"];?>">
                            	<input name="action" type="hidden" value="update">
                        		<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
                            <?php
                            }
							?>
                        </div>
                    </div>
                    
                </div>
            </div>
            </form>
            
        </div><!--col-6-->
        
    </div><!--row-->
    
    <?php
	}else{
		include("bookingroom/alert-permission-inc.php");
	}
	?>
    
</div><!--container-->

<?php include("bookingroom/js-inc.php");?>
<script type="text/javascript">
$(document).ready(function() {
	
	$('#defaultForm').bootstrapValidator({
	});
	
});
</script>
</body>
</html>