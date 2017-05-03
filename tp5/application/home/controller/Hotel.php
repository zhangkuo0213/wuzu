<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Cookie;
use app\home\model\Ucpaas;
class Hotel extends Controller{
    // ajax搜索分页
    public function hotel(){
        $hotel_address=isset($_GET['address'])?$_GET['address']:"";
        $type = isset($_GET['type'])?$_GET['type']:"";
        $page = isset($_GET['page'])?$_GET['page']:1;
        $where[]='1=1';
        if(!empty($hotel_address)){
            $where[]=" hotel_address = '$hotel_address'";
        }
        if(!empty($type)){
            $where[]=" hotel_type = '$type'";
        }
        $res=implode(' AND ',$where);
        $count =Db::table('hotel')->where($res)->count();
        $pageSum=ceil($count/10);//总页数
        $page = $page<0?1:$page;
        if($pageSum){
            $page = $page>$pageSum?$pageSum:$page;
        }else{
            $page = 1;
        }
        $pianyi = ($page-1)*10;
        $list =Db::table('hotel')->where($res)->limit($pianyi,10)->select();
        $arr['data']=$list;
        $arr['pagesum'] = $pageSum;
        $arr['page'] = $page;
        if(isset($_GET['address']) || isset($_GET['type']) || $page != 1){
            echo json_encode($arr);
        }else{
            return view('HunYan_List',['list'=>$list,'pagesum'=>$pageSum,'page'=>$page]);
        }
    }
    //酒店详细信息
    public function hotel_xq(){
        $id=intval($_GET['id']);
        $list =Db::table('hotel')->where("id=$id")->select();
        $arr =Db::table('package')->where("hotel_id=$id")->select();
        $number =Db::table('package')->where("hotel_id=$id")->count();
        $arr['number'] =$number;
        $arr['hotel_id']=intval($id);
        $this->assign('list', $list);
        $this->assign('arr', $arr);
        return view('default');
    }
    //酒店菜单
    public function hotel_package(){
        if(isset($_GET['pid'])){
            $pid=intval($_GET['pid']);
            $list =Db::table('package')->join('hotel','hotel.id = package.hotel_id ')->where("package.id=$pid")->select();
            $this->assign('list', $list);
            return view('package');
        }else{
//            $hotel_id=$_GET['hotel_id'];
            $hotel_id=intval($_GET['hotel_id']);
            $list =Db::table('package')->join('hotel','hotel.id = package.hotel_id ')->where("package.hotel_id=$hotel_id")->select();
            $this->assign('list', $list);
            return view('package');
        }
    }
    //发送信息
    public function send_xx(){
        $phone=$_POST['mobile_phone'];
        //初始化必填
        $options['accountsid']='2159096189b1e44aa1edd026096618a1';
        $options['token']='69d9533854e1040c7baddb479bd1f9c3';
        //初始化 $options必填
        $ucpass = new Ucpaas($options);
        //开发者账号信息查询默认为json或xml
         $ucpass->getDevinfo('json');
        //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $appId = "2cdb1a571b084883813391b4815357cc";
        $templateId = "42907";
        $ucpass->templateSMS($appId,$phone,$templateId);
        $this->redirect('hotel/hotel');
    }







}