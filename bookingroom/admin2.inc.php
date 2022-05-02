<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
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
	  <table width="100%" cellspacing="1" id="merge" class="table">
      	<thead>
	  	<tr bgcolor="#B2DFFF">
        	<th>#</th>
            <th>ชื่อ</th>
            			<th>ส่วนงาน</th>
        	<th>Username</th>
            <th>Email</th>
            <th>เบอร์โทรภายใน</th>
            <th>สิทธิ์</th>
            <th>เข้าระบบล่าสุด</th>		
            <th></th>
		</tr>
        </thead>
        <tbody>
        <?php
	$a=1;
    $cmd = "select jos_users.name,organization.Fname,jos_users.username,jos_users.email,user_type.types,jos_users.registerDate,jos_users.id, DATE_FORMAT(jos_users.lastvisitDate, '%d/%m/%Y %H:%i') as lastvisitdate, jos_users.sendEmail, jos_users.tel 
	from jos_users,organization,user_type 
	where jos_users.DeID = organization.DeID
	and jos_users.usertype = user_type.id
	ORDER BY jos_users.registerDate desc";
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
            	<td align="center"><?=++$i;?></td>
                <td><?php echo $row["name"];?></td>
            				<td><?php echo $row[Fname]; ?></td>
                <td><?php echo $row[username]; ?></td>
				<td><?php echo $row[email]; ?></td>
                <td><?php echo $row["tel"];?></td>
                <td><?php print $row[types];?></td>
                <td><?php echo $row["lastvisitdate"];?></td>
                <td align="center">
                	<div class="btn-group btn-group-sm">
                <a href="user.php?mode=add&keyno=<?php print $row[id]; ?>" title="แก้ไข" class="btn btn-default"><i class="fa fa-edit"></i> แก้ไข</a>
                <a href="bookingroom/register_action.php?keyno=<?php echo $row["id"]; ?>&action=del" onClick="return confirm('ยืนยันการลบรายการ');" title="ลบ" class="btn btn-default"><i class="fa fa-times"></i> ลบ</a>
                	</div>
                </td>
			</tr>
<?php
	}		
?>
	</tbody>
</table>
</body>
</html>
