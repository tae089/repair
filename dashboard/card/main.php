<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"><i class="fa fa-edit fa-fw"></i> ส่งซ่อม/เคลม</h1>
  </div>
</div>
<ol class="breadcrumb">
  <li><a href="index.php">
      <?php echo @LA_MN_HOME;?></a></li>
  <li class="active">ส่งซ่อม/เคลม</li>
</ol>
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
          <div class="form-group">
            <label for="sub_title_types">ประเภท</label>
            <select name="sub_title_types" id="sub_title_types" class="form-control">
              <option value="">เลือก</option>
              <option value="1">วัสดุ</option>
              <option value="2">ครุภัณฑ์</option>
            </select>
          </div>
          <div class="form-group">
            <label for="title_types">ประเภทการส่งซ่อม/เคลม</label>
            <select name="title_types" id="title_types" class="form-control">
              <option value="">เลือก</option>
              <option value="office">สำนักงาน</option>
              <option value="com">คอมพิวเตอร์</option>
            </select>
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
            <textarea name="card_note" id="card_note" class="form-control"></textarea>
            <!-- <select name="card_note" id="card_note" class="form-control">
              <option value="ปกติ">ปกติ</option>
              <option value="ด่วน">ด่วน</option>
              <option value="ด่วนมาก">ด่วนมาก</option>
            </select> -->
          </div>

        </div>
        <input type="hidden" name="user_key" id="user_key" class="form-control" value="<?php echo $_SESSION['ukey']; ?>" autocomplete="off">
        <input type="hidden" name="card_type" id="card_type" class="form-control" value="0" autocomplete="off">
        <input type="hidden" name="user_hosxp" id="user_hosxp" class="form-control" value="">
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

      <!-- <form class="navbar-form from-group navbar-right" role="search" method="get" action="?p=search">

        <input type="text" class="form-control" name="q" placeholder="ระบุชื่อ/หมายเลขโทรศัพท์หรือรหัสส่งซ่อม/เคลม เพื่อค้นหา"
          size="50" autofocus autocomplete="off">
        <input type="hidden" name="p" id="p" value="search">

      </form> -->
    </div>

  </div>
</nav>

<div id="show_card"></div>

<script src='//cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js'></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script language="javascript">
 var socket = io('//127.0.0.1:80');

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

      $('#card_customer_name').autoComplete({
        minChars: 3,
        source: function(term, response){
          $.getJSON('card/get_user.php', { search_user: term }, function(data){ 
            response(data); 
          });
        },
        renderItem: function (item, search){
        console.log(item);
        return '<div class="autocomplete-suggestion" data-langname="'+item+'" data-lang="'+item+'" data-val="'+search+'">'+item+'</div>';
        },
        onSelect: function(e, term, item){
            //alert('Item "'+item.data('langname')+' ('+item.data('lang')+')" selected by '+(e.type == 'keydown' ? 'pressing enter' : 'mouse click')+'.');
            var names = item.data('langname');
            var sname = names.split(" ");
            var nname = sname[2].split(",");
            console.log(nname);
            $('#card_customer_name').val(sname[0]);
            $('#card_customer_lastname').val(nname[0]);
            $('#user_hosxp').val(nname[1]);
        }
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