<?php
#ob_start();
session_start();
#$u=$_SESSION["u"];
include"../bookingroom/config.php";
include("../bookingroom/inc/checksession.inc.php");
include"../bookingroom/connect/connect.php";
include"../bookingroom/inc/function.php";
//include"../bookingroom/inc/function2.php";

//$conn=connect_db();
include("../bookingroom/css-inc.php");

$m=$_REQUEST["m"];
$y=$_REQUEST["y"];
$room=$_POST[room];

$y=$y-543;
$key=$y."-".$m;
?>
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
a:link {
	color: #3399FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #3399FF;
}
a:hover {
	text-decoration: underline;
	color: #3399FF;
}
a:active {
	text-decoration: none;
	color: #3399FF;
}
.style3 {font-size: 12; }
-->
</style>

<?php include("../bookingroom/navbar-inc.php");

$m=$_REQUEST["m"];
$y=$_REQUEST["y"];
$room=$_POST[room];

$y=$y-543;
$key=$y."-".$m."-".$_POST['book_d1'];

$y2 = $_POST['y2'] - 543;
$key2 = $y2."-".$m2."-".$_POST['book_d2']; ?>

<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
        	<div class="blog_title3 clearfix">
            	<div class="pull-left"><a href="../3_controlpanel.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> รายงาน</div>
                <div class="pull-right"><?php echo dateThai($key).' ถึง '.dateThai($key2);?></div>
            </div>
        </div><!--col--> 
    </div><!--row--> 

	<?php
	if($_SESSION['userType'] == 3){
	?>
    
    	<div class="row">
        
        	<!--ห้อง-->
        	<div class="col-lg-4">
            
            	<div class="panel panel-default">
                	<div class="panel-body">
                    	<div class="blog_title2">ห้อง</div>
                        <div class="table-responsive">
                        	<table class="table table-hover">
                            	<thead>
                                	<tr>
                                    	<th>ห้อง</th>
                                        <th>รายการ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
									$sqlRoom = mysql_query("SELECT meetingroom_croom.cr_id, meetingroom_croom.name, meetingroom_croom.cr_number, meetingroom_croom.location, COUNT( meetingroom_userq.uq_id ) AS countUqid
FROM meetingroom_croom
INNER JOIN meetingroom_userq ON ( meetingroom_croom.cr_id = meetingroom_userq.cr_id ) 
WHERE meetingroom_userq.Dater between '$key' and '$key2'
GROUP BY meetingroom_croom.cr_id, meetingroom_croom.name, meetingroom_croom.cr_number, meetingroom_croom.location
ORDER BY meetingroom_croom.cr_id ASC ");
									while($obRoom = mysql_fetch_assoc($sqlRoom)){
										echo '<tr>
												<td>'.$obRoom['name'].' '.$obRoom['cr_number'].'</td>
												<td>'.$obRoom['countUqid'].'</td>
												<td><a href="?dater1='.$key.'&dater2='.$key2.'&cr_id='.$obRoom['cr_id'].'" class="btn btn-default btn-sm"><i class="fa fa-info"></i> รายละเอียด</a></td>
											</tr>';
									}
									?>
                                </tbody>
                            </table>
                        </div><!--table-responsive-->
                    </div><!--panel-body-->
                </div><!--panel-->
                
            </div><!--col-->
            
            <!--ส่วนงาน-->
        	<div class="col-lg-4">
            
            	<div class="panel panel-default">
                	<div class="panel-body">
                    	<div class="blog_title2">ส่วนงาน</div>
                         <div class="table-responsive">
                        	<table class="table table-hover">
                            	<thead>
                                	<tr>
                                    	<th>ส่วนงาน</th>
                                        <th>รายการ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
									$sqlOrg = mysql_query("SELECT organization.DeID, organization.Fname, COUNT( meetingroom_userq.uq_id ) AS countUqid
FROM organization
INNER JOIN meetingroom_userq ON ( organization.DeID = meetingroom_userq.DeID ) 
WHERE meetingroom_userq.Dater between '$key' and '$key2'
GROUP BY organization.DeID, organization.Fname
ORDER BY organization.DeID ASC");
									while($obOrg = mysql_fetch_assoc($sqlOrg)){
										echo '<tr>
												<td>'.$obOrg['Fname'].'</td>
												<td>'.$obOrg['countUqid'].'</td>
												<td><a href="?dater1='.$key.'&dater2='.$key2.'&DeID='.$obOrg['DeID'].'" class="btn btn-default btn-sm"><i class="fa fa-info"></i> รายละเอียด</a></td>
											</tr>';
									}
									?>
                                </tbody>
                            </table>
                        </div><!--table-responsive-->
                    </div><!--panel-body-->
                </div><!--panel-->
                
            </div><!--col-->
            
            <!--วัตถุประสงค์-->
        	<div class="col-lg-4">
            
            	<div class="panel panel-default">
                	<div class="panel-body">
                    	<div class="blog_title2">วัตถุประสงค์</div>
                        <div class="table-responsive">
                        	<table class="table table-hover">
                            	<thead>
                                	<tr>
                                    	<th>วัตถุประสงค์</th>
                                        <th>รายการ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
									$sqlObj = mysql_query("SELECT meetingroom_objective.ob_id, meetingroom_objective.ob_title, COUNT( meetingroom_userq.uq_id ) AS countUqid
FROM meetingroom_objective
INNER JOIN meetingroom_userq ON ( meetingroom_objective.ob_id = meetingroom_userq.ob_id ) 
WHERE meetingroom_userq.Dater between '$key' and '$key2'
GROUP BY meetingroom_objective.ob_id, meetingroom_objective.ob_title
ORDER BY meetingroom_objective.ob_id ASC");
									while($obObj = mysql_fetch_assoc($sqlObj)){
										echo '<tr>
												<td>'.$obObj['ob_title'].'</td>
												<td>'.$obObj['countUqid'].'</td>
												<td><a href="?dater1='.$key.'&dater2='.$key2.'&ob_id='.$obObj['ob_id'].'" class="btn btn-default btn-sm"><i class="fa fa-info"></i> รายละเอียด</a></td>
											</tr>';
									}
									?>
                                </tbody>
                            </table>
                        </div><!--table-responsive-->
                    </div><!--panel-body-->
                </div><!--panel-->
                
            </div><!--col-->
    
    	</div><!--row-->
        
        <div class="row">
        	
            <!--cancel-->
        	<div class="col-lg-4">
            
            	<div class="alert alert-warning" role="alert">
                	<?php
					$sqlCancel = mysql_query("SELECT uq_cancel, COUNT( uq_id ) AS countUqid
FROM meetingroom_userq
WHERE uq_cancel =  'Yes'
and meetingroom_userq.Dater between '$key' and '$key2'
GROUP BY uq_cancel");
					$obCancel = mysql_fetch_assoc($sqlCancel);
                	echo '<h4>รายการยกเลิก '.number_format($obCancel['countUqid']).' รายการ</h4>
                    	<p><a href="#?dater1='.$key.'&dater2='.$key2.'&cr_id='.$obCancel['uq_cencel'].'" class="alert-link">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>';
					?>
                </div>
                
            </div><!--col-->
            
        </div><!--row-->
    
    <?php
	}else{
		include("../bookingroom/alert-permission-inc.php");
	}
	?>
    
    </div><!--container-->
    
<?php include("../bookingroom/js-inc.php");?>