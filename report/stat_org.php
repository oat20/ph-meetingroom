<?php
	#$strDataURL = "report/PieData.php";
	$strXML_org = "<graph caption='จำแนกตามส่วนงาน' subCaption='ประจำปี ".$_GET[y]."' decimalPrecision='0' showNames='1' numberSuffix=' ' decimalPrecision='0' pieSliceDepth='30' yaxisname='จำนวนครั้ง' baseFontSize='12' animation='0'>";
	
    
    $sql="select * from organization
	order by DeID asc";
	$result_org=mysql_query($sql);
    //Iterate through each factory
        while($ors_org = mysql_fetch_array($result_org)) {
            //Now create a second query to get details for this factory
            //Generate <set name='..' value='..'/>
			#$Fname=iconv("utf-8","tis-620",$ors['Fname']);
			$sql2="SELECT COUNT( meetingroom_userq.uq_id ) AS a
	FROM meetingroom_userq,jos_users
	where meetingroom_userq.u_id=jos_users.id
	and mid(meetingroom_userq.Dater,1,4) = '$yy'
	and jos_users.DeID='$ors_org[DeID]'";
	$rs2=mysql_query($sql2);
	$ob2=mysql_fetch_array($rs2);     
            $strXML_org .= "<set name='" . $ors_org[Fname] . "' value='" . $ob2['a'] . "' color='".getFCColor()."' />";
            //free the resultset
            #mysql_free_result($result);
        }
    #mysql_close($conn);

    //Finally, close <graph> element
    $strXML_org .= "</graph>";
		
    //Set Proper output content-type
    #header('Content-type: text/xml');
	
    //Just write out the XML data
    //NOTE THAT THIS PAGE DOESN'T CONTAIN ANY HTML TAG, WHATSOEVER
    echo $strXML_org;
	
	#echo renderChart("report/FCF_Doughnut2D.swf", $strDataURL, "", "FactorySum", 650, 500);
	echo renderChart("report/FCF_Bar2D.swf", "", $strXML_org, "FactorySum2", 700, 700);
	
	#print "<strong>ข้อมูลการจอง ณ วันที่ ".dateThai($ob[max_a])." ถึง ".dateThai($ob[min_b])."</strong>";
?>