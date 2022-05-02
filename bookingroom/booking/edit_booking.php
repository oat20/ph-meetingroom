<?php
#include"../config.php";
#include $livepath."connect/connect.php";
#include $livepath."inc/function.php";

$editbook=$_REQUEST[editbook];

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
	header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
		$sql4="select *,meetingroom_croom.name as a 
		from meetingroom_userq,meetingroom_croom,jos_users,organization
		where meetingroom_userq.uq_id='$keyuq_id'
		and meetingroom_userq.u_id=jos_users.id
		and meetingroom_userq.cr_id=meetingroom_croom.cr_id
		and jos_users.DeID=organization.DeID";
		$rs4=mysql_query($sql4);
		$ob4=mysql_fetch_array($rs4);
		
		if($ob4["status1"] != 1 or $today < $ob4["Dater"]){
	?>
        <form id='form1' name='form1' method='post' action='formbooking.php?mode=edit' onsubmit='return checkvalue()' >
                        <fieldset>
        	<legend>รายละเอียดห้อง</legend>
            <table width="100%">
            	<tr>
	         <td>สถานะการจอง</td>
	         <td>
             	<?php
				$sql_status="select * from book_status
				order by sta_id asc";
				$rs_status=mysql_query($sql_status);
				while($ob_status=mysql_fetch_array($rs_status)){
					if($ob4["status1"]==$ob_status["sta_id"]){
             			print "<input type='radio' name='sta_id' id='radio' value='".$ob_status["sta_id"]."' readonly> ".$ob_status["sta"]." ";
					}else{
						print "<input type='radio' name='sta_id' id='radio' value='".$ob_status["sta_id"]."'> ".$ob_status["sta"]." ";
					}
				}
				?>
             </td>
         </tr>
    <tr> <td><strong>ห้อง<span class="fontred">*</span></strong> </td>
		     <td>
		   <select name="room" id="room">
		   	<option value="<?php echo $ob4["cr_id"]; ?>"><?php echo $ob4["a"]; ?></option>
				<?php
					$room_category="select cr_id,name
					from meetingroom_croom
					order by cr_id asc";
					$rs=mysql_query($room_category);
					while($ob=mysql_fetch_array($rs)){
				?>
				<option value="<?php echo $ob["cr_id"]; ?>"><?php echo $ob["name"]; ?></option>
				<?php
					}
				?>
		   </select></td></tr>
      <!--<tr>
      	<td><strong>โทร.</strong></td>
        <td><?php #print $ob4["tel"]; ?></td>
      </tr> -->
		</table>
        </fieldset>
        <br/>

        <fieldset>
        <legend>รายละเอียดการจอง</legend>
	<table width="100%" border="0">
        <?php if($error_msg != ""){ print "<tr> <td colspan=2><span class=msgalert>".$error_msg."</span></td></tr>"; } ?>
        <tr>
      <td><strong>วันที่ทำรายการ</strong></td>
      <td><?php print dateThai($ob4[created]); ?> </td>
    </tr>
    <tr>
	    <td><strong>ผู้จอง</strong></td>
	    <td><?php print $ob4["name"]; ?></td>
      </tr>
      <tr>
      	<td><strong>ส่วนงาน</strong></td>
        <td><?php print $ob4["Fname"]; ?></td>
      </tr>
	<tr> 
    <td><strong>วันที่ใช้ห้อง<span class="fontred">*</span></strong></td>
	<td>
	<input type="text" name="startdate" id="sel4" size="20" readonly="true" value="<?php echo $ob4["Dater"]; ?>">
    <input type="reset" value="เลือกวัน" id='button4' onclick="alert('click');" style="font-family:tahoma; font-size:8pt; font-weight:bold; padding-bottom:3px; padding-top:3px">
                      <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>        </td>
	<!--<td><font color = "blue"><?php #echo $Date; ?></font> </td> --></tr>
	<tr> <!--<td><div align="right">เวลา :</div></td><td><font color = "blue"><?php #echo $T_in; ?>.00 - <?php #echo $T_out; ?>.00 น. </font> </td> -->
	<td><strong>เวลา<span class="fontred">*</span></strong> </td>
    <td>
    	<?php
		$query_time="select * from room_time";
		$rs_time=mysql_query($query_time);
		while($ob_time=mysql_fetch_array($rs_time)){
			if($ob4["time_in"]==$ob_time["tim_id"]){
				print "<input name='bootime' type='radio' value='".$ob_time["tim_id"]."' checked> ".$ob_time["name"]." (".$ob_time["start"]." น. - ".$ob_time["end"]." น.)<br/>";
			}else{
				print "<input name='bootime' type='radio' value='".$ob_time["tim_id"]."'> ".$ob_time["name"]." (".$ob_time["start"]." น. - ".$ob_time["end"]." น.)<br/>";
			}
		}
		?>
    </td>
	</tr>		   
	       <tr> <td valign="top"><strong>วัตถุประสงค์ในการจอง<span class="fontred">*</span></strong></td>
	         <td><textarea name="text2" cols="100" rows="5" id="title"><?php echo $ob4["title"]; ?></textarea></td></tr>
	       <tr> <td><strong>จำนวนผู้ใช้</strong></td><td><input type='text' name='text3' id='text3' size='5' maxlength="4" value="<?php echo $ob4["detail"]; ?>"> ท่าน <!--(ไม่เกิน : <?php #echo $row[2]; ?> คน) --></td></tr>
	       <tr>
	         <td>อาหารว่าง</td>
             <td>
             	<?php
				$sql="select * from meetingroom_food
				left join meetingroom_foodrelation on (meetingroom_food.food_id=meetingroom_foodrelation.fooe_id)
				where meetingroom_foodrelarion.iq_id='$keyuq_id'
				order by meetingroom_food.food_id asc";
				?>
             </td>
	       </tr>
	       <tr>
	         <td>อุปกรณ์โสตฯ</td>
             <td>&nbsp;</td>
	       </tr>
           <tr> 
           	<td valign="top"><strong>รายละเอียดเพิ่มเติม<span class="fontred">*</span></strong></td>
	         <td><textarea name="text2" cols="100" rows="5" id="title"><?php echo $ob4["title"]; ?></textarea></td>
             </tr>
	       <!--<tr>
	         <td>สถานภาพ</td>
             <td>
             <input name="public" type="radio" value="1">ใช้งาน
             <input name="cancel" type="radio" value="0">ยกเลิก
             </td>
	       </tr> -->
	       <tr>
	         <td colspan="2">
			 <input type="hidden" value="<?php echo $ob4["uq_id"]; ?>" name="keyuq_id" />
             <input name="action" type="hidden" value="edit">
			 <!--<input name='Button' type='button' id='Submit' value='ยืนยันการจอง' class="buttonsubmit" onClick="location.href='index.php'"> --> 
			 <?php
			 #if($ob4[Dater] > $today){
			 ?>
             <!--<input name='editbook' type='submit' value='แก้ไขการจอง' class="buttonsubmit"> --><input name='cancel' type='submit' value='ยกเลิกการจอง' class="buttonsubmit" onClick="return confirm('ยืนยันการยกเลิกการจอง');">
             <?php #} ?>
             </td>
	       </tr>
	</table>
    </fieldset>  
		</form>
        <?php
		}
		else
		{
			echo"<script language='JavaScript'>";
			echo"alert('! ไม่สามารถทำการแก้ไขได้ เนื่องจากผู้ดูแลระบบอนุมัติรายการแล้ว หรือเลยวันที่ใช้ห้องแล้ว');";
			echo"window.location='home.php';";
			echo"</script>";
		}
		?>
</body>
</html>
