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
    var table = $('#table_id').DataTable({
      pageLength: 10,
      serverSide: true,
      processing: true,
      ajax: {
        url: $site_url+'ajax/mylog.php'
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
  });
</script>
<?php
/* footer include file=========================================*/
require 'layout/footer.php';

if(isset($_SESSION[ss().'msg'])){
  unset($_SESSION[ss().'msg']);
}