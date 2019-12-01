<?php
//展示页面   获取数据
	require '../lib/db.php';
	$arr=$_POST;
	$id=$arr['id'];
	$key=$arr['key'];
	$value=$arr['value'];
	require '../lib/common.php';
	$sql="update cate set $key='$value' where cid='$id'";
	$mysql->query($sql);
	if($mysql->affected_rows >0){
		echo json_encode([
			'code'=>200,
			'msg'=>'数据更新成功'
		]);
		exit();
	}else{
		echo json_encode([
			'code'=>404,
			'msg'=>'数据更新失败'
		]);
	}

?>