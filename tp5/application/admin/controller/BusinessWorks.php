<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\admin\controller\Entrance;
class BusinessWorks extends Entrance{
	public function index(){
		$Db=Db::table('ph_business_works');
		$data=$Db->join('ph_business','ph_business_works.pbusinessId=ph_business.pbusinessId')->select();
		return view('index',['data'=>$data]);
	}

	//添加
	public function worksAdd(){
		$Db=Db::table('ph_business');
		$data=$Db->select();
		return view('pworksadd',['data'=>$data]);
	}

	//接受添加的参数
	public function getAdd(){
		$data =$_POST;
		$Db=Db::table('ph_business_works');
		$re=$Db->insert($data);
		if($re)
		{
			$userId =$Db->getLastInsID();
			$files = request()->file('img');
			foreach($files as $file){
				// 移动到框架应用根目录/public/uploads/ 目录下
				$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
				if($info){
					// 成功上传后 获取上传信息   
					$path=str_replace("\\", "/", $info->getSaveName()); 
					$img=array();  
					$img['pworksId']=$userId;
					$img['pimgImg']='uploads/'.$path; 
					
						$res=Db::table('ph_business_img')->insert($img);
				}else{
					// 上传失败获取错误信息
					echo $file->getError();
				}			
					
			}
			if($res)
			{
				$this->redirect('BusinessWorks/index');
			}
		}			
			
	}

	//修改
	public function worksUpdate(){
		$id =$_GET['id'];
		$Db=Db::table('ph_business_works');
		$info=$Db->where('pworksId',"$id")->find();
		$Db=Db::table('ph_business');
		$data=$Db->select();
		return view('pworksupdate',['info'=>$info,'data'=>$data]);
	}

	//接受修改的参数
	public function getUpdate(){
		$data =$_POST;
		$id=$data['pworksId'];
		unset($data['pworksId']);
		$re=Db::table('ph_business_works')->where('pworksId',"$id")->update($data);
		if($re)
		{
			$this->redirect('BusinessWorks/index');
		}		
	}

	//删除
	public function worksDelete(){
		$id =$_GET['id'];
		$Db=Db::table('ph_business_works');
		$re=$Db->where('pworksId',"$id")->delete();
		if($re)
			{
				$this->redirect('BusinessWorks/index');
			}
	}
}