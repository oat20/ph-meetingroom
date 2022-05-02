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
<?php
$keyno=$_GET[keyno];

if($keyno == ""){
?>

  <form action="bookingroom/register_action.php" method="post" id="form2" class="form-horizontal">
  	<div class="form-group">
    	<label class="control-label col-sm-3">ชื่อ - นามสกุล:</label>
        <div class="col-sm-9">
        	<input name="m1" type="text" id="m1" value="<?php echo $m1; ?>" size="60" maxlength="255" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">ส่วนงาน:</label>
        <div class="col-sm-9">
        	<select name="org" class="form-control" required>
					<option value="">- เลือกรายการ -</option>
					<?php
						$sql="select * from organization
						order by DeID asc";
						$rs=mysql_query($sql);
						while($ob=mysql_fetch_assoc($rs)){
					?>
					<option value="<?php echo $ob[DeID];?>">- <?php echo $ob["Fname"]; ?></option>
					<?php
						}
					?>
				</select>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">เบอร์ภายใน:</label>
        <div class="col-sm-9">
        	<input type="text" name="tel" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">Email:</label>
        <div class="col-sm-9">
        	<input type="email" name="email" class="form-control" required>
             <span class="help-block">กรุณาใช้ Email ของทางมหาวิทยาลัยฯ ในการลงทะเบียน (@mahidol.ac.th)</span>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">Password:</label>
        <div class="col-sm-9">
        	<input name="m3" type="password" id="m3" size="60" maxlength="10" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">สิทธิ์การใช้งาน:</label>
        <div class="col-sm-9">
        	<?php
				$sql2="select * from user_type
				where flag = '1'
				order by id asc";
				$rs2=mysql_query($sql2);
				while($ob2=mysql_fetch_array($rs2))
				{
					if($ob2["id"] == 1){
						print "<div class='radio'><label><input name='usergroup' type='radio' value='".$ob2[id]."' required checked> ".$ob2[types]."</label></div>";
					}else{
						print "<div class='radio'><label><input name='usergroup' type='radio' value='".$ob2[id]."' required> ".$ob2[types]."</label></div>";
					}
				}
				?>
        </div>
    </div>
    
    <div class="form-group">
    	<div class="col-sm-9 col-sm-offset-3">
        	<input name="action" type="hidden" value="add" />
            <input type="submit" name="Submit" value="Save" class="btn btn-primary btn-lg"> 
           <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-link btn-lg"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>
        </div>
    </div>
</form>

<?php
}else{
	
$sqlUser = "select jos_users.id, jos_users.name, organization.Fname, jos_users.username, jos_users.email, jos_users.usertype, jos_users.registerDate, jos_users.sendEmail, jos_users.tel 
from jos_users
inner join organization on (jos_users.DeID = organization.DeID)
where id = '$keyno'";
$rsUser = mysql_query($sqlUser);
$obUser = mysql_fetch_assoc($rsUser);
?>

<form action="bookingroom/register_action.php" method="post" id="formEdit" class="form-horizontal">
	<div class="form-group">
    	<label class="control-label col-sm-3">&#3594;&#3639;&#3656;&#3629; - นามสกุล:</label>
        <div class="col-sm-9">
        	<p class="form-control-static"><?php echo $obUser[name];?></p>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">ส่วนงาน:</label>
        <div class="col-sm-9">
        	<p class="form-control-static"><?=$obUser[Fname];?></p>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">Username:</label>
        <div class="col-sm-9">
        	<p class="form-control-static"><?=$obUser[username];?></p>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">เบอร์ภายใน:</label>
        <div class="col-sm-9">
        	<p class="form-control-static"><?php echo $obUser["tel"];?></p>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">Email:</label>
        <div class="col-sm-9">
        	<p class="form-control-static"><?=$obUser[email];?></p>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">สิทธิ์การใช้งาน:</label>
        <div class="col-sm-9">
        	<?php
				$sql2="select * from user_type
				where flag = '1'
				order by id asc";
				$rs2=mysql_query($sql2);
				while($ob2=mysql_fetch_array($rs2))
				{
					if($obUser[usertype] == $ob2[id])
					{
						print "<div class='radio'><label><input name='usergroup' type='radio' value='".$ob2[id]."' checked='checked'> ".$ob2[types]."</label></div>";
					}
					else
					{
						print "<div class='radio'><label><input name='usergroup' type='radio' value='".$ob2[id]."'> ".$ob2[types]."</label></div>";
					}
				}
				?>
        </div>
    </div>
    
    <div class="form-group">
    	<label class="control-label col-sm-3">วันที่ลงทะเบียน:</label>
        <div class="col-sm-9">
        	<p class="form-control-static"><?php echo dateformat2($obUser[registerDate]);?></p>
        </div>
    </div>
    
    <div class="form-group">
    	<div class="col-sm-9 col-sm-offset-3">
        	<input name="action" type="hidden" value="edit" />
                <input name="us_id" type="hidden" value="<?php echo $obUser[id];?>" />
                <input type="submit" name="Submit" value="Save" class="btn btn-primary btn-lg">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-link btn-lg"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>
        </div>
    </div>
</form>

<?php } ?>
  <!--</div> -->
<!--</div> -->
