<?php
include("Classes/PHPExcel.php");
$exce=new PHPExcel();
$exce->setActiveSheetIndex(0)->setCellValue("A1","id")->setCellValue("B1","conte")->setCellValue("C1","num")->setCellValue("D1","dat")->setCellValue("F1","title")->setCellValue("G1","author");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=testz","root","root");
$data=$pdo->query("select*from book")->fetchAll();
foreach($data as $k=>$v){
    $exce->setActiveSheetIndex(0)->setCellValue("A".($k+2),$v['id'])
        ->setCellValue("B".($k+2),$v['conte'])
        ->setCellValue("C".($k+2),$v['num'])
        ->setCellValue("D".($k+2),$v['dat'])
        ->setCellValue("E".($k+2),$v['title'])
        ->setCellValue("F".($k+2),$v['author']);
}

header('Content-Disposition: attachment;filename="01simple.xls"');
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($exce, 'Excel5');
$objWriter->save('php://output');
exit;

?>