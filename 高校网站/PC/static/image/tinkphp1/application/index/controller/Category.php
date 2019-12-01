<?php


namespace app\index\controller;


use app\index\controller\Bace;
use think\Db;

class Category extends Bace
{
    public function index(){
	$cid=$this->request->get('id');
	$currentnav=Db::table('nav')->where('id',$cid)->find();
	$this->assign('cid',$currentnav['id']);
	$tpl=$currentnav['ntpl'];
    $this->assign('title',$currentnav['nname']);


    switch ($tpl) {
	    case 'aboutus':

		    break;

	    case 'news':
		    Db::table()->find();
		    break;

	    case 'yue':
		    Db::table()->find();
		    break;
    }


    return $this->fetch($tpl);
}
}