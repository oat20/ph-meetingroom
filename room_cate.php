<?php
session_start();

#$u=$_SESSION["u"];
include"bookingroom/config.php";
include"bookingroom/connect/connect.php";
include"bookingroom/inc/function.php";
include("bookingroom/inc/checksession.inc.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php print $sitename; ?></title>
<?php include("bookingroom/css-inc.php");?>
<style type="text/css">
body,td,th {
	font-family: Kanit, "Open Sans", "Lucida Grande", "Lucida Sans Unicode", Calibri, Arial, Helvetica, Sans, FreeSans, Jamrul, Garuda, Kalimati, verdana, arial, tahoma, sans-serif;
}
</style>
<!--<link rel="stylesheet" href="menu/menu_style.css" type="text/css"> -->
    </head>

<body>
<!--start header -->
<?php include("bookingroom/navbar-inc.php"); 
?>
<!--end header -->

<!--start center -->
<div class="container-fluid">

	<ol class="breadcrumb">
  		<li><a href="3_controlpanel.php"><i class="fa fa-cogs" aria-hidden="true"></i> Control Panel</a></li>
  		<li class="active">ประเภทห้อง</li>
	</ol>
	
    <?php
	if($_SESSION['userType'] == 3){
	?>
    
	<div class="row">
    	<div class="col-sm-6">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">ประเภทห้อง</h3>
                </div>
            	<div class="panel-body">
        	<?php 
			include("bookingroom/admin3.php");
				?>
                	</div>
                </div>
                
        </div><!--col-6-->
        
        <div class="col-sm-6">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title">เพิ่ม / แก้ไขประเภทห้อง</h3>
                </div>
            	<div class="panel-body">
                
                	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="defaultForm" class="form-horizontal">
<?php
	if($keyId==""){
		?>
        <div class="form-group">
			<label class="control-label col-sm-3"><strong>ประเภทห้อง:</strong></label>
        	<div class="col-sm-9">
				<input name="text1" type="text" id="text1" size="50" maxlength="40" class="form-control" required/>
			</div>
		</div>
        
        <div class="form-group">
        	<div class="col-sm-9 col-sm-offset-3">
 <input type="hidden" name="action" value="save" />
 <input type="submit" name="Submit" value="เพิ่มรายการ" class="btn btn-primary">
 			</div>
 </div>
		<?php
        }else{
        $sql="select * from room_type
		where id='$keyId'";
		$rs=mysql_query($sql);
		$ob=mysql_fetch_array($rs);
        ?>
        <div class="form-group">
        <label class="control-label col-sm-3"><strong>ประเภทห้อง:</strong></label>
        <div class="col-sm-9">
<input name="text1" type="text" id="text1" size="50" maxlength="40" value="<?php print $ob["name"]; ?>" class="form-control" required/>
</div>
</div>

<div class="form-group">
	<div class="col-sm-9 col-sm-offset-3">
 <input type="hidden" name="cr_id" value="<?php print $ob[id]; ?>" />       
 <input type="hidden" name="action" value="edit" />
 <input type="submit" name="Submit" value="แก้ไขรายการ" class="btn btn-primary">
 	</div>
 </div>
 <?php
		}
		?>
</form>
        	
                	</div>
                </div>
                
        </div><!--col-6-->
    </div><!--row -->

    <?php
	}else{
		
		include("alert-permission-inc.php");
	
	}
	?>
    
</div><!--container-->
<!--end center -->

<!--start footer -->
<?php include("bookingroom/js-inc.php");?>
<!--end footer -->
<script type="text/javascript">
$(document).ready(function() {
	
	$('#defaultForm').bootstrapValidator({
	});
});
</script>
</body>
</html>
