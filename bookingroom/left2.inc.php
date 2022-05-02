<? ob_start(); 
#header("Content-Type: text/plain; charset=tis-620"); ?>
<h1>เมนูหลัก</h1>
<?
#if($u == '')
#{
?>
<!--<ul> -->
	<!--<li><a href="stat.php">ตรวจสอบการจองห้อง</a></li> -->
    <!--<li><a href="index.php">รายชื่อห้องอบรม</a></li> -->
	<!--<li><a href="login.php">เข้าสู่ระบบ</a></li> -->
<!--</ul> -->
        <? 
#}
#else
#{
?>
    <ul>
	<li><a href="index.php">หน้าหลัก</a></li>
	<li><a href="index.php?mode=first">จองห้อง</a></li>
    </ul>
    <?
#}
?>
