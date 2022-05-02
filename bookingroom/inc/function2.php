<?                  //อยู่ใน Admin 

//-------------------------------------------------------------------------------------------------------------------------------------------------

//include("check_data.php");
function login($username,$password,$database,$tablename)
/*ตรวจสอบ username กับ password กับฐานข้อมูล
ถ้าพบให้คืนค่าเป็นจริง หากไม่พบให้คืนค่าเป็นเท็จ
*/
{
//เชื่อมโยงฐานข้อมูล

$conn = connect_db();
if(!$conn)
	return 0;
//ตรวจสอบ username ว่าซ้ำกับในฐานข้อมูลหรือไม่
$sql = "select * from $tablename 
where username='$username' and password='$password'";
$result = mysql_query($sql);
mysql_query("SET NAMES TIS620");

if(!$result)
	return 0;
if(mysql_num_rows($result)>0)
	return 1;
else
	return 0;
}

//------------------------------------------------------------------------------------------------------------------
//resize image function
function resizeImage($filename, $targetw, $targeth, $quality, $targetfilename, $crop){ 
    if ($im = @imagecreatefromjpeg($filename)){ 
        $w      = imagesx($im); 
        $h      = imagesy($im); 
        $sc     = 1; 
        if ($w > $targetw){ 
            $sc = $targetw/$w; 
        } 
        if ($h > $targeth/$sc){ 
            $sc = $targeth/$h; 
        }    
        if (!$crop){ 
            $result = imagecreatetruecolor($targetw, $targeth); 
            $grey   = imagecolorallocate($result, 0xf1, 0xef, 0xea); 
            imagefill($result, 0, 0, $grey); 
            imagecopyresampled($result, $im, ($targetw - $w*$sc)/2, ($targeth - $h*$sc)/2, 0, 0, $w*$sc, $h*$sc, $w, $h); 
        } else { 
            $result = imagecreatetruecolor($w*$sc, $h*$sc); 
            imagecopyresampled($result, $im, 0, 0, 0, 0, $w*$sc, $h*$sc, $w, $h); 
        } 
        imagejpeg($result, $targetfilename, $quality); 
    } 
} 


//-------------------------------

//นับจำนวนรูป
function num_Img($id_detail)
{
global  $num_Img;
$con=connect_db("db_news");

if(!$con)
	return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
$sql="select * from image  where id_detail=$id_detail ";
$result = mysql_query($sql);
//echo"$result = mysql_query($sql);";
$num_Img=mysql_num_rows($result);


	return $num_Img;


}

//=======================     ++++ลบข้อมูลข่าว  ไฟล์   รูปภาพ   +++++      ==============================

function delete_detail($id_detail)
{
		$con=connect_db("ph_web");
			if(!$con)
				return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
		$sql1="select  *  from  news where id_detail='$id_detail'";
		$exec1=mysql_query($sql1);
			while($rs1= mysql_fetch_array($exec1))
				{
					$name=$rs1[file_detail ];
					unlink("photo/$name");
					unlink("thumb/$name");
					unlink("files/$name");
				}
		$result = mysql_query("delete from news where id_detail='$id_detail'");
		$sql="select  *  from  image  where id_detail='$id_detail'";
		$exec=mysql_query($sql);
			while($rs= mysql_fetch_array($exec))
				{
					$name=$rs[name_Imgtop];
					unlink("photo/$name");
					unlink("thumb/$name");
				}
		$result1= mysql_query("delete from image where id_detail='$id_detail'");
			if(!$result)
						return("ไม่สามารถลบรายการหมวดหมู่ได้");
			else
						return true;
}

//=================================================================================

/*ฟังก์ชันสำหรับนำข้อมูลในฐานข้อมูลเก็บไว้ในอะเรย์*/
function db_to_array($result)
{
	$result_array=array();
	for($count=0;$row=@mysql_fetch_array($result);$count++)
		$result_array[$count]=$row;
	return $result_array;
}


//=================================================================================

