<!doctype html>
<head>
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

	<?php		
		$booking = mysql_query("select * from meetingroom_userq
		inner join organization on (meetingroom_userq.DeID = organization.DeID)
		inner join meetingroom_croom on (meetingroom_userq.cr_id = meetingroom_croom.cr_id)
		inner join meetingroom_objective on (meetingroom_userq.ob_id = meetingroom_objective.ob_id)
		where meetingroom_userq.uq_id = '$_GET[uq_id]'");
		$booking2 = mysql_fetch_assoc($booking);
		$condition = explode("/",$booking2["book_condition"]);
		$dater = explode("-",$booking2["Dater"]);
	?>
    
        	<form method="post" class="form-horizontal" id="form1" action="bookingroom/1_booking_update2.php">
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
                    	<input name="uname" type="text" size="60" maxlength="255" class="form-control" id="uname" value="<?php echo $booking2["uname"];?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เบอร์ภายใน: <span class="regred_8">(จำเป็นต้องกรอก)</span>:</label>
                    <div class="col-sm-9">
                    	<input name="tel" type="text" size="60" maxlength="255" class="form-control" id="uname" value="<?php echo $booking2["phone"];?>" required>
                    </div>
                </div>
                
                <!--<div class="form-group">
                	<label class="control-label col-sm-3">อีเมล <span class="regred_8">(จำเป็นต้องกรอก)</span>:</label>
                    <div class="col-sm-9">
                    	<input name="sendEmail" type="email" size="60" maxlength="10" class="form-control forminput2" required>
                        <span class="help-block">ต้องใช้อีเมลของทางมหาวิทยาลัยฯ (@mahidol.ac.th)</span>
                    </div>
                </div>-->
                
                <div class="form-group">
                	<label class="control-label col-sm-3">ภาควิชา/งาน <span class="regred_8">(จำเป็นต้องกรอก)</span>:</label>
                    <div class="col-sm-9">
                    	<select name="DeID" class="form-control" id="DeID" required>
                			<?php
							$sql="select DeID,Fname
							from organization
							where Types != '0'
							order by DeID asc";
							$rs=mysql_query($sql);
							while($ob=mysql_fetch_assoc($rs)){
								if($booking2["DeID"] == $ob["DeID"]){
									print "<option value=".$ob[DeID]." selected>&#8250; ".$ob[Fname]."</option>";
								}else{
									print "<option value=".$ob[DeID].">&#8250; ".$ob[Fname]."</option>";
								}
							}
							?>
            			</select>
                    </div>
                </div>
                
                <div class="form-group">
    				<label class="control-label col-sm-3">ห้อง:</label>
                    <div class="col-sm-9">
        <?php
					$room_category="select *
					from meetingroom_croom
					inner join meetingroom_tableformat on (meetingroom_croom.tf_id = meetingroom_tableformat.tf_id)
					where enable = '1'";
					$rs=mysql_query($room_category);
					while($ob_room = mysql_fetch_assoc($rs)){
						if($ob_room["cr_id"] == $booking2["cr_id"]){
							echo '<div class="radio"><label><input type="radio" name="cr_id" value="'.$ob_room["cr_id"].'" checked required> '.$ob_room["name"].' '.$ob_room["cr_number"].' ('.$ob_room["tf_title"].')</label></div>';
						}else{
							echo '<div class="radio"><label><input type="radio" name="cr_id" value="'.$ob_room["cr_id"].'" required> '.$ob_room["name"].' '.$ob_room["cr_number"].' ('.$ob_room["tf_title"].')</label></div>';
						}
					}
				?>
                </div>
          	</div>
                
                <!--<div class="form-group">
                	<label class="control-label col-sm-3">มีความประสงค์ขอใช้สถานที่ในวันที่:</label>
                    <div class="col-sm-4">
                    	<div class="input-group">
                    		<input name="startdate" type="text" class="form-control" id="sel4" value="<?php //echo $booking2["Dater"]; ?>" size="10" maxlength="10" readonly required>
                            <span class="input-group-btn">
                                <button class="btn btn-warning" type="button" id="button4"><img src="<?php //echo $livesite;?>bookingroom/img/calendar.png"> เลือกวัน</button>
                            </span>
          				</div>
                        <span class="help-block">ต้องจองล่วงหน้าอย่างน้อย 3 วันทำการ</span>
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
                        	<div class="col-sm-4">
                            	<?php echo form_selectdate("booking_d", trim($dater['2']));?>
                            </div>
                            
                            <div class="col-sm-4">
                            	<?php echo form_selectmonth("booking_m", trim($dater['1']), "th");?>
                            </div>
                            
                            <div class="col-sm-4">
                            	<?php echo form_selectyear3("booking_y", trim($dater['0']), "required");?>
                            </div>
                        </div>
                        <span class="help-block">ต้องจองล่วงหน้าอย่างน้อย 3 วันทำการ</span>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">เวลา:</label>
                    <div class="col-sm-9">
                    	<?php
						/*$sql = "select * from room_time 
						where trash = '0'
						order by tim_id asc";
						$rs = mysql_query($sql);
						while($ob = mysql_fetch_assoc($rs)){
							if($ob['tim_id'] == '3'){
								print "<div class='radio'><label><input name=booTime type=radio value=".$ob[tim_id]." id=booTime checked> ".$ob[name]." (".$ob[start]." น. - ".$ob[end]." น.)</label></div>";
							}else{
								print "<div class='radio'><label><input name=booTime type=radio value=".$ob[tim_id]." id=booTime> ".$ob[name]." (".$ob[start]." น. - ".$ob[end]." น.)</label></div>";
							}
						}*/
						?>
                        <div class="row">
                			<div class="col-sm-3">
                    			<input type="text" id="t1" class="form-control" required placeholder="ตั้งแต่" name="sendTime1" value="<?php echo $booking2["time_in"];?>"/>
                    		</div>
                    
                    		<div class="col-sm-3">
                    			<input type="text" id="t2" class="form-control" required placeholder="ถึง" name="sendTime2" value="<?php echo $booking2["time_out"];?>"/>
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
							if($ob['ob_id'] == $booking2["ob_id"]){
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
                    	<input name="title" type="text" class="form-control forminput2" id="optionss" value="<?php echo $booking2["title"];?>" size="60" maxlength="200" required>
                    </div>
                </div>
                
                 <div class="form-group">
                	<label class="control-label col-sm-3">รายละเอียดผู้จัด / เจ้าของงาน:</label>
                    <div class="col-sm-9">
                    	<textarea name="uq_owner" class="form-control" rows="3" required><?php echo $booking2['uq_owner'];?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">จำนวนผู้เข้าร่วม:</label>
                    <div class="col-sm-4">
                    	<input type="number" name="detail" value="<?php echo $booking2["detail"];?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อาหารว่าง:</label>
                    <div class="col-sm-9">
                    	<?php
						$snack2 = mysql_query("select * from meetingroom_snack2
						where uq_id = '$booking2[uq_id]'");
						while($snack2_2 = mysql_fetch_assoc($snack2)){
							$food_id[] = $snack2_2["food_id"];
						}
						
						$sql="select * from meetingroom_snack
						where trash = '0'
						order by food_id asc";
						$rs=mysql_query($sql);
						while($ob=mysql_fetch_assoc($rs)){
							if(@in_array($ob["food_id"], $food_id)){
								print "<label class='checkbox-inline'><input name=food_id[] type=checkbox value=".$ob[food_id]." checked> ".$ob[food]."</label> ";
							}else{
								print "<label class='checkbox-inline'><input name=food_id[] type=checkbox value=".$ob[food_id]."> ".$ob[food]."</label> ";
							}
						}
						?>
                    </div>
                </div>
                
                <div class="form-group">
                	<div class="col-sm-5 col-sm-offset-3">
                    	<input type="text" name="uq_snacknote" class="form-control input-sm" placeholder="อื่นๆ ระบุ" value="<?php echo $booking2['uq_snacknote'];?>">
                    </div>
                </div>
                
                <div class="form-group">
                	<label class="control-label col-sm-3">อุปกรณ์ที่ต้องการใช้เพิ่มเติม:</label>
                    <div class="col-sm-9">
                    	<?php
						$sql6 = mysql_query("select * from meetingroom_mediarelation
						where uq_id = '$booking2[uq_id]'");
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
						$rsTable = mysql_query("select * from meetingroom_tableformat where tf_active = '1' and tf_trash = '0' order by tf_id asc");
						while($obTable = mysql_fetch_assoc($rsTable)){
							if($obTable["tf_id"] == $booking2["tf_id"]){
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
						/*$rs = mysql_query("select * from meetingroom_foodformat where ff_active = '1' and ff_trash = '0' order by ff_id asc");
						while($ob = mysql_fetch_assoc($rs)){
							if($ob["ff_id"] == $booking2["ff_id"]){
								echo '<label class="radio-inline"><input type="radio" value="'.$ob['ff_id'].'" name="ffID" checked> '.$ob['ff_title'].'</label>';
							}else{
								echo '<label class="radio-inline"><input type="radio" value="'.$ob['ff_id'].'" name="ffID"> '.$ob['ff_title'].'</label>';
							}
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
							if($ob['id'] == trim($condition["0"])){						
								print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."' checked> ".$ob[name]."</label></div>";
							}else{
								print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."'> ".$ob[name]."</label></div>";
							}								
			   			}
						echo "<div id='newCondition'><input type='text' name='condition2' size='60' class='form-control' maxlength='200' required disabled placeholder='ระบุเหตุผล'></div>";
			   			?>
                    </div>
                </div>
                
                <div class="form-group">
             		<label class="control-label col-sm-3">รายละเอียดเพิ่มเติม:</label>
                	<div class="col-sm-9">
                    	<input type="text" name="optionss" value="<?php echo $booking2["optionss"];?>" class="form-control">
                    </div>
             	</div>
                
                <div class="form-group">
                	<div class="col-sm-9 col-sm-offset-3">
                    	<input type="hidden" name="uq_id" value="<?php echo $booking2["uq_id"];?>">
                        
                    	<input name='Submit' type='submit' id='Submit' value='Update' class="btn btn-primary btn-lg">
                        <a href="<?php echo $_SERVER['PHP_SELF'];?>?mode=confirm&uq_id=<?php echo $booking2["uq_id"];?>" class="btn btn-link btn-lg"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>
                    </div>
                </div>
            </form>
</body>