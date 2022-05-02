<?php
session_start();

include"../config.php";
include "../connect/connect.php";
include "function.php";

$ID = $_GET["keyID"];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $sitename; ?></title>
<?php include("../css-inc.php");?>
</head>

<body>
<?php include("../navbar-inc.php");?>

<div class="container">

	<div class="row">
    	<div class="col-sm-12">
        
        	<?php
       		$cmd = "select * from meetingroom_userq
	   		where uq_id = '$ID'";
			$result = mysql_query($cmd);
			$row=mysql_fetch_array($result);
			$condition = explode("/",$row[book_condition]);
			?>
        	<div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><i class="fa fa-info-circle" aria-hidden="true"></i> รายละเอียดการจอง</h3>
                    <div class="pull-right">
                    	<div class="btn-group">
                        	<a href="../../mybooking.php" title="แสดงรายละเอียด" class="btn btn-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
        					<a href="../booking_detail2_pdf.php?<?php echo"uq_id=$row[uq_id]"?>" target="new" class="btn btn-primary"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

		<blockquote>
  			<p class="lead"><?php print $row[title]; ?></p>
		</blockquote>
      <table width="100%" class="table table-bordered table-striped">
      	<tbody>
      	<tr>
        	<td class="text-right"><strong>วันที่</strong></td>
            <td><?php print dateThai($row[Dater]); ?> เวลา <?php print $row["time_in"]." - ".$row["time_out"]; ?></td>
        </tr>
        <tr>
        	<td class="text-right"><strong>ห้อง</strong></td>
            <td>
            	<?php
				$sql2 = mysql_query("select * from meetingroom_croom
				where cr_id = '$row[cr_id]'");
				$ob2 = mysql_fetch_assoc($sql2);
				echo '<div class="activity2" style="background-color:'.$ob2["color"].'">'.$ob2["name"].' ('.$ob2["location"].')</div>';
				?>
            </td>
        </tr>
        <tr>
        	<td valign="top" class="text-right"><strong>ผู้จอง</strong></td>
            <td><?php
				$org = mysql_query("select * from organization
				where DeID = '$row[DeID]'");
				$org2 = mysql_fetch_assoc($org);
				echo $row["uname"].'<br>'.$org2["Fname"].' โทร. '.$row["phone"]; 
				?></td>
        </tr>
        <tr>
        	<td class="text-right"><strong>จำนวนผู้ใช้</strong></td>
            <td><?php print $row[detail]; ?> ท่าน</td>
        </tr>
        <tr>
          <td valign="top" class="text-right"><strong>อาหารว่าง</strong></td>
          <td>
          	<?php
			$cmd3="select * from meetingroom_snack, meetingroom_snack2
			where meetingroom_snack.food_id = meetingroom_snack2.food_id
			and meetingroom_snack2.uq_id = '$row[uq_id]'
			order by meetingroom_snack.food_id asc";
			$rs3=mysql_query($cmd3);
			while($ob3=mysql_fetch_array($rs3)){
				print '<i class="fa fa-check-circle" aria-hidden="true"></i> '.$ob3[food]."<br/>";
			}
			echo $row['uq_snacknote'];
			?>
          </td>
        </tr>
        <tr>
          <td valign="top" class="text-right"><strong>อุปกรณ์ที่ต้องการใช้</strong></td>
          <td>
          	<?php
		  	$cmd4="select * from meetingroom_media, meetingroom_mediarelation
			where meetingroom_media.media_id=meetingroom_mediarelation.media_id
			and meetingroom_mediarelation.uq_id='$row[uq_id]'
			order by meetingroom_media.media_id asc";
			$rs4=mysql_query($cmd4);
			while($ob4=mysql_fetch_array($rs4)){
				print '<i class="fa fa-check-circle" aria-hidden="true"></i> '.$ob4[media]."<br/>";
			}
		  	?>
          </td>
        </tr>
        <tr>
        	<th class="text-right">รูปแบบการจัดโต๊ะ</th>
            <td>
            	<?php
				$sqlTable = mysql_query("select * from meetingroom_tableformat
				where tf_id = '$row[tf_id]'");
				$obTable = mysql_fetch_assoc($sqlTable);
				echo $obTable["tf_title"];
				?>
                </ul>
            </td>
        </tr>
        <!--<tr>
        	<th class="text-right">รูปแบบจัดอาหาร</th>
            <td>
            	<?php
				/*$food = mysql_query("select * from meetingroom_foodformat
				where ff_id = '$row[ff_id]'");
				$food2 = mysql_fetch_assoc($food);
				echo $food2["ff_title"];*/
				?>
                </ul>
            </td>
        </tr>-->
        <tr>
          <td class="text-right"><strong>เงื่อนไขการใช้</strong></td>
          <td>
          <?php
		  $sql5="select * from room_condition_charges
		  where id = '$condition[0]'";
		  $rs5=mysql_query($sql5);
		  $ob5=mysql_fetch_array($rs5);
		  print '<strong>'.$ob5[name]."</strong><br/>".$condition[1];
		  ?>
          </td>
        </tr>
        <tr>
          <td class="text-right"><strong>สถานะภาพ</strong></td>
          <td><?php 
		  	$sql6 = mysql_query("select * from book_status
			where sta_id = '$row[status1]'");
			$ob6 = mysql_fetch_assoc($sql6);
			echo $ob6["sta"];
		  ?></td>
        </tr>
        </tbody>
      </table>
      
      <legend>สถานภาพ</legend>
      <dl class="dl-horizontal">
  		<dt>เลขานุการคณะฯ อนุมัติ:</dt>
  		<dd><?php echo $cf_msgicon2[$row["confirm"]];?></dd>
        <dt>รับเรื่องจากผู้จอง:</dt>
  		<dd><?php echo $cf_status_recive[$row["status1"]];?></dd>
	</dl>
      
      			</div><!--panel-body-->
                
                <!--<div class="panel-footer">
      				<div class="btn-group btn-group-justified">
            			<a href="../../mybooking.php" title="แสดงรายละเอียด" class="btn btn-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>
        				<a href="../booking_detail2_pdf.php?<?php //echo"uq_id=$ob2[uq_id]"?>" target="new" class="btn btn-primary"><i class="fa fa-print"></i> พิมพ์</a>
      				</div>
      			</div>--><!--panel-footer-->
      		</div><!--panel-->
      
      	</div><!--col-12-->
      </div><!--row-->
      
</div><!--container-->

<?php include("../js-inc.php");?>
</body>
</html>
