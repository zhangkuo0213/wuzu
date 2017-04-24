$(document).ready(function() {
	var toLoad = $("#toLoad");  //数据加载提示
	var huiDetailDialog = $("#huiDetails");  //优惠详情弹层
	var huiInfo = $("#huiInfo"); //预约看店
	var huiLi = $("#hunDetail .detailHui li");  //商家是否有惠活动
	var huiDetailsInfo = $("#huiDetails .info");  //添加内容的版块
	var detailTit = $("#hunDetail .detailTit");  
	var huiDialogInput = $("#huiDetails .order input");  //优惠弹层下单手机输入框
	var huiInfoInput = $("#huiInfo .info input"); //预约看店手机输入框
	var taocan = $("#taocan");  //商家套餐父级
	var taocanLi = taocan.find("li").length; //商家套餐数
	var tocanLiHen = taocan.find("li").outerHeight();
	var placeLi = $("#places ul li").length;  //其他分店数
	var myCityShort = $.cookie("city");  //城市缩写
	var huiData = {
		city : $.cookie("city_id"),
		url : $("#hunDetail").attr("biz_url"),
		id : $("#hunDetail").attr("biz_id")
	};
	
	if( $("#hunDetail .detailBtnCon").size() ){
		var fixedDomTop = $("#hunDetail .detailBtnCon").offset().top;
		var fixedDetailBtn = $("#hunDetail .detailBtn");
	}
	var collect = $(".collect");  //收藏按钮
	var collectAction = dxlHttp.my + "ucenterjsonp/?act=onFavorite&"; //收藏接口
	var isCollect = 0;  //判断是否收藏过 标识
	
	//返回
	$("header .prev").touchClick(function(ev){  
		ev.preventDefault();
		var url = $.cookie("hunDetailBack") ? $.cookie("hunDetailBack") : "/" + $.cookie("city") + "/HunQing/";
		window.location.href = url;	
	});



	//2017.03.20   读取cookie  (dxl ==2? ==2删除 header 和 footer)&& （dxlm 是否存在 若存在 修改网页手机号）-----------
	var dxlUrlValue = $.cookie("dxl");
	var dxlmUrlValue = $.cookie("dxlm");
	if(dxlUrlValue =="2"){
		$("header").remove();
		$("footer").remove();
	};
	if(dxlmUrlValue){
		$(".publicWidth dl dd a").attr({
			href: "tel:"+dxlmUrlValue
		});
	};
	// ----------------------------------------

	
	//存下单url cookie
	$.cookie("orderUrl",window.location.href,{expires:7,domain:"daoxila." + s4Com,path:"/" });
	
	//返回顶部
	$.mTopCall();		
	
	//商家案例图片延迟加载
	$("#angli li").dxlLazyload();
	
	//初始化 
	/*setAnimate(huiDetailDialog,$(window).height(),0,null);
	setAnimate(huiInfo,$(window).height(),0,null);*/
	
	//窗口变化
	$(window).on({
		"resize":function(){
			if( $("#hunDetail .detailBtnCon").size() ){
				fixedDomTop =  $("#hunDetail .detailBtnCon").offset().top; //横竖屏切换时，重置fixed元素top值 
			}
			$.dialogAnimate(huiDetailDialog);
			$.dialogAnimate(huiInfo);
			$.positionSet();
		},
		"scroll":function(){  //页面领取优惠下单条定位
			$.positionSet();
		}
	})
			
	//显示预约看店弹层
	$(".detailBtn .kandian").touchClick(function(event){
		event.preventDefault();
		$.dialogOpen(huiInfo);
		$.dxlGaPageTracker("/VPTracker/WapHunYan/(MeiLunDaJiuDian)-Intro"); 
	});
	//关闭预约看店弹层 调用
	$("#huiInfo h1 span").touchClick(function(){
		$.dialogClose(huiInfo);
	});
	//预约看店下单
	if( $.cookie("user[mobile]") ){  //将cookie的手机号填入input
		huiInfoInput.val( $.cookie("user[mobile]") );
	}
	$("#huiInfo .info div").touchClick(function(){
		var _this = $(this);
		if( _this.hasClass("allowed")){
			return false;
		}
		_this.addClass("allowed");
		$.dxlGaPageTracker("/VPTracker/WapHunQing/Order/Submobile-common?userType=" + dxlGALoginStatus + "&orderType=KanDian");  //虚拟url
		if( !huiInfoInput.val().isPhone() ){
			$.mAlert("您输入的手机号码有误，请核实后重新输入。");
			return false;	
		}
		$.dxlInclud(["M-hunqing"],function(){
			huiInfoInput.blur();
			_this.removeClass("allowed");
			$.mHunqingOrder({
				"mall_biz_id" : huiData.id,  //商户id
				"order_from" : "Wap_" + myCityShort + "_HunQingDetail_KanDian_BottomCenter",
				"mobile" : $("#huiInfo .info input").val()   //手机
			},function(){
				$.dialogClose(huiInfo);
			});
		});
		
	})	
	
	//显示优惠弹层
	huiLi.touchClick(function(){
		$.dxlGaPageTracker("/VPTracker/WapHunQing/Order/Submobile-common?userType=" + dxlGALoginStatus + "&orderType=gift");  //虚拟url
		$.dialogOpen(huiDetailDialog);
		
		var _thisTag = $(this).attr("liTag"),
			_thisOffsetTop = 0;
		$("#huiDetails .info .infoItem").each(function() {
			if( $(this).attr("liTag") == _thisTag){
				_thisOffsetTop = $(this).offset().top;
				$("#huiDetails").animate({"scrollTop":_thisOffsetTop},500);
			}
		});
	});
	//关闭优惠弹层
	$("#huiDetails h1 span").touchClick(function(){
		$.dialogClose(huiDetailDialog);
	});
	
	//优惠弹层下单
	if( $.cookie("user[mobile]") ){  //将cookie的手机号填入input
		huiDialogInput.val( $.cookie("user[mobile]") );
	}
	$("#huiDetails .order span").touchClick(function(){
		if( !huiDialogInput.val().isPhone() ){
			$.mAlert("您输入的手机号码有误，请核实后重新输入。");
			return false;	
		}
		$.dxlInclud(["M-hunqing"],function(){
			$.mHunqingOrder({
				"mall_biz_id" : huiData.id,  //商户id
				"order_from" : "Wap_" + myCityShort + "_HunQingDetail_YouHui_BottomCenter",
				"mobile" : huiDialogInput.val(),    //手机
				"city" : $.cookie("city"),
				"title" : "领取优惠"
			});
		});
		huiDialogInput.blur();
		$.dialogClose(huiDetailDialog);
	})		
		
	//在线咨询
	$(".detailBtn a:first-child").touchClick(function(event){
		event.preventDefault();
		$.dxlCustomer(); 
	})
	
	//点击收藏/取消
	$.getJSON( dxlHttp.my + "ucenterjsonp/?act=checkFavorite&type=4&ids=" + $("body").attr("_bizid") + "&callback=?",function(data){
		if( data.code == 1 && $.cookie("user[id]") != null){
			if( data.data != ""){
				isCollect = 1;
				collect.removeClass("notCollect");
			}else{
				collect.addClass("notCollect");
			}
		}else{
			collect.addClass("notCollect");
		}
	})
	collect.touchClick(function(ev){    
		ev.preventDefault();
		var dataUserId = $.cookie("user[id]");   //用户登录状态
		var collectData = {
			type : 4,
			type_id : $("body").attr("_bizid"),   //商户ID
			name : $("#hunDetail .detailTit h3").text()   //商户名
		}
		
		if( dataUserId != null){   //判断用户是否登录
			if( !isCollect ){
				collectSuccess();
			}else{
				isCollect = 0;
				$.mAlert("取消收藏");
				collect.addClass("notCollect");
			}
			collectGet( collectData );
		}else{   //userid为空，提示用户登录
			$.dxlInclud(["dxlMLogin"],function(){
				$.mLogin({ 
					loginOk:function(){   //登录成功
						collectData.IsSave = 1;
						$.getJSON( collectAction + $.param(collectData) + "&callback=?",function(data){
							if(data.code == 1){   
								collectSuccess();
								collectGet( collectData );
							}else if(data.code == -2){
								isCollect = 1;
								$.mAlert("你已收藏过该商户");
								collect.removeClass("notCollect");
							}
						})
					},
					registerOk:function(){  //注册成功后收藏
						collectSuccess();
						collectGet( collectData );
					}
				});					
			})
		}
	})
	
	//收藏成功
	function collectSuccess(){
		isCollect = 1;
		$.mAlert("收藏成功 可在个人中心查看");
		collect.removeClass("notCollect");
	}
	
	//收藏接口
	function collectGet(par){  
		par.IsSave = isCollect;  
		$.getJSON(collectAction + $.param(par) + "&callback=?",function(data){});
	}
	
	//商家套餐超过三条点击显示
	if( taocanLi > 3){   //大于3条时
		var taocanMore = taocan.find(".more");
		var autoHeight = Math.ceil(taocanLi/3)*tocanLiHen+Math.ceil(taocanLi/3)*8;     // 
		taocanMore.css("display","block").find("a").html("查看全部" + taocanLi + "个套系");
		
		taocanMore.touchClick(function(event){
			event.preventDefault();
			if( $(this).hasClass("upMore") ){   
				taocan.find("ul").delay(250).animate({"height":tocanLiHen},250);
				$(this).removeClass("upMore").find("a").html("查看全部" + taocanLi + "个套系");
			}else{
				taocan.find("ul").delay(250).animate({"height":autoHeight+"px"},250);
				$(this).addClass("upMore").find("a").html("收起");
			}
		})
	}
	
	//查看全部分店
	if( placeLi >0 ){
		var placeMore = $("#places .more");
		placeMore.css("display","block").find("a").html("其他" + placeLi + "家分店");
		
		placeMore.touchClick(function(event){
			event.preventDefault();
			if( $(this).hasClass("upMore") ){   
				$("#places ul").delay(250).animate({"height":"0px"},250);
				$(this).removeClass("upMore").find("a").html("其他" + placeLi + "家分店").siblings();
			}else{
				$("#places ul").delay(250).animate({"height":placeLi*45+"px"},250);
				$(this).addClass("upMore").find("a").html("收起").siblings();
			}
		})
	}
	
	//分享新浪微博
	$(".riIcon .screen").touchClick(function(){ 
		var shareWord = "我在@到喜啦 找到了理想中的婚庆团队，花最少的钱，办#最梦幻的婚礼#现在通过到喜啦预定婚礼策划享受多重优惠，再送豪华大礼包，你也来看看吧！";
		var logoUrl = dxlHttp.s4 + "public/img/logo/wap.png";
		$.dxlWeiboShare(shareWord , logoUrl);
	});
	
	//领取优惠券
	$.dxlInclud(["M-receive"],function(){
		$.receive({
			service_type:"ceremony"
		},function(d){ 
			$.dxlInclud(["M-hunqing"],function(){
				$.mHunqingOrder({
					"mall_biz_id" : huiData.id,  //商户id
					"order_from" : "Wap_" + myCityShort + "_HunQingDetail_Coupon_Layer",
					"city" : $.cookie("city"),
					"orderOkAlert":"lx",
					"orderOkCallback":function(){
						$.getJSON(dxlHttp.n + "announce/?act=coupon&user_id=" + $.cookie("user[id]") + "&service_type=ceremony&channel=WAP&callback=?",function(data){
							$.mAlert(data.msg);
						})
					},
					"remark":"Wap底板页领取优惠券"
				});
			});
		});
	})
	
	//公共方法
	$.extend({
		/**
		*弹层动画
		**/
		"dialogAnimate" : function(dom,x,o,callback){ 
			if (!dom.length) return;  //确保元素存在
			dom.css({
				"width":$(window).width(), //宽
				"height":$(window).height() //高
			});
			x!==null ? dom.css({"left":x}) : "";  //x轴
			o!==null ? dom.css("opacity",o) : ""; //透明度
			$.isFunction(callback) ? setTimeout(callback,300) : "";
		},
		/**
		*打开弹层  le ri
		**/
		"dialogOpen" : function(obj,cb){  //对象，回调
			obj.show();
			$.dialogAnimate(obj,0,1,$.bodysHide);
			$.isFunction(cb) ? setTimeout(cb,300) : "";
		},
		/**
		*关闭弹层 le ri
		**/
		"dialogClose" : function(obj){  //对象
			$.bodysShow();
			setTimeout(function(){
				$.dialogAnimate(obj,$(window).width(),0,function(){
					obj.hide();
				});
			},100);
		},
		/**
		*body显示
		**/
		"bodysShow" : function(){   //弹层隐藏时，body其他元素显示
			$("body").removeClass("bodyHide");
		},
		/**
		*body隐藏
		**/
		"bodysHide" : function(){   //弹层显示时，body其他元素隐藏
			$("body").addClass("bodyHide");
		},
		/**
		*页面resize scroll时，下单条定位在上方	
		**/
		"positionSet":function(){
			fixedDomTop < $(document).scrollTop() ? fixedDetailBtn.addClass("scrollClass") : fixedDetailBtn.removeClass("scrollClass");
		}
	});
	
});