<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo isset($data->title) ? $data->title : 'ระบบจัดการข้อมูล'; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php echo link_tag('media/css/bootstrap.min.css'); ?>
  <!-- datatables css -->
  <?php echo link_tag('media/plugins/datatables/dataTables.bootstrap.css'); ?>
  <!-- iCheck css -->
  <?php echo link_tag('media/plugins/iCheck/skins/square/blue.css'); ?>
  <!-- sweetAlert2 -->
  <?php echo link_tag('media/css/sweetalert2.min.css'); ?>
  <!-- Font Awesome -->
  <?php echo link_tag('media/css/font-awesome.min.css'); ?>
  <!-- Ionicons -->
  <?php echo link_tag('media/css/ionicons.min.css'); ?>
  <!-- Theme style -->
  <?php echo link_tag('media/css/AdminLTE.min.css'); ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <?php echo link_tag('media/css/skins/_all-skins.min.css'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- jQuery 2.2.3 -->
<script src="<?php echo site_url(); ?>media/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo site_url(); ?>media/js/bootstrap.min.js"></script>
<script src="<?php echo site_url(); ?>media/js/jquery.slimscroll.min.js"></script>
<!-- datatables js -->
<script src="<?php echo site_url(); ?>media/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url(); ?>media/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- iCheck script -->
<script src="<?php echo site_url(); ?>media/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo site_url(); ?>media/js/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url(); ?>media/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url(); ?>media/js/demo.js"></script>
<!-- serialize convert to json format-->
<script src="<?php echo site_url(); ?>media/js/jquery.serializejson.min.js"></script>
<!-- sweetAlert2 -->
<script src="<?php echo site_url(); ?>media/js/sweetalert2.min.js"></script>
<!-- custom script -->
<script src="<?php echo site_url(); ?>media/js/script.js"></script>
<script type="text/javascript">
  /* init msg session */
  var $msg = '<?php echo isset($_SESSION[ss().'msg']) ? $_SESSION[ss().'msg'] : ''; ?>';
  var $site_url = '<?php echo site_url(); ?>';
</script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo site_url('work'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>i</b>OFF</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">itOffside</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo site_url(); ?>media/img/avatar5.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo isset($_SESSION[ss().'fullname']) ? $_SESSION[ss().'fullname'] : ''; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">เมนูหลัก</li>
          <li><a href="<?php echo site_url(); ?>"><i class="fa fa-television"></i> <span>หน้าหลัก</span></a></li>
          <li><a href="<?php echo site_url('index2.php'); ?>"><i class="fa fa-television"></i> <span>หน้าหลัก 2</span></a></li>
          <li><a href="<?php echo site_url('user_manage.php'); ?>"><i class="fa fa-users"></i> <span>จัดการผู้ใช้งาน</span></a></li>
          <li><a href="<?php echo site_url('mylog.php'); ?>"><i class="fa fa-random"></i> <span>LOG</span></a></li>
          <li><a href="<?php echo site_url('logout.php'); ?>"><i class="fa fa-unlock-alt"></i> <span>ออกจากระบบ</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
