<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Entrance;

class Banner extends Entrance{
	public function banner(){
		return view('banner');
	}

	//修改
	public function banneradd(){
		return view('banneradd');
	}
}