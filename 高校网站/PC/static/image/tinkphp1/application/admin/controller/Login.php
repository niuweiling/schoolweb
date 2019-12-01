<?php


namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Login extends Controller
{
	//登录页面  开页面    验证
	public function index(){

		return view();

	}
	public function check(){

		if (!request()->isPost()) {
			return json([
				'code' => 404,
				'msg' => '请求方式错误'
			]);
		}
		$data = input('post.');
		//验证码成功
		if(captcha_check($data['code'])){
			return json([
				'code'=>200,
				'msg'=>'登录成功'
			]);
		}
		$username = $data['username'];
		$password=md5(crypt($data['password'],md5('hunsha')));

		$result = Db::table('manager')->where(['username' => $username, 'password' => $password])->find();
		if ($result){
			Session::set('user',$result);
			return json([
				'code'=>200,
				'msg'=>'登录成功'

			]);


		}else{
			return json([
				'code'=>404,
				'msg'=>'登录失败'
			]);
		}



	}
}