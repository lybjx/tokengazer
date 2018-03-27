<?php
use sinacloud\sae\Storage as Storage;
$storage = new Storage();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/extension/PHPExcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$file_name='saestor://files/upload/info.xls';
$objPHPExcel=PHPExcel_IOFactory::load($file_name);
$objPHPExcel->setActiveSheetIndex(0);
$row=$objPHPExcel->getActiveSheet()->getHighestRow()+1;
$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row,1);
$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row,2);
$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row,3);
$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row,4);
$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row,5);
$objWriter=new PHPExcel_Writer_Excel5($objPHPExcel);
echo $objWriter->save('saestor://upload/info.xls');
exit;

?>