<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();

   if(addslashes($_GET['type']) != NULL){
	   $getcard_count = $getdata->my_sql_show_rows("card_info","card_status = '".addslashes($_GET['type'])."' ORDER BY card_insert");
  }else{
	   $getcard_count = $getdata->my_sql_show_rows("card_info","card_status <> 'hidden'  AND  card_status <> '' ORDER BY card_insert");
  }
   
   if($getcard_count != 0){
  ?>
 <div class="table-responsive" style="overflow-x:auto;white-space: nowrap;">
  <table style="width:100%" class="table table-bordered display" id="card_repair">
    <thead>
      <tr style="font-weight:bold; color:#FFF; text-align:center; background:#ff7709;">
        <th width="12%">รหัสส่งซ่อม/เคลม</th>
        <th width="16%">วันที่</th>
        <th width="26%">ชื่อผู้ส่งซ่อม/เคลม</th>
        <th width="16%">กลุ่มงาน</th>
        <th width="13%">ประเภทการส่งซ่อม/เคลม</th>
        <th width="15%">สถานะ</th>
        <th width="15%">หมายเหตุ</th>
        <th width="18%">จัดการ</th>
      </tr>
    </thead>
    <tbody>
      <?php
  if(addslashes($_GET['type']) != NULL && $_SESSION['uclass'] !=3){
	   $getcard = $getdata->my_sql_select(NULL,"card_info","card_customer_work_group='".$_SESSION['uwork_id']."' AND card_status = '".addslashes($_GET['type'])."' AND card_type='0' ORDER BY card_insert");
  } elseif ($_SESSION['uclass'] !=3){
	   $getcard = $getdata->my_sql_select(NULL,"card_info","card_customer_work_group=".$_SESSION['uwork_id']." AND card_status <> 'hidden'  AND  card_status <> '' AND card_type='0' ORDER BY card_insert");
  } else {
    $getcard = $getdata->my_sql_select(NULL,"card_info","card_status <> 'hidden'  AND  card_status <> '' AND card_type='0' ORDER BY card_insert");
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
        <td>
          <?php echo @$showcard->card_customer_name.'&nbsp;&nbsp;&nbsp;'.$showcard->card_customer_lastname;?>
        </td>
        <td><?php echo @getGroupWorking($showcard->card_customer_work_group);?></td>
        <td>
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
        <td>
          <?php echo @cardStatus($showcard->card_status);?>
        </td>
        <td>
          <?php echo @$showcard->card_note;?>
        </td>
        <td align="right">
          <?php if($_SESSION['uclass']==3){ ?>
          <a class="btn btn-xs btn-default" title="ซ่อน" onClick="javascript:hideCard('<?php echo @$showcard->card_key;?>');"><i
              class="fa fa-ban"></i></a>
          <a data-toggle="modal" data-target="#edit_status" data-whatever="<?php echo @$showcard->card_key;?>" class="btn btn-xs btn-info"
            title="เปลี่ยนสถานะ"><i class="fa fa-tag"></i></a>
          <?php } ?>
          <a href="?p=card_all_status&key=<?php echo @$showcard->card_key;?>" class="btn btn-xs btn-success" title="ประวัติ"><i class="fa fa-history"></i></a>
            <a href="card/print_card.php?key=<?php echo @$showcard->card_key;?>" target="_blank" class="btn btn-xs btn-primary" title="พิมพ์ใบติดตาม"><i class="fa fa-qrcode"></i></a>
            <a href="card/print_from_card.php?key=<?php echo @$showcard->card_key;?>" target="_blank"
            class="btn btn-xs btn-warning" title="พิมพ์"><i class="fa fa-print"></i></a>
            <a onClick="javascript:deleteCard('<?php echo @$showcard->card_key;?>');"
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
	   echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ไม่พบข้อมูลใบสั่งซ่อม/เคลม</div>';
   }
?>
<script  type="text/javascript">

  $(document).ready(() => { 
    $('#card_repair').DataTable();
  });
</script>