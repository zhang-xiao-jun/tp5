<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\validate\Category as CategoryValidate;

class Category extends Controller
{
    /**
     * 首页
     *
     * @return \think\Response
     */
    public function index()
    {
       $data = model('Category')->index();
       $this->assign([
           'data'=>$data
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
        $result = model('Category')->add($data);

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
