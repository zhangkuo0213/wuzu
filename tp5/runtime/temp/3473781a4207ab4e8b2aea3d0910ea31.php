<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/home/view/miyue/miyue_info.html";i:1493013819;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>【<?php echo $data['0']['address']; ?>】 <?php echo $data['0']['hotel_name']; ?></title>
    <meta name="keywords" content="蜜月游"/>
    <meta name="description" content="到喜啦蜜月游为你推荐，蜜月游攻略，蜜月游特色景点。"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="full-screen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">
	<link rel="apple-touch-icon" href="//s4.dxlfile.com/public/img/logo/wap/256_miyue.png"/>
	<link href="__PUBLIC__/css/13cfc93b00da461ebe3d74f33bd32c5e.css" rel="stylesheet">
	<script src="__PUBLIC__/js/2dfebdd159f74d52b9be939e559f925a.js"></script>
	
	
</head>
<body>

<div id="viewable" class="page-container">
	<header>
		<a class="prev" href="__PUBLIC__/index.php/home/miyue/miyue"></a>
		<h1 class="page-title">蜜月游详情</h1>
		<div class="header-right">
			<span class="icon-share"></span>
		</div>
	</header>
	
	<section class="main">
		<div class="product-box">
			<div class="product-img">
				
				<img src="<?php echo $data['0']['url']; ?>" alt="“坐拥努沙杜瓦海滩和南湾的壮丽全景，被誉为私人度假天堂”"><span class="num">1/1</span>
				
			</div>
			<!--  -->
			<div class="product-info">
				<h3>【<?php echo $data['0']['address']; ?>】 <?php echo $data['0']['hotel_name']; ?><?php echo $data['0']['hotel_level']; ?>星级 <?php echo $data['0']['youhui']; ?></h3>
				<!-- <p class="departure">上海 . 北京出发</p> -->
			</div>
		</div>
		
		<!-- 价格 -->
		<div class="price-list">
			<?php foreach ($data as $k => $v): ?>
				<div class="item">
					<div class="price">
						<dfn>&yen;</dfn><strong><?php echo $v['room_price']; ?></strong>/人
					</div>
					<span class="tag"><?php echo $v['style_name']; ?></span>
				</div>
			<?php endforeach ?>
			
			<!-- <div class="item">
				<div class="price">
					<dfn>&yen;</dfn><strong>3718</strong>/人
				</div>
				<span class="tag">单卧套房</span>
			</div>
			
			<div class="item">
				<div class="price">
					<dfn>&yen;</dfn><strong>5028</strong>/人
				</div>
				<span class="tag">泳池别墅</span>
			</div> -->
			
		</div>
		<!-- 收藏下单 -->
		<div class="toolbar">
			<!-- <i class="icon-star hollow"></i> -->
			<a class="icon-tel" href="tel:15010649586">电话咨询</a>
			<span class="btn">立即预订</span>
		</div>
		<!-- 航班 -->
		 
		<!-- <div class="mod flight">
			<h2>航班信息</h2>
			<div class="flight-line" id="tabBox">
				<nav class="tab-nav">
					<ul>
						
						<li>自行选择</li>
						
					</ul>
				</nav>
				<section class="tab-cont">
					
					<div class="tab-panel" id="tabPanel0">
						<ul>
							<li class="flight-list">
								<div class="hd">
									<span class="flight-start">自行选择</span>
									<span class="flight-end">巴厘岛</span>
								</div>
								<div class="bd">
									<div class="flight-start">
										<time>00:00</time>
										<p>自行选择</p>
									</div>
									<div class="flight-end">
										<time>00:00</time>
										<p>登巴萨国际机场</p>
									</div>
								</div>
								<div class="ft">自行选择</div>
							</li>
							<li class="flight-list">
								<div class="hd">
									<span class="flight-start">巴厘岛</span>
									<span class="flight-end">自行选择</span>
								</div>
								<div class="bd">
									<div class="flight-start">
										<time>00:00</time>
										<p>登巴萨国际机场</p>
									</div>
									<div class="flight-end">
										<time>00:00</time>
										<p>自行选择</p>
									</div>
								</div>
								<div class="ft">自行选择</div>
							</li>
						</ul>
						<div class="tab-dot" id="tabDot0">
							<ul>
								<li class="current"></li>
								<li></li>
							</ul>
						</div>
					</div>
					
				</section>
				
			</div>
		</div> -->
		 
		<!-- 自定义模块 -->
		<section class="define">
		
			<div class="mod">
				<h2>精彩玩点</h2>
				<div class="content">
						<?php echo $data['0']['miyue_info']; ?>
	                	<!-- <p>巴厘岛广阔如同镜面般的大海，倒映着蓝白交织丝绒般的苍穹，我们携手走过绵长的海岸线，脚印被随着浪花的喧闹时隐时现。</p>
	                		                
	                	<p>在巴厘岛没有“天堂”这个词，因为他们就生活在天堂里！</p>
	                		                
	                	<p>❤ 免签圣地</p>
	                		                
	                	<p>拎包即走 浪漫无限</p>
	                		                
	                	<p>❤ 精选酒店</p>
	                		                
	                	<p>海景酒店，享受二人私密世界</p>
	                		                
	                	<p>2种房型，套房/别墅 肆意选</p>
	                		                
	                	<p>❤ 全程含早</p>
	                		                
	                	<p>丰盛的酒店自助早餐，幸福一整天</p>
	                		                
	                	<p>❤ 超值赠送</p>
	                		                
	                	<p>&lt;蜜月大礼包&gt;</p>
	                		                
	                	<p>1.保证延迟退房至下午四时</p>
	                		                
	                	<p>2.登帕萨半天游行程</p>
	                		                
	                	<p>3.努沙杜瓦和库塔购物区的免费班车服务</p> -->
	                
					
					<div class="img-box" data_id="258">

					<?php foreach ($list[2] as $key => $v): ?>
						<img src="<?php echo $v['img_url']; ?>" alt="百乐海景酒店">
					<?php endforeach ?>
						
						<!-- <img src="__PUBLIC__/picture/20161209164910747.jpg" alt="百乐海景酒店">
						
						
						<img src="__PUBLIC__/picture/20161209165018310.jpg" alt="百乐海景酒店">
						
						
						<img src="__PUBLIC__/picture/20161209165341278.jpg" alt="百乐海景酒店"> -->
						
							
						<div class="mask">共<?php echo $count[2]; ?>张</div>
					</div>
					
				</div>
			</div>
		
			<div class="mod">
				<h2>酒店</h2>
				<div class="content">
					
	                	<p>【<?php echo $data['0']['hotel_name']; ?>】</p>
	                
	                	<p>星级：<?php echo $data['0']['hotel_level']; ?></p>

	                	<?php echo $data['0']['hotel_info']; ?>
	                
	                	<!-- <p>酒店在Taman Mumbul Hill山顶上，四周巴厘岛有名的丹绒贝诺瓦（Tanjung Benoa）海湾、努沙杜瓦海滩（Nusa Dua Beach）、珀尼达岛（Nusa Penida）以及阿贡火山（Agung Mountain）都能轻松俯瞰，设有屋顶游泳池，提供往返库塔（Kuta）市中心的免费双程班车。</p>
	                		                
	                	<p>宽敞的客房大窗户设计，透入大量自然光线，在房间能直接看见阿贡火山、海滩或泳池的壮丽景致。部分还有私人游泳池、大理石spa浴缸和小厨房。</p>
	                		                
	                	<p>无边游泳池是独立的不规则形状哦，客人可以享用奢华的按摩服务以及spa的招牌草药浴。</p>
	                		                
	                	<p>酒店的Sky Terrace屋顶餐厅为客人提供难忘的户外用餐体验，供应地中海风味美食和每日自助早餐。Cabana Bar酒吧享有泳池景致，供应鸡尾酒。 </p>
	                		                
	                	<p>❤热门设施：</p>
	                		                
	                	<p>免费WIFI覆盖、室外游泳池、机场班车、禁烟客房</p>
	                		                
	                	<p>❤房型：</p>
	                		                
	                	<p>A.	单卧室套房One Bedroom Suite 含早餐（3888元起/人）</p>
	                		                
	                	<p>B.	单卧室泳池别墅 One Bedroom Pool Villa 含早餐（5188元起/人）</p>
	                		                
	                	<p>❤交通环境：</p>
	                		                
	                	<p>距离努沙杜瓦海滩、南湾和情人崖 10 分钟车程</p>
	                		                
	                	<p>距离库塔市中心有 25 分钟车程</p> -->
	                
					
					<div class="img-box" data_id="259">
						
						<?php foreach ($list[3] as $key => $v): ?>
						<img src="<?php echo $v['img_url']; ?>" alt="百乐海景酒店">
						<?php endforeach ?>
						
						<!-- <img src="__PUBLIC__/picture/20161209165757697.jpg" alt="单卧室泳池别墅">
						
						
						<img src="__PUBLIC__/picture/20161209165852604.jpg" alt="单卧室套房">
						
						
						<img src="__PUBLIC__/picture/20161209165978633.jpg" alt="巴厘岛百乐海景酒店"> -->
						
						<div class="mask">共<?php echo $count[3]; ?>张</div>
					</div>
					
				</div>
			</div>
		
			<div class="mod">
				<h2>行程建议</h2>
				<div class="content">
					<?php echo $data['0']['active_info']; ?>
	                	<!-- <p>❤D1	到达酒店稍作休息</p>
	                		                
	                	<p>	到达机场后专车接送前往酒店，客人可于酒店稍作休息及享用酒店各种设施。</p>
	                		                
	                	<p>❤D2	登帕萨半天游</p>
	                		                
	                	<p>	酒店享用早餐后出发登帕萨半天游，参观巴厘岛博物馆、巴厘市場及巴厘艺术中心，晚上可享一次免费两人浪漫晚餐。(只限单卧室泳池别墅)</p>
	                		                
	                	<p>❤D3	努沙杜瓦和库塔购物区</p>
	                		                
	                	<p>	酒店享用早餐后可乘坐酒店免费班车服务到努沙杜瓦和库塔购物区，</p>
	                		                
	                	<p>內有各大知名百货公司及各式商店林立，让你尽情疯狂购物。(免费班车须预约)</p>
	                		                
	                	<p>❤D4	享用酒店设施</p>
	                		                
	                	<p>	享用早餐后可于酒店享用酒店各种设施，随后可选择延长住宿深入体验巴厘岛的风情或由专车接送前往机场</p> -->
	                
					
					<div class="img-box" data_id="260">
						
						<?php foreach ($list[4] as $key => $v): ?>
						<img src="<?php echo $v['img_url']; ?>" alt="百乐海景酒店">
						<?php endforeach ?>
						
						<!-- <img src="__PUBLIC__/picture/20161209165953249.jpg" alt="巴厘岛百乐海景酒店">
						
						
						<img src="__PUBLIC__/picture/20161209165991841.jpg" alt="巴厘岛百乐海景酒店">
						
						
						<img src="__PUBLIC__/picture/20161209170027453.jpg" alt="巴厘岛百乐海景酒店"> -->
						
						<div class="mask">共<?php echo $count[4]; ?>张</div>
					</div>
					
				</div>
			</div>
		
		</section>


		<!-- 预定须知 -->
		<div class="url-list">
			<ul>
				<li class="notice">签证须知</li>
				<li class="fee">费用说明</li>
				<li class="book">预订须知</li>
			</ul>
		</div>
		<!-- 蜜月游记
		<div class="mod travel-notes">
			<h2>蜜月游记</h2>
			<div class="list">
				<div class="item">
					<img src="__PUBLIC__/picture/bg3.jpg" alt="">
					<p>毛里求斯海岛蜜月游</p>
				</div>
				<div class="item">
					<img src="__PUBLIC__/picture/bg3.jpg" alt="">
					<p>毛里求斯海岛蜜月游</p>
				</div>
			</div>
		</div> -->
	</section>
