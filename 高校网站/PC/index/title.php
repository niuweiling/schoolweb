<?php
//	处理头部数据，逻辑，js，静态资源，图片
	require '../lib/db.php';
	$sql="select * from nav order by sort asc ";
	$nav=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
	require '../view/index/title.html';
