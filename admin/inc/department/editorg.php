<?php
$key_dp_id=$_GET[key_dp_id];

$text1=$_POST[text1];
#$text2=$_POST[text2];
$dp_id=$_POST[dp_id];
$action=$_POST[action];

if($action=="add"){
	$sql="insert into tb_department(dp_name, dp_tel) values('$text1', '$text2')";
	mysql_query($sql, $link);
	header("location: org.php");
}

if($action=="edit"){
	$sql="update tb_department set dp_name='$text1', dp_tel='$text2'
	where dp_id='$dp_id'";
	mysql_query($sql, $link);
	header("location: org.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<fieldset>
		<legend>เพิ่ม/แก้ไข ภาควิชา/หน่วยงาน</legend>
		<?php
		if($key_dp_id==""){
		?>
        <table>
        <form id="form1" name="form1" method="post" action="org.php?mode=editorg">
        <tr>
        <td>
            <label>ภาควิชา/หน่วยงาน :</label><br/>
<input name="text1" type="text" id="text1" size="60" maxlength="50">
</td>
</tr>
<!--<tr>
<td>
       <label>เบอร์โทรศัพท์ :</label><br/>
       <input name="text3" type="text" id="text3" size="60" maxlength="50"></td>
          </tr> -->
          <tr>
          <td>
          <input type="hidden" name="action" value="add" />
       <input type="submit" name="adddata" value="เพิ่มข้อมูล" class="buttonsubmit">
	   <input type="button" name="Button" value="Back To List" class="buttonsubmit" onClick="location.href='org.php'">
       </td>
       </tr>
        </form>
        </table>
		<?php
		}else{
			$sql="select * from organization
			where DeID='$key_dp_id'";
			$rs=mysql_query($sql);
			$ob=mysql_fetch_array($rs);
		?>
		<table>
        <form id="form1" name="form1" method="post" action="org.php?mode=editorg">
        <tr>
        <td>
            <label>ภาควิชา/หน่วยงาน :</label><br/>
<input name="text1" type="text" id="text1" size="60" maxlength="50" value="<?php echo $ob["Fname"]; ?>">
</td>
</tr>
<!--<tr>
<td>
       <label>เบอร์โทรศัพท์ :</label><br/>
              <input name="text2" type="text" id="text2" size="60" maxlength="50" value="<?php #echo $ob["dp_tel"]; ?>">
          </td>
          </tr> -->
          <tr>
          <td>
		  <input type="hidden" name="dp_id" value="<?php echo $ob["dp_id"]; ?>" />
          <input type="hidden" name="action" value="edit" />
       <input type="submit" name="editdata" value="แก้ไขข้อมูล" class="buttonsubmit">
	   <input type="button" name="Button" value="Back To List" class="buttonsubmit" onClick="location.href='org.php'">
       </td>
       </tr>
        </form>
        </table>
		<?php
		}
		?>
		</fieldset>
</body>
</html>
