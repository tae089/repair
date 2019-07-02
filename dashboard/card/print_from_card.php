<?php
$key_card = $_GET['key'];
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
date_default_timezone_set('Asia/Bangkok');
$card_detail = $getdata->my_sql_query(NULL,"card_info","card_key='".addslashes($_GET['key'])."'");
$department = $getdata->my_sql_query(NULL,"department","department_id='".$card_detail->card_customer_work_group."'");
// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('แบบฟอร์มการขออนุมัติ ซื้อ ซ่อม');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('angsanaupc', '', 14);

// add a page
$pdf->AddPage();
// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'repair.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$pdf->SetFont('angsanaupc', '', 14);
// set some text to print
$YYY= date('Y')+543;
$pdf->Text(173, 5, $YYY);

$pdf->SetFont('angsanaupc', '', 12);
$pdf->Text(43, 18, $department->name);

$pdf->Text(43, 31, 'พัสดุครุภัณฑ์คอมพิวเตอร์');
$img_files = K_PATH_IMAGES.'Checkmark.png';
if($card_detail->card_type==0){
    $pdf->Image($img_files, 95.5, 45.5, 5, 5, '', '', '', false, 300, '', false, false, 0);
}else{
    $pdf->Image($img_files, 80, 45.5, 5, 5, '', '', '', false, 300, '', false, false, 0);
}

$pdf->Text(48, 52, $department->name);

$getitem = $getdata->my_sql_select(NULL,"card_item","card_key='".$key_card."'");

$tbl = '<table style="width: 638px;" cellspacing="0">';
$i=1;
while($showitem = mysql_fetch_object($getitem)){
    
    if($item->item_price_aprox==0){ $price='ไม่ระบุ'; }else{ $price=$item->item_price_aprox;}
 
    $tbl .= '<tr>
        <td style="border: 1px solid #000000; width: 27px; height: 20px;"> '.$i.'</td>
        <td style="border: 1px solid #000000; width: 310px; height: 20px;"> '.$showitem->item_name.'</td>
        <td style="border: 1px solid #000000; width: 153px; height: 20px;"> '.$department->name.'</td>
        <td style="border: 1px solid #000000; width: 112px; height: 20px;"> 1 /'.$price.'</td>
    </tr>';
    $i++;

}
$tbl .= '</table>';
$pdf->writeHTMLCell($w, $h, 18.7, 65.7, $tbl, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = '', $autopadding = true );


$h_note ='<table style="width: 200px;" cellspacing=""><tr><td style="border: 1px solid #000000;">'.$card_detail->card_note.'</td></tr>';
$pdf->writeHTMLCell(30, 25, 30, 100, $card_detail->card_note, $border = 1, $ln = 0, $fill = false, $reseth = true, $align = '', $autopadding = true );


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('repair_from.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+