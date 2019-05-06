<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"><i class="fa fa-edit fa-fw"></i> ส่งซ่อมสินค้า/เคลม</h1>
  </div>
</div>
<ol class="breadcrumb">
  <li><a href="index.php">
      <?php echo @LA_MN_HOME;?></a></li>
  <li class="active">ส่งซ่อมสินค้า/เคลม</li>
</ol>
<?php
// if(isset($_POST['save_card'])){
// 	if(addslashes($_POST['card_customer_name'])!= NULL && addslashes($_POST['card_customer_phone']) != NULL ){
// 		$card_key=md5(addslashes($_POST['card_customer_name']).addslashes($_POST['card_code']).time("now"));
// 		$getdata->my_sql_insert("card_info","card_key='".$card_key."',card_code='".addslashes($_POST['card_code'])."',card_customer_name='".addslashes($_POST['card_customer_name'])."',card_customer_lastname='".addslashes($_POST['card_customer_lastname'])."',card_customer_address='".addslashes($_POST['card_customer_address'])."',card_customer_phone='".addslashes($_POST['card_customer_phone'])."',card_customer_work_group=".$_POST['card_customer_work_group'].",card_note='".addslashes($_POST['card_note'])."',card_done_aprox='0000-00-00',user_key='".$user_data->user_key."',card_status=''");
// 		echo '<script>window.location="?p=card_create_detail&key='.$card_key.'";</script>';
// 	}else{
// 		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรุณาระบุอีกครั้ง !</div>';
// 	}
// }
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form method="post" enctype="multipart/form-data" name="form1" id="form_add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">เพิ่มใบส่งซ่อม/เคลม</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="card_code">รหัสการส่งซ่อม/เคลม</label>
            <input type="text" name="card_code" id="card_code" value="<?php echo @RandomString(4,'C',7);?>" class="form-control"
              readonly>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="card_customer_name">ชื่อผู้ส่งซ่อม</label>
              <input type="text" name="card_customer_name" id="card_customer_name" class="form-control" autofocus
                autocomplete="off">
            </div>
            <div class="col-md-6">
              <label for="card_customer_lastname">นามสกุล</label>
              <input type="text" name="card_customer_lastname" id="card_customer_lastname" class="form-control"
                autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="card_customer_address">ที่อยู่</label>
            <textarea name="card_customer_address" id="card_customer_address" class="form-control">โรงพยาบาลโนนสะอาด อ.โนนสะอาด จ.อุดรธานี 41240</textarea>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="card_customer_phone">หมายเลขโทรศัพท์(ภายใน)</label>
              <input type="text" name="card_customer_phone" id="card_customer_phone" class="form-control" autocomplete="off">
            </div>
            <div class="col-md-6"> <label for="card_customer_work_group">กลุ่มงาน</label>
              <?php  
                $department_data = $getdata->my_sql_query($field,"department","department_id=".$_SESSION['uwork_id'].""); 
              ?>
              <input type="text" class="form-control" value="<?php echo  $department_data->name; ?>" readonly>
              <input type="hidden" name="card_customer_work_group" id="card_customer_work_group" class="form-control"
                value="<?php echo $_SESSION['uwork_id']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="card_note">หมายเหตุ</label>
            <!-- <textarea name="card_note" id="card_note" class="form-control"></textarea> -->
            <select name="card_note" id="card_note" class="form-control">
              <option value="ปกติ">ปกติ</option>
              <option value="ด่วน">ด่วน</option>
              <option value="ด่วนมาก">ด่วนมาก</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <div id="btn-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>
            <?php echo @LA_BTN_CLOSE;?></button>
            <button type="submit" name="save_card" class="btn btn-primary btn-sm" id="save_card"><i class="fa fa-save fa-fw"></i>
            <?php echo @LA_BTN_SAVE;?></button>
          </div>
          <div id="processes"></div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  </form>
  <!-- /.modal-dialog -->
</div>
<?php
   echo @$alert;?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
        aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-edit"></i></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a data-toggle="modal" data-target="#myModal" style="cursor:pointer;"><i class="fa fa-plus"></i>
            เพิ่มใบส่งซ่อม/เคลม</a></li>
      </ul>

      <form class="navbar-form from-group navbar-right" role="search" method="get" action="?p=search">

        <input type="text" class="form-control" name="q" placeholder="ระบุชื่อ/หมายเลขโทรศัพท์หรือรหัสส่งซ่อม/เคลม เพื่อค้นหา"
          size="50" autofocus autocomplete="off">
        <input type="hidden" name="p" id="p" value="search">

      </form>
    </div>

  </div>
</nav>

<div id="show_card"></div>

<script src='//cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js'></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script language="javascript">
 var socket = io('//127.0.0.1:8080');

  function deleteCard(cardkey) {
    if (confirm('คุณต้องการลบใบสั่งซ่อม/เคลมนี้ใช่หรือไม่ ?')) {
      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      socket.emit('delect_card','Delect Card');
      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            socket.on('show_card', function(message)  {
              console.log(message);
              document.getElementById(cardkey).innerHTML = '';
            });
        }
      }
       xmlhttp.open("GET", "function.php?type=delete_card&key=" + cardkey, true);
       xmlhttp.send();
    }
  }
  $(document).ready(() => { 
      //Show data 
      socket.emit('show_card', 'Show Card');
      // bind 'myForm' and provide a simple callback function 
      $('#form_add').ajaxForm(() => { 
        var queryString = $('#form_add').formSerialize();
        $.post('card/save_card_info.php', queryString, (response) => {
          var obj = JSON.parse(response);
          console.log(obj.message);   
          if(obj.satuts===true){
            $('#btn-footer').hide();
            $('#processes').empty();
            $('#processes').append(obj.message);
            setTimeout(() => { 
              $('#myModal').modal('hide');
              $('#btn-footer').show();
              $('#processes').empty();
              $('#form_add').resetForm();
              window.location='?p=card_create_detail&key='+obj.card_key;
              //socket.emit('new_card','On Add Card.');
            }, 3000);
              
          }else{
            setTimeout(() => { 
              $('#processes').empty();
              $('#processes').append(obj.message);
            }, 3000);
          }
          
        });          
      }); 

    }); 
 
    socket.on('show_card', (message) => {
      console.log(message);
      $.post( "card/get_data_main.php", (data) => {
        console.log(data);
        $('#show_card').html(data);
      });
    });
</script>