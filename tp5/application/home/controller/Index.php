<?php
namespace app\home\controller;
use think\Controller;
use think\Cache;
class Index extends Controller{
	//首页
	public function index(){
        $fileName = "../runtime/cache/index.html";
				// $fileName = "../application/home/view/index/index0.html";
				// Cookie::set('a','1');
        // if(file_exists($fileName)){
        //     include $fileName;
        //     exit();
        // }
	    //轮播图
	    $lun = Db('carousel')->where('is_show=1')->order('carousel_id')->cache(true)->select();
	    $this->assign('lun',$lun);

	    //三个图片
	    //婚宴酒店
        $hunyan = Db('hotel')->limit(0,3)->cache(true)->field('id,hotel_name,hotel_img1')->select();
        $this->assign('hunyan',$hunyan);
        //婚纱摄影
        $hunsha = Db('ph_business')->limit(0,3)->cache(true)->field('pbusinessId,pbusinessImg,pbusinessTitle')->select();
        $this->assign('hunsha',$hunsha);
        //蜜月游
        $miyue = Db('wedding_miyue')->limit(0,3)->cache(true)->field('miyue_id,url,address')->select();
        $this->assign('miyue',$miyue);
        //婚车
        $hunce = Db('car')->limit(0,3)->cache(true)->field('car_id,car_name,car_img')->select();
        $this->assign('hunce',$hunce);

        //婚宴酒店
        $hunyans = Db('hotel')->limit(0,10)->cache(true)->field('id,hotel_name,hotel_img1')->select();
        $this->assign('hunyans',$hunyans);
        //婚纱摄影
        $hunshas = Db('ph_business')->limit(0,10)->cache(true)->field('pbusinessId,pbusinessImg,pbusinessTitle')->select();
        $this->assign('hunshas',$hunshas);
        //蜜月游
        $miyues = Db('wedding_miyue')->limit(0,10)->cache(true)->field('miyue_id,url,address')->select();
        $this->assign('miyues',$miyues);
        //婚车
        $hunces = Db('car')->limit(0,3)->cache(true)->field('car_id,car_name,car_salary,car_img')->select();
        $this->assign('hunces',$hunces);
				return view('index');
//echo $fileName;die;
        // $data = $this->fetch('index');
        // file_put_contents($fileName,$data);
        // echo $data;
	}
	public function lun()
    {
        return view('lun');
    }

	//婚纱酒店
	public function grogShop(){
		return view('HunYan-List');
	}


	//婚纱酒店
	public function shoot(){
		return view('HunShaSheYing');
	}

	//婚纱策划
	public function plan(){
		return view('HunQing');
	}
	//婚车
	public function weddingCar(){
		return view('Class-Car');
	}
	//蜜月游
	public function honeymoon(){
		return view('MiYue');
	}
	//婚纱酒店
	public function overseasWedding(){
		return view('Tours-111');
	}
	//旅拍
	public function journeyTake(){
		return view('CuXiao');
	}
	//婚纱礼服
	// public function fullDress(){
	// 	return view('CuXiao/1215?utm_source=APP&utm_medium=WAP');
	// }
}