/*ฟังก์ชันคำนวณรายการสั่งซื้อ*/
function calculate_items($cart)
{
  // ผลรวมของรายการสั่งซึ้อ
  $items = 0;
  if(is_array($cart))
  {
    foreach($cart as $isbn => $qty)
    {  
      $items += $qty;
    }
  }
  return $items;
}

//=================================================================================
function show_ministry_id($authuser)
{
global  $ministry;
global  $ministry_name;
		$conn = connect_db("db_news");
			if(!$conn)
				echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
		$sql="select   *  from  user  where  username='$authuser'" ;
		$exec = mysql_query($sql);
		$Status = mysql_fetch_array ($exec);
		$status_user=$Status[status_user];
		$ministry=$Status[ministry_id];
			if($exec){
				return  $ministry;
			}
			else

 				return 0;
}


//=================================================================================
function show_newsmimistry($tablename ,$id_detail,$ministry_id )
{
		$conn = connect_db("db_news");
			if(!$conn)
					echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
		$sql = "select * from $tablename  where ministry_id='$ministry_id' ORDER BY $id_detail  DESC ";
		$result = mysql_query($sql);
			if(!$result)
				return 0;
			else
				 return $result;
}

//=========================     +++adduser++++    ====================================
function adduser($max,$user_n,$password1,$names,$email , $regdate)
{
		$conn = connect_db("ph_web");
				if(!$conn)
					echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
		$sql="insert into admin (u_id,username,password,names, email, login, regdate) 					
		values('$max','$user_n','$password1','$names','$email','0', '$regdate')";
		$result = mysql_query($sql);
		echo"$result = mysql_query($sql);";
			if(!$result)
				return 0;
			else
 				return $result;
}

//=========================     +++adduser++++    ====================================
function adduserstatus($user_n)
{
		$conn = connect_db("db_news");
				if(!$conn)
					echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
		echo"$username";
		$sql_status="insert into status_admin(username,org,train,Img_activity,job,procure,newpaper,government,sport_news) 					values('$user_n','0','0','0','0','0','0','0','0')";
		$result_status = mysql_query($sql_status);
		echo"$result_status = mysql_query($sql_status);";
			if(!$result_status)
				return 0;
			else
 				return $result_status;
}

//=============================================================================
function show_user($tablename)
{
		#$conn = connect_db("db_news");
		$conn = connect_db("ph_web");
				if(!$conn)
					echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
		#$sql = "select * from $tablename  where  username  not like  '%mljeed%' ";
		$sql = "select * from $tablename
		order by names asc";
		$result = mysql_query($sql);
				if(!$result)
					return 0;
				else
 					return $result;
}
//=========================     +++โชว์ข้อมูล++++    ====================================
function show_data($tablename ,$id_detail)
{
		#$conn = connect_db("db_news");
		$conn = connect_db("ph_web");
			if(!$conn)
				echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
		$sql = "select * from $tablename  ORDER BY $id_detail  asc ";
		$result = mysql_query($sql);
			if(!$result)
				return 0;
			else
 				return $result;
}
//========================     +++ลบชนิดข่าว+++    ====================================
function delete_type($tablename ,$id_type)
{
#$conn = connect_db("db_news");
$conn = connect_db("ph_web");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
$sql = "delete from $tablename where id_type='$id_type'";
$result = mysql_query($sql);
if(!$result)
	return 0;
else
 return $result;
}
//========================     +++ลบชนิดข่าว+++    ====================================
function delete_person($tablename ,$id_person)
{
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
$sql = "delete from $tablename where id_person='$id_person'   ";
$result = mysql_query($sql);
if(!$result)
	return 0;
else
 return $result;
}
//========================     +++ลบชนิดข่าว+++    ====================================
function delete_position($tablename ,$id_position)
{
$conn = connect_db("db_news");
if(!$conn)
echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
$sql = "delete from $tablename where id_position='$id_position'   ";
$result = mysql_query($sql);
if(!$result)
	return 0;
else
 return $result;
}
//========================     +++ลบชนิดข่าว+++    ====================================
function delete_user($tablename ,$id_user)
{
	$conn = connect_db("ph_web");
		if(!$conn)
			echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
	$sql = "delete from $tablename where u_id='$id_user'   ";
	$result = mysql_query($sql);
		if(!$result)
			return 0;
		else
 			return $result;
}




