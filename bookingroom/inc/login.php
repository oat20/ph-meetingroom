<?php
	  if($no != ""){
	  ?>
      <div class="profile">
       <img src="bookingroom/img/user/Logo111.gif" class="profile" />
       <ul>
       	<li><a href="#">Profile</a></li>
        <li><a href="#" title="MyBooking">รายการจองของฉัน</a></li>
        <li><a href="#" title="Booking">จองห้อง</a></li>
        <li><a href="#">ออกจากระบบ</a></li>
       </ul>
       </div>
       <div class="line"></div>
       <?php
	  }else{
		  ?>
                          <div class="module1">
        	<h3>สำหรับเจ้าหน้าที่</h3>
            <form action="#" method="post">
            	<label>ชื่อผู้ใช้ หรือ Email:<br/>
                <input type="text" size="20" class="forminput" />
                </label><br/><br/>
                <label>รหัสผ่าน:<br/>
                <input type="password" size="20" class="forminput" />
                </label><br/><br/>
                <input name="" type="submit" value="เข้าสู่ระบบ" class="formbutton"> <!--<a href="#">ลืมรหัสผ่าน ?</a> -->
            </form>
        </div>
        <div class="line"></div>
<?php
	  }
	   ?>