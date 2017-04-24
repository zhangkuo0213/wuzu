<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\controller\Entrance;

class Miyueroom extends Entrance{

    //展示
    public function show(){
        $id = $_GET['id'];
        $list = Db::table('wedding_miyue')
            ->alias('a')
            ->join("wedding_roomstyle r","a.miyue_id=r.miyue_id")
            ->where("a.miyue_id=$id")
            ->select();
        // 模板变量赋值
        //var_dump($list);die;
        $this->assign('id', $id);
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch('roomstyle_show');   
    }
     //添加页
    public function add(){
        $id = $_GET['id'];
        //var_dump($id);die;
        $this->assign('id', $id);
        return view('roomstyle_add');
    }
     //执行添加
    public function add_do(){
        $data = $_POST;
        $res = Db::table('wedding_roomstyle')->insert($data);
        $this->redirect('miyue/show');
    }
     //删除
    public function del(){
        $id=$_GET['id'];
        Db::table('wedding_roomstyle')->where("roomstyle_id=$id")->delete();
        $this->redirect('miyue/show');
    }
    //传修改页面
    public function update(){
        $id=$_GET['id'];
        $arr=Db::table('wedding_roomstyle')->where("roomstyle_id=$id")->select();
        $this->assign('id',$id);
        $this->assign('list',$arr);
        return view('roomstyle_update');
    }
    //修改内容
    public function update_do(){
        $id = $_POST['roomstyle_id'];
        Db::table('wedding_roomstyle')->where("roomstyle_id=$id")->update($_POST);
        $this->redirect('miyue/show');
    }
}