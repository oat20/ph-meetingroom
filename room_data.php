<?php
session_start();

include("bookingroom/config.php");
include("bookingroom/connect/connect.php");
include("bookingroom/inc/function.php");
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

<div class="container">

	<div class="row">
    	<div class="col-sm-12">
        
        	<?php
			$sql = mysql_query("select * from meetingroom_croom
			where cr_id = '$_GET[keyID]'");
			$ob = mysql_fetch_assoc($sql);
			?>
        	<div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><i class="fa fa-list" aria-hidden="true"></i> ข้อมูลห้อง</h3>
                    <div class="pull-right">
                    	<?php
						if(isset($_SESSION['u'])){
                    		echo '<a href="formbooking.php?keyID='.$ob["cr_id"].'" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> จองห้องนี้</a>';
						}
						?>
                    </div>
                </div>
                <div class="panel-body">
                	<blockquote>
  						<p class="activity-font20" style="background-color:<?php echo $ob["color"];?>"><?php echo $ob["name"];?></p>
					</blockquote>
                	<div class="table-repsonsive">
                    	<table class="table table-bordered">
                        	<tbody>
                            	<tr>
                                	<td><strong>ชื่อห้อง:</strong></td>
                                    <td><?php echo '<div class="activity2" style="background-color:'.$ob["color"].'">'.$ob["name"].'</div>';?></td>
                                    <td><strong>ประเภท:</strong></td>
                                    <td>
                                    	<?php
										$sql2 = mysql_query("select * from room_type
										where id = '$ob[parent]'");
										$ob2 = mysql_fetch_assoc($sql2);
										echo $ob2["name"]; 
										?>
                                  </td>
                                </tr>
                                <tr>
                                	<td><strong>ที่นั่ง:</strong></td>
                                    <td><?php echo $ob["net"];?></td>
                                    <td><strong>รูปแบบที่นั่ง:</strong></td>
                                    <td>
                                    	<?php
										$sql3 = mysql_query("select * from meetingroom_tableformat
										where tf_id = '$ob[tf_id]'");
										$ob3 = mysql_fetch_assoc($sql3);
										echo $ob3["tf_title"].'<br><small>เปลี่ยนรูปการจัดโต๊ะได้ '.$cf_yn2[$ob['cr_tablechange']].'</small>';
										?>
                                  </td>
                                </tr>
                                <tr>
                                	<td><strong>อัตราค่าบำรุงรักษา:</strong></td>
                                    <td>
                                    	<?php
                                    	echo '<p>ครึ่งวัน '.number_format($ob["cr_price_halfday"]).' บาท</p>';
                                        echo '<p>เต็มวัน '.number_format($ob["cr_price_fullday"]).' บาท</p>';
										?>
                                  </td>
                                    <td><strong>หมายเลขห้อง:</strong></td>
                                    <td><?php echo $ob["cr_number"];?></td>
                                </tr>
                                <tr>
                                	<td><strong>อุปกรณ์ภายในห้อง:</strong></td>
                                    <td colspan="3">
                                    	<?php
										$sql4 = mysql_query("select * from meetingroom_croom_media
										inner join meetingroom_media on (meetingroom_croom_media.media_id = meetingroom_media.media_id)
										where meetingroom_croom_media.cr_id = '$ob[cr_id]'
										order by meetingroom_media.media_id asc");
										while($ob4 = mysql_fetch_assoc($sql4)){
											echo '<i class="fa fa-check-circle" aria-hidden="true"></i> '.$ob4["media"].' ';
										}
										?>
                                    </td>
                                </tr>
                                <tr>
                                	<td><strong>ที่ตั้ง:</strong></td>
                                    <td colspan="3"><?php echo $ob["location"];?></td>
                                </tr>
                                <tr>
                                	<td colspan="4">
                                    	<div class="row">
                                    		<?php
											$sql5 = mysql_query("select * from meetingroom_croom_photo
											where cr_id = '$ob[cr_id]'");
											while($ob5 = mysql_fetch_assoc($sql5)){
												echo '<div class="col-sm-4">
															<a href="'.$livesite.'bookingroom/img/room/'.$ob5["cp_filename"].'" class="thumbnail" target="new"><img src="'.$livesite.'bookingroom/img/room/'.$ob5["cp_filename"].'" class="img-responsive"></a>
													</div>';
											}
										?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                	<td><strong>เบอร์ภายในห้อง:</strong></td>
                                    <td><?php echo $ob["cr_tel"];?></td>
                                    <td><strong>หมายเหตุ:</strong></td>
                                    <td><?php echo $ob["cr_note"];?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
						if(isset($_SESSION['u'])){
                    		echo '<a href="formbooking.php?keyID='.$ob["cr_id"].'" class="btn btn-primary btn-block btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> จองห้องนี้</a>';
						}
						?>
                    </div><!--table-responsive-->
                
                </div>
            </div>
        
        </div><!--col-12-->
    </div><!--row-->

</div>

<?php include("bookingroom/js-inc.php");?>
</body>
</html>