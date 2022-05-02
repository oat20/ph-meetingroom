<div id="header">
<?php
$sql="select * from jos_users inner join organization on (jos_users.DeID=organization.DeID)
where id='62'";
$rs=mysql_query($sql);
$ob=mysql_fetch_array($rs);
print '<strong>'.$ob[name].' ('.$ob[Fname].')</strong><br/>
<a href=profile.php>[ข้อมูลส่วนตัว]</a>'; 
?> 
<a href=# onClick="return confirm('ยืนยันการออกจากระบบ')">[ออกจากระบบ]</a>
</div>
<div style="clear:both"></div>
