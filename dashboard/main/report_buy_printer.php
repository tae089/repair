<?php
//Printer1  
$Printer10 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$lastYear."-10-01' AND '".$lastYear."-10-31' AND ci.item_category_type='3' AND cn.card_type='1'");

while($showdata10 = mysql_fetch_object($Printer10)){
  //var_dump($showdata);
  $printer_num10     = $showdata10->num;
}

//Printer11
$Printer11 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-11-01' AND '".$currentYear."-11-30' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata11 = mysql_fetch_object($Printer11)){
  $printer_num11 = $showdata11->num;
}

//Printer12
$Printer12 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-12-01' AND '".$currentYear."-12-31' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata12 = mysql_fetch_object($Printer12)){
  $printer_num12 = $showdata12->num;
}

//Printer1
$Printer1 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-01-01' AND '".$currentYear."-01-31' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata1 = mysql_fetch_object($Printer1)){
  $printer_num1 = $showdata1->num;
}

//Printer2
$Printer2 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-02-01' AND '".$currentYear."-02-28' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata2 = mysql_fetch_object($Printer2)){
  $printer_num2 = $showdata2->num;
}

//Printer3
$Printer3 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-03-01' AND '".$currentYear."-03-31' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata3 = mysql_fetch_object($Printer3)){
  $printer_num3 = $showdata3->num;
}

//Printer4
$Printer4 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-04-01' AND '".$currentYear."-04-30' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata4 = mysql_fetch_object($Printer4)){
  $printer_num4 = $showdata4->num;
}

//Printer5
$Printer5 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-05-01' AND '".$currentYear."-05-31' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata5 = mysql_fetch_object($Printer5)){
  $printer_num5 = $showdata5->num;
}

//Printer6
$Printer6 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-06-01' AND '".$currentYear."-06-30' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata6 = mysql_fetch_object($Printer6)){
  $printer_num6 = $showdata6->num;
}

//Printer7
$Printer7 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-07-01' AND '".$currentYear."-07-31' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata7 = mysql_fetch_object($Printer7)){
  $printer_num7 = $showdata7->num;
}

//Printer8
$Printer8 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-08-01' AND '".$currentYear."-08-31' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata8 = mysql_fetch_object($Printer8)){
  $printer_num8 = $showdata8->num;
}

//Printer9
$Printer9 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-09-01' AND '".$currentYear."-09-30' AND ci.item_category_type='3' AND cn.card_type='1'");
       
while($showdata9 = mysql_fetch_object($Printer9)){
  $printer_num9 = $showdata9->num;
}
   
?>
