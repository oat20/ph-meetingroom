<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="formLogin">
	<div class="form-group">
    	<label class="control-label">ชื่อผู้ใช้ หรืออีเมลที่ลงทะเบียนไว้:</label>
        	<input name="login_username" type="text" size="30" class="form-control" placeholder="Email Address" required>
    </div>
    
    <div class="form-group">
    	<label class="control-label">รหัสผ่าน:</label>
        	<input name="login_password" type="password" size="30" class="form-control" placeholder="Password" required>
    </div>
    	
        <input type="hidden" name="action" value="login">
    	<input name="" type="submit" value="เข้าสู่ระบบ" class="btn btn-primary btn-lg">
    	<a href="login.php?mode=1" class="btn btn-link btn-lg">ลืมรหัสผ่าน <i class="fa fa-question-circle" aria-hidden="true"></i></a>
      </form>
      <hr>
      <!--<div class="text-right">-->
      	<a href="register/" class="btn btn-default btn-block btn-lg"><i class="fa fa-location-arrow"></i> ยังไม่มีรหัสผ่านสำหรับใช้งานคลิกที่นี่</a>
      <!--</div>-->