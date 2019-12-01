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
	}
}