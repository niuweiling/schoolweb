<?php
//1、展示登录界面   请求方式GET
//2、验证登录      请求方式POST
$method=$_SERVER['REQUEST_METHOD'];
if($method==='GET'){
	//1、GET
	require '../view/admin/login.html';//引入外部文件
}else{
	//2、验证 POST    用户名 密码
	$username=$_POST['username'];
	$password=md5(crypt($_POST['password'],md5('hunsha')));

	//连接数据库
	$mysql=new mysqli('localhost','root','','hunsha','3306');
	if ($mysql->connect_errno) {
		echo("登录失败: " .$mysql->connect_errno);
		exit();
	}
	$mysql->query('set names utf8');

	$sql="select * from manager where username='$username'";

	$res=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
	if(count($res)){
	    if ($password=$re[0]['password']){
			echo json_encode([
				'code'=>200,
				'msg'=>'登录成功'
			]);
//
	     }

	}else{
		echo json_encode([
			'code'=>404,
			'msg'=>'用户名密码不匹配'
		]);
	}

}
//处理后台业务逻辑
?>

