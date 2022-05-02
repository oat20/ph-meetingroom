<? #ob_start(); 
#header("Content-Type: text/plain; charset=tis-620"); ?>
<!--<h1>ѡ</h1> -->
<table width="100%" cellspacing="0">
  <tr>
    <td valign="top" width="200"><?php include"bookingroom/inc/checkbooking.php"; ?></td>
    <td width="5"></td>
    <td valign="top" width="200"><div class="menu">
<h1>เมนูหลัก</h1>
<ul>
            	<li><a href="home.php">ตรวจสอบข้อมูลการจอง</a></il>
                <!--<li><a href="home.php">ปฏิทินการจอง</a></li> --> 
                <!--<li><a href="#">สถิติการใช้</a></il> -->
                <li><a href="formbooking.php?mode=add">ทำการจอง</a></il>
                <li><a href="report.php">รายงาน</a></il>
                <li><a href="feedback.php">แบบประเมิน</a></il>
                <li><a href="stat.php">สถิติการจอง</a></il>
                <!--<li><a href="#">ผู้ดูแลระบบ</a></li> -->
            </ul>
            </div>
            <div class="line"></div>
</td>
<td width="5"></td>
    <?
if($u != '')
{
?>
<td valign="top" width="200">
<div class="menu">
	<h1>เมนูผู้ใช้</h1>
    <ul>
    	                <li><a href="mybooking.php" title="My Booking">รายการจองของส่วนงาน</a></li>
                        <li><a href="usercancel.php" title="My Booking">รายการจองที่ยกเลิก</a></li>
                <li><a href="profile.php" title="ข้อมูลส่วนตัว">Profile</a></li>
                <!--<li>รายงาน</li>
                <li>Control Panel</li> -->
                <li><a href="bookingroom/logout.php" title="ออกจากระบบ">Logout</a></li>
    </ul>
</div>
<div class="line"></div>
</td>
<td width="5"></td>

            <? 
}
#else
#{
?>
    <td valign="top" width="200"><?php include"bookingroom/inc/mod_room.php"; ?></td>
  </tr>
</table>


