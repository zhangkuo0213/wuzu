<?php
namespace app\home\controller;
use think\Controller;
use think\Db;

class Miyue extends Controller{
	//蜜月游
	public function miyue(){
		//查询表数据
		$data = Db::table('wedding_miyue')->select();
		//模板变量赋值
		$this->assign('data',$data);
		//var_dump($data);die;
		//模板渲染输出
		return view('miyue');
	}

	//蜜月游详情
	public function miyue_info(){
		$id = $_GET['id'];
		//查询表数据
		$data = Db::table('wedding_miyue')
			->alias('m')
			->join('wedding_roomstyle r','m.miyue_id=r.miyue_id')
			->where("m.miyue_id=$id")
			->select();
			//var_dump($data);die;
		$list[2] = Db::table('img_url')->where("miyue_id=$id")->where("imgposition_id=2")->limit(3)->select();
		$list[3] = Db::table('img_url')->where("miyue_id=$id")->where("imgposition_id=3")->limit(3)->select();
		$list[4] = Db::table('img_url')->where("miyue_id=$id")->where("imgposition_id=4")->limit(3)->select();
		$arr[2] = Db::table('img_url')->where("miyue_id=$id")->where("imgposition_id=2")->select();
		$arr[3] = Db::table('img_url')->where("miyue_id=$id")->where("imgposition_id=3")->select();
		$arr[4] = Db::table('img_url')->where("miyue_id=$id")->where("imgposition_id=4")->select();
		$count[2] = count($arr[2]);
		$count[3] = count($arr[3]);
		$count[4] = count($arr[4]);
		//var_dump($count);die;
		//var_dump($list);die;
		//模板变量赋值
		$this->assign('data',$data);
		$this->assign('list',$list);
		$this->assign('arr',$arr);
		$this->assign('count',$count);
		//模板渲染输出
		return view('miyue_info');
	}
	//
}