<?php
function statorg(){
	 $strQuery = "SELECT organization.Fname, COUNT( meetingroom_userq.uq_id ) AS a
	FROM meetingroom_userq
	INNER JOIN jos_users ON ( meetingroom_userq.u_id = jos_users.id ) 
	INNER JOIN organization ON ( organization.DeID = jos_users.DeID ) 
	GROUP BY organization.Fname
	ORDER BY a DESC";
    #$result = mysql_query($strQuery) or die(mysql_error());
	#return $result;
}
?>