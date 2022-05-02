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
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left">ข้อปฏิบัติการจอง</h3>
                    <div class="pull-right"><a href="manage.php" class="btn btn-default"><i class="fa fa-plus"></i> เพิ่มรายการ</a></div>
                </div>
                <div class="panel-body">
                
                	<table class="table table-striped">
                    	<thead>
                        	<tr>
                            	<th>Order</th>
                                <th>Title</th>
                                <th>Use</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
							$rs=mysql_query("select * from meetingroom_practice
							order by pr_order asc");
							while($ob=mysql_fetch_assoc($rs)){
								echo '<tr>
											<td>'.$ob['pr_order'].'</td>
											<td>'.$ob['pr_title'].'</td>
											<td>'.$cf_yn2[$ob['pr_use']].'</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fa fa-cog"></i> <span class="caret"></span>
													  </button>
													  <ul class="dropdown-menu dropdown-menu-right">
														<li><a href="manage.php?pr_id='.$ob['pr_id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></li>
														<li><a href="remove.php?pr_id='.$ob['pr_id'].'"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li>
													  </ul>
												</div>
											</td>
									</tr>';
							}
							?>
                        </tbody>
                    </table>
                    
                </div><!--panel-body-->
            </div><!--panel-->
        </div><!--col-12-->
        
    </div><!--row-->
</div><!--container-->

<?php include("../bookingroom/js-inc.php");?>
</body>
</html>