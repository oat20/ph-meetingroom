        <?php
		$tim_id = $_REQUEST["tim_id"];
		
        if($tim_id == ""){
        ?>
        <form id="form1" name="form1" method="post" action="../../bookingroom/room/bookingroom/room/admin3-2.php" enctype="multipart/form-data">
		<fieldset>
		<legend>เพิ่ม / แก้ไข ช่วงเวลา</legend>
        <table>
        	<tr>
            	<td align="right">ช่วงเวลา:</td><td><input name="text1" type="text" id="text1" size="40" maxlength="50"></td>
            </tr>
            <tr>
            	<td align="right">เวลา:</td><td><select NAME="time_in" id="starthour">
            <option value="">- เวลา - </option>
            <?php
														for($i=0; $i<count($hm_array); $i++) 
														{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											echo"<option value=$hm_array[$i]>$hm_array[$i]</option>";
														}
											?>
          </select> ถึง <select NAME="time_in" id="starthour">
            <option value="">- เวลา - </option>
            <?php
														for($i=0; $i<count($hm_array); $i++) 
														{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											echo"<option value=$hm_array[$i]>$hm_array[$i]</option>";
														}
											?>
          </select></td>
            </tr>
            <tr>
            	<td></td><td> <input type="hidden" name="action" value="add" />
 <input type="submit" name="Submit" value="เพิ่มรายการ" class="buttonsubmit"></td>
            </tr>
        </table>
       </fieldset>
         </form>
        <?php
        }else{
        $sql="select * from room_time
		where tim_id = '$tim_id'";
		$rs=mysql_query($sql);
		$ob=mysql_fetch_array($rs);
        ?>
        <form id="form1" name="form1" method="post" action="../../bookingroom/room/bookingroom/room/admin3-2.php" enctype="multipart/form-data">
		<fieldset>
		<legend>เพิ่ม / แก้ไข ช่วงเวลา</legend>
        <table>
        	<tr>
            	<td align="right">ช่วงเวลา:</td><td><input name="text1" type="text" id="text1" size="40" maxlength="50" value="<?php print $ob["name"]; ?>"></td>
            </tr>
            <tr>
            	<td align="right">เวลา:</td><td><select NAME="time_in" id="starthour">
                <option value="<?php print $ob["start"]; ?>"><?php print $ob["start"]; ?></option>
            <option value="">- เวลา - </option>
            <?php
														for($i=0; $i<count($hm_array); $i++) 
														{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											echo"<option value=$hm_array[$i]>$hm_array[$i]</option>";
														}
											?>
          </select> 
          ถึง 
          <select NAME="time_in" id="starthour">
          	<option value="<?php print $ob["end"]; ?>"><?php print $ob["end"]; ?></option>
            <option value="">- เวลา - </option>
            <?php
														for($i=0; $i<count($hm_array); $i++) 
														{
																//$j=$i+1;
																#$i = sprintf("%02d",$i);
                      											echo"<option value=$hm_array[$i]>$hm_array[$i]</option>";
														}
											?>
          </select></td>
            </tr>
            <tr>
            	<td></td><td> <input type="hidden" name="action" value="edit" />
 <input type="submit" name="Submit" value="แก้ไขรายการ" class="buttonsubmit"></td>
            </tr>
        </table>
       </fieldset>
         </form>
        <?php
        }
        ?>
