<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
define('LINE_TOKEN','0RkLFYoKyl6IsaSZdEvh5mEEqOkKLqyBcKEr2gW0M7w');
function notify_message($message){

    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
            		  ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        )
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
    $res = json_decode($result);
	return $res;
}

	include("chksession.php");
 if(!$_POST){
     header("location:index.php");
     exit();
    }
 include("connect/connect.php");  
	$obj_connect = new Connect();
	$obj_connect->connection();

date_default_timezone_set("Asia/Bangkok");
$day =  date("Y-m-d");
$date_time = date("Y-m-d H:i:s");		
$pname_value = $_POST['pname_value'];
$fname_value = $_POST['fname_value'];
$lname_value = $_POST['lname_value'];
$tel_value = $_POST['tel_value'];
$postion_value = $_POST['postion_value'];
$work_group_value =$_POST['work_group_value'];
$dep_value = $_POST['dep_value'];

$use_meeting_value = $_POST['use_meeting_value'];
$location_value = $_POST['location_value'];

$date1_value = explode("/",$_POST['date1_value']);
$array_date1 = array($date1_value[2],$date1_value[1],$date1_value[0]);
$date1 = implode("-",$array_date1);

$time1_value = $_POST['time1_value'];

$date2_value = explode("/",$_POST['date2_value']);
$array_date2 = array($date2_value[2],$date2_value[1],$date2_value[0]);
$date2 = implode("-",$array_date2);


$time2_value = $_POST['time2_value'];

$person1_value = $_POST['person1_value'];
$person2_value = $_POST['person2_value'];
$person3_value = $_POST['person3_value'];
$person4_value = $_POST['person4_value'];
$person5_value = $_POST['person5_value'];
$person6_value = $_POST['person6_value'];
$person7_value = $_POST['person7_value'];
$person8_value = $_POST['person8_value'];
$person9_value = $_POST['person9_value'];
$person10_value = $_POST['person10_value'];

$sql_insert = "insert into request_meeting values('null','$pname_value','$fname_value','$lname_value','$tel_value',";
$sql_insert .=  "'$postion_value',";
$sql_insert .= "'$work_group_value','$dep_value','$use_meeting_value','$location_value','','$date1','$time1_value',";
$sql_insert .= "'$date2','$time2_value','$person1_value','$person2_value','$person3_value','$person4_value',";
$sql_insert .= "'$person5_value','$person6_value','$person7_value','$person8_value','$person9_value','$person10_value',";
$sql_insert .="'','','','','รอดำเนินการ','$date_time','','')";

   mysql_query("BEGIN");
   $result_insert = mysql_query($sql_insert); 

if($result_insert){
      mysql_query("COMMIT");
	  
$sql_line ="SELECT  CONCAT(r.pname,' ',r.fname,' ',r.lname) as name_request,
            r.postion,r.use_meeting,r.location,r.person1,r.person2,r.person3,r.person4,CONCAT(r.date1,' ',r.time1,' ',
			'ถึง  ',r.date2,' ',r.time2) as date_meeting
            FROM  request_meeting  r
            WHERE  r.request_meeting_id =(SELECT MAX(r.request_meeting_id) FROM request_meeting r)";	
			
$result_line = @mysql_query($sql_line);
$line_name_request = @mysql_result($result_line,0,0);
$line_postion = @mysql_result($result_line,0,1);
$line_use_meeting= @mysql_result($result_line,0,2);
$line_location= @mysql_result($result_line,0,3);
$line_person1 = @mysql_result($result_line,0,4);
$line_person2 = @mysql_result($result_line,0,5);
$line_person3 = @mysql_result($result_line,0,6);
$line_person4 = @mysql_result($result_line,0,7);
$line_time = @mysql_result($result_line,0,8);

$meeting_line=  "รายละเอียดการขอใช้ห้องประชุม     ชื่อผู้ขอใช้ :". $line_name_request;
$meeting_line .=  "  วันเวลา:" .$line_time ;
$meeting_line .= "  ขอใช้ห้องประชุมเพื่อ: $line_use_meeting  สถานที่: $line_location  จำนวนผู้เข้าร่วมประชุม 1 : $line_person1 ";
$meeting_line .= " ต้องการให้ บริหารจัดหาจัดเครื่องดื่มพร้อมอาหารว่าง 2 : $line_person2     ต้องการให้ IT จัดอุปกรณ์ 3 : $line_person3  ";
$meeting_line.=  "อนุมัติได้ที่ :  http://110.164.72.169:8000/meeting :";
$res = notify_message("$meeting_line");
	  
	  echo " <script type='text/javascript'> 
                      alert('บันทึกข้อมูลเสร็จเรียบร้อยแล้วครับ');
					  refresh_page();
             </script>   ";
}
else{
	  mysql_query("ROLLBACK");
	  echo "      <script type='text/javascript'> 
                     alert('ไม่สามห้องประชุมบันทึกข้อมูลได้');
				      refresh_page();
                  </script>   ";
}


?>


