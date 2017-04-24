//判断金额是否为正整数和0==为正整数和0返回true,不为正整数和0返回false
var is_money_withzero=function(value){
	var reg=/^[1-9]\d*$|^0$/;
	return reg.test(value);
};

// 2017.03.20 增加cookie 记录dxl= & dxlm = 值---------------
var dxlUrlValue = $.isUrlPar("dxl")||"";
var dxlmUrlValue = $.isUrlPar("dxlm")||"";

// 记录各自 cookie
if(dxlUrlValue){
	$.cookie("dxl", dxlUrlValue);
};	
if(dxlmUrlValue){
	$.cookie("dxlm", dxlmUrlValue);
};
//---------------------------------------


$(document).ready(function() {
	//2017.03.20   读取cookie  (dxl ==2? ==2删除 header 和 footer)-----------
	var dxlUrlValue2 = $.cookie("dxl");
	if(dxlUrlValue2 =="2"){
		$("header").remove();
		$("footer").remove();
	};
	// ----------------------------------------


	var CITY = $.cookie('city'),
		urlTemp = dxlHttp.m + "index/jsonpnew/index?act=getHunQingList&callback=?&",  //瀑布流接口
		allStyleSpan = $(".allSeller .selectShow span"), // 全部商区 span
		allSellerSpan = $(".allStyle .selectShow span"),  // 全部风格  span
		defaultSortSpan = $(".defaultSort .selectShow span"); //智能排序  span


	//记录cookie
	$.cookie("hunDetailBack",window.location.href,{expires:7,domain:"daoxila." + s4Com,path:"/" });
	
	//把页面内的数据清除。
	$('#hunList ul').html("").css('display','block');
	//关闭广告条
	$('.banner .close').touchClick(function(e){
		e.stopPropagation();
		e.preventDefault();
		$('.banner').slideUp(500);
	})
	
	//底部app下载调用
	$.wFootAppDown();
	
	//返回顶部
	$.mTopCall();
	
	//搜索
	$.mSearch(function(){
		$.dxlGaPageTracker("/VPTracker/WapHunQing/Search");
	});
	
	//动态取值 排序区域宽高
	sortUlWidth();
	$(window).on("resize",sortUlWidth);
	function sortUlWidth(){
		$("#hunSort .sortNav .popup").css({"width":$(window).width(),"height":$(window).height() - 86});
		$('.banner img').height($(window).width()*50/320);
	}
	
	//商户风格一级标签
	$('.selectTag').touchClick(function(){
		$('.allStyle').find('.active').removeClass('active');
		$(this).parent().addClass('active');
	});
	
	//点击显示筛选条目
	$('.selectShow').touchClick(function(e){
		//添加虚拟url
		var parentIndex = $(this).parent().index();   //父级的索引
		var gaUrl = "";
		switch( parentIndex ){
			case 0 : gaUrl = "/VPTracker/WapHunQing/sh/ShangHu-filter?filter=1" ; break;	
			case 1 : gaUrl = "/VPTracker/WapHunQing/sh/ShangHu-filter?filter=2" ; break;	
			case 2 : gaUrl = "/VPTracker/WapHunQing/sh/ShangHu-filter?filter=3" ; break;	
		}
		$.dxlGaPageTracker( gaUrl );
		
		$(this).next(".popup").toggleClass("show")
			.parent().siblings().find(".popup").removeClass("show");
		
		$(this).find("span").toggleClass("cur")
			.parents('.sortNav').siblings().find("span").removeClass("cur");
		
		if($(this).next(".popup").hasClass('show')){
			$("#hunList,footer").css("display","none");
			$.dxlGaPageTracker('/VPTracker/WapHunShaSheYing/'+ $.cookie('city') +'/ShangHu-filter?filter=' + $(this).data('type'));
		} else {
			$('input').blur();
			$("#hunList,footer").css("display","block");
		};
	});
	
	//重置
	$('.defaultSort .reset').touchClick(function(e){
		$('.defaultSort .group .selected').removeClass('selected');
		$('.defaultSort .group input').css({"border-color":'#d4d4d4',color:'#ccc'}).val("");
	});
	
	//关闭排序条件总区域
	function sortItemHide(){
		setTimeout(function(){
			$('input').blur();
			$("#hunSort .sortNav .popup").removeClass("show");
			$("#hunSort .sortNav span").removeClass("cur");
			$("#hunList,footer").css("display","block");
		},300);
	}
	
	//底部提示条
	var toLoad = $('.loadWrap');
	// 滑动获取数据	
	$.dxlInclud(["fall"],function(){
		var par = {
			region: allStyleSpan.data("url"),   //全部商区
			style: allSellerSpan.data("url"),  // 全部风格 
			sort : defaultSortSpan.data("url"),  //智能排序 
			city: $.cookie('city')
		}
		
		$.isUrlPar("q") ? par.q =  $.isUrlPar("q") : "";
		$("#hunSort").data("help") ? par.helpTag = $("#hunSort").data("help") : "";
		var option = {
			'setting': {
				url: urlTemp + $.param(par), //获取数据网址
				tpl: tpl,
				dom:"ul", //竖列容器元素标签（可省略）
				selector: "#hunList", //瀑布流容器
				preLoad: false, //无图片或无需预加载时设为false, 默认为true（可省略）
				imgUrl: "path",
				initNum: 15, //初始化获取数量
				newNum: 15, //每次新获取数量
				watchHeight: 100 //页面离底部多远拉取数据，单位px（可省略）
			},
			'haddle': {
				'onLoading': onLoading,
				'onLoadingOk': loadingOk,
				'onComplete': onComplete,
				'onNoData': onNoData
			}
        };	 
		$.dxlWaterFall(option);
		
		//加载数据中处理
		function onLoading(){
			toLoad.show();
		}
		
		//本次拉取成功处理
		function loadingOk(){
		}

		//加载数据中处理
		function onComplete() {
			toLoad.hide();
		}
		
		//首次获取数据量为0时
		function onNoData(){
			toLoad.hide();
			var str = '<div class="dataEmpty"><h3>没有找到合适的商户</h3><p>换个条件再试试吧</p></div>';
			$("#hunList").append(str);
		}
		
		//全城商区
		$(".allSeller .popup li").touchClick(function(){
			publicAjax($(this),allStyleSpan,"region");
		});
		
		//全部风格
		$(".allStyle .popup div:nth-child(3)").find("li").touchClick(function(){
			publicAjax($(this),allSellerSpan,"style");
		});
		
		//智能排序 
		$(".defaultSort .popup li").touchClick(function(){
			publicAjax($(this),defaultSortSpan,"sort");
		});
		
		//全城商区/全部商户请求接口时传参
		function publicAjax(elem1,elem2,pa){
			var _thisText = $.trim(	elem1.text() ),
				_thisUrl = $.trim( elem1.attr("url") );
			
			//赋值 （用户所选）
			elem2.text( _thisText );
			elem2.attr("data-url",_thisUrl);
			elem1.addClass("selected").siblings().removeClass("selected");
			
			//请求
			if( $.dxlWaterFall && $.isFunction( $.dxlWaterFall ) ){
					var liHuiDiv = $('.defaultSort .group').eq(0);  
					var priceDiv = $(".defaultSort .popup");
				
					$("#hunList ul").empty();
					$.dxlWaterFall("emptyData");
					par[pa] = elem1.attr("url") != "" ? elem1.attr("url") : "";
					option.setting.url = urlTemp + $.param(par);
					$(".dataEmpty").remove();
					$.dxlWaterFall(option);
				}
			sortItemHide();
		}
	});
	
	//瀑布流设置对象生成器
	function tpl(data,obj) {
		
		//如果最低价格 和 最高价格一样，取其中一个,如果为空则不显示
		if(data.price_min != ""){
			if(data.price_max != ""){
				data._price = data.price_min == data.price_max ? data.price_min : data.price_min + '-' + data.price_max;  
			}else{
				data._price = data.price_min;
			}
		}
		function setPriceDom(){
			var priceStr = "";
			if(data._price != undefined){
				priceStr = '<p class="row1">' +
								'<span class="big">￥<i>' + data._price + '</i></span>' + 
							'</p>';
			}else{
				priceStr = '';
			}
			return priceStr;
		}
		
		//优惠信息
		data._actInfo = "";
		if(data.has_daodianli_flag){
			data._actInfo += '<span class="li"></span>';
		}
		if(data.has_youhui_flag){
			data._actInfo += '<span class="hui"></span>';
		}
		/*if(data.payConfig && parseInt(data.payConfig.cashback_rule_parsed) && data.tollMode == 2){
			data._actInfo += '<span class="fan"></span>';
		}*/
		if(data.tollMode == 2 && data.cooperationFlag != 0){
			data._actInfo += '<span class="fu"></span>';
		}
		
		//地区
		var placeArr = [];
		if(data.branch_region){
			if(data.branch_region.length < 3){
				data._branchRegion = data.branch_region.join(" ");
			}else{
				for(var i=0; i<2;i++){
					placeArr.push( data.branch_region[i] );
				}
				placeArr = placeArr.join(" ");
				data._branchRegion = placeArr + "…等" + data.branch_region.length + "个";
			}
		}
		
		var html = '<li>' + 
						'<a href="' + data.url + '" class="hunListItem">' +
							'<dl class="clearfix">' +
								'<dt>' +
								'<img src="' + data.image + '" >' +
							'</dt>' +
								'<dd>' + 
									'<div class="title">' +
										'<h3>' + data.name + '</h3>' +
										'<div class="icons">' + data._actInfo + '</div>' +
									'</div>' +
									'<div class="returnCash">' + setPriceDom() + 
										'<p class="row2">' +
											'<span class="district">' + data._branchRegion + '</span>' +
											'<span class="style">' + data.style + '</span>' +
										'</p>' +
									'</div>' +
								'</dd>' +
							'</dl>' +
						'</a>' +
					'</li>';
		
		obj.append(html);
	}
})
