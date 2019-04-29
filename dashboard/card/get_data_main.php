<?php
      if($_SESSION['uclass'] !=3){ 
        $getcard = $getdata->my_sql_select(NULL,"card_info"," card_customer_work_group=".$_SESSION['uwork_id']." AND card_status = ''  ORDER BY card_insert");
      }else{
        $getcard = $getdata->my_sql_select(NULL,"card_info"," card_status = ''  ORDER BY card_insert");
      }
      
      while($showcard = mysql_fetch_object($getcard)){
      ?>
          <tr style="font-weight:bold;" id="<?php echo @$showcard->card_key;?>">
            <td align="center">
              <?php echo @$showcard->card_code;?>
            </td>
            <td align="center">
              <?php echo @dateTimeConvertor($showcard->card_insert);?>
            </td>
            <td>&nbsp;
              <?php echo @$showcard->card_customer_name.'&nbsp;&nbsp;&nbsp;'.$showcard->card_customer_lastname;?>
            </td>
            <td align="center">
              <?php echo @$showcard->card_customer_phone;?>
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