<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\controller\Entrance;
class Package extends Entrance{
	public function package(){
        $id=$_GET['id'];
        $list =Db::table('hotel')->join('package','hotel.id = package.hotel_id ')->where("hotel_id=$id")->select();
//        $list['hotel_id']=$id;
        $this->assign('list', $list);
        return $this->fetch('package');
	}
    //增加
    public function package_add(){
        $hotel_id=$_GET['hotel_id'];
        $list['hotel_id']=$hotel_id;
        $this->assign('list', $list);
//        print_r($list);die;
        return $this->fetch('package_add');
    }
    public function package_add_do(){
        $hotel_id=$_GET['hotel_id'];
        $_POST['hotel_id']=$hotel_id;
        $arr=Db::table('package')->insert($_POST);
        if($arr){
                $this->redirect('hotel/hotel');
            }
            return view('package_add');
    }
    //传修改页面
    public function package_update(){
        $id=$_GET['id'];
        $arr=Db::table('package')->where("id=$id")->select();
        return view('package_update',array('list'=>$arr));
    }
    //修改内容
    public function package_update_do(){
        $id=$_GET['id'];
        $arr=Db::table('package')->where("id=$id")->update($_POST);
        if($arr){
            $this->redirect('hotel/hotel');
        }else{
           echo "<script>alert('修改失败')</script>";
            exit;
        }
    }
    //删除
    public function package_del(){
        $id=$_GET['id'];
        Db::table('package')->where("id=$id")->delete();
        $this->redirect('hotel/hotel');
    }
}