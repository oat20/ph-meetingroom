<?php 	$my=$_REQUEST["my"]; ?>
<!--<script src="bookingroom/inc/SpryAssets/SpryAccordion.js" type="text/javascript"></script> -->
<h1>รายการจอง</h1>
	<div class="submenu">
    <form action="<?=basename($_SERVER['PHP_SELF'])?>" method="get">
    <?php
		print "<select class=forminput2 name=my>";
		if($my==""){
			print "<option value=''>- แสดงเดือน -</option>";
		}else{
			print "<option value=".$my.">- ".dateformat1($my)."</option>";
		}
		$sql="select mid(Dater,1,7) as a from meetingroom_userq group by a order by a desc";
		$rs=mysql_query($sql);
		while($ob=mysql_fetch_array($rs)){
			print "<option value=".$ob[a].">- ".dateformat1($ob[a])."</option>";
		}
		print "</select>";
		print '<input name="action" type="hidden" value="query">';
		print '<input name="" type="submit" value=Go class=formbutton>'
	?>
    </form>
    </div>
<link href="bookingroom/inc/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css">

<div id="Accordion1" class="Accordion" tabindex="0">
<?php
	$sql="select name,cr_id from meetingroom_croom
	order by cr_id asc";
	$rs=mysql_query($sql);
	while($ob=mysql_fetch_array($rs)){
		$cr_id=$ob[cr_id];
?>
  <div class="AccordionPanel">
    <div class="AccordionPanelTab"><?php print $ob[name]; ?></div>
    <div class="AccordionPanelContent">
    	<?php
		/*$sql2="select * from meetingroom_userq, jos_users,organization 
		where meetingroom_userq.cr_id='$cr_id' 
		and meetingroom_userq.u_id=jos_users.id
		and jos_users.DeID=organization.DeID
		and ('$month_present' between mid(meetingroom_userq.Dater,1,7) and mid(meetingroom_userq.enddate,1,7)) 
		order by meetingroom_userq.Dater, meetingroom_userq.T_in asc";*/
		
		switch($_REQUEST["action"]){
		case "query" : $sql2="select * from meetingroom_userq, jos_users,organization, book_status 
		where meetingroom_userq.cr_id='$cr_id' 
		and meetingroom_userq.u_id=jos_users.id
		and jos_users.DeID=organization.DeID
		and (mid(meetingroom_userq.Dater,1,7) = '$my' or mid(meetingroom_userq.enddate,1,7) = '$my')
		and  meetingroom_userq.status1 = book_status.sta_id
		order by meetingroom_userq.Dater, meetingroom_userq.T_in asc"; break;
		
		default : $sql2="select * from meetingroom_userq, jos_users,organization, book_status 
		where meetingroom_userq.cr_id='$cr_id' 
		and meetingroom_userq.u_id=jos_users.id
		and jos_users.DeID=organization.DeID
		and (meetingroom_userq.Dater >= '$today' or meetingroom_userq.enddate >= '$today')
		and  meetingroom_userq.status1 = book_status.sta_id
		order by meetingroom_userq.Dater, meetingroom_userq.T_in asc"; break;
		}
		
		$rs2=mysql_query($sql2);
		$rows = mysql_num_rows($rs2);
		if($rows == "0"){
			print "<center>- ".$msg[1]." -</center>";
		}else{
		?>
        <table width="100%" border="0" cellspacing="1" bgcolor="#CCCCCC">
        	<tr bgcolor="#e9e9e9">
            	<th>วันที่</th>
                <th>วัตถุประสงค์</th>
                <th>สถานะ</th>
            </tr>
		<?php
				while($ob2=mysql_fetch_array($rs2)){
			?>
  <tr bgcolor="#e9e9e9">
    <td valign="top" width="20%" align="center"><?php print dateThai($ob2[Dater]); ?><br/><?php print $ob2[T_in];?> - <?php print $ob2[T_out]; ?></td>
    <td><strong><a href="bookingroom/inc/roomview.inc.php?ID=<?php print urlencode($ob2[uq_id]); ?>" title="รายละเอียดการจอง" rel="gb_page_center[640, 480]"><?php print $ob2["title"]; ?></a></strong><br/>ผู้จอง : <?php print $ob2["name"]." (".$ob2[Fname].")"; ?><br/>โทร. <?php print $ob2[tel]; ?></td>
    <td align="center"><?php /*if($ob2[status1]=='1'){
		print "<a href=# title=ใช้งาน><img src=bookingroom/img/tick.png border=0 /></a>";
	}else{
		print "<a href=# title=ยกเลิก><img src=bookingroom/img/publish_x.png border=0 /></a>";
	}*/ ?>
    <a href="#" title="<?php print $ob2["sta"]; ?>"><img src="<?php print $img_path.$ob2["img"]; ?>" border="0"></a></td>
  </tr>
<?php
				}
?>
</table>
<?php } ?>
		</div>
  </div>
  <?php
	}
  ?>
</div>
<script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>
