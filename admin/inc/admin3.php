<?php
		  #include"config.php";
#include"connect/connect.php";

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

<script type="text/javascript" src="POPcolors/202pop.js"></script>
<link rel='stylesheet' href='POPcolors/style.css'>
</head>

<body>
		<table cellspacing="0" width="100%">
        <?php
		$room_type="select id,name from room_type
		order by id asc";
		$rs_room_type=mysql_query($room_type);
		while($ob_room_type=mysql_fetch_array($rs_room_type))
		{
			$id=$ob_room_type['id'];
			$name=$ob_room_type['name'];
		?>
        <tr>
        	<td colspan="6" class="td1"><?=$name;?></td>
        </tr>
	  <tr bgcolor="#B2DFFF">
      	<td class="colhd">&nbsp;</td>
        <td class="colhd">&nbsp;</td>
            	<!--<th>ใช้งาน</th> -->
		<td class="colhd">ห้อง</td>
		<td class="colhd">ความจุ<br/>(คน)</td>
        <!--<td class="colhd">ประเภท</td> -->
        <td class="colhd">แก้ไขล่าสุด</td>
                        <td class="colhd">ID</td>
        </tr>
          <?
	$a=1;
    $cmd = "select *,meetingroom_croom.name, room_type.name as a 
	from meetingroom_croom
	left join jos_users on (meetingroom_croom.created_by = jos_users.id)
	inner join room_type on (meetingroom_croom.parent = room_type.id)
	where meetingroom_croom.parent='$id'
	order by meetingroom_croom.cr_id asc";
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
            	 <td class="tbcol1"><a href="room.php?mode=add&key_cid=<?php print $row[cr_id]; ?>" title="แก้ไข"><img src="../bookingroom/img/edit_icon.gif" border="0"></a></td>
                 <td class="tbcol1"><a href="inc/room/delroom.php?key_cid=<?php print $row[cr_id]; ?>" onClick="return confirm('ยืนยันการลบรายการ');" title="ลบ"><img src="../bookingroom/img/delete_icon.gif" border="0"></a></td>
            	<!--<td align="center"><?php #print active($row["enable"]); ?></td> -->
                <td class="tbcol1"><?php echo $row["name"]; ?></td>
				<td class="tbcol1"><?php echo $row["net"]; ?></td>
                <!--<td class="tbcol1"><?php #print $row["a"]; ?></td> -->
                <td class="tbcol1"><?php print $row["dater"]; ?></td>
                <td class="tbcol1"><?php print $row["cr_id"]; ?></td>
				 </tr>
			<?php
			#$a++;
	}
	}		
	#mysql_close($link);
?>
</table>
</body>
</html>
