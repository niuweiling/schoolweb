<?php
require '../lib/db.php';
////查看分类页面   插入数据
require '../lib/common.php';
$method=$_SERVER['REQUEST_METHOD'];
if ($method==='GET'){
	$id=$_GET['id'];
	$sql = "select * from goods where id='$id'";
	$goods = $mysql->query($sql)->fetch_assoc();
	$sql="select * from category order by id asc";
	$result=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
	require '../view/admin/goodsbianji.html';
}else {

	$data = $_POST;
	$id = $data['id'];
	unset($data['id']);
    $str=joinKeysValues($data);
	$sql = "update goods set $str where id='$id'";

	$mysql->query($sql);
	$num=$mysql->affected_rows;
	if ($num>0){
		echo json_encode([
			'code'=>200,
			'msg'=>'商品插入成功'
		]);
	}else{
		echo json_encode([
			'code'=>404,
			'msg'=>'商品插入失败'
		]);
	}

}