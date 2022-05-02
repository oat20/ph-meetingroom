<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<style type="text/css">
<!--
#Layer11 {
	position:absolute;
	left:2px;
	top:5px;
	width:997px;
	height:755px;
	z-index:9;
}
#Layer14 {position:absolute;
	left:23px;
	top:1px;
	width:936px;
	height:299px;
	z-index:12;
}
#Layer15 {position:absolute;
	left:23px;
	top:2px;
	width:967px;
	height:32px;
	z-index:12;
}
body,td,th {
	font-family: "Courier New", Courier, monospace;
	font-size: 12px;
}
a:link {
	color: #3399FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #3399FF;
}
a:hover {
	text-decoration: none;
	color: #66FFFF;
}
a:active {
	text-decoration: none;
	color: #66FFFF;
}
.font8{
	font-size: 8pt;
}
-->
</style>
</head>

<body>
<!--<div class="submenu">
	<ul>
		<li><a href="admin2.php">แสดงผู้ใช้</a></li>
		<li><a href="admin2.php?option=add">เพิ่มผู้ใช้</a></li>
        <li><a href="#">Logfile</a></li>
	</ul>
</div> -->
<!--<div id="Layer11"> -->
  <!--<blockquote> -->
    <!--<div id="Layer14"> -->
      <!--<div align="left"> -->
      <form action="inc/revokeadmin.php" method="post">  
	  <table width="100%" cellspacing="1">
      	<tr>
    		<td colspan="5"><input name="action" type="hidden" value="grant"><input name="" type="submit" value="&#3648;&#3614;&#3636;&#3656;&#3617;&#3612;&#3641;&#3657;&#3604;&#3641;&#3649;&#3621;&#3619;&#3632;&#3610;&#3610;" onClick="return confirm('ยืนยันการกำหนดสิทธิ์บุคคลนี้');"></td>
    	</tr>
	  	<tr bgcolor="#B2DFFF">
        	<th>&nbsp;</th>
            			<th>ภาควิชา/หน่วยงาน</th>
        <th>ชื่อ</th>
        	<th>Username</th>
            <th>Email</th>
		</tr>
        <?
	$a=1;
    $cmd = "select organization.Fname, jos_users.name, jos_users.username, jos_users.email, jos_users.id 
	from jos_users, organization
	where jos_users.DeID=organization.DeID 
	ORDER BY organization.Fname ASC";
	#mysql_query($cmd, $link);
	#$cmd="select * from ph_bookingroom2.jos_users
	#order by ph_bookingroom2.jos_users.username asc";
	$result = mysql_query($cmd,$conn);
	$swap="1";
	while($row=mysql_fetch_array($result))
	{
			#echo $a;
			if($swap=="1"){
				$color="";
				$swap="2";
			}else{
				$color="#C9D1CD";
				$swap="1";
			}
			 ?>
			<tr bgcolor="<?php echo $color; ?>">
            	<td align="center"><input name="form_id[]" type="checkbox" value="<?php print $row[id]; ?>"></td>
            				<td><?php echo $row[Fname]; ?></td>
            	<td><?php #print iconv("utf-8","tis-620",$row[USR_NAME]); ?> <?php #print iconv("utf-8","tis-620",$row[USR_SURNAME]); ?><?php print $row[name]; ?><!--<br/><span class="font8"><a href="user.php?mode=edit&keyno=<?php #print $row[NO]; ?>">แก้ไข</a> | <a href="#">ลบ</a></span> --></td>
                <td><?php echo $row[username]; ?></td>
				<td><?php echo $row[email]; ?></td>
			</tr>
            <?php
	}		
	#mysql_close($conn);
?>
	<tr>
    	<td colspan="5"><input name="action" type="hidden" value="grant"><input name="" type="submit" value="&#3648;&#3614;&#3636;&#3656;&#3617;&#3612;&#3641;&#3657;&#3604;&#3641;&#3649;&#3621;&#3619;&#3632;&#3610;&#3610;" onClick="return confirm('ยืนยันการกำหนดสิทธิ์บุคคลนี้');"></td>
    </tr>
</table>
</form>
<script type="text/javascript" src="bookingroom/js/mergecell.js"></script>
      <!--</div> -->
    <!--</div> -->
</body>
</html>
