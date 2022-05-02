<?
#session_start();
#if($user == "")
#{
	#header("Location: login_oc.php");
#}
include"bookingroom/calendar/cal_func.php";

	function search( $yyy, $mmm )
	{
		if($search == "ค้นหา")
		{
				$cal_month=$mmm;
				$cal_year=$yyy;
		}
	}
?>
<link href="bookingroom/calendar/calendar.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="module1">
<h3>ปฏิทินการจอง</h3>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
			<td>
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                  <tr class="title">
                    <td  class="title" ><div align="left" class="font8"><a href="<? #echo $PHP_SELF; ?>home.php?Y=<? echo $cal_prev_year ?>&m=<? echo $cal_prev_month ?>&d=<? echo $cal_day ?>" title="เดือนก่อนหน้า"><img src="bookingroom/img/ml05.png" border="0"></a></div></td>
                    <td><div align="center" class="font12"><strong><?php echo $_month_name[$cal_month]."&nbsp;".($cal_year+543);?></strong></div></td>
                    <td class="title"><div align="right"><a href="<? #echo $PHP_SELF; ?>home.php?Y=<? echo $cal_next_year ?>&m=<? echo $cal_next_month ?>&d=<? echo $cal_day; ?>" title="เดือนถัดไป"><img src="bookingroom/img/ml05.gif" border="0"></a></div></td>
                </tr>
              </table>
				 <!-- ตารางแสดงปฏิทิน -->
                <table width="100%" cellpadding="3" cellspacing="1" class="overview">
                  <tr>
                    <td height="21" class="dayname"><div align="center">จ.</div></td>
                    <td class="dayname"><div align="center">อ.</div></td>
                    <td class="dayname"><div align="center">พ.</div></td>
                    <td class="dayname"><div align="center">พฤ.</div></td>
                    <td class="dayname"><div align="center">ศ.</div></td>
                    <td class="dayname"><div align="center">ส.</div></td>
                    <td class="dayname"><div align="center"><font color="#FF0000">อา.</font></div></td>
                  </tr>
<?php
#require_once('connectdb.php');
#$query_rsCal = "select startdate,enddate from calendar_events where user='$user'";
$query_rsCal = "select * from meetingroom_userq";
$rsCal = mysql_query($query_rsCal, $conn) or die(mysql_error());
$row_rsCal = mysql_fetch_assoc($rsCal);

//เอาวันเริ่มและสิ้นสุดมาเก็บใน array เพื่อใช้ในการเปรียบเทียบ
$st=array();#$ed=array();
$i=0;
do{
$st[$i]=$row_rsCal['Dater'];
$ed[$i]=$row_rsCal['Dater'];

#$query_rsCal2 = "select id, subject, starttime, endtime 
#from room_booking
#where (startdate BETWEEN '$st' AND '$ed')
#OR (enddate BETWEEN '$st' AND '$ed')
#order by starttime desc";
#$rsCal2 = mysql_query($query_rsCal2, $link) or die(mysql_error());
#$row_rsCal2 = mysql_fetch_array($rsCal2);
#$subject=$row_rsCal['subject'];
#$starttime=$row_rsCal["starttime"];
#$endtime=$row_rsCal["endtime"];

$i++;} 
 while ($row_rsCal = mysql_fetch_assoc($rsCal));
 #while ($row_rsCal = mysql_fetch_array($rsCal));

	#$query_rsCal2 = "select * from room_booking
	#where (startdate BETWEEN '$st' AND '$ed')
	#OR (enddate BETWEEN '$st' AND '$ed')";
	#$rsCal2 = mysql_query($query_rsCal2, $link) or die(mysql_error());
	#$row_rsCal2 = mysql_fetch_array($rsCal2);
 	#$subject=$row_rsCal['subject']; 

