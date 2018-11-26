<?php
session_start();
$id = $_REQUEST['id'];
require("../../core/config.core.php");
require("../../core/connect.core.php");

$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
date_default_timezone_set('Asia/Bangkok');

$event = "work_group_id = '".$id."' ";
$get_group = $getdata->my_sql_select(NULL,"department",$event);
if($get_group){
    while ($get_resutl = mysql_fetch_object($get_group)) {
        $data[] = array(
            'department_id' => $get_resutl->department_id,
            'name' => $get_resutl->name
      );
  }

}else{
     $data = NULL;
}

echo json_encode($data, true);
?>