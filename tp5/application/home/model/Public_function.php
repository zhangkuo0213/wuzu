<?php
/**
 * Created by PhpStorm.
 * User: 公共方法
 * Date: 2017/5/3
 * Time: 15:06
 */
namespace app\home\Model;
class Public_function
{
    //数组过滤
    function filterArray($arr, $filter='strip_tags,htmlspecialchars,trim') {
        if(!is_array($arr)) return false;
        $result = array();
        $filters = explode(',', $filter);
        foreach ($arr as $key => $val) {
            if(is_array($val)){
                $result[$key] = filterArray($val);
            }else{
                foreach($filters as $f) {
                    $val = call_user_func($f, $val);
                }
                $result[$key] = $val;
            }
        }
        return $result;
    }
}