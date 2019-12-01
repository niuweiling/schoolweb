<?php
//展示页面   获取数据
	require '../lib/db.php';
	$arr=$_POST;
	$id=$arr['id'];
	$sql="delete from cate where cid='$id'";
	$mysql->query($sql);
	if($mysql->affected_rows >0){
		echo json_encode([
			'code'=>200,
			'msg'=>'删除成功'
		]);
		exit();
	}else{
		echo json_encode([
			'code'=>404,
			'msg'=>'删除失败'
		]);
	}

?>