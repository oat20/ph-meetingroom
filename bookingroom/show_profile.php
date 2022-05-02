<!--<div id="header2">-->
<?php
$sql="select * from jos_users 
inner join organization on (jos_users.DeID=organization.DeID)
where jos_users.id = '$_SESSION[u]'";
$rs=mysql_query($sql);
$ob=mysql_fetch_assoc($rs);
print '<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> '.$ob[name].' <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="'.$livesite.'mybooking.php">ประวัติการจอง</a></li>
					<li role="separator" class="divider"></li>
        			<li><a href="'.$livesite.'admin/profile.php">เปลี่ยนรหัสผ่าน</a></li>
				</ul>
	</li>'; 
?> 
<li><a href="<?php echo $livesite;?>bookingroom/logout.php" onClick="return confirm('ยืนยันการออกจากระบบ')"><i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ</a></li>
<!--</div>
<div style="clear:both"></div>-->
