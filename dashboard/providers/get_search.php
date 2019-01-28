<?php
session_start();
$id = $_REQUEST['id'];
require("../../core/config.core.php");
require("../../core/connect.core.php");

$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
date_default_timezone_set('Asia/Bangkok');

$get_group = $getdata->my_sql_select(NULL,"opduser",$event=NULL);
if($get_group){
    while ($get_resutl = mysql_fetch_object($get_group)) {
        $new_name = explode(' ', $get_resutl->name);
        $data[] = array(
            'loginname' => $get_resutl->loginname,
            'fname' => $new_name[0],
            'lname' => $new_name[1],
            'password' => $get_resutl->passweb
      );
  }

}else{
     $data = NULL;
}
var_dump($data);
echo json_encode($data, true);
?>