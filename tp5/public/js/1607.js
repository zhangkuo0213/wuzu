$(function(){
	var _id = opts.ID||window.location.pathname.split('/')[3]||"",		//活动id
		_coupon_id = (opts.coupon_id+"").replace(/,/g, "|"),          //coupon id
		_order_pro = opts.order_pro||"",		//下单类型
		_pro_smsflag = opts.pro_smsflag||"",		//是否发送促销报名短信
		_time = (opts.time=='null'||opts.time=="") ? "2015/1/1" : opts.time,	//截止日期 格式："2015/12/30"
	    _city = $.cookie("city"),
		_promotion_sign = (opts.promotion_sign=='null'||opts.promotion_sign=="") ? "" : opts.promotion_sign;
	var _endTime = _time.split(' ');  //截止日期
	var _mobile = $(".mobile");  //底部报名手机号

	//返回上一步
	$(".prev").touchClick(function(){
		event.preventDefault();
		var historyUrl = $.isUrlPar("eventBackUrl");
		window.location = historyUrl ? historyUrl : dxlHttp.m;
	})

	//倒计时
	$.dxlInclud(["dxlCountdown"],function(){
		$(".timeBox").dxlNormalCount(
			{
				timeL: _endTime[0], 		//"2015/12/30"
				timeS: _endTime[1], //设置时分秒
				timeUnit: "day"	    // 设置返回的形式  天、时、 分、 秒
			},function(d){	  // 执行的回调  返回的值存储在 参数d对象内
				$(".timeBox").html('<i class="day">' + d.day + '</i>天<i class="hour">' + d.hour + '</i>时<i class="min">' + d.minute +  '</i>分<i class="sec">' + d.second + '</i>秒');
			}
		);
	});

	//延迟加载
	$("#hunYan").dxlLazyload();
	$("#hunSha").dxlLazyload();
	$("#hunQing").dxlLazyload();
	$(".activeRule").dxlLazyload();

	//设备平台判断
	$.mAppInit({
		"appleWeixin" : isWap,	//iphone微信
		"appleApp" : isApp,		//iphoneApp
		"appleBrowser" : isWap,	//iphone浏览器
		"iPadWeixin" : isWap,	//ipad微信
		"iPadApp" : isApp,		//ipadApp
		"iPadBrowser" : isWap,	//ipad浏览器
		"androidWeixin" : isWap,	//android微信
		"androidApp" : isApp,	//androidApp
		"androidBrowser" : isWap,//android浏览器
		"otherBrowser" : isWap	//其它浏览器
	})

	//app   bind dxlAppAction to element[dxlAppTouchAction]
	function isApp(){
		$(".more").touchClick(function(){});
		$("body").touchClick(function(event) {
			$("a[dxlAppRemoveHref]").removeAttr("href").removeAttr("dxlAppRemoveHref");
			var eventTarget = event.target;
			! function() {
				if (eventTarget == null) return;
				if ($(eventTarget).attr("dxlAppTouchAction")) {
					try {
						eval($(eventTarget).attr("dxlAppTouchAction"));
					} catch (error) {}
				}
				eventTarget = eventTarget.parentElement;
				arguments.callee();
			}();
		});
	}

	//wap
	function isWap(){
		$("header").css("display","block");
	}

	//领取返现  下单
	$(".getReturn").touchClick(fnOrder);

	//底部下单
	$.cookie("user[mobile]") ? _mobile.val($.cookie("user[mobile]")) : "";
	$(".toEntry").touchClick(function(){
		if(!_mobile.val().isPhone()){
			$.mAlert("请输入正确的手机号");
			return;
		}
		fnOrder(1);
	})

	//下单公共方法
	function fnOrder(hasMobile){
		$.dxlInclud(["M-hssyOrder"],function(){
			$.mHssyOrder({
				mobile:hasMobile ? _mobile.val() : "",
				order_from:'Wap_CuXiao_Schedule_' + _id,  //下单位
				promotion_sign:_promotion_sign,   //下单标识
				order_pro:_order_pro,
				pro_id:_id,
				pro_name:$.trim($(".secTitMain").text()),
				pro_smsflag:_pro_smsflag,
				remark:_promotion_sign,
				orderOkCallback:function(data){
					if(parseInt(_coupon_id)){
						var userid = $.cookie("user[id]");
						$.getJSON(dxlHttp.n + 'announce/?act=coupon&user_id=' + userid + '&coupon_id=' + _coupon_id +'&channel=' + 'WAP' + '&callback=?',function(data){
							if(data.code == 1){
								$.mAlert("恭喜您！优惠劵领取成功");
							}else{
								$.mAlert("优惠劵领取失败，稍后客服会与您联系");
							}
						});
					}
				}
			})
		})
	}

	$(window).resize(function(){
		$("#cityMain").css({  //头图
			"font-size":$(window).width()*12/320
		});
		$('.items ul li img').css( "height", ($(window).width() - 12 * 1.2) * 0.88 / 2 * 150 / 240 );
	});
	$(window).resize();

})