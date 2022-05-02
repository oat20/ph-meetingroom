<?php
	$sql="select mid(startdate,1,7) as a1 
	from room_booking
	group by a1
	order by a1 desc";
	$rs=mysql_query($sql);
	while($ob=mysql_fetch_array($rs)){
		print "<p class=font12bold><a href=index.php?mode=list&a1=".$ob["a1"].">".dateformat1($ob["a1"])."</a></p><br/>";
	}
?>
