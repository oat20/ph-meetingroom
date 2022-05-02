<?php
$action=$_POST[action];

if($action == "change"){
	
	$us_id=$_POST["us_id"];
	$oldpwd=$_POST["oldpwd"];
	$newpwd=$_POST["newpwd"];
	
	$sql2="select password from jos_users
	where id = '$us_id'";
	$rs2=mysql_query($sql2);
	$ob2=mysql_fetch_array($rs2);
	
	if($ob["password"] == $oldpwd){
	 	$sql="update jos_users set password='$newpwd'
		where id='$us_id'";
		mysql_query($sql);
		$error_msg2="แก้ไขรหัสผ่านเรียบร้อย";
	}else{
		$error_msg2="รหัสผ่านเดิมไม่ถูกต้อง";
	}

}
?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-horizontal" id="formChangepw">
  <legend>เปลี่ยนรหัสผ่าน</legend>
  	
	<?php echo $error_msg2; ?>
    
  	<div class="form-group">
    	<label class="control-label col-sm-3"><strong>รหัสผ่านเดิม:</strong></label>
        <div class="col-sm-9">
        	<input name="oldpwd" type="password" size="50" maxlength="50" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3"><strong>รหัสผ่านใหม่:</strong></label>
        <div class="col-sm-9">
        	<input name="newpwd" type="password" size="50" maxlength="50" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group">
    	<div class="col-sm-9 col-sm-offset-3">
        	<input type="hidden" name="us_id" value="<?php echo $ob["id"]; ?>" />
        <input type="hidden" name="action" value="change" />
        <input name="editpwd" type="submit" value="Update" class="btn btn-lg buttonsubmit">
        </div>
    </div>
 
     </form>
