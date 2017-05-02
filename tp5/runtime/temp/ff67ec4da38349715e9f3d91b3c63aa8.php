<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"F:\phpStudy\WWW\daone\wed\wuzu\tp5\public/../application/home\view\index\index.html";i:1493719473;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>北京结婚网知名品牌-到喜啦移动版</title>
	<meta name="keywords" content="北京结婚 ,北京结婚网,北京婚博会,北京婚庆网" />
	<meta name="description" content="到喜啦北京站免费为新人提供北京婚宴酒店预订、婚庆等服务,是新人必上的结婚网! 免费咨询热线:400-820-1709" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,minimal-ui">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="full-screen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">
	<link rel="apple-touch-icon" href="//s4.dxlfile.com/public/img/logo/wap/256_hotel.png"/>
	<link href="__PUBLIC__/css/index-w.css" rel="stylesheet" type="text/css" />

</head>

<body>
<!-- header -->
<header>
	<div class="secTitMain" style="margin-bottom: 5px;">
		<h2 class="secTitAdress">
			<a href="http://m.daoxila.com?city=all" cityId="1">北京</a>
		</h2>
		<h1 class="LogoName">
			<span>到喜啦</span>
		</h1>
		<div class="ri clearfix">
			<?php use think\Cookie; $ca = new Cookie();$cookie =Cookie::get('getJson');?>
			<span><img src="<?php echo $cookie['headimgurl'];?>" width="30px;" alt=""></span>
			<span><?php echo $cookie['nickname'];?></span>
		</div>
	</div>
</header>

<!-- 轮播图 -->

<!--<section id="imgShow">-->
<section>
	<div class="hd">
		<ul></ul>
	</div>
	<div class="bd">
		<ul>

			<li>
				<a href="#">
					<?php foreach($lun as $k => $v){?>
					<img src="__PUBLIC__/uploads/<?php echo $v['carousel_img'];?>" style="height: 120px;" id="<?php echo $v['carousel_sort'];?>" class="img" />
					<?php }?>
				</a>
			</li>

		</ul>
	</div>
</section>
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.img').hide()
    })
    var i = -1;
    function show(){
        if(i<4){
            i +=1;
        }else{
            i=0;
        }
        $('.img').eq(i).show()
        $('.img').eq(i).siblings().hide()
    }
    setInterval(show,2000)
</script>

<!-- 热门频道 -->
<section class="hotChannel pubItem">
	
	<ul class="clearfix">

		<li>
			<a href="<?php echo url('home/hotel/hotel'); ?>">
				<img src="__PUBLIC__/picture/icon_main_hotel.png">
				<span>婚宴酒店</span>
			</a>
		</li>
		<li>

			<a href="<?php echo url('home/Shoot/shoot'); ?>">

				<img src="__PUBLIC__/picture/icon_main_hunsha.png">
				<span>婚纱摄影</span>
			</a>
		</li>

		<li>
			<a href="<?php echo url('home/Car/index'); ?>">
				<img src="__PUBLIC__/picture/icon_main_hunche.png">
				<span>婚车</span>
			</a>
		</li>

		<li>
			<a href="<?php echo url('home/Miyue/miyue'); ?>">
				<img src="__PUBLIC__/picture/icon_main_miyue.png">
				<span>蜜月游</span>
			</a>
		</li>

		<li>
			<a href="<?php echo url('home/Oversea/index'); ?>">
				<img src="__PUBLIC__/picture/icon_main_haiwaihunli.png">
				<span>海外婚礼</span>
			</a>
		</li>


		<li>
			<a href="<?php echo url('home/Shoot/shoot'); ?>">
				<img src="__PUBLIC__/picture/icon_main_lifu.png">
				<span>婚纱礼服</span>
			</a>
		</li>

	</ul>
</section>

<!-- 广告位 -->
<section class="adImg pubItem">
	<a href="#"><img src=""></a>
</section>

<!-- tips -->
<section class="inTips items">
	<ul class="clearfix">
		<li class="li_1">
			<h3>结婚吉日 </h3>
			<div class="li1_d2"></div>
		</li>
		<li class="li_2">
			<h3>拍婚照</h3>
			<div class="li2_d2"></div>
		</li>
		<li class="li_3">
			<h3></h3>
			<div class="li3_d2"></div>
		</li>
	</ul>
</section>

<!-- 婚宴酒店 -->

<section class="hunYan pubItem itemType">
	<h3 class="tit">婚宴酒店<a href="http://m.daoxila.com/bj/HunYan-List">查看所有</a></h3>
	<ul class="clearfix">

		<?php foreach($hunyan as $k => $v){?>
		<li>
			<a href="__PUBLIC__/index.php/home/Hotel/hotel_xq?id=<?php echo $v['id']; ?>">
				<div><img src="__PUBLIC__/img/user/<?php echo $v['hotel_img1'];?>"  width="100px" height="100px"></div>
				<?php echo $v['hotel_name'];?>
			</a>
		</li>

		<?php }?>

	</ul>
</section>


<!-- 婚纱摄影 -->

<section class="hunSha pubItem itemType">
	<h3 class="tit">婚纱摄影<a href="http://m.daoxila.com/bj/HunShaSheYing/">查看所有</a></h3>
	<ul class="clearfix">

		<?php foreach($hunsha as $k => $v){?>
		<li>
			<a href="__PUBLIC__/index.php/home/Shoot/xiangQing?id=<?php echo $v['pbusinessId']; ?>">
				<div><img src="__PUBLIC__/<?php echo $v['pbusinessImg'];?>"  width="100px" height="100px"></div>
				<?php echo $v['pbusinessTitle'];?>
			</a>
		</li>
		<?php }?>

	</ul>
