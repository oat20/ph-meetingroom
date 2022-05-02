<?php
$action=$_POST[action];
$text1=$_POST[text1];
$text2=$_POST[text2];
#$myColorFld=$_POST[myColorFld];
$filename=$HTTP_POST_FILES['picdata']['name'];

if($action == "add"){
#$lastupdate = date("Y-m-d H:i:s");
	if($filename != ""){
		$filenewcon=strstr($filename,'.');
		$file2=date("YmdHis").$filenewcon;
		copy($picdata,"img/room/".$file2) or die( "ไมาสามารถ Copy " );
		$cmd= "insert into meetingroom_croom (name, net, picData) 
		values ('$text1','$text2','$file2')";
		mysql_query($cmd);
	}else{
		$cmd= "insert into meetingroom_croom (name, net, picData) 
		values ('$text1','$text2','blank.jpg')";
		mysql_query($cmd);
	}

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
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
.style16 {color: #FF0000}
-->
</style>

<script type="text/javascript" src="../POPcolors/202pop.js"></script>
<link rel='stylesheet' href='../POPcolors/style.css'>
</head>

<body>
<?php
$sql="select * from meetingroom_croom
where parent=0
order by cr_id asc";
$rs=mysql_query($sql);
while($ob=mysql_fetch_array($rs)){
	$parent_id=$ob[cr_id];
?>
<fieldset>
	<legend><?php print $ob[name]; ?></legend>
		<table width="100%" cellspacing="1">
			<tr bgcolor="#B2DFFF">
            	<!--<th>&nbsp;</th> -->
				<th>ห้อง</th>
				<th>ความจุ (คน)</th>
                <th>ประเภท</th>
                <th>&nbsp;</th>
			</tr>
          <?
	$a=1;
    $cmd = "select meetingroom_croom.name as a1, room_type.name as a2, meetingroom_croom.net 
	from room_type left join meetingroom_croom on(room_type.id=meetingroom_croom.parent)
	order by meetingroom_croom.cr_id asc";
	#mysql_query($cmd,$link);
	$result = mysql_query($cmd);
	$swap="1";
	while($row=mysql_fetch_array($result))
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
				<!--<td><a href="#" onClick="NewWin=window.open('admin3-1.php?No=<?php #echo $row[0]; ?>','NewWin','toolbar=no,status=no,width=300,height=200'); "><?php #echo $row["0"]; ?></a></td> -->
                <!--<td align="center"><img src="../bookingroom/img/room/<?php #print $row[picData]; ?>" class="img_size100" /></td> -->
				<td><span style="background:<?php echo $row["color"]; ?>"><a href="room.php?key_cid=<?php echo $row["cr_id"]; ?>&mode=add"><?php echo $row["a1"]; ?></a></span></td>
				<td align="center"><?php echo $row["net"]; ?></td>
                <td><?php echo $row["a2"]; ?></td>
                <td align="center"><a href="room.php?key_cid=<?php echo $row["cr_id"]; ?>&mode=add">แก้ไข</a><!-- | <a href="delroom.php?key_cid=<?php #echo $row["cid"]; ?>" onClick="return confirm('ยืนยันการลบรายการ');">ลบ</a> --></td>
				 </tr>
			<?php
			#$a++;
	}		
	#mysql_close($link);
?>
</table>
</fieldset>
<br/>
<?php } ?>
</body>
</html>
