<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\controller\Entrance;
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;
class Hotel extends Entrance{
	public function hotel(){
        $list = Db::name('hotel')->paginate(5);
        $page = $list->render();//传分页
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch();
	}
    //增加
    public function hotel_add(){
        if($_POST){
            //print_r($_POST);die;
            require_once 'php-sdk-master/autoload.php';
            // 需要填写你的 Access Key 和 Secret Key
            $accessKey = 'I5oPwywgZMEa21YB3NXa_ShVvJ0_xUEniQnRERFv';
            $secretKey = 't6ogHGRy-ScJzh8sdn1lATK8ml3sLIXgMp3aNSi8';
            $auth = new Auth($accessKey, $secretKey); // 构建鉴权对象
            $bucket = 'hello';// 要上传的空间
            $token = $auth->uploadToken($bucket);// 生成上传 Token
            $name1=$_FILES["hotel_img1"]["name"];
            $name2=$_FILES["hotel_img2"]["name"]; //上传到七牛后保存的文件名
            $name3=$_FILES["hotel_img3"]["name"];
            $name4=$_FILES["hotel_img4"]["name"];

            $filePath1=$_FILES["hotel_img1"]["tmp_name"];//要上传文件的本地路径
            $filePath2=$_FILES["hotel_img2"]["tmp_name"];
            $filePath3=$_FILES["hotel_img3"]["tmp_name"];
            $filePath4=$_FILES["hotel_img4"]["tmp_name"];

            $uploadMgr = new UploadManager();
            $uploadMgr->putFile($token,$name1,$filePath1);// 调用 UploadManager 的 putFile 方法进行文件的上传
            $uploadMgr->putFile($token,$name2,$filePath2);
            $uploadMgr->putFile($token,$name3,$filePath3);
            $uploadMgr->putFile($token,$name4,$filePath4);

            $_POST['hotel_img1']=$name1;
            $_POST['hotel_img2']=$name2;
            $_POST['hotel_img3']=$name3;
            $_POST['hotel_img4']=$name4;
            $arr=Db::table('hotel')->insert($_POST);
            if($arr){
                $this->redirect('hotel/hotel');
            }
        }else{
            return view('hotel_add');
        }
    }
    //传修改页面
    public function hotel_update(){
        $id=$_GET['id'];
        $arr=Db::table('hotel')->where("id=$id")->select();
        return view('hotel_update',array('list'=>$arr));
    }
    //修改内容
    public function hotel_update_do(){
        $id=$_GET['id'];
        Db::table('hotel')->where("id=$id")->update($_POST);
        $this->redirect('hotel/hotel');
    }
    //删除
    public function hotel_del(){
        $id=$_GET['id'];
        Db::table('hotel')->where("id=$id")->delete();
        $this->redirect('hotel/hotel');
    }
    //搜索
    public function hotel_search(){
        $hotel_name=isset($_GET['hotel_name'])?$_GET['hotel_name']:"";
        $hotel_address=isset($_GET['hotel_address'])?$_GET['hotel_address']:"";

//        print_r($hotel_name);
//        print_r($hotel_address);
        $where[]='1=1';
        if(!empty($hotel_name)){
            $where[]= " hotel_name = '$hotel_name'";
        }
        if(!empty($hotel_address)){
            $where[]=" hotel_address like '%$hotel_address%'";
        }
        $res=implode(' AND ',$where);
        $list = Db::name('hotel')->where($res)->paginate(5);
        $page = $list->render();//传分页

        $wheres= "?hotel_name=".$hotel_name."&hotel_address=".$hotel_address."&";
        $page =  str_replace("?",$wheres,$page);
        $this->assign('list', $list);
        $this->assign('page', $page);
        return $this->fetch('hotel');
    }


}