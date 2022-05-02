<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
		<legend>เพิ่ม/แก้ไขส่วนงาน</legend>
		<?php
		if($key_dp_id==""){
		?>
        <form id="form1" name="form1" method="post" action="bookingroom/department/delorg.php" class="form-horizontal">
        	<div class="form-group">
            	<label class="control-label col-sm-3">ส่วนงาน:</label>
                <div class="col-sm-9">
                	<input name="text1" type="text" id="text1" size="60" maxlength="50" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3">เบอร์ภายใน:</label>
                <div class="col-sm-9">
                	<input name="text2" type="text" id="text3" size="60" maxlength="50" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
            	<div class="col-sm-9 col-sm-offset-3">
                	<input type="hidden" name="action" value="add" />
      				 <input type="submit" name="adddata" value="บันทึก" class="btn btn-primary">
                </div>
            </div>
        </form>
		<?php
		}else{
			$sql="select * from organization
			where DeID='$key_dp_id'";
			$rs=mysql_query($sql);
			$ob=mysql_fetch_array($rs);
		?>
        <form id="form1" name="form1" method="post" action="bookingroom/department/delorg.php" class="form-horizontal">
        	<div class="form-group">
            	<label class="control-label col-sm-3">ส่วนงาน:</label>
                <div class="col-sm-9">
                	<input name="text1" type="text" id="text1" size="60" maxlength="50" value="<?php echo $ob["Fname"]; ?>" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3">เบอร์ภายใน:</label>
                <div class="col-sm-9">
                	<input name="text2" type="text" id="text2" size="60" maxlength="50" value="<?php echo $ob["tel"]; ?>" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
            	<div class="col-sm-9 col-sm-offset-3">
                	<input type="hidden" name="dp_id" value="<?php echo $ob["DeID"]; ?>" />
          			<input type="hidden" name="action" value="edit" />
       				<input type="submit" name="editdata" value="แก้ไขข้อมูล" class="btn btn-primary">
                </div>
            </div>
       
        </form>
		<?php
		}
		?>
</body>
</html>
