<?
session_start();
#if($user == "")
#{
	#header("Location: login_oc.php");
#}
include"bookingroom/calendar/cal_func.php";

$Y=$_GET[Y]; $m=$_GET[m]; $d=$_GET[d];

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
<!--<h3>รายการการจองห้อง</h3> -->
<!--<p><button class="button4" onclick="location.href='formbooking.php'">ทำการจอง</button></p> -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
			<td>
              <table width="100%" border="0" cellspacing="0" cellpadding="3" bgcolor="#FFFFFF">
                  <tr class="title">
                    <td  class="title" ><div align="left" class="font8"><a href="<? echo $PHP_SELF; ?>?Y=<? echo $cal_prev_year ?>&m=<? echo $cal_prev_month ?>&d=<? echo $cal_day ?>" title="เดือนก่อนหน้า"><img src="bookingroom/img/back_f2.png" border="0" /></a></div></td>
                    <td><div align="center"><font face="Tahoma"><strong><?php echo $_month_name[$cal_month]."&nbsp;&nbsp;พ.ศ.&nbsp;".($cal_year+543);?></strong></font></div></td>
                    <td class="title"><div align="right"><span class="font8"></span><a href="<? echo $PHP_SELF; ?>?Y=<? echo $cal_next_year ?>&m=<? echo $cal_next_month ?>&d=<? echo $cal_day; ?>" title="เดือนถัดไป"><img src="bookingroom/img/next_f2.png" border="0" /></a><span class="style1"></span></div></td>
                </tr>
              </table>
				 <!-- ตารางแสดงปฏิทิน -->
                <table width="100%" cellpadding="3" cellspacing="1" class="overview">
                  <tr>
                    <td height="21" class="dayname"><div align="center">จันทร์</div></td>
                    <td class="dayname"><div align="center">อังคาร</div></td>
                    <td class="dayname"><div align="center">พุธ</div></td>
                    <td class="dayname"><div align="center">พฤหัสบดี</div></td>
                    <td class="dayname"><div align="center">ศุกร์</div></td>
                    <td class="dayname"><div align="center">เสาร์</div></td>
                    <td class="dayname"><div align="center"><font color="#FF0000">อาทิตย์</font></div></td>
                  </tr>
<?php
#require_once('connectdb.php');
#$query_rsCal = "select startdate,enddate from calendar_events where user='$user'";
$query_rsCal = "select * from meetingroom_userq";
$rsCal = mysql_query($query_rsCal) or die(mysql_error());
$row_rsCal = mysql_fetch_assoc($rsCal);

//เอาวันเริ่มและสิ้นสุดมาเก็บใน array เพื่อใช้ในการเปรียบเทียบ
$st=array();$ed=array();
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
			<td class="<? echo $class; ?>" id="<? echo $id; ?>"  bgcolor=#E9E9E9 valign="top"><span class="font10bold"><? echo $day_num; ?></span> <!--<a href="formbooking.php?times=<?php echo $times; ?>"><span class="font8">[จองห้อง]</span></a> -->
			<br/>
			<?php
			$query_rsCal2 = "select book_status.img,room_time.start,room_time.end,meetingroom_userq.title,meetingroom_croom.name,meetingroom_croom.color,meetingroom_userq.uq_id 
			from meetingroom_userq
			inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
			inner join room_time on (meetingroom_userq.time_in=room_time.tim_id)
			inner join book_status on (meetingroom_userq.status1=book_status.sta_id)
			where ('$times' BETWEEN meetingroom_userq.Dater AND meetingroom_userq.Dater) 
			and meetingroom_userq.status1 <> '3'
			order by room_time.tim_id asc";
			$rsCal2 = mysql_query($query_rsCal2) or die(mysql_error());
			while($row_rsCal2 = mysql_fetch_array($rsCal2)){
			$subject=$row_rsCal2['title'];
			$starttime=$row_rsCal2["start"];
			$endtime=$row_rsCal2["end"];
			$color=$row_rsCal2["color"];
			$name=$row_rsCal2[name];
			?>
			<span style="background-color:<?=$color;?>" class="activity"><a href="bookingroom/inc/roomview.inc.php?ID=<?php print $row_rsCal2[uq_id]; ?>" title="รายละเอียดการจอง" rel="gb_page_center[640, 480]"><?php echo "<img src='".$livesite."bookingroom/img/".$row_rsCal2[img]."' border='0'> ".$starttime; ?>-<?php echo $endtime; ?> <?php echo $subject; ?></a></span>
			<?php
			}
			?>
			</td>
			<?
			}else{ 
			?>
			<td class=<?php echo $class; ?> id=<?php echo $id; ?> bgcolor=#E9E9E9 valign="top"><span class="font10bold"><?php echo $day_num; ?></span> <!--<span class="font8"><a href="formbooking.php?times=<?php echo $times; ?>">[จองห้อง]</a></span> --></td>
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
              	<tr>
                	<? 
$column =5;
$sql = "select name,color
from meetingroom_croom
order by cr_id asc";
			$result = mysql_query($sql);
$ic=1;
			while($result1 = mysql_fetch_array($result)){
 		
					if ($ic  == 1){
					?>
<tr>
                      <?php  
					}
					?>
	<td><input name="" type="text" size="1" readonly="true" style="background-color:<?=$result1[color];?>; border:none"> <?=$result1[name];?></td>
   <?php
							$ic++; 
							if ($ic  > $column)
							 { 
							 ?>
								</tr>
                                <?php								
								$ic = 1;
							}
						}
					?>
              </table> -->
              <!--<center>
              <table>
              	<tr>
                <?php
			/*$sql="select sta,img from book_status order by sta_id asc";
			$rs=mysql_query($sql);
			while($ob=mysql_fetch_array($rs))
			{
				print "<td><img src='".$live."bookingroom/img/".$ob[img]."'></td><td>".$ob[sta]."</td>";
			}*/
			?>
                </tr>
              </table> 
              </center> -->
<!--สิ้นสุดปฏิทินเหตุการณ์ -->
<!--<table width="100%" border="0" cellpadding="3" cellspacing="0">
  <tr>
  <td><div align="center"><a href="<? #echo $PHP_SELF; ?>">วันที่ปัจจุบัน</a></div></td>
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
 -->		      <!-- </table> --></td>
            </tr>
        </table>
