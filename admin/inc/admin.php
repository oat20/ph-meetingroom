<?php
#include"config.php";
#include"connect/connect.php";
?>
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
        	<td colspan="5"><input name="action" type="hidden" value="revoke"><input name="" type="submit" value="ถอนสิทธิ์"  onClick="return confirm('ยืนยันการถอนสิทธิ์บุคคลนี้');"></td>
        </tr>
	  	<tr bgcolor="#B2DFFF">
        	<th>&nbsp;</th>
            			<th>ID</th>
        <th>ชื่อ</th>
        	<th>Username</th>
            <th>ภาควิชา/หน่วยงาน</th>
            <th>Email</th>
		</tr>
        <?
	$a=1;
    $cmd = "select * from jos_users, organization,admin
	where jos_users.DeID=organization.DeID
	and jos_users.id=admin.NO
	ORDER BY jos_users.id desc";
	#mysql_query($cmd, $link);
	#$cmd="select * from ph_bookingroom2.jos_users
	#order by ph_bookingroom2.jos_users.username asc";
	$result = mysql_query($cmd);
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
            				<td align="center"><?php print $row["id"]; ?></td>
            	<!--<td align="center"><img src="img/user/<?php #print $row[photo]; ?>" class="img_size50"></td> -->
            	<td><?php #print iconv("utf-8","tis-620",$row[USR_NAME]); ?> <?php #print iconv("utf-8","tis-620",$row[USR_SURNAME]); ?><?php print $row[name]; ?><!--<br/><span class="font8"><a href="user.php?mode=edit&keyno=<?php #print $row[NO]; ?>">แก้ไข</a> | <a href="#">ลบ</a></span> --></td>
                <td><?php echo $row[username]; ?></td>
                <td><?php echo $row[Fname]; ?></td>
				<td><?php echo $row[email]; ?></td>
				<!--<td align="center"><a href="admin2-1.php">[แก้ไข]</a><a href="#?key=<?php #echo $row[0]; ?>">[ข้อมูลการเข้าระบบ]</a></td> -->
			</tr>
			  <!--: <a href="#" onClick="NewWin=window.open('admin2-1.php?No=<?php #echo $row[0]; ?>','NewWin','toolbar=no,status=no,width=300,height=300'); "><?php #echo $row[3]; ?></a>&nbsp;&nbsp;<?php #echo $row[4]; ?>&nbsp;&nbsp;<?php #echo $row[6]; ?>&nbsp;&nbsp;<?php #echo $row[7]; ?> -->
			<?php
			#$a++;
			#if($row[5]=='no')
			#{
			?>
				 <!--<font color = 'red' >&nbsp;&nbsp;&nbsp;&nbsp;ยังไม่ได้รับการอนุมัติ </font><BR><BR> -->
				 <?php
			#}
			#else
			#{
			?>
				<!--<BR><BR> -->
				<?php
			#}
			/*echo "<table border=0 width=450> <tr bgcolor=#999999> <td>
			$a : <a href = 'admin2-1.php?No=$row[0]'>$row[3]</a> ---- Email : $row[4]</td>";
			$a++;
			echo "<table border=0 width=450> <tr bgcolor=#333333> <td>&nbsp; </tr> </td> </table>";
			echo "</tr> </table>"; */
	}		
	#mysql_close($conn);
?>
	<tr>
    	<td colspan="5"><input name="action" type="hidden" value="revoke"><input name="" type="submit" value="ถอนสิทธิ์" onClick="return confirm('ยืนยันการถอนสิทธิ์บุคคลนี้');"></td>
    </tr>
</table>
</form>
<script type="text/javascript" src="bookingroom/js/mergecell.js"></script>
      <!--</div> -->
    <!--</div> -->
</body>
</html>
