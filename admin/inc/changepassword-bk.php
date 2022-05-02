<?php
$action=$_POST[action];

if($action == "change"){
	
	$us_id=$_POST["us_id"];
	$oldpwd=$_POST["oldpwd"];
	$newpwd=$_POST["newpwd"];
	
	$sql="select password from jos_users
	where id='$us_id'";
	$rs=mysql_query($sql, $link);
	$ob=mysql_fetch_array($rs);
	
	if($ob["us_pwd"] == $oldpwd){
	 	$sql="update jos_users set password='$newpwd'
		where id='$us_id'";
		mysql_query($sql);
		$error_msg2="แก้ไขรหัสผ่านเรียบร้อย";
	}else{
		$error_msg2="รหัสผ่านเดิมไม่ถูกต้อง";
	}

}
?>
  <form action="#" method="post">
  <fieldset>
  <legend>เปลี่ยนรหัสผ่าน</legend>
  <table>
  	<tr>
		<td><?php echo $error_msg2; ?></td>
	</tr>
  	<!--<tr>
  	  <td>Username : <?php #print $USR_CODE; ?></td>
	  </tr>
  	<tr> -->
    	<td>
        <label><strong>รหัสผ่านเดิม:</strong></label><br/>
        <input name="oldpwd" type="password" size="50" maxlength="50" class="forminput2">
        </td>
  	</tr>
    <tr>
    	<td>
        <label><strong>รหัสผ่านใหม่:</strong></label><br/>
        <input name="newpwd" type="password" size="50" maxlength="50" class="forminput2">
        </td>
  	</tr>
    <tr>
    	<td colspan="2">
		<input type="hidden" name="us_id" value="<?php echo $ob["id"]; ?>" />
        <input type="hidden" name="action" value="change" />
        <input name="editpwd" type="submit" value="เปลี่ยนรหัสผ่าน" class="buttonsubmit">
        </td>
  	</tr>
  </table>
 </fieldset>
     </form>
