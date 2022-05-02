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
alert('سͤú');
return false;
}
else if ((document.form2.m5.value == "") || (document.form2.m5.value.indexOf('@') == -1) || (document.form2.m5.value.indexOf('.') == -1)) 
{
alert('ôEmail ١ͧ');
return false;
}
else if (document.form2.m3.value != document.form2.m4.value) 
{
alert('سçѹѺ');
return false;
}
else if(document.form2.m3.value.length<=5)
{
alert('password ú 6 ǤѺ');
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
	$sql="select * from user, organization, permission
	where user.NO='$keyno'
	and user.DEPARTMENT_NO=organization.DeID
	and user.NO=permission.NO";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
?>
  <form action="#" method="post" name="form2" id="form2"onsubmit="return checkvalue()">
          <table cellpadding="1" cellspacing="1">
            <!--<tr bgcolor="#3D6297">
              <th height="58" colspan="2" nowrap="nowrap" scope="row"><div align="center"><strong>ŧ¹кͧͧͺ</strong></div></th>
              </tr> -->
            <tr bgcolor="#B2DFFF">
              <td scope="row">&#3594;&#3639;&#3656;&#3629; - นามสกุล</td>
              <td nowrap="nowrap"><div align="left">
			  
                <input name="m1" type="text" id="m1" value="<?php echo $ob["USR_NAME"]; ?>" maxlength="255" size="80" class="forminput2">
              </div></td>
            </tr>
            <tr bgcolor="#B2DFFF">
              <td scope="row">ภาควิชา/&#3627;&#3609;&#3656;&#3623;&#3618;&#3591;&#3634;&#3609;</td>
              <td><div align="left">
                <select name="deid">
                	<option value="<?php print $ob[DeID]; ?>">- <?php print $ob[Fname]; ?></option>
					<?php
						$sql2="select * from organization
						where Type <> 0
						order by DeID asc";
						$rs2=mysql_query($sql2);
						while($ob2=mysql_fetch_array($rs2)){
					?>
					<option>- <?php echo $ob2["Fname"]; ?></option>
					<?php
						}
					?>
                </select>
              </div></td>
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
                (׹ѹ&#3619;&#3627;&#3633;&#3626;&#3612;&#3656;&#3634;&#3609;)</div></td>
            </tr> -->
            <tr bgcolor="#B2DFFF">
              <td scope="row">Email</td>
              <td><div align="left">
                <input name="m5" type="text" id="m5" value="<?php echo $ob[EMAIL]; ?>" size="50" maxlength="255" class="forminput2">
              </div></td>
            </tr>
            <!--<tr bgcolor="#B2DFFF">
              <th scope="row">Ѿ&#3660;:</th>
              <td><div align="left">
                <input name="m6" type="text" id="m6">
              </div></td>
            </tr> -->
            <tr bgcolor="#CCCC99">
              <td bgcolor="#B2DFFF" scope="row" colspan="2">
                            <fieldset>
              	<legend>กำหนดสิทธิ์</legend>
                <?php
                if($ob[confirm]==1){
					print"<input name=confirm type=checkbox value=1 checked /> ตรวจสอบการจอง<br/>";
				}else{
					print"<input name=confirm type=checkbox value=0 /> ตรวจสอบการจอง<br/>";
				}
				
				if($ob[basic]==1){
					print "<input name=basic type=checkbox value=1 checked /> ข้อมูลพื้นฐาน<br/>";
				}else{
					print "<input name=basic type=checkbox value=0 /> ข้อมูลพื้นฐาน<br/>";
				}
				
				if($ob[user]==1){
					print "<input name=user type=checkbox value=1 checked /> ผู้ใช้";
				}else{
					print "<input name=user type=checkbox value=0 /> ผู้ใช้";
				}
				?>
              </fieldset>
				</td>
            </tr>
            <tr bgcolor="#CCCC99">
              <td bgcolor="#B2DFFF" scope="row" colspan="2"><input type="submit" name="Submit" value="แก้ไขข้อมูล" class="buttonsubmit"> <input type="button" name="Button" value="ยกเลิก" onClick="location.href='user.php'" class="buttonsubmit"></td>
            </tr>
          </table>
</form>
  <!--</div> -->
<!--</div> -->
