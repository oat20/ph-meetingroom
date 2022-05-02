<?php
session_start();

include("bookingroom/config.php");
include("bookingroom/inc/checksession.inc.php");
include("bookingroom/connect/connect.php");
include("bookingroom/inc/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php include("bookingroom/css-inc.php");?>
<style type="text/css">
<!--
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
-->
</style>
</head>

<body>
<?php include("bookingroom/navbar-inc.php");?>

<div class="container">

	<?php if($_SESSION['userType'] == 3){ ?>
    
    	<div class="row">
        	<div class="col-sm-12">
            
            <div class="panel panel-default">
                	<div class="panel-body">
                    
                    	<div class="blog_title2"><a href="3_controlpanel.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> กรอกแบบฟอร์ม</div>
<blockquote>
  <p>รายละเอียดการจอง</p>
</blockquote>
	<?php
		$sql4="select *, DATE_FORMAT(Dater, '%d/%m/%Y') as booking_date, DATE_FORMAT(created, '%d/%m/%Y') as created_date  
		from meetingroom_userq
		where uq_id = '$_GET[uq_id]'";
		$rs4=mysql_query($sql4);
		$ob4=mysql_fetch_assoc($rs4);
		$condition = explode("/",$ob4["book_condition"]);
	?>
	<table border="0" class="table table-striped">
    <tbody>
    	<tr>
        	<th>ลงวันที่:</th>
            <td><?php echo $ob4["created_date"];?></td>
        </tr>
    	<tr>
        	<td><strong>ผู้จอง:</strong></td>
            <td>
				<?php
				$org = mysql_query("select * from organization
				where DeID = '$ob4[DeID]'");
				$org2 = mysql_fetch_assoc($org);
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
			$croom = mysql_query("select * from meetingroom_croom
			inner join meetingroom_tableformat on (meetingroom_croom.tf_id = meetingroom_tableformat.tf_id)
			where meetingroom_croom.cr_id = '$ob4[cr_id]'");
			$croom2 = mysql_fetch_assoc($croom);
			echo $croom2["name"].' '.$croom2["cr_number"].' ('.$croom2["location"].')';
            ?>
        </td>
	</tr>
	<tr> 
		<td><strong>วัตถุประสงค์:</strong></td>
		<td>
        	<dl class="dl-horizontal">
			<?php
			$objective = mysql_query("select * from meetingroom_objective
			where ob_id = '$ob4[ob_id]'");
			$objective2 = mysql_fetch_assoc($objective);
			echo '<dt>'.$objective2["ob_title"].'</dt>
				<dd>'.$ob4["title"].'</dd>'; 
			?>
            </dl>
        </td>
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
		$snack = mysql_query("select * from meetingroom_snack
		inner join meetingroom_snack2 on (meetingroom_snack.food_id = meetingroom_snack2.food_id)
		where meetingroom_snack2.uq_id = '$ob4[uq_id]'
		order by meetingroom_snack.food_id asc");
		$snack2 = mysql_fetch_assoc($snack);
		echo '<li>&raquo; '.$snack2["food"].'</li>'; 
		?>
        	</ul>
        </td>
	</tr>
	<tr>
		<td><strong>อุปกรณ์ที่ต้องการใช้:</strong></td>
		<td>
        	<ul class="list-inline">
			<?php
			$media = mysql_query("select * from meetingroom_media
			inner join meetingroom_mediarelation on (meetingroom_media.media_id = meetingroom_mediarelation.media_id)
			where meetingroom_mediarelation.uq_id = '$ob4[uq_id]'
			order by meetingroom_media.media_id asc");
			while($media2 = mysql_fetch_assoc($media)){
			   echo '<li>&raquo; '.$media2["media"].'</li>';
			}
			?>
            </ul>
        </td>
	</tr>
    
    <tr>
		  <td><strong>รูปแบบการจัดโต๊ะ:</strong></td>
		  <td>
		  	<?php
			$sqlTable = mysql_query("select * from meetingroom_tableformat
			where tf_id = '$ob4[tf_id]'");
			$obTable = mysql_fetch_assoc($sqlTable);
			echo $obTable["tf_title"];
            ?>
          </td>
	  </tr>
		<tr>
		  <td><strong>รูปแบบการจัดอาหาร:</strong></td>
		  <td>
		  	<?php
			$sqlFood = mysql_query("select * from meetingroom_foodformat
			where ff_id = '$ob4[ff_id]'");
			$obFood = mysql_fetch_assoc($sqlFood);
			echo $obFood["ff_title"];
            ?>
          </td>
	  </tr>
		<tr> 
			<td><strong>เงื่อนไขการใช้:</strong></td>
			<td>
				<?php
				$condition2 = mysql_query("select * from room_condition_charges
				where id = '".trim($condition["0"])."'");
				$condition3 = mysql_fetch_assoc($condition2);
				echo '<strong>'.$condition3["name"].'</strong> '.$condition["1"];
				?>
            </td>
		</tr>
		<tr>
		  <td valign="top"><strong>รายละเอียดเพิ่มเติม:</strong></td>
		  <td><?php echo $ob4["optionss"];?></td>
	  </tr>
      </tbody>
	</table>
    
    <div class="blog_title2">สถานภาพ</div>
    <dl class="dl-horizontal">
    	<dt>รับเรื่องจากผู้จอง:</dt>
  		<dd><?php echo $cf_status_recive[$ob4["status1"]];?></dd>
        
  		<dt>เลขานุการคณะฯ อนุมัติ:</dt>
  		<dd><?php echo $cf_msgicon2[$ob4["confirm"]];?></dd>
        
        <dt>ยกเลิก:</dt>
  		<dd><?php echo $cf_yn2[$ob4["uq_cancel"]];?></dd>     
	</dl>
    
    <div class="btn-group btn-group-justified btn-group-lg">
    	<a href="3_bookingupdate.php?uq_id=<?php echo $ob4["uq_id"];?>" class="btn btn-default"><i class="fa fa-edit"></i> แก้ไข</a>
        <a href="3_bookingall.php" class="btn btn-default"><i class="fa fa-check"></i> ยืนยัน</a>
    </div>
    				</div><!--panel-body-->
                </div><!--panel-->
    
    		</div><!--col-->
    	</div><!--row-->
    
    <?php
	}else{
		include("bookingroom/alert-permission-inc.php");
	}
	?>
    
    </div><!--container-->
    
    <?php include("bookingroom/js-inc.php");?> 
</body>
</html>
