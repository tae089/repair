<?php
//Notebook1  
$notebook10 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '(".$lastYear."-10-01)' AND '(".$lastYear."-10-31)' AND ci.item_category_type='2' AND cn.card_type='1'");

while($showdata10 = mysql_fetch_object($notebook10)){
  //var_dump($showdata);
  $note_num10  = $showdata10->num;
}

//notebook11
$notebook11 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$lastYear."-11-01' AND '".$lastYear."-11-30' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata11 = mysql_fetch_object($notebook11)){
  $note_num11 = $showdata11->num;
}

//notebook12
$notebook12 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$lastYear."-12-01' AND '".$lastYear."-12-31' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata12 = mysql_fetch_object($notebook12)){
  $note_num12 = $showdata12->num;
}

//notebook1
$notebook1 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-01-01' AND '".$currentYear."-01-31' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata1 = mysql_fetch_object($notebook1)){
  $note_num1 = $showdata1->num;
}

//notebook2
$notebook2 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-02-01' AND '".$currentYear."-02-28' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata2 = mysql_fetch_object($notebook2)){
  $note_num2 = $showdata2->num;
}

//notebook3
$notebook3 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-03-01' AND '".$currentYear."-03-31' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata3 = mysql_fetch_object($notebook3)){
  $note_num3 = $showdata3->num;
}

//notebook4
$notebook4 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-04-01' AND '".$currentYear."-04-30' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata4 = mysql_fetch_object($notebook4)){
  $note_num4 = $showdata4->num;
}

//notebook5
$notebook5 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-05-01' AND '".$currentYear."-05-31' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata5 = mysql_fetch_object($notebook5)){
  $note_num5 = $showdata5->num;
}

//notebook6
$notebook6 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-06-01' AND '".$currentYear."-06-30' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata6 = mysql_fetch_object($notebook6)){
  $note_num6 = $showdata6->num;
}

//notebook7
$notebook7 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-07-01' AND '".$currentYear."-07-31' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata7 = mysql_fetch_object($notebook7)){
  $note_num7 = $showdata7->num;
}

//notebook8
$notebook8 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-08-01' AND '".$currentYear."-08-31' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata8 = mysql_fetch_object($notebook8)){
  $note_num8 = $showdata8->num;
}

//notebook9
$notebook9 = $getdata->my_sql_select("DATE_FORMAT(cn.card_insert,'%Y-%m') AS years_months , ca.category_name_th,COUNT(*) AS num, cn.card_type","card_info cn LEFT JOIN card_item ci ON ci.card_key=cn.card_key LEFT JOIN category ca ON ca.category_id=ci.item_category_type","cn.card_insert BETWEEN '".$currentYear."-09-01' AND '".$currentYear."-09-30' AND ci.item_category_type='2' AND cn.card_type='1'");
       
while($showdata9 = mysql_fetch_object($notebook9)){
  $note_num9 = $showdata9->num;
}
   
?>
