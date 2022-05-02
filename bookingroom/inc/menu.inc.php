<!--main menu-->
<div class="panel panel-default">
	<div class="panel-body">
    	<div class="blog_title">เมนูหลัก</div>
    	<div id="left">
			<div class="menu">
				<ul>
            		<!--<li><a href="home.php?sta_id=1">หน้าหลัก</a></il>-->
                	<!--<li><a href="formbooking.php?mode=add">กรอกใบจอง</a></il>-->
                	<li><a href="mybooking.php?sta_id=1">ประวัติการจอง</a></il>
                	<li><a href="mybooking.php?sta_id=3">ประวัติการจองที่ยกเลิก</a></il>
            	</ul>
            </div>
            <div class="line"></div>
        </div>
    </div>
</div>
<!--main menu-->

<!--Usertype งานบริหารทั่วไป-->
            <?php
$sql_permission="select usertype
from jos_users
where id = '$_SESSION[u]'";
$rs_permission=mysql_query($sql_permission);
$ob_permission=mysql_fetch_array($rs_permission);
			if($ob_permission[usertype]==3){
			?>
            <!--<div class="menu">
<h1>ตรวจสอบใบจอง</h1>
<ul>
	<li><a href="approve.php">ใบจองรอตรวจสอบ</a></li>
    	<li><a href="#">ใบจองที่ตรวจสอบแล้ว</a></li>
            </ul>
            </div>
            <div class="line"></div> -->
            
            <!--report-->
<div class="panel panel-default">
	<div class="panel-body">
   		<div class="blog_title">รายงาน</div>
        	<div id="left">            
            	<div class="menu">
					<ul>
            			<li><a href="report.php">การจองรายเดือน</a></li>
                		<li><a href="stat.php">สถิติการจอง</a></li>
            		</ul>
            	</div>
            	<div class="line"></div>
          	</div>
	</div>
</div>
<!--report-->

<!--config system-->
<div class="panel panel-default">
	<div class="panel-body">
    	<div class="blog_title">เตรียมข้อมูลระบบ</div>
        	<div id="left">
            <div class="menu">
<ul>
            	<li><a href="config.php">ตั้งค่าระบบ</a></li>
                	<li><a href="room_cate.php">รายการประเภทห้อง</a></li>
                	<li><a href="room.php">รายการห้อง</a></li>
                	<li><a href="food.php">รายการอาหารว่าง</a></li>
                	<li><a href="media.php">รายการอุปกรณ์เสริม</a></li>
                	<li><a href="org.php">ภาควิชา/ส่วนงาน</a></li>
                    <li><a href="user.php">สมาชิก</a></li>
            </ul>
            </div>
            <div class="line"></div>
            </div>
	</div>
</div>
<!--config system-->
            <?php
			}
			?>
			<!--Usertype งานบริหารทั่วไป-->