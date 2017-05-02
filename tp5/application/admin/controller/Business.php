<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Upload;
use app\admin\controller\Entrance;
class Business extends Entrance{
	public function index(){
		$Db=Db::table('ph_business');
		$data=$Db->select();
		return view('index',['data'=>$data]);
	}

	//添加
	public function businessAdd(){
		return view('businessadd');
	}

	//接受添加的参数
	public function getAdd(){
		$data =$_POST;
		$file = request()->file('image');
		$update=new Upload();
		$path=$update->upload($file); 
		$data['pbusinessImg']=$path; 
		$Db=Db::table('ph_business');
		$re=$Db->insert($data);
		if($re)
		{
			$this->redirect('Business/index');
		}
	}

	//修改
	public function businessUpdate(){
		$id =$_GET['id'];
		$Db=Db::table('ph_business');
		$info=$Db->where('pbusinessId',"$id")->find();
		return view('businessupdate',['info'=>$info]);
	}

	//接受修改的参数
	public function getUpdate(){
		$data =$_POST;
		$id=$data['pbusinessId'];
		unset($data['pbusinessId']);
		$file = request()->file('image'); 
		$update=new Upload();
		$path=$update->upload($file); 
		$data['pbusinessImg']=$path; 
		$re=Db::table('ph_business')->where('pbusinessId',"$id")->update($data);
		if($re)
		{
			$this->redirect('Business/index');
		}	
	}

	//删除
	public function businessDelete(){
		$id =$_GET['id'];
		$Db=Db::table('ph_business');
		$re=$Db->where('pbusinessId',"$id")->delete();
		if($re)
			{
				$this->redirect('Business/index');
			}
	}
}