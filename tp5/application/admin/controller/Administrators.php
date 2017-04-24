<?php
/**
 * 管理员管理
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
use app\admin\controller\Entrance;

class Administrators extends Entrance
{
    //管理员添加
    public function administrators_add()
    {
        if($_POST){
           $user = $_POST['username'];
           $pwd = $_POST['password'];
           $hash = "hash";
           $pwd = md5($pwd.$hash);
           $verification_name = Db::table('administrators')->where("administrators_name='$user'")->find();
           if($verification_name){
               echo "<script>alert('亲爱的用户，您的管理姓名已被使用');window.history.go(-1);</script>";exit;
           }
           $date = ['administrators_name'=>$user,'administrators_pwd'=>$pwd,'administrators_time'=>time()];
           $add = Db::name('administrators')->insert($date);
            if($add){
                 $this->redirect('administrators/administrators_list');
            }
        }else{
            return view('administrators_add');
        }
    }
    //管理员员列表
    public function administrators_list()
    {
        $list = Db::table("administrators")->order("administrators_id")->select();
        return view('administrators_list',['list'=>$list]);
    }
    //管理员删除
    public function administrators_delete()
    {
        $id = $_GET['id'];
        $delete = Db::table('administrators')->where("administrators_id=$id")->delete();
        if($delete){
            $this->redirect('administrators/administrators_list');
        }
    }

}