</section>


<!-- 蜜月游 -->

<section class="hunQing pubItem itemType">
	<h3 class="tit">蜜月游<a href="http://m.daoxila.com/bj/HunQing/">查看所有</a></h3>
	<ul class="clearfix">

		<?php foreach($miyue as $k => $v){?>
		<li>
			<a href="__PUBLIC__/index.php/home/MiYue/miyue_info?id=<?php echo $v['miyue_id']; ?>">
				<div ><img src="<?php echo $v['url'];?>" width="100px" height="100px"></div>
				<p><?php echo $v['address'];?></p>
			</a>
		</li>
		<?php }?>
	</ul>
</section>


<!-- 婚车 -->

<section class="hunChe pubItem itemType">
	<h3 class="tit">婚车<a href="http://m.daoxila.com/bj/HunChe/Class-Car">查看所有</a></h3>
	<ul class="clearfix">
		<?php foreach($hunce as $k => $v){?>
		<li>
			<a href="<?php echo url('car/xq'); ?>?id=<?php echo $v['car_id'];?>">
				<div><img src="__PUBLIC__/img/user/<?php echo $v['car_img'];?>"  width="100px" height="100px"></div>
				<p><?php echo $v['car_name'];?></p>
			</a>
		</li>
		<?php }?>
	</ul>
</section>


<!-- all list-->
<section class="all">
	<ul class="allNav clearfix">

		<li>婚宴酒店</li>



		<li>婚纱摄影</li>



		<li>蜜月游</li>



		<li>婚车</li>

	</ul>
	<div class="allItemCon">


		<div class="allItem allItem_1">
			<ul>

				<?php foreach($hunyans as $k => $v){?>
				<li>
					<a href="__PUBLIC__/index.php/home/Hotel/hotel_xq?id=<?php echo $v['id']; ?>">
						<img _src="__PUBLIC__/img/user/<?php echo $v['hotel_img1'];?>">
						<div class="allPartRi">
							<h3><?php echo $v['hotel_name'];?></h3>
							<div class="riInfo">
								<span class="price">¥<i>5988-6988</i>/桌</span>
								<span class="sells">已售<i>30</i></span>
							</div>
						</div>
					</a>
				</li>
				<?php }?>


			</ul>
			<div class="more"><a href="http://m.daoxila.com/bj/HunYan-List">查看更多</a></div>
		</div>



		<div class="allItem allItem_2">
			<ul>

				<?php foreach($hunshas as $k => $v){?>
				<li>
					<a href="__PUBLIC__/index.php/home/Shoot/xiangQing?id=<?php echo $v['pbusinessId']; ?>">
						<img src="__PUBLIC__/<?php echo $v['pbusinessImg'];?>">
						<div class="allPartRi">
							<h3><?php echo $v['pbusinessTitle'];?></h3>
							<div class="riInfo">
								<span class="xiang">独享价</span>
								<span class="price">¥<i>10980</i></span>
								<span class="old">¥18980</i></span>
							</div>
						</div>
					</a>
				</li>
				<?php }?>

			</ul>
			<div class="more"><a href="http://m.daoxila.com/bj/HunShaSheYing/">查看更多</a></div>
		</div>



		<div class="allItem allItem_3">
			<ul>

				<?php foreach($miyues as $k => $v){?>
				<li>
					<a href="__PUBLIC__/index.php/home/MiYue/miyue_info?id=<?php echo $v['miyue_id']; ?>">
						<img src="<?php echo $v['url'];?>">
						<div class="allPartRi">
							<h3><?php echo $v['address'];?></h3>
							<div class="riInfo">
								<span class="price">¥<i>7188</i></span>
							</div>
						</div>
					</a>
				</li>
				<?php }?>

			</ul>
			<div class="more"><a href="http://m.daoxila.com/bj/HunQing/">查看更多</a></div>
		</div>



		<div class="allItem allItem_4">
			<ul>



				<?php foreach($hunces as $k => $v){?>
				<li>
						<img src="__PUBLIC__/img/user/<?php echo $v['car_img'];?>">
						<div class="allPartRi">
							<h3><?php echo $v['car_name'];?></h3>
							<div class="riInfo">
								<span class="price">¥<i><?php echo $v['car_salary'];?></i></span>
								<span class="old">¥<?php echo $v['car_salary'];?></i></span>
							</div>
						</div>

				</li>
				<?php }?>


			</ul>
			<div class="more"><a href="http://m.daoxila.com/bj/HunChe/Class-Car">查看更多</a></div>
		</div>


	</div>
</section>

<!-- app下载 底部飘浮 -->
<!-- 	<section id="appDownBot">
		<div class="botCon">
			<a href="//www.daoxila.com/GongJu/Apps">
				<h3>新人下载APP</h3>
				<p>享黄金档vip预订优惠</p>
				<div class="btn">立即打开</div>
			</a>
			<span class="close"></span>
		</div>
	</section> -->

<!-- footer -->
<footer>
	<nav>
		<a href="/index/city/changeRoot">电脑版</a>
		<a class="appDown footAppDown">App下载</a>
		<a href="/about">关于我们</a>
		<a href="http://event.daoxila.com/M-tools/contact">联系我们</a>
		<a href="http://m.daoxila.com/ZiXun">婚尚资讯</a>
	</nav>
	<h3>CopyRight 2015 沪ICP备10039145号</h3>
	<h3>上海到喜啦信息技术有限公司</h3>
</footer>



<script src="__PUBLIC__/js/index-w.js"></script>

</body>

</html>
