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
<!--<h1>ผู้ใช้</h1>
<p><a href="#">แสดงผู้ใช้ >></a> <a href="#">เพิ่มผู้ใช้ >></a></p> -->
	  <table width="100%" cellspacing="0" id="merge">
  	  <tr bgcolor="#B2DFFF">
            <!--<th>&nbsp;</th> -->
            <td class="colhd">ID</td>
   	    <td class="colhd">ชื่อ</td>
		<td class="colhd">ภาควิชา/หน่วยงาน</td>
   		<td class="colhd">Username</td>
        <td class="colhd">Email</td>
        <!--<td class="colhd">เข้าระบบล่าสุด</td> -->
        <td class="colhd">สิทธิ์</td>
        <td class="colhd">&nbsp;</td>
        <td class="colhd">&nbsp;</td>
		</tr>
        <?
	$a=1;
    $cmd = "select * from jos_users
	left join organization on (jos_users.DeID = organization.DeID)
	where jos_users.block = '0'
	ORDER BY jos_users.id desc";
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
                <!--<td align="center"><a href="#">block</a></td> -->
                <td align="center" class="tbcol1"><a href="user.php?mode=log&keyno=<?php print $row["id"]; ?>"><?php print $row["id"]; ?></a></td>
                <td class="tbcol1"><?php #print iconv("utf-8","tis-620",$row[USR_NAME]); ?> <?php #print iconv("utf-8","tis-620",$row[USR_SURNAME]); ?><?php print $row[name]; ?><!--<br/><span class="font8"><a href="user.php?mode=edit&keyno=<?php #print $row[NO]; ?>">แก้ไข</a> | <a href="#">ลบ</a></span> --></td>
				<td class="tbcol1"><?php echo $row[Fname]; ?></td>
            	<!--<td align="center"><img src="img/user/<?php #print $row[photo]; ?>" class="img_size50"></td> -->
            	                <td class="tbcol1"><?php echo $row[username]; ?></td>
                               <td class="tbcol1"><?php echo $row[email]; ?></td>
                 <!--<td class="tbcol1"><?php #print $row["lastvisitDate"]; ?></td> -->
                 <td class="tbcol1"><?php print $row["usertype"]; ?></td>
                <td class="tbcol1"><a href="#" title="แก้ไข"><img src="../bookingroom/img/edit_icon.gif" border="0" /></a></td> 
                <td class="tbcol1"><a href="inc/room/delroom.php?keyno=<?php print $row["id"]; ?>" onClick="return confirm('ยืนยันการลบรายการ');"><img src="../bookingroom/img/delete_icon.gif" border="0" /></a></td>
			</tr>
            <?php
	}		
?>
</table>
<script type="text/javascript" src="bookingroom/js/mergecell.js"></script>
      <!--</div> -->
    <!--</div> -->
</body>
</html>
