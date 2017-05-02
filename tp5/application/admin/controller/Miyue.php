<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\controller\Entrance;

class Miyue extends Entrance{
	
	public function index(){
		return view('miyue');
	}
	//添加
	public function add(){
		$data = $_POST;
		$res = Db::table('wedding_miyue')->insert($data);
		return view('miyue');
	}
	//展示
	public function show(){
		$list = Db::table('wedding_miyue')->paginate(5);
		// 获取分页显示
		$page = $list->render();
		// 模板变量赋值
		$this->assign('list', $list);
		$this->assign('page', $page);
		// 渲染模板输出
		return $this->fetch('miyue_show');
	}

	//搜索展示
	public function miyue_search(){
		$address = isset($_GET['address'])?$_GET['address']:"";
        $hotel_level = isset($_GET['hotel_level'])?$_GET['hotel_level']:"";
        $price1 = isset($_GET['price1'])?$_GET['price1']:"";
        $price2 = isset($_GET['price2'])?$_GET['price2']:"";
        //var_dump($hotel_level);die;

        $where[]='1=1';
        if(!empty($address)){
            $where[]= " address like '%$address%'";
        }
        if(!empty($hotel_level)){
            $where[]=" hotel_level = '$hotel_level'";
        }
        if(!empty($price1)&&!empty($price2)){
            $where[]=" price between '$price1' and '$price2'";
        }
        $res=implode(' AND ',$where);
        $list = Db::table('wedding_miyue')->where($res)->paginate(5);
        $page = $list->render();//传分页

        $wheres= "?address=".$address."&hotel_level=".$hotel_level."&price1=".$price1."&price2=".$price2."&";
        $page =  str_replace("?",$wheres,$page);

        $this->assign('list', $list);
        $this->assign('page', $page);
		// 渲染模板输出
		return $this->fetch('miyue_show');
	}

	 //删除
    public function miyue_del(){
        $id=$_GET['id'];
        Db::table('wedding_miyue')->where("miyue_id=$id")->delete();
        $this->redirect('miyue/show');
 
    }

    //传修改页面
    public function miyue_update(){
        $id=$_GET['id'];
        $arr=Db::table('wedding_miyue')->where("miyue_id=$id")->select();
        return view('miyue_update',array('list'=>$arr));
    }

  //修改内容
    public function miyue_update_do(){
        $id=$_GET['id'];
        //var_dump($_GET);die;
        Db::table('wedding_miyue')->where("miyue_id=$id")->update($_POST);
        $this->redirect('miyue/show');
    }

	//蜜月游详细信息
	public function miyue_info(){
		$id=$_GET['id'];
        $arr=Db::table('wedding_miyue')->where("miyue_id=$id")->select();
        //var_dump($arr);die;
        return view('miyue_info',array('list'=>$arr));
	}
    //签证须知
    public function visa(){
        $id=$_GET['id'];
        $arr=Db::table('wedding_miyue')->where("miyue_id=$id")->select();
        //var_dump($arr);die;
        return view('visa',array('list'=>$arr));
    }
    //费用详情
    public function payexplain(){
        $id=$_GET['id'];
        $arr=Db::table('wedding_miyue')->where("miyue_id=$id")->select();
        //var_dump($arr);die;
        return view('payexplain',array('list'=>$arr));
    }
    //订单须知
    public function reserve(){
        $id=$_GET['id'];
        $arr=Db::table('wedding_miyue')->where("miyue_id=$id")->select();
        //var_dump($arr);die;
        return view('reserve',array('list'=>$arr));
    }


}