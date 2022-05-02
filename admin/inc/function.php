<?php
function ThaiDate()
{
$ThMonth = array ( "Ҥ","Ҿѹ","չҹ","¹","Ҥ","Զع¹","áҤ","ԧҤ","ѹ¹","Ҥ","Ȩԡ¹","ѹҤ");
$b=date("n")-1;
$c=date("j");
$d=date("Y")+543;
return "$c $ThMonth[$b] $d";
}
$fullday = ThaiDate();
$new = strftime("%H")-0;

function dateThai($date){
	$_date_name = array("Sun"=>".","Mon"=>".","Tue"=>".","Wed"=>".","Thu"=>".","Fri"=>".","Sat"=>".");
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	#$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy;
	#$dateT=$_date_name[$ddd]." ".intval($dd)." ".$_month_name[$mm]." ".$yy;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	}
	
	function dateformat1($date){
	$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=$_month_name[$mm]." ".$yy;
	#$dateT=$_date_name[$ddd]." ".intval($dd)." ".$_month_name[$mm]." ".$yy;
	#$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	}
	
		function dateThai2($date){
	$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	#$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	}
	
	function myThai($date){
	$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$yy=substr($date,0,4); $mm=substr($date,5,2);
	$yy+=543;
	$dateMY=$_month_name[$mm]." ".$yy;
	return $dateMY;
	}
	
	function maxid($table, $colume){
		$sql="select max($colume) as a from $table";
		$rs=mysql_query($sql);
		$ob=mysql_fetch_array($rs);
		$a=$ob["a"];
		if(!$a)
				return 10000;
			else
 				return $a+1;
	}
	
	function del_booking($tablename, $keyuq_id){
		$sql="delete from $tablename where uq_id='$keyuq_id'";
		$rs=mysql_query($sql);
		return $rs;
	}
	
	function active($active){
		if($active=="1"){
			print"<img src=../bookingroom/img/tick.png border=0 />";
		}else if($active=="0"){
			print"<img src=../bookingroom/img/publish_x.png border=0 />";
		}
	}
	
	function block($active){
		if($active=="0"){
			print"<img src=../bookingroom/img/tick.png border=0 />";
		}else if($active=="1"){
			print"<img src=../bookingroom/img/publish_x.png border=0 />";
		}
	}
?>