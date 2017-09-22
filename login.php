<?php
session_start();
require 'setting.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>site | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<?php echo link_tag('media/css/bootstrap.min.css'); ?>
	<!-- Font Awesome -->
	<?php echo link_tag('media/css/font-awesome.min.css'); ?>
	<!-- Ionicons -->
	<?php echo link_tag('media/css/ionicons.min.css'); ?>
	<!-- sweetAlert2 -->
	<?php echo link_tag('media/css/sweetalert2.min.css'); ?>
	<!-- Theme style -->
	<?php echo link_tag('media/css/AdminLTE.min.css'); ?>
	<!-- iCheck -->
	<?php echo link_tag('media/plugins/iCheck/skins/square/blue.css'); ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script type="text/javascript">
	/* init msg session */
	var $msg = '<?php echo isset($_SESSION[ss().'msg']) ? $_SESSION[ss().'msg'] : ''; ?>';
</script>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo site_url(); ?>"><b>Admin login</b>OFF</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form action="<?php echo site_url('login_form.php'); ?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="username" placeholder="Username">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-xs-4 col-xs-offset-8">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<a href="#">I forgot my password</a><br>
			<a href="#" class="text-center">Register a new membership</a>

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="<?php echo site_url(); ?>media/js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo site_url(); ?>media/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?php echo site_url(); ?>media/plugins/iCheck/icheck.min.js"></script>
	<!-- sweetAlert2 -->
	<script src="<?php echo site_url(); ?>media/js/sweetalert2.min.js"></script>
	<!-- custom script -->
	<script src="<?php echo site_url(); ?>media/js/script.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
			if($msg!=''){
				alertBox('ข้อความแจ้งเตือน',$msg,'error');
			}			
		});
	</script>
</body>
</html>
<?php
if(isset($_SESSION[ss().'msg'])){
	unset($_SESSION[ss().'msg']);
}