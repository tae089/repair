<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();

   $getcard_count = $getdata->my_sql_show_rows("card_info","card_status = ''  ORDER BY card_insert");
   if($getcard_count != 0){
  ?>
<div class="table-responsive" style="overflow-x:auto;white-space: nowrap;">
  <table width="100%" border="0" class="table table-bordered" id="show_card">
    <thead>
      <tr style="font-weight:bold; color:#FFF; text-align:center; background:#ff7709;">
        <td width="12%">รหัสส่งซ่อม/เคลม</td>
        <td width="16%">วันที่</td>
        <td width="28%">ชื่อผู้ส่งซ่อม/เคลม</td>
        <td width="16%">กลุ่มงาน</td>
        <td width="13%">ประเภทการส่งซ่อม/เคลม</td>
        <td width="16%">สถานะ</td>
        <td width="15%">จัดการ</td>
      </tr>
    </thead>
    <tbody>
    <?php
      if($_SESSION['uclass'] !=3){ 
        $getcard = $getdata->my_sql_select(NULL,"card_info"," card_customer_work_group=".$_SESSION['uwork_id']." AND card_status = '' AND card_type='0'  ORDER BY card_insert");
      }else{
        $getcard = $getdata->my_sql_select(NULL,"card_info"," card_status = '' AND card_type='0'  ORDER BY card_insert");
      }
      
      while($showcard = mysql_fetch_object($getcard)){
      ?>
          <tr style="font-weight:bold;" id="<?php echo @$showcard->card_key;?>">
            <td>
              <?php echo @$showcard->card_code;?>
            </td>
            <td>
              <?php echo @dateTimeConvertor($showcard->card_insert);?>
            </td>
            <td>&nbsp;
              <?php echo @$showcard->card_customer_name.'&nbsp;&nbsp;&nbsp;'.$showcard->card_customer_lastname;?>
            </td>
            <td><?php echo @getGroupWorking($showcard->card_customer_work_group);?></td>
            <td align="center">
            <?php  
              if($showcard->title_types=='office'){ 
                $types='วัสดุอุปกรณ์สำนักงาน';
              } elseif ($showcard->title_types=='medical') {
                $types='วัสดุอุปกรณ์ทางการแพทย์';
              }else {
                $types='วัสดุอุปกรณ์คอมพิวเตอร์';
              }
              echo $types;
          ?>
            </td>
            <td align="center">
              <?php echo @cardStatus($showcard->card_status);?>
            </td>
            <td align="right"><a href="?p=card_create_detail&key=<?php echo @$showcard->card_key;?>" title="แก้ไข" class="btn btn-xs btn-info"><i
                  class="fa fa-edit"></i></a><a onClick="javascript:deleteCard('<?php echo @$showcard->card_key;?>');"
                title="ลบข้อมูล" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a></td>
          </tr>
          <?php
      }
      ?>
    </tbody>

  </table>

</div>

<?php
   }else{
	   echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ไม่พบข้อมูลใบสั่งซ่อม/เคลมที่ไม่สมบูรณ์</div>';
   }
?>