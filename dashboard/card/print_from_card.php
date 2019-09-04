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
$opduser = $getdata->my_sql_query(NULL,"opduser","loginname='".$card_detail->user_hosxp."'");
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

$pdf->SetFont('angsanaupc', 'B', 14);
// set some text to print
$YYY= date('Y')+543;
$pdf->Text(128, 5.8, 'งบปี '.$YYY);

$pdf->SetFont('angsanaupc', '', 12);
$pdf->Text(20, 24, $department->name);

$dates = explode(' ',$card_detail->card_insert);
$pdf->Text(140, 24, $dates[0]);
$pdf->Text(178, 24, $dates[1]);

$pdf->Text(31, 33, 'พัสดุครุภัณฑ์คอมพิวเตอร์');
$img_files = K_PATH_IMAGES.'Checkmark.png';
if($card_detail->card_type == 0){
    $pdf->Image($img_files, 126, 50.5, 5, 5, '', '', '', false, 300, '', false, false, 0);
}else{
    $pdf->Image($img_files, 115, 50.5, 5, 5, '', '', '', false, 300, '', false, false, 0);
}

$pdf->Text(25, 50.5, $department->name);

$getitem = $getdata->my_sql_select(NULL,"card_item","card_key='".$key_card."'");

$tbl = '<table style="width: 680px;" cellspacing="0">';
$i=1;
while($showitem = mysql_fetch_object($getitem)){
    
    if($showitem->item_price_aprox==0){ 
        $price='ไม่ระบุ'; 
    }else{ 
        $price=$showitem->item_price_aprox.' บาท';
    }
 
    $tbl .= '<tr>
        <td style="border: 1px solid #000000; width: 34.5px; height: 20px;"> '.$i.'</td>
        <td style="border: 1px solid #000000; width: 530px; height: 20px;"> '.$showitem->item_package_code.'&nbsp; &nbsp;'.$showitem->item_sn_code.'&nbsp;&nbsp;'.$showitem->item_name.'</td>
        <td style="border: 1px solid #000000; width: 52.5px; height: 20px;"> '.$showitem->item_amount.'</td>
        <td style="border: 1px solid #000000; width: 69px; height: 20px;">  '.$price.'</td>
    </tr>';
    $i++;

}
$tbl .= '</table>';
$pdf->writeHTMLCell($w, $h, 7.5, 65.7, $tbl, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = '', $autopadding = true );


$h_note ='<table style="width: 200px;" cellspacing=""><tr><td style="border: 1px solid #000000;">'.$card_detail->card_note.'</td></tr>';
$pdf->writeHTMLCell(95, 25, 9, 122, $card_detail->card_note, $border = 0, $ln = 0, $fill = false, $reseth = true, $align = '', $autopadding = true );

$pdf->SetFont('angsanaupc', '', 12);
$pdf->Text(125, 114, $card_detail->card_customer_name.'  '.$card_detail->card_customer_lastname);

$pdf->SetFont('angsanaupc', '', 12);
$pdf->Text(125, 123, $card_detail->card_customer_name.'  '.$card_detail->card_customer_lastname);

$pdf->SetFont('angsanaupc', '', 12);
$pdf->Text(126, 132, $opduser->entryposition);

//$pdf->Image($img_files, 20, 134, 5, 5, '', '', '', false, 300, '', false, false, 0);

$pdf->SetFont('angsanaupc', '', 12);
$pdf->Text(50, 203, 'ธนพันธ์  มั่งมูล');
$pdf->Text(52, 211, 'นายธนพันธ์  มั่งมูล');
$pdf->Text(52.3, 220, date('d        m            Y'));
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('repair_from.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+