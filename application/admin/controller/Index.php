<?php
namespace app\admin\controller;

use think\Controller;
use lib\map\Map;

class Index extends Controller
{
    public function index()
    {
        $map = new Map();

        $address = '北京市海淀区上地十街10号';

        $data = $map::getLocation($address);
        get_prints_r($data,1);

      return $this->fetch();
    }

    public function welcome()
    {

        return "欢迎来到o2o首页";
    }
}
