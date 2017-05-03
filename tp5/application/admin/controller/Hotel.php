<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\controller\Entrance;
class Hotel extends Entrance{
	public function hotel(){
        $list = Db::name('hotel')->paginate(5);
        $page = $list->render();//传分页
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
	}
    //增加
    public function hotel_add(){
        if($_POST){
            //print_r($_POST);die;
            $name1=$_FILES["hotel_img1"]["name"];
            $name2=$_FILES["hotel_img2"]["name"];
            $name3=$_FILES["hotel_img3"]["name"];
            $name4=$_FILES["hotel_img4"]["name"];
            move_uploaded_file($_FILES["hotel_img1"]["tmp_name"],'img/user/'.$name1);
            move_uploaded_file($_FILES["hotel_img2"]["tmp_name"],'img/user/'.$name2);
            move_uploaded_file($_FILES["hotel_img3"]["tmp_name"],'img/user/'.$name3);
            move_uploaded_file($_FILES["hotel_img4"]["tmp_name"],'img/user/'.$name4);
            $_POST['hotel_img1']=$name1;
            $_POST['hotel_img2']=$name2;
            $_POST['hotel_img3']=$name3;
            $_POST['hotel_img4']=$name4;
            $arr=Db::table('hotel')->insert($_POST);
            if($arr){
                $this->redirect('hotel/hotel');
            }
        }else{
            return view('hotel_add');
        }
    }
    //传修改页面
    public function hotel_update(){
        $id=$_GET['id'];
        $arr=Db::table('hotel')->where("id=$id")->select();
        return view('hotel_update',array('list'=>$arr));
    }
    //修改内容
    public function hotel_update_do(){
        $id=$_GET['id'];
        Db::table('hotel')->where("id=$id")->update($_POST);
        $this->redirect('hotel/hotel');
    }
    //删除
    public function hotel_del(){
        $id=$_GET['id'];
        Db::table('hotel')->where("id=$id")->delete();
        $this->redirect('hotel/hotel');
    }
    //搜索
    public function hotel_search(){
        $hotel_name=isset($_GET['hotel_name'])?$_GET['hotel_name']:"";
        $hotel_address=isset($_GET['hotel_address'])?$_GET['hotel_address']:"";

//        print_r($hotel_name);
//        print_r($hotel_address);
        $where[]='1=1';
        if(!empty($hotel_name)){
            $where[]= " hotel_name = '$hotel_name'";
        }
        if(!empty($hotel_address)){
            $where[]=" hotel_address like '%$hotel_address%'";
        }
        $res=implode(' AND ',$where);
        $list = Db::name('hotel')->where($res)->paginate(5);
        $page = $list->render();//传分页

        $wheres= "?hotel_name=".$hotel_name."&hotel_address=".$hotel_address."&";
        $page =  str_replace("?",$wheres,$page);
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch('hotel');
    }


}