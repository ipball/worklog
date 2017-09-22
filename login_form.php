<?php
session_start();
require 'setting.php';
require 'database.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location:login.php');
	exit();
}
$username = $_POST['username'];
$password = salt_pass($_POST['password']);
$query = "select * from users where username='{$username}' ";
$result_user = $db->query($query);

$user_type = 'USER';
$fullname = 'Unknow';
$user_id = 0;
$site = '';
if($result_user->num_rows > 0){
	$query2 = $query . " AND password='{$password}' ";
	$result = $db->query($query2);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$_SESSION[ss().'user_id'] = $row['id'];
		$_SESSION[ss().'username'] = $row['username'];
		$_SESSION[ss().'fullname'] = $row['fullname'];
		$_SESSION[ss().'user_type'] = $row['user_type'];
		$user_type = $row['user_type'];
		$action = 'Login success';
		$fullname = $row['fullname'];
		$user_id = $row['id'];

		$site = 'location:index.php';
	}else{
		$_SESSION[ss().'msg'] = 'รหัสผ่านไม่ถูกต้อง!';
		$action = 'Wrong password!';

		$site = 'location:login.php';
	}

}else{
	$_SESSION[ss().'msg'] = 'ชื่อผู้ใช้ไม่ถูกต้อง!';
	$action = 'Wrong username!';

	$site = 'location:login.php';
}

/*insert mylog*/
$ip = get_client_ip();
$current_date = date('Y-m-d H:i:s');

$column = "ip,created,user_type,username,fullname,action,user_id";
$values = "'{$ip}','{$current_date}','{$user_type}','{$username}','{$fullname}','{$action}','{$user_id}'";
$query = "insert into mylog ({$column}) values ({$values})";
$db->query($query);

header($site);