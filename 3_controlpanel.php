<?php
session_start();

include"bookingroom/config.php";
require_once './bookingroom/mysqli_connect.php';
include("bookingroom/inc/checksession.inc.php");
include("bookingroom/inc/function.php");
//include("bookingroom/connect/connect.php");
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

	<?php
	if($_SESSION['userType'] == 3){
	?>
    
    	<div class="row">
        	<div class="col-sm-12">
            	
                <!--new booking-->
            	<div class="panel panel-default">
                	<div class="panel-body">
                    	<div class="blog_title clearfix">
                        	<div class="pull-left"><i class="fa fa-list" aria-hidden="true"></i> รายการจองเข้าใหม่</div>
                            <!--<div class="pull-right"><a href="3_bookingall.php" class="btn btn-default">View All <i class="fa fa-angle-double-right"></i></a></div>-->
                        </div>
                        
                        <p>
                        	<div class="row">
                            	<div class="col-sm-6">
                                	<div class="btn-group btn-group-lg">
                                		<a href="3_bookinginsert.php" class="btn btn-default"><i class="fa fa-plus"></i> กรอกแบบฟอร์มแบบเร่งด่วน</a>
                                        <a href="3_bookingall.php" class="btn btn-default">View All <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                	<form action="3_bookingall.php" id="formSearch" method="post">
                        				<div class="form-group">
                            				<div class="input-group">
                            					<input type="text" name="keyWord" class="form-control" placeholder="กรอกเลขที่รายการ หรือชื่อผู้จอง" required>
                                				<span class="input-group-btn">
                               						<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
                                				</span>
                            				</div>  
                        				</div>
                    				</form>
                                </div>
                            </div>
                        </p>
                        
						<?php include("bookingroom/newbooking.php");?>
                    </div>
                </div>
                <!--new booking-->
                
            </div><!--col-12-->
            
            <!--<div class="col-sm-3">
        
        	Manage ใบจอง
            <div class="panel panel-default">
                <div class="panel-body">
                	<div class="blog_title"><i class="fa fa-file-text" aria-hidden="true"></i> จัดการใบจอง</div>
                	
                    <p><a href="3_bookinginsert.php" class="btn btn-default btn-block btn-lg">กรอกแบบฟอร์มจองห้องแบบเร่งด่วน</a></p>
                    
                    <form action="3_bookingall.php" id="formSearch" method="post">
                    	<legend><i class="fa fa-search" aria-hidden="true"></i> ค้นหารายการจอง</legend>
                        <div class="form-group">
                        	<label class="control-label">กรอกเลขที่รายการ หรือชื่อผู้จอง:</label>
                            <div class="input-group">
                            	<input type="text" name="keyWord" class="form-control" placeholder="กรอกเลขที่รายการ หรือชื่อผู้จอง" required>
                                <span class="input-group-btn">
                               		<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> ค้นหา</button>
                                </span>
                            </div>  
                        </div>
                    </form>                    
                </div>
            </div>
            Manage ใบจอง
        
        </div>--><!--col-6-->
                  
        </div><!--row-->
    	
        <div class="row">
               
        <div class="col-sm-6">
        	
            <!--report-->
<!--<div class="panel panel-default">
	<div class="panel-body">
   		<div class="blog_title">รายงาน</div>
        	<div id="left">            
            	<div class="menu">
					<ul>
            			<li><a href="report.php">การจองรายเดือน</a></li>
                		<li><a href="stat.php">สถิติการจอง</a></li>
            		</ul>
            	</div>
            	<div class="line"></div>
          	</div>
            <?php //include("report/checkbooking.php");?>
	</div>
</div>-->
<!--report-->

        </div><!--col-->
                   
        <div class="col-sm-6">
        
        	<!--config system-->
<div class="panel panel-default">
	<div class="panel-body">
    	<div class="blog_title">เตรียมข้อมูลระบบ</div>
        	<div id="left">
            <div class="menu">
<ul>
            	<!--<li><a href="config.php">ตั้งค่าระบบ</a></li>-->
                	<li><a href="room_cate.php">รายการประเภทห้อง</a></li>
                	<li><a href="room.php">รายการห้อง</a></li>
                    <li><a href="3_tableformat.php">รูปแบบการจัดโต๊ะ</a></li>
                	<li><a href="food.php">รายการอาหารว่าง</a></li>
                	<li><a href="media.php">รายการอุปกรณ์เสริม</a></li>
                    <li><a href="3_bookobjective.php">วัตถุประสงค์การจอง</a></li>
                    <!--<li><a href="3_foodformat.php">รูปแบบการจัดอาหาร</a></li>-->
                	<li><a href="org.php">ภาควิชา/ส่วนงาน</a></li>
                    <li><a href="user.php">สมาชิก</a></li>
            </ul>
            </div>
            <div class="line"></div>
            </div>
	</div>
</div>
<!--config system-->
        
        </div><!--col-6-->
    
    </div><!--row-->
                
                <?php
	}else{
		
		include("alert-permission-inc.php");
		
	}
				?>
                
                </div><!--container-->

<?php include("bookingroom/js-inc.php");?>
<script>
		$(document).ready(function() {
			
			$('#formSearch').bootstrapValidator({
				message: 'This value is not valid'
			});
			
			$('#formReport').bootstrapValidator({
				message: 'This value is not valid'
			});
		});
</script>
</body>
</html>