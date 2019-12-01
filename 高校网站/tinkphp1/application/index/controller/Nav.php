<?php


namespace app\index\controller;


class Nav
{
	public function index (){
		$id=$this->request->get('id');
		$navname=Db::table('nav')->where('id',$id)->select();
		$this->assign('id',$navname['id']);
		$nname=$navname['nname'];
		$ename=$navname['ename'];
		$this->assign('nname',$navname['nname']);
		$this->assign('ename',$navname['ename']);



	}
}