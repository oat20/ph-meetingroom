<?
	/*if($t==""&&$u=="")
	{			
	?>
   			<script language="JavaScript" type="text/javascript">
			alert("การทำงานไม่ถูกต้อง")
			 </script>
   	 <?
		exit();
	}*/
	#include"connect/connect.php";
?>
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
body, td, th {
	font-family: Courier New, Courier, monospace;
	font-size: 10pt;
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
<!--<div id="Layer1"> -->
<!--<div align="center">
    <br>
    <br>
    <?
    

    #$cmd = "select * from croom where cr_id=$No";
	#mysql_query($cmd,$link);
	#$result = mysql_query($cmd,$link);
	#$row=mysql_fetch_row($result);
	#echo "<font color = blue>$row[1]</font>   ";	

	
?>
    (
    <?
#echo "วันที่ $Date";
?>
    )<br>
  <br>
  </div> -->
    <?
	  if($T=='')
	  {
	  	  ?>
<form id='form1' name='form1' method='post' onsubmit='return checkvalue()'  action="formbooking.php?mode=confirm">
	    	<div id="display"></div>
    <?php
	   	 /*$cmd = "select * from jos_users,organization 
		 where jos_users.id='$u'
		 and jos_users.DeID=organization.DeID";
		 $result = mysql_query($cmd);
		$row=mysql_fetch_array($result);
		$form_deid=$row[DeID];*/
		?>
    <fieldset>
    <legend>1. ข้อมูลผู้จอง</legend>
    <table>
 <tr>
	    <td align="right"><strong>ส่วนงาน:</strong></td>
<td>
        	<select name="DeID" class="forminput2" id="DeID">
            	<option value="0">- เลือกรายการ -</option>
                <?php
				$sql="select DeID,Fname
				from organization
				order by DeID asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<option value=".$ob[DeID].">- ".$ob[Fname]."</option>";
				}
				?>
            </select>        </td>
	    </tr>
	  <tr>
	    <td align="right"><strong>ชื่อผู้จอง:</strong></td>
	    <td><input name="uname" type="text" size="60" maxlength="255" class="forminput2" id="uname"></td>
	    </tr>
	  <tr>
	    <td align="right"><strong>ตำแหน่ง:</strong></td>
	    <td><input name="jobtitle" type="text" size="60" maxlength="255" class="forminput2" id="uname"></td>
      </tr>
	  <tr>
	    <td align="right"><strong>Email:</strong></td>
	    <td><input name="phone" type="text" size="60" maxlength="10" class="forminput2"></td>
	    </tr>    </table>
  </fieldset>
    <br/>
 
    <fieldset>
    <legend>2. รายละเอียดการจอง</legend>
    	<table border="0">
      <?php #if($error_msg != ""){ print "<tr> <td colspan=2><span class=msgalert>".$error_msg."</span></td></tr>"; } 
	#print warning2($error_msg);
	?>
      <!--<tr>
        	<td><strong>จองในนาม<span class="fontred">*</span></strong></td>
            <td>
				<select name="DeID">
                	<option value="">- เลือกรายการ -</option>
					<?php #print select_org("organization"); ?>
            	</select>
            </td>
        </tr> -->
      <tr>
        <td align="right"><strong>ห้อง:<span class="fontred">*</span></strong></td>
        <td><select name="room" id="room" class="forminput2">
        <?php
			if($_GET["cr_id"] != "" & $_GET["name"] != ""){
        		print "<option value=".$_GET['cr_id'].">- ".$_GET["name"]."</option>";
            }else{
            	print '<option value="0">- เลือกรายการ -</option>';
            }
					$room_category="select cr_id, name, net
					from meetingroom_croom
					order by cr_id asc";
					$rs=mysql_query($room_category);
					while($ob=mysql_fetch_array($rs)){
				?>
            <option value="<?php echo $ob["cr_id"]; ?>">- <?php echo $ob["name"]; ?> (ความจุ <?php echo $ob["net"]; ?> ท่าน)</option>
            <?php
					}
				?>
          </select></td>
      </tr>
      <tr>
        <td align="right"><strong>วันที่จองห้อง:<span class="fontred">*</span></strong></td>
        <td><input name="startdate" type="text" class="forminput2" id="sel4" value="<?php echo $times; ?>" size="10" maxlength="10" readonly="true" />
          <!--<input type="reset" value="เลือกวัน" id='button4' onclick="alert('click');" style="font-family:tahoma; font-size:8pt; font-weight:bold; padding-bottom:2px; padding-top:2px"> -->
          <input name="" type="image" src="bookingroom/img/calendar.png" alt="เลือกวัน" id='button4' onclick="alert('click');" />
          <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",// trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>   </td>
        <!--<td><font color = "blue"><?php #echo $Date; ?></font> </td> -->
      </tr>
      
      <tr>
        <!--<td><div align="right">เวลา :</div></td><td><font color = "blue"><?php #echo $T_in; ?>.00 - <?php #echo $T_out; ?>.00 น. </font> </td> -->
        <td align="right" valign="top"><strong>เวลา:<span class="fontred">*</span></strong></td>
        <td><?php print booTime(); ?></td>
      </tr>
      
      <!--<tr>
      	<td><strong>เวลาสิ้นสุด</strong></td>
        <td></td>
      </tr> -->
      <!--<tr>
	  <td>&nbsp;</td>
	  <td><label>
	    <input type="checkbox" name="allday" id="checkbox"> ตลอดวัน (ตั้งแต่ 08.30 น. ถึง 16.30 น.) 
	  </label></td>
	  </tr> -->
    <?php
 	     #$cmd = "select * from croom where cr_id=$No";
		 #mysql_query($cmd,$link);
		 #$result = mysql_query($cmd,$link);
		 #$row=mysql_fetch_row($result);
		 ?>
      <tr>
        <td align="right" valign="top"><strong>วัตถุประสงค์:</strong></td>
        <td><textarea name="optionss" cols="80" rows="5" class="forminput2" id="optionss"></textarea></td>
      </tr>
      <tr>
        <td align="right"><strong>จำนวนผู้เข้าร่วม:</strong></td>
        <td><!--<input type='text' name='text3' id='text3' size='5' class="forminput2" maxlength="3"> -->
          <select name="text3" id="text3" class="forminput2">
            <?php print total_user(); ?>
          </select>
          <strong>ท่าน</strong></td>
      </tr>
      <!--<tr>
             	<td align="right"><strong>อาหารว่าง:</strong></td>
                <td>
                <?php
			$sql="select * from meetingroom_food
				order by food_id asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<input name=food_id[] type=checkbox value=".$ob[food_id]."> ".$ob[food]."&nbsp;&nbsp;";
				}
				?>                </td>
      </tr>
             <tr>
             	<td align="right"><strong>อุปกรณ์โสตฯ:</strong></td>
                <td>
                <?php
				$sql="select * from meetingroom_media
				order by media_id asc";
				$rs=mysql_query($sql);
				while($ob=mysql_fetch_array($rs)){
					print "<input name=media_id[] type=checkbox value=".$ob[media_id]."> ".$ob[media]."&nbsp;&nbsp;";
				}
				?>                </td>
             </tr> -->
             <tr>
             	<td align="right" valign="top"><strong>รายละเอียดเพิ่มเติม:</strong></td>
                <td><textarea name="other" cols="80" rows="5" class="forminput2" id="optionss"></textarea></td>
             </tr>
             <tr>
               <td align="right"><strong>กรอกข้อความในภาพ:</strong></td>
               <td><input type="text" name="capt" size="5" maxlength="5" class="forminput2"></td>
             </tr>
             <tr>
               <td>&nbsp;</td>
               <td><img src="bookingroom/verifyimage/captcha/captcha_img.php"></td>
             </tr>
             <tr>
        <td colspan="2"><input name="form_deid" type="hidden" value="<?php print $form_deid; ?>">
          <input name="action" type="hidden" value="add">
          <input name='Submit' type='button' id='Submit' value='ทำการจอง' class="buttonsubmit" onClick="booking()">
          <!--<input name='Submit' type='submit' id='Submit' value='ทำการจอง' class="buttonsubmit" onClick="return confirm('หมายเหตุ : กรุณาตรวจสอบความถูกต้องในการจองของท่านให้เรียบร้อย เพราะเมื่อท่านทำการยืนยันการจองแล้วจะไม่สามารถกลับมาแก้ไขข้อมูลการจองได้');"> -->
          <input name='Button' type='button' id='Submit' value='ยกเลิก' class="buttonsubmit" onClick="location.href='home.php'"></td>
      </tr>
    </table>
  </fieldset>
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
  <!--</fieldset> -->
<!--</div> -->
