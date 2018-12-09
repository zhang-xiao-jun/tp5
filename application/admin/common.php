<?php

/**
 * admin-common-001
 * @param $data
 */
function get_prints_r($data,$type = 1)
{
    echo "<pre>";print_r($data);echo "<pre/>";
    if($type == 1){
        die();
    }
}