</div>
<!-- 大图展示 -->
<section id="picShow" class="page-container pop-page pic-show">
  <header><span class="prev"></span></header>
  <div class="pic-list">
    <ul>
      
      <li class="pic">
          <img class="photo" src="<?php echo $data['0']['url']; ?>" alt="“坐拥努沙杜瓦海滩和南湾的壮丽全景，被誉为私人度假天堂”">
          <div class="yhtInfo">
              <div class="title">
                  <h4>“坐拥努沙杜瓦海滩和南湾的壮丽全景，被誉为私人度假天堂”</h4>
                  <p class="num"><span>1</span>/1</p>
              </div>
          </div>
      </li>
      
    </ul>
  </div>
</section>
<!-- 特色图展示 -->

<section id="picShowMod258" class="page-container pop-page pic-show">
  <header><span class="prev"></span></header>
  <div id="focus258" class="focus">
    <div class="hd">
        <ul></ul>
    </div>
    <div class="bd">
        <ul>
        	<?php foreach ($arr[2] as $key => $v): ?>
        		<li>
	            	<img src="<?php echo $v['img_url']; ?>" />
	            	<div class="description">
				    	<h4>百乐海景酒店</h4>
				    	<p class="num"><span><?php echo $key+1; ?></span>/<?php echo $count[2]; ?></p>
				    </div>
	            </li>
        	<?php endforeach ?>
            <!-- <li>
            	<img src="__PUBLIC__/picture/20161209164910747.jpg" />
            	<div class="description">
            			    	<h4>百乐海景酒店</h4>
            			    	<p class="num"><span>1</span>/4</p>
            			    </div>
            </li>
                    
            <li>
            	<img src="__PUBLIC__/picture/20161209165018310.jpg" />
            	<div class="description">
            			    	<h4>百乐海景酒店</h4>
            			    	<p class="num"><span>2</span>/4</p>
            			    </div>
            </li>
                    
            <li>
            	<img src="__PUBLIC__/picture/20161209165341278.jpg" />
            	<div class="description">
            			    	<h4>百乐海景酒店</h4>
            			    	<p class="num"><span>3</span>/4</p>
            			    </div>
            </li>
                    
            <li>
            	<img src="__PUBLIC__/picture/20161209165341180.jpg" />
            	<div class="description">
            			    	<h4>百乐海景酒店</h4>
            			    	<p class="num"><span>4</span>/4</p>
            			    </div>
            </li> -->
        
        </ul>
    </div>
  </div>
