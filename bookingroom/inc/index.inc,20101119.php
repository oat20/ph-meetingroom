<!--<script src="bookingroom/inc/SpryAssets/SpryAccordion.js" type="text/javascript"></script> -->
<link href="bookingroom/inc/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css">

<div id="Accordion1" class="Accordion" tabindex="0">
<?php
	$sql="select name,cr_id from meetingroom_croom
	order by name asc";
	$rs=mysql_query($sql);
	while($ob=mysql_fetch_array($rs)){
		$cr_id=$ob[cr_id];
?>
  <div class="AccordionPanel">
    <div class="AccordionPanelTab"><?php print $ob[name]; ?></div>
    <div class="AccordionPanelContent">
    	<?php
		$sql2="select * from meetingroom_userq, jos_users,organization 
		where meetingroom_userq.cr_id='$cr_id' 
		and meetingroom_userq.u_id=jos_users.id
		and jos_users.DeID=organization.DeID
		and meetingroom_userq.Dater >= '$today'
		order by meetingroom_userq.Dater asc";
		$rs2=mysql_query($sql2);
		?>
        <table width="100%" border="0" cellspacing="1" bgcolor="#CCCCCC">
        	<tr bgcolor="#e9e9e9">
            	<th>วันที่</th>
                <th>รายการ</th>
                <th>สถานะ</th>
            </tr>
		<?php
				while($ob2=mysql_fetch_array($rs2)){
			?>
  <tr bgcolor="#e9e9e9">
    <td valign="top" width="20%" align="center"><?php print dateThai($ob2[Dater]); ?><br/><?php print $ob2[T_in];?> - <?php print $ob2[T_out]; ?></td>
    <td><strong><a href="bookingroom/inc/roomview.inc.php?ID=<?php print $ob2[uq_id]; ?>" title="รายละเอียดการจอง" rel="gb_page_center[640, 480]"><?php print $ob2["title"]; ?></a></strong><br/>ผู้จอง : <?php print $ob2["name"]." (".$ob2[Fname].")"; ?><br/>โทร. <?php print $ob2[tel]; ?></td>
    <td align="center"><?php if($ob2[status1]=='1'){
		print "<a href=# title=ใช้งาน><img src=bookingroom/img/tick.png border=0 /></a>";
	}else{
		print "<a href=# title=ยกเลิก><img src=bookingroom/img/publish_x.png border=0 /></a>";
	} ?></td>
  </tr>
<?php
				}
?>
</table>
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
