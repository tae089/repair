<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
if(addslashes($_POST['card_done_aprox']) != NULL){
    $card_done_aprox = addslashes($_POST['card_done_aprox']);
}else{
    $card_done_aprox = '0000-00-00';
}
//echo 'DATA:'.$userdata->user_key; die();
if(isset($_POST['card_done_aprox'])){
	$getdata->my_sql_update("card_info","card_done_aprox='".$card_done_aprox."',card_status='".addslashes($_POST['card_status'])."'","card_key='".addslashes($_POST['card_key'])."'");
	$cstatus_key=md5(addslashes($_POST['card_status']).time("now"));
    $getdata->my_sql_insert("card_status","cstatus_key='".$cstatus_key."',card_key='".addslashes($_POST['card_key'])."',card_status='".addslashes($_POST['card_status'])."',card_status_note='".addslashes($_POST['card_status_note'])."',user_key='".$userdata->user_key."'");
    if ($getdata) {
        $data = array(
            'satuts' => true,
            'message' => '<h4 class="text-success"><img src="./../img/loading.gif" width="30px;" height="30px;"> <b>กำลังบันทึกกรุณารอสักครู่...</b></h4>'
         );
    }else {
        $data= array(
            'satuts' => false,
            'message' => '<img src="./../img/loading.gif" width="30px;" height="30px;"> <span>ข้อมูลไม่ถูกต้อง กรุณาระบุอีกครั้ง !</span>'
         );
    }
    
}else{
    $data = array(
        'satuts' => false,
        'message' => '<img src="./../img/loading.gif" width="30px;" height="30px;"> <span>ข้อมูลไม่ถูกต้อง กรุณาระบุอีกครั้ง !</span>'
     );
}

echo json_encode($data ,true);
?>