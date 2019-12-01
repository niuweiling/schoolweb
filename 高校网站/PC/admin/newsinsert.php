<?php
$method=$_SERVER['REQUEST_METHOD'];
if ($method==='GET'){
	require '../view/admin/newsinsert.html';

}else{
	require '../lib/common.php';
	$data=$_POST;


	$mysql=new mysqli('localhost','root','','hunsha','3306');
	if ($mysql->connect_errno){
		echo ("数据库连接失败".$mysql->connect_errno);
//  	exit();
	}
	$mysql->query("set names utf8");

	$keys=joinKeys($data);
	$value=joinValues($data);
	$sql="insert into news ($keys) values ($value)";

	$mysql->query($sql);
	if ($mysql->affected_rows>0){
		echo json_encode([
			'code'=>200,
			'msg'=>'插入成功'
		]);
	}else{
		echo json_encode([
			'code'=>404,
			'msg'=>'插入失败'
		]);
	}
}