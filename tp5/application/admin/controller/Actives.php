<?php
namespace app\admin\controller;
use think\Controller;
use \think\Request;
use \think\Db;
use think\Session;
use app\admin\controller\Entrance;

class Actives extends Entrance{
	// 活動展示頁面
	public function actives(){

		$arr = Db::table('actives')->paginate(3);
		// echo "<pre>";
		// var_dump($arr);die();



		return view('actives',['arr'=>$arr]);
	}

	// 活动添加页面
	public function activesadd(){
		return view('activesadd');
	}

	// 活动添加处理页面
	public function adds(){
	    $request = Request::instance();
	    $params  = $request->param();

	    $av_name  = $params['av_name'];
	    $av_info  = $params['av_info'];
	    $av_price = $params['av_price'];
	    $end_time = $params['end_time'];
	    $add_time = time();

		$imgs = Session::get('imgs');
	    $data = ['av_name' => "$av_name",'av_price' => "$av_price",'imgs' => "$imgs",'av_info' => "$av_info",'end_time' => "$end_time",'add_time' => "$add_time"];
	    $res  = Db::table('actives')->insert($data);
		
		if ($res) {
			$this->redirect('Actives/actives',302);
		}
	}

	//切片上传
	public function jia(){
		$dir = $_POST['filename'];  

		$session = Session::set('imgs',"$dir");

	    $dir="/uploads/".md5($dir);  
	    file_exists($dir) or mkdir($dir,0777,true);  
	      
	    $path=$dir."/".$_POST['blobname'];  
	      // var_dump($_POST['filename']);
	      
	      // $path = "uploads/".$path;
	      
	    //print_r($_FILES["file"]);  
	    move_uploaded_file($_FILES["file"]["tmp_name"],$path);  
	      
	    if(isset($_POST['lastone'])){  

	        $count=$_POST['lastone'];  
	          
	        $fp   = fopen($_POST['filename'],"abw");  
	        for($i=0;$i<=$count;$i++){  
	            $handle = fopen($dir."/".$i,"rb"); 
	            fwrite($fp,fread($handle,filesize($dir."/".$i)));    
	            fclose($handle);      
	        }  
	        fclose($fp); 
	        $yi = ROOT_PATH."public/".$_POST['filename'];
	        $yi = str_replace('\\', '/',$yi);
	        $er = ROOT_PATH."public/uploads/".$_POST['filename'];
	        $er = str_replace('\\', '/',$er);
	        
	        var_dump($yi);
	        var_dump($er);
	        if (rename($yi,$er)) {
	        	echo "你大爷";
	        }else{
	        	echo "你二大爷";
	        }
	        	  
	    }

	    

	}

	//删除
	public function dele(){
		$request = Request::instance();
	    $id  = $request->param()['id'];

	    // echo "<pre>";
	    // var_dump($id);die();

		$res = Db::table('actives')->where('av_id',$id)->delete();
		if ($res) {

			
			return	$this->redirect('Actives/actives',302);

		}else{

			return	$this->redirect('Actives/actives',302);
		}
		 
	}

}