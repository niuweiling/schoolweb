<?php
//数据  页面html  css  js  img
require '../lib/db.php';
$sql ="select * from nav order by nsort asc";
$nav = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);
require '../view/index/header.html';

