<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Entrance;

class Index extends  Entrance{
	public function index(){
		return view('index');
	}

	public function topic(){
		return view('topic');
	}

	public function head(){
		return view('head');
	}

	//主体
	public function main(){
		return view('main');
	}

	//左边
	public function left(){
		return view('left');
	}

}