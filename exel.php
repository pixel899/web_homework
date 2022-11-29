<?php
require 'vendor/autoload.php';
require 'connect.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);

$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();

$activeSheet->setCellValue('A1', 'Name');
$activeSheet->setCellValue('B1', 'Surname');
$activeSheet->setCellValue('C1', 'Position');

$query = $con->query("SELECT * FROM doctor");

if($query->num_rows > 0) {
    $i = 2;
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $activeSheet->setCellValue('A'.$i, $row['name']);
        $activeSheet->setCellValue('B'.$i, $row['surname']);
        $activeSheet->setCellValue('C'.$i, $row['position']);
        $i++;
    }
}

$filename = 'doctor.xlsx';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
$Excel_writer->save('php://output');
