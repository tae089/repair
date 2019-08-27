<?php
//Computer10  
$computer10 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '(".$lastYear."-10-01)' AND '(".$lastYear."-10-31)' AND ci.item_category_type='1' AND cn.card_type='1'");

while($showdata10 = mysql_fetch_object($computer10)){
  //var_dump($showdata);
  $com_num10  = $showdata10->num;
}

//Computer11
$computer11 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '(".$lastYear."-11-01)' AND '(".$lastYear."-11-30)' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata11 = mysql_fetch_object($computer11)){
  $com_num11 = $showdata11->num;
}

//Computer12
$computer12 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th, COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$lastYear."-12-01' AND '".$lastYear."-12-31' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata12 = mysql_fetch_object($computer12)){
  $com_num12 = $showdata12->num;
}

//Computer1
$computer1 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-01-01' AND '".$currentYear."-01-31' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata1 = mysql_fetch_object($computer1)){
  $com_num1 = $showdata1->num;
}

//Computer2
$computer2 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-02-01' AND '".$currentYear."-02-29' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata2 = mysql_fetch_object($computer2)){
  $com_num2 = $showdata2->num;
}

//Computer3
$computer3 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-03-01' AND '".$currentYear."-03-31' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata3 = mysql_fetch_object($computer3)){
  $com_num3 = $showdata3->num;
}

//Computer4
$computer4 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-04-01' AND '".$currentYear."-04-30' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata4 = mysql_fetch_object($computer4)){
  $com_num4 = $showdata4->num;
}

//Computer5
$computer5 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-05-01' AND '".$currentYear."-05-31' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata5 = mysql_fetch_object($computer5)){
  $com_num5 = $showdata5->num;
}

//Computer6
$computer6 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-06-01' AND '".$currentYear."-06-30' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata6 = mysql_fetch_object($computer6)){
  $com_num6 = $showdata6->num;
}

//Computer7
$computer7 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-07-01' AND '".$currentYear."-07-31' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata7 = mysql_fetch_object($computer7)){
  $com_num7 = $showdata7->num;
}

//Computer8
$computer8 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-08-01' AND '".$currentYear."-08-31' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata8 = mysql_fetch_object($computer8)){
  $com_num8 = $showdata8->num;
}

//Computer9
$computer9 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-09-01' AND '".$currentYear."-09-30' AND ci.item_category_type='1' AND cn.card_type='1'");
       
while($showdata9 = mysql_fetch_object($computer9)){
  $com_num9 = $showdata9->num;
}
   
?>
