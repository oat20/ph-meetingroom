<?php
#include"../config.php";
#include $livepath."connect/connect.php";
#include $livepath."inc/function.php";

if($editbook == "แก้ไข"){

$id=$_POST["id"];
$startdate=$_POST["startdate"];
$enddate=$_POST["enddate"];
$stime=$_POST["stime"];
$etime=$_POST["etime"];
$room=$_POST["room"];
$dep=$_POST["dep"];
$subject=$_POST["subject"];
$teacher=$_POST["teacher"];
$course=$_POST["course"];
$text3=$_POST["text3"];
$names=$_POST["names"];
$comment=$_POST["comment"];
$subject2=$_POST["subject2"];
	
	$sql="update room_booking set subject='$subject', cid='$room', teacher='$teacher', subject2='$subject2', course='$course', starttime='$stime', endtime='$etime', startdate='$startdate', enddate='$enddate', depid='$dep', another='$comment', amount='$text3', useradd='$names'
	where id='$id'";
	$rs=mysql_query($sql, $link);
	header("location: ".$livesite."booking.php?ID=$id&mode=detail");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>Untitled Document</title>

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
body,td,th {
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
</head>

<body>
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
  <?php
		$sql4="select room_booking.id, room_booking.startdate, room_booking.starttime, room_booking.endtime, room_category.category, room_booking.subject, room_booking.amount, room_booking.teacher, room_booking.course, tb_department.dp_name, room_booking.useradd, room_booking.enddate, room_booking.another, room_booking.subject2, room_booking.cid, room_booking.depid 
		from room_booking, room_category, tb_department
		where room_booking.id='$maxid' and room_booking.cid=room_category.cid and room_booking.depid=tb_department.dp_id";
		$rs4=mysql_query($sql4, $link);
		$ob4=mysql_fetch_array($rs4);
	?>
  <h3>ข้อมูลการจองห้อง</h3>
  
        <form id='form1' name='form1' method='post' action='booking.php?mode=editbook2' onsubmit='return checkvalue()' >
	<table border="0">
	<tr> 
    <td>วันที่จองห้อง</td>
	<td>
	<input type="text" name="startdate" id="sel4" size="20" readonly="true" value="<?php echo $ob4["startdate"]; ?>">
    <input type="reset" value="เลือกวัน" id='button4' onclick="alert('click');" style="font-family:tahoma; font-size:8pt; font-weight:bold; padding-bottom:3px; padding-top:3px">
                      <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>
	
	ถึง
	
	<input type="text" name="enddate" id="sel5" size="20" readonly="true" value="<?php echo $ob4["enddate"]; ?>">
    <input type="reset" value="เลือกวัน" id='button5' onclick="alert('click');" style="font-family:tahoma; font-size:8pt; font-weight:bold; padding-bottom:3px; padding-top:3px">
                      <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel5",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button5",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>  
        </td>
	<!--<td><font color = "blue"><?php #echo $Date; ?></font> </td> --></tr>
	<tr> <!--<td><div align="right">เวลา :</div></td><td><font color = "blue"><?php #echo $T_in; ?>.00 - <?php #echo $T_out; ?>.00 น. </font> </td> -->
	<td>เวลา </td>
    <td>
	<font color = "blue">
    <select name=stime>
		<option value="<?php echo $ob4["starttime"]; ?>"><?php echo $ob4["starttime"]; ?></option>
                                <option value=08.00>08.00</option>
                                <!--<option value=08.15>08.15</option>
                                <option value=08.30>08.30</option>
                                <option value=08.45>08.45</option> -->
                                <option value=09.00>09.00</option>
                                <!--<option value=09.15>09.15</option>
                                <option value=09.30>09.30</option>
                                <option value=09.45>09.45</option> -->
                                <option value=10.00>10.00</option>
                                <!--<option value=10.15>10.15</option>
                                <option value=10.30>10.30</option>
                                <option value=10.45>10.45</option> -->
                                <option value=11.00>11.00</option>
                                <!--<option value=11.15>11.15</option>
                                <option value=11.30>11.30</option>
                                <option value=11.45>11.45</option> -->
                                <option value=12.00>12.00</option>
                                <!--<option value=12.15>12.15</option>
                                <option value=12.30>12.30</option>
                                <option value=12.45>12.45</option> -->
                                <option value=13.00>13.00</option>
                                <!--<option value=13.15>13.15</option>
                                <option value=13.30>13.30</option>
                                <option value=13.45>13.45</option> -->
                                <option value=14.00>14.00</option>
                                <!--<option value=14.15>14.15</option>
                                <option value=14.30>14.30</option>
                                <option value=14.45>14.45</option> -->
                                <option value=15.00>15.00</option>
                                <!--<option value=15.15>15.15</option>
                                <option value=15.30>15.30</option>
                                <option value=15.45>15.45</option> -->
                                <option value=16.00>16.00</option>
                                <!--<option value=16.15>16.15</option>
                                <option value=16.30>16.30</option>
								<option value=16.45>16.45</option> -->
								<option value=17.00>17.00</option>
								<!--<option value=17.15>17.15</option>
								<option value=17.30>17.30</option>
								<option value=17.45>17.45</option> -->
								<option value=18.00>18.00</option>
								<option value=19.00>19.00</option>
								<option value=20.00>20.00</option>
								<option value=21.00>21.00</option>
          </select>
		ถึง
         <select name=etime>
		 	<option value="<?php echo $ob4["endtime"]; ?>"><?php echo $ob4["endtime"]; ?></option>
                                <option value=08.00>08.00</option>
                                <!--<option value=08.15>08.15</option>
                                <option value=08.30>08.30</option>
                                <option value=08.45>08.45</option> -->
                                <option value=09.00>09.00</option>
                                <!--<option value=09.15>09.15</option>
                                <option value=09.30>09.30</option>
                                <option value=09.45>09.45</option> -->
                                <option value=10.00>10.00</option>
                                <!--<option value=10.15>10.15</option>
                                <option value=10.30>10.30</option>
                                <option value=10.45>10.45</option> -->
                                <option value=11.00>11.00</option>
                                <!--<option value=11.15>11.15</option>
                                <option value=11.30>11.30</option>
                                <option value=11.45>11.45</option> -->
                                <option value=12.00>12.00</option>
                                <!--<option value=12.15>12.15</option>
                                <option value=12.30>12.30</option>
                                <option value=12.45>12.45</option> -->
                                <option value=13.00>13.00</option>
                                <!--<option value=13.15>13.15</option>
                                <option value=13.30>13.30</option>
                                <option value=13.45>13.45</option> -->
                                <option value=14.00>14.00</option>
                                <!--<option value=14.15>14.15</option>
                                <option value=14.30>14.30</option>
                                <option value=14.45>14.45</option> -->
                                <option value=15.00>15.00</option>
                                <!--<option value=15.15>15.15</option>
                                <option value=15.30>15.30</option>
                                <option value=15.45>15.45</option> -->
                                <option value=16.00>16.00</option>
                                <!--<option value=16.15>16.15</option>
                                <option value=16.30>16.30</option>
								<option value=16.45>16.45</option> -->
								<option value=17.00>17.00</option>
								<!--<option value=17.15>17.15</option>
								<option value=17.30>17.30</option>
								<option value=17.45>17.45</option> -->
								<option value=18.00>18.00</option>
								<option value=19.00>19.00</option>
								<option value=20.00>20.00</option>
								<option value=21.00>21.00</option>
          </select>
		</font> </td>
	</tr>
	</table> 

    
		 <table border="0">
		   <tr> <td>ห้อง </td>
		     <td>
		   <select name="room" id="room">
		   	<option value="<?php echo $ob4["cid"]; ?>"><?php echo $ob4["category"]; ?></option>
				<?php
					$room_category="select cid, category
					from room_category
					order by cid asc";
					$rs=mysql_query($room_category, $link);
					while($ob=mysql_fetch_array($rs)){
				?>
				<option value="<?php echo $ob["cid"]; ?>"><?php echo $ob["category"]; ?></option>
				<?php
					}
				?>
		   </select></td></tr>
	       <tr>
	         <td>ภาควิชา/หน่วยงานที่จอง</td>
	         <td><select name="dep">
			 	<option value="<?php echo $ob4["depid"]; ?>"><?php echo $ob4["dp_name"]; ?></option>
				<?php
					$tb_department="select dp_id, dp_name
					from tb_department
					order by dp_id asc";
					$rs_tb_department=mysql_query($tb_department, $link);
					while($ob_tb_department=mysql_fetch_array($rs_tb_department)){
				?>
				<option value="<?php echo $ob_tb_department["dp_id"]; ?>"><?php echo $ob_tb_department["dp_name"]; ?></option>
				<?php
					}
				?>
		   </select></td>
           </tr>
	       <tr> <td>หัวข้ออบรม/วิชา</td>
	         <td><input name='subject' type='text' id='subject' size="60" value="<?php echo $ob4["subject"]; ?>"></td></tr>
	       <tr>
	         <td>ผู้สอน</td>
	         <td><label>
	           <input name="teacher" type="text" id="teacher" size="60" value="<?php echo $ob4["teacher"]; ?>">
	         </label></td>
           </tr>
	       <tr>
	         <td>รายวิชา</td>
	         <td><label>
	           <input name="subject2" type="text" id="subject2" size="60" maxlength="255" value="<?php echo $ob4["subject2"]; ?>">
	         </label></td>
           </tr>
	       <tr>
	         <td>หลักสูตร</td>
	         <td><label>
	           <input name="course" type="text" id="course" size="60" value="<?php echo $ob4["course"]; ?>">
	         </label></td>
           </tr>
	       <tr> <td>จำนวนนักศึกษา/ผู้เข้าอบรม</td><td><input type='text' name='text3' id='text3' size='3' value="<?php echo $ob4["amount"]; ?>"> คน <!--(ไม่เกิน : <?php #echo $row[2]; ?> คน) --></td></tr>
	       <tr>
	         <td>ชื่อผู้จอง</td>
	         <td><label>
	           <input name="names" type="text" id="names" size="60" maxlength="255" value="<?php echo $ob4["useradd"]; ?>">
	         </label></td>
           </tr>
	       <tr>
	         <td valign="top">รายละเอียดเพิ่มเติม</td>
	         <td><textarea id="textarea1" name="comment" style="height: 200px; width: 500px">
			 <?php echo $ob4["another"]; ?>
</textarea>
<script language="javascript1.2">
  generate_wysiwyg('textarea1');
</script></td>
           </tr>
	       <tr>
	         <td colspan="2" align="center">
			 <input type="hidden" value="<?php echo $ob4["id"]; ?>" name="id" />
			  <input name='editbook' type='submit' value='แก้ไข' style="font-family:tahoma; font-size:8pt; padding:3px; font-weight:bold" /></td>
	       </tr>
	</table>  
		</form>
  </blockquote>
</body>
</html>
