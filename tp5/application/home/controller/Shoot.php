<?php
namespace app\home\controller;
use think\Controller;
use think\Db;

class Shoot extends Controller{
	//展示列表
	public function shoot(){
        $perPage = 10;
        $sql = "SELECT * from ph_business inner join ph_business_type on ph_business.ptypeId=ph_business_type.ptypeId";
        $sqls = "SELECT count(*) from ph_business inner join ph_business_type on ph_business.ptypeId=ph_business_type.ptypeId";
        $page = 1;
        if(!empty($_GET["page"])) {
            $page = $_GET["page"];
        }

        $start = ($page-1)*$perPage;
        if($start < 0) $start = 0;

        $query =  $sql . " limit " . $start . "," . $perPage;
        $faq = Db::query($query);


        if(empty($_GET["rowcount"])) {
            $_GET["rowcount"] = Db::query($sqls);
        }

        $pages  = ceil($_GET["rowcount"][0]['count(*)']/$perPage);
        $output = '';
        if(!empty($faq)) {
            $output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';

            foreach($faq as $k=>$v) {
                $output .=  '<li><a href="../../../../public/index.php/home/Shoot/xiangQing?id='.$faq[$k]["pbusinessId"].'" class="sellerListItem">';
                $output .=  '<dl class="clearfix"><dt><img src="../../../../public/'.$faq[$k]["pbusinessImg"].'"></dt>';
                $output .=  '<dd><div class="title"><h3><i>'.$faq[$k]["pbusinessTitle"].'</i><span class="fu"></span></h3></div>';
                $output .=  '<div class="returnCash"><p class="row1"><span class="big">￥<i>5980-12980</i>/套</span></p>';
                $output .= '<p class="row2"><span class="district">黄浦区 宝山区</span><span class="style">'.$faq[$k]["ptypeName"].'</span></p>';
                $output .= '</div></dd></dl></a></li>';
            }
        }
        if($page==1)
        {
            $type=Db::table('ph_business_type')->select();
            return view('HunShaSheYing',['type'=>$type,'data'=>$output]);
        }else{
           print_r($output);
        }


    }
    //详情页
    public function xiangQing(){
    	$id=$_GET['id'];
		$data=Db::table('ph_business')->where("pbusinessId","$id")->find();	
        $price=Db::table('ph_business_price')->where("pbusinessId","$id")->limit(4)->select(); 
        $priceNum=count(Db::table('ph_business_price')->where("pbusinessId","$id")->select());
        $works=Db::table('ph_business_works')->where("pbusinessId","$id")->limit(2)->select();
        foreach ($works as $key => $value) {
             $wid=$value['pworksId'];
             $img=Db::table('ph_business_img')->field("pimgImg")->where("pworksId","$wid")->find();
             $works[$key]['imgNum']=count(Db::table('ph_business_img')->where("pworksId","$wid")->select());
             $works[$key]['img']=$img['pimgImg'];
         } 
        $worksNum=count(Db::table('ph_business_works')->where("pbusinessId","$id")->select());
        $order=Db::table('ph_business')->where("pbusinessId!=$id")->limit(2)->select();
        foreach ($order as $k => $v) {
            $bid=$v['pbusinessId'];
            $money=Db::table('ph_business_price')->field("ppriceMoney")->where("pbusinessId","$bid")->find();
            $order[$k]['money']=$money['ppriceMoney'];
        }
		return view('TianMiHaiAn-Info',['data'=>$data,'price'=>$price,'priceNum'=>$priceNum,'works'=>$works,'worksNum'=>$worksNum,'order'=>$order]);
	}
    //展示套系列表
    public function price(){
        $id=$_GET['id'];
        $price=Db::table('ph_business_price')->where("pbusinessId","$id")->select();
        return view('TianMiHaiAn-menu',['price'=>$price]);
    }
    //展示套系详情
    public function priceDetails(){
        $id=$_GET['id'];
        $price=Db::table('ph_business_price')->where("ppriceId","$id")->find();
        $bid=$price['pbusinessId'];
        $priceNum=count(Db::table('ph_business_price')->where("pbusinessId","$bid")->select());
        $worksNum=count(Db::table('ph_business_works')->where("pbusinessId","$bid")->select());
        $order=Db::table('ph_business_price')->where("ppriceId!=$id and pbusinessId=$bid")->limit(2)->select();
        return view('TianMiHaiAn-menu-detail',['price'=>$price,'priceNum'=>$priceNum,'worksNum'=>$worksNum,'order'=>$order]);
    }
    //展示作品列表
    public function works(){
        $id=$_GET['id'];
        $works=Db::table('ph_business_works')->where("pbusinessId","$id")->select();
        foreach ($works as $key => $value) {
             $wid=$value['pworksId'];
             $img=Db::table('ph_business_img')->field("pimgImg")->where("pworksId","$wid")->find();
             $works[$key]['imgNum']=count(Db::table('ph_business_img')->where("pworksId","$wid")->select());
             $works[$key]['img']=$img['pimgImg'];
         }
        return view('TianMiHaiAn-Photo',['works'=>$works]);
    }
    //展示作品详情
    public function worksDetails(){
        $id=$_GET['id'];
        $works=Db::table('ph_business_works')->where("pworksId","$id")->find();
        $img=Db::table('ph_business_img')->where("pworksId","$id")->limit(6)->select();
        // print_r($img);die;
        $imgNum=count($img);
        return view('TianMiHaiAn-Photo-detail',['works'=>$works,'img'=>$img,'imgNum'=>$imgNum]);
    }
    //加载更多
    public function jia(){
        $p=$_POST['p'];
        $id=$_POST['id'];
        //偏移量
        $limit=($p-1)*6;
        $da=Db::table('ph_business_img')->where("pworksId","$id")->select();
        //总条数
        $arr=count($da);
        //总页数、每页显示6条
        $num=ceil($arr/6);
        //下一页
        // $down=$p+1>$num?$num:$p+1;
        // $ap=$p+1;
        if($p+1>$num){
            $data['sid']=2;
            $data['pa']=$p;
            echo json_encode($data);
        }else{
            //返回下一页数据
            $data['resl']= Db::table('ph_business_img')->where("pworksId","$id")->limit($limit,6)->select();
            $data['sid']=1;
            $data['pa']=$p+1;
            echo json_encode($data);
        }
    }
    //预约看店
    public function orderShop()
    {
        return view("Order-look-shop");
    }

}