<?php
session_start();

include("../config.php");
include("../inc/checksession.inc.php");
include("../connect/connect.php");
include("../inc/function.php");

include("../css-inc.php");

include("../navbar-inc.php");
?>
<script  src="bookingroom/POPcolors/202pop.js" type="text/javascript"></script>
<div class="container">

	<ol class="breadcrumb">
  		<li><a href="3_controlpanel.php"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</a></li>
  		<li><a href="../../room.php">รายการห้อง</a></li>
	</ol>

	<?php
	if($_SESSION['userType'] == 3){
	?>

	<div class="row">
    	<div class="col-sm-12">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">เพิ่ม / แก้ไข ข้อมูลห้อง</h3>
                </div>
                <div class="panel-body">
        <?php
        	 $sql="select * from meetingroom_croom
			where cr_id='$_GET[key_cid]'";
			$rs=mysql_query($sql);
			$ob=mysql_fetch_array($rs);
        ?>
        <form id="form1" name="form1" method="post" action="admin3-2.php" enctype="multipart/form-data" class="form-horizontal">
        	<div class="form-group">
            	<label class="control-label col-sm-3"><strong>ชื่อห้อง:</strong> <span class="font8red">(จำเป็นต้องกรอก)</span></label>
                <div class="col-sm-9">
                	<input name="text1" type="text" id="text1" size="50" maxlength="100" class="form-control" value="<?php echo $ob["name"];?>" required>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>ประเภทห้อง:</strong></label>
                <div class="col-sm-9">
                	<?php
               		 //print "<select name='room_type' class='form-control' required>";
                	//print"<option value=''>- เลือกรายการ -</option>";
                $room_type="select * from room_type order by id asc";
                $rs_rt=mysql_query($room_type);
                while($ob_rt=mysql_fetch_array($rs_rt))
                {
                	if($ob["parent"] == $ob_rt["id"]){
                		//print "<option value='".$ob_rt[id]."' selected>- ".$ob_rt[name]."</option>";
						echo '<label class="radio-inline"><input type="radio" name="room_type" value="'.$ob_rt["id"].'" checked required> '.$ob_rt["name"].'</label> ';
                    }else{
                    	//print "<option value='".$ob_rt[id]."'>- ".$ob_rt[name]."</option>";
						echo '<label class="radio-inline"><input type="radio" name="room_type" value="'.$ob_rt["id"].'" required> '.$ob_rt["name"].'</label> ';
                    }
                }
                //print "</select>";
                ?>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>จำนวนรองรับ:</strong></label>
                <div class="col-sm-3">
                	<input name="net" type="number" id="text1" size="5" maxlength="3" value="<?php echo $ob["net"];?>" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>รูปแบบการจัดโต๊ะ:</strong></label>
                <div class="col-sm-9">
                	<?php
						$rs3 = mysql_query("select * from meetingroom_tableformat where tf_active = '1' and tf_trash = '0' order by tf_id asc");
						while($ob3 = mysql_fetch_assoc($rs3)){
                        	if($ob["tf_id"] == $ob3["tf_id"]){
								echo '<div class="radio"><label><input type="radio" value="'.$ob3['tf_id'].'" name="tf_id" checked required> '.$ob3['tf_title'].' <a href="'.$livesite.'bookingroom/img/room/'.$ob3['tf_photo'].'" target="new"><i class="glyphicon glyphicon-picture"></i> ตัวอย่าง</a></label></div>';
                            }else{
                            	echo '<div class="radio"><label><input type="radio" value="'.$ob3['tf_id'].'" name="tf_id" required> '.$ob3['tf_title'].' <a href="'.$livesite.'bookingroom/img/room/'.$ob3['tf_photo'].'" target="new"><i class="glyphicon glyphicon-picture"></i> ตัวอย่าง</a></label></div>';
                            }
						}
						?>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>สามารถเปลี่ยนรูปแบบการจัดโต๊ะได้</strong></label>
                <div class="col-sm-9">
                	<?php
					foreach($cf_yn2 as $k=>$v){
						if($k==$ob['cr_tablechange']){
							echo '<label class="radio-inline"><input type="radio" name="cr_tablechange" value="'.$k.'" checked required> '.$v.'</label>';
						}else{
							echo '<label class="radio-inline"><input type="radio" name="cr_tablechange" value="'.$k.'" required> '.$v.'</label>';
						}
					}
					?>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>อัตราค่าบำรุง (ครึ่งวัน):</strong></label>
                <div class="col-sm-9">
                	<input name="cr_price_halfday" type="number" class="form-control" value="<?php echo $ob["cr_price_halfday"];?>" required>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>อัตราค่าบำรุง (เต็มวัน):</strong></label>
                <div class="col-sm-9">
                	<input name="cr_price_fullday" type="number" class="form-control" value="<?php echo $ob["cr_price_fullday"];?>" required>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>หมายเลขห้อง:</strong></label>
                <div class="col-sm-9">
                	<input type="text" name="cr_number" value="<?php echo $ob["cr_number"];?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>อุปกรณ์ภายในห้อง:</strong></label>
                <div class="col-sm-9">
                	<?php
					$croom_media = mysql_query("select * from meetingroom_croom_media
					where cr_id = '$ob[cr_id]'");
					while($croom_media2 = mysql_fetch_assoc($croom_media)){
						$media_id[] = $croom_media2["media_id"];
					}
					
                    $sql2 = mysql_query("select * from meetingroom_media
                    where trash = '0'
                    order by media_id asc");
                    while($ob2 = mysql_fetch_assoc($sql2)){
						if(@in_array($ob2["media_id"], $media_id)){
                    		echo '<div class="checkbox"><label><input type="checkbox" name="media_id[]" value="'.$ob2["media_id"].'" checked> '.$ob2["media"].'</label></div>';
						}else{
							echo '<div class="checkbox"><label><input type="checkbox" name="media_id[]" value="'.$ob2["media_id"].'"> '.$ob2["media"].'</label></div>';
						}
                    }
                    ?>
                </div>
            </div>
            
             <div class="form-group">
            	<label class="control-label col-sm-3"><strong>ที่ตั้ง:</strong></label>
                <div class="col-sm-9">
                	<input type="text" name="location" value="<?php echo $ob["location"];?>" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>เบอร์โทรภายในห้อง:</strong></label>
                <div class="col-sm-9">
                	<input type="text" name="cr_tel" value="<?php echo $ob["cr_tel"];?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>ใช้งาน:</strong></label>
                <div class="col-sm-9">
                	<?php
                    foreach($cf_yn as $k => $v){
                    	if(isset($ob["enable"])){
                    		if($ob["enable"] == $k){
                				echo '<label class="radio-inline"><input name="enable" type="radio" value="'.$k.'" checked required/> '.$v.'</label> ';
                        	}else{
                        		echo '<label class="radio-inline"><input name="enable" type="radio" value="'.$k.'" required/> '.$v.'</label> ';
                        	}
                        }else{
                        	if($k == 1){
                				echo '<label class="radio-inline"><input name="enable" type="radio" value="'.$k.'" checked required/> '.$v.'</label> ';
                        	}else{
                        		echo '<label class="radio-inline"><input name="enable" type="radio" value="'.$k.'" required/> '.$v.'</label> ';
                        	}
                        }
                    }
                    ?>
                </div>
            </div>
            
            <div class="form-group">
            	<label class="control-label col-sm-3"><strong>หมายเหตุ:</strong></label>
                <div class="col-sm-9">
                	<input type="text" name="cr_note" value="<?php echo $ob["cr_note"];?>" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
            	<div class="col-sm-9 col-sm-offset-3">
                	<?php
                     if(empty($_GET['key_cid'])){
                    ?>
                	<input type="hidden" name="action" value="insert" />
 					<input type="submit" name="Submit" value="Insert" class="btn btn-lg buttonsubmit">
                    <?php
                    }else{
                    ?>
                    <input type="hidden" name="cr_id" value="<?php echo $ob[cr_id];?>" />
   					<input type="hidden" name="action" value="update" />
 					<input type="submit" name="Submit" value="Update" class="btn btn-lg buttonsubmit">
                    <?php
                    }
                    ?>
                    <a href="../../room.php" class="btn btn-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i> ย้อนกลับ</a>
                </div>
            </div>
         </form>
         		</div>
                </div>
         
         		</div><!--col-6-->
                
                <!--<div class="col-sm-6">
                
                	<div class="panel panel-primary">
                    	<div class="panel-heading">
                        	<h3 class="panel-title">ภาพประกอบ</h3>
                        </div>
                        <div class="panel-body">
                        </div>
                    </div>
                    
                </div>--><!--col-6-->
                
         	</div><!--row-->
            
            <?php
	}else{
		include("../alert-permission-inc.php");
	}
			?>
         
         </div><!--container-->
         
         <?php include("../js-inc.php");?>
		 <script type="text/javascript">
		 $(document).ready(function() {
			 
			 $('#form1').bootstrapValidator({
				  /*fields: {
					  'cp_filename[]': {
                		validators: {
                    		file: {
                        		extension: 'jpg',
                        		type: 'image/jpeg',
                        		maxSize: 1024*1024,
                        		message: 'Please choose a jpg file with a size less than 1M.'
                    		}
                		}
            		}
				  }*/
			 });
		 
		 });
		 </script>