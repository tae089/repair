<?php
//buy10  
$buy10 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '(".$currentYear."-10-01)' AND '(".$currentYear."-11-01)'  AND cn.card_type='1'");

while($showdata10 = mysql_fetch_object($buy10)){
  //var_dump($showdata);
  $buy_num10  = $showdata10->num;
}

//buy11
$buy11 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '(".$currentYear."-11-01)' AND '(".$currentYear."-12-01)'  AND cn.card_type='1'");
       
while($showdata11 = mysql_fetch_object($buy11)){
  $buy_num11 = $showdata11->num;
}

//buy12
$buy12 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-12-01' AND '".$currentYear."-12-31'  AND cn.card_type='1'");
       
while($showdata12 = mysql_fetch_object($buy12)){
  $buy_num12 = $showdata12->num;
}

//buy1
$buy1 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-01-01' AND '".$currentYear."-02-01'  AND cn.card_type='1'");
       
while($showdata1 = mysql_fetch_object($buy1)){
  $buy_num1 = $showdata1->num;
}

//buy2
$buy2 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-02-01' AND '".$currentYear."-03-01'  AND cn.card_type='1'");
       
while($showdata2 = mysql_fetch_object($buy2)){
  $buy_num2 = $showdata2->num;
}

//buy3
$buy3 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-03-01' AND '".$currentYear."-04-01'  AND cn.card_type='1'");
       
while($showdata3 = mysql_fetch_object($buy3)){
  $buy_num3 = $showdata3->num;
}

//buy4
$buy4 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-04-01' AND '".$currentYear."-05-01'  AND cn.card_type='1'");
       
while($showdata4 = mysql_fetch_object($buy4)){
  $buy_num4 = $showdata4->num;
}

//buy5
$buy5 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-05-01' AND '".$currentYear."-06-01'  AND cn.card_type='1'");
       
while($showdata5 = mysql_fetch_object($buy5)){
  $buy_num5 = $showdata5->num;
}

//buy6
$buy6 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-06-01' AND '".$currentYear."-07-01'  AND cn.card_type='1'");
       
while($showdata6 = mysql_fetch_object($buy6)){
  $buy_num6 = $showdata6->num;
}

//buy7
$buy7 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-07-01' AND '".$currentYear."-08-01'  AND cn.card_type='1'");
       
while($showdata7 = mysql_fetch_object($buy7)){
  $buy_num7 = $showdata7->num;
}

//buy8
$buy8 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-08-01' AND '".$currentYear."-09-01'  AND cn.card_type='1'");
       
while($showdata8 = mysql_fetch_object($buy8)){
  $buy_num8 = $showdata8->num;
}

//buy9
$buy9 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-09-01' AND '".$currentYear."-10-01'  AND cn.card_type='1'");
       
while($showdata9 = mysql_fetch_object($buy9)){
  $buy_num9 = $showdata9->num;
}
   
?>