</section>

<section id="picShowMod259" class="page-container pop-page pic-show">
  <header><span class="prev"></span></header>
  <div id="focus259" class="focus">
    <div class="hd">
        <ul></ul>
    </div>
    <div class="bd">
        <ul>
			<?php foreach ($arr[3] as $key => $v): ?>
        		<li>
	            	<img src="<?php echo $v['img_url']; ?>" />
	            	<div class="description">
    			    	<h4>单卧室泳池别墅</h4>
    			    	<p class="num"><span><?php echo $key+1; ?></span>/<?php echo $count[3]; ?></p>
    			    </div>
	            </li>
        	<?php endforeach ?>

            <!-- <li>
            	<img src="__PUBLIC__/picture/20161209165757697.jpg" />
            	<div class="description">
            			    	<h4>单卧室泳池别墅</h4>
            			    	<p class="num"><span>1</span>/3</p>
            			    </div>
            </li>
                    
            <li>
            	<img src="__PUBLIC__/picture/20161209165852604.jpg" />
            	<div class="description">
            			    	<h4>单卧室套房</h4>
            			    	<p class="num"><span>2</span>/3</p>
            			    </div>
            </li>
                    
            <li>
            	<img src="__PUBLIC__/picture/20161209165978633.jpg" />
            	<div class="description">
            			    	<h4>巴厘岛百乐海景酒店</h4>
            			    	<p class="num"><span>3</span>/3</p>
            			    </div>
            </li> -->
        
        </ul>
    </div>
  </div>
