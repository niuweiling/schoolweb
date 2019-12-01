<?php


namespace app\admin\controller;


class Upload
{//图片上传
	public function index(){
		$file=request()->file('file');
		if ($file){
			$info=$file->validate(['size'=>200*1024,'ext'=>'png,jpg,jpeg,webp,gif'])
				->move(ROOT_PATH.'public' . DS . 'uploads');
			if($info){ // 成功上传后 获取上传信息 // 输出 jpg

				$src=UPLOAD_PATH.$info->getSaveName();
				return json([
					'code'=>0,
					'msg'=>'上传成功',
					'data'=>['src'=>$src]
				]);
			}else{// 上传失败获取错误信息
				return json([
					'code'=>1,
					'msg'=>'上传失败',
					'data'=>$file->getError()
				]);
			}
		}
	}
}