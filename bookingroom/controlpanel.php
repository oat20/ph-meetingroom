<?php 
session_start();

include("config.php");
include("inc/checksession.inc.php");
include("connect/connect.php");
include("inc/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php  include("css-inc.php");?>
</head>

<body>
<?php include("navbar-inc.php");?>

<div class="container-fluid">

	<ol class="breadcrumb">
  		<li class="active"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</li>
	</ol>
    
	<?php
	if($_SESSION['userType'] == 3){
	?>

	<div class="row">
    	   
    	<div class="col-sm-6">
        
        	<!--report-->
<div class="panel panel-default">
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
	</div>
</div>
<!--report-->
        
        </div><!--col-6-->
        
        <div class="col-sm-6">
        
        	<!--config system-->
<div class="panel panel-default">
	<div class="panel-body">
    	<div class="blog_title">เตรียมข้อมูลระบบ</div>
        	<div id="left">
            <div class="menu">
<ul>
            	<li><a href="config.php">ตั้งค่าระบบ</a></li>
                	<li><a href="room_cate.php">รายการประเภทห้อง</a></li>
                	<li><a href="room.php">รายการห้อง</a></li>
                	<li><a href="food.php">รายการอาหารว่าง</a></li>
                	<li><a href="media.php">รายการอุปกรณ์เสริม</a></li>
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
                
                <?php include("js-inc.php");?>
                </body>
</html>