</section>

<section id="picShowMod260" class="page-container pop-page pic-show">
  <header><span class="prev"></span></header>
  <div id="focus260" class="focus">
    <div class="hd">
        <ul></ul>
    </div>
    <div class="bd">
        <ul>
        	<?php foreach ($arr[4] as $key => $v): ?>
        		<li>
	            	<img src="<?php echo $v['img_url']; ?>" />
	            	<div class="description">
				    	<h4>巴厘岛百乐海景酒店</h4>
				    	<p class="num"><span><?php echo $key+1; ?></span>/<?php echo $count[4]; ?></p>
				    </div>
	            </li>
        	<?php endforeach ?>
            <!-- <li>
            	<img src="__PUBLIC__/picture/20161209165953249.jpg" />
            	<div class="description">
            			    	<h4>巴厘岛百乐海景酒店</h4>
            			    	<p class="num"><span>1</span>/3</p>
            			    </div>
            </li>
                    
            <li>
            	<img src="__PUBLIC__/picture/20161209165991841.jpg" />
            	<div class="description">
            			    	<h4>巴厘岛百乐海景酒店</h4>
            			    	<p class="num"><span>2</span>/3</p>
            			    </div>
            </li>
                    
            <li>
            	<img src="__PUBLIC__/picture/20161209170027453.jpg" />
            	<div class="description">
            			    	<h4>巴厘岛百乐海景酒店</h4>
            			    	<p class="num"><span>3</span>/3</p>
            			    </div>
            </li> -->
        
        </ul>
    </div>
  </div>
