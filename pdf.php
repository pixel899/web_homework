<?php
require 'vendor/autoload.php';
require 'connect.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

$spreadsheet = new Spreadsheet();
$PDF_writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf($spreadsheet);

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

$filename = 'doctor.pdf';
header('Content-Type: application/pdf');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
$PDF_writer->save('php://output');
