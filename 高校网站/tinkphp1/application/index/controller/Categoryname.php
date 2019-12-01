<?php


namespace app\index\controller;


use think\Collection;

class Categoryname extends Collection
{
	public function index (){
		$id=$this->request->get('id');
		$catename=Db::table('category')->where('id',$id)->select();
		$this->assign('id',$catename['id']);
		$cname=$catename['cname'];
		$this->assign('cname',$catename['cname']);



	}
}