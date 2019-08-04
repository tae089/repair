<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST']."/repair/card.php?key="; 
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
if(addslashes($_POST['card_done_aprox']) != NULL){
    $card_done_aprox = addslashes($_POST['card_done_aprox']);
}else{
    $card_done_aprox = '0000-00-00';
}
//echo  $_SESSION['ukey']; die();
// if(isset($_POST['card_done_aprox'])){
//     echo 'true';
	$getdata->my_sql_update("card_info","card_done_aprox='".$card_done_aprox."',card_status='".addslashes($_POST['card_status'])."'","card_key='".addslashes($_POST['card_key'])."'");
	$cstatus_key=md5(addslashes($_POST['card_status']).time("now"));
    $getdata->my_sql_insert("card_status","cstatus_key='".$cstatus_key."',card_key='".addslashes($_POST['card_key'])."',card_status='".addslashes($_POST['card_status'])."',card_status_note='".addslashes($_POST['card_status_note'])."',user_key='".$_SESSION['ukey']."'");

    //แจ้งเตือนข้อความเข้า LINE
    $card = $getdata->my_sql_select(NULL,"card_info","card_key='".addslashes($_POST['card_key'])."'");
    
     while($showcard = mysql_fetch_object($card)){
         $workgroup = $getdata->my_sql_query("name","department","department_id='".$_SESSION['uwork_id']."'"); 
         $satuts_name = $getdata->my_sql_query("ctype_name","card_type","ctype_key='".$showcard->card_status."'");
         $satuts_type = ($showcard->card_type==1)? 'ที่ขอซื้อ': 'ที่ขอซ่อม';
         $code = $showcard->card_code;
     }
     $mgs = $workgroup->name." แจ้งรายการ".$satuts_type." รหัส ".$code." สถานะ ".$satuts_name->ctype_name." คลิกดูรายละเอียด::".$link.$code;
   
    if ($getdata) {
        $data = array(
            'satuts' => true,
            'message' => '<h4 class="text-success"><img src="./../img/loading.gif" width="30px;" height="30px;"> <b>กำลังบันทึกกรุณารอสักครู่...</b></h4>'
         );
    } else {
        $data= array(
            'satuts' => false,
            'message' => '<img src="./../img/loading.gif" width="30px;" height="30px;"> <span>ข้อมูลไม่ถูกต้อง กรุณาระบุอีกครั้ง !</span>'
         );
    }
    
// }else{
//     $data = array(
//         'satuts' => false,
//         'message' => '<img src="./../img/loading.gif" width="30px;" height="30px;"> <span>ข้อมูลไม่ถูกต้อง กรุณาระบุอีกครั้ง !</span>'
//      );
// }

 echo json_encode($data ,true);
 echo notifyLineMessage($mgs);
?>