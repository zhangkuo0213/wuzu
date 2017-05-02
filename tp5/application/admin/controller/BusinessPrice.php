<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Upload;
class BusinessPrice extends Controller{
	public function index(){
		// 查询状态为1的用户数据 并且每页显示10条数据
		// $page= Db::name('ph_business_price')->where('status',1)
		// 把分页数据赋值给模板变量list
		// $this->assign('page', $page);// 渲染模板输出
		// return $this->fetch();
		$Db=Db::table('ph_business_price');
		$data=$Db->join('ph_business','ph_business_price.pbusinessId=ph_business.pbusinessId')->order('ppriceId')->paginate(5);
		// $de=$data->render();
		// print_r($de);die;
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
		$file = request()->file('image'); 
		$update=new Upload();
		$path=$update->upload($file); 
		$data['ppriceImg']=$path; 
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
		$file = request()->file('image'); 
		$update=new Upload();
		$path=$update->upload($file); 
		$data['ppriceImg']=$path;
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