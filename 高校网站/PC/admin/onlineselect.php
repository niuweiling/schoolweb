<?php
	//展示页面   获取数据
	require '../lib/db.php';
	$sql = 'select online.*,cate.cname from online left join cate on online.id=cate.cid';
	$res=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
	require '../view/admin/onlineselect.html';
?>