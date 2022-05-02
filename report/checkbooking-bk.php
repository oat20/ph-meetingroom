<script>
function report() {
	var URL = "report/stat.inc.php";
	var data = getFormData("form1");
	ajaxLoad("post", URL, data, "display");
}
</script>
	  <form id="form1">
      	<fieldset>
       	  <legend>ค้นหา</legend>
      <table border="0" cellspacing="0" class="table1">
  <tr>
        	<td class="td3">เดือน</td>
            
            <td class="td3">
            <?php
			print "<select name='m' class='forminput'>";
            for($i=1;$i<=12;$i++){
		$j = sprintf("%02d",$i);
				print "<option value='".$j."'>- ".nameMonth($j)." -</option>";
			}
			print "</select>";
		?>
            </td>
        </tr>
  <tr>
    <td class="td3">ปี</td>
    <td class="td3">
                	<select name="y" class="forminput">
            	<?php
				$year_present=date("Y");
				$yc=$year_present+543;
				$ys=$yc-4;
				$yn=$yc+4;
				for($yy=$ys;$yy<=$yn;$yy++){
					if($yy == $yc){
            			print "<option value='".$yy."' selected='selected'>- ".$yy." -</option>";
					}else{
						print "<option value='".$yy."'>- ".$yy." -</option>";
					}
				}
				?>
            </select></td>
    </tr>
  <tr>
    <td class="td3">ห้อง</td>
    <td class="td3">
    	<select name="room" id="room" class="forminput">
        	<option value="0">- ดูทั้งหมด -</option>
        <?php
					$room_category="select cr_id, name, net,location
					from meetingroom_croom
					where enable = '1'
					order by cr_id asc";
					$rs=mysql_query($room_category);
					while($ob=mysql_fetch_array($rs)){
						if($ob['cr_id'] == $_GET["cr_id"])
						{
				?>
            <option value="<?php echo $ob["cr_id"]; ?>" selected>- <?php echo $ob["name"];?> (<?=$ob[location];?> รองรับ <?php echo $ob["net"]; ?> ท่าน)</option>
            <?php
						}
						else
						{
						?>
                        <option value="<?php echo $ob["cr_id"]; ?>">- <?php echo $ob["name"]; ?> (<?=$ob[location];?> รองรับ <?php echo $ob["net"]; ?> ท่าน)</option>
                        <?
						}
					}
				?>
          </select>
    </td>
  </tr>
  <tr>
    <td class="td3">&nbsp;</td>
    <td class="td3"><input type="button" value="ค้นหา" class="formbutton" onclick="report()" /></td>
  </tr>
      </table>
      </fieldset>
</form>
