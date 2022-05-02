<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>PH-Weekly</title>
<?php include('../bookingroom/css-inc.php');?>
</head>

<body>
<div class="container">
	
    <h3 class="page-header">PH-Weekly Calendar</h3>
    <form action="weekagenda-word.php" method="post" target="_blank">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ต้องการพิมพ์กำหนดการตั้งแต่วันที่</h3>
            </div>
            <div class="panel-body">
            	<div class="form-group form-group-lg">
                	<select name="tm" class="form-control" required>
                    	<?php
						for($d=-5;$d<=30;$d++){
							$days=date('Y-m-d', strtotime('+'.$d.' day'));
							if($days==date('Y-m-d')){
								print '<option value="'.$days.'" selected>'.dateThai4($days).'</option>';
							}else{
								print '<option value="'.$days.'">'.dateThai4($days).'</option>';
							}
						}
						?>
                    </select>
                </div>
            </div>
            <div class="panel-footer">
            	<button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-print"></i> Print</button>
            </div>
        </div><!--panel-->
    </form>

</div><!--container-->

<?php include('../bookingroom/js-inc.php');?>
</body>
</html>