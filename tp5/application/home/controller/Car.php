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
	}
}