<?php
include"../bookingroom/config.php";
include"../bookingroom/connect/connect.php";
include"../bookingroom/inc/function.php";
include("FusionCharts.php");
include("FC_Colors.php");
?>
<script type="text/javascript" src="FusionCharts.js"></script>
<?php
	#$strDataURL = "report/PieData.php";
	$strXML = "<graph caption='' subCaption='' decimalPrecision='0' showNames='1' numberSuffix=' ' decimalPrecision='0' pieSliceDepth='30' baseFont='arial,tahoma' baseFontSize='12' animation='1' canvasBorderThickness='1' yaxisname='จำนวน (รายการ)' showValues='0'>";
	
    // Fetch all factory records
    /*$strQuery = "select meetingroom_croom.name, count(meetingroom_userq.uq_id) as a
	from meetingroom_croom inner join meetingroom_userq on (meetingroom_croom.cr_id=meetingroom_userq.cr_id)
	group by meetingroom_croom.name
	order by a desc";*/
	for($i=1;$i<=12;$i++)
	{
		$month="2011-".sprintf("%02d",$i);

		$strQuery = "select count(uq_id) as b 
		from meetingroom_userq 
		where mid(Dater,1,7)='$month'";
    	$result = mysql_query($strQuery) or die(mysql_error());
    
    //Iterate through each factory
        while($ors = mysql_fetch_array($result)) 
		{
            //Now create a second query to get details for this factory
            //Generate <set name='..' value='..'/>
			#$name=iconv("UTF-8","TIS-620",$ors['name']);
			if($ors['b'] != "")
			{     
            	$strXML .= "<set name='" . dateformat1($month) . "' value='" . $ors['b'] . "'/>";
			}
			else
			{
				$strXML .= "<set name='" . dateformat1($momth) . "' value='0'/>";
			}
            //free the resultset
            #mysql_free_result($result);
        }
    #mysql_close($conn);
	}
    //Finally, close <graph> element
    $strXML .= "</graph>";
		
    //Set Proper output content-type
    #header('Content-type: text/xml');
	
    //Just write out the XML data
    //NOTE THAT THIS PAGE DOESN'T CONTAIN ANY HTML TAG, WHATSOEVER
    #echo $strXML;
	
	#echo renderChart("report/FCF_Doughnut2D.swf", $strDataURL, "", "FactorySum", 650, 500);
	echo renderChart("FCF_Line.swf", "", $strXML, "FactorySum", 800, 400);
	
	/*$sql="SELECT max( created ) AS max_a, min( created ) AS min_b
	FROM meetingroom_userq";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
	print "<strong>ข้อมูลการจอง ณ วันที่ ".dateThai($ob[max_a])." ถึง ".dateThai($ob[min_b])."</strong>";*/
?>