<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/home/view/shoot/TianMiHaiAn-Info.html";i:1493013820;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>【中国甜蜜海岸国际摄影集团】婚纱照欣赏-北京-到喜啦</title>
    <meta name="keywords" content="中国甜蜜海岸国际摄影集团" />
    <meta name="description" content="到喜啦(DaoXiLa.com)，中国结婚网站知名品牌，【预订中国甜蜜海岸国际摄影集团即送超值大礼包】，到喜啦为您提供中国甜蜜海岸国际摄影集团作品展示欣赏，婚纱照欣赏。" />

    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-touch-fullscreen" content="yes"/>
<meta name="full-screen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon" href="//s4.dxlfile.com/public/img/logo/wap/256_wedding.png"/>

<link href="//s4.dxlfile.com/??public/css/m.css,m-wedding/css/m-wedding.css?v=14254570119" rel="stylesheet" type="text/css"/>

<script src="//s4.dxlfile.com/??public/js/jquery-2.1.0.min.js,public/js/dxl2.js,public/js/m.js,m-wedding/js/m-wedding.js?v=14254570119"></script>
    <link rel="stylesheet" type="text/css" href="//s4.dxlfile.com/m-wedding/css/sellerDetail/1605.css?v=14254570119">
    <script src="//s4.dxlfile.com/m-wedding/js/sellerDetail/1605.js?v=14254570119"></script>
</head>
<body   _bizid="8062" id="WeddingTag"  travelflag="">

<header>
    <div class="secTitMain redSquare">
        <a href="/bj/HunShaSheYing/" class="prev"></a>商家详情
        <div class="riIcon clearfix">
            <!--<a class="collect" data-collect="1" data-id="3292"></a> -->
                        <a href="#" class="screen"></a>
        </div>
    </div>
</header>
<!-- 顶部 end -->
<section id="sellerDetail">
    <img src="__PUBLIC__/<?php echo $data['pbusinessImg']; ?>">

    <div class="detailTit" url="TianMiHaiAn" biz_id="8062">
        <h3 ><span><?php echo $data['pbusinessTitle']; ?></span>
            <!--<i class="fu"></i>-->
        </h3>
        <div class="detailMoney">
            <p>￥<i>3988-13588</i>/套</p>
                        <div class="detailFen">
                <div class="pingStartBg"><div class="pingStart" style="width:100%"></div></div>5分
            </div>
                    </div>
    </div>
        <ul class="detailHui">
    <!-- 
                 -->
                <li class="daoDianLi">
            <i>到店礼</i>
            <span>到店就送24精品相框一幅</span>
        </li>
                    </ul>
        <div class="receive-div"></div>
        <div class="detailBtnCon">
        <div class="detailBtn">
            <a href="#" class="online"></a>
            <a class="collect  notCollect" data-collect="0" data-id="8062"> </a>
            <a href="#">预约看店</a>
        </div>
    </div>
    </section>
<!-- 商家详情 end -->

<section id="sellerTaoXi">
    <div class="whiteBg">
        <h3 class="tit">商家套系</h3>
        <ul class="clearfix">
            <?php foreach($price as $vo): ?>
            <li>
                <a href="<?php echo url('home/Shoot/priceDetails'); ?>?id=<?php echo $vo['ppriceId']; ?>">
                    <div class="smallImg">
                        <img src="__PUBLIC__/<?php echo $vo['ppriceImg']; ?>">
                    </div>
                    <h3><?php echo $vo['ppriceTitle']; ?></h3>
                    <div class="returnCash">
                        <p class="oldPrice">￥<span><?php echo $vo['ppriceMoney']; ?></span></p>
                         <!-- 
                                                 -->
                    </div>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <a class="more" href="<?php echo url('home/Shoot/price'); ?>?id=<?php echo $data['pbusinessId']; ?>">查看全部<?php echo $priceNum; ?>个套系</a>
    </div>
</section>
<!-- 商家套系 end -->

<section id="sellerZuoPing">
    <div class="whiteBg">
        <h3 class="tit">商家作品</h3>
        <ul class="clearfix">
            <?php foreach($works as $ve): ?>
            <li>
                <a href="<?php echo url('home/Shoot/worksDetails'); ?>?id=<?php echo $ve['pworksId']; ?>" >
                    <div class="smallImg">
                        <img src="__PUBLIC__/<?php echo $ve['img']; ?>" width="800px">
                        <span><?php echo $ve['imgNum']; ?> 张</span>
                    </div>
                    <h3><?php echo $ve['pworksName']; ?></h3>
                </a>
            </li>
            <?php endforeach; ?>            
        </ul>
        <a class="more" href="<?php echo url('home/Shoot/works'); ?>?id=<?php echo $data['pbusinessId']; ?>">查看全部<?php echo $worksNum; ?>个作品</a>
    </div>
</section>
<!-- 商家作品 end -->

<section id="PingJia">
    <div class="whiteBg">
                <h3 class="tit">评价</h3>
        <ul class="clearfix">
            <li>
                <img src="//iq.dxlfile.com/defaults4image/my/img/m_medium.jpg?imageView2/2/w/110/h/110" alt="">
                <div class="pingjiaCon">
                    <div class="pingjiaUser clearfix">
                        <h3>飘香的银筝</h3><div class="pingStartBg"><div class="pingStart"  style="width:100%"></div></div>
                    </div>
                    <p>很不错，值得信赖，专业技术强大，服务到位，照片拍的很好</p>
                </div>
            </li>
        </ul>
        <a class="more" href="/bj/HunShaSheYing/TianMiHaiAn-Review">查看全部37条评论</a>
            </div>
</section>

<section id="detailInfo">
    <div class="detailInfo">
        <h3 class="tit">商家信息</h3>
        <ul>
            <li class="map">
                <div class="mapCenter clearfix">
                    <p>总部基地北京方向B座909（总店）</p>
                    <p class="mobile"><a href="tel:400-820-1709">联系商家</a></p>
                </div>
                            </li>
        </ul>
    </div>
</section>


<section id="mayEnjoy">
    <h3 class="tit">您可能会喜欢</h3>
    <ul>
        <?php foreach($order as $v): ?>
        <li>
            <a href="/bj/HunShaSheYing/TianMiHanAn-Info">
                <img class="sellTXLe" src="__PUBLIC__/<?php echo $v['pbusinessImg']; ?>" >
                <div class="sellTXRi">
                    <h3><span><?php echo $v['pbusinessTitle']; ?></span>
                         <i class="fu"></i>
                    </h3> 
                    <div class="returnCash">
                        <p class="oldPrice">￥<span><?php echo $v['money']; ?></span>起</p>
                    </div>
                    <div class="info">
<!--                     <span>
                        韩式                         欧式                    </span>
                        <i>丰台区</i> -->
                    </div>
                </div>
            </a>
        </li>
        <?php endforeach; ?>
        <!-- <p class="noMore">查看全部</p> -->
    </ul>
</section>
<!-- 您可能会喜欢 end -->


<section id="huiDetails">
    <div class="dialogWrap">
        <h1><span></span>优惠详情</h1>
        <div class="info">
            <!--  
                        -->
                        <div class="daoDianLi infoItem">
                <h3>预约到店即送</h3>
                                <div>到店就送24精品相框一幅</div>
                            </div>
                                    <div class="prompt infoItem">
                <h3>规则提醒</h3>
                <div>
                    <p>以上的返现及优惠详情，仅限通过到喜啦预订的用户使用</p>
                </div>
            </div>
        </div>
        <div class="order clearfix">
            <input type="tel" placeholder="输入您的手机号码" maxlength="11">
            <span>领取优惠</span>
        </div>
    </div>
</section>
<!-- 优惠详情弹层 end -->

<!-- 优惠详情弹层 end -->

<section id="yuyueInfo">
    <div class="dialogWrap">
        <h1><span></span>预约看店</h1>
        <section id="guide">
            <p class="sec2ed">留下您的联系方式，我们会尽快为您安排看店时间</p>
            <div class="myPhoneDiv">
                <p><input type="tel" class="phoneNum" placeholder="请输入11位手机号" maxlength="11"><span class="closeIcon"></span></p>
            </div>
            <a href="#" class="sure">提交</a>
        </section>
    </div>
</section>
<!-- 预约看店 end -->

</body>
</html>