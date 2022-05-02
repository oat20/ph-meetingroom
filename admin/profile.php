<?php
session_start();

include"../bookingroom/config.php";
include("../bookingroom/inc/checksession.inc.php");
include"../bookingroom/connect/connect.php";
include("../bookingroom/inc/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php print $sitename; ?></title>
<?php include("../bookingroom/css-inc.php");?>
</head>

<body>
<?php include("../bookingroom/navbar-inc.php");?>

<div class="container-fluid">

	<div class="row">
    	<div class="col-sm-6">
        
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<?php include"../bookingroom/inc/profile.php"; ?>
                </div>
            </div>
        	
        </div><!--col-->
        
        <div class="col-sm-6">
        
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<?php include"inc/changepassword.php"; ?>
                </div>
            </div>
        	
        </div><!--col-->
        
    </div><!--row-->
    
</div><!--container-->

<?php include("../bookingroom/js-inc.php");?>
<script>
$(document).ready(function() {
	
	$('#form2').bootstrapValidator({
		fields: {
			
			email: {
               			//message: 'The username is not valid',
            	validators: {
                    		notEmpty: {
                        		//message: 'The username is required and can\'t be empty'
                    		},
                    		remote: {
								type: 'POST',
                        		url: '../bookingroom/inc/bootstrapvalidator/mu-emailformat.php'
                        		//message: 'The username is not available'
                    		}
                }
            }
		
		}
	});
	
	$('#formChangepw').bootstrapValidator({
	});
	
});
</script>
</body>
</html>