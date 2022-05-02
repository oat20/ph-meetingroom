<?php
//This page contains an array of colors to be used as default set of colors for FusionCharts
//arr_FCColors is the array that would contain the hex code of colors 
//ALL COLORS HEX CODES TO BE USED WITHOUT #


//We also initiate a counter variable to help us cyclically rotate through
//the array of colors.
$FC_ColorCounter=0;

$arr_FCColors[1] = "1941A5" ;//Dark Blue
$arr_FCColors[2] = "59993F" ;
$arr_FCColors[3] = "AFD8F8";
$arr_FCColors[4] = "F6BD0F";
$arr_FCColors[5] = "8BBA00";
$arr_FCColors[6] = "A66EDD";
$arr_FCColors[7] = "F984A1" ;
$arr_FCColors[8] = "CCCC00" ;//Chrome Yellow+Green
$arr_FCColors[9] = "999999" ;//Grey
$arr_FCColors[10] = "0099CC" ;//Blue Shade
$arr_FCColors[11] = "FF0000" ;//Bright Red 
$arr_FCColors[12] = "006F00" ;//Dark Green
$arr_FCColors[13] = "0099FF"; //Blue (Light)
$arr_FCColors[14] = "FF66CC" ;//Dark Pink
$arr_FCColors[15] = "669966" ;//Dirty green
$arr_FCColors[16] = "7C7CB4" ;//Violet shade of blue
$arr_FCColors[17] = "FF9933" ;//Orange
$arr_FCColors[18] = "9900FF" ;//Violet
$arr_FCColors[19] = "99FFCC" ;//Blue+Green Light
$arr_FCColors[20] = "CCCCFF" ;//Light violet
$arr_FCColors[21] = "669900" ;//Shade of green
$arr_FCColors[22] = "red" ;
$arr_FCColors[23] = "blue" ;
$arr_FCColors[24] = "green" ;
$arr_FCColors[25] = "yellow" ;
$arr_FCColors[26] = "orange" ;
$arr_FCColors[27] = "pink" ;
$arr_FCColors[28] = "purple" ;

//getFCColor method helps return a color from arr_FCColors array. It uses
//cyclic iteration to return a color from a given index. The index value is
//maintained in FC_ColorCounter

function getFCColor() 
{
	//accessing the global variables
	global $FC_ColorCounter;
	global $arr_FCColors;
	
	//Update index
	$FC_ColorCounter++;
	//Return color
	return($arr_FCColors[$FC_ColorCounter % count($arr_FCColors)]);
}
?>