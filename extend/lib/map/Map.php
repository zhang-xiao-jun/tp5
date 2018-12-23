<?php
namespace lib\map;

class Map
{
    public $app_key = '';

    public function __construct ()
    {
        $this->app_key = 'yhZzqMNX2orGbHsVcVoo2x2wPIn6rXMP';
    }

    public function get_addr_info ($address)
    {
        $url = 'http://api.map.baidu.com/geocoder/v2/?address='.$address.'&output=json&ak='.$this->app_key.'&callback=showLocation';

        $res = $this->curlInfo($url,1);

        return $res;
    }

    public function curlInfo ($url,$type)
    {
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);

        $output = curl_exec($ch);
        if($output === FALSE ){
            echo "CURL Error:".curl_error($ch);
        }

        curl_close($ch);

        return $output;


    }
}