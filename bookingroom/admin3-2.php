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
      <p align="left">
        <br />
        <br />
        <?  
include"connect/connect.php";
	$cmd="select * from croom where name='$text1'";
	$result = mysql_query($cmd,$link);

	if($text1=="")
	{
		print("<p align='center'>โปรดใส่ชื่อห้องประชุมของท่าน");
		
	}
	else if( mysql_num_rows($result)>0)
	{
			print("<p align='center'>มีห้องประชุมนี้ในระบบแล้ว");		
	} 
	else
	{
	if($checkbox1==""){$c1='-';} if($checkbox2==""){$c2='-';} if($checkbox3==""){$c3='-';}
	if($checkbox1!=""){$c1='มี';} if($checkbox2!=""){$c2='มี';} if($checkbox3!=""){$c3='มี';}
	$cmd= " insert into croom (name,net,pro,board,comp) values ('$text1','$text2','$c1','$c2','$c3')";
	?>
	<BR><BR><p align='center'>ห้องประชุม -- <?php echo $text1; ?> -- ได้ถูกเพิ่มในรายการเรียบร้อยแล้ว<BR><BR>
	<?php
	mysql_query($cmd,$link);
	mysql_close($link);
	}
?>
        &nbsp;</p>
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
