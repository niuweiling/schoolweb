<?php
	require '../lib/db.php';
	$sql="select * from cate order by cid asc";
	$res=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
	$method=$_SERVER['REQUEST_METHOD'];
	
	if($method==='GET'){
		require "../view/admin/onlineinsert.html";
	}
	else{
		$arr=$_POST;
		include "../lib/common.php";
//		date_default_timezone_set('PRC');
//		$arr['create_time']=date('Y-m-d h:i:s');
		$keys=joinkeys($arr);
		$values=joinvalues($arr);
		$sql="insert into online ($keys) values ($values)";
		$mysql->query($sql);
		if($mysql->affected_rows){
			echo json_encode([
				'code'=>200,
				'msg'=>'插入成功'
			]);
			exit();
		}else{
			echo json_encode([
				'code'=>404,
				'msg'=>'插入失败'
			]);
		}
		
		
	}