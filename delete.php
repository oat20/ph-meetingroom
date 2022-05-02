<? ob_start();
session_start();
include"../../config.php";
include"../../inc/connect/connect.php";
//--------------------------------------------------------------------------------------------------------------------------------
if(!empty($course_id)){
	$sql="select summary from tt_course
	where id='$course_id'";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
	unlink("../upload/description/".$ob["summary"]);
	
	$sql2="delete from tt_course
	where id='$course_id'";
	mysql_query($sql2);

header("location: ../subject.php");
?>
<!--<meta http-equiv="refresh" content="0;URL=show_allnews.php">
 -->
<? } 
//--------------------------------------------------------------------------------------------------------------------------------
if(!empty($tt_id)){
$sql="select student from tt_timetable
	where id='$tt_id'";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
	unlink("../upload/student/".$ob["student"]);
	
	$sql2="delete from tt_timetable
	where id='$tt_id'";
	mysql_query($sql2);

header("location: ../timetable.php");
?>
<!--<meta http-equiv="refresh" content="0;URL=show_typenews.php"> -->
<? } 

//------------------------------------------------ ź��ª���  admin --------------------------------------------------------------------------------
if(!empty($id_user)){
delete_user(admin,$id_user);
#delete_user(fixtypenews_admin,$id_user);
header("location: ../admin.php ");
}
 
 ?>

 <? 
  //--------------------------------------------------------------------------------------------------------------------------------
if(!empty($id_position)){
delete_position(position_news,$id_position);
//echo"delete=== $id_detail";

header("location: ../default,show_position.php ");
?>
<!--<meta http-equiv="refresh" content="0;URL=show_allnews.php">
 -->
<? } 
 //--------------------------------------------------------------------------------------------------------------------------------
if(!empty($id_person)){
delete_person(person_most,$id_person);
//echo"delete=== $id_detail";

header("location: ../default,show_person.php ");
?>
<!--<meta http-equiv="refresh" content="0;URL=show_allnews.php">
 -->
<? } 
//--------------------------------------------------------------------------------------------------------------------------------
