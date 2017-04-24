<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
class Login extends Controller{
    public function _initialize()
    {
        header("content-type:text/html;charset=utf-8");
    }
    //登录页面
	public function login()
    {
		return view('login');
	}
	//登录验证
	public function verification($verify = null)
    {
        //是否post传值
        if(request()->isPost()){
            //验证码判断
//            echo $this->validate($verify,[
//                'captcha|验证码'=>'require|captcha'
//            ]);exit;
//            print_r($a);die;
            if(!captcha_check($verify)){
                echo "<script>alert('亲！验证码错误,请重新填写');window.history.go(-1);</script>";exit;
            }
            $user = $_POST['user'];
            $select_name = Db::table('administrators')->where("administrators_name='$user'")->find();
            //用户名验证
            if(!$select_name){
                echo "<script>alert('亲！此用户不存在');window.history.go(-1);</script>";exit;
            }
            $pwd = $_POST['pwd'];
            $hash = "hash";
            $pwd = md5($pwd.$hash);
            $select_pwd = Db::table('administrators')->where("administrators_name='$user' and administrators_pwd = '$pwd'")->find();
            //密码验证
            if($select_pwd){
                Session::set('name',$user);
                return $this->redirect("index/index");
            }else{
                echo "<script>alert('密码错误，请重新输入！！！');window.history.go(-1);</script>";exit;
            }
        }else{
            echo "<script>alert('非法登录！！！');window.history.go(-1);</script>";exit;
        }
    }

    //管理员退出
    public function sign_out()
    {
        Session::delete("name");
        return $this->redirect("login/login");
    }
}