for($i=0;$i<count($st);$i++)
{
 $ed[$i]=substr($ed[$i],0,4).substr($ed[$i],5,2).substr($ed[$i],8,2);
 $st[$i]=substr($st[$i],0,4).substr($st[$i],5,2).substr($st[$i],8,2);
}

	if ( ( $cal_year == $cur_year ) && ( $cal_month == $cur_month ) )
	{
		$today_day = $cur_day;
	} else $today_day = 0;
	//จำนวนวันในเดือนที่แล้ว จำนวนวันในเดือนนี้  หาค่าวันที่ 1 ของเดือนแบบสัปดาห์
	$days_last_month = num_days( $cal_prev_year, $cal_prev_month );
	$days_this_month = num_days( $cal_year, $cal_month );
	$first_day_pos = date( "w", mktime( 0,0,0,$cal_month,1,$cal_year) );
	//เปลี่ยนค่าที่ได้ถ้าเป็นวันอาทิตย์ให้เท่ากับ 7 แทน Mo=1 to Su=7
	if ( $first_day_pos == 0 ) $first_day_pos = 7; 
	
	$day_num= $days_last_month - ($first_day_pos-2); 
	$class="last_month";
	$p=array();
	
	for ( $y=1; $y<=6; $y++ )
	{
	?>
		<tr>
		<?php
		for ( $x=1; $x<=7; $x++ )
		{
			if ( ($y==1) && ($x==$first_day_pos) ) 
			{ 
				$day_num = 1; $class="";
			}
			if ( ($y >1) && ($day_num>$days_this_month) ) 
			{ 
				$day_num = 1; $class="next_month"; 
			}
			if ( ($class=="") && ($day_num == $today_day) )
			{
				$id="today";
			} else $id="";
			if ( $class == "" ){ 
			if($cal_month<=9)
			$mm="0".$cal_month;
			else $mm=$cal_month;
			
			if($day_num<=9)
			$dd="0".$day_num;
			else $dd=$day_num;
			$times=$cal_year."-".$mm."-".$dd;
			}
			$cur_day=$cal_year.$mm.$dd;
			for($i=0;$i<count($st);$i++){
			if(($cur_day>=$st[$i])&&($cur_day<=$ed[$i])){
			$p[$day_num]=1;
			}
			}
			if($p[$day_num]==1&&$class==""){
			?>
			<td class="<? echo $class; ?>" id="<? echo $id; ?>" align="center" bgcolor="#009933"><span class="activity"><a href="booking?keyDater=<? echo $cal_year."-".$mm."-".$dd; ?>"><? echo $day_num; ?></a><br/></span></td>
			<?
			}else{ 
			?>
			<td class=<?php echo $class; ?> id=<?php echo $id; ?> bgcolor=#E9E9E9 align="center"><span class="font10"><?php echo $day_num; ?></span></td>
			<?php
			}
			$day_num++;								
			}
			?>
		</tr>
<?php
	} 
?>
              </table>
              
              <!--<table width="100%">
              	<tr height="10">
                	<td></td>
                </tr>
              	<tr>
                	<?php
					#$sql="select * from room_category
					#order by cid asc";
					#$rs=mysql_query($sql, $link);
					#while($ob=mysql_fetch_array($rs)){
					?>
                	<td bgcolor="<?php #echo $ob["color"]; ?>" width="20">&nbsp;</td>
                    <td><?php #echo $ob["category"]; ?></td>
                    <?php
					#}
					?>
                </tr>
              </table> -->
<!--สิ้นสุดปฏิทินเหตุการณ์ -->
<!--<table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tr>
  <td><div align="center"><a href="<? #echo $PHP_SELF; ?>index.php">วันที่ปัจจุบัน</a></div></td>
  </tr></table> -->
			  <!-- <table width="100%" border="0" cellpadding="3" cellspacing="0">
                <form action="index.php" onClick="search">
                  <tr>
                    <td bgcolor="#004080"><div align="center">                        
                      <select name="mmm" id="mmm">
            <?php
															/*$m_array = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
															for($i=0; $i<12; $i++) 
															{
															   $j=$i+1;
																//$j = sprintf("%02d",$j);
															   if($j == date("n")) 
																  echo("<OPTION VALUE=\"$j\" SELECTED>$m_array[$i]");
															   else
																  echo("<OPTION VALUE=\"$j\">$m_array[$i]");
															} */
													?>
                      </select><select name="yyy" id="yyy">
 						<?
								 /*for($i=2005;$i<=2015;$i++)
								 { 
								 $temp=$i;
								 $temp2=$temp+543;
								//$temp= sprintf("%02d",$temp);								
								if($temp==date('Y'))
			    				echo"<option value='$temp'selected>$temp2</option>";
			   					else  echo"<option value='$temp'>$temp2</option>";
				 				}*/?>
                           </select>&nbsp;
                           <!-- <input name="search" type="submit" id="search" value="ค้นหา"> -->
<!--                            <input name="search" type="image" id="search" src="img/th_search.gif" width="37" height="16" border="0" onClick="search">
                      
</div>
                    </td>
                  </tr>
                </form>
 </table> --></td>
            </tr>
        </table>
</div>
<div class="line"></div>