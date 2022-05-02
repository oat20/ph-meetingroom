<?php
session_start();
#$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include("bookingroom/inc/checksession.inc.php");
//include("report/FusionCharts.php");
//include("report/FC_Colors.php");


#logfile($getip, $datelog, $url);


#$mode = $_GET["mode"];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php print $sitename; ?></title>
<?php include("bookingroom/css-inc.php");?>
<!--<script type="text/javascript">
        var GB_ROOT_DIR = "bookingroom/GreyBox/greybox/";
    </script>

    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/gb_scripts.js"></script>
    <link href="bookingroom/GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
    <style type="text/css">
    body,td,th {
	font-family: Kanit, "Open Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, Arial, Helvetica, Sans, FreeSans, Jamrul, Garuda, Kalimati, verdana, arial, tahoma, sans-serif;
}
    </style>
    <SCRIPT LANGUAGE="Javascript" SRC="report/FusionCharts.js"></SCRIPT>-->
    </head>

<body>
<!--start header -->
<?php include("bookingroom/navbar-inc.php");?>
<!--end header -->

<!--start center -->
<div class="container-fluid">

	<ol class="breadcrumb">
  		<li><a href="3_controlpanel.php"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</a></li>
  		<li><a href="<?php echo $_SERVER['PHP_SELF'];?>">สมาชิก</a></li>
	</ol>
    
    <?php
	if($_SESSION['userType'] == 3){
	?>
	
    <div class="row">
    	
        <div class="col-sm-12">
        
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<div class="blog_title clearfix">
                    	<div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i> สมาชิก</div>
                        <div class="pull-right">
                        	<a href="<?php echo $_SERVER['PHP_SELF'];?>?mode=add" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มสมาชิก</a>
                        </div>
                    </div>
                    
                	<?php 
					switch ($_GET['mode']){
						case "add" : include"bookingroom/register.php"; break;
						//case "edit" : include"bookingroom/inc/edituser.inc.php"; break;
						//case "log" : include"admin/inc/log.php"; break;
						default : include"bookingroom/admin2.inc.php"; break;
					}
					?>
                </div>
            </div>
            
        </div><!--col-12-->
        
    </div><!--row-->

	<!--<div class="bottom"></div> -->
    <?php
	}else{
		include("bookingroom/alert-permission-inc.php");
	}
	?>

</div>
<!--end center -->

<!--start footer -->
<?php include("bookingroom/js-inc.php");?>
<!--end footer -->
<script>
$(document).ready(function() {
	
	$('#form2').bootstrapValidator({
		
		fields: {
			
			 email: {
                validators: {
					notEmpty: {
                        //message: 'The username is required and cannot be empty'
                    },
                    remote: {
						type: 'POST',
                        url: 'mu-emailformat.php'
                        //message: 'โปรดใช้อีเมลของทางมหาวิทยาลัยฯ (@mahidol.ac.th)'
                    },
					emailAddress: {
                        	//message: 'The input is not a valid email address'
                    }
                }
            },
			 m3: {
                //message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        //message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 10
                        //message: 'The username must be more than 6 and less than 30 characters long'
                    }
                }
            }
		
		}
		
	});
	
	$('#formEdit').bootstrapValidator({
	});
	
});
</script>
</body>
</html>
