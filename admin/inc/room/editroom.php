<?php
$key_cid=$_GET[key_cid];

$action=$_POST[action];

if($action == "edit"){

$text1=$_POST[text1];
$text2=$_POST[text2];
#$myColorFld=$_POST[myColorFld];

	$lastupdate = date("Y-m-d H:i:s");
$cmd= " update room_category set category='$text1', amount='$text2', lastupdate='$lastupdate', color='$myColorFld' 
where cid='$key_cid'";
mysql_query($cmd, $link);

header("location: ".$livesite."room.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
	font-family: "Courier New", Courier, monospace;
	font-size: 10pt;
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
.style16 {color: #FF0000}
-->
</style>

<script type="text/javascript" src="POPcolors/202pop.js"></script>
<link rel='stylesheet' href='POPcolors/style.css'>
</head>

<body>
<?php
$sql="select * from room_category
where cid='$key_cid'";
$rs=mysql_query($sql, $link);
$ob=mysql_fetch_array($rs);
?>
<h3>รายชื่อห้องทั้งหมด</h3>
<!--<div id="Layer11"> -->
  <blockquote>
    <!--<div id="Layer14"> -->
      <!--<div align="left"> -->
        <p>
		<!--<fieldset>
          
		<legend>รายชื่อห้องอบรมทั้งหมด</legend> --></p>
        <p>
		
<!--</fieldset> -->
        </p>
        <p>&nbsp; </p>
        <p>
		<fieldset>
		<legend>แก้ไขห้องอบรม</legend></p>
        <table>
        <form id="form1" name="form1" method="post" action="#">
        <tr>
        <td>
          <p>
            <label>ชื่อห้อง:</label><br/>
<label></label>
<label>
<input name="text1" type="text" id="text1" size="60" maxlength="50" value="<?php echo $ob["category"]; ?>">
</td>
</tr>
<tr>
<td>
            </label>
            <label></label>
          </p>
          <p>
       <label>ความจุ :</label><br/>
              <input name="text2" type="text" id="text2" size="40" maxlength="2" value="<?php echo $ob["amount"]; ?>">
          (คน)</p>
          <label>Upload รูปห้อง:<br/><input type="file" size="50" />
          </td>
          </tr>
<!--          <tr>
          	<td>
            <label>สี :</label><br/>
              <input type='button' value='เลือกสี' onclick='pickerPopup202("input_4","sample_4");'> <input type='text' size='15' id='input_4' name="myColorFld" value="<?php #echo $ob["color"]; ?>">&nbsp;
			    <span id='sample_4'>&nbsp;</span>
            </td>
          </tr>
 -->          <tr>
          <td>
          <p class="style16">
          <input type="hidden" name="action" value="edit" />
       <input type="submit" name="Submit" value="แก้ไขห้อง" class="buttonsubmit">
       <input type="button" value="ฺBack To List" class="buttonsubmit" onClick="location.href='room.php'">
       </td>
       </tr>
</p>
          <p>&nbsp;</p>
        </form>
        </table>
		</fieldset>
        <p>&nbsp; </p>
      <!--</div> -->
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
    <!--</div> -->
    <p align="left">&nbsp;</p>
     
     
     
     
        <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
        <p align="left"><br>
        </p>
  </blockquote>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
<!--</div> -->
</body>
</html>
