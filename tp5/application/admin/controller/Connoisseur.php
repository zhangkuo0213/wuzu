<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Entrance;

class User extends Entrance{
	public function user(){
		return view('user');
	}

	//修改
	public function userupdate(){
		return view('connoisseurupdate');
	}
}