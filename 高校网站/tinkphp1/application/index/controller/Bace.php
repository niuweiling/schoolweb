<?php


namespace app\index\controller;


use think\Controller;
use think\Db;

class Bace extends Controller
{
	public function  _initialize()
	{
		parent::_initialize();

		$nav=Db::table('nav')->order('nsort','asc')->select();
		$this->assign('nav',$nav);

		$news=Db::table('news')->order('id','asc')->select();
		$this->assign('news',$news);

		$yueonlin=Db::table('yue')->order('yid','asc')->select();
		$this->assign('yueonlin',$yueonlin);

//		$navname=Db::table('nav')->order('nsort','asc')->select();
//		$this->assign('navname',$navname);

		$catename=Db::table('category')->order('id','asc')->select();
		$this->assign('catename',$catename);

		$goods=Db::table('goods')->order('id','asc')->select();
		$this->assign('goods',$goods);

	}
}