<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use app\home\model\Ucpaas;
use think\Cookie;

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
    //展示列表作品
    public function shootWorks()
    {
        $works=Db::table('ph_business_works')->select();
        foreach ($works as $key => $value) {
             $wid=$value['pworksId'];
             $img=Db::table('ph_business_img')->field("pimgImg")->where("pworksId","$wid")->find();
             $works[$key]['imgNum']=count(Db::table('ph_business_img')->where("pworksId","$wid")->select());
             $works[$key]['img']=$img['pimgImg'];
         }
        return view("HunShaSheYing-ZuoPin",['works'=>$works]);
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
        return view('TianMiHaiAn-menu',['price'=>$price,'id'=>$id]);
    }
    //展示套系详情
    public function priceDetails(){
        $id=$_GET['id'];
        $price=Db::table('ph_business_price')->where("ppriceId","$id")->find();
        $bid=$price['pbusinessId'];
        $priceNum=count(Db::table('ph_business_price')->where("pbusinessId","$bid")->select());
        $worksNum=count(Db::table('ph_business_works')->where("pbusinessId","$bid")->select());
        $order=Db::table('ph_business_price')->where("ppriceId!=$id and pbusinessId=$bid")->limit(2)->select();
        return view('TianMiHaiAn-menu-detail',['price'=>$price,'priceNum'=>$priceNum,'worksNum'=>$worksNum,'order'=>$order,'id'=>$bid]);
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
        return view('TianMiHaiAn-Photo',['works'=>$works,'id'=>$id]);
    }
    //展示作品详情
    public function worksDetails(){
        $id=$_GET['id'];
        $works=Db::table('ph_business_works')->where("pworksId","$id")->find();
        $img=Db::table('ph_business_img')->where("pworksId","$id")->select();
        // print_r($img);die;
        $imgNum=count($img);
        return view('TianMiHaiAn-Photo-detail',['works'=>$works,'img'=>$img,'imgNum'=>$imgNum]);
    }
    //预约看店
    public function orderShop()
    {
        return view("order-look-shop");
    }
    //验证
    public function phone()
    {
        $phone=$_POST['tell'];
        //初始化必填
        $options['accountsid']='08d6c7649d88d2e9b65d68d58919abd0';
        $options['token']='9cad0c967200d9cef395a65043dd3282';
        //初始化 $options必填
        $ucpass = new Ucpaas($options);

        //开发者账号信息查询默认为json或xml
        echo $ucpass->getDevinfo('json');
        //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $appId = "650f97e1abbb41b080ca171fc55b760a";
        $to = $phone;
        $templateId = "42791";
        $param=rand(1000,9999);
        Cookie::set('phone_yan',$param,120);
        $ucpass->templateSMS($appId,$to,$templateId,$param);        
    }

    public function code()
    {
        $data=$_POST;
        if($data)
        {
            $code=$data['certifycode'];
            $phone=$data['tell'];
            $param=Cookie::get('phone_yan'); 
            if($code==$param)
            {
                $options['accountsid']='08d6c7649d88d2e9b65d68d58919abd0';
                $options['token']='9cad0c967200d9cef395a65043dd3282';
                //初始化 $options必填
                $ucpass = new Ucpaas($options);

                //开发者账号信息查询默认为json或xml
                echo $ucpass->getDevinfo('json');
                //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
                $appId = "650f97e1abbb41b080ca171fc55b760a";
                $to = $phone;
                $templateId = "42918";
                $param="";
                echo $ucpass->templateSMS($appId,$to,$templateId,$param);
                $this->redirect("shoot");

            }
        }
    }
}
