<?php

////查看分类页面   插入数据
require '../lib/db.php';

$sql = "select * from category order by id asc";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

require '../view/admin/cateselect.html';

























