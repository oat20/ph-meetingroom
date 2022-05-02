<script>
function booking() {
	var URL = "bookingroom/booking.php";
	var data = getFormData("form1");
	ajaxLoad("post", URL, data, "display");
}
</script>
<script language="JavaScript" type="text/javascript" src="textediter/wysiwyg.js">
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
<script language="JavaScript" type="text/javascript">
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
    <?
	  if($T=='')
	  {
	  	  ?>
<form id='form1' name='form1' method='post' enctype="multipart/form-data">
	    	<div id="display"></div>
    <legend>ข้อมูลการจอง</legend>
    	<div class="row">
        	<div class="col-sm-6">
            
            	<div class="form-group">
    	<label class="control-label">ห้อง:</label>
        <?php
					$room_category="select *
					from meetingroom_croom
					inner join meetingroom_tableformat on (meetingroom_croom.tf_id = meetingroom_tableformat.tf_id)
					where enable = '1'
					and cr_id = '$_GET[keyID]'";
					$rs=mysql_query($room_category);
					$ob_room = mysql_fetch_assoc($rs);
					echo '<p class="form-control-static"><i class="fa fa-check-circle"></i> '.$ob_room["name"].' ('.$ob_room["tf_title"].') <a href="allrooms.php" class="btn btn-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> เลือกห้องใหม่</a></p>';
				?>
          	</div>
            
            </div>
            
            <div class="col-sm-6">
            
            	<div class="form-group">
                	<label class="control-label">วันที่จองห้อง:</label>
                    <input name="startdate" type="text" class="form-control" id="sel4" value="<?php echo $times; ?>" size="10" maxlength="10" required/>
          			<!--<input name="" type="image" src="bookingroom/img/calendar.png" alt="เลือกวัน" id='button4' onClick="alert('click');" />-->
                </div>
                
            </div>
        </div>
    
    	<table class="table" width="100%">
      		<tbody>
      <tr>
        <td align="right" class="td4"><strong>วันที่ทำรายการ</strong></td>
        <td class="td5"><?=dateThai($today);?></td>
      </tr>
      <tr>
        <td align="right" class="td4"><strong>ห้อง:<span class="regred_10">*</span></strong></td>
        <td class="td5">
        	<div class="form-group">
        <?php
					$room_category="select *
					from meetingroom_croom
					inner join meetingroom_tableformat on (meetingroom_croom.tf_id = meetingroom_tableformat.tf_id)
					where enable = '1'
					and cr_id = '$_GET[keyID]'";
					$rs=mysql_query($room_category);
					$ob_room = mysql_fetch_assoc($rs);
					echo '<p class="form-control-static"><i class="fa fa-check-circle"></i> '.$ob_room["name"].' ('.$ob_room["tf_title"].') <a href="allrooms.php" class="btn btn-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> เลือกห้องใหม่</a></p>';
				?>
          	</div>
          </td>
      </tr>
      <tr>
        <td align="right" class="td4"><strong>วันที่จองห้อง:<span class="regred_10">*</span></strong></td>
        <td class="td5">
             </td>
      </tr>
      
      <tr>
        <td align="right" valign="top" class="td4"><strong>เวลา:<span class="regred_10">*</span></strong></td>
        <td class="td5"><?php //print booTime(); ?>
        	<div class="form-group">
            	<div class="row">
                	<div class="col-sm-3">
                    	<input type="text" id="t1" class="form-control" required placeholder="ตั้งแต่" name="sendTime1" value="<?php echo date("H");?>"/>
                    </div>
                    
                    <div class="col-sm-3">
                    	<input type="text" id="t2" class="form-control" required placeholder="ถึง" name="sendTime1" value="<?php echo date("H")+1;?>"/>
                    </div>
                </div>
            </div>
        </td>
      </tr>
      
      <tr>
        <td align="right" class="td4"><strong>วัตถุประสงค์ในการจอง:<span class="regred_10">*</span></strong></td>
        <td class="td5">
        	<div class="form-group">
            <?php
			$rs = mysql_query("select * from meetingroom_objective where ob_active = '1' and ob_trash = '0' order by ob_id asc");
			while($ob = mysql_fetch_assoc($rs)){
				if($ob["ob_id"] == "1"){
					echo '<div class="radio"><label><input type="radio" value="'.$ob["ob_id"].'" checked> '.$ob["ob_title"].'</label></div>';
				}else{
					echo '<div class="radio"><label><input type="radio" value="'.$ob["ob_id"].'"> '.$ob["ob_title"].'</label></div>';
				}
			}
			?>
            </div>
        </td>
      </tr>
      <tr>
        <td align="right" class="td4"><strong>หัวข้อประชุม หรือชื่อวิชา:<span class="regred_10">*</span></strong></td>
        <td class="td5"><input type="text" class="form-control forminput2" id="optionss" value="" size="60" maxlength="200"></td>
      </tr>
      <tr>
        <td align="right" class="td4"><strong>จำนวนผู้เข้าร่วม:<span class="regred_10">*</span></strong></td>
        <td class="td5">
        	<div class="form-group">
            	<div class="row">
                	<div class="col-sm-3">
            	<select name="text3" class="form-control" required>
                	<?php
					for($i=1;$i<=$ob_room["net"];$i++){
						echo '<option>'.$i.'</option>';
					}
					?>
                </select>
                	</div>
                </div>
            </div>
        </td>
      </tr>
      <tr>
             	<td align="right" class="td4" valign="top"><strong>อาหารว่าง:</strong></td>
                <td class="td5">
                	<div class="form-group">
                <?php
			$sql="select * from meetingroom_snack
			where trash = '0'
				order by food_id asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<label class='checkbox-inline'><input name=food_id[] type=checkbox value=".$ob[food_id]."> ".$ob[food]."</label> ";
				}
				?>
                	</div>                
                    </td>
      </tr>
             <tr>
             	<td align="right" class="td4" valign="top"><strong>อุปกรณ์ที่ต้องการใช้เพิ่มเติม:</strong></td>
                <td class="td5">
                	<div class="form-group">
                <?php
				$sql="select * from meetingroom_media
				where trash = '0'
				order by media_id asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<div class='checkbox'><label><input name=media_id[] type=checkbox value=".$ob[media_id]."> ".$ob[media]."</label></div>";
				}
				?>                
                	</div>
                </td>
             </tr>
             <tr>
               <td align="right" valign="top" class="td4">เงื่อนไขการใช้:<span class="regred_10">*</span></td>
               <td class="td5">
               	<div class="form-group">
               <?php
			   $sql="select * from room_condition_charges
			   order by id asc";
			   $rs=mysql_query($sql);
			   while($ob=mysql_fetch_array($rs)){
				   if($ob["id"] == 1){
				   	print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."' required checked> ".$ob[name]."</label></div>";
				   }else{
					   print "<div class='radio'><label><input name='condition' type='radio' value='".$ob[id]."' required> ".$ob[name]."</label></div>";
				   }
			   }
			   print "<div id='newCondition'><input type='text' name='condition2' size='60' class='form-control' maxlength='200' disabled></div>";
			   ?>
               	</div>
               </td>
             </tr>
             <tr>
             	<td align="right" valign="top" class="td4"><strong>รายละเอียดเพิ่มเติม:</strong></td>
                <td class="td5">
                	<div class="form-group">
                		<textarea name="optionss" cols="60" rows="5" class="form-control" id="optionss"></textarea>
                	</div>
                </td>
             </tr>
             
             <tr>
             	<td class="td4"></td>
        <td class="td5"><input name="form_deid" type="hidden" value="<?php print $form_deid; ?>">
          <input name="action" type="hidden" value="add">
          <input name='Submit' type='button' id='Submit' value='ทำการจอง' class="buttonsubmit" onClick="booking()">
          <!--<input name='Submit' type='submit' id='Submit' value='ทำการจอง' class="buttonsubmit" onClick="return confirm('หมายเหตุ : กรุณาตรวจสอบความถูกต้องในการจองของท่านให้เรียบร้อย เพราะเมื่อท่านทำการยืนยันการจองแล้วจะไม่สามารถกลับมาแก้ไขข้อมูลการจองได้');"> -->
          <input name='Button' type='button' id='Submit' value='ยกเลิก' class="buttonsubmit" onClick="location.href='home.php'"></td>
      </tr>
      <tr>
             	<td class="td4"></td>
        <td class="td5"><span class="regred_10">หมายเหตุ: เครื่องหมาย * จำเป็นต้องกรอก</span></td>
      </tr>
      </tbody>
    </table>
    <hr>
    <legend>ข้อมูลผู้จอง</legend>
    <?php
	$sql5 = mysql_query("select * from jos_users
	where id = '$_SESSION[u]'");
	$ob5 =mysql_fetch_assoc($sql5);
	?>
    <div class="row">
    	<div class="col-sm-6">
        	<div class="form-group">
        		<label class="control-lable">ผู้จอง:</label>
                <input name="" type="text" class="form-control" value="<?php print $ob5[name];?>" required>
            </div>
        </div>
        
        <div class="col-sm-6">
        	<div class="form-group">
        		<label class="control-lable">ส่วนงาน:</label>
                <select name="" class="form-control" required>
                	<?php
					$sql6 = mysql_query("select * from organization order by DeID asc");
					while($ob6 = mysql_fetch_assoc($sql6)){
						if($ob5["DeID"] == $ob6["DeID"]){
							echo '<option value="'.$ob6["DeID"].'" selected>&#8250; '.$ob6["Fname"].'</option>';
						}else{
							echo '<option value="'.$ob6["DeID"].'">&#8250; '.$ob6["Fname"].'</option>';
						}
					}
					?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-sm-6">
        	<div class="form-group">
        		<label class="control-lable">เบอร์ภายใน:</label>
                <input name="" type="text" class="form-control" value="<?php print $ob5[tel];?>" required>
            </div>
        </div>
        
        <!--<div class="col-sm-6">
        	<div class="form-group">
        		<label class="control-lable">อีเมล:</label>
                <input name="email" type="text" class="form-control" required>
            </div>
        </div>-->
    </div>
    
    <input name="form_deid" type="hidden" value="<?php print $form_deid; ?>">
          <input name="action" type="hidden" value="add">
          <input name='Submit' type='button' id='Submit' value='ทำการจอง' class="btn btn-primary btn-block" onClick="booking()">
          <!--<input name='Submit' type='submit' id='Submit' value='ทำการจอง' class="buttonsubmit" onClick="return confirm('หมายเหตุ : กรุณาตรวจสอบความถูกต้องในการจองของท่านให้เรียบร้อย เพราะเมื่อท่านทำการยืนยันการจองแล้วจะไม่สามารถกลับมาแก้ไขข้อมูลการจองได้');"> -->
          <div class="text-right"><input name='Button' type='button' id='Submit' value='ยกเลิก' class="btn btn-link" onClick="location.href='home.php'"></div>
  </form>
  <?php
	   }
	   else
	   {
	?>
  <script language="JavaScript" type="text/javascript">
			alert("คุณไม่สามารถจองหรือใช้ห้องได้ เนื่องจากไม่ได้ Login")
			 </script>
  <?
	 }
?>