//===============================================================
function status_chack($user)
{
		$conn = connect_db("db_news");
			if(!$conn)
				echo "เกิดความผิดพลาดไม่สามารถติดต่อกับฐานข้อมูลได้";
		$sql1= "SELECT * FROM   status_admin where  username='$user'";
		$result= mysql_query($sql1);
		$rs= mysql_fetch_array($result);
		$user=$rs[username];
   			if (empty($user ))
			     return true;
  			else
				return false;
}
///=======================================================================


	
function cutstring($str, $len) {
 if (strlen($str)<=$len) return $str;
 else return sprintf("%.".$len."s..", $str);
}	
//=======================================================================
/*function dateThai($date){
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;

	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy;
	return $dateT;
	}*/

//ฟังก์ชั่น เปลี่ยนฟอร์แมตวันที่
function dateFormat($date){
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$dateC=intval($dd)."-".$mm."-".$yy;
	return $dateC;
	}
	
//หาค่าวัน/เดือน/ปี  จากวันที่
function   date_sub($date_1)
							{
							global  $y,$m,$d;
							$y=substr("$date_1",0,4);
							$m=substr("$date_1",5,2);
							$d=substr("$date_1",8,2);
							
							}	
							
							
							
/*function delete_detail($id_detail)
{
		$con=connect_db("db_news");
			if(!$con)
				return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
		$sql1="select  *  from  detail_news where id_detail='$id_detail'";
		$exec1=mysql_query($sql1);
			while($rs1= mysql_fetch_array($exec1))
				{
					$name=$rs1[file_detail ];
					unlink("photo/$name");
					unlink("thumb/$name");
					unlink("files/$name");
				}
	}*/
function edit_type($id_type,$name_type,$name_type_e)
{
$con=connect_db("db_news");

if(!$con)
	return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
	
$sql="update type_news set  name_type='$name_type' where id_type= $id_type ";
$result = mysql_query($sql);

$sql_e="update type_news set  initial='$name_type_e' where id_type= $id_type ";
$result_e= mysql_query($sql_e);

}

//=======================================================================

// ตรวจสอบ form ทั้งหมด
function check_form($formdata){
foreach ($formdata as $key => $value){ 
if (!isset($key) || $value == "" )
return false;
}
return true;
}
//=======================================================================
function edit_position($id_position,$name_position_t,$name_position_e)
{
$con=connect_db("db_news");

if(!$con)
	return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
$sql="update position_news set  name_position_t='$name_position_t' where id_position= $id_position";
$result = mysql_query($sql);
if(!$result)
	return("ไม่สามาแก้ไขรายการตำแหน่งได้");
else
	return true;
$sql_e="update position_news set  name_position_e='$name_position_e' where id_position= $id_position";
$result_e= mysql_query($sql_e);
if(!$result_e)
	return("ไม่สามาแก้ไขรายการตำแหน่งได้");
else
	return true;
}

//=======================================================================
function edit_admin($id_user,$user_n,$password1,$names,$ministry_id,$username_user)

{
echo"edit_admin($id_user,$user_n,$password1,$names,$ministry_id,$username_user)";
$con=connect_db("db_news");
if(!$con)
	return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";


$sql_name="update user set  names='$names' where id_user='$id_user'";
$result_name= mysql_query($sql_name);


$sql_pwd="update user set  password='$password1' where id_user='$id_user'";
$result_pwd= mysql_query($sql_pwd);
//echo"$result_pwd= mysql_query($sql_pwd);";
/*if(!$result_pwd)
	return("ไม่สามาแก้ไขรายการตำแหน่งได้");
else
	return true;*/


$sql="update user set  username='$user_n' where id_user='$id_user'";
$result = mysql_query($sql);
//echo"$result = mysql_query($sql);";
/*if(!$result)
	return("ไม่สามาแก้ไขรายการตำแหน่งได้");
else
	return true;*/


$sql_ministry="update user set  ministry_id='$ministry_id' where id_user='$id_user'";
$result_ministry= mysql_query($sql_ministry);

//echo"$result_ministry= mysql_query($sql_ministry);";
/*if(!$result_ministry)
	return("ไม่สามาแก้ไขรายการตำแหน่งได้");
else
	return true;*/
}


