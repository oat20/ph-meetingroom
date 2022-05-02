<nav class="navbar navbar-static-top navbar-inverse">
    	<div class="container-fluid">
        
        	<div class="navbar-header">
        		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
          			<span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="#"><?php echo $siteicon.' '.$sitename_01;?></a>
        	</div>
        	
            <div class="collapse navbar-collapse font-16" id="bs-example-navbar-collapse-1">
            	<ul class="nav navbar-nav">          	
                	<li><a href="<?php echo $livesite;?>calendar.php"><i class="fa fa-calendar" aria-hidden="true"></i> ปฏิทิน</a></li>
                    <li><a href="<?php echo $livesite;?>allrooms.php"><i class="fa fa-bars" aria-hidden="true"></i> รายการห้อง</a></li>
                    <?php
					if(isset($_SESSION['u'])){
						if($_SESSION['userType'] == 3){
							echo '<li>
								<a href="'.$livesite.'3_controlpanel.php"><i class="fa fa-file" aria-hidden="true"></i> จัดการใบจอง</a>
								</li>';
								//echo '<li><a href=""><i class="fa fa-flag"></i> รายงาน</a></li>';
								echo '<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> เตรียมข้อมูลระบบ <span class="caret"></span></a>
										<ul class="dropdown-menu">
                	<li><a href="'.$livesite.'room_cate.php">รายการประเภทห้อง</a></li>
                	<li><a href="'.$livesite.'room.php">รายการห้อง</a></li>
                    <li><a href="'.$livesite.'3_tableformat.php">รูปแบบการจัดโต๊ะ</a></li>
                	<li><a href="'.$livesite.'food.php">รายการอาหารว่าง</a></li>
                	<li><a href="'.$livesite.'media.php">รายการอุปกรณ์เสริม</a></li>
                   <li><a href="'.$livesite.'3_bookobjective.php">วัตถุประสงค์การจอง</a></li>';
                    //echo '<li><a href="'.$livesite.'3_foodformat.php">รูปแบบการจัดอาหาร</a></li>';
					echo '<li><a href="'.$livesite.'practice/">ข้อปฎิบัติการจอง</a></li>';
                	echo '<li><a href="'.$livesite.'org.php">ภาควิชา/ส่วนงาน</a></li>
                    <li><a href="'.$livesite.'user.php">สมาชิก</a></li>';
					echo '<li class="divider"></li>
						<li class="dropdown-header"><i class="glyphicon glyphicon-th-list"></i> รายงาน</li>';
						echo '<li><a href="'.$livesite.'report/">รายงานจองภาพรวม</a></li>';
						echo '<li><a href="'.$livesite.'report/report-cancel.php">รายงานยกเลิกการจอง</a></li>';
						echo '<li><a href="'.$livesite.'report/report-changeroom.php">ประวัติการเปลี่ยนห้อง</a></li>';
            echo '</ul>
									</li>';
						}
					}
					?>
                </ul>
                               
            	<ul class="nav navbar-nav navbar-right">
                	<?php
					if(empty($_SESSION['u'])){
						
                		echo '<li class="active"><a href="'.$livesite.'login.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> กรอกแบบฟอร์มจองห้อง</a></li>';
					
					}else if(!empty($_SESSION['u'])){
						
						echo '<li class="active"><a href="'.$livesite.'allrooms.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> กรอกแบบฟอร์มจองห้อง</a></li>';
						
					}
					
					if(isset($_SESSION['u'])){ 
					
						include("show_profile.php"); 
					
					}
					?>
                </ul>
            </div>
            
        </div>
    </nav>