<?
	/*if($t==""&&$u=="")
	{			
	?>
   			<script language="JavaScript" type="text/javascript">
			alert("��÷ӧҹ���١��ͧ")
			 </script>
   	 <?
		exit();
	}*/
	#include"connect/connect.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>Untitled Document</title>


<script type="text/javascript"><!--
var gFiles = 0;
function addFile() {
var li = document.createElement('li');
li.setAttribute('id', 'file-' + gFiles);
li.innerHTML = '<input type="text" name="program[]" size="60" maxlength="50"><span onclick="removeFile(\'file-' + gFiles + '\')" style="cursor:pointer;">����͡</span>';
document.getElementById('files-root').appendChild(li);
gFiles++;
}
function removeFile(aId) {
var obj = document.getElementById(aId);
obj.parentNode.removeChild(obj);
}
--></script>

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
#echo "�ѹ��� $Date";
?>
    )<br>
  <br>
  </div> -->
  <blockquote>
    <p align="left"><!--<span class="style14">//&#3627;&#3634;&#3585;&#3607;&#3656;&#3634;&#3609;&#3592;&#3629;&#3591;&#3623;&#3633;&#3609;&#3648;&#3623;&#3621;&#3634;&#3607;&#3637;&#3656;&#3607;&#3633;&#3610;&#3585;&#3633;&#3610;&#3612;&#3641;&#3657;&#3651;&#3594;&#3657;&#3607;&#3656;&#3634;&#3609;&#3629;&#3639;&#3656;&#3609;&#3619;&#3632;&#3610;&#3610;&#3592;&#3632;&#3649;&#3626;&#3604;&#3591;&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3586;&#3638;&#3657;&#3609;&#3651;&#3609;&#3605;&#3634;&#3619;&#3634;&#3591;</span> -->
    <!--<table width="729" height="127" border="0" cellpadding="0" cellspacing="1">
      <tr bgcolor="#B2DFFF">
        <td height="27" ><div align="center" class="style20">���ͼ�����</div></td>
        <td><div align="center" class="style20">ʶҹ�</div></td>
        <td><div align="center" class="style20">��Ǣ�ͻ�Ъ��</div></td>
        <td><div align="center" class="style20">��ǧ���ҷ���</div></td>
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
		#echo "<p align='center'><font color = yellow>�ͧ</font></a>";
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
				#$a1=$row[12];//������������� ��� a1 = ����������㹴ҵ����
				#while($a1<$row[13])//loop ��� 1
				#{
					#$a2=$T_in;//��˹���������� ��� user ��ͧ��ô����ͧ
					#while($a2<$T_out)//loop ��� 2 �ӧҹ��������
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
alert('��س���������Ţ���Ѿ�����١��ͧ');
return false;
}else if(!check_number(document.form1.teaher.value) ||  (document.form1.teacher.value)== "" )
{
alert('��س�����ͤ������ú');
return false;
}else if(!check_number(document.form1.text2.value) ||  (document.form1.text2.value)== "" )
{
alert('��س�����ͤ������ú');
return false;
}else if(!check_number(document.form1.text3.value) ||  (document.form1.text3.value)== "" )
{
alert('��س�����ͤ������ú');
return false;
}else if(!check_number(document.form1.course.value) ||  (document.form1.course.value)== "" )
{
alert('��س�����ͤ������ú');
return false;
}else if(!check_number(document.form1.room.value) ||  (document.form1.room.value)== "0" )
{
alert('��س����͡��ͧͺ��');
return false;
}else if(!check_number(document.form1.dep.value) ||  (document.form1.dep.value)== "0" )
{
alert('��س����͡˹��§ҹ���ͧ');
return false;
}
else{return true;}
}
  </script>
  <h3>��͡�����š�èͧ��ͧ</h3>
  
  <!--<fieldset>
  <legend>��͡�����š�èͧ��ͧ</legend> -->
      <?
	  if($T=='')
	  {
	  	  ?>
	  <!--<font color='red'><table width="300" border="0">
  <tr bgcolor="#B2DFFF">
    <th scope="row">ŧ����¹������ͧ�ô��͡��ͤ�����ҹ��ҧ : </th>
  </tr>
</table></font> -->
<?php
	   	 #$cmd = "select * from user where username='$u'";
		 #mysql_query($cmd,$link);
		 #$result = mysql_query($cmd,$link);
		#$row=mysql_fetch_row($result);
		?>
        <form id='form1' name='form1' method='post' action='booking/insert_booking.php' onsubmit='return checkvalue()' >
	<table border="0"><!--<tr> <td><div align="right">���ͼ�������ͧ :</div></td><td><font color = "blue"><?php #echo $row[3]; ?></font></td></tr> -->
	<tr> 
    <td>�ѹ���ͧ��ͧ </td>
	<td>
	<input type="text" name="startdate" id="sel4" size="20" readonly="true" value="<?php echo $times; ?>">
    <input type="reset" value="���͡�ѹ" id='button4' onclick="alert('click');" style="font-family:tahoma; font-size:8pt; font-weight:bold; padding-bottom:3px; padding-top:3px">
                      <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel4",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button4",  // trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		
	</script>
	
	�֧
	
	<input type="text" name="endtdate" id="sel5" size="20" readonly="true">
    <input type="reset" value="���͡�ѹ" id='button5' onclick="alert('click');" style="font-family:tahoma; font-size:8pt; font-weight:bold; padding-bottom:3px; padding-top:3px">
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
	<tr> <!--<td><div align="right">���� :</div></td><td><font color = "blue"><?php #echo $T_in; ?>.00 - <?php #echo $T_out; ?>.00 �. </font> </td> -->
	<td>���� </td>
    <td>
	<font color = "blue">
    <select name=stime>
                                <option value=08.00>08.00</option>
                                <option value=08.15>08.15</option>
                                <option value=08.30 selected>08.30</option>
                                <option value=08.45>08.45</option>
                                <option value=09.00>09.00</option>
                                <option value=09.15>09.15</option>
                                <option value=09.30>09.30</option>
                                <option value=09.45>09.45</option>
                                <option value=10.00>10.00</option>
                                <option value=10.15>10.15</option>
                                <option value=10.30>10.30</option>
                                <option value=10.45>10.45</option>
                                <option value=11.00>11.00</option>
                                <option value=11.15>11.15</option>
                                <option value=11.30>11.30</option>
                                <option value=11.45>11.45</option>
                                <option value=12.00>12.00</option>
                                <option value=12.15>12.15</option>
                                <option value=12.30>12.30</option>
                                <option value=12.45>12.45</option>
                                <option value=13.00>13.00</option>
                                <option value=13.15>13.15</option>
                                <option value=13.30>13.30</option>
                                <option value=13.45>13.45</option>
                                <option value=14.00>14.00</option>
                                <option value=14.15>14.15</option>
                                <option value=14.30>14.30</option>
                                <option value=14.45>14.45</option>
                                <option value=15.00>15.00</option>
                                <option value=15.15>15.15</option>
                                <option value=15.30>15.30</option>
                                <option value=15.45>15.45</option>
                                <option value=16.00>16.00</option>
                                <option value=16.15>16.15</option>
                                <option value=16.30>16.30</option>
								<option value=16.45>16.45</option>
								<option value=17.00>17.00</option>
								<option value=17.15>17.15</option>
								<option value=17.30>17.30</option>
								<option value=17.45>17.45</option>
								<option value=18.00>18.00</option>
          </select>
    <!--<select NAME="starthour" SIZE=1 id="starthour">
          <?php
														#for($i=00; $i<=23; $i++) 
														#{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select> --> <!--<select NAME="startminute" SIZE=1 id="startminute">
          <?php
														#for($i=00; $i<=55; $i+=5) 
														#{
																#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select> -->
		�֧
         <select name=etime>
                                <option value=08.00 selected>08.00</option>
                                <option value=08.15>08.15</option>
                                <option value=08.30>08.30</option>
                                <option value=08.45>08.45</option>
                                <option value=09.00>09.00</option>
                                <option value=09.15>09.15</option>
                                <option value=09.30>09.30</option>
                                <option value=09.45>09.45</option>
                                <option value=10.00>10.00</option>
                                <option value=10.15>10.15</option>
                                <option value=10.30>10.30</option>
                                <option value=10.45>10.45</option>
                                <option value=11.00>11.00</option>
                                <option value=11.15>11.15</option>
                                <option value=11.30>11.30</option>
                                <option value=11.45>11.45</option>
                                <option value=12.00>12.00</option>
                                <option value=12.15>12.15</option>
                                <option value=12.30>12.30</option>
                                <option value=12.45>12.45</option>
                                <option value=13.00>13.00</option>
                                <option value=13.15>13.15</option>
                                <option value=13.30>13.30</option>
                                <option value=13.45>13.45</option>
                                <option value=14.00>14.00</option>
                                <option value=14.15>14.15</option>
                                <option value=14.30>14.30</option>
                                <option value=14.45>14.45</option>
                                <option value=15.00>15.00</option>
                                <option value=15.15>15.15</option>
                                <option value=15.30>15.30</option>
                                <option value=15.45>15.45</option>
                                <option value=16.00>16.00</option>
                                <option value=16.15>16.15</option>
                                <option value=16.30 selected="selected">16.30</option>
								<option value=16.45>16.45</option>
								<option value=17.00>17.00</option>
								<option value=17.15>17.15</option>
								<option value=17.30>17.30</option>
								<option value=17.45>17.45</option>
								<option value=18.00>18.00</option>
          </select>
		<!--<select NAME="starthour" SIZE=1 id="starthour">
          <?php
														#for($i=00; $i<=23; $i++) 
														#{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select> --> <!--<select NAME="startminute" SIZE=1 id="startminute">
          <?php
														#for($i=00; $i<=55; $i+=5) 
														#{
																#$i = sprintf("%02d",$i);
                      											#echo"<option value=$i>$i</option>";
														#}
											?>
        </select> -->
		</font> </td>
	</tr>
	<!--<tr>
	  <td>&nbsp;</td>
	  <td><label>
	    <input type="checkbox" name="allday" id="checkbox"> ��ʹ�ѹ (����� 08.30 �. �֧ 16.30 �.) 
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
		   <tr> <td>��ͧ </td>
		     <td>
		   <select name="room" id="room">
		   		<option value="0">- ���͡��¡�� -</option>
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
	         <td>�Ҥ�Ԫ�/˹��§ҹ���ͧ</td>
	         <td><select name="dep">
		   		<option value="0">- ���͡��¡�� -</option>
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
	       <tr> <td>��Ǣ��ͺ��/�Ԫ�</td>
	         <td><input name='text2' type='text' id='text2' size="60"> </td></tr>
	       <tr>
	         <td>����͹</td>
	         <td><label>
	           <input name="teacher" type="text" id="teacher" size="60">
	         </label></td>
           </tr>
	       <tr>
	         <td>��ѡ�ٵ�</td>
	         <td><label>
	           <input name="course" type="text" id="course" size="60">
	         </label></td>
           </tr>
	       <tr> <td>�ӹǹ�ѡ�֡��/������ͺ��</td><td><input type='text' name='text3' id='text3' size='3'> �� <!--(����Թ : <?php #echo $row[2]; ?> ��) --></td></tr>
	       <tr>
	         <td>���ͼ��ͧ</td>
	         <td><label>
	           <input name="names" type="text" id="names" size="60" maxlength="255">
	         </label></td>
           </tr>
	<!--<tr> <td>�������Ѿ��:</td><td><input name='text1' type='text' id='text1'></td></tr> -->
	</table>  
		
		<font color='red'><table width="300" border="0">
  <tr bgcolor="#B2DFFF">
    <th scope="row">������������������ͧ�����</th>
  </tr>
</table></font>
		
<table width="550" border="0"><tr>
<td>
	<?php
		#$room_program="select * from room_program
		#order by id asc";
		#$rs_room_program=mysql_query($room_program, $link);
		#while($ob_room_program=mysql_fetch_array($rs_room_program)){
	?>
	<!--<input type="checkbox" name="pro[]" id="pro" value="<?php #echo $ob_room_program; ?>"> <?php #echo $ob_room_program["program"]; ?><br/> -->
	<?php
		#}
	?>
<ol id="files-root">
<li><input type="text" name="program[]" size="60" maxlength="60">
</ol>
<span onclick="addFile()" style="cursor:pointer;">���������</span>
</td>
<!--<td><input type="checkbox" name="pro" id="pro" value="1"> : ����ͧ����մ���</td><td><input type="checkbox" name="comp" id="comp" value="1"> : ����ͧ�����Ŵ�</td> --></tr>
<!--<tr><td><input type="checkbox" name="a" id="a" value="����ͧ����Ҿ���������"> : ����ͧ����Ҿ���������</td><td><input type="checkbox" name="b" id="b" value="����ͧ�ŧ�ѭ�ҳ����������"> : ����ͧ�ŧ�ѭ�ҳ�����������</td></tr>
<tr><td><input type="checkbox" name="c" id="c" value="��⾧�๡���ʧ��"> : ��⾧�๡���ʧ��</td><td><input type="checkbox" name="d" id="d" value="����ͧ����Ҿ�Դ���"> : ����ͧ����Ҿ�Դ���</td></tr>
<tr><td><input type="checkbox" name="e" id="e" value="����ͧ�ѹ�֡���§"> : ����ͧ�ѹ�֡���§</td><td><input type="checkbox" name="f" id="f" value="����ͧ�Ѻ�÷�ȹ"> : ����ͧ�Ѻ�÷�ȹ�</td></tr>
<tr><td><input type="checkbox" name="g" id="g" value="����⿹"> : ����⿹</td><td><input type="checkbox" name="h" id="h" value="�鵺��"> : �鵺��</td></tr> -->
</table> <br>
<?php
		/*$count=0; 
		echo"<select name='comp' id='comp'>";
		while($count<200)
		{
			$count++;
			<option value='$count'>$count</option>";
		}
		echo"</select><input type=checkbox name=check3 id=check value=check3> : ���������� (����ͧ)<BR><Br>";*/
		
		//echo"<input type=checkbox name=check4 id=check value=check4> : ���� --> <input  name=text5 type=text id=text5 size=60><BR><BR>" ;
?>
       <input name='Submit' type='submit' id='Submit' value='�ͧ��ͧ' class="buttonsubmit" onClick="return confirm('�����˵� : ��سҵ�Ǩ�ͺ�����١��ͧ㹡�èͧ�ͧ��ҹ������º���� ��������ͷ�ҹ�ӡ���׹�ѹ��èͧ���Ǩ��������ö��Ѻ����䢢����š�èͧ��');">
  </form>
       <?php
	   }
	   else
	   {
	?>
   			<script language="JavaScript" type="text/javascript">
			alert("�س�������ö�ͧ��������ͧ�� ���ͧ�ҡ����� Login")
			 </script>
   	 <?
	 }
?>
<!--</fieldset> -->
  </blockquote>
<!--</div> -->
</body>
</html>