//=======================================================================

//=======================================================================
function edit_person($id_person,$title,$name_person,$id_position)
{
//echo"$id_person,$title,$name_person,$id_position";
$con=connect_db("db_news");
//echo"xxx";

if(!$con)
	return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";

$sql="update person_most set  title='$title' where id_person= $id_person";
$result = mysql_query($sql);
//echo"$result = mysql_query($sql);";
$sqlname="update person_most set  name_person='$name_person' where id_person=$id_person";
$resultname=mysql_query($sqlname);
//echo"$resultname=mysql_query($sqlname); ****";

$sqle="update person_most set  id_position='$id_position' where id_person=$id_person";
$resulte=mysql_query($sqle);
//echo"$resulte= mysql_query($sqle);+++";

}

#Select Organization
function select_org($tb_name)
{
	$con=connect_db("phlabcom");
	if(!$con){
		#return "! Can not connect database";
		print "<option>! Can not connect database</option>";
	}else{
		$room_category="select DeID, Fname
		from $tb_name
		order by DeID asc";
		$rs=mysql_query($room_category);
		while($ob=mysql_fetch_array($rs)){
			print"<option value=".$ob[DeID].">- ".$ob[Fname]."</option>";
		}
	}
}
#Select Organization

#Select Room
function select_room()
{
//echo"$id_person,$title,$name_person,$id_position";
	#$con=connect_db();
//echo"xxx";
	#if(!$con){
		#return "ไม่สามารถติดต่อกับฐานข้อมูลได้ กรุณาพยายามอีกครั้ง";
	#}else{
		#print'<select name="cr_id" id="room">';
		#print'<option value="0">- Select Item -</option>';
		$room_category="select cr_id, name, net
		from meetingroom_croom
		order by cr_id asc";
		$rs=mysql_query($room_category);
		while($ob2=mysql_fetch_array($rs)){
			print"<option value=".$ob2[cr_id].">- ".$ob2[name]."</option>";
		}
		 #print"</select>";
	#}
}
#Select Room

#จำนวนผู้เข้าร่วม
function total_user(){
	#$con=connect_db();
	$sql="select max(net) as mn
	from phlabcom.meetingroom_croom";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
	
	for($tu=1; $tu <= $ob[mn]; $tu++){
		print "<option value=".$tu.">".$tu."</option>";
	}
}
#จำนวนผู้เข้าร่วม
//=======================================================================

//=======================================================================
function warning($msg)
{
	//แสดงส่วนของ header ใน html
?>

<style type="text/css">
<!--
.textheader {
	font-family: "MS Sans Serif", Tahoma, sans-serif;
	font-size: 14pt;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<br>
<br>

<table width="400" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#92BBE4">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" height="120" border="0" align="center" cellpadding="2" cellspacing="1">
      <tr>
        <td width="0" height="108" valign="middle" bgcolor="#5681ac"><div align="center">
            <p class="textheader"><? echo $msg  ?></p>
            <a href="javascript:;" onClick="window.back();"><span class="boldWhite_12"><< Back</span></a>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<?  
}

function warning2($msg){
	if($msg != ""){ 
		print "<table width=100% border=0 cellpadding=0 cellspacing=0>";
		print "<tr>";
		print "<td><span class=msgalert>".$msg."</span></td>";
		print "</tr>";
		print "</table>";
	}
}

function warning3($msg){
	print"<span class=msgalert>".$msg."</sapn>";
}
?>

