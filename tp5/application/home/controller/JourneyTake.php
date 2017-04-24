<?php
namespace app\home\controller;
use think\Controller;
use think\Db;

class JourneyTake extends Controller{
	//旅拍
	public function journeyTake(){
		return view('CuXiao');
	}
}
