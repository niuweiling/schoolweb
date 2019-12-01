<?php
//展示页面   获取数据
require '../lib/db.php';
$id=$_POST['id'];
$sql = "delete from nav where id='$id'";

$res = $mysql->query($sql);
if ($mysql->affected_rows > 0) {
	echo json_encode([
		'code' => 200,
		'msg' => '删除成功'
	]);
	exit();
} else {
	echo json_encode([
		'code' => 404,
		'msg' => '删除失败'
	]);
}


