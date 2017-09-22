<?php
session_start();
/* include helper & setting ================================== */
require 'setting.php';

/* check permission ========================================== */
/* 1=USER, 2=ADMIN */
check_permission(1);

/* header include file=========================================*/
require 'layout/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      หน้าหลัก 1
      <small>เพิ่ม แก้ไข และลบ</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('work/categorie'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">จัดการหน้าหลัก</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!--กล่องข้อความ-->

    <!-- ปุ่ม -->
    <div style="margin-bottom:10px;">
      <a href="<?php echo site_url('work/categorie/add'); ?>" class="btn btn-primary" role="button">เพิ่มข้อมูล</a>
    </div>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">ตารางข้อมูล</h3>
      </div>
      <div class="box-body">
          
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- script javascript -->

<?php
/* footer include file=========================================*/
require 'layout/footer.php';

if(isset($_SESSION[ss().'msg'])){
  unset($_SESSION[ss().'msg']);
}