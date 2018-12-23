<?php
namespace app\admin\controller;

use think\Controller;
use lib\map\Map;
use think\facade\Config;

class Index extends Controller
{
    public function index()
    {
        $map_config = Config::get('config.baidu_map');

        $map = new Map($map_config['ak']);

        $address = '北京市海淀区上地十街10号';

        $result = $map->get_static_img($address,8,400,200);

        $this->assign([
            'src'=>$result
        ]);
      /*  get_prints_r($data->result->location);die();

        get_prints_r($data_arr,1);*/

      return $this->fetch();
    }

    public function welcome()
    {

        return "欢迎来到o2o首页";
    }
}
