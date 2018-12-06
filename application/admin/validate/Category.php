<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'name'=>'require|max:25',
        'parent_id'=>'number|between:0,120',
        'status'=>'number|in:-1,0,1',
        'listorder'=>'number'

    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require'=>'分类名称必填',
        'name.max'=>'名称最大长度为25个字符',
        'parent_id.number'=>'分类类型必须为数字',
        'parent_id.between'=>'分类类型的范围必须为0-120',
        'status.number'=>'状态码必须为数字',
        'status.in'=>'状态码必须在-1,0,1之间',
        'listorder'=>'排序必须为数字'
    ];

    //设置验证场景
    protected $scene = [
        'add'=>['name','parent_id'],
        'lostorder'=>['lostorder'],
        'edit'=>['name','parent_id','status','listorder'],
    ];
}
