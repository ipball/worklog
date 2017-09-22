<?php
session_start();
/* include helper & setting ================================== */
require 'setting.php';
require 'database.php';

/* check permission ========================================== */
/* 1=USER, 2=ADMIN */
check_permission(2);

/* code php here!============================================= */
$do = isset($_GET['do']) ? $_GET['do'] : '';
if($do == ''){
  header('location:index.php');
  exit();
}

$data = array(
  'id' => '',
  'username' => '',
  'password' => '',
  'fullname' => '',
  'user_type' => 'USER',
  'state' => 1
);

if($do=='edit'){
  $query = "select * from users where id='{$_GET['id']}'";
  $result = $db->query($query);
  $row = $result->fetch_assoc();

  $data['id'] = $row['id'];
  $data['username'] = $row['username'];
  $data['fullname'] = $row['fullname'];
  $data['user_type'] = $row['user_type'];
  $data['state'] = $row['state'];
}

/* rquired password when create page only */
$pass_req = '';
if($do == 'add'){
 $pass_req = 'data-validation="required"';
}

/* header include file=========================================*/
require 'layout/header.php';
?>
<!-- plugin extension push now -->
<?php echo link_tag('media/css/form-validator.css'); ?>
<script src="<?php echo site_url(); ?>media/js/jquery-form-validator.min.js"></script>

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
    <!-- Default box -->
    <form class="form-horizontal" action="<?php echo site_url('user_action_form.php'); ?>" method="post">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
      <input type="hidden" name="do" value="<?php echo $do ?>">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">ตารางข้อมูล</h3>
        </div>
        <div class="box-body">          
          <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" data-validation="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" <?php echo $pass_req; ?> name="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Fullname</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fullname" value="<?php echo $data['fullname']; ?>" data-validation="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">TYPE</label>
            <div class="col-sm-10">
              <select name="user_type" class="form-control">
                <option <?php echo get_select('USER',$data['user_type']); ?> value="USER">USER</option>
                <option <?php echo get_select('ADMIN',$data['user_type']); ?>  value="ADMIN">ADMIN</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <label><input type="checkbox" <?php echo get_checkbox($data['state']); ?> name="state" value="1"> Active</label>
            </div>
          </div>

        </div>
        <div class="box-footer">
          <div class="pull-right">
            <a class="btn btn-default" href="<?php echo site_url('user_manage.php'); ?>" role="button">Cancel</a>
            <button type="submit" class="btn btn-primary btn-save">Save</button>
          </div>        
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- script javascript -->
<script type="text/javascript">
  jQuery(document).ready(function($) {
   $.validate();
   $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%'
  });
 });
</script>
<?php
/* footer include file=========================================*/
require 'layout/footer.php';

if(isset($_SESSION[ss().'msg'])){
  unset($_SESSION[ss().'msg']);
}