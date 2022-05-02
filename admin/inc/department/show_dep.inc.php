<style type="text/css">
<!--
body,td,th {
	font-family: "Courier New", Courier, monospace, tahoma, "ms sans serif";
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
-->
</style>
</head>

<body>
<table cellspacing="0">
	<?php
	$org="select DeID,Fname
	from organization
	where Type='0'
	order by DeID asc";
	$rs_org=mysql_query($org);
	while($ob_org=mysql_fetch_array($rs_org))
	{
		$id=$ob_org['DeID'];
		$name=$ob_org['Fname'];
	?>
	<tr>
    	<td colspan="3" class="td1"><?=$name;?></td>
    </tr>
	<tr>
    	<th class="colhd">&nbsp;</th>
        <th class="colhd">ภาควิชา/ส่วนงาน</th>
        <th class="colhd">เบอร์โทรศัพท์</th>
    </tr>
    <?php
				$cmd = "select DeID,Fname,tel from organization
				where Type='$id'
				ORDER BY DeID ASC";
				$result = mysql_query($cmd);
				$swap=1;
				while($row=mysql_fetch_array($result))
				{
					if($swap=="1"){
				$color="";
				$swap="2";
			}else{
				$color="#C9D1CD";
				$swap="1";
			}
				?>
    <tr bgcolor="<?php print $color; ?>">
    	<td align="center" class="tbcol1"><a href="org.php?key_dp_id=<?php echo $row["DeID"]; ?>&mode=add" title="แก้ไข"><img src="../bookingroom/img/edit_icon.gif" border="0"></a> <a href="department/delorg.php?key_dp_id=<?php #echo $row["DeID"]; ?>" onClick="return confirm('ยืนยันการลบรายการ');" title="ลบ"><img src="../bookingroom/img/delete_icon.gif" border="0"></a></td>
        <td class="tbcol1"><?php print $row["Fname"]; ?> </td>
        <td class="tbcol1"><?php print $row["tel"]; ?> </td>
    </tr>
    <?php
	}
	}
	?>
</table>
