<?php
	#$strDataURL = "report/PieData.php";
	$yy=$_GET[y]-543;
	$strXML_org = "<graph caption='จำแนกตามห้อง' subCaption='ประจำปี ".$_GET[y]."' decimalPrecision='0' showNames='1' numberSuffix=' ' decimalPrecision='0' pieSliceDepth='30' yaxisname='จำนวนครั้ง' baseFont='tahoma' baseFontSize='12' animation='0'>";
	
    $sql="select * from meetingroom_croom
	order by cr_id asc";
	$result_org=mysql_query($sql);
    //Iterate through each factory
        while($ors_org = mysql_fetch_array($result_org)) {
           
		   $sql2="select count(uq_id) as a1
		   from meetingroom_userq
		   where cr_id='$ors_org[cr_id]'
		   and mid(Dater,1,4) = '$yy'";
		   $rs2=mysql_query($sql2);
		   $ob2=mysql_fetch_array($rs2);
            $strXML_org .= "<set name='" . $ors_org[name] . "' value='" . $ob2['a1'] . "' color='".getFCColor()."'/>";
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
	echo renderChart("report/FCF_Bar2D.swf", "", $strXML_org, "FactorySum1", 700, 500);
	
	#print "<strong>ข้อมูลการจอง ณ วันที่ ".dateThai($ob[max_a])." ถึง ".dateThai($ob[min_b])."</strong>";
?>