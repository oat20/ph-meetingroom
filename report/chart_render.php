<?php
//We've included ../Includes/FusionCharts.php, which contains functions
//to help us easily embed the charts.
include("FusionCharts.php");
?>
<HTML>
<HEAD>
	<TITLE>
	FusionCharts Free - dataURL and Database  Example
	</TITLE>
	<?php
	//You need to include the following JS file, if you intend to embed the chart using JavaScript.
	//Embedding using JavaScripts avoids the "Click to Activate..." issue in Internet Explorer
	//When you make your own charts, make sure that the path to this JS file is correct. Else, you would get JavaScript errors.
	?>	
	<SCRIPT LANGUAGE="Javascript" SRC="FusionCharts.js"></SCRIPT>
	<style type="text/css">
	<!--
	body {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
	.text{
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
	-->
	</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></HEAD>


<?php
	//In this example, we show how to connect FusionCharts to a database 
	//using dataURL method. In our other examples, we've used dataXML method
	//where the XML is generated in the same page as chart. Here, the XML data
	//for the chart would be generated in PieData.php.

	//For the sake of ease, we've used an MySQL databases containing two
	//tables.
	
	//Set DataURL 
	//the php script in piedata.asp interacts with the database, 
	//converts the data into proper XML form and finally 
	//relays XML data document to the chart
	$strDataURL = "PieData.php";
	
	//Create the chart - Pie 3D Chart with dataURL as strDataURL
	echo renderChart("FCF_Line.swf", $strDataURL, "", "FactorySum", 800, 400);
	#echo renderChart("../../../charts/FCF_Pie2D.swf", $strDataURL, "", "FactorySum", 650, 450);
?>
