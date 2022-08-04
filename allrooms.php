<?php
session_start();

include"bookingroom/config.php";
require_once './bookingroom/mysqli_connect.php';
include("bookingroom/inc/function.php");
//include("bookingroom/connect/connect.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $sitename;?></title>
<?php include("bookingroom/css-inc.php");?>
</head>

<body>
<?php include("bookingroom/navbar-inc.php");?>

<div class="container-fluid">

	<div class="row">
    
    	<div class="col-sm-12">
        
        	<!--record room-->
            <?php
						$cmd = "SELECT *, meetingroom_croom.name as a, room_type.name as b
						FROM meetingroom_croom
						INNER JOIN room_type ON ( meetingroom_croom.parent = room_type.id )
						where meetingroom_croom.enable = '1' 
						ORDER BY meetingroom_croom.cr_id ASC";
						$result = mysqli_query($mysqli, $cmd);
						$total = mysqli_num_rows($result);
						?>
        	<div class="panel panel-primary">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><i class="fa fa-bars" aria-hidden="true"></i> รายการห้อง</h3>
                    <?php
					echo '<div class="pull-right"><strong>เปิดใช้ทั้งหมด '.$total.' ห้อง</strong></div>';
					/*if(isset($_SESSION['u']) and $_SESSION['userType'] == 3){
                   		echo '<div class="pull-right">
                    		<a href="bookingroom/room/room.php" class="btn btn-default btn-lg"><i class="fa fa-plus"></i> เพิ่มรายการห้อง</a>
                    	</div>';
					}*/
					?>
                </div>
                <div class="panel-body">
                	
                    <div class="table-reponsive">                  	
                    	<table width="100%" cellspacing="1" class="table table-bordered">
        	<thead>
			<tr bgcolor="#B2DFFF">
			  <th>ชื่อห้อง</th>
			  <th>จำนวนที่นั่ง</th>
			  <th>ที่ตั้ง</th>
			  <th>หมายเลขห้อง</th>
			  <th>ประเภทห้อง</th>
			  <th>รูปแบบที่นั่ง</th>
			  <th colspan="2"><strong>อัตราค่าบำรุงรักษา</strong></th>
			  <th>หมายเหตุ</th>
			  <th>Actions</th>
			  </tr>
            </thead>
            <tbody>
          <?php
	$a=1;
	$swap="1";
	while($row=mysqli_fetch_assoc($result))
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
				<td><div class="activity2" style="background-color:<?php echo $row["color"];?>"><?php echo $row["a"]; ?></div></td>
				<td><?php echo $row["net"]; ?></td>
                <td><?php echo $row["location"]; ?></td>
                <td><?php echo $row["cr_number"];?></td>
                <td><?php echo $row["b"];?></td>
                <td>
                	<?php
					$sql2 = mysqli_query($mysqli, "select * from meetingroom_tableformat
					where tf_id = '$row[tf_id]'");
					$ob2 = mysqli_fetch_assoc($sql2);
					//echo '<a href="'.$livesite.'bookingroom/img/room/'.$ob2["tf_photo"].'" target="new">'.$ob2["tf_title"].'</a>';
					echo $ob2["tf_title"].'<br><small>เปลี่ยนรูปการจัดโต๊ะได้ '.$cf_yn2[$row['cr_tablechange']].'</small>';
					?>
                </td>
                <td>ครึ่งวัน <?php echo number_format($row["cr_price_halfday"]);?> บาท</td>
                <td>เต็มวัน <?php echo number_format($row["cr_price_fullday"]);?> บาท</td>
				<td><?php echo $row['cr_note'];?></td>
                	<td>
                    	<div class="btn-group">
                        	<a href="room_data.php?keyID=<?php echo $row["cr_id"];?>" class="btn btn-primary"><i class="fa fa-external-link" aria-hidden="true"></i> รายละเอียด</a>
                            <a href="calendar-room.php?cr_id=<?php print $row['cr_id'];?>" class="btn btn-primary"><i class="fa fa-calendar"></i> รายการจอง</a>
                        	<?php
							if(isset($_SESSION['u'])){
								echo '<a href="formbooking.php?keyID='.$row["cr_id"].'" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> จองห้องนี้</a>';
								/*if($_SESSION['userType'] == 3){
									echo '<a href="bookingroom/room/room.php?key_cid='.$row["cr_id"].'" class="btn btn-default"><i class="fa fa-edit" aria-hidden="true"></i> แก้ไข</a>';
								}*/
							}
							?>                  		
                    	</div>
                    </td>
				 </tr>
			<?php
			#$a++;
	}		
	mysqli_close($mysqli);
?>
	</tbody>
</table>
                    </div><!--table-reponsive-->
                    
                </div><!--panel-body-->
            </div><!--panel-->
            <!--record room--> 
            
        </div><!--col-12-->
        
    </div><!--row-->
    
</div><!--container-->

<?php include("bookingroom/js-inc.php");?>
</body>
</html>