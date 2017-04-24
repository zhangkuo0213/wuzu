<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\admin\controller\Entrance;
class BusinessType extends Entrance{
	public function index(){
		$Db=Db::table('ph_business_type');
		$data=$Db->select();
		return view('index',['data'=>$data]);
	}

	//添加
	public function typeAdd(){
		return view('ptypeadd');
	}

	//接受添加的参数
	public function getAdd(){
		$data =$_POST;
		$Db=Db::table('ph_business_type');
		$re=$Db->insert($data);
		if($re)
		{
			$this->redirect('BusinessType/index');
		}
	}

	//修改
	public function typeUpdate(){
		$id =$_GET['id'];
		$Db=Db::table('ph_business_type');
		$info=$Db->where('ptypeId',"$id")->find();
		return view('ptypeupdate',['info'=>$info]);
	}

	//接受修改的参数
	public function getUpdate(){
		$data =$_POST;
		$id=$data['ptypeId'];
		unset($data['ptypeId']);
		$re=Db::table('ph_business_type')->where('ptypeId',"$id")->update($data);
		if($re)
		{
			$this->redirect('BusinessType/index');
		}
	}

	//删除
	public function typeDelete(){
		$id =$_GET['id'];
		$Db=Db::table('ph_business_type');
		$re=$Db->where('ptypeId',"$id")->delete();
		if($re)
			{
				$this->redirect('BusinessType/index');
			}
	}
}