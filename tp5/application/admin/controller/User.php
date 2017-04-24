<?php
/**
 * 用户管理
 */

namespace app\admin\controller;
use think\Db;
use app\admin\controller\Entrance;
class User extends Entrance{

	//用户添加
    public function user_add()
    {
        if($_POST){
            $user = $_POST['user_openid'];

            $hash = "hash";
            $_POST['user_time'] = time();
            $verification_name = Db::table('user')->where("user_openid='$user'")->find();
            if($verification_name){
                header("content-type:text/html;charset=utf-8");
                echo "<script>alert('亲爱的用户，您的用户名已被使用');window.history.go(-1);</script>";exit;
            }
            $add = Db::table('user')->insert($_POST);
            if($add){
                $this->redirect("user/user_list");
            }
        }else {
            return view('user_add');
        }
    }
    //用户列表
    public function user_list()
    {
        if($_GET){
            $where = "1=1 ";
            $where_page = "?";
            $search = array();
            if(!empty($_GET['user_openid']))
            {
                $user_openid = $_GET['user_openid'];
                $where .= " and user_openid='$user_openid'";
                $search['user_openid'] = $user_openid;
                $where_page .="&user_openid=$user_openid&";
            }
            if(!empty($_GET['user_phone']))
            {
                $user_phone = $_GET['user_phone'];
                $where .= " and user_phone='$user_phone'";
                $search['user_phone'] = $user_phone;
                $where_page .="&user_phone=$user_phone&";
            }
            if(!empty($_GET['user_sex']))
            {
                $user_sex = $_GET['user_sex'];
                $where .= " and user_sex='$user_sex'";
                $search['user_sex'] = $user_sex;
                $where_page .="&user_sex=$user_sex&";
            }
            if(!empty($_GET['user_time1']))
            {
                $time1 = $_GET['user_time1'];
                $user_time1 = strtotime($time1);
                $where .= " and user_time>=$user_time1";
                $search['user_time1'] = $time1;
                $where_page .="&user_time1=$time1&";
            }
            if(!empty($_GET['user_time2']))
            {

                $time2 = $_GET['user_time2'];
                $user_time2 = strtotime($time2);
                $where .= " and user_time<=$user_time2";
                $search['user_time2'] = $time2;
                $where_page .="&user_time2=$time2&";
            }
            $list = Db::table('user')->order("user_id")->where($where)->paginate(5);
            $page = $list->render();

            $page = str_replace("?",$where_page,$page);
            $this->assign('page',$page);
            $this->assign('list',$list);
            $this->assign('search',$search);

            return $this->fetch();
        }
        else {
            $list = Db::table('user')->order("user_id")->paginate(5);
            $this->assign('list', $list);
            return $this->fetch('user_list');
        }
    }
    //用户修改
    public function user_update()
    {
        if($_POST){
            $user_id = $_GET['id'];
            $pwd = $_POST['user_pwd'];
            $hash = "hash";
            $_POST['user_pwd'] = md5($pwd.$hash);
            $_POST['user_time'] = time();

            $update = Db::table('user')->where("user_id=$user_id")->update($_POST);
            if($update){
                $this->redirect("user/user_list");
            }
        }else {
            $id = $_GET['id'];
            $update = Db::table('user')->where("user_id=$id")->find();
            return view('user_update', ['list' => $update]);
        }
    }
    //用户删除
    public function user_delete()
    {
        $id = $_GET['id'];
        $delete = Db::table('user')->where("user_id=$id")->delete();
        if($delete){
            $this->redirect("user/user_list");
        }
    }
}