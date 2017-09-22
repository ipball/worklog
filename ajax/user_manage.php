<?php
session_start();
/* include helper & setting ================================== */
require '../setting.php';
require '../database.php';

/* check permission ========================================== */
/* 1=USER, 2=ADMIN */
check_permission(2);

/* code php here!============================================= */
$order_index = $_GET['order'][0]['column'];
$page_size = $_GET['length'];
$start = $_GET['start'];
$draw = $_GET['draw'];
$keyword = trim($_GET['search']['value']);
$column = $_GET['columns'][$order_index]['data'];
$dir = $_GET['order'][0]['dir'];


$query = "select * from users ";
$result_all = $db->query($query);
$count = $result_all->num_rows;


$query .= "where username like '%{$keyword}%' or fullname like '%{$keyword}%' or user_type like '%{$keyword}%' ";
$query .= "order by {$column} {$dir} ";

$result_filter = $db->query($query);
$filter = $result_filter->num_rows;

$query .= "limit {$start},{$page_size} ";
$result = $db->query($query);


$item = array();
while($row = $result->fetch_assoc()){
	$item[] = $row;
}
$data = array('draw'=>$draw,'recordsTotal'=>$count,'recordsFiltered'=>$filter,'data'=>$item,'error'=>'');
exit(json_encode($data));