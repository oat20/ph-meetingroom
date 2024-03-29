<?php
session_start();

include"bookingroom/config.php";
include("bookingroom/inc/function.php");
include("bookingroom/connect/connect.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $sitename;?></title>
<?php include("bookingroom/css-inc.php");?>
</head>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-53635W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-53635W');</script>
<!-- End Google Tag Manager -->

<nav class="navbar navbar-static-top navbar-inverse">
      <div class="container-fluid">
      	<div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php print $siteicon.' '.$sitename_01;?></a>
        </div>
        
     </div>
    </nav>

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
						$result = mysql_query($cmd);
						$total = mysql_num_rows($result);
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
			  <th>Actions</th>
			  </tr>
            </thead>
            <tbody>
          <?php
	$a=1;
	$swap="1";
	while($row=mysql_fetch_assoc($result))
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
					$sql2 = mysql_query("select * from meetingroom_tableformat
					where tf_id = '$row[tf_id]'");
					$ob2 = mysql_fetch_assoc($sql2);
					//echo '<a href="'.$livesite.'bookingroom/img/room/'.$ob2["tf_photo"].'" target="new">'.$ob2["tf_title"].'</a>';
					echo $ob2["tf_title"].'<br><small>เปลี่ยนรูปการจัดโต๊ะได้ '.$cf_yn2[$row['cr_tablechange']].'</small>';
					?>
                </td>
                <td>ครึ่งวัน <?php echo number_format($row["cr_price_halfday"]);?> บาท</td>
                <td>เต็มวัน <?php echo number_format($row["cr_price_fullday"]);?> บาท</td>
                	<td>
                    	<div class="btn-group">
                        	<a href="room_data-external.php?keyID=<?php echo $row["cr_id"];?>" class="btn btn-primary"><i class="fa fa-external-link" aria-hidden="true"></i> รายละเอียด</a>
                            <!--<a href="calendar-room.php?cr_id=<?php //print $row['cr_id'];?>" class="btn btn-primary"><i class="fa fa-calendar"></i> รายการจอง</a>-->
                    	</div>
                    </td>
				 </tr>
			<?php
			#$a++;
	}		
	mysql_close($conn);
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-6062424-4', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>