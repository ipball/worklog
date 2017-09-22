<?php
session_start();
/* include helper & setting ================================== */
require 'setting.php';
require 'database.php';

/* check permission ========================================== */
/* 1=USER, 2=ADMIN */
check_permission(2);

/* code php here!============================================= */

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location:index.php');
	exit();
}

$password = salt_pass(trim($_POST['password']));
$state = isset($_POST['state']) ? 1 : 0;

if($_POST['do'] == 'add'){
	$query = "insert into users (username,password,user_type,fullname,state) values ('{$_POST['username']}','{$password}','{$_POST['user_type']}','{$_POST['fullname']}','{$state}')";
}else{
	$xusername = "username='{$_POST['username']}',";
	$xpassword = ($_POST['password'] != '') ? "password='{$password}'," : "";
	$xuser_type = "user_type='{$_POST['user_type']}',";
	$xfullname = "fullname='{$_POST['fullname']}',";
	$xstate = "state='{$state}'";

	$query = "update users set {$xusername} {$xpassword} {$xuser_type} {$xfullname} {$xstate} where id='{$_POST['id']}'";
}

$db->query($query);
header('location:user_manage.php');