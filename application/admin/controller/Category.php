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
     * 首页
     *
     * @return \think\Responses
     */
    public function index()
    {
        //input 三个参数 值 默认值 类型
        $pid = input('parent_id',0,'intval');
        $data = $this->obj->index($pid);
        $page = $data->render();

        $this->assign([
           'data'=>$data,
            'page'=>$page
        ]);
        return $this->fetch();
    }

    /**
     * 新增
     *
     * @return \think\Response
     */
    public function add ()
    {
        $data = $this->obj->add_show();
        $this->assign([
            'data'=>$data
        ]);
        return $this->fetch();
    }

    /**
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
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
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
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $id = input('post.id');
        echo $id;

    }
}
