<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<style type="text/css">
<!--
#Layer11 {position:absolute;
	left:2px;
	top:5px;
	width:997px;
	height:755px;
	z-index:9;
}
#Layer14 {position:absolute;
	left:23px;
	top:0px;
	width:936px;
	height:299px;
	z-index:12;
}
#Layer15 {position:absolute;
	left:23px;
	top:2px;
	width:967px;
	height:32px;
	z-index:12;
}
body,td,th {
	font-family: Courier New, Courier, monospace;
	font-size: 14px;
}
a:link {
	color: #3399FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #3399FF;
}
a:hover {
	text-decoration: none;
	color: #66FFFF;
}
a:active {
	text-decoration: none;
	color: #66FFFF;
}
-->
</style>
</head>

<body>
<div id="Layer11">
  <blockquote>
    <div id="Layer14">
      <form id="form1" name="form1" method="post" action="admin3-1.php">
        <p>
          <br />
          <br />
          <?  
include"connect/connect.php";
if($check2!="")
{
    $cmd = "delete from croom where cr_id = '$check2' ";
	mysql_query($cmd,$link);
	?>
	<BR><BR><p align='center'>ระบบได้ทำการลบรายชื่อห้องออกจากระบบแล้วครับ
    <?php
}else
{
	$cmd="select *from croom where cr_id='$No'";
	mysql_query($cmd,$link);
	$result = mysql_query($cmd,$link);
	$row=mysql_fetch_row($result);
	mysql_query($cmd,$link);	
	?>
	      ห้อง           :  <font color = blue><?php echo $row[1]; ?></font><BR><BR>      ขนาดความจุ           :  <font color = blue><?php echo $row[2]; ?></font> คน<BR><BR> 
	
	<input type =hidden name = check2 value = <?php echo $row[0]; ?>><BR><BR>
	<input type='submit' name='Submit' value='ลบห้องประชุม'>
    <?php
	}
	mysql_close($link);
?>
        </p>
        <p>&nbsp; </p>
        <p>
          <label></label>
        </p>
        <p>
          <label> </label>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </form>
      <p align="left">&nbsp;</p>
      <div align="center"></div>
    </div>
    <p align="left">&nbsp;</p>
     
     
     
     
        <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
        <p align="left"><br />
        </p>
  </blockquote>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
</div>
</body>
</html>
