<?php
namespace app\home\controller;
use think\Controller;
class Car extends Controller{
	//婚车
	public function index(){
		$query = new \think\db\Query();
  		$arr=$query->table('car')
		->join('car_type','car.car_type_id = car_type.car_type_id')
		->join('car_brand','car.car_brand_id=car_brand.car_brand_id')
		->join('car_color','car.car_color_id = car_color.car_color_id')
		->select();
		$brr = $query->table("car_brand")->select();
		$trr = $query->table("car_type")->select();
		$crr = $query->table("car_color")->select();
		return view('car_list',['arr'=>$arr,'trr'=>$trr,'brr'=>$brr,'crr'=>$crr]);
	}
	public function xq(){
		$id=$_GET['id'];
		$query = new \think\db\Query();
		$arr= $query->table("car")->where('car_id='.$id)->select();
		return view('car_xq',['arr'=>$arr]);
	}
	public function desc(){
		$query = new \think\db\Query();
		$arr=$query->table("car")->order('car_salary desc')->select();
		return view('desc',['arr'=>$arr]);
	}
	public function asc(){
		$query = new \think\db\Query();
		$arr=$query->table("car")->order('car_salary asc')->select();
		return view('asc',['arr'=>$arr]);
	}
	public function search(){
		// $type_name=$_GET['type_name'];
		// $color_name=$_GET['color_name'];	
	}
}