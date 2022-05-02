<?php
function ThaiDate()
{
$ThMonth = array ( "ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$b=date("n")-1;
$c=date("j");
$d=date("Y")+543;
return "$c $ThMonth[$b] $d";
}
$fullday = ThaiDate();
$new = strftime("%H")-0;

function dateThai($date){
	#$_date_name = array("Sun"=>"อา.","Mon"=>"จ.","Tue"=>"อ.","Wed"=>"พ.","Thu"=>"พฤ.","Fri"=>"ศ.","Sat"=>"ส.");
	$_date_name = array("0"=>"อา.","1"=>"จ.","2"=>"อ.","3"=>"พ.","4"=>"พฤ.","5"=>"ศ.","6"=>"ส.");
	#$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4); $mm=substr($date,5,2); $dd=substr($date,8,2); $time=substr($date,11,8);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy;
	#$dateT=$_date_name[$ddd]." ".intval($dd)." ".$_month_name[$mm]." ".$yy;
	#$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	}
	
	function dateformat1($date){
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
	$yy+=543;
	$dateT=$_month_name[$mm]." ".$yy;
	#$dateT=$_date_name[$ddd]." ".intval($dd)." ".$_month_name[$mm]." ".$yy;
	#$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." ".$time;
	return $dateT;
	}
	
	function dateformat2($date){
		$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,8);
		$yy+=543;
		$dateT=intval($dd)."/".$mm."/".$yy;
		return $dateT;
	}
	
		function dateThai2($date){
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	#$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);
	$yy=substr($date,0,4);$mm=substr($date,5,2);$dd=substr($date,8,2);$time=substr($date,11,5);
	$yy+=543;
	$dateT=intval($dd)." ".$_month_name[$mm]." ".$yy." เวลา ".$time;
	return $dateT;
	}
	
	function myThai($date){
	$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$yy=substr($date,0,4); $mm=substr($date,5,2);
	$yy+=543;
	$dateMY=$_month_name[$mm]." ".$yy;
	return $dateMY;
	}
	
	function nameMonth($date){
	$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	$dateMY=$_month_name[$date];
	return $dateMY;
	}
	
	function dateThai3($date)
	{
		$_date_name = array("Sun"=>"อา.","Mon"=>"จ.","Tue"=>"อ.","Wed"=>"พ.","Thu"=>"พฤ.","Fri"=>"ศ.","Sat"=>"ส.");
		$_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
	
		$yy=substr($date,0,4); 
		$mm=substr($date,5,2); 
		$dd=substr($date,8,2);
		$dn=date("D", mktime(0, 0, 0, $mm, $dd, $yy));
		
		$yy+=543;
		$dateT = $_date_name[$dn].', '.intval($dd)." ".$_month_name[$mm]." ".$yy;
		
		return $dateT;
	}
	function dateThai4($date)
	{
		$_date_name = array("Sun"=>"อาทิตย์","Mon"=>"จันทร์","Tue"=>"อังคาร","Wed"=>"พุธ","Thu"=>"พฤหัสบดี","Fri"=>"ศุกร์","Sat"=>"เสาร์");
		$_month_name = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	
		$yy=substr($date,0,4); 
		$mm=substr($date,5,2); 
		$dd=substr($date,8,2);
		$dn=date("D", mktime(0, 0, 0, $mm, $dd, $yy));
		
		$yy+=543;
		$dateT = $_date_name[$dn].', '.intval($dd)." ".$_month_name[$mm]." ".$yy;
		
		return $dateT;
	}
	
	function maxid($table, $colume){
		$sql="select max($colume) as a from $table";
		$rs=mysql_query($sql);
		$ob=mysql_fetch_assoc($rs);
		$a=$ob["a"];
		if(!$a)
				return 1;
			else
 				return $a+1;
	}
	
	function del_booking($tablename, $keyuq_id){
		$sql="delete from $tablename where uq_id='$keyuq_id'";
		$rs=mysql_query($sql);
		return $rs;
	}
	
	function active($active){
		if($active=='1'){
			print "<a href=# title=ใช้งาน><img src=bookingroom/img/tick.png border=0 /></a>";
		}else if($active=='0'){
			print "<a href=# title=ยกเลิก><img src=bookingroom/img/publish_x.png border=0 /></a>";
		}
	}
	
	function select_edu(){
		$link=mysql_connect("localhost","webmaster","phwebmaster");
		mysql_query("set names utf8");
		
		$room_category="select phad_timetable.tt_course_level.dg_name
		from phad_timetable.tt_course_level
		order by phad_timetable.tt_course_level.dg_id asc";
		$rs=mysql_query($room_category);
		
		print"<select id=edu_level>";
		while($ob=mysql_fetch_array($rs)){
			print"<option value=".$ob[dg_name].">- ".$ob[dg_name]."</option>";
		}
		print"</select>";
	}
	
function totalhour($begin,$end,$t1,$t2){
	$remain1=intval(strtotime($end)-strtotime($begin));
	$remain2=intval(strtotime($t2)-strtotime($t1));
	$wan=floor($remain1/86400)+1;
	
	$l_wan=$remain2%86400;  
    $hour=floor($l_wan/3600);
	
	$ans=$wan*$hour;
	
	return $ans;
}

function booTime(){
	$sql = "select * from room_time 
	where trash = '0'
	order by tim_id asc";
	$rs = mysql_query($sql);
	while($ob = mysql_fetch_array($rs)){
		print "<input name=booTime type=radio value=".$ob[tim_id]." id=booTime> ".$ob[name]." (".$ob[start]." น. - ".$ob[end]." น.)<br/>";
	}
}

function logfile($getip, $datelog, $url){
	$sqlLog = "insert into user_log(us_id, ul_in, ul_ip, ul_url) values('$u', '$datelog', '$getip','$url')";
	$rsLog = mysql_query($sqlLog);
	return $rsLog;
}

function swapcolor($swap="1"){
	if($swap=="1"){
		$color="";
		$swap="2";
	}else{
		$color="#C9D1CD";
		$swap="1";
	}
	return $color;
}

function random_ID($len, $mode=2){
	srand((double)microtime()*10000000);
	switch($mode){
		case "1":
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		break;
		case "2";
			$chars = "012345678901234567890123456789000000111111222222333333444444555555666666777777888888999999";
		break;
		default:
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	}

	$ret_str = "";
	$num = strlen($chars);
	for($i = 0; $i < $len; $i++){
		$ret_str.= $chars[rand()%$num];
		$ret_str.="";
	}
	#return $ret_str;
	$y=date("Y");
	$yy=$y+543;
	return $yy.$ret_str;
}

function random_ID2($len, $mode='0'){
	srand((double)microtime()*10000000);
	switch($mode){
		case "1":
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		break;
		case "2";
			$chars = "012345678901234567890123456789";
		break;
		default:
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	}

	$ret_str = "";
	$num = strlen($chars);
	for($i = 0; $i < $len; $i++){
		$ret_str.= $chars[rand()%$num];
		$ret_str.="";
	}
	#return $ret_str;
	$y=date("YmdHis");
	return $y.$ret_str;
}

function fixcost($name)
{
	$fc2="<select name='".$name."'>";
		for($fc=0;$fc<=99;$fc++)
		{
			$fc2.="<option value='".$fc."'>".$fc."</option>";
		}
	$fc2.="</select>";
	return $fc2;
}

#หาจำนวนวัน
function date_num($startdate,$enddate){
		date_default_timezone_set('UTC');

		//// Prints: July 1, 2000 is on a Saturday
		//echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

		//test [2011-01-01 and 2011-04-01 and Monday] again

		$Input1_split = split("-", $startdate );
		$YY_input1 = $Input1_split[0] ;	// 2011 
		$MM_input1 = $Input1_split[1] ;	// 04
		$DD_input1 = $Input1_split[2]; 	// 01

		$Input2_split = split("-", $enddate );
		$YY_input2 = $Input2_split[0] ;	// 2011 
		$MM_input2 = $Input2_split[1] ;	// 04
		$DD_input2 = $Input2_split[2]; 	// 30

		#echo "day1 = $YY_input1 $MM_input1 $DD_input1 <br>";
		#echo "day2 = $YY_input2 $MM_input2 $DD_input2 <br>";
		#echo "?????? ".$day3." ??? ".$day4;

		//make mktime for the end loop ref
		$mktime_Input1  = mktime(0, 0, 0, $MM_input1, $DD_input1, $YY_input1);  
		$mktime_Input2  = mktime(0, 0, 0, $MM_input2, $DD_input2, $YY_input2);

		$result_date = $mktime_Input2 - $mktime_Input1; //¹ÓÇÑ¹·Õè 2 - ÇÑ¹·Õè 1 
		//$result_date = strtotime($enddate) - strtotime($startdate);

		$result = $result_date / (60 * 60 * 24);

		return $result;
	}
	#หาจำนวนวัน
	
	function form_selectdate($d, $default_d){
		$sel_d='<select name="'.$d.'" class="form-control" required>';
			$sel_d .= '<option value="">- วัน -</option>';
			for($i=1;$i<=31;$i++){
				$i = sprintf("%02d",$i);
				if($i == $default_d){
					$sel_d.='<option value="'.$i.'" selected>'.$i.'</option>';
				}else{
					$sel_d.='<option value="'.$i.'">'.$i.'</option>';
				}
			}
		$sel_d.='</select>';
		return $sel_d;		
	}	
	function form_selectmonth($mm, $m, $lang){//ตัวแปร,ค่าdefault,ภาษา,required
		switch($lang){
		 case "th" : $m_array = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม"); break;
			case "en" : $m_array = array("01"=>"Jan","02"=>"Feb","03"=>"Mar","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec"); break;
		}
		
	$sel_m='<select name="'.$mm.'" class="form-control" required>';
	$sel_m.='<option value="">- เดือน -</option>';
								//for($i=1; $i<=12; $i++) 
								foreach($m_array as $j=>$v){
								   if($j == $m){ 
									  $sel_m.=("<OPTION VALUE=\"$j\" SELECTED>- ".$v." -</option>");
								   }else{
									  $sel_m.=("<OPTION VALUE=\"$j\">- ".$v." -</option>");
								   }
								} 
              $sel_m.="</select>";
			  return $sel_m;
}
function form_selectyear3($yyy, $budget_year, $required) //insert ค.ศ. & show พ.ศ. 
{
					$y=date("Y"); $ys=$y-10; $yn=$y+10;
	$sel_y="<select name='".$yyy."' class='form-control' ".$required.">";
				for($yy=$yn;$yy>=$ys;$yy--){
					$yy2=$yy+543;
					if($yy == $budget_year){
            			$sel_y.="<option value='".$yy."' selected='selected'>- ".$yy2." -</option>";
					}else{
						$sel_y.="<option value='".$yy."'>- ".$yy2." -</option>";
					}
				}
            $sel_y.="</select>";
			return $sel_y;
}

function form_dropdowntime($formName, $step="5", $defaultTime){
	echo '<select name="'.$formName.'" size=1 id="t2" class="form-control">';
	//echo '<option value=""></option>';
	
	for($i=8; $i<=16; $i++) 
	{
		#$j=$i+1;
		$i = sprintf("%02d",$i);
		
		for($j=0; $j<=59; $j+=$step) {
			$j = sprintf("%02d",$j);
			$timeValue = $i.':'.$j;
			
			if($defaultTime == $timeValue){
        		echo"<option value=".$timeValue." selected>- ".$timeValue." -</option>";
			}else{
				echo"<option value=".$timeValue.">- ".$timeValue." -</option>";
			}
		}
	}
    
	echo"</select>";
}

function form_selectdate2($d, $default_d, $dstep='3', $dstep2='90'){
		$sel_d='<select name="'.$d.'" class="form-control" required data-placeholder="เลือกวันจอง">';
			$sel_d .= '<option value=""></option>';
			for($i=$dstep;$i<=$dstep2;$i++){
				$i2 = date('Y-m-d', strtotime('+'.$i.' day'));
				if($i2 == $default_d){
					$sel_d.='<option value="'.$i2.'" selected>'.dateThai3($i2).'</option>';
				}else{
					$sel_d.='<option value="'.$i2.'">'.dateThai3($i2).'</option>';
				}
			}
		$sel_d.='</select>';
		return $sel_d;		
	}

function random_color($len="6"){
	srand((double)microtime()*10000000);
			$chars = "0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF000000111111222222333333444444555555666666777777888888999999AAAAAABBBBBBCCCCCCDDDDDDEEEEEEFFFFFF";

	$ret_str = "";
	$num = strlen($chars);
	for($i = 0; $i < $len; $i++){
		$ret_str.= $chars[rand()%$num];
		$ret_str.="";
	}
	return '#'.$ret_str;
}

//show messagealert
function blog_alert($error_msg){
	$blog_alert = '<div class="row"><div class="col-sm-12"><div class="alert alert-danger" role="alert"><p class="font-20">'.$error_msg.'</p></div></div></div>';
	return $blog_alert;
}

function blog_alert_02($error_msg){
	$blog_alert = '<div class="row"><div class="col-sm-12"><div class="alert alert-warning" role="alert"><p class="font-20">'.$error_msg.'</p></div></div></div>';
	return $blog_alert;
}
function blog_alert_03($color,$icon,$error_msg){
	$blog_alert = '<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-'.$color.'" role="alert">
				<p><strong>'.$icon.'</strong> '.$error_msg.'</p>
			</div>
		</div>
	</div>';
	return $blog_alert;
}
//show messagealert
?>