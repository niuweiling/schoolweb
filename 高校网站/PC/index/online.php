<?php
require "../lib/db.php";
include "../lib/common.php";
$arr=$_POST;
$keys=joinKeys($arr);
$values=joinValues($arr);
$sql="insert into yue ($keys) values ($values)";

$mysql->query($sql);
if($mysql->affected_rows>0){
	echo json_encode([
		'code'=>200,
		'msg'=>"插入成功"
	]);
	exit();
}else{
	echo json_encode([
		'code'=>404,
		'msg'=>"插入失败"
	]);
}