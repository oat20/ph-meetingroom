<?php
include("config.php");
include("connect/connect.php");
include("inc/function.php");
?>
<!doctype html>
<head>
<?php include("css-inc.php");?>
<script>
function booking() {
	var URL = "bookingroom/booking.php";
	var data = getFormData("form1");
	ajaxLoad("post", URL, data, "display");
}
</script>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:6px;
	top:7px;
	width:818px;
	height:893px;
	z-index:1;
}
/*body, td, th {
	font-family: Courier New, Courier, monospace;
}*/
a:link {
	color: #0066CC;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0066CC;
}
a:hover {
	text-decoration: none;
	color: #33CCFF;
}
a:active {
	text-decoration: none;
	color: #33CCFF;
}
#Layer14 {
	position:absolute;
	left:1px;
	top:50px;
	width:682px;
	height:158px;
	z-index:12;
}
.style14 {
	color: #FF0000
}
.style20 {
	font-size: 14px;
}
-->
</style>
<style type="text/css">
.mouseOut {
	color: #666666;
	background-color: #FFFFFF;
}
.mouseOver {
	color: #000000;
	background-color: #CCCCCC;
}
</style>
<script language="javascript" type="text/javascript">
function check_number(ch){
var len, digit;
if(ch == " "){ 
return false;
len=0;
}else{
len = ch.length;
}
for(var i=0 ; i<len ; i++)
{
digit = ch.charAt(i)
if(digit !=""){
; 
}else{
return false; 
} 
} 
return true;
}

function check_number2(ch){
var len2, digit2;
if(ch == " "){ 
return false;
len2=0;
}else{
len2 = ch.length;
}
for(var i=0 ; i<len2 ; i++)
{
digit2 = ch.charAt(i)
if(digit2 >="0" && digit2 <="9"){
; 
}else{
return false; 
} 
} 
return true;
}

function checkvalue()
{
if(!check_number2(document.form1.text1.value) ||  (document.form1.text1.value)== "" )
{
alert('กรุณาใส่หมายเลขโทรศัพท์ให้ถูกต้อง');
return false;
}else if(!check_number(document.form1.teaher.value) ||  (document.form1.teacher.value)== "" )
{
alert('กรุณาใส่ข้อความให้ครบ');
return false;
}else if(!check_number(document.form1.text2.value) ||  (document.form1.text2.value)== "" )
{
alert('กรุณาใส่ข้อความให้ครบ');
return false;
}else if(!check_number(document.form1.text3.value) ||  (document.form1.text3.value)== "" )
{
alert('กรุณาใส่ข้อความให้ครบ');
return false;
}else if(!check_number(document.form1.startdate.value) ||  (document.form1.startdate.value)== "" )
{
alert('กรุณาใส่วันที่จอง');
return false;
}else if(!check_number(document.form1.room.value) ||  (document.form1.room.value)== "" )
{
alert('กรุณาเลือกห้องอบรม');
return false;
}else if(!check_number(document.form1.DeID.value) ||  (document.form1.dep.value)== "" )
{
alert('กรุณาเลือกหน่วยงานที่จอง');
return false;
}
else{return true;}
}
  </script>
</head>
<body>
<div class="header">
    	<div class="container-fluid">
        	<img src="img/logo1.jpg" class="img-responsive">
        </div>
</div>

<div class="container">

	<?php
	if($getip == '127.0.0.1' or substr($getip,'0','5') == '10.13' or substr($getip,'0','5') == '10.41' or substr($getip,'0','5') == '10.99'){
	?>
    
	<!--<div class="page-header">
    	<h2>แบบฟอร์มขอใช้สถานที่</h2>
    </div>-->
    
    <div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3>แบบฟอร์มขอใช้สถานที่</h3>
        </div>
    	<div class="panel-body">
        	<form method="post" class="form-horizontal" id="form1">
            	<div class="form-group">
                	<label class="control-label col-sm-3">วันที่:</label>
                    <div class="col-sm-9">
                    	<p class="form-control-static"><?php echo dateThai($today);?></p>
                    </div>
                </div>
                
                <div class="form-group">
                	<div class="col-sm-9 col-sm-offset-3">
                    	<p class="form-control-static"><strong>เรียน เลขานุการคณะฯ</strong></p>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ด้วยข้าพเจ้า <span class="regred_8">(จำเป็นต้องกรอก)</span>:</label>
                    <div class="col-sm-9">
                    	<input name="uname" type="text" size="60" maxlength="255" class="form-control" id="uname" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อีเมล <span class="regred_8">(จำเป็นต้องกรอก)</span>:</label>
                    <div class="col-sm-9">
                    	<input name="sendEmail" type="email" size="60" maxlength="10" class="form-control forminput2" required>
                        <span class="help-block">ต้องใช้อีเมลของทางมหาวิทยาลัยฯ (@mahidol.ac.th)</span>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ภาควิชา/งาน <span class="regred_8">(จำเป็นต้องกรอก)</span>:</label>
                    <div class="col-sm-9">
                    	<select name="DeID" class="form-control" id="DeID" required>
            				<option value="">- เลือกรายการ -</option>
                			<?php
							$sql="select DeID,Fname
							from organization
							where Types != '0'
							order by DeID asc";
							$rs=mysql_query($sql);
							while($ob=mysql_fetch_assoc($rs)){
								print "<option value=".$ob[DeID].">- ".$ob[Fname]."</option>";
							}
							?>
            			</select>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">มีความประสงค์ขอใช้สถานที่ในวันที่:</label>
                    <div class="col-sm-4">
                    	<div class="input-group">
                    		<input name="startdate" type="text" class="form-control" id="sel4" value="<?php echo $times; ?>" size="10" maxlength="10" readonly required>
                            <span class="input-group-btn">
                                <button class="btn btn-warning" type="button" id="button4"><img src="<?php echo $livesite;?>bookingroom/img/calendar.png"> เลือกวัน</button>
                            </span>
          				</div>
                        <span class="help-block">ต้องจองล่วงหน้าอย่างน้อย 3 วันทำการ</span>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เวลา:</label>
                    <div class="col-sm-9">
                    	<?php
						$sql = "select * from room_time 
						where trash = '0'
						order by tim_id asc";
						$rs = mysql_query($sql);
						while($ob = mysql_fetch_assoc($rs)){
							if($ob['tim_id'] == '3'){
								print "<div class='radio'><label><input name=booTime type=radio value=".$ob[tim_id]." id=booTime checked> ".$ob[name]." (".$ob[start]." น. - ".$ob[end]." น.)</label></div>";
							}else{
								print "<div class='radio'><label><input name=booTime type=radio value=".$ob[tim_id]." id=booTime> ".$ob[name]." (".$ob[start]." น. - ".$ob[end]." น.)</label></div>";
							}
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">วัตถุประสงค์เพื่อ:</label>
                    <div class="col-sm-9">
                    	<?php
						$rs = mysql_query("select * from meetingroom_objective where ob_active = '1' and ob_trash = '0' order by ob_id asc");
						while($ob = mysql_fetch_assoc($rs)){
							if($ob['ob_id'] == '1'){
								echo '<label class="radio-inline"><input type="radio" name="sendObid" checked> '.$ob['ob_title'].'</label>';
							}else{
								echo '<label class="radio-inline"><input type="radio" name="sendObid"> '.$ob['ob_title'].'</label>';
							}
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">หัวข้อประชุม/ชื่อวิชา:</label>
                    <div class="col-sm-9">
                    	<input name="title" type="text" class="form-control forminput2" id="optionss" value="" size="60" maxlength="200" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ชื่อประธานที่ประชุม/ชื่ออาจารย์ผู้สอน:</label>
                    <div class="col-sm-9">
                    	<input name="sendPratan" type="text" class="form-control forminput2" id="optionss" value="" size="60" maxlength="200" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">จำนวนผู้เข้าร่วม:</label>
                    <div class="col-sm-4">
                    	<input type='number' name='text3' id='text3' size='5' class="form-control forminput2" maxlength="3" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อาหารว่าง:</label>
                    <div class="col-sm-9">
                    	<?php
						$sql="select * from meetingroom_food
						where trash = '0'
						order by food_id asc";
						$rs=mysql_query($sql);
						while($ob=mysql_fetch_assoc($rs)){
							print "<label class='checkbox-inline'><input name=food_id[] type=checkbox value=".$ob[food_id]."> ".$ob[food]."</label>";
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อุปกรณ์ที่ต้องการใช้เพิ่มเติม:</label>
                    <div class="col-sm-9">
                    	<?php
						$sql="select * from meetingroom_media
						where trash = '0'
						order by media_id asc";
						$rs=mysql_query($sql);
						while($ob=mysql_fetch_assoc($rs)){
							print "<div class='checkbox'><label><input name=media_id[] type=checkbox value=".$ob[media_id]."> ".$ob[media]."</label></div>";
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">รูปแบบการจัดห้อง:</label>
                    <div class="col-sm-9">
                    	<?php
						$rs = mysql_query("select * from meetingroom_tableformat where tf_active = '1' and tf_trash = '0' order by tf_id asc");
						while($ob = mysql_fetch_assoc($rs)){
							echo '<div class="radio"><label><input type="radio" value="'.$ob['tf_id'].'"> '.$ob['tf_title'].' <a href="'.$livesite.'bookingroom/img/room/'.$ob['tf_photo'].'" target="new"><i class="glyphicon glyphicon-picture"></i> ตัวอย่าง</a></label></div>';
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">รูปแบบการจัดอาหาร:</label>
                    <div class="col-sm-9">
                    	<?php
						$rs = mysql_query("select * from meetingroom_foodformat where ff_active = '1' and ff_trash = '0' order by ff_id asc");
						while($ob = mysql_fetch_assoc($rs)){
							echo '<label class="radio-inline"><input type="radio" value="'.$ob['ff_id'].'"> '.$ob['ff_title'].'</label>';
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เงื่อนไขการใช้:</label>
                    <div class="col-sm-9">
                    	<?php
			   			$sql="select * from room_condition_charges
			   			order by id asc";
			   			$rs=mysql_query($sql);
			   			while($ob=mysql_fetch_array($rs)){
							if($ob['id'] == '1'){
								
								if($ob['id'] == '2'){
				   					print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."'> ".$ob[name]." <div id='newCondition'><input type='text' name='condition2' size='60' class='form-control' maxlength='200' required disabled></div></label></div>";
								}else{
									print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."' checked> ".$ob[name]."</label></div>";
								}
							
							}else{
								
								if($ob['id'] == '2'){
				   					print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."'> ".$ob[name]." <div id='newCondition'><input type='text' name='condition2' size='60' class='form-control' maxlength='200' required disabled></div></label></div>";
								}else{
									print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."'> ".$ob[name]."</label></div>";
								}
							
							}
			   			}
			   			?>
                    </div>
                </div>
                
                <div class="form-group">
             		<label class="control-label col-sm-3">รายละเอียดเพิ่มเติม:</label>
                	<div class="col-sm-9">
                    	<textarea name="optionss" cols="60" rows="5" class="form-control forminput2" id="optionss"></textarea>
                    </div>
             	</div>
                
                <div class="form-group">
                	<div class="col-sm-9 col-sm-offset-3">
                    	<input name='Submit' type='submit' id='Submit' value='ส่งข้อมูล' class="btn btn-primary btn-lg">
                        <a href="" class="btn btn-link btn-lg">ย้อนกลับ</a>
                    </div>
                </div>
            </form>
        </div>
        <!--panel-body-->
    </div>
    <!--panel panel-default-->

	<?php
	}else{
		echo '<p>&nbsp;</p>';
		echo '<div class="alert alert-danger"><i class="glyphicon glyphicon-alert"></i> <strong>Access Denied:</strong> ระบบนี้ไม่สามารถเข้าได้จากเครือข่ายภายนอกคณะฯ ได้</div>';
	}
	?>

</div>
<!--container-->
    
<?php include("js-inc.php");?>
<script>
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",// trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>
    
    <script>
		$(document).ready(function() {
			
			$('#form1').bootstrapValidator({
				
				message: 'This value is not valid',
        		feedbackIcons: {
            		valid: 'glyphicon glyphicon-ok',
            		invalid: 'glyphicon glyphicon-remove',
            		validating: 'glyphicon glyphicon-refresh'
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
			
		});
	</script>
</body>