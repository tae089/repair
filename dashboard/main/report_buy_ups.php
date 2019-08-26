<?php
//Ups1  
$Ups10 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$lastYear."-10-01' AND '".$lastYear."-10-31' AND ci.item_category_type='4' AND cn.card_type='1'");

while($showdata10 = mysql_fetch_object($Ups10)){
  //var_dump($showdata);
  $Ups_num10     = $showdata10->num;
}

//Ups11
$Ups11 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-11-01' AND '".$currentYear."-11-30' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata11 = mysql_fetch_object($Ups11)){
  $Ups_num11 = $showdata11->num;
}

//Ups12
$Ups12 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-12-01' AND '".$currentYear."-12-31' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata12 = mysql_fetch_object($Ups12)){
  $Ups_num12 = $showdata12->num;
}

//Ups1
$Ups1 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-01-01' AND '".$currentYear."-01-31' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata1 = mysql_fetch_object($Ups1)){
  $Ups_num1 = $showdata1->num;
}

//Ups2
$Ups2 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-02-01' AND '".$currentYear."-02-28' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata2 = mysql_fetch_object($Ups2)){
  $Ups_num2 = $showdata2->num;
}

//Ups3
$Ups3 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-03-01' AND '".$currentYear."-03-31' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata3 = mysql_fetch_object($Ups3)){
  $Ups_num3 = $showdata3->num;
}

//Ups4
$Ups4 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-04-01' AND '".$currentYear."-04-30' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata4 = mysql_fetch_object($Ups4)){
  $Ups_num4 = $showdata4->num;
}

//Ups5
$Ups5 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-05-01' AND '".$currentYear."-05-31' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata5 = mysql_fetch_object($Ups5)){
  $Ups_num5 = $showdata5->num;
}

//Ups6
$Ups6 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-06-01' AND '".$currentYear."-06-30' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata6 = mysql_fetch_object($Ups6)){
  $Ups_num6 = $showdata6->num;
}

//Ups7
$Ups7 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-07-01' AND '".$currentYear."-07-31' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata7 = mysql_fetch_object($Ups7)){
  $Ups_num7 = $showdata7->num;
}

//Ups8
$Ups8 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-08-01' AND '".$currentYear."-08-31' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata8 = mysql_fetch_object($Ups8)){
  $Ups_num8 = $showdata8->num;
}

//Ups9
$Ups9 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-09-01' AND '".$currentYear."-09-30' AND ci.item_category_type='4' AND cn.card_type='1'");
       
while($showdata9 = mysql_fetch_object($Ups9)){
  $Ups_num9 = $showdata9->num;
}
   
?>
