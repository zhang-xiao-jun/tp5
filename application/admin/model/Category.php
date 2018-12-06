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

    public function index ()
    {
        $map = [
            'status'=>1
        ];
        $order = ['id' =>'desc'];

        return $this
                ->where($map)
                ->order($order)
                ->select();
    }
}
