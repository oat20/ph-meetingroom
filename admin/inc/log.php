<?php
include("../../bookingroom/config.php");
include("../../bookingroom/connect/connect.php");
include("../../bookingroom/inc/function.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr bgcolor="#59993f">
	    <th>ชื่อ</th>
        <th>ส่วนงาน</th>
	<th>วันที่</th>
    <th>IP Address</th>
</tr>
<?php
$sql = "SELECT jos_users.name, organization.Fname, user_log.ul_in, user_log.ul_ip,mid(user_log.ul_in,12,5) as t
FROM jos_users, user_log, organization
WHERE jos_users.id = user_log.us_id
AND jos_users.DeID = organization.DeID
ORDER BY user_log.ul_in DESC";
$rs=mysql_query($sql);
while($ob=mysql_fetch_array($rs)){
	?>
    <tr bgcolor="#e9e9e9">
    	<td align="center"><?php print $ob[name]; ?></td>
        <td><?=$ob[Fname];?></td>
    	<td align="center"><?php print dateThai($ob[ul_in])." เวลา ".$ob[t]; ?></td>
        <td align="center"><?php print $ob["ul_ip"]; ?></td>
    </tr>
    <?php
}
?>
</table>