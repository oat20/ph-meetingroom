<?php
$action=$_REQUEST["action"];

if($action == "edit"){

	$m1=$_POST["m1"];
	$m5=$_POST["m5"];
	$dep=$_POST["dep"];
	$us_id=$_POST["us_id"];
	$form_tel=$_REQUEST["form_tel"];
	$form_pasword=$_REQUEST["form_password"];
	#$usr_lastupdate=$datelog." | ".$getip;
	
	if($form_password != ""){
		$sql="update jos_users set password='$form_password'
		where id='$us_id'";
		mysql_query($sql);
	}
	
	$sql="update jos_users set name='$m1', email='$m5', DeID='$dep', tel='$form_tel'
	where id='$us_id'";
	$rs=mysql_query($sql);
	if($rs){
		$error_msg1="ทำการแก้ไขข้อมูลเรียบร้อย";
	}
	
	
}
?>
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
	font-family: "Courier New", Courier, monospace;
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
#Layer2 {
	position:absolute;
	left:238px;
	top:36px;
	width:306px;
	height:20px;
	z-index:2;
}
-->
</style>
<!--<div id="Layer1"> -->
 <!-- <div align="center"> --><script language="JavaScript" type="text/javascript">

function checkvalue()
{
if((document.form2.m1.value == "") || (document.form2.m2.value == "") ||(document.form2.m3.value == "") ||(document.form2.m4.value == "") ||(document.form2.m12.value == "") ||(document.form2.m5.value == ""))
{
alert('��س�����ͤ������ú');
return false;
}
else if ((document.form2.m5.value == "") || (document.form2.m5.value.indexOf('@') == -1) || (document.form2.m5.value.indexOf('.') == -1)) 
{
alert('�ô��Email ���١��ͧ');
return false;
}
else if (document.form2.m3.value != document.form2.m4.value) 
{
alert('�س�������������ç�ѹ��Ѻ');
return false;
}
else if(document.form2.m3.value.length<=5)
{
alert('password ���ú 6 ��Ǥ�Ѻ');
return  false;
}
else{
for(var i=0 ; i<document.form2.m6.value.length ; i++)
{
var digit = document.form2.m6.value.charAt(i);
if(digit >="0" && digit <="9"){return true;
}else{
alert('kuyped');
return false; 
} 
}
}
}
</script>
<?php
	$sql="select jos_users.name, jos_users.username, jos_users.DeID, organization.Fname, jos_users.email, jos_users.tel,jos_users.id 
	from jos_users, organization
	where jos_users.id='$u' 
	and jos_users.DeID=organization.DeID";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
?>

<fieldset>
<legend>แก้ไขข้อมูลส่วนตัว</legend>
	
          <table cellpadding="1" cellspacing="1">
          <form action="profile.php" method="post" name="form2" id="form2"onsubmit="return checkvalue()">
            <!--<tr bgcolor="#3D6297">
              <th height="58" colspan="2" nowrap="nowrap" scope="row"><div align="center"><strong>ŧ����¹������к��ͧ��ͧͺ������������</strong></div></th>
              </tr> -->
              <!--<tr bgcolor="#B2DFFF">
              <td scope="row">Username:</td>
              <td nowrap="nowrap"><input name="m1" type="text" id="m1" value="<?php #echo $ob["us_name"]; ?>" maxlength="255" size="60"></td>
            </tr> -->
            <?php
			if($error_msg1 != ""){
			?>
			<tr>
				<td colspan="2"><span class="msgalert"><?php echo $error_msg1; ?></span></td>
			</tr>
            <?php } ?>
            <tr bgcolor="#B2DFFF">
              <td align="right" scope="row"><strong>Username:</strong></td>
              <td nowrap="nowrap"><input type="text" id="m1" value="<?php print $ob[username]; ?>" maxlength="255" size="50" readonly class="forminput2"></td>
            </tr>
            <!--<tr bgcolor="#B2DFFF">
              <td align="right" valign="top" scope="row"><strong>Password:</strong></td>
              <td nowrap="nowrap"><input name="form_password" type="text" id="m1" value="" maxlength="255" size="60"><br/>
              <span class="fontred">ถ้าไม่ต้องการเปลี่ยน Password ก็ปล่อยว่างไว้</span></td>
            </tr> -->
            <tr bgcolor="#B2DFFF">
              <td align="right" scope="row"><strong>&#3594;&#3639;&#3656;&#3629; - นามสกุล:</strong></td>
              <td nowrap="nowrap"><div align="left">
			  <input name="m1" type="text" id="m1" value="<?php echo $ob["name"]; ?>" maxlength="255" size="50" class="forminput2">
              </div></td>
            </tr>
            <tr bgcolor="#B2DFFF">
              <td align="right" scope="row"><strong>ภาควิชา / หน่วยงาน:</strong></td>
              <td>
              	<select name="dep" class="forminput2">
					<?php
					$sql2="select * from organization
					order by DeID asc";
					$rs2=mysql_query($sql2);
					while($ob2=mysql_fetch_array($rs2)){
						
						if($ob[DeID]==$ob2[DeID]){
							print "<option value='".$ob2["DeID"]."' selected='selected'>- ".$ob2["Fname"]."</option>";
						}else{
					?>
					<option value="<?php echo $ob2["DeID"]; ?>">- <?php echo $ob2["Fname"]; ?></option>
					<?php
						}
						
					}
					?>
				</select>              
                </td>
            </tr>
            <!--<tr bgcolor="#B2DFFF">
              <td scope="row">Username:</td>
              <td><div align="left">
      <input name="m2" type="text" id="m2" value="<?php #echo $ob["us_name"]; ?>" size="50" maxlength="10">
        </div></td>
            </tr> -->
            <!--<tr bgcolor="#B2DFFF">
              <td scope="row">Password:</td>
              <td><div align="left">
                <input name="m3" type="password" id="m3" size="50" maxlength="10"> 
                <font color="red"> (&#3651;&#3626;&#3656;&#3619;&#3627;&#3633;&#3626;&#3617;&#3634;&#3585;&#3585;&#3623;&#3656;&#3634; 6&#3605;&#3633;&#3623;)</font> </div></td>
            </tr> -->
            <!--<tr bgcolor="#B2DFFF">
              <th scope="row">Password:</th>
              <td><div align="left">
                    <input name="m4" type="password" id="m4" value="666666">
                (�׹�ѹ&#3619;&#3627;&#3633;&#3626;&#3612;&#3656;&#3634;&#3609;)</div></td>
            </tr> -->
            <tr bgcolor="#B2DFFF">
              <td align="right" scope="row"><strong>Email:</strong></td>
              <td><div align="left">
                <input name="m5" type="text" id="m5" value="<?php echo $ob["email"]; ?>" size="50" maxlength="255" class="forminput2">
              </div></td>
            </tr>
            <tr bgcolor="#B2DFFF">
              <td align="right" scope="row"><strong>เบอร์โทรศัพท์ที่สามารถติดต่อได้:</strong></td>
              <td><div align="left">
                <input name="form_tel" type="text" id="m5" value="<?php echo $ob["tel"]; ?>" size="50" maxlength="255" class="forminput2">
              </div></td>
            </tr>
            <!--<tr bgcolor="#B2DFFF">
              <td align="right" scope="row"><strong>วันที่ลงทะเบียน:</strong></td>
              <td><div align="left">
              	<?php #print dateThai($ob[registerDate]); ?>
              </div></td>
            </tr> -->
            <!--<tr bgcolor="#CCCC99">
              <td bgcolor="#B2DFFF" scope="row" colspan="2">��䢢���������ش : <?php #print $ob[USR_LASTUPDATE]; ?></td>
            </tr> -->
            <tr bgcolor="#CCCC99">
              <td bgcolor="#B2DFFF" scope="row">
			  <input type="hidden" name="us_id" value="<?php echo $ob["id"]; ?>" />
              <input type="hidden" name="action" value="edit" />
			  </td>
              <td bgcolor="#B2DFFF" scope="row"><input type="submit" name="editprofile" value="แก้ไขข้อมูล" class="buttonsubmit" > <input type="button" name="Button" value="ยกเลิก" onClick="location.href='home.php'" class="buttonsubmit"></td>
            </tr>
            </form>
          </table>
</fieldset>
  <!--</div> --
<!--</div> -->
