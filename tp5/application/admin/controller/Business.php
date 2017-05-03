<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Up;
use app\admin\controller\Entrance;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
class Business extends Entrance{
	public function index(){
		$Db=Db::table('ph_business');
		$data=$Db->join('ph_business_type','ph_business.ptypeId=ph_business_type.ptypeId')->order('pbusinessId')->paginate(5);
		return view('index',['data'=>$data]);
	}

	//添加
	public function businessAdd(){
		$type=Db::table('ph_business_type')->select();
		return view('businessadd',['type'=>$type]);
	}

	//接受添加的参数
	public function getAdd(){
		$data =$_POST;
		$filePath = $_FILES['image']['tmp_name'];
		$name=$_FILES['image']['name'];
		$fileName = substr($name,0,strpos($name,"."));
		$model=new Up;
		$data['pbusinessImg']=$model->up($fileName,$filePath);
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
		$type=Db::table('ph_business_type')->select();
		return view('businessupdate',['info'=>$info,'type'=>$type]);
	}

	//接受修改的参数
	public function getUpdate(){
		$data =$_POST;
		$id=$data['pbusinessId'];
		unset($data['pbusinessId']);
		$file=$_FILES['image'];
		if($file['error']===0)
		{
			$filePath = $file['tmp_name'];
			$name=$file['name'];
			$fileName = substr($name,0,strpos($name,"."));
			$model=new Up;
			$data['pbusinessImg']=$model->up($fileName,$filePath);
		}	 
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