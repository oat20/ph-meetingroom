<?php
ob_start();
session_start();
#$u=$_SESSION["u"];
include"bookingroom/config.php";
require_once './bookingroom/mysqli_connect.php';
//include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include"bookingroom/inc/function2.php";
include("bookingroom/inc/checksession.inc.php");
#logfile($getip, $datelog, $url);
$mode = $_REQUEST["mode"];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php print $sitename; ?></title>
<?php include("bookingroom/css-inc.php");?>
        <style>
 body,td,th {
	font-family: Kanit, "Open Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, Arial, Helvetica, Sans, FreeSans, Jamrul, Garuda, Kalimati, verdana, arial, tahoma, sans-serif;
}
 </style>
    </head>

<body>
<!--start header -->
<?php  
//include("bookingroom/header.php"); 
//include("bookingroom/show_profile.php");
include("bookingroom/navbar-inc.php"); 
?>
<!--end header -->

<div class="container-fluid">

	<div class="row">
    
    	<div class="col-lg-8">
        	
            <div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> กรอกแบบฟอร์ม</h3>
                </div>
                <div class="panel-body">
                
                	<?php #include"bookingroom/inc/index.inc.php"; 
					switch($mode){
						#case "confirm" : include("bookingroom/booking/insert_booking.php"); break;
						case "confirm" : include("bookingroom/1_booking_confirm.php"); break; 
						case "update" : include("bookingroom/1_booking_update.php"); break;
						default : include("bookingroom/room1.inc.php"); break;
					}
					?>
            
                </div>
            </div><!--panel-->
            
        </div><!--col-12-->
        
        <div class="col-lg-4">
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title"><i class="fa fa-info"></i> หมายเหตุ</h3>
                </div>
                <!-- List group -->
                  <ul class="list-group">
                    <li class="list-group-item">1. กรณีใช้ห้องประชุมเร่งด่วน หรือเปลี่ยนห้องประชุม กรุณาแจ้งหน้าที่ โทร.1199</li>
                    <li class="list-group-item">2. กรณียกเลิกห้องประชุมขอให้โทรประสานเจ้าหน้าที่ โทร.1199 และแจ้งยกเลิกอาหารว่างที่หน่วยบริการการประชุม โทร.1240 (ถ้ายกเลิกกระทันหันผู้ใช้ห้องจะต้องรับผิดชอบค่าใช้จ่ายอาหารว่าง)</li>
                  </ul>
            </div><!--panel-->
        </div><!--col-6-->
        
    </div><!--row-->

	<!--<div class="bottom"></div> -->
</div><!--container-->

<?php 
include("bookingroom/js-inc.php");
?>    
    <script>
   	$(function() {
    	$('#t1').timepicker({'scrollDefault': 'now', 'step':'30', 'maxTime': '23:59', 'timeFormat': 'H:i', 'minTime':'08:00'});
		$('#t2').timepicker({'scrollDefault': 'now', 'step':'30', 'maxTime': '23:59', 'timeFormat': 'H:i', 'minTime':'08:00'});
    });
  </script>
      
    <script>
		$(document).ready(function() {
			
			$('#form1').bootstrapValidator({
				
				message: 'This value is not valid',
        		/*feedbackIcons: {
            		valid: 'glyphicon glyphicon-ok',
            		invalid: 'glyphicon glyphicon-remove',
            		validating: 'glyphicon glyphicon-refresh'
        		}*/
				fields: {
					startdate: {
               			//message: 'The username is not valid',
                		validators: {
                    		notEmpty: {
                        		//message: 'The username is required and can\'t be empty'
                    		}
                    		/*remote: {
								type: 'POST',
                        		url: 'bookingroom/inc/bootstrapvalidator/validate-duration.php',
                        		message: 'ไม่สามารถทำรายการได้ต้องจองล่วงหน้าอย่างน้อย 3 วัน'
                    		}*/
                		}
            		},
					booking_d:{
						validators: {
                    		notEmpty: {
                        		//message: 'The username is required and can\'t be empty'
                    		}
						}
					},
					booking_m:{
						validators: {
                    		notEmpty: {
                        		//message: 'The username is required and can\'t be empty'
                    		}
						}
					},
					booking_y:{
						validators: {
                    		notEmpty: {
                        		//message: 'The username is required and can\'t be empty'
                    		}
						}
					}
				}
		
			});
			
			// Enable street/city/country validators if user want to ship to other address
    		$('input[name="condition"]').on('change', function() {
        		var bootstrapValidator = $('#form1').data('bootstrapValidator'),
            		shipNewAddress     = ($(this).val() == '2');

        			shipNewAddress ? $('#newCondition').find('.form-control').removeAttr('disabled')
                       : $('#newCondition').find('.form-control').attr('disabled', 'disabled');

        			bootstrapValidator.enableFieldValidators('condition2', shipNewAddress);
    		});

			$('input[name="online"]').change(function(){
				if($('input[name="online"]').is(':checked')){
					$('#onlineNote').show();
					$('textarea[name="optionss"]').attr('required', 'required');
				}else{
					$('#onlineNote').hide();
					$('textarea[name="optionss"]').removeAttr("required");
				}
			})
			
		});
	</script>
</body>
</html>
