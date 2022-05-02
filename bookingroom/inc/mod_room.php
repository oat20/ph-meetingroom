<div class="menu">
        	<h1>ห้องประชุม</h1>
            <ul>
            	<?php
				$sql="select meetingroom_croom.name, count(meetingroom_userq.uq_id) as a, meetingroom_croom.color,meetingroom_croom.cr_id
				from meetingroom_croom
				left join meetingroom_userq on (meetingroom_croom.cr_id=meetingroom_userq.cr_id)
				where meetingroom_croom.enable = '1'
				group by meetingroom_croom.name,meetingroom_croom.color,meetingroom_croom.cr_id
				order by meetingroom_croom.location asc";
				$rs_room=mysql_query($sql);
				while($ob_room=mysql_fetch_array($rs_room)){
				?>
            	<li><input name="" type="text" size="1" readonly="true" style="background-color:<?php print $ob_room[color]; ?>; border:#ffffff"> <a href="viewbyroom.php?cr_id=<?=$ob_room["cr_id"];?>"><?php print $ob_room[name]; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="line"></div>