</section>


<!-- 须知 -->
<div id="helpPage" class="page-container pop-page">
	<header>
		<span class="prev"></span>
		<nav class="help-nav">
			<ul>
				<li>签证须知</li>
				<li>费用说明</li>
				<li>预订须知</li>
				<i class="slide-border"></i>
			</ul>
		</nav>
	</header>
	<div class="main">
		<div class="help-content">
			<ul>
				<li>
					<div class="text">
						<?php echo $data['0']['visa']; ?>
		<!-- 【代办签证须知】：<br>• 巴厘岛免签<br>•半年以上有效期护照 -->
					</div>
					<footer class="footer"><div class="btn">代办签证找到喜啦</div></footer>
				</li>
				<li>
					<div class="text">
						
		                <?php echo $data['0']['payexplain']; ?>
		                <!-- 【费用包含】<br>1、3晚住宿含早<br>2、机场来回接送<br>3、登帕薩半天游行程<br>4、保证延迟退房至下午四时<br>5、努沙杜瓦和库塔购物区的免费班车服务 -->
		                
					</div>
				</li>
				<li>
					<div class="text">
						<?php echo $data['0']['reserve']; ?>
						<!-- 【所有价格均根据国际汇率有所浮动】<br>1、购买时需提供的资料: 结婚登记证书、旅行证件的副本。<br>2、预定流程: 选择酒店房型、入住及退房日期后联络我们的服务人员。<br>3、我们的产品针对蜜月旅客的套餐。<br>4、单房差:不适用于本产品。<br>5、预订时，请务必持有在行程期内超过6个月有效期的护照，否则因此而不能出行造成的损失将自行承担。<br>6、在预定确认后，为了不影响您的度假，需要您再最后付款期限前付款，若未能及时付款，相关资料将自动取消。<br>7、付款之后如需取消，我们将尽力为您降低损失。所有酒店等取消规则以付款当时的确认书约定为准。<br>8、因证件（破损，过期，遗失等情况），或拒签等原因导致不可出行的，需要自行承担已产生的费用。<br>9、酒店星级标准均无明确的星级划分，可能我们提供的星级参考与其他网站标准不同，请在预定时认真斟酌。<br>10、如遇自然原因（台风、地震、海啸、暴雨、雷电、大雾等）、航班（延误、机械故障等）、战争、罢工、政府行为等一切不可抗力因素，我公司将尽力协助您完成度假、减少损失。但不能承担由此引起的任何损失。 -->
					</div>
				</li>
			</ul>
			
		</div>
	</div>
</div>


</body>
</html>