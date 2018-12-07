<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function status ($status)
{/*
    switch ($status){
        case 1:
                $str = "<span class='label label-success radius'>启用</span>";
                return $str;
            break;
        case 0:
                $str = "<span class='label label-danger radius'>待审</span>";
                return $str;
            break;

        default:
                $str = "<span class='label label-danger radius'>禁用</span>";
                return $str;
            break;
    }*/

    if($status == 1){
        $str = "<span class='label label-success radius'>启用</span>";
    } elseif($status == 0) {
        $str = "<span class='label label-danger radius'>待审</span>";
    } else {
        $str = "<span class='label label-danger radius'>禁用</span>";
    }

    return $str;
}

function get_print_r($data)
{
    echo "<pre>";print_r($data);echo "<pre/>";
}
