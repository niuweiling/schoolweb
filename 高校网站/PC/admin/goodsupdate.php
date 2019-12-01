<?php
	require '../lib/db.php';
	$method=$_SERVER['REQUEST_METHOD'];
	if($method==='GET'){
		$gid=$_GET['$gid'];
		$sql="select * from goods where gid='$gid'";
		$goods=$mysql->query($sql)->fetch_assoc();
		$sql="select * from cate order by cid asc";
		$res=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
		require "../view/admin/goodsupdate.html";
	}
	else{
		require "../lib/common.php";
		$data=$_POST;
		date_default_timezone_set('PRC');
		$arr['create_time']=date('Y-m-d h:i:s');
		$gid=$data['gid'];
		unset($data['gid']);
		$arr=joinKeyValues($data);
		$sql="update goods set  $arr where gid='$gid'";
		$mysql->query($sql);
//		echo  $sql;
		if($mysql->affected_rows){
			echo json_encode([
				'code'=>200,
				'msg'=>'更新成功'
			]);
			exit();
		}else{
			echo json_encode([
				'code'=>404,
				'msg'=>'更新失败'
			]);
		}
		
		
	}
