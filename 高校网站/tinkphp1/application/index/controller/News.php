<?php


namespace app\index\controller;


use think\Collection;
use think\Controller;

//class News extends Controller
//{
//	public function index (){
//	$id=$this->request->get('id');
//	$navname=Db::table('news')->where('id',$id)->select();
//	$this->assign('id',$navname['id']);
//	$type=$navname['type'];
//	$time=$navname['time'];
//	$this->assign('nname',$navname['nname']);
//	$this->assign('ename',$navname['ename']);
//	$this->assign('time',$navname['time']);
//
//
//	}
//	public function look(){
//		return view('new');
//	}
//}