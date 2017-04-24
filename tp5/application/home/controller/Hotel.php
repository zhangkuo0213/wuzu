<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
class Hotel extends Controller{
//    //分页数据
//    public function actionFen($count,$p=1){
//        $num=6;//每页显示6条
//        $pageSum=ceil($count/$num);//总页数
//        $prevPage=$p-1>1?$p-1:1;//上一页
//        $nextPage=$p+1<$pageSum?$p+1:$pageSum;//下一页;
//        $str='';
//        $str.='<a href="javascript:page(1)">首页</a>';
//        $str.='<a href="javascript:page('.$prevPage.')">上一页</a>';
//        $str.=$p.'/'.$pageSum;
//        $str.='<a href="javascript:page('.$nextPage.')">下一页</a>';
//        $str.='<a href="javascript:page('.$pageSum.')">末页</a>';
//        return $str;
//    }
	//酒店列表
//	public function hotel(){
//        $list =Db::table('hotel')->select();
//        $this->assign('list', $list);
//		return view('HunYan_List');
//	}
    //酒店详细信息
    public function hotel_xq(){
        $id=$_GET['id'];
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
            $pid=$_GET['pid'];
            $list =Db::table('package')->join('hotel','hotel.id = package.hotel_id ')->where("package.id=$pid")->select();
            $this->assign('list', $list);
            return view('package');
        }else{
            $hotel_id=$_GET['hotel_id'];
//            $list =Db::table('package')->where("hotel_id=$hotel_id")->select();
            $list =Db::table('package')->join('hotel','hotel.id = package.hotel_id ')->where("package.hotel_id=$hotel_id")->select();
            $this->assign('list', $list);
            return view('package');
        }
    }

   // ajax搜索

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


}