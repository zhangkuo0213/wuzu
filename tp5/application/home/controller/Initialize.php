<?php
/**
 * 注册手机页面.
 */
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Cookie;
use app\home\model\Ucpaas;
class Initialize extends Controller
{
    public function _initialize()
    {

    }

    public function user()
    {
        $appid='wxc551cc43c25c6131';
        $redirect_uri = urlencode ( 'http://www.jjxin.xin/wx/tp5/public/index.php/home/initialize/getUserInfo' );
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
        echo "<script>location.href='$url'</script>";exit();
    }
    public function getUserInfo()
    {
        header("content-type:text/html;charset=utf-8");
        $code = $_GET["code"];
        $appid = "wxc551cc43c25c6131";
        $appsecret = "5eda18db518ee81190a8b8dce3dae0c6";//appid和appsecret在这里隐去，在源代码中是正确的
        $access_token = "";

//Get access_token
        $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
        $access_token_json = $this->https_request($access_token_url);
        $access_token_array = json_decode($access_token_json,true);
        $access_token = $access_token_array['access_token'];
        $openid = $access_token_array['openid'];

//Get user info
        $userinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
        $userinfo_json = $this->https_request($userinfo_url);
        $userinfo_array = json_decode($userinfo_json,true);
        $getJson =  $userinfo_array;
//        print_r($getJson['openid']);
        Cookie::set('getJson',$getJson,3600*12);

        $user_openid = $getJson['openid'];
        $selectone = Db('user')->where("user_openid='$user_openid'")->find();
        if($selectone){
            $this->redirect('index/index');
        }else{
            $this->redirect('initialize/register');
        }

    }

    public function https_request($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl,  CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)){
            return 'ERROR'.curl_error($curl);
        }
        curl_close($curl);
        return  $data;
    }


    //用户绑定手机号
    public function register()
    {
        if($_POST){
         $post = $_POST;
         $phone_yan = Cookie::get('phone_yan');
         if($phone_yan==$post['checkCode']&&isset($phone_yan)){
             $phone = $post['acc'];
             $ca = Cookie::get('getJson');
             $post['user_openid'] = $ca['openid'];
             $post['user_phone'] = $post['acc'];
             $post['user_time'] = time();
             unset($post['acc'],$post['imgCode'],$post['checkCode']);
             $user_phone = Db::table('user')->where("user_phone='$phone'")->find();
             if($user_phone){
                 echo "<script>alert('此手机号已注册');window.history.go(-1);</script>";
             }
             $add = Db::table('user')->insert($post);
             if($add){
                 $this->redirect('index/index');
             }
         }else{
             echo "<script>alert('短信验证码输入错误');window.history.go(-1);</script>";
         }

        }else {
            return view('register');
        }
    }
    //验证图片验证码
    public function captcha()
    {
        $captcha = $_POST['yz'];
        if(!captcha_check($captcha)){
            //验证失败
            return 0;
        }else{
            return 1;
        }
    }
    //验证手机号
    public function phone()
    {
        $phone = $_POST['phone'];
        $weiyi = Db('user')->where('user_phone='.$phone)->select();
        if($weiyi){
            return 1;
        }else{
            return 0;
        }
    }
    //发送验证码
    public function send_phone()
    {
        $phone = $_POST['phone'];
        //初始化必填
        $options['accountsid']='2159096189b1e44aa1edd026096618a1';
        $options['token']='69d9533854e1040c7baddb479bd1f9c3';


//初始化 $options必填
        $ucpass = new Ucpaas($options);

//开发者账号信息查询默认为json或xml

        echo $ucpass->getDevinfo('json');

//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $appId = "2cdb1a571b084883813391b4815357cc";
        $templateId = "42225";
        $param=rand(1000,9999);
        Cookie::set('phone_yan',$param,120);
        $ucpass->templateSMS($appId,$phone,$templateId,$param);
    }
}