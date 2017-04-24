<?php
/**
 * 登录验证、入口控制器
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
use \think\Url;

class Entrance extends Controller
{
    public function _initialize()
    {
        header("content-type:textml;charset=utf-8;");
        $session_name = Session::has('name');
        if(!$session_name)
        {
            // echo Url::build('admin/login/login');
            // die();
            ?>
            <script>alert('亲！您还没有登录，请先登录！');location.href="<?php   echo Url::build('admin/login/login');?>"</script>;
            <?php
        }
    }
}
