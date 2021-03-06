<?php
session_start();
error_reporting(0);
require("../../core/config.core.php");
require("../../core/connect.core.php");
require("../../core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();

if(@addslashes($_GET['lang'])){
	$_SESSION['lang'] = addslashes($_GET['lang']);
}else{
	$_SESSION['lang'] = $_SESSION['lang'];
}
if(@$_SESSION['lang']!=NULL){
	require("../../language/".@$_SESSION['lang']."/site.lang");
	require("../../language/".@$_SESSION['lang']."/menu.lang");
}else{
	require("../../language/th/site.lang");
	require("../../language/th/menu.lang");
	$_SESSION['lang'] = 'th';

}
$getitem_detail =$getdata->my_sql_query(NULL,"card_item","item_key='".addslashes($_GET['key'])."'");
?>

<div class="modal-body">
   <div class="form-group">
      <label for="item_number">หมายเลขสินค้า</label>
      <input type="text" name="item_number" id="item_number" readonly class="form-control" value="<?php echo @$getitem_detail->item_number;?>">
   </div>
   <div class="form-group">
      <label for="edit_item_package_code">รหัสพัสดุ</label>
      <input type="text" name="edit_item_package_code" id="edit_item_package_code" class="form-control" value="<?php echo @$getitem_detail->item_package_code;?>"
         autofocus>
   </div>
   <div class="form-group">
      <label for="edit_item_sn_code">รหัส SN</label>
      <input type="text" name="edit_item_sn_code" id="edit_item_sn_code" class="form-control" value="<?php echo @$getitem_detail->item_sn_code;?>"
         autofocus>
   </div>
   <div class="form-group">
      <label for="edit_item_name">ชื่อรายการ</label>
      <input type="text" name="edit_item_name" id="edit_item_name" class="form-control" value="<?php echo @$getitem_detail->item_name;?>"
         autofocus>
   </div>
   <div class="form-group">
      <label for="edit_item_note">สาเหตุที่ส่งซ่อม/เคลม</label>
      <textarea name="edit_item_note" id="edit_item_note" class="form-control"><?php echo @$getitem_detail->item_note;?></textarea>
   </div>
   <div class="form-group">
      <label>ประเภท</label>
      <select name="edit_item_category_id" id="edit_item_category_id" class="form-control">
         <option vlaue=""> กรุณาเลือก </option>
         <?php
            $getcard_type = $getdata->my_sql_select(NULL,"category","category_status='1' ORDER BY category_id ASC");
            while($show_type = mysql_fetch_object($getcard_type)){
               $selected = ($show_type->category_id==@$getitem_detail->item_category_type)?"selected": "";
         ?>
            <option value="<?php echo $show_type->category_id; ?>" <?php echo $selected; ?>><?php echo $show_type->category_name_th; ?></option>
         <?php } ?>
      </select>
   </div>
   <div class="form-group">
      <label for="edit_item_amount">จำนวน</label>
      <input type="text" name="edit_item_amount" id="edit_item_amount" class="form-control" value="<?php echo @$getitem_detail->item_amount;?>">
   </div>
   <div class="form-group">
      <label for="edit_item_price_aprox">ราคาโดยประมาณ</label>
      <input type="text" name="edit_item_price_aprox" id="edit_item_price_aprox" class="form-control" value="<?php echo @$getitem_detail->item_price_aprox;?>">
   </div>
   <div class="form-group">
      <input type="hidden" name="item_key" id="item_key" value="<?php echo @addslashes($_GET['key']);?>">
   </div>
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>
      <?php echo @LA_BTN_CLOSE;?></button>
   <button type="submit" name="save_edit_item" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i>
      <?php echo @LA_BTN_SAVE;?></button>
</div>