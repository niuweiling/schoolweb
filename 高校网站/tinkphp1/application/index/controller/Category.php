<?php


namespace app\index\controller;


use app\index\controller\Bace;
use think\Db;

class Category extends Bace
{
    public function index(){
	$cid=$this->request->get('id');

	$currentnav=Db::table('nav')->where('id',$cid)->find();
	$nname=$currentnav['nname'];
	 $ename=$currentnav['ename'];
	$this->assign('cid',$currentnav['id']);
	 $this->assign('nname',$currentnav['nname']);
	 $this->assign('ename',$currentnav['ename']);
	 $tpl=$currentnav['ntpl'];
      $this->assign('title',$currentnav['nname']);

	    $news=Db::table('news')->select();
	    $this->assign('news',$news);
	    $id=$this->request->get('id');
	    $currentnews=Db::table('news')->where('id',$id)->find();
    switch ($tpl) {
	    case 'center':
		    $cate = [['id'=>0,'cname'=>'全部']];
		    $cate1 = Db::table('category')->select();
		    $cate = array_merge($cate,$cate1);
		    $all = Db::table('goods')->select();

		    $len = count($cate);
		    for($i=0;$i<$len;$i++){
			    $items = $cate[$i];
			    $id = $items['id'];
			    if($i == 0){
				    $cate[$i]['goods'] = $all;
				    continue;
			    }
			    $cate[$i]['goods'] = array_filter($all,function($v) use($id){
				    return  $v['id'] == $id;
			    });
		    }
		    $this->assign('cate',$cate);


		    break;


	    case 'news':
		    Db::table()->find();
		    break;

	    case 'yue':
		    Db::table()->find();
		    break;
	    case 'xinwenzixun':
		    $news=Db::table('news')->select();
		    $this->assign('news',$news);
		    $id=$this->request->get('id');
		    $currentnews=Db::table('news')->where('id',$id)->find();
		    break;
    }


    return $this->fetch($tpl);
}


	public function news(){
		$news=Db::table('news')->select();
		$this->assign('news',$news);
//			$id=$this->request->get('cid');

		$id=$this->request->get('id');
		$currentnav=Db::table('nav')->where('id',$id)->find();
		$tpl=$currentnav['ntpl'];
		$this->assign('cid',$currentnav['id']);
		$this->assign('title',$currentnav['nname']);
		$this->assign('ename',$currentnav['ename']);


		$currentgoods=Db::table('news')->where('id',$id)->find();
		$this->assign('id',$id);
		$this->assign('type',$currentgoods['type']);

		$up=Db::table('news')->where('id','<',$id)->order('id','desc')->limit(0,1)->find();
		$down=Db::table('news')->where('id','>',$id)->order('id','asc')->limit(0,1)->find();

		$this->assign('up',$up);
		$this->assign('down',$down);
		return $this->fetch();

//		$goods=Db::table('goods')->select();
//		$this->assign('goods',$goods);
//		$cid=$this->request->get('id');
//		$currentnav=Db::table('nav')->where('id',$cid)->find();
//		$tpl=$currentnav['ntpl'];
//		$this->assign('id',$currentnav['id']);
//		$this->assign('title',$currentnav['nname']);
//		$this->assign('ename',$currentnav['ename']);
//
//		$id=$this->request->get('id');
//		$currentnews=Db::select('news')->where('id',$id)->find();
//		$up=Db::table('news')->where('id','<',$id)->order('id','desc')->limit(0,1)->find();
//		$down=Db::table('news')->where('id','>',$id)->order('id','asc')->limit(0,1)->find();
//		$this->assign('currentnews',$currentnews);
//		$this->assign('up',$up);
//		$this->assign('down',$down);


//		return $this->fetch();
	}

	public function item(){
		$goods=Db::table('goods')->select();
		$this->assign('goods',$goods);
		$id=$this->request->get('cid');
		$currentnav=Db::table('nav')->where('id',$id)->find();
		$tpl=$currentnav['ntpl'];
		$this->assign('cid',$currentnav['id']);
		$this->assign('title',$currentnav['nname']);
		$this->assign('ename',$currentnav['ename']);

		$id=$this->request->get('id');
		$currentgoods=Db::table('goods')->where('id',$id)->find();
		$this->assign('gname',$currentgoods['gname']);
		$this->assign('mprice',$currentgoods['mprice']);
		$this->assign('sale',$currentgoods['sale']);
		$this->assign('stock',$currentgoods['stock']);
		$this->assign('detail',$currentgoods['detail']);
		$all=explode(',',$currentgoods['banner']);
//			$this->assign('currentgoods',$currentgoods);
		$this->assign('all',$all);
//		$this->assign('banner',$currentgoods['banner']);
//		$this->assign('arr',explode(',',$currentgoods['banner']));

		$up=Db::table('goods')->where('id','<','$id')->order('id','desc')->limit(0,1)->find();
		$down=Db::table('goods')->where('id','>','$id')->order('id','asc')->limit(0,1)->find();
//		$this->assign('currentnews',$currentgoods);
		$this->assign('up',$up);
		$this->assign('down',$down);

		return $this->fetch();
	}

}