<?php
session_start();
/* include helper & setting ================================== */
require 'setting.php';

/* check permission ========================================== */
/* 1=USER, 2=ADMIN */
check_permission(2);

/* code php here!============================================= */


/* header include file=========================================*/
require 'layout/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ระบบจัดการข้อมูลผู้ใช้งาน
      <small>เพิ่ม แก้ไข และลบ</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('work/categorie'); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">จัดการผู้ใช้งาน</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!--กล่องข้อความ-->

    <!-- ปุ่ม -->
    <div style="margin-bottom:10px;">
      <a href="<?php echo site_url('user_action.php?do=add'); ?>" class="btn btn-primary" role="button">เพิ่มข้อมูล</a>
    </div>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">ตารางข้อมูล</h3>
      </div>
      <div class="box-body">
        <table id="table_id" class="display table table-striped table-bordered">
          <thead>
            <tr>
              <th>Username</th>
              <th>Full name</th>
              <th>TYPE</th>
              <th>Status</th>
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
        url: $site_url+'ajax/user_manage.php'
      },
      'columns':[
      { data: 'username' },
      { data: 'fullname' },
      { data: 'user_type', },
      {
        data: 'state',
        sClass: 'text-center',
        render: function(data, type, row)
        {
          return (data==1) ? '<span class="fa fa-check"></span>' : '<span class="fa fa-ban"></span>'
        }
      },
      { 
        data: 'id',
        sClass: 'text-center',
        render: function(data, type, row)
        {
          var btnEdit = '<a class="btn btn-xs btn-warning" href="' + $site_url + 'user_action.php?do=edit&id=' + data + '"><i class="fa fa-edit"></i> Edit </a>';
          var dataLink = 'data-link="'+$site_url+'user_delete.php?id='+data+'" ';
          var dataName = 'data-name="'+row['username']+'" ';
          var btnDel = '<a class="btn btn-xs btn-danger btn-delete" '+ dataLink+dataName +' href="#" role="button"><i class="fa fa-close"></i> Delete </a>';
          return btnEdit + ' ' + btnDel;
        }
      }
      ]
    });

    $('body').on('click','.btn-delete',function(e){
     e.preventDefault();

     var name = $(this).attr('data-name');
     var deleteLink = $(this).attr('data-link');
     name = 'ต้องการลบ ' + name;
     var callback = function(){
      setTimeout(function(){
        location.replace(deleteLink);
      },100);
    };

    confirmBox(name,callback);
  });
  });
</script>
<?php
/* footer include file=========================================*/
require 'layout/footer.php';

if(isset($_SESSION[ss().'msg'])){
  unset($_SESSION[ss().'msg']);
}