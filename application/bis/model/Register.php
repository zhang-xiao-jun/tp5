<?php

namespace app\bis\model;

use think\Model;

class Register extends Model
{
    //

    public function get_city ($parent_id)
    {
        $data = $this->table('o2o_area_city')
                        ->field('area_id,area_name')
                        ->where('parent_id','=',$parent_id)
                        ->select();
        return $data;
    }
}
