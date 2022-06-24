<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
#Layer1 {
	position:absolute;
	left:6px;
	top:7px;
	width:818px;
	height:893px;
	z-index:1;
}
a:link {
	color: #0066CC;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0066CC;
}
a:hover {
	text-decoration: none;
	color: #33CCFF;
}
a:active {
	text-decoration: none;
	color: #33CCFF;
}
#Layer14 {position:absolute;
	left:1px;
	top:50px;
	width:682px;
	height:158px;
	z-index:12;
}
</style>
</head>

<body>
<blockquote>
  <p>รายละเอียดการจอง</p>
</blockquote>
	<?php
		$sql4="select *, DATE_FORMAT(Dater, '%d/%m/%Y') as booking_date  
		from meetingroom_userq
		where uq_id = '$_GET[uq_id]'";
		$rs4=mysqli_query($mysqli, $sql4);
		$ob4=mysqli_fetch_assoc($rs4);
		$condition = explode("/",$ob4["book_condition"]);
	?>
	<table border="0" class="table table-striped">
    <tbody>
    	<tr>
        	<td><strong>ผู้จอง:</strong></td>
            <td>
				<?php
				$org = mysqli_query($mysqli, "select * from organization
				where DeID = '$ob4[DeID]'");
				$org2 = mysqli_fetch_assoc($org);
				echo $ob4["uname"].'<br>'.$org2["Fname"].' โทร. '.$ob4["phone"]; 
				?>
            </td>
        </tr>
	<tr>
		<td><strong>วันที่จอง :</strong></td>
		<td><?php echo $ob4["booking_date"]; ?></td>
	</tr>
	<tr>
		<td><strong>ช่วงเวลา :</strong></td>
		<td><?php echo $ob4["time_in"]; ?> - <?php echo $ob4["time_out"]; ?></td>
	</tr>
      <tr> 
	  	<td><strong>ขอใช้ห้อง:</strong></td>
		<td>
			<?php
			$croom = mysqli_query($mysqli, "select * from meetingroom_croom
			inner join meetingroom_tableformat on (meetingroom_croom.tf_id = meetingroom_tableformat.tf_id)
			where cr_id = '$ob4[cr_id]'");
			$croom2 = mysqli_fetch_assoc($croom);
			echo $croom2["name"].' ('.$croom2["tf_title"].')';
            ?>
        </td>
	</tr>
	<tr> 
		<td><strong>วัตถุประสงค์:</strong></td>
		<td>
        	<dl class="dl-horizontal">
			<?php
			$objective = mysqli_query($mysqli, "select * from meetingroom_objective
			where ob_id = '$ob4[ob_id]'");
			$objective2 = mysqli_fetch_assoc($objective);
			echo '<dt>'.$objective2["ob_title"].'</dt>
				<dd>'.$ob4["title"].'</dd>'; 
			?>
            </dl>
        </td>
	</tr>
    <tr>
    	<td><strong>รายละเอียดผู้จัด / เจ้าของงาน:</strong></td>
        <td><?php print $ob4['uq_owner'];?></td>
    </tr>
	<tr> 
		<td><strong>จำนวนผู้เข้าร่วม:</strong></td>
		<td><?php echo $ob4["detail"]; ?> ท่าน</td>
	</tr>
	<tr>
		<td><strong>จัดอาหารว่าง:</strong></td>
		<td>
        	<ul class="list-inline">
		<?php
		$snack = mysqli_query($mysqli, "select * from meetingroom_snack
		inner join meetingroom_snack2 on (meetingroom_snack.food_id = meetingroom_snack2.food_id)
		where meetingroom_snack2.uq_id = '$ob4[uq_id]'
		order by meetingroom_snack.food_id asc");
		$snack2 = mysqli_fetch_assoc($snack);
		echo '<li>&raquo; '.$snack2["food"].'</li>'; 
		?>
        	</ul>
            <?php echo $ob4['uq_snacknote'];?>
        </td>
	</tr>
	<tr>
		<td><strong>อุปกรณ์ที่ต้องการใช้:</strong></td>
		<td>
        	<ul class="list-inline">
			<?php
			$media = mysqli_query($mysqli, "select * from meetingroom_media
			inner join meetingroom_mediarelation on (meetingroom_media.media_id = meetingroom_mediarelation.media_id)
			where meetingroom_mediarelation.uq_id = '$ob4[uq_id]'
			order by meetingroom_media.media_id asc");
			while($media2 = mysqli_fetch_assoc($media)){
			   echo '<li>&raquo; '.$media2["media"].'</li>';
			}
			?>
            </ul>
        </td>
	</tr>
    <tr>
    	<th>รูปแบบการจัดโต๊ะ:</th>
        <td>
        	<?php
			$sqlTable = mysqli_query($mysqli, "select * from meetingroom_tableformat
			where tf_id = '$ob4[tf_id]'");
			$obTable = mysqli_fetch_assoc($sqlTable);
			echo $obTable["tf_title"];
			?>
        </td>
    </tr>
		<!--<tr>
		  <td><strong>รูปแบบการจัดอาหาร:</strong></td>
		  <td>
		  	<?php
			/*$sqlFood = mysql_query("select * from meetingroom_foodformat
			where ff_id = '$ob4[ff_id]'");
			$obFood = mysql_fetch_assoc($sqlFood);
			echo $obFood["ff_title"];*/
			?>
          </td>
	  </tr>-->
		<tr> 
			<td><strong>เงื่อนไขการใช้:</strong></td>
			<td>
				<?php
				$condition2 = mysqli_query($mysqli, "select * from room_condition_charges
				where id = '".trim($condition["0"])."'");
				$condition3 = mysqli_fetch_assoc($condition2);
				echo $condition3["name"].' '.$condition["1"];
				?>
            </td>
		</tr>
		<tr>
		  <td valign="top"><strong>รายละเอียดเพิ่มเติม:</strong></td>
		  <td><?php echo $ob4["optionss"];?></td>
	  </tr>
      </tbody>
	</table>
    
    <div class="btn-group btn-group-justified btn-group-lg">
    	<a href="<?php echo $_SERVER['PHP_SELF'];?>?mode=update&uq_id=<?php echo $ob4["uq_id"];?>" class="btn btn-default"><i class="fa fa-edit"></i> แก้ไข</a>
        <!--<a href="bookingroom/booking_detail2_pdf.php?uq_id=<?php //echo $ob4["uq_id"];?>" class="btn btn-default" target="new"><i class="fa fa-print"></i> พิมพ์ใบจอง</a>-->
        <a href="mybooking.php" class="btn btn-default"><i class="fa fa-check"></i> ยืนยันการจอง</a>
        <a href="mybooking.php" class="btn btn-default"><i class="fa fa-list"></i> ประวัติการจอง</a>
    </div> 
</body>
</html>
