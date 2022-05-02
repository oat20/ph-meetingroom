<?php
ob_start();
session_start();
#$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include("bookingroom/inc/checksession.inc.php");


#logfile($getip, $datelog, $url);


#$mode = $_GET["mode"];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="<?=$sitename;?>">
<title><?php print $sitename; ?></title>
<?php include("bookingroom/css-inc.php");?>
<style type="text/css">
body,td,th {
	font-family: Kanit, "Open Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, Arial, Helvetica, Sans, FreeSans, Jamrul, Garuda, Kalimati, verdana, arial, tahoma, sans-serif;
}
</style>
<!--<link rel="stylesheet" href="menu/menu_style.css" type="text/css"> -->

    </head>

<body>
<!--start header -->
<?php include("bookingroom/navbar-inc.php"); 
?>
<!--end header -->

<!--start center -->
<div class="container-fluid">

	<ol class="breadcrumb">
  		<li><a href="3_controlpanel.php"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</a></li>
  		<li class="active">อาหารว่าง</li>
	</ol>
	
    <div class="row">
    
    	<div class="col-sm-6">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">อาหารว่าง</h3>
                </div>
                <div class="panel-body">
                	<?php include("bookingroom/food_view.php");?>
                </div>
            </div>
        	
        </div><!--col-6-->
        
        <div class="col-sm-6">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">เพิ่ม / แก้ไข รายการ</h3>
                </div>
                <div class="panel-body">
                	<?php include("bookingroom/food.htm");?>
                </div>
            </div>
        	
        </div><!--col-6-->
    </div><!--row-->

	<!--<div class="bottom"></div> -->
</div><!--container-->
<!--end center -->

<!--start footer -->
<?php include("bookingroom/js-inc.php");
#include("bookingroom/web_analysic.php");
?>
<!--end footer -->
<script type="text/javascript">
$(document).ready(function() {
	
	$('#defaultForm').bootstrapValidator({
	});
});
</script>
</body>
</html>
