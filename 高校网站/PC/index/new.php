<?php
//数据  页面html  css  js  img
require '../lib/db.php';
$sql ="select * from nav order by id asc";
$nav = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

$id=$_GET['id'];

$sql="select * from news where id=$id";

$res=$mysql->query($sql)->fetch_assoc();

$prev="select * from news where id<$id order by id desc limit 0,1";
$prevgoods=$mysql->query($prev)->fetch_assoc();
$prevstr="";
if($prevgoods){
	$prevstr="<a href='news.php?id={$prevgoods['id']}'>{$prevgoods['detail']}</a>";
}else{
	$prevstr="<a>没有了。。。</a>";
}

$prev1="select * from news where id>$id order by id asc limit 0,1";
$prevgoods1=$mysql->query($prev1)->fetch_assoc();
$prevstr1="";
if($prevgoods1){
	$prevstr1="<a href='news.php?id={$prevgoods1['id']}'>{$prevgoods1['detail']}</a>";
}else{
	$prevstr1="<a>没有了。。。</a>";
}

require '../view/index/header.html';
require '../view/index/new.html';


//
//$id=$_GET['iid'];
//$aid= "echo $id";
//$aid=substr("$aid",-1);
////var_dump($aid);
////exit();
//$sql1="select * from nav where id='$aid'";
//$nav=$mysql->query($sql1)->fetch_assoc();
//
//$sql="select * from news where iid='$id'";
//$res=$mysql->query($sql)->fetch_assoc();
//$sql2="select * from news where iid<'$id' order by iid desc limit 0,1";
//$res2=$mysql->query($sql2)->fetch_assoc();
//$sql3="select * from news where iid>'$id' order by iid asc limit 0,1";
//$res3=$mysql->query($sql3)->fetch_assoc();
