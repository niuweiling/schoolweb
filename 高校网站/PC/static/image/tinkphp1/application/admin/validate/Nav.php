<?php


namespace app\admin\validate;


use think\Validate;

class Nav extends Validate
{
	protected $rule=[
		'nname'=>'require',
		'ename'=>'require',
		'nsort'=>'require',
		'ntpl'=>'require',
		'id'=>'number',
		'field'=>'require',
		'value'=>'require'

	];
//	protected $message=[];

	protected $scene=[
		'insert'=>['nname','ename','nsort','ntpl'],
		'delete'=>['id'],
		'update'=>['id','field','value']
	];

}