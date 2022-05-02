<?php
session_start();

include("bookingroom/config.php");
include("bookingroom/inc/checksession.inc.php");
include("bookingroom/connect/connect.php");
include("bookingroom/inc/function.php");
?>
<!doctype html>
<head>
<?php include("bookingroom/css-inc.php");?>
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
<?php include("bookingroom/navbar-inc.php");?>

<div class="container">

	<?php if($_SESSION['userType'] == 3){ ?>
    
    	<div class="row">
        	<div class="col-sm-12">
    
    			<div class="panel panel-default">
                	<div class="panel-body">
                    	<div class="blog_title2"><a href="3_controlpanel.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> กรอกแบบฟอร์ม</div>
        	<form method="post" class="form-horizontal" id="form1" action="3_bookinginsert_action.php">
            	<!--<div class="form-group">
                	<label class="control-label col-sm-3">ลงวันที่:</label>
                    	<div class="col-sm-4">
                    		<div class="input-group">
                    			<input name="created" type="text" class="form-control" id="created" size="10" maxlength="10" readonly required value="<?php //echo date("Y-m-d"); ?>">
                            	<span class="input-group-btn">
                                	<button class="btn btn-warning" type="button" id="created-btn"><img src="<?php //echo $livesite;?>bookingroom/img/calendar.png"> เลือกวัน</button>
                            	</span>
          					</div>
                    	</div>
                    <script type="text/javascript">
						var cal = new Zapatec.Calendar.setup({
		
							inputField     :    "created",     // id of the input field
							ifFormat       :    "%Y-%m-%d",     // format of the input field
							showsTime      :     false,
							button         :    "created-btn",// trigger button (well, IMG in our case)
							align          :    "Bl"           // alignment (defaults to "Bl")
		
					});
		
					</script>
                </div>-->
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ลงวันที่:</label>
                    <div class="col-sm-9">
                    	<div class="row">
                        	<div class="col-sm-3">
                            	<?php echo form_selectdate("created_d", date("d"));?>
                            </div>
                            
                            <div class="col-sm-3">
                            	<?php echo form_selectmonth("created_m",  date("m"), "th");?>
                            </div>
                            
                            <div class="col-sm-3">
                            	<?php echo form_selectyear3("created_y",  date("Y"), "required");?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ด้วยข้าพเจ้า:</label>
                    <div class="col-sm-9">
                    	<input name="uname" type="text" size="60" maxlength="255" class="form-control" id="uname" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เบอร์ภายใน:</label>
                    <div class="col-sm-9">
                    	<input name="phone" type="text" size="60" maxlength="255" class="form-control" id="uname" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ภาควิชา/งาน:</label>
                    <div class="col-sm-9">
                    	<select name="DeID" class="form-control" id="DeID" required>
                        	<option value="">&#8250; เลือกรายการ</option>
                			<?php
							$sql="select DeID,Fname
							from organization
							where Types != '0'
							order by DeID asc";
							$rs=mysql_query($sql);
							while($ob=mysql_fetch_assoc($rs)){
								print "<option value=".$ob[DeID].">&#8250; ".$ob[Fname]."</option>";
							}
							?>
            			</select>
                    </div>
                </div>
                
                <div class="form-group">
    				<label class="control-label col-sm-3">ห้อง:</label>
                    <div class="col-sm-9">
                    	<select name="cr_id" class="form-control" required>
                        	<option value="">&#8250; เลือกรายการ</option>
        <?php
					$room_category="select *
					from meetingroom_croom
					where enable = '1'
					order by cr_id asc";
					$rs=mysql_query($room_category);
					while($ob_room = mysql_fetch_assoc($rs)){
						echo '<option value="'.$ob_room["cr_id"].'">&#8250; '.$ob_room["name"].' '.$ob_room["cr_number"].' ('.$ob_room["location"].')</option>';
					}
				?>
                	</select>
                </div>
          	</div>
                
                <!--<div class="form-group">
                	<label class="control-label col-sm-3">มีความประสงค์ขอใช้สถานที่ในวันที่:</label>
                    <div class="col-sm-4">
                    	<div class="input-group">
                    		<input name="startdate" type="text" class="form-control" id="sel4" value="<?php //echo date("Y-m-d"); ?>" size="10" maxlength="10" readonly required>
                            <span class="input-group-btn">
                                <button class="btn btn-warning" type="button" id="button4"><img src="<?php //echo $livesite;?>bookingroom/img/calendar.png"> เลือกวัน</button>
                            </span>
          				</div>
                    </div>
                    <script type="text/javascript">
						var cal = new Zapatec.Calendar.setup({
		
							inputField     :    "sel4",     // id of the input field
							ifFormat       :    "%Y-%m-%d",     // format of the input field
							showsTime      :     false,
							button         :    "button4",// trigger button (well, IMG in our case)
							align          :    "Bl"           // alignment (defaults to "Bl")
		
					});
		
					</script>
                </div>-->
                
                <div class="form-group">
                	<label class="control-label col-sm-3">มีความประสงค์ขอใช้สถานที่ในวันที่:</label>
                    <div class="col-sm-9">
                    	<div class="row">
                        	<div class="col-sm-3">
                            	<?php echo form_selectdate("booking_d", date("d"));?>
                            </div>
                            
                            <div class="col-sm-3">
                            	<?php echo form_selectmonth("booking_m",  date("m"), "th");?>
                            </div>
                            
                            <div class="col-sm-3">
                            	<?php echo form_selectyear3("booking_y",  date("Y"), "required");?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เวลา:</label>
                    <div class="col-sm-9">
                        <div class="row">
                			<div class="col-sm-3">
                    			<input type="text" id="t1" class="form-control" required placeholder="ตั้งแต่" name="sendTime1" value="<?php echo date("H");?>"/>
                    		</div>
                    
                    		<div class="col-sm-3">
                    			<input type="text" id="t2" class="form-control" required placeholder="ถึง" name="sendTime2" value="<?php echo date("H")+1;?>"/>
                    		</div>
                		</div>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">วัตถุประสงค์เพื่อ:</label>
                    <div class="col-sm-9">
                    	<?php
						$rs = mysql_query("select * from meetingroom_objective where ob_active = '1' and ob_trash = '0' order by ob_id asc");
						while($ob = mysql_fetch_assoc($rs)){
							if($ob['ob_id'] == '1'){
								echo '<label class="radio-inline"><input type="radio" name="sendObid" checked value="'.$ob["ob_id"].'"> '.$ob['ob_title'].'</label> ';
							}else{
								echo '<label class="radio-inline"><input type="radio" name="sendObid" value="'.$ob["ob_id"].'"> '.$ob['ob_title'].'</label> ';
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
                	<label class="control-label col-sm-3">จำนวนผู้เข้าร่วม:</label>
                    <div class="col-sm-4">
                    	<input type="number" name="detail" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อาหารว่าง:</label>
                    <div class="col-sm-9">
                    	<?php
						$sql="select * from meetingroom_snack
						where trash = '0'
						order by food_id asc";
						$rs=mysql_query($sql);
						while($ob=mysql_fetch_assoc($rs)){
							print "<label class='checkbox-inline'><input name=food_id[] type=checkbox value=".$ob[food_id]."> ".$ob[food]."</label> ";
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<div class="col-sm-5 col-sm-offset-3">
                    	<input type="text" name="uq_snacknote" class="form-control input-sm" placeholder="อื่นๆ ระบุ">
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อุปกรณ์ที่ต้องการใช้เพิ่มเติม:</label>
                    <div class="col-sm-9">
                    	<?php
						$sql6 = mysql_query("select * from meetingroom_croom_media
						where cr_id = '$ob_room[cr_id]'");
						while($ob6 = mysql_fetch_assoc($sql6)){
							$room_media_id[] = $ob6["media_id"];
						}
						
						$sql="select * from meetingroom_media
						where trash = '0'
						order by media_id asc";
						$rs=mysql_query($sql);
						while($ob=mysql_fetch_assoc($rs)){
							if(@in_array($ob["media_id"], $room_media_id)){
								print "<div class='checkbox'><label><input name=media_id[] type=checkbox value=".$ob[media_id]." checked> ".$ob[media]."</label></div>";
							}else{
								print "<div class='checkbox'><label><input name=media_id[] type=checkbox value=".$ob[media_id]."> ".$ob[media]."</label></div>";
							}
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">รูปแบบการจัดโต๊ะ:</label>
                    <div class="col-sm-9">
                    	<?php
						$rs = mysql_query("select * from meetingroom_tableformat where tf_active = '1' and tf_trash = '0' order by tf_id asc");
						while($ob = mysql_fetch_assoc($rs)){
							if($ob["tf_id"] == 4){
								echo '<div class="radio"><label><input type="radio" value="'.$ob['tf_id'].'" name="tf_id" checked required> '.$ob['tf_title'].' <a href="'.$livesite.'bookingroom/img/room/'.$ob['tf_photo'].'" target="new"><i class="glyphicon glyphicon-picture"></i> ตัวอย่าง</a></label></div>';
							}else{
								echo '<div class="radio"><label><input type="radio" value="'.$ob['tf_id'].'" name="tf_id" required> '.$ob['tf_title'].' <a href="'.$livesite.'bookingroom/img/room/'.$ob['tf_photo'].'" target="new"><i class="glyphicon glyphicon-picture"></i> ตัวอย่าง</a></label></div>';
							}
						}
						?>
                    </div>
                </div>
                
                <!--<div class="form-group">
                	<label class="control-label col-sm-3">รูปแบบการจัดอาหาร:</label>
                    <div class="col-sm-9">
                    	<?php
						/*$rs = mysql_query("select * from meetingroom_foodformat where ff_active = '1' and ff_trash = '0' order by ff_id asc");
						while($ob = mysql_fetch_assoc($rs)){
							echo '<label class="radio-inline"><input type="radio" value="'.$ob['ff_id'].'" name="ffID"> '.$ob['ff_title'].'</label>';
						}*/
						?>
                    </div>
                </div>-->
                
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
				   					print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."'> ".$ob[name]." <div id='newCondition'><input type='text' name='condition2' size='60' class='form-control' maxlength='200' required disabled placeholder='ระบุเหตุผล'></div></label></div>";
								}else{
									print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."' checked> ".$ob[name]."</label></div>";
								}
							
							}else{
								
								if($ob['id'] == '2'){
				   					print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."'> ".$ob[name]." <div id='newCondition'><input type='text' name='condition2' size='60' class='form-control' maxlength='200' required disabled placeholder='ระบุเหตุผล'></div></label></div>";
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
                    	<textarea name="optionss" cols="60" rows="3" class="form-control forminput2" id="optionss"></textarea>
                    </div>
             	</div>
                
                <legend>สถานภาพ</legend>
                <div class="form-group">
                	<label class="control-label col-sm-3">รับเรื่อง:</label>
                    <div class="col-sm-9">
                    	<?php
						foreach($cf_status_recive as $k=>$v){
							if($k == 1){
								echo '<label class="radio-inline"><input type="radio" name="status1" value="'.$k.'" required checked> '.$v.'</label> ';
							}else{
								echo '<label class="radio-inline"><input type="radio" name="status1" value="'.$k.'" required> '.$v.'</label> ';
							}
						}
						?>
                    </div>
                </div>
                
                 <div class="form-group">
                	<label class="control-label col-sm-3">เลขาฯ อนุมัติ:</label>
                    <div class="col-sm-9">
                    	<?php
						foreach($cf_msgicon2 as $k=>$v){
							if($k == 2){
								echo '<label class="radio-inline"><input type="radio" name="confirm" value="'.$k.'" required checked> '.$v.'</label> ';
							}else{
								echo '<label class="radio-inline"><input type="radio" name="confirm" value="'.$k.'" required> '.$v.'</label> ';
							}
						}
						?>
                        <div id="comment">
                        	<input type="text" name="comment" class="form-control" placeholder="ระบุเหตุผลไม่อนุมัติ" disabled required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                	<div class="col-sm-9 col-sm-offset-3">
                    	<input name='Submit' type='submit' id='Submit' value='Insert' class="btn btn-primary btn-lg btn-block">
                        <div class="text-right">
                        	<a href="3_controlpanel.php" class="btn btn-link btn-lg"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>
                        </div>
                    </div>
                </div>
            </form>
            			</div>
            		</div>
            	
                </div><!--col-->
            </div><!--row-->
            
            <?php 
			}else{
				include("bookingroom/alert-permission-inc.php"); 
			} 
			?>

</div><!--container-->

<?php include("bookingroom/js-inc.php");?>
<script>
   	$(function() {
    	$('#t1').timepicker({'scrollDefault': 'now', 'step':'5', 'maxTime': '23:59', 'timeFormat': 'H:i', 'minTime':'08:00'});
		$('#t2').timepicker({'scrollDefault': 'now', 'step':'5', 'maxTime': '23:59', 'timeFormat': 'H:i', 'minTime':'08:00'});
    });
  </script>
      
    <script>
		$(document).ready(function() {
			
			$('#form1').bootstrapValidator({
				
				message: 'This value is not valid'
		
			});
			
			// Enable street/city/country validators if user want to ship to other address
    		$('input[name="condition"]').on('change', function() {
        		var bootstrapValidator = $('#form1').data('bootstrapValidator'),
            		shipNewAddress     = ($(this).val() == '2');

        			shipNewAddress ? $('#newCondition').find('.form-control').removeAttr('disabled')
                       : $('#newCondition').find('.form-control').attr('disabled', 'disabled');

        			bootstrapValidator.enableFieldValidators('condition2', shipNewAddress);
    		});
			
			//enable comment
			$('input[name="confirm"]').on('change', function() {
        		var bootstrapValidator = $('#form1').data('bootstrapValidator'),
            		shipNewAddress     = ($(this).val() == '99');

        			shipNewAddress ? $('#comment').find('.form-control').removeAttr('disabled')
                       : $('#comment').find('.form-control').attr('disabled', 'disabled');

        			bootstrapValidator.enableFieldValidators('comment', shipNewAddress);
    		});
			
		});
	</script>
</body>