<?php
include('config.php');
include('inc/function.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $sitename;?></title>
<?php include("css-inc.php");?>
</head>

<body>
<div class="container">
	
    <div class="page-header">
    	<h2><?php echo $siteicon.' '.$sitename_01;?></h2>
    </div>
    <?php echo blog_alert_02('<i class="fa fa-exclamation-triangle"></i> Warning ระบบนี้ไม่สามารถใช้งานนอกเครือข่ายของมหาวิทยาลัยได้ฯ');?>

</div>

<?php include("js-inc.php");?>
</body>
</html>