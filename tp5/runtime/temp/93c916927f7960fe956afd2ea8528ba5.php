<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/home/view/car/car_list.html";i:1493013818;}*/ ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>【北京婚车租赁_婚车租车_婚庆租车】价格 -到喜啦</title>
	<meta name="keywords" content="北京婚车租赁,北京婚车租赁价格,北京婚车租车,北京婚庆租车" />
	<meta name="description" content="到喜啦" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />  
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="full-screen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">  
	<link rel="apple-touch-icon" href="//s4.dxlfile.com/public/img/logo/wap/256_car.png"/>
	<link href="__PUBLIC__/css/ccdc7afb51094e12bddb103764f09f9b.css" rel="stylesheet" type="text/css" />
	<script src="__PUBLIC__/js/d42220c7656749f39a5923d976f788d3.js"></script>

</head>

<body>

    <header>
    	<div class="secTitMain">
			婚车
			<a class="prev" href="/"></a>
		</div>
	</header>
    <!-- header end -->
    <section id="conditionSort">
		<div class="sortItem">
			<div class="sortNav"><div class="selectShow"><span>品牌</span><i class="sortIconI"></i><i class="upIcon"></i></div></div>
			<div class="sortNav"><div class="selectShow"><span>智能排序</span><i class="sortIconI"></i><i class="upIcon"></i></div></div>
			<div class="sortNav"><div class="selectShow"><span>筛选</span><i class="sortIconI"></i><i class="upIcon"></i></div></div>
		</div>
		<!--弹层 品牌-->
		<div class="popup">
			
			<div class="popcontent">
				<div class="hotBrands">
					<h3>热门品牌</h3>
					<ul class="hots clearfix">				
						<?php foreach ($trr as $key => $value) { ?>
							<li class="brandType" data-brand="8"><img src="__PUBLIC__/img/user/<?php echo $value['car_type_img']; ?>"<span><?php echo $value['car_type_name'];?></span></li>
						<?php }?>
					</ul>
				</div>
				<div class="nores brandType" data-brand="">不限品牌</div>
				<!-- <div class="allBrands">
					<ul>
						
							<h3 id="A">A</h3>
						
							<li class="brandType" data-brand="1"><img src="__PUBLIC__/picture/20150909162758998.png-waplogo"/><i>奥迪</i></li>
						
							<li class="brandType" data-brand="21"><img src="__PUBLIC__/picture/20151012174411386.png-waplogo"/><i>阿斯顿马丁</i></li>
						
							<h3 id="B">B</h3>
						
							<li class="brandType" data-brand="7"><img src="__PUBLIC__/picture/20150909162910461.png-waplogo"/><i>宾利</i></li>
						
							<li class="brandType" data-brand="5"><img src="__PUBLIC__/picture/20150909162942151.png-waplogo"/><i>保时捷</i></li>
						
							<li class="brandType" data-brand="3"><img src="__PUBLIC__/picture/20150909162844198.png-waplogo"/><i>奔驰</i></li>
						
							<li class="brandType" data-brand="2"><img src="__PUBLIC__/picture/20150909162832559.png-waplogo"/><i>宝马</i></li>
						
							<li class="brandType" data-brand="23"><img src="__PUBLIC__/picture/20151104100924793.jpg-waplogo"/><i>别克</i></li>
						
							<li class="brandType" data-brand="26"><img src="__PUBLIC__/picture/20161215172929499.jpg-waplogo"/><i>本田</i></li>
						
							<h3 id="D">D</h3>
						
							<li class="brandType" data-brand="18"><img src="__PUBLIC__/picture/20150922094248821.png-waplogo"/><i>大众</i></li>
						
							<h3 id="F">F</h3>
						
							<li class="brandType" data-brand="14"><img src="__PUBLIC__/picture/20150909162925306.png-waplogo"/><i>法拉利</i></li>
						
							<li class="brandType" data-brand="27"><img src="__PUBLIC__/picture/20161215173041211.jpg-waplogo"/><i>丰田</i></li>
						
							<h3 id="H">H</h3>
						
							<li class="brandType" data-brand="10"><img src="__PUBLIC__/picture/20150908114114468.png-waplogo"/><i>悍马</i></li>
						
							<h3 id="J">J</h3>
						
							<li class="brandType" data-brand="4"><img src="__PUBLIC__/picture/2015090916241030.png-waplogo"/><i>捷豹</i></li>
						
							<li class="brandType" data-brand="12"><img src="__PUBLIC__/picture/20150911151505761.png-waplogo"/><i>金龙</i></li>
						
							<li class="brandType" data-brand="29"><img src="__PUBLIC__/picture/20161227102009509.png-waplogo"/><i>牧马人</i></li>
						
							<h3 id="K">K</h3>
						
							<li class="brandType" data-brand="9"><img src="__PUBLIC__/picture/20150908102536172.jpg-waplogo"/><i>凯迪拉克</i></li>
						
							<li class="brandType" data-brand="11"><img src="__PUBLIC__/picture/20150908133912336.jpg-waplogo"/><i>克莱斯勒</i></li>
						
							<h3 id="L">L</h3>
						
							<li class="brandType" data-brand="8"><img src="__PUBLIC__/picture/20150909162437383.png-waplogo"/><i>劳斯莱斯</i></li>
						
							<li class="brandType" data-brand="17"><img src="__PUBLIC__/picture/20150909104043209.jpg-waplogo"/><i>林肯</i></li>
						
							<li class="brandType" data-brand="13"><img src="__PUBLIC__/picture/20150908152542605.jpg-waplogo"/><i>路虎</i></li>
						
							<li class="brandType" data-brand="19"><img src="__PUBLIC__/picture/20150922094333408.png-waplogo"/><i>兰博基尼</i></li>
						
							<h3 id="M">M</h3>
						
							<li class="brandType" data-brand="6"><img src="__PUBLIC__/picture/20150909162423617.png-waplogo"/><i>玛莎拉蒂</i></li>
						
							<li class="brandType" data-brand="25"><img src="__PUBLIC__/picture/20161215172836222.jpg-waplogo"/><i>马自达</i></li>
						
							<h3 id="T">T</h3>
						
							<li class="brandType" data-brand="15"><img src="__PUBLIC__/picture/20150911145330886.png-waplogo"/><i>特斯拉</i></li>
						
							<h3 id="X">X</h3>
						
							<li class="brandType" data-brand="16"><img src="__PUBLIC__/picture/20150911145426251.png-waplogo"/><i>雪佛兰</i></li>
						
							<li class="brandType" data-brand="28"><img src="__PUBLIC__/picture/20161215173138168.jpg-waplogo"/><i>现代</i></li>
						
							<h3 id="活">活</h3>
						
							<li class="brandType" data-brand="24"><img src="__PUBLIC__/picture/20160630142845501.png-waplogo"/><i>活动</i></li>
						
						
					</ul>
				</div> -->
				<!-- <nav class="sortByCha">
					<a>#</a>
					
					<a href="#A">A</a>
					
					<a href="#B">B</a>
					
					<a href="#D">D</a>
					
					<a href="#F">F</a>
					
					<a href="#H">H</a>
					
					<a href="#J">J</a>
					
					<a href="#K">K</a>
					
					<a href="#L">L</a>
					
					<a href="#M">M</a>
					
					<a href="#T">T</a>
					
					<a href="#X">X</a>
					
					<a href="#活">活</a> -->
					
					
				</nav>
			</div>
		</div>
		<!--弹层 智能排序-->
		<div class="popup">
			<div class="popcontent bg1">
				<ul class="znpx">
					<li class="cur sortBy" data-sort="">综合排序</li>
					<a href=""><li class="sortBy" data-sort="price|desc">价格从高到低</li></a>
					<li class="sortBy" data-sort="price|asc">价格从低到高</li>
					<li class="sortBy" data-sort="hot|desc">人气从高到低</li>
				</ul>
			</div>
		</div>
		<!--弹层 筛选-->
		<div class="popup">
			
			<div class="popcontent bg1">
				<div class="sxtj">
					<h3>类型:</h3>
					<ul class="choose clearfix">
							<li class="filterType" data-type="Car">全部</li>
							<?php foreach ($brr as $key => $value) { ?>
								<li class="filterType" data-type="1"><?php echo $value['car_brand_name'];?></li>
							<?php }?>
			
					</ul>
				</div>
				<div class="sxtj">
					<h3>颜色:</h3>
					<ul class="choose color clearfix">
						
							<li class="filterColor" style="background:" data-color="Car">全部</li>
							<?php foreach ($crr as $key => $value) { ?>
								<li class="filterType" data-type="1"><?php echo $value['car_color_name'];?></li>
							<?php }?>
					</ul>
				</div>
			</div>
		</div>
		
	</section>
	<!--排序条件  end-->
	<section id="resultList">
		<ul><li class="brandType" data-brand="8">
							<?php foreach ($arr as $key => $value) { ?>
								<li><a href="<?php echo url('home/car/xq'); ?>?id=<?php echo $value['car_id'];?>" class="resultListItem"><dl class="clearfix"><dt><img src="__PUBLIC__/img/user/<?php echo $value['car_img']; ?>" width="150px" height="80px"></dt><dd><div class="list-detail-word"><span><?php echo $value['car_name'];?></span><span class="price">￥<?php echo $value['car_salary'];?>/5小时</span></div></dd><div class="fire">432</div></dl></a></li>
							<?php }?>
						</li>
		</ul>
		<div class="nomore"><span>没有更多了<span></div>
		<!--查询无结果 start-->
		<div class="noResult" ><p>很抱歉</p><p>没有找到相关内容哦</p></div>
		<!--查询无结果 end-->
	</section>
	

	
	
</body>
</html>