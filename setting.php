<?php
function site_url($value=''){
	return 'http://localhost/worklog/'.$value;
}

function ss(){
	return 'sess_worklog';
}

function link_tag($value){
	return '<link href="'.site_url().$value.'" rel="stylesheet" type="text/css" />';
}

function salt_pass($password){
	return sha1('my_salt'.$password);
}
/*check admin/user permission */
function check_permission($value){
	switch ($_SESSION[ss().'user_type']) {
		case 'ADMIN':
		$level = 2;
		break;
		case 'USER':
		$level = 1;
		break;
		default:
		$level = 0;
		break;
	}

	if($level < $value){
		header('location:noaccess.php');
		exit();
	}
}

/* get ip client */
function get_client_ip() {
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if(isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

function get_select($option, $value){
	if($option == $value){
		$data = 'selected';
	}else{
		$data = '';
	}

	return $data;
}

function get_checkbox($value){
	if($value == 1){
		$data = 'checked';
	}else{
		$data = '';
	}
	return $data;
}