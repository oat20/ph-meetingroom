<style type="text/css">
<!--
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
<table width="100%" cellspacing="0" class="table table-hover">
	<thead>
	<tr>
    	<th>#</th>
        <th>ส่วนงาน</th>
        <th>เบอร์ภายใน</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
				$cmd = "SELECT organization.DeID, organization.Fname, organization.tel, organization.email,count( jos_users.id ) AS count_user
FROM organization
LEFT JOIN jos_users ON ( organization.DeID = jos_users.DeID )
GROUP BY organization.DeID, organization.Fname,organization.tel, organization.email
ORDER BY organization.DeID ASC";
				$result = mysql_query($cmd);
				while($row=mysql_fetch_array($result))
				{
					$fname=$row['Fname'];
					$tel=$row['tel'];
					++$i;
				?>
    <tr>
    	<td class="td2"><?php echo $row["DeID"];?></td>
        <td class="td2"><?php echo $fname;?></td>
        <td class="td2"><?php echo $tel;?></td>
        <td class="td2">
        	<div class="btn-group btn-group-sm">
<a href="<?php echo $_SERVER['PHP_SELF'];?>?key_dp_id=<?php echo $row["DeID"]; ?>" title="แก้ไข" class="btn btn-default"><i class="fa fa-edit"></i> แก้ไข</a>
                <a href="bookingroom/department/delorg.php?key_dp_id=<?php echo $row["DeID"]; ?>&action=del" onClick="return confirm('ยืนยันการลบรายการ');" title="ลบ" class="btn btn-default"><i class="fa fa-times"></i> ลบ</a>
                </div>
                </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
      