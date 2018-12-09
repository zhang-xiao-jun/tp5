<?php

namespace app\admin\model;

use think\Model;

class Category extends Model
{
    public function add ($data)
    {
        $data['status'] = 1;
        return $this
                ->table('o2o_category')
                ->insertGetId($data);
    }

    public function index ($pid = 0)
    {
        $map = [
            'status'=>1,
            'parent_id'=>$pid
        ];
        $order = ['id' =>'desc'];

        //paginate() tp5 内置分页 参数为每页显示的条数
        $res = $this->where($map)
                ->order($order)
                ->paginate(2);
        return $res;
    }

    public function add_show ()
    {
        $map = [
          'parent_id'=>0
        ];
        $order = ['listorder asc'];
        return $this->where($map)
                ->order($order)
                ->select();
    }
}
