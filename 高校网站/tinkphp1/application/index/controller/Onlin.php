<?php


namespace app\index\controller;


use think\Collection;

class Onlin extends Collection
{
	public function index (){
		$yid=$this->request->get('yid');
		$yuename=Db::table('yue')->where('yid',$yid)->select();
		$server=$yuename['server'];
		$data=$yuename['data'];
		$name=$yuename['name'];
		$sex=$yuename['sex'];
		$phone=$yuename['phone'];
		$introduce=$yuename['introduce'];
		$captcha=$yuename['captcha'];
		$this->assign('yid',$yuename['yid']);
		$this->assign('name',$yuename['name']);
		$this->assign('server',$yuename['server']);
		$this->assign('sex',$yuename['sex']);
		$this->assign('phone',$yuename['phone']);
		$this->assign('introduce',$yuename['introduce']);
		$this->assign('data',$yuename['data']);
		$this->assign('captcha',$yuename['captcha']);

		return view('news');

	}
}