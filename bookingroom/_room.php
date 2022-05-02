<h1>ห้องที่ให้บริการ</h1>
<table width="100%" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
		<? 
$column =3;
$sql = "select * from meetingroom_croom    
			where trash = '0'  
			ORDER BY cr_id asc";
			$result = mysql_query($sql);
$ic=1;
			while($result1 = mysql_fetch_array($result)){
 		
					if ($ic  == 1){
					?>
<tr align=center>
                      <?php  
					}
					?>
	<td valign=top><a href="course.php?no=<?php print $result1[NO]; ?>&mode=detail"><img src="<?php print $img_path."room/".$result1["picData"]; ?>" border="0" class="img_size200" /></a>
    <p><?php print $result1["name"]; ?><br/>รองรับ: <?php print $result1["net"]; ?> ท่าน<br/><a href="formbooking.php?cr_id=<?php print $result1["cr_id"]; ?>&name=<?php print $result1["name"]; ?>">[จอง]</a></p></td>
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
    </table>
