<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Entrance;
class Vip extends Entrance{
	public function vip(){
		return view('vip');
	}

	//修改
	public function vipadd(){
		return view('vipadd');
	}
}