<?require_once 'connect.php'; ?>
<?require_once 'PHPExcel/Classes/PHPExcel.php';?>
<?require_once 'PHPExcel/Classes/PHPExcel/Writer/Excel5.php';?>
<?require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php'?>
<?
ob_end_clean();
$title = 'Таблица';
$array = array("№ п/п", "Наименование банка", 
    "Страна", "Класс надежности", "Название программы",
    "% годовых","Сумма всех вкладов такого типа");$xls = new PHPExcel();
$xls->getProperties()->setTitle("Bank");
$xls->getProperties()->setSubject("lab5");
$xls->getProperties()->setCreator("Глушков Артем");
$xls->getProperties()->setCompany("USATU");
$xls->getProperties()->setCategory("ПИ-319");
$xls->getProperties()->setKeywords("Bank");
$xls->getProperties()->setCreated("1.04.2200");

$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Банк');
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageMargins()->setTop(1);
$sheet->getPageMargins()->setRight(0.75);
$sheet->getPageMargins()->setLeft(0.75);
$sheet->getPageMargins()->setBottom(1);

$sheet->setCellValueExplicit('A1', 'Таблица', PHPExcel_Cell_DataType::TYPE_STRING);
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
$sheet->mergeCells('A1:H1');
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


for($i = 0; $i < count($array); $i++){
    $sheet->setCellValueByColumnAndRow($i, 2, $array[$i]);
    $sheet->getStyleByColumnAndRow($i, 2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
}
$j=3;
$zapros = "SELECT * FROM f0470376_glushkov.vklad_info ORDER BY f0470376_glushkov.vklad_info.vklad_id";
$link = mysqli_connect($host, $user, $password) or die ("Невозможно подключиться к серверу"); 
$result = mysqli_query($link, $zapros); 
while ($row=mysqli_fetch_array($result)){
for($i = 0; $i < count($row)/2; $i++){
        $text = $row[$i];
        $sheet->setCellValueByColumnAndRow($i, $j, $text);
        $sheet->getStyleByColumnAndRow($i, $j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);        
    }
$j++;
}
ob_end_clean();
header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
ob_end_clean();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Bank.xls");

$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');

$objWriter->save('php://output');
ob_end_clean();
?>