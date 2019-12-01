<?php

require '../lib/db.php';  //连接数据库
$arr=$_POST;
$type=$arr['type'];
$value=$arr['value'];
$id=$arr['id'];


$sql = "update yue set $type='$value' where yid=$id";

$mysql->query($sql);
if ($mysql->affected_rows > 0) {
	echo json_encode([
		'code' => 200,
		'msg' => '修改成功'
	]);
} else {
	echo json_encode([
		'code' => 404,
		'msg' => '修改失败'
	]);

}
