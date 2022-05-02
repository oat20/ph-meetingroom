        	<h1>รายการใช้ห้องวันนี้</h1>
<table width="100%" class="table1">
                	<tr>
                    	<td class="td1">ห้อง</td>
                      <td class="td1">อาคาร</td>
                      <td class="td1">ชื่องาน</td>
                      <th class="td1">เวลา</th>
                        <th class="td1">สถานะ</th>
                    </tr>
            <?php
				$sql="select meetingroom_croom.name,meetingroom_croom.location,meetingroom_userq.title,room_time.start,room_time.end,book_status.sta 
				from meetingroom_userq, meetingroom_croom, book_status, room_time
				where meetingroom_userq.cr_id=meetingroom_croom.cr_id
				and meetingroom_userq.status1=book_status.sta_id
				and meetingroom_userq.time_in=room_time.tim_id
				and meetingroom_userq.Dater='$today'
				and meetingroom_userq.status1 <> '3'
				order by room_time.tim_id asc";
				$rs=mysql_query($sql);
				$num_row=mysql_num_rows($rs);
				if($num_row != 0){
					while($ob=mysql_fetch_array($rs)){
					#$title=$ob[title];
					#$title2=substr($title,"0","30");
				?>
                		<tr>
            				<td class="td3"><?=$ob["name"];?></td>
                			<td class="td3"><?=$ob["location"];?></td>
                			<td class="td3"><?=$ob["title"];?></td>
                			<td class="td3"><center><?=$ob["start"]." - ".$ob["end"];?></center></td>
                			<td class="td3"><center><strong><?=$ob["sta"];?></strong></center></td>
                		</tr>
         <?php } ?>
            <?php
				}else{
					print "<center>".$msg[1]."</center>";
				}
			?>
            </table>
