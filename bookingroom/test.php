<?php
include"config.php";
include $livepath."connect/connect.php";
include $livepath."inc/function.php"
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Untitled Document</title>
</head>

<body>
<?php
	$sql="select mid(startdate,1,7) as a1 
	from room_booking
	group by a1
	order by a1 desc";
	$rs=mysql_query($sql);
	while($ob=mysql_fetch_array($rs)){
		print "<a href=index.php?mode=list&a1=".$ob["a1"].">".dateformat1($ob["a1"])."</a><br/>";
	}
?>
</body>
</html>
