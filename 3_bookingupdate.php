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
                        
                        <?php
						$sql = mysql_query("select *, DATE_FORMAT(meetingroom_userq.created, '%Y-%m-%d') as created, meetingroom_userq.tf_id as tf_id2 
						from meetingroom_userq
						inner join organization on (meetingroom_userq.DeID = organization.DeID)
						inner join meetingroom_croom on (meetingroom_userq.cr_id = meetingroom_croom.cr_id)
						inner join meetingroom_objective on (meetingroom_userq.ob_id = meetingroom_objective.ob_id)
						where meetingroom_userq.uq_id = '$_GET[uq_id]'");
						$ob = mysql_fetch_assoc($sql);
						$condition = explode("/",$ob["book_condition"]);
						$created = explode("-", $ob["created"]);
						$Dater = explode("-", $ob["Dater"]);
						?>
                        
        	<form method="post" class="form-horizontal" id="form1" action="3_bookingupdate_action.php">
            	<!--<div class="form-group">
                	<label class="control-label col-sm-3">ลงวันที่:</label>
                    	<div class="col-sm-4">
                    		<div class="input-group">
                    			<input name="created" type="text" class="form-control" id="created" size="10" maxlength="10" readonly required value="<?php //echo substr($ob["created"],"0","10"); ?>">
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
                            	<?php echo form_selectdate("created_d", trim($created['2']));?>
                            </div>
                            
                            <div class="col-sm-3">
                            	<?php echo form_selectmonth("created_m",  trim($created['1']), "th");?>
                            </div>
                            
                            <div class="col-sm-3">
                            	<?php echo form_selectyear3("created_y",  trim($created['0']), "required");?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ด้วยข้าพเจ้า:</label>
                    <div class="col-sm-9">
                    	<input name="uname" type="text" size="60" maxlength="255" class="form-control" id="uname" required value="<?php echo $ob["uname"];?>">
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เบอร์ภายใน:</label>
                    <div class="col-sm-9">
                    	<input name="phone" type="text" size="60" maxlength="255" class="form-control" id="uname" required value="<?php echo $ob["phone"];?>">
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ภาควิชา/งาน:</label>
                    <div class="col-sm-9">
                    	<select name="DeID" class="form-control" id="DeID" required>
                        	<option value="">&#8250; เลือกรายการ</option>
                			<?php
							$sql2 = "select DeID,Fname
							from organization
							where Types != '0'
							order by DeID asc";
							$rs2 = mysql_query($sql2);
							while($ob2 = mysql_fetch_assoc($rs2)){
								if($ob["DeID"] == $ob2["DeID"]){
									print "<option value=".$ob2[DeID]." selected>&#8250; ".$ob2[Fname]."</option>";
								}else{
									print "<option value=".$ob2[DeID].">&#8250; ".$ob2[Fname]."</option>";
								}
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
					$rs_roomcat=mysql_query($room_category);
					while($ob_room = mysql_fetch_assoc($rs_roomcat)){
						if($ob["cr_id"] == $ob_room["cr_id"]){
							echo '<option value="'.$ob_room["cr_id"].'" selected>&#8250; '.$ob_room["name"].' '.$ob_room["cr_number"].' ('.$ob_room["location"].')</option>';
						}else{
							echo '<option value="'.$ob_room["cr_id"].'">&#8250; '.$ob_room["name"].' '.$ob_room["cr_number"].' ('.$ob_room["location"].')</option>';
						}
					}
				?>
                	</select>
                </div>
          	</div>
                
                <!--<div class="form-group">
                	<label class="control-label col-sm-3">มีความประสงค์ขอใช้สถานที่ในวันที่:</label>
                    <div class="col-sm-4">
                    	<div class="input-group">
                    		<input name="startdate" type="text" class="form-control" id="sel4" value="<?php //echo $ob["Dater"]; ?>" size="10" maxlength="10" readonly required>
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
                            	<?php echo form_selectdate("booking_d", trim($Dater['2']));?>
                            </div>
                            
                            <div class="col-sm-3">
                            	<?php echo form_selectmonth("booking_m",  trim($Dater['1']), "th");?>
                            </div>
                            
                            <div class="col-sm-3">
                            	<?php echo form_selectyear3("booking_y",  trim($Dater['0']), "required");?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เวลา:</label>
                    <div class="col-sm-9">
                        <div class="row">
                			<div class="col-sm-3">
                    			<input type="text" id="t1" class="form-control" required placeholder="ตั้งแต่" name="sendTime1" value="<?php echo $ob["time_in"];?>"/>
                    		</div>
                    
                    		<div class="col-sm-3">
                    			<input type="text" id="t2" class="form-control" required placeholder="ถึง" name="sendTime2" value="<?php echo $ob["time_out"];?>"/>
                    		</div>
                		</div>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">วัตถุประสงค์เพื่อ:</label>
                    <div class="col-sm-9">
                    	<?php
						$rs4 = mysql_query("select * from meetingroom_objective where ob_active = '1' and ob_trash = '0' order by ob_id asc");
						while($ob4 = mysql_fetch_assoc($rs4)){
							if($ob['ob_id'] == $ob4["ob_id"]){
								echo '<label class="radio-inline"><input type="radio" name="sendObid" checked value="'.$ob4["ob_id"].'"> '.$ob4['ob_title'].'</label> ';
							}else{
								echo '<label class="radio-inline"><input type="radio" name="sendObid" value="'.$ob4["ob_id"].'"> '.$ob4['ob_title'].'</label> ';
							}
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">หัวข้อประชุม/ชื่อวิชา:</label>
                    <div class="col-sm-9">
                    	<input name="title" type="text" class="form-control" id="optionss" value="<?php echo $ob["title"];?>" size="60" maxlength="200" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">จำนวนผู้เข้าร่วม:</label>
                    <div class="col-sm-4">
                    	<input type="number" name="detail" class="form-control" required value="<?php echo $ob["detail"];?>">
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อาหารว่าง:</label>
                    <div class="col-sm-9">
                    	<?php
						$sqlSnack2 = mysql_query("select * from meetingroom_snack2
						where uq_id = '$ob[uq_id]'");
						while($obSnack2 = mysql_fetch_assoc($sqlSnack2)){
							$foodID[] = $obSnack2["food_id"];
						}
						
						$sqlSnack="select * from meetingroom_snack
						where trash = '0'
						order by food_id asc";
						$rsSnack=mysql_query($sqlSnack);
						while($obSnack=mysql_fetch_assoc($rsSnack)){
							if(@in_array($obSnack["food_id"], $foodID)){
								print "<label class='checkbox-inline'><input name=food_id[] type=checkbox value=".$obSnack[food_id]." checked> ".$obSnack[food]."</label> ";
							}else{
								print "<label class='checkbox-inline'><input name=food_id[] type=checkbox value=".$obSnack[food_id]."> ".$obSnack[food]."</label> ";
							}
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<div class="col-sm-5 col-sm-offset-3">
                    	<input type="text" name="uq_snacknote" class="form-control input-sm" placeholder="อื่นๆ ระบุ" value="<?php echo $ob['uq_snacknote'];?>">
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อุปกรณ์ที่ต้องการใช้เพิ่มเติม:</label>
                    <div class="col-sm-9">
                    	<?php
						$sql6 = mysql_query("select * from meetingroom_mediarelation
						where uq_id = '$ob[uq_id]'");
						while($ob6 = mysql_fetch_assoc($sql6)){
							$room_media_id[] = $ob6["media_id"];
						}
						
						$sqlMedia="select * from meetingroom_media
						where trash = '0'
						order by media_id asc";
						$rsMedia=mysql_query($sqlMedia);
						while($obMedia=mysql_fetch_assoc($rsMedia)){
							if(@in_array($obMedia["media_id"], $room_media_id)){
								print "<div class='checkbox'><label><input name=media_id[] type=checkbox value=".$obMedia[media_id]." checked> ".$obMedia[media]."</label></div>";
							}else{
								print "<div class='checkbox'><label><input name=media_id[] type=checkbox value=".$obMedia[media_id]."> ".$obMedia[media]."</label></div>";
							}
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">รูปแบบการจัดโต๊ะ:</label>
                    <div class="col-sm-9">
                    	<?php
						$rsTable = mysql_query("select * from meetingroom_tableformat where tf_active = '1' and tf_trash = '0' order by tf_id asc");
						while($obTable = mysql_fetch_assoc($rsTable)){
							if($obTable["tf_id"] == $ob["tf_id2"]){
								echo '<div class="radio"><label><input type="radio" value="'.$obTable['tf_id'].'" name="tf_id" checked required> '.$obTable['tf_title'].' <a href="'.$livesite.'bookingroom/img/room/'.$obTable['tf_photo'].'" target="new"><i class="glyphicon glyphicon-picture"></i> ตัวอย่าง</a></label></div>';
							}else{
								echo '<div class="radio"><label><input type="radio" value="'.$obTable['tf_id'].'" name="tf_id" required> '.$obTable['tf_title'].' <a href="'.$livesite.'bookingroom/img/room/'.$obTable['tf_photo'].'" target="new"><i class="glyphicon glyphicon-picture"></i> ตัวอย่าง</a></label></div>';
							}
						}
						?>
                    </div>
                </div>
                
                <!--<div class="form-group">
                	<label class="control-label col-sm-3">รูปแบบการจัดอาหาร:</label>
                    <div class="col-sm-9">
                    	<?php
						/*$rsFood = mysql_query("select * from meetingroom_foodformat where ff_active = '1' and ff_trash = '0' order by ff_id asc");
						while($obFood = mysql_fetch_assoc($rsFood)){
							if($ob["ff_id"] == $obFood["ff_id"]){
								echo '<label class="radio-inline"><input type="radio" value="'.$obFood['ff_id'].'" name="ffID" checked> '.$obFood['ff_title'].'</label>';
							}else{
								echo '<label class="radio-inline"><input type="radio" value="'.$obFood['ff_id'].'" name="ffID"> '.$obFood['ff_title'].'</label>';
							}
						}*/
						?>
                    </div>
                </div>-->
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เงื่อนไขการใช้:</label>
                    <div class="col-sm-9">
                    	<?php
			   			$sqlCondition="select * from room_condition_charges
			   			order by id asc";
			   			$rsCondition=mysql_query($sqlCondition);
			   			while($obCondition=mysql_fetch_array($rsCondition)){
							if($obCondition['id'] == trim($condition['0'])){
								echo '<div class="radio"><label><input type="radio" name="condition" value="'.$obCondition["id"].'" checked> '.$obCondition["name"].'</label></div>';	
							}else{
								echo '<div class="radio"><label><input type="radio" name="condition" value="'.$obCondition["id"].'"> '.$obCondition["name"].'</label></div>';
							}
			   			}
						//echo "<div id='newCondition'><input type='text' name='condition2' size='60' class='form-control' maxlength='200' required disabled placeholder='ระบุเหตุผลขอยกเว้น' value='".trim($condition['1'])."'></div>";
						echo "<input type='text' name='condition2' size='60' class='form-control' maxlength='200' placeholder='ระบุเหตุผลขอยกเว้น' value='".trim($condition['1'])."'>";
			   			?>
                    </div>
                </div>
                
                <div class="form-group">
             		<label class="control-label col-sm-3">รายละเอียดเพิ่มเติม:</label>
                	<div class="col-sm-9">
                    	<textarea name="optionss" cols="60" rows="3" class="form-control" id="optionss"><?php echo $ob["optionss"];?></textarea>
                    </div>
             	</div>
                
                <legend>สถานภาพ</legend>
                <div class="form-group">
                	<label class="control-label col-sm-3">รับเรื่อง:</label>
                    <div class="col-sm-9">
                    	<?php
						foreach($cf_status_recive as $k=>$v){
							if($k == $ob["status1"]){
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
							if($k == $ob["confirm"]){
								echo '<label class="radio-inline"><input type="radio" name="confirm" value="'.$k.'" required checked> '.$v.'</label> ';
							}else{
								echo '<label class="radio-inline"><input type="radio" name="confirm" value="'.$k.'" required> '.$v.'</label> ';
							}
						}
						?>
                        <!--<div id="comment">
                        	<input type="text" name="comment" class="form-control" placeholder="ระบุเหตุผลไม่อนุมัติ" disabled required value="<?php //echo $ob["comment"];?>">
                        </div>-->
                        <input type="text" name="comment" class="form-control" placeholder="ระบุเหตุผลไม่อนุมัติ" value="<?php echo $ob["comment"];?>">
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ยกเลิกใบจอง:</label>
                    <div class="col-sm-9">
                    	<?php
						foreach($cf_yn2 as $k=>$v){
							if($k == $ob["uq_cancel"]){
								echo '<label class="radio-inline"><input type="radio" name="uq_cancel" value="'.$k.'" checked required> '.$v.'</label> ';
							}else{
								echo '<label class="radio-inline"><input type="radio" name="uq_cancel" value="'.$k.'" required> '.$v.'</label> ';
							}
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<div class="col-sm-9 col-sm-offset-3">
                    	<input type="hidden" name="uq_id" value="<?php echo $ob["uq_id"];?>">
                    	<input name='Submit' type='submit' id='Submit' value='Update' class="btn btn-primary btn-lg btn-block">
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
    		/*$('input[name="condition"]').on('change', function() {
        		var bootstrapValidator = $('#form1').data('bootstrapValidator'),
            		shipNewAddress     = ($(this).val() == '2');

        			shipNewAddress ? $('#newCondition').find('.form-control').removeAttr('disabled')
                       : $('#newCondition').find('.form-control').attr('disabled', 'disabled');

        			bootstrapValidator.enableFieldValidators('condition2', shipNewAddress);
    		});*/
			
			//enable comment
			/*$('input[name="confirm"]').on('change', function() {
        		var bootstrapValidator = $('#form1').data('bootstrapValidator'),
            		shipNewAddress2     = ($(this).val() == '99');

        			shipNewAddress2 ? $('#comment').find('.form-control').removeAttr('disabled')
                       : $('#comment').find('.form-control').attr('disabled', 'disabled');

        			bootstrapValidator.enableFieldValidators('comment', shipNewAddress2);
    		});*/
			
		});
	</script>
</body>