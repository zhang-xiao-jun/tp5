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
            'parent_id'=>$pid,
            'del_status'=>0
        ];
        $order = ['listorder' =>'asc'];

        //paginate() tp5 内置分页 参数为每页显示的条数
        $res = $this->where($map)
                ->order($order)
                ->column('*','id');;
        return $res;
    }

    public function add_show ()
    {
        $map = [
          'parent_id'=>0,
          'del_status'=>0
        ];
        $order = ['listorder asc'];
        return $this->where($map)
                ->order($order)
                ->select();
    }

    public function get_one_info ($id)
    {
        $map['id'] = $id;
        $data = $this->where($map)
                ->find();
        return $data;
    }

    public function get_cate_info ()
    {
        $map = [
            'del_status'=>0,
            'parent_id'=>0
        ];
        return $this->where($map)
                ->select();
    }

    public function dels($id)
    {
        $map['id'] = $id;
        $data['del_status'] = $id;
        $result = $this->where($map)
                     ->update($data);
        return $result;
    }

    public function update_data ($data)
    {
        /*$where['id'] = $data['edit_id'];
        unset($data['edit_id']);*/

        $result = $this->update($data,['id'=>$data['edit_id']]);
        return $result;
    }

    public function change_status($id,$status)
    {
        $where['id'] = $id;
        if($status == 1){
            $data['status'] = -1;
        } else {
            $data['status'] = 1;
        }

        return $this->where($where)->update($data);
    }

    public function change_sort($id,$val) {
        $where['id'] = $id;
        $data['listorder'] = $val;

        return $this->where($where)->update($data);
    }
}
