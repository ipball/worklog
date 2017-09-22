<?php
session_start();
/* include helper & setting ================================== */
require 'setting.php';
require 'database.php';

/* check permission ========================================== */
/* 1=USER, 2=ADMIN */
check_permission(2);

/* code php here!============================================= */
$id = isset($_GET['id']) ? $_GET['id'] : '';
if(!empty($id)){
	$query = "delete from users where id='{$id}'";
	$db->query($query);	

	header('location:user_manage.php');
}
