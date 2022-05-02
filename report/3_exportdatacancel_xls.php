<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2011 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2011 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.6, 2011-02-27
 */

/** Error reporting */
include"../bookingroom/config.php";
include("../bookingroom/inc/function.php");
include("../bookingroom/connect/connect.php");

error_reporting(E_ALL);

/** PHPExcel */
require_once '../bookingroom/phpexcel/Classes/PHPExcel.php';


// Create new PHPExcel object
//echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

// Set properties
//echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
//echo date('H:i:s') . " Add some data\n";
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'เลขที่รายการ')
			->setCellValue('B1', 'ลงวันที่')
            ->setCellValue('C1', 'ห้อง')
            ->setCellValue('D1', 'วันที่จอง')
			->setCellValue('E1', 'วัตถุประสงค์')
			->setCellValue('F1', 'ผู้จอง')
            ->setCellValue('G1', 'เลขาฯ อนุมัติ')
			->setCellValue('H1', 'ยกเลิก');

// Write data from MySQL result
$strSQL = "select *, meetingroom_croom.name as r_name 
						from meetingroom_userq,
						meetingroom_croom,
						organization
						where meetingroom_userq.Dater between '$_GET[startDate]' and '$_GET[endDate]'
						and meetingroom_userq.cr_id = meetingroom_croom.cr_id
						and meetingroom_userq.DeID = organization.DeID
						and meetingroom_userq.uq_cancel='Yes'
						order by meetingroom_userq.Dater asc, 
						meetingroom_userq.time_in asc";
$objQuery = mysql_query($strSQL);
$i = 2;
while($ob2 = mysql_fetch_assoc($objQuery))
{
	$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $ob2["uq_id"]);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, dateformat2($ob2['created']));
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $ob2["r_name"]);
	$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, dateThai2($ob2['Dater']).' '.$ob2["time_in"].' - '.$ob2["time_out"]);
	$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $ob2["title"]);
	$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $ob2['uname'].' '.$ob2["Fname"].' โทร.'.$ob2["phone"]);
	$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $cf_msgicon2_noicon[$ob2['confirm']]['title']);
	$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $ob2['uq_cancel']);
	$i++;
}
mysql_close();

// Rename sheet
//echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('By Rooms');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="01_report.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>