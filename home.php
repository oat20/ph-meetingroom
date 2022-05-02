<?php
ob_start();
session_start();
#$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include("bookingroom/inc/checksession.inc.php");

#logfile($getip, $datelog, $url);


#$mode = $_GET["mode"];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?=$sitename;?>">
<title><?php print $sitename; ?></title>
<?php include("bookingroom/css-inc.php");?>
<!--<link rel="stylesheet" href="menu/menu_style.css" type="text/css"> -->
<script type="text/javascript">
        var GB_ROOT_DIR = "bookingroom/GreyBox/greybox/";
    </script>

    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/gb_scripts.js"></script>
    <link href="bookingroom/GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
    
    </head>

<body>
<!--start header -->
<!-- Static navbar -->
    <?php include("bookingroom/navbar-inc.php");?>
<!--end header -->

<!--start content -->
<div class="container-fluid">

	<div class="row">
    
    	<div class="col-sm-10">
        
        	<div class="panel panel-default">
            	<div class="panel-body">
                	<div class="blog_title"><i class="fa fa-calendar" aria-hidden="true"></i> ปฏิทิน</div>
                     <?php #include"bookingroom/inc/index.inc.php"; 
					include("bookingroom/calendar/calendar.php");
					?>
                </div><!--panel-body-->
            </div><!--panel-->
        
        </div><!--col-10-->
        
        <div class="col-sm-2">
        	
            <?php include("bookingroom/inc/menu.inc.php");?>
            
        </div><!--col-2-->
        
    </div><!--row-->
	<div class="top"></div>
	    
        <!--<div id="header">
       </div> -->

<div id="warp">
	
        
            <div id="left">
        <?php
		#include"bookingroom/inc/checkbooking.php";
		#include"bookingroom/calendar/calendar2.php";
		include"bookingroom/inc/menu.inc.php";
		include"bookingroom/inc/mod_room.php";
		#include("menu/index.html");
		?>
        	<!--<div class="module2">
            	<div class="title1"></div>
                <h3>Title</h3>
                <div class="title2"></div>
            </div> -->
    </div>

        
	<div id="right">
    	
        <div class="post">
        	<?php include("bookingroom/inc/mod_today.php");?>
        </div>
        
    	<div class="post">
            <h1>ปฏิทินการใช้ห้อง</h1>
           
        </div>
        
	</div>
    
    <div style="clear:both"></div>
 </div>

	<!--<div class="bottom"></div> -->
</div>
<!--end center -->

<!--start footer -->
<?php //include("bookingroom/footer.html");
include("bookingroom/web_analysic.php");
?>
<!--end footer -->

<?php include("bookingroom/js-inc.php");?>
</body>
</html>
