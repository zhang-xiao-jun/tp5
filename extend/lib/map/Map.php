<?php
namespace lib\map;

class Map
{
    public $app_key = '';

    public function __construct ($ak)
    {
        $this->app_key = $ak;
    }


    //调用百度地图，根据地址来获取经纬度
    public function get_addr_info ($address)
    {
        $url = 'http://api.map.baidu.com/geocoder/v2/?address='.$address.'&output=json&ak='.$this->app_key;

        $res = $this->curlInfo($url,1);

        return $res;
    }

    //根据经纬度来获取百度地图静态图

    /**
     * @param $center 地址
     * @param $zoom 地图级别
     * @param $width  宽度
     * @param $height 高度
     */
    public function get_static_img ($center,$zoom,$width,$height)
    {
        $url  = 'http://api.map.baidu.com/staticimage/v2';
        $url .= '?ak='.$this->app_key;
        $url .= '&center='.$center;
        $url .= '&zoom='.$zoom;
        $url .= '&width='.$width;
        $url .= '&height='.$height;

        return $url;
    }


    //type 1 get; 2 post;
    public function curlInfo ($url,$type)
    {
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);

        if($type == 2) {
            curl_setopt($ch,CURLOPT_POST,1);
        }

        $output = curl_exec($ch);
        if($output === FALSE ){
            echo "CURL Error:".curl_error($ch);
        }

        curl_close($ch);

        return $output;


    }
}