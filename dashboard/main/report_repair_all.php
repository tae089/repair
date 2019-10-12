<?php
//repair10  
$repair10 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-10-01' AND '".$currentYear."-11-01'  AND cn.card_type='0'");

while($showdata10 = mysql_fetch_object($repair10)){
  //var_dump($showdata);
  $repair_num10  = $showdata10->num;
}

//repair11
$repair11 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-11-01' AND '".$currentYear."-12-01'  AND cn.card_type='0'");
       
while($showdata11 = mysql_fetch_object($repair11)){
  $repair_num11 = $showdata11->num;
}

//repair12
$repair12 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-12-01' AND '".$currentYear."-12-31'  AND cn.card_type='0'");
       
while($showdata12 = mysql_fetch_object($repair12)){
  $repair_num12 = $showdata12->num;
}

//repair1
$repair1 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-01-01' AND '".$currentYear."-02-01'  AND cn.card_type='0'");
       
while($showdata1 = mysql_fetch_object($repair1)){
  $repair_num1 = $showdata1->num;
}

//repair2
$repair2 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-02-01' AND '".$currentYear."-03-01'  AND cn.card_type='0'");
       
while($showdata2 = mysql_fetch_object($repair2)){
  $repair_num2 = $showdata2->num;
}

//repair3
$repair3 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-03-01' AND '".$currentYear."-04-01'  AND cn.card_type='0'");
       
while($showdata3 = mysql_fetch_object($repair3)){
  $repair_num3 = $showdata3->num;
}

//repair4
$repair4 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-04-01' AND '".$currentYear."-05-01'  AND cn.card_type='0'");
       
while($showdata4 = mysql_fetch_object($repair4)){
  $repair_num4 = $showdata4->num;
}

//repair5
$repair5 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-05-01' AND '".$currentYear."-06-01'  AND cn.card_type='0'");
       
while($showdata5 = mysql_fetch_object($repair5)){
  $repair_num5 = $showdata5->num;
}

//repair6
$repair6 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-06-01' AND '".$currentYear."-07-01'  AND cn.card_type='0'");
       
while($showdata6 = mysql_fetch_object($repair6)){
  $repair_num6 = $showdata6->num;
}

//repair7
$repair7 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-07-01' AND '".$currentYear."-08-01'  AND cn.card_type='0'");
       
while($showdata7 = mysql_fetch_object($repair7)){
  $repair_num7 = $showdata7->num;
}

//repair8
$repair8 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-08-01' AND '".$currentYear."-09-01'  AND cn.card_type='0'");
       
while($showdata8 = mysql_fetch_object($repair8)){
  $repair_num8 = $showdata8->num;
}

//repair9
$repair9 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-09-01' AND '".$currentYear."-10-01'  AND cn.card_type='0'");
       
while($showdata9 = mysql_fetch_object($repair9)){
  $repair_num9 = $showdata9->num;
}
   
?>
