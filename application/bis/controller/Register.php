<?php

namespace app\bis\controller;

use think\Controller;
use think\Request;


class Register extends Controller
{
    private $model = '';

    public function initialize()
    {
        $this->model = model('Register');
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //得到city信息 得到城市信息
        $provice = $this->model->get_city(-1);


        $this->assign([
            'provice'=>$provice
        ]);


        return $this->fetch();
    }


    //得到城市信息
    public function get_city ()
    {
        $provice_id = input('post.provice_id','0','intval');

        if($provice_id <= 0) {
            $this->error('参数不合法');
        }

        $city = $this->model->get_city($provice_id);
        if($city) {
            $this->success('请求成功','',$city);
        } else {
            $this->error('请求失败','');
        }

    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
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
        //
    }
}
