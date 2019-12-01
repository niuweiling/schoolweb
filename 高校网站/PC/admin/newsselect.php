<?php
//展示页面  获取数据   ----混排
require '../lib/db.php';

$sql="select * from news order by id asc";

$re=$mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

require '../view/admin/newsselect.html';


