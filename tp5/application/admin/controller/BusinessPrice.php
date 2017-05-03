<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Up;
class BusinessPrice extends Controller{
	public function index(){
		$Db=Db::table('ph_business_price');
		$data=$Db->join('ph_business','ph_business_price.pbusinessId=ph_business.pbusinessId')->order('ppriceId')->paginate(5);
		// print_r($data);die;
		return view('index',['data'=>$data]);
	}

	//添加
	public function priceAdd(){
		$Db=Db::table('ph_business');
		$data=$Db->select();
		return view('ppriceadd',['data'=>$data]);
	}

	//接受添加的参数
	public function getAdd(){
		$data =$_POST;
		$filePath = $_FILES['image']['tmp_name'];
		$name=$_FILES['image']['name'];
		$fileName = substr($name,0,strpos($name,"."));
		$model=new Up;
		$data['ppriceImg']=$model->up($fileName,$filePath); 
		$re=Db::table('ph_business_price')->insert($data);
		if($re)
		{
			$this->redirect('BusinessPrice/index');
		}
	}

	//修改
	public function priceUpdate(){
		$id =$_GET['id'];
		$Db=Db::table('ph_business_price');
		$info=$Db->where('ppriceId',"$id")->find();
		$Db=Db::table('ph_business');
		$data=$Db->select();
		return view('ppriceupdate',['info'=>$info,'data'=>$data]);
	}

	//接受修改的参数
	public function getUpdate(){
		$data =$_POST;
		$id=$data['ppriceId'];
		unset($data['ppriceId']);
		$file=$_FILES['image'];
		if($file['error']===0)
		{
			$filePath = $file['tmp_name'];
			$name=$file['name'];
			$fileName = substr($name,0,strpos($name,"."));
			$model=new Up;
			$data['ppriceImg']=$model->up($fileName,$filePath);
		}
		$re=Db::table('ph_business_price')->where('ppriceId',"$id")->update($data);
		if($re)
		{
			$this->redirect('BusinessPrice/index');
		}
	}

	//删除
	public function priceDelete(){
		$id =$_GET['id'];
		$Db=Db::table('ph_business_price');
		$re=$Db->where('ppriceId',"$id")->delete();
		if($re)
			{
				$this->redirect('BusinessPrice/index');
			}
	}
}