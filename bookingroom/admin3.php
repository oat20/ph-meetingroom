<?php
$action=$_REQUEST[action];
$text1=$_POST[text1];
$text2=$_POST[text2];
#$myColorFld=$_POST[myColorFld];
#$filename=$HTTP_POST_FILES['picdata']['name'];
$keyId = $_REQUEST["keyId"];

if($action == "save"){
#$lastupdate = date("Y-m-d H:i:s");
	$id = maxid("room_type", "id");
		$cmd= "insert into room_type (id, name, trash, lastupdate) 
		values ('$id', '$text1', '0', '$datelog')";
		mysql_query($cmd);
	}else if($action=="edit"){
		$cmd= "update room_type set name='$text1',
		lastupdate = '".date("Y-m-d H:i:s")."'
		where id='$_POST[cr_id]'";
		mysql_query($cmd);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
<!--
#Layer11 {position:absolute;
	left:2px;
	top:5px;
	width:997px;
	height:755px;
	z-index:9;
}
#Layer14 {position:absolute;
	left:23px;
	top:0px;
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
.style16 {color: #FF0000}
-->
</style>

</head>

<body>
		<table cellspacing="1" width="100%" class="table table-bordered">
        	<thead>
			<tr bgcolor="#B2DFFF">
				<th>ประเภทห้อง</th>
				<th>จำนวนห้อง</th>
                <th></th>
			</tr>
            </thead>
            <tbody>
          <?php
	$a=1;
    $cmd = "select room_type.name, count(meetingroom_croom.cr_id) as a, room_type.id,mid(room_type.lastupdate,1,10) as b  
	from meetingroom_croom
	right join room_type on (meetingroom_croom.parent = room_type.id)
	where room_type.trash = '0'
	group by room_type.name, room_type.id
	order by room_type.id asc";
	#mysql_query($cmd,$link);
	$result = mysql_query($cmd);
	$swap="1";
	while($row=mysql_fetch_assoc($result))
	{
		if($swap=="1"){
			$color="";
			$swap="2";
		}else{
			$color="#C9D1CD";
			$swap="1";
		}
			#echo $a; ?>
			<tr bgcolor="<?php echo $color; ?>">
				<td><span style="background:<?php echo $row["color"]; ?>"><?php echo $row["name"]; ?></span></td>
				<td align="center"><?php echo $row["a"]; ?></td>
                <td align="center">
                	<div class="btn-group btn-group-sm">
                		<a href="room_cate.php?keyId=<?php echo $row["id"]; ?>" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a>
                		<a href="admin/inc/del.php?keyId=<?php echo $row["id"]; ?>" onClick="return confirm('ยืนยันการลบรายการ');" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i> ลบ</a>
                	</div>
                </td>
				 </tr>
			<?php
			#$a++;
	}		
	#mysql_close($link);
?>
	</tbody>
</table>

</body>
</html>
