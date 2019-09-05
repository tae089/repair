<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-pie-chart fa-fw"></i> <?php echo 'รายงาน';?></h1>
     </div>        
</div>
<ol class="breadcrumb">
  <li class="active"><?php echo 'รายงาน';?></li>
</ol>
<div class="row">
  <div class="col-lg-12">
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>
    <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form from-group" role="search" action="">
        <span>ปีงบประมาณ</span>
        <input type="text" name="budget_year" id="budget_year" class="form-control">
        <button type="button" class="btn btn-default" id="search_year"><i class="fa fa-search"></i> ค้นหา</button>
      </form>
    </div>

  </div>
</nav>

    
  </div>
</div>
<div class="modal fade loading">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <p><img src="./../img/loading.gif" width="30px;" height="30px;"> <b>กำลังประมวลผล กรุณารอสักครู่...</b></p>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
  // $('#budget_year').datepicker({
  //     format: 'yyyy-mm'
  // });

  $('#search_year').click(function(){
    let budget_year = $('#budget_year').val();
    // $.post('card/save_card_info.php', queryString, (response) => {


    // });
    $('.loading').modal('show');
  });


</script>