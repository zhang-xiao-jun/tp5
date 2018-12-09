<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\validate\Category as CategoryValidate;

class Category extends Controller
{

    private $obj;

    public function initialize()
    {
        $this->obj = model('Category');
    }

    /**
     * admin-controller-category-0001
     * 首页
     *
     * @return \think\Responses
     */
    public function index()
    {
        //input 三个参数 值 默认值 类型
        $pid = input('parent_id',0,'intval');
        $data = $this->obj->index($pid);

        $p = new \page\Page($data,10);


        $this->assign([
           'data'=>$data,
            'page'=>$p
        ]);
        return $this->fetch();
    }

    /**
     * admin-controller-category-0002
     * 新增
     *
     * @return \think\Response
     */
    public function add ()
    {
        $data = $this->obj->add_show();
        $this->assign([
            'data'=>$data,
            'cate_type'=>10
        ]);
        return $this->fetch();
    }

    /**
     * admin-controller-category-0003
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save()
    {
        $data = input('post.');
        $validate = new CategoryValidate;
        if(!$validate->scene('add')->check($data)) {
            $this->error($validate->getError());
        }

        //把数据提交给model层处理
        $result = $this->obj->add($data);

        if($result >= 1){
            return $this->success('添加成功');
        } else {
            return $this->error('添加失败');
        }
    }



    /**
     * admin-controller-category-0004
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id = 0)
    {

        if(intval($id) < 1) {
            $this->error('参数不合法');
        }

        $data = $this->obj->get_one_info($id);

        $this->assign([
            'data'=>$data,
            'cate_type'=>20
        ]);

        $this->fetch('category/add');


    }

    /**
     * admin-controller-category-0005
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * admin-controller-category-0006
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id = 0)
    {
        if(intval($id) < 1) {
            $this->error('参数不合法');
        }
        $res = $this->obj->dels($id);

        if($res){
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }

    }
}
