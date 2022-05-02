<?php
include"../bookingroom/config.php";
include"../bookingroom/connect/connect.php";
include"../bookingroom/inc/function.php";
include("FC_Colors.php");

$strXML="<?xml version='1.0' encoding='utf-8' ?>";
$strXML.= "<graph caption='' subCaption='' decimalPrecision='0' showNames='1' numberSuffix='' baseFont='arial,tahoma' baseFontSize='12' canvasBorderThickness='1' yaxisname='' rotateNames='1' chartLeftMargin='0' chartRightMargin='5' chartTopMargin='5' chartBottomMargin='0' xAxisName='' showvalues='0'>";
	
	$strCategories="<categories>";
	
	$sql="select id, name 
	from room_type
	order by id asc";
	$rs=mysql_query($sql);
	while($ob=mysql_fetch_array($rs))
	{
		$id=$ob['id'];
		$name=$ob['name'];
   		#$strDataCurr="<dataset seriesName='".iconv("utf-8","tis-620",$name)."' color='".getFCColor()."'>";
		$strDataCurr="<dataset seriesName='".$name."' color='".getFCColor()."'>";
		 #$strDataCurr.= "</dataset>";
   #}
   #}
   #$strDataPrev = "<dataset seriesName='Previous Year' color='F6BD0F' >";
   		$sql3="select mid(Dater,1,7) as month
		from meetingroom_userq
		group by month
		order by month asc";
		$rs3=mysql_query($sql3);
		while($ob3=mysql_fetch_array($rs3)){
		 	$strCategories.= "<category name='".$ob3['month']."'/>";
   //Iterate through the data
  			$sql2="select count(meetingroom_userq.uq_id) as sum1
			from meetingroom_userq
			inner join meetingroom_croom on (meetingroom_userq.cr_id=meetingroom_croom.cr_id)
			inner join room_type on (meetingroom_croom.parent=room_type.id)
			where room_type.id='$id'
			and mid(meetingroom_userq.Dater,1,7)='$ob3[month]'";
			$rs2=mysql_query($sql2);
			while($ob2=mysql_fetch_array($rs2))
			{
				$m=$ob2['m'];
				$sum1=$ob2['sum1'];	
      //Append <category name='...' /> to strCategories
     
      //Add <set value='...' /> to both the datasets
	  			if($sum1 != "")
	  			{
      				$strDataCurr.="<set value='".$sum1."' link='http://bing.com/'/>";
				}
				else
				{
					$strDataCurr.="<set value='0' link='http://bing.com/'/>";
				}
      #$strDataPrev .= "<set value='" . $arSubData[3] . "' />";
   //Close <categories> element
   #$strDataCurr.= "</dataset>";
   			}
   		}
   #$strCategories .= "</categories>";
		
   //Close <dataset> elements
  $strDataCurr.="</dataset>";
    $dataset.=$strDataCurr;
  }
  
   #$strDataPrev .= "</dataset>";
   $strCategories.="</categories>";
   //Assemble the entire XML now
   #$strXML .= $strCategories . $strDataCurr . $strDataPrev . "</graph>";
    $strXML.=$strCategories.$dataset."</graph>";
	 header('Content-type: text/xml');
	echo $strXML;
	
	#echo renderChart("report/FCF_Doughnut2D.swf", $strDataURL, "", "FactorySum", 650, 500);
	#echo renderChart("FCF_MSLine.swf","",$strXML,"FactorySum", 800, 500);
	
	/*$sql="SELECT max( created ) AS max_a, min( created ) AS min_b
	FROM meetingroom_userq";
	$rs=mysql_query($sql);
	$ob=mysql_fetch_array($rs);
	print "<strong>ข้อมูลการจอง ณ วันที่ ".dateThai($ob[max_a])." ถึง ".dateThai($ob[min_b])."</strong>";*/
?>