<?php
	$method=$_SERVER['REQUEST_METHOD'];
	if($method==='GET'){
		include "../view/admin/newinsert.html";
	}
	else{
		include "../lib/common.php";
		$arr=$_POST;
		date_default_timezone_set('PRC');
		$arr['create_time']=date('Y-m-d h:i:s');
		$keys=joinkeys($arr);
		$values=joinvalues($arr);
		require '../lib/db.php';
		$sql="insert into news ($keys) values ($values)";
		$mysql->query($sql);
		if($mysql->affected_rows >0){
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
