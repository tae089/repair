<?php
//Accessories1  
$Accessories10 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$lastYear."-10-01' AND '".$lastYear."-10-31' AND ci.item_category_type='5' AND cn.card_type='1'");

while($showdata10 = mysql_fetch_object($Accessories10)){
  //var_dump($showdata);
  $Accessories_num10   = $showdata10->num;
}

//Accessories11
$Accessories11 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-11-01' AND '".$currentYear."-11-30' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata11 = mysql_fetch_object($Accessories11)){
  $Accessories_num11 = $showdata11->num;
}

//Accessories12
$Accessories12 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-12-01' AND '".$currentYear."-12-31' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata12 = mysql_fetch_object($Accessories12)){
  $Accessories_num12 = $showdata12->num;
}

//Accessories1
$Accessories1 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-01-01' AND '".$currentYear."-01-31' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata1 = mysql_fetch_object($Accessories1)){
  $Accessories_num1 = $showdata1->num;
}

//Accessories2
$Accessories2 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-02-01' AND '".$currentYear."-02-28' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata2 = mysql_fetch_object($Accessories2)){
  $Accessories_num2 = $showdata2->num;
}

//Accessories3
$Accessories3 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-03-01' AND '".$currentYear."-03-31' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata3 = mysql_fetch_object($Accessories3)){
  $Accessories_num3 = $showdata3->num;
}

//Accessories4
$Accessories4 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-04-01' AND '".$currentYear."-04-30' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata4 = mysql_fetch_object($Accessories4)){
  $Accessories_num4 = $showdata4->num;
}

//Accessories5
$Accessories5 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-05-01' AND '".$currentYear."-05-31' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata5 = mysql_fetch_object($Accessories5)){
  $Accessories_num5 = $showdata5->num;
}

//Accessories6
$Accessories6 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-06-01' AND '".$currentYear."-06-30' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata6 = mysql_fetch_object($Accessories6)){
  $Accessories_num6 = $showdata6->num;
}

//Accessories7
$Accessories7 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-07-01' AND '".$currentYear."-07-31' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata7 = mysql_fetch_object($Accessories7)){
  $Accessories_num7 = $showdata7->num;
}

//Accessories8
$Accessories8 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-08-01' AND '".$currentYear."-08-31' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata8 = mysql_fetch_object($Accessories8)){
  $Accessories_num8 = $showdata8->num;
}

//Accessories9
$Accessories9 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-09-01' AND '".$currentYear."-09-30' AND ci.item_category_type='5' AND cn.card_type='1'");
       
while($showdata9 = mysql_fetch_object($Accessories9)){
  $Accessories_num9 = $showdata9->num;
}
   
?>
