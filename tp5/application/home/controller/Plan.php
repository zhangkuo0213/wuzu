<?php
namespace app\home\controller;
use think\Controller;
use think\Db;

class Plan extends Controller{
	//婚纱策划
	public function plan(){
		return view('HunQing');
	}
}