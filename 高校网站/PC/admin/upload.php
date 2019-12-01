<?php
$file = $_FILES['file'];
//tmp_name -> uploads/20190927x.png 把图片移到这个位置  php操作目录 动态的创建文件夹  图片名字随机 时间戳+随机数+...
//$movePath = '../uploads';
//// is_dir 是否有这个文件  mkdir 创建文件
///
if(!is_dir('../uploads')){
	mkdir('../uploads');
}
$data=date('Ymd');
if(!is_dir('../uploads'.'/'.$data)){
	mkdir(('../uploads'.'/'.$data));
}
$imgname=time().mt_rand(0,10000);
$ext=substr($file['type'],6);
$imgname.='.'.$ext;
$movepath='../uploads/'.$data.'/'.$imgname;
//echo $movepath;
$webpath='/hunsha/uploads'.'/'.$data.'/'.$imgname;
$result=move_uploaded_file($file['tmp_name'],$movepath);
if($result){
	echo json_encode([
		'code'=>200,
		'msg'=>'图片上传成功',
		'src'=>$webpath
	]);
}else{
	echo json_encode([
		'code'=>404,
		'msg'=>'图片上传失败',
		'src'=>'文件路径错误'
	]);
}




