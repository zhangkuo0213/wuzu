<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Entrance;

class Weddingcar extends Entrance{
	//显示婚车分类页面
	public function index(){
		 return view('add_type');
	}
	//婚车分类添加
	public function type_add(){
		$query = new \think\db\Query();
        $user = $query->table("car_type")->insert($_POST);
        if ($user) {
        	return $this->redirect('weddingcar/show');
        }else{
        	echo "添加失败";
        }
	}
	//婚车分类展示
	public function show(){
		$query = new \think\db\Query();
		$arr=$query->table('car_type')->select();
		// print_r($arr);die;
		return view('show',['arr'=>$arr]);
	}
	//分类列表删除
	public function type_del()
	{
		$id=$_GET['id'];
		// echo $id;die;
		$del=$this->delete($id,'car_type','car_type_id');
		if ($del) {
			return $this->redirect('weddingcar/type_show');
		}
	}
	//显示婚车品牌
	public function brand(){
			 return view('add_brand');
		}
	//婚车品牌添加
	public function brand_add(){
		$date=$_POST;
		$query = new \think\db\Query();
        $user = $query->table("car_brand")->insert($_POST);
        if ($user) {
        	return $this->redirect('weddingcar/brand_show');
        }else{
        	echo "添加失败";
        }
	}
	//婚车品牌展示
	public function brand_show(){
		$query = new \think\db\Query();
		$arr=$query->table('car_brand')->select();
		// print_r($arr);die;
		return view('brand_show',['arr'=>$arr]);
	}
	//品牌列表删除
	public function brand_del()
	{
		$id=$_GET['id'];
		// echo $id;die;
		$del=$this->delete($id,'car_brand','car_brand_id');
		if ($del) {
			return $this->redirect('weddingcar/brand_show');
		}
	}
	//显示婚车颜色
	public function color(){
			 return view('add_color');
		}
	//婚车颜色添加
	public function color_add(){
		$date=$_POST;
		$query = new \think\db\Query();
        $user = $query->table("car_color")->insert($_POST);
        if ($user) {
        	return $this->redirect('weddingcar/color_show');
        }else{
        	echo "添加失败";
        }
	}
	//婚车颜色展示
	public function color_show()
	{
		$query = new \think\db\Query();
		$arr=$query->table('car_color')->select();
		// print_r($arr);die;
		return view('color_show',['arr'=>$arr]);
	}
	//颜色列表删除
	public function color_del()
	{
		$id=$_GET['id'];
		// echo $id;die;
		$del=$this->delete($id,'car_color','car_color_id');
		if ($del) {
			return $this->redirect('weddingcar/color_show');
		}
	}
	//显示婚车页面
	public function car()
	{
		$query = new \think\db\Query();
		$brr=$query->table('car_brand')->select();
		$trr=$query->table('car_type')->select();
		$crr=$query->table('car_color')->select();
		return view('add_car',['brr'=>$brr,'trr'=>$trr,'crr'=>$crr]);
	}
	//婚车添加
	// public function add_car(){

	// }
	










	//封装删除方法
	public function delete($id,$table,$table_id)
	{
		// echo $table,$table_id;die;
		$query=new \think\db\Query();
		$del=$query->table($table)->where("$table_id=$id")->delete();
		if ($del) {
			return 1123;
		}
	}
}
