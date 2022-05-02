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
      <fieldset>
      	<legend>ช่วงเวลา</legend>
	  <table width="100%" cellspacing="1">
	  	<tr bgcolor="#B2DFFF">
        <th>ช่วงเวลา</th>
        	<th>เริ่ม</th>
            <th>สิ้นสุด</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
		</tr>
        <?
	$a=1;
    $cmd = "select * from room_time
	where trash = '0'
	order by tim_id asc";
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
            	<!--<td align="center"><img src="img/user/<?php #print $row[photo]; ?>" class="img_size50"></td> -->
            	<td align="center"><?php print $row["name"]; ?></td>
                <td align="center"><?php echo $row["start"]; ?></td>
                <td align="center"><?php echo $row["end"]; ?></td>
				<td align="center"><a href="_time.php?tim_id=<?php print $row["tim_id"]; ?>"><img src="<?php print $img_path; ?>edit_icon.gif" /></a></td>
                <td align="center"><a href="inc/room/delroom.php?tim_id=<?php print $row["tim_id"]; ?>" onClick="return confirm('ยืนยันการลบข้อมูล')"><img src="<?php print $img_path; ?>delete_icon.gif" /></a></td>
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
</table>
</fieldset>
<script type="text/javascript" src="bookingroom/js/mergecell.js"></script>
      <!--</div> -->
    <!--</div> -->
</body>
</html>
