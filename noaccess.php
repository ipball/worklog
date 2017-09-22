<?php
session_start();
/* include helper & setting ================================== */
require 'setting.php';

/* header include file=========================================*/
require 'layout/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      500 Error Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">500 error</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
   <div class="error-page">
    <h2 class="headline text-red">500</h2>

    <div class="error-content">
      <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

      <p>
        คุณไม่มีสิทธิ์เข้าใช้งาน
        โปรดกลับไปหน้าเดิมของคุณ หรือคุณล๊อกอินเพื่อเข้าหน้านี้ <a href="<?php echo site_url('login.php'); ?>">Login page</a>
      </p>

      <form class="search-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search">

          <div class="input-group-btn">
            <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
            </button>
          </div>
        </div>
        <!-- /.input-group -->
      </form>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- script javascript -->

<?php
/* footer include file=========================================*/
require 'layout/footer.php';