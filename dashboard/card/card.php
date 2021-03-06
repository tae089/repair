<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"><i class="fa fa-list fa-fw"></i> รายการส่งซ่อม/เคลม</h1>
  </div>
</div>
<ol class="breadcrumb">
  <li><a href="index.php">
      <?php echo @LA_MN_HOME;?></a></li>
  <li class="active">รายการส่งซ่อม/เคลม</li>
</ol>
<?php
if(isset($_POST['save_card'])){
	if(addslashes($_POST['card_customer_name'])!= NULL && addslashes($_POST['card_customer_phone']) != NULL ){
		$card_key=md5(addslashes($_POST['card_customer_name']).addslashes($_POST['card_code']).time("now"));
		$getdata->my_sql_insert("card_info","card_key='".$card_key."',card_code='".addslashes($_POST['card_code'])."',card_customer_name='".addslashes($_POST['card_customer_name'])."',card_customer_lastname='".addslashes($_POST['card_customer_lastname'])."',card_customer_address='".addslashes($_POST['card_customer_address'])."',card_customer_phone='".addslashes($_POST['card_customer_phone'])."',card_customer_email='".addslashes($_POST['card_customer_email'])."',card_note='".addslashes($_POST['card_note'])."',card_done_aprox='0000-00-00',user_key='".$userdata->user_key."',card_status='',card_insert='".date("Y-m-d H:i:s")."'");
		echo '<script>window.location="?p=card_create_detail&key='.$card_key.'";</script>';
	}else{
		$alert = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่ถูกต้อง กรุณาระบุอีกครั้ง !</div>';
	}
}
?>
<!-- Modal Edit -->
<div class="modal fade" id="edit_status" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
  <form method="post" enctype="multipart/form-data" name="form2" id="form_new_status">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">
              <?php echo @LA_BTN_CLOSE;?></span></button>
          <h4 class="modal-title" id="memberModalLabel">เปลี่ยนสถานะ</h4>
        </div>
        <div class="ct">
        </div>
      </div>
    </div>
  </form>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form method="post" enctype="multipart/form-data" name="form1" id="form1">
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
              <input type="text" name="card_customer_name" id="card_customer_name" class="form-control" autofocus>
            </div>
            <div class="col-md-6">
              <label for="card_customer_lastname">นามสกุล</label>
              <input type="text" name="card_customer_lastname" id="card_customer_lastname" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="card_customer_address">ที่อยู่</label>
            <textarea name="card_customer_address" id="card_customer_address" class="form-control"></textarea>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="card_customer_phone">หมายเลขโทรศัพท์</label>
              <input type="text" name="card_customer_phone" id="card_customer_phone" class="form-control">
            </div>
            <div class="col-md-6"> <label for="card_customer_email">อีเมล</label>
              <input type="text" name="card_customer_email" id="card_customer_email" class="form-control"></div>
          </div>
          <div class="form-group">
            <label for="card_note">หมายเหตุ</label>
            <textarea name="card_note" id="card_note" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times fa-fw"></i>
            <?php echo @LA_BTN_CLOSE;?></button>
          <button type="submit" name="save_card" class="btn btn-primary btn-sm"><i class="fa fa-save fa-fw"></i>
            <?php echo @LA_BTN_SAVE;?></button>
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
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">สถานะการซ่อม/เคลม <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php
		  if(addslashes($_GET['type']) != NULL){
			  $gettype_detail = $getdata->my_sql_query(NULL,"card_type","ctype_key='".addslashes($_GET['type'])."'");
			  $text_cat = $gettype_detail->ctype_name;
		  }else{
			 $text_cat = 'ทุกสถานะ';
		  }
		  $gettype = $getdata->my_sql_select(NULL,"card_type","ctype_status='1' ORDER BY ctype_insert");
		  		echo '<li><a href="?p=card">ทุกสถานะ</a></li>';
            while($showtype = mysql_fetch_object($gettype)){
				echo '<li><a href="?p=card&type='.$showtype->ctype_key.'">'.$showtype->ctype_name.'</a></li>';
            }
			?>
          </ul>
        </li>
        <li><a>
            <?php echo @$text_cat;?></a></li>
      </ul>

      <!-- <form class="navbar-form from-group navbar-right" role="search" method="get" action="?p=search">

        <input type="text" class="form-control" name="q" placeholder="ระบุชื่อ/หมายเลขโทรศัพท์หรือรหัสส่งซ่อม/เคลม เพื่อค้นหา"
          size="50" autofocus autocomplete="off">
        <input type="hidden" name="p" id="p" value="search">

      </form> -->
    </div>

  </div>
</nav>
<div id="detail_card"></div>
<!-- <script src="http://malsup.github.com/jquery.form.js"></script> -->
<script src="../js/jquery.form.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js'></script>
<script  type="text/javascript">
  var socket = io('//127.0.0.1:8080');
  $(document).ready(() => { 
    $('.dpk1').datepicker({
      format : "yyyy-mm-dd"
    });
    $.post( "card/get_card.php", (data) => {
        console.log(data);
        $('#detail_card').html(data);
      });
      
    $('#form_new_status').ajaxForm(() => { 
        var queryString = $('#form_new_status').formSerialize();
        console.log("DATA:"+queryString);
        
        $.post('card/save_new_status.php', queryString, (response) => {
          var obj = JSON.parse(response);
          console.log(obj.message);   
          if(obj.satuts===true){
            $('#btn-footer').hide();
            $('#processes').empty();
            $('#processes').append(obj.message);
            setTimeout(() => { 
              $('#edit_status').modal('hide');
              $('#btn-footer').show();
              $('#processes').empty();
			        $('#form_new_status').resetForm();
              socket.emit('show_card', 'Show data Card');
              socket.emit('num_card', {uclass:<?php echo $_SESSION['uclass'];?>,uwork_id:<?php echo $_SESSION['uwork_id'];?>});
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

  $('#edit_status').on('shown.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var modal = $(this);
    var dataString = 'key=' + recipient;

    $.ajax({
      type: "GET",
      url: "card/edit_status.php",
      data: dataString,
      //cache: false,
      success: function (data) {
        console.log(data);
        modal.find('.ct').html(data);
      },
      error: function (err) {
        console.log(err);
      }
    });
  })

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
          document.getElementById(cardkey).innerHTML = '';
        }
      }
      xmlhttp.open("GET", "function.php?type=delete_card&key=" + cardkey, true);
      xmlhttp.send();
      socket.emit('num_card', {uclass:<?php echo $_SESSION['uclass'];?>,uwork_id:<?php echo $_SESSION['uwork_id'];?>});
    }
  }

  function hideCard(cardkey) {
    if (confirm('คุณต้องการซ่อนใบสั่งซ่อม/เคลมนี้ใช่หรือไม่ ?')) {
      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      socket.emit('delect_card','Delect Card');
      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById(cardkey).innerHTML = '';
        }
      }
      xmlhttp.open("GET", "function.php?type=hide_card&key=" + cardkey, true);
      xmlhttp.send();
      socket.emit('num_card', {uclass:<?php echo $_SESSION['uclass'];?>,uwork_id:<?php echo $_SESSION['uwork_id'];?>});
    }
  }

  socket.on('show_card', (message) => {
      console.log(message);
      $.post( "card/get_card.php", (data) => {
        console.log(data);
        $('#detail_card').html(data);
      });
    }); 



</script>