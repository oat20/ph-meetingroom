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
	top:36px;
	width:936px;
	height:299px;
	z-index:12;
}
#Layer15 {	position:absolute;
	left:22px;
	top:-1px;
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
	text-decoration: underline;
	color: #3399FF;
}
a:active {
	text-decoration: none;
	color: #3399FF;
}
.style3 {font-size: 12; }
-->
</style>
</head>

<body>
	<?php
		$sql="select * from meetingroom_media
		order by media_id asc";
		$rs=mysql_query($sql);
		$total=mysql_num_rows($rs);
		?>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table table-hover">
    	<thead>
      <tr>
      	<th>#</th>
		<th><div class="style3">อุปกรณ์เสริม</div></th>
        <th>Actions</th>
        </tr>
        </thead>
        <tbody>
	  <?php
		$a=1;
		while($ob=mysql_fetch_array($rs)){
	  ?>
      <tr>
      	<td><?php echo $ob["media_id"];?></td>
		<td><?php echo $ob["media"]; ?></td>
        <td>
        	<div class="btn-group btn-group-sm">
        <a href="media.php?media_id=<?php print $ob["media_id"]; ?>&mode=add" title="แก้ไข" class="btn btn-default"><i class="fa fa-edit" aria-hidden="true"></i> แก้ไข</a>
        <a href="bookingroom/media.php?media_id=<?php print $ob["media_id"]; ?>&action=del" onClick="return confirm('ยืนยันการลบรายการ');" title="ลบ" class="btn btn-default"><i class="fa fa-times" aria-hidden="true"></i> ลบ</a>
        	</div>
        </td>
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
      </tbody>
    </table>
