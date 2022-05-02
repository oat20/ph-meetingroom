<?php
#ob_start();
#session_start();
#$u=$_SESSION["u"];
include"../bookingroom/config.php";
include"../bookingroom/inc/connect_db.php";
include"../bookingroom/inc/function.php";
include"../bookingroom/inc/function2.php";

$conn=connect_db();

$m=$_REQUEST["m"];
$y=$_REQUEST["y"];
$room=$_POST[room];

$y=$y-543;
$key=$y."-".$m;
?>
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
	top:36px;
	width:936px;
	height:299px;
	z-index:12;
}
#Layer15 {	position:absolute;
	left:22px;
	top:-1px;
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
	text-decoration: underline;
	color: #3399FF;
}
a:active {
	text-decoration: none;
	color: #3399FF;
}
.style3 {font-size: 12; }
-->
</style>
        
        <script type="text/javascript">
        var GB_ROOT_DIR = "bookingroom/GreyBox/greybox/";
    </script>

    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="bookingroom/GreyBox/greybox/gb_scripts.js"></script>
    <link href="bookingroom/GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

	<?php
	if($room == 0)
	{
			$sql2="select *,jos_users.name as a, meetingroom_croom.name as a2
			from meetingroom_userq inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
			inner join  organization on (jos_users.DeID=organization.DeID)
			inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
			inner join book_status on (meetingroom_userq.status1 = book_status.sta_id)
			inner join room_time on (meetingroom_userq.time_in = room_time.tim_id)
			where mid(meetingroom_userq.Dater,1,7) = '$key'
			order by meetingroom_userq.Dater, room_time.tim_id asc";
	}
	else
	{
		$sql2="select *,jos_users.name as a, meetingroom_croom.name as a2
			from meetingroom_userq inner join jos_users on (meetingroom_userq.u_id=jos_users.id)
			inner join  organization on (jos_users.DeID=organization.DeID)
			inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
			inner join book_status on (meetingroom_userq.status1 = book_status.sta_id)
			inner join room_time on (meetingroom_userq.time_in = room_time.tim_id)
			where mid(meetingroom_userq.Dater,1,7) = '$key'
			and meetingroom_userq.cr_id = '$room'
			order by meetingroom_userq.Dater, room_time.tim_id asc";
	}
		$rs2=mysql_query($sql2);
		$total=mysql_num_rows($rs2);
		?>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    	<tr>
        	<td colspan="4"><strong>จำนวน <?php print $total; ?> รายการ</strong> <a href="report_by_month_pdf.php?key=<?=$key;?>&room=<?=$room;?>" title="พิมพ์รายงาน" target="_blank"><img src="bookingroom/img/print.gif" /></a></td>
        </tr>
      <tr bgcolor="#59993f">
      	<td>เลขที่รายการ</td>
      <th>ห้อง</th>
      	<th>วัน/เวลาจอง</th>
        <th><div align="center" class="style3">ชื่องาน</div></th>
        <th>ชื่อผู้จอง</th>
        <th>สถานภาพ</th>
        <th>พิมพ์</th>
        </tr>
 	  <?php
		$a=1;
		$ans=0;
		while($ob2=mysql_fetch_array($rs2)){
			$totalhour=totalhour($ob2[Dater],$ob2[enddate],$ob2[T_in],$ob2[T_out]);
	  ?>
      <tr bgcolor="#e9e9e9">
      	<td><?=$ob2[uq_id];?></td>
      	<td><strong><?php print $ob2[a2]." (".$ob2[location].")"; ?></strong></td>
		<td><strong><?php echo dateThai($ob2["Dater"]); ?></strong><br/><?php print $ob2[start]." - ".$ob2[end]; ?></td>
		<td><a href="bookingroom/inc/roomview.inc.php?ID=<?php print $ob2[uq_id]; ?>" title="รายละเอียดการจอง" rel="gb_page_center[640, 480]"><?php print $ob2[title]; ?></a></td>
    	<td><strong><?php print $ob2[a]; ?></strong><br/><?php print $ob2[Fname]; ?></td>
        <td align="center"><a href="#" title="<?php print $ob2["sta"]; ?>"><img src="<?php print $img_path.$ob2["img"]; ?>" border="0"/></a></td>
        <td align="center"><a href="bookingroom/booking_detail_pdf.php?ID=<?php print $ob2[uq_id]; ?>" target="_blank"><img src="bookingroom/img/print.gif" border="0"/></a></td>
	  </tr>
	  <?php
	  	$a++;
	  }
	  ?>
    </table>
<script type="text/javascript" src="bookingroom/js/mergecell.js"></script>
