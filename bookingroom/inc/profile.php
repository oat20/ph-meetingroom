<?php
$action=$_REQUEST["action"];

if($action == "update"){

	$m1=$_POST["m1"];
	$m5=$_POST["m5"];
	$dep=$_POST["dep"];
	$us_id=$_POST["us_id"];
	$form_tel=$_REQUEST["form_tel"];
	#$usr_lastupdate=$datelog." | ".$getip;
		
		$sql="update jos_users set name='$m1', 
		email='$_POST[email]', 
		DeID='$dep', 
		tel = '$form_tel',
		username = '$_POST[username]'
		where id = '$us_id'";
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
	$sql="select jos_users.name, jos_users.username, jos_users.DeID, organization.Fname, jos_users.email, jos_users.tel,jos_users.id,
	jos_users.password 
	from jos_users, organization
	where jos_users.id='$u' 
	and jos_users.DeID=organization.DeID";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_assoc($rs);
?>

<legend><i class="fa fa-edit"></i> แก้ไขข้อมูลส่วนตัว</legend>
	
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="form2" id="form2" class="form-horizontal">
            
			<?php echo $error_msg1;?>
              
              <div class="form-group">
              	<label class="control-label col-sm-3"><strong>&#3594;&#3639;&#3656;&#3629; - นามสกุล:</strong></label>
                <div class="col-sm-9">
			  <input name="m1" type="text" id="m1" value="<?php echo $ob["name"]; ?>" maxlength="255" size="50" class="form-control" required>
              	</div>
              </div>
              
              <div class="form-group">
              	<label class="control-label col-sm-3"><strong>ภาควิชา / งาน:</strong></label>
                <div class="col-sm-9">
              	<select name="dep" class="form-control" required>
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
                	</div>   
                </div>
                
                <div class="form-group">           
               		<label class="control-label col-sm-3"><strong>Email:</strong></label>
                    <div class="col-sm-9">
                <input name="email" type="email" id="m5" value="<?php echo $ob["email"]; ?>" size="50" maxlength="255" class="form-control" required>
                		<span class="help-block">โปรดใช้อีเมลขอทางมหาวิทยาลัยฯ (@mahidol.ac.th)</span>
                	</div>
                </div>
                
                <div class="form-group">
              		<label class="control-label col-sm-3"><strong>เบอร์โทรภายใน:</strong></label>
                    <div class="col-sm-9">
                <input name="form_tel" type="text" id="m5" value="<?php echo $ob["tel"]; ?>" size="50" maxlength="255" class="form-control" required>
                	</div>
                </div>
                
                <div class="form-group">
            	<label class="control-label col-sm-3"><strong>Username:</strong></label>
                <div class="col-sm-9">
                	<input type="text" name="username" value="<?php echo $ob["username"];?>" class="form-control" required>
              	</div>
              </div>
              
              <div class="form-group">
              	<div class="col-sm-9 col-sm-offset-3">
			  <input type="hidden" name="us_id" value="<?php echo $ob["id"]; ?>" />
              <input type="hidden" name="action" value="update" />
			 <input type="submit" name="editprofile" value="Update" class="btn btn-lg buttonsubmit" >
             	</div>
             </div>
            </form>
