<?php
session_start();
/* include helper & setting ================================== */
require 'setting.php';

/* check permission ========================================== */
/* 1=USER, 2=ADMIN */
check_permission(1);

/* code php here!============================================= */


/* header include file=========================================*/
require 'layout/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      รายงาน LOG
      <small>My report log detail</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('work/categorie'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">LOG</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!--กล่องข้อความ-->
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">ตารางข้อมูล</h3>
        <div class="pull-right form-inline">
          <label>Filter date range</label>
          <input type="text" id="beginDate" class="form-control input-sm"> To <input type="text" id="endDate" class="form-control input-sm">
        </div>
      </div>
      <div class="box-body">
        <table id="table_id" class="display table table-striped table-bordered">
          <thead>
            <tr>
              <th>IP</th>
              <th>Date</th>
              <th>Type</th>
              <th>Username</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- script javascript -->
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var searchData = {};

    $('#beginDate').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    $('#endDate').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });

    var table = $('#table_id').DataTable({
      pageLength: 10,
      serverSide: true,
      processing: true,
      ajax: {
        url: $site_url+'ajax/mylog.php',
        data: function(d){
          return $.extend(d, searchData)
        }
      },
      'columns':[
      { data: 'ip' },
      { data: 'created' },
      { data: 'user_type' },
      { data: 'username' },
      { data: 'fullname' },
      { data: 'action' }
      ]
    });

    var initFilter = function(begin, end){
      searchData.begin = begin;
      searchData.end = end;
      table.ajax.reload();
    };

    /* event change date range*/
    $('body').on('change','#beginDate',function(){
      var begin = $('#beginDate').val();
      var end = $('#endDate').val()
      initFilter(begin, end);
    });

    $('body').on('change','#endDate',function(){

      var begin = $('#beginDate').val();
      var end = $('#endDate').val()
      initFilter(begin, end);
    });
  });
</script>
<?php
/* footer include file=========================================*/
require 'layout/footer.php';

if(isset($_SESSION[ss().'msg'])){
  unset($_SESSION[ss().'msg']);
}