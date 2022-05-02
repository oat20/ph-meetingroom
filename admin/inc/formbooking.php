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
	#include"file:///C|/www/room/bookingroom/connect/connect.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>

<script language="JavaScript" type="text/javascript" src="file:///C|/www/room/bookingroom/textediter/wysiwyg.js">
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
body,td,th {
	font-family: Courier New, Courier, monospace;
	font-size: 12px;
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
#Layer14 {position:absolute;
	left:1px;
	top:50px;
	width:682px;
	height:158px;
	z-index:12;
}
.style14 {color: #FF0000}
.style20 {font-size: 14px; }
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
  <blockquote>
    <p align="left"><!--<span class="style14">//&#3627;&#3634;&#3585;&#3607;&#3656;&#3634;&#3609;&#3592;&#3629;&#3591;&#3623;&#3633;&#3609;&#3648;&#3623;&#3621;&#3634;&#3607;&#3637;&#3656;&#3607;&#3633;&#3610;&#3585;&#3633;&#3610;&#3612;&#3641;&#3657;&#3651;&#3594;&#3657;&#3607;&#3656;&#3634;&#3609;&#3629;&#3639;&#3656;&#3609;&#3619;&#3632;&#3610;&#3610;&#3592;&#3632;&#3649;&#3626;&#3604;&#3591;&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3586;&#3638;&#3657;&#3609;&#3651;&#3609;&#3605;&#3634;&#3619;&#3634;&#3591;</span> -->
    <!--<table width="729" height="127" border="0" cellpadding="0" cellspacing="1">
      <tr bgcolor="#B2DFFF">
        <td height="27" ><div align="center" class="style20">ชื่อผู้ขอใช้</div></td>
        <td><div align="center" class="style20">สถานะ</div></td>
        <td><div align="center" class="style20">หัวข้อประชุม</div></td>
        <td><div align="center" class="style20">ช่วงเวลาที่ขอ</div></td>
      </tr>
      <tr>
        <td width="212"><br>
 <?
       
	#$count=1;
    #$cmd = "select * from userq where cr_id='$No' and Dater='$Date' and status!='use' and status!='sta'";
	#mysql_query($cmd,$link);
	#$result = mysql_query($cmd,$link);
	#while($row=mysql_fetch_row($result))
	#{
			#echo "<br>$count : $row[3]<BR><BR>";	
			#$count++;
	#}		
	
?>
          </p>
        </td>
        <td width="163"><p><br>
                <?
    

    #$cmd = "select * from userq where cr_id='$No' and Dater='$Date' and status!='use'  and status!='sta'";
	#mysql_query($cmd,$link);
	#$result = mysql_query($cmd,$link);
	#while($row=mysql_fetch_row($result))
	#{
		#echo "<p align='center'><font color = yellow>จอง</font></a>";
	#}		
	
?>
          </p>
      </td>
        <td width="200"><p><br>
                <?
       

    #$cmd = "select * from userq where cr_id='$No' and Dater='$Date' and status!='use'  and status!='sta' ";
	#mysql_query($cmd,$link);
	#$result = mysql_query($cmd,$link);
	#while($row=mysql_fetch_row($result))
	#{
			#echo "<p align='center'>$row[6]</a>";
	#}		
	
?>
          </p>
        </td>
        <td width="126"><p><br>
<?
       

    #$cmd = "select * from userq where cr_id='$No' and Dater='$Date' and status!='use'  and status!='sta'";
	#mysql_query($cmd,$link);
	#$result = mysql_query($cmd,$link);
	#while($row=mysql_fetch_row($result))
	#{
				#$a1=$row[12];//เริ่มต้นเช็คเวลา ให้ a1 = เวลาในเริ่มในดาต้าเบส
				#while($a1<$row[13])//loop ที่ 1
				#{
					#$a2=$T_in;//กำหนดเวลาเริ่ม ที่ user ต้องการดูหห้อง
					#while($a2<$T_out)//loop ที่ 2 ทำงานไปเรื่อยๆ
					#{
						#if($a1==$a2)
						#{
							#$fail=1;break;
						#}
						#$a2++;
					#}
					#$a1++;
				#}//loop 
			#if($fail==1)
			#{
				#echo "<p align='center'><font color = red>$row[12].00 - $row[13].00</a>";
			#}
			#else
			#{
				#echo "<p align='center'><font color = green>$row[12].00 - $row[13].00</a>";
			#}			
	#}		
	
?></td>
      </tr>
    </table> -->
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
}else if(!check_number(document.form1.course.value) ||  (document.form1.course.value)== "" )
{
alert('กรุณาใส่ข้อความให้ครบ');
return false;
}else if(!check_number(document.form1.room.value) ||  (document.form1.room.value)== "0" )
{
alert('กรุณาเลือกห้องอบรม');
return false;
}else if(!check_number(document.form1.dep.value) ||  (document.form1.dep.value)== "0" )
{
alert('กรุณาเลือกหน่วยงานที่จอง');
return false;
}
else{return true;}
}
  </script>
  <h1>ฟอร์มทำการจอง</h1>
  
  <!--<fieldset>
  <legend>กรอกข้อมูลการจองห้อง</legend> -->
      <?
	  if($T=='')
	  {
	  	  ?>
	  <!--<font color='red'><table width="300" border="0">
  <tr bgcolor="#B2DFFF">
    <th scope="row">ลงทะเบียนขอใช้ห้องโปรดกรอกข้อความด้านล่าง : </th>
  </tr>
</table></font> -->
        <form id='form1' name='form1' method='post' action='inc/room/admin4.php' onsubmit='return checkvalue()' >
        <?php
	   	 $cmd = "select * from user,organization 
		 where user.NO='$u'
		 and user.DEPARTMENT_NO=organization.DeID";
		 $result = mysql_query($cmd);
		$row=mysql_fetch_array($result);
		?>
                <fieldset>
        <legend>รายละเอียดการจอง</legend>
	<table border="0">
    <!--<tr> <td><strong>จองในนาม</strong></td><td><input name="" type="text" size="80" maxlength="200" class="forminput2"></td></tr> -->
    <tr>
      <td><strong>ภาควิชา / หน่วยงาน</strong></td>
      <td>
      	<select name="DeID">
		   		<option value="0">- เลือกรายการ -</option>
				<?php
					$sql="select * from organization
					order by DeID asc";
					$rs=mysql_query($room_category);
					while($ob=mysql_fetch_array($rs)){
				?>
				<option value="<?php echo $ob["DeID"]; ?>">- <?php print $ob[Fname]; ?></option>
				<?php
					}
				?>
		   </select>
      </td>
    </tr>
    <tr>
      <td><strong>ผู้จอง</strong></td>
      <td>
      	<select name="u_id">
		   		<option value="0">- เลือกรายการ -</option>
				<?php
					$sql="select * from jos_users
					order by id asc";
					$rs=mysql_query($room_category);
					while($ob=mysql_fetch_array($rs)){
				?>
				<option value="<?php echo $ob["id"]; ?>">- <?php echo $ob["name"]; ?></option>
				<?php
					}
				?>
		   </select>
      </td>
    </tr>
    <tr> <td><strong>ห้อง</strong></td>
		     <td>
		   <select name="room" id="room">
		   		<option value="0">- เลือกรายการ -</option>
				<?php
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
		   </select></td></tr>
	  <tr> 
    <td><strong>วันที่จองห้อง</strong></td>
	<td>
	<input type="text" name="startdate" id="sel4" size="20" readonly="true" value="<?php echo $times; ?>" class="forminput2" /><!--<input type="reset" value="เลือกวัน" id='button4' onclick="alert('click');" style="font-family:tahoma; font-size:8pt; font-weight:bold; padding-bottom:2px; padding-top:2px"> --><input name="" type="image" src="file:///C|/www/room/bookingroom/bookingroom/img/calendar.png" alt="เลือกวัน" width="20" height="20" id='button4' onclick="alert('click');" />
	<script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",// trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>        </td>
	<!--<td><font color = "blue"><?php #echo $Date; ?></font> </td> --></tr>
	<tr> <!--<td><div align="right">เวลา :</div></td><td><font color = "blue"><?php #echo $T_in; ?>.00 - <?php #echo $T_out; ?>.00 น. </font> </td> -->
	<td><strong>เวลา</strong></td>
    <td>
    <select NAME="time_in" id="starthour">
    	<option value="">- - เวลา - -</option>
          <?php
														for($i=00; $i<=18; $i++) 
														{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											echo"<option value=$hm_array[$i]>$hm_array[$i]</option>";
														}
											?>
        </select> <!--<select NAME="startminute" SIZE=1 id="startminute">
          <?php
														#for($i=00; $i<=55; $i+=5) 
														#{
																#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select> -->
		ถึง
         <select NAME="time_out" id="starthour">
         	<option value="">- - เวลา - -</option>
          <?php
														for($i=00; $i<=18; $i++) 
													{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											echo"<option value=$hm_array[$i]>$hm_array[$i]</option>";
														}
											?>
        </select>		</td>
	</tr>
	<!--<tr>
	  <td>&nbsp;</td>
	  <td><label>
	    <input type="checkbox" name="allday" id="checkbox"> ตลอดวัน (ตั้งแต่ 08.30 น. ถึง 16.30 น.) 
	  </label></td>
	  </tr> -->
	</table> 

    
	  <?php
 	     #$cmd = "select * from croom where cr_id=$No";
		 #mysql_query($cmd,$link);
		 #$result = mysql_query($cmd,$link);
		 #$row=mysql_fetch_row($result);
		 ?>
		 <table border="0">
	       <tr> <td valign="top"><strong>หัวข้อ/วัตถุประสงค์</strong></td>
	         <td><textarea name="text2" cols="80" rows="3" class="forminput2" id="text2"></textarea></td></tr>
             <tr>
             	<td><strong>จำนวนผู้ใช้</strong></td>
                <td><input type='text' name='text3' id='text3' size='5' class="forminput2" maxlength="3"> <strong>ท่าน</strong></td>
             </tr>
             <!--<tr>
             	<td valign="top"><strong>อาหารว่าง</strong></td>
                <td>
                <?php
				#$sql="select * from meetingroom_food
				#order by food_id asc";
				#$rs=mysql_query($sql);
				#while($ob=mysql_fetch_array($rs)){
					#print "<input name=food_id[] type=checkbox value=".$ob[food_id]."> ".$ob[food]."&nbsp;&nbsp;";
				#}
				?>
                </td>
             </tr>
             <tr>
             	<td valign="top"><strong>อุปกรณ์โสตฯ</strong></td>
                <td>
                <?php
				#$sql="select * from meetingroom_media
				#order by media_id asc";
				#$rs=mysql_query($sql);
				#while($ob=mysql_fetch_array($rs)){
					#print "<input name=media_id[] type=checkbox value=".$ob[media_id]."> ".$ob[media]."&nbsp;&nbsp;";
				#}
				?>
                </td>
             </tr> -->
	       <tr>
	         <td colspan="2"><input name='Submit' type='submit' id='Submit' value='ทำการจอง' class="buttonsubmit" onClick="return confirm('หมายเหตุ : กรุณาตรวจสอบความถูกต้องในการจองของท่านให้เรียบร้อย เพราะเมื่อท่านทำการยืนยันการจองแล้วจะไม่สามารถกลับมาแก้ไขข้อมูลการจองได้');"> 
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
  </blockquote>
<!--</div> -->
</body>
</html>
