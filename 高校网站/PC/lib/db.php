<?php
//连接数据库
$mysql=new mysqli('localhost','root','','huadian','3306');
if ($mysql->connect_errno) {
	echo "登录失败: " .$mysql->connect_errno;
	exit();
}
$mysql->query('set names utf8');