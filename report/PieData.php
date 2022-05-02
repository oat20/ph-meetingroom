<?php
    //This page generates the XML data for the Pie Chart contained in
    //Default.php. 	
	
    //For the sake of ease, we've used an MySQL databases containing two
    //tables.. 
		
    //Connect to the DB
	#$conn=connect_db();
    //$strXML will be used to store the entire XML document generated
    //Generate the graph element
	$yy=$year_present+543;
    $strXML = "<graph caption='ประจำปี ".$yy."' subCaption='' decimalPrecision='0' showNames='1' numberSuffix=' ' decimalPrecision='0' pieSliceDepth='30' baseFont='verdana' baseFontSize='13' animation='0' showValues='0' canvasBorderThickness='1' xAxisName='เดือน' lineThickness='5' lineColor='59993f' yAxisName='จำนวนการใช้ห้อง'>";
	
	for($i=1;$i<=12;$i++){
		$j = sprintf("%02d",$i);
		$key=$year_present."-".$j;
    // Fetch all factory records
    $strQuery = "SELECT COUNT( uq_id ) AS a1
FROM meetingroom_userq
WHERE status1=1
AND MID( Dater, 1, 7 )='$key'";
    $result = mysql_query($strQuery) or die(mysql_error());
    
    //Iterate through each factory
        $ors = mysql_fetch_array($result);
            //Now create a second query to get details for this factory
            //Generate <set name='..' value='..'/>
			#if($ors[a1]!=0){
            	$strXML .= "<set name='" . nameMonth($j) . "' value='" . $ors['a1'] . "'/>";
			#}else{
				 #$strXML .= "<set name='" . nameMonth($j) . "' value='0'/>";
			#}
            //free the resultset
            #mysql_free_result($result);
	}
    #mysql_close($conn);

    //Finally, close <graph> element
    $strXML .= "</graph>";
		
    //Set Proper output content-type
    #header('Content-type: text/xml');
	
    //Just write out the XML data
    //NOTE THAT THIS PAGE DOESN'T CONTAIN ANY HTML TAG, WHATSOEVER
    echo $strXML;
	echo renderChart("report/Line.swf", "", $strXML, "FactorySum2",700, 350);
?>
