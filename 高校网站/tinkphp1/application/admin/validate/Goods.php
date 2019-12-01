<?php


namespace app\admin\validate;



use think\Validate;

class Goods extends Validate
{
	protected $rule=[
		'gname'=>'require',
		'mprice'=>'require',
		'sale'=>'require',
		'stock'=>'require',
		'thumb'=>'require',
		'banner'=>'require',
		'detail'=>'require',
		'id'=>'number',
		'field'=>'require',
		'value'=>'require'

	];
//	protected $message=[];

	protected $scene=[
		'insert'=>['gname','mprice','sale','stock','thumb','banner','detail'],
		'delete'=>['id'],
		'update'=>['id','field','value']
	];
}