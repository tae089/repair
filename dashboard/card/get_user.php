<?php 
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();

if(isset($_GET['search_user'])){
    $get_department=$getdata->my_sql_select(NULL,"opduser","name LIKE '%".$_GET['search_user']."%' ");
	while($show_department = mysql_fetch_object($get_department)){
		$data[] = array($show_department->name, $show_department->loginname);
    }
}else{
    $data = 'NULL';
}
    
echo json_encode($data ,true);
?>