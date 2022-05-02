<?php
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");

require_once 'phpword/PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

// New portrait section
$section = $PHPWord->createSection(array('size'=>'A3', 'marginLeft'=>600, 'marginRight'=>600, 'marginTop'=>600, 'marginBottom'=>600));

//$section->addImage('_mars.jpg');
//$section->addTextBreak(2);
$PHPWord->addFontStyle('rStyle', array('bold'=>true, 'size'=>16, 'name'=>'TH Sarabun New'));
$PHPWord->addParagraphStyle('pStyle', array('align'=>'right', 'spaceAfter'=>100));
$section->addText('PH-Weekly Calendar', 'rStyle', 'pStyle');

$PHPWord->addFontStyle('r2Style', array('bold'=>true, 'size'=>14, 'name'=>'TH Sarabun New'));
$PHPWord->addParagraphStyle('p2Style', array('align'=>'right', 'spaceAfter'=>100));
$section->addText('http://www.ph.mahidol.ac.th', 'r2Style', 'p2Style');
//end head

// Define table style arrays
$styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);
$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');

// Define cell style arrays
$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Define font style for first row
$fontStyle = array('bold'=>true, 'align'=>'center');

// Add table style
$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

// Add table
$table = $section->addTable('myOwnTableStyle');

// Add row
//$table->addRow(900);
$table->addRow();

// Add cells
$table->addCell(4000, $styleCell)->addText('วันที่', $fontStyle);
$table->addCell(4000, $styleCell)->addText('กิจกรรม', $fontStyle);
$table->addCell(4000, $styleCell)->addText('สถานที่', $fontStyle);
//$table->addCell(2000, $styleCell)->addText('Row 4', $fontStyle);
//$table->addCell(500, $styleCellBTLR)->addText('Row 5', $fontStyle);

// Add more rows / cells ข้อมูล
//for($i = 1; $i <= 10; $i++) {
$tm = $_POST['tm'];
for($i=0;$i<=4;$i++){
	$tm2=date('Y-m-d',strtotime($tm.' +'.$i.' days'));
	$table->addRow();
	$table->addCell(4000)->addText(dateThai4($tm2));
	$table->addCell(4000)->addText("");
	$table->addCell(4000)->addText("");
	//$table->addCell(2000)->addText("Cell $i");
	
	//$text = ($i % 2 == 0) ? 'X' : '';
	//$table->addCell(500)->addText($text);
	$sql2="select *, meetingroom_croom.name as r_name
		from meetingroom_userq,
		meetingroom_croom,
		organization
		where meetingroom_userq.Dater='$tm2' 
		and meetingroom_userq.cr_id = meetingroom_croom.cr_id
		and meetingroom_userq.DeID = organization.DeID
		and meetingroom_userq.uq_cancel='No'
		order by meetingroom_userq.Dater asc, 
		meetingroom_userq.time_in asc";
		$rs2 = mysql_query($sql2);
		while($ob2 = mysql_fetch_assoc($rs2)){						
				$table->addRow();
				$table->addCell(4000)->addText($ob2["time_in"].' - '.$ob2["time_out"]);
				$table->addCell(4000)->addText($ob2["title"].' จัดโดย '.$ob2['uname'].' ('.$ob2["Fname"].' โทร.'.$ob2["phone"].')');
				$table->addCell(4000)->addText($ob2[r_name].' ('.$ob2['location'].')');
			}
}

// Save File
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('PH-Weekly.docx');

print '<meta http-equiv="refresh" content="0;URL=PH-Weekly.docx">';
?>