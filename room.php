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
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $sitename;?>">
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
<?php include("bookingroom/navbar-inc.php");?>
<!--end header -->

<!--start center -->
<div class="container-fluid">

	<ol class="breadcrumb">
  		<li><a href="3_controlpanel.php"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</a></li>
  		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>">รายการห้อง</a></li>
	</ol>

<div class="row">

	<div class="col-sm-12">
    
    	<div class="panel panel-primary">
        	<div class="panel-heading clearfix">
            	<h3 class="panel-title pull-left">รายการห้อง</h3>
                <div class="pull-right">
                	<a href="bookingroom/room/room.php" class="btn btn-default btn-lg"><i class="fa fa-plus"></i> เพิ่มรายการห้อง</a>
                </div>
            </div>
            <div class="panel-body">
          		<?php include"bookingroom/room/admin3.php";?>
            </div>
        </div>
        
    </div><!--col-12-->

</div><!--row-->
	    
	<!--<div class="bottom"></div> -->
</div>
<!--end center -->

<!--start footer -->
<?php include("bookingroom/js-inc.php");?>
<!--end footer -->
</body>
</html>
