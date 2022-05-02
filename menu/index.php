	<?php
	$sql="select * from user,permission
	where user.NO=permission.NO
	and user.NO='$u'";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
	?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<div class="menu">
		<ul>
        	<li><a href="home.php">รายการจอง</a>
            	<ul>
                	<li><a href="formbooking.php">ทำการจอง</a></li>
                </ul>
            </li>
            
            <?php if($u != ""){ ?>
            <li><a href="#" >รายการจองของฉัน</a>
            	<ul>
                	<!--<li><a href="#">ข้อมูลส่วนตัว</a></li>
                    <li><a href="#">เปลี่ยนรหัสผ่าน</a></li> -->
                    <li><a href="mybooking.php?mode=new">รายการล่าสุด</a></li>
                    <li><a href="mybooking.php?mode=last">รายการที่ผ่านมา</a></li>
                    <!--<li><a href="#">รายการที่ยกเลิก</a></li> -->
               </ul>
            </li>
            
            <?php if($ob[confirm]==1){ ?>        
            <!--<li><a href="#">อนุมัติการจอง</a></il> -->
            <li><a href="reportbooking.php">ตรวจสอบการจอง</a>
            	<ul>
                	<!--<li><a href="#">รายการที่ยกเลิก</a></li> -->
                </ul>
            </il>
            <?php } ?>
             
             <?php if($ob[basic]==1){ ?>   
            <li><a href="#">ข้อมูลพื้นฐาน</a>
          		<ul>
                	<li><a href="room.php">รายการห้อง</a></li>
                	<li><a href="food.php">รายการอาหารว่าง</a></li>
                	<li><a href="media.php">รายการอุปกรณ์โสตฯ</a></li>
                	<!--<li><a href="org.php">ภาควิชา/หน่วยงาน</a></li> -->
                </ul>
          	</li>
            <?php } ?>
          
          	<?php if($ob[user]==1){ ?>
          	<li><a href="user.php">ผู้ใช้</a>
          		<ul>
                	<li><a href="user.php?mode=add">เพิ่มผู้ใช้</a></li>
                	<li><a href="user.php?mode=log">Logfile</a></li>
                </ul>
          	</li>
            <?php } ?>
          	
			<li><a href="bookingroom/logout.php">Logout</a></li>
            <?php } ?>
		</ul>
	</div>
