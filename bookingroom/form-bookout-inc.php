<?php
include("config.php");
include("connect/connect.php");
include("inc/function.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<script>
function booking() {
	var URL = "bookingroom/booking.php";
	var data = getFormData("form1");
	ajaxLoad("post", URL, data, "display");
}
</script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">-->
<link rel="stylesheet" href="theme/style.css">

<!--Timepicker-->
<link rel="stylesheet" type="text/css" href="js/jquery.timepicker.css" />
<!--<link rel="stylesheet" type="text/css" href="js/site.css" />-->

<!--Datepicker-->
 <link rel="stylesheet" type="text/css" media="all" href="inc/datepicker/themes/aqua.css" title="Calendar Theme - forest.css" >
 <style type="text/css">
 body,td,th {
	font-family: Kanit, "Open Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, Arial, Helvetica, Sans, FreeSans, Jamrul, Garuda, Kalimati, verdana, arial, tahoma, sans-serif;
}
 </style>
</head>
<body>
	<div class="header">
    	<div class="container-fluid">
        	<img src="img/logo1.jpg" class="img-responsive">
        </div>
    </div>

<div class="container">
	
    <?php
	if(substr($getip,'0','5') == '10.13' or substr($getip,'0','5') == '10.99' or $getip == '127.0.0.1'){
	?>
    
    <!--<div class="page-header">-->
    	<h1>แบบฟอร์มขอใช้สถานที่นอกเวลาราชการ</h1>
    <!--</div>-->
    
    <div class="panel panel-default">
    	<div class="panel-body">
<form id='form1' name='form1' method='post' onsubmit='return checkvalue()' enctype="multipart/form-data" class="form-horizontal">
	    	<div id="display"></div>
    <?php
	   	 /*$cmd = "select * from jos_users,organization 
		 where jos_users.id='$u'
		 and jos_users.DeID=organization.DeID";
		 $result = mysql_query($cmd);
		$row=mysql_fetch_array($result);
		$form_deid=$row[DeID];*/
		?>
        <div class="form-group">
        	<label class="control-label col-sm-3">วันที่:</label>
            <div class="col-sm-4">
            	<input type="text" class="form-control" value="<?php echo dateThai(date("Y-m-d"));?>" readonly>
                <input type="hidden" value="<?php echo date("Y-m-d");?>" name="sendDate">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
            	<p class="form-control-static"><strong>เรื่อง ขออนุมัติใช้สถานที่นอกเวลาราชการ</strong></p>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
            	<p class="form-control-static"><strong>เรียน เลขานุการคณะฯ (ผ่านหัวหน้าหมวดสถานที่)</strong></p>
            </div>
        </div>
        
        <div class="form-group">
        	<label class="control-label col-sm-3">ผู้จอง <small class="regred_10">(จำเป็นกรอก)</small>:</label>
            <div class="col-sm-9">
            	<input type="text" placeholder="ชื่อ-นามสกุล" class="form-control" required name="sendName">
            </div>
        </div>
        
        <div class="form-group">
        	<label class="control-label col-sm-3">อีเมลผู้จอง <small class="regred_10">(จำเป็นกรอก)</small>:</label>
            <div class="col-sm-9">
            	<input type="email" class="form-control" required name="sendEmail">
                <span class="help-block">ต้องเป็นอีเมลของทางมหาวิทยาลัยฯ เท่านั้น (@mahidol.ac.th)</span>
            </div>
        </div>
        
        <div class="form-group">
        	<label class="control-label col-sm-3">ภาควิชา/ส่วนงาน <small class="regred_10">(จำเป็นกรอก)</small>:</label>
            <div class="col-sm-9">
            	<select class="form-control" required name="sendDep">
            		<option value="">เลือกรายการ</option>
                    <?php
					$rs = mysql_query("select * from organization
					where Types != '0'
					order by DeID asc");
					while($ob = mysql_fetch_assoc($rs)){
						echo '<option value="'.$ob['DeID'].'">'.$ob['Fname'].'</option>';
					}
					?>
            	</select>
            </div>
        </div>
        
        <div class="form-group">
        	<label class="control-label col-sm-3">วัตถุประสงค์ในการจอง <small class="regred_10">(จำเป็นกรอก)</small>:</label>
            <div class="col-sm-9">
            	<input type="text" class="form-control" required name="sendDetail">
            </div>
        </div>
        
        <div class="form-group">
        	<label class="control-label col-sm-3">จำนวนผู้เข้าร่วม <small class="regred_10">(จำเป็นกรอก)</small>:</label>
            <div class="col-sm-4">
            	<input type='number' name='text3' id='text3' size='5' class="form-control" maxlength="3" required>
            </div>
        </div>
        
        <div class="form-group">
        	<label class="control-label col-sm-3">ณ ห้อง หรือบริเวณ <small class="regred_10">(จำเป็นกรอก)</small>:</label>
            <div class="col-sm-9">
            	<input type="text" class="form-control" required name="sendLocation">
            </div>
        </div>
        
        <div class="form-group">
        	<label class="control-label col-sm-3">ในวันที่ <small class="regred_10">(จำเป็นกรอก)</small>:</label>
            <div class="col-sm-4">
            	<div class="input-group">
      				<input type="text" class="form-control" readonly id="sel4" required name="sendDate2">
      				<span class="input-group-btn">
        				<button class="btn btn-warning" type="button" id='button4' onClick="alert('click');"><i class="glyphicon glyphicon-calendar"></i> เลือกวัน</button>
      				</span>
    			</div><!-- /input-group -->
                <span class="help-block">ต้องทำการจองล่วงหน้าอย่างน้อย 3 วัน</span>
            </div>
        </div>
        
        <div class="form-group">
        	<label class="control-label col-sm-3">ตั้งแต่เวลา <small class="regred_10">(จำเป็นกรอก)</small>:</label>
            <div class="col-sm-4">
            	<div class="row">
                	<div class="col-sm-6">
            			<input type="text" id="t1" class="form-control" required placeholder="ตั้งแต่" name="sendTime1" value="<?php echo date("H");?>"/>
                	</div>
                    <div class="col-sm-6">
            			<input type="text" id="t2" class="form-control" required placeholder="ถึง" name="sendTime2" value="<?php echo date("H")+1;?>"/>
                	</div>
                </div>
            </div>
        </div>
        
        <!--<hr>
        <div class="form-group form-group-lg">
        	<label class="control-label col-sm-3"></label>
            <div class="col-sm-9">
            	<div class="row">
                	<div class="col-sm-6">
            			<input type="text" value="<?php //echo random_ID("8", "0");?>" readonly class="form-control" name="msgAntispam">
                	</div>
                    <div class="col-sm-6">
            			<input type="text" class="form-control" required>
                	</div>
                </div>
            </div>
        </div>-->
        
        <div class="form-group">
        	<div class="col-sm-9 col-sm-offset-3">
            	<div class="checkbox">
  					<label>
                		<input type="checkbox" id="Confirm"> ข้าพเจ้าขอรับรองว่า หลังจากการใช้สถานที่ราชการแล้ว จะรักษาความสะอาด ปิดประตู หน้าต่าง
						น้ําประปา ไฟฟ้า และเครื่องใช้ไฟฟ้าทุกชนิดโดยเรียบร้อย ข้าพเจ้ายินดีรับผิดชอบหากเกิดความเสียหายต่อทรัพย์สิน
						ของทางราชการ เนื่องจากการใช้สถานที่ราชการของข้าพเจ้าทุกประการ
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-group">
        	<div class="col-sm-9 col-sm-offset-3">
            	<input name="form_deid" type="hidden" value="<?php print $form_deid; ?>">
          		<input name="action" type="hidden" value="add">
          		<input name='Submit' type='button' id='Submit' value='ทำการจอง' class="btn btn-primary btn-lg" onClick="booking()">
            </div>
        </div>
  </form>
  	</div>
  </div>
  <!--form-->
  
  <?php
	}else{
		echo '<h1 class="text-danger"><i class="glyphicon glyphicon-alert"></i> <strong>Access Denied:</strong> ระบบนี้ไม่สามารถเข้าได้จากเครือข่ายภายนอกคณะฯ ได้</h1>';
	}
  ?>
  
</div>
<!--container-->
 
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <!--timepicker-->
<script type="text/javascript" src="js/jquery.timepicker.min.js"></script>
  <!--<script type="text/javascript" src="js/site.js"></script>-->
  <script>
   	$(function() {
    	$('#t1').timepicker({'scrollDefault': 'now', 'step':'5', 'maxTime': '23:59', 'timeFormat': 'H:i', 'minTime':'08:00'});
		$('#t2').timepicker({'scrollDefault': 'now', 'step':'5', 'maxTime': '23:59', 'timeFormat': 'H:i', 'minTime':'08:00'});
    });
  </script>
   <!--timepicker-->
   
  <!--calendarpicker-->
   <!-- import the calendar script -->
		<script type="text/javascript" src="inc/datepicker/script/utils.js"></script>
		<script type="text/javascript" src="inc/datepicker/script/calendar.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="inc/datepicker/script/calendar-th.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="inc/datepicker/script/calendar-setup.js"></script>
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",// trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		});
	</script>
    <!--calendarpicker-->
            
 <!--Disable / Enable button-->
 <script type="text/javascript">
	$(document).ready(function(){
   		$("#Submit").attr("disabled","disabled");
	});
	$("#Confirm").change(function(){
  		var relate = $(this).attr("rel");
  		if($(this).is(":checked")) 
    		// $("#Submit"+relate).removeAttr("disabled");
	 		$("#Submit").removeAttr("disabled");
  		else
     		//$("#Submit"+relate).attr("disabled","disabled");
	 		$("#Submit").attr("disabled","disabled");
	});
	</script>
 </body>
 </html>