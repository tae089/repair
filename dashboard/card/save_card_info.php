<?php 
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();

if(isset($_POST)){
	if(addslashes($_POST['card_customer_name'])!= NULL && addslashes($_POST['card_customer_phone']) != NULL ){
		$card_key=md5(addslashes($_POST['card_customer_name']).addslashes($_POST['card_code']).time("now"));
		$getdata->my_sql_insert("card_info","card_key='".$card_key."',card_code='".addslashes($_POST['card_code'])."',card_customer_name='".addslashes($_POST['card_customer_name'])."',card_customer_lastname='".addslashes($_POST['card_customer_lastname'])."',card_customer_address='".addslashes($_POST['card_customer_address'])."',card_customer_phone='".addslashes($_POST['card_customer_phone'])."',card_customer_work_group=".$_POST['card_customer_work_group'].",card_note='".addslashes($_POST['card_note'])."',card_done_aprox='0000-00-00',user_key='".$_POST['user_key']."',card_status='',card_type='".$_POST['card_type']."' ");
        
        if ($getdata) {
            $data = array(
                'satuts' => true,
                'card_key' => $card_key,
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
}

echo json_encode($data ,true);
?>