	// --------------
	// 2017.03.20 增加cookie 记录dxl= & dxlm = 值
	var dxlUrlValue = $.isUrlPar("dxl")||"";
	var dxlmUrlValue = $.isUrlPar("dxlm")||"";

	// 记录各自 cookie
	if(dxlUrlValue){
		$.cookie("dxl", dxlUrlValue);
	};	
	if(dxlmUrlValue){
		$.cookie("dxlm", dxlmUrlValue);
	};
	//---------------

$(document).ready(function () {
	//2017.03.20   读取cookie  (dxl ==2? ==2删除 header 和 footer)------------
	var dxlUrlValue2 = $.cookie("dxl");
	if(dxlUrlValue2 =="2"){
		$("header").remove();
		$("footer").remove();
	};
	// -----------------------------------


	var CITY = $.cookie('city');
	var urlTemp = dxlHttp.m + "index/jsonpnew/index?act=hunShaList&callback=?&"; //瀑布流接口
	var groupSubmit = $(".group.submit"); //筛选 确认按钮
	var loadWrap = $(".loadWrap"); //加载提示
	var allSellerSpan = $(".allSeller .selectShow span"); //全部商区 span
	var allStyleSpan = $(".allStyle .selectShow span"); //全部商户  span
	var smartSortSpan = $(".smartSort .selectShow span"); //智能排序 span
	var par = {
		region: allSellerSpan.attr("url"), //商区
		feature: allStyleSpan.attr("url"), //酒店商户类型
		city: $.cookie("city") //智能排序
	}
	var minPriceInput = $(".priceRange .dSpanInput").eq(0).find("input"); //最低价格输入框
	var maxPriceInput = $(".priceRange .dSpanInput").eq(1).find("input"); //最高价格输入框
	var priceRangeSpan = $(".priceRange span"); //价格tag元素 
	var jsonPrice = {}; //价格tag json

	//记录cookie
	$.cookie("weddingListUrl", window.location.href, {
		expires: 7,
		domain: "daoxila." + s4Com,
		path: "/"
	});

	//点击指定区域  input失焦
	$("#sellerSort").touchClick(function (e) {
			if (e.target.tagName !== "INPUT") {
				$("input").blur();
			}
		})
		//把页面内的数据清除。
	$("#sellerList ul").html("").css("display", 'block');
	//关闭广告条
	$(".banner .close").touchClick(function (e) {
		e.stopPropagation();
		e.preventDefault();
		$(".banner").slideUp(500);
	})

	//底部app下载调用
	$.wFootAppDown();

	//返回顶部
	$.mTopCall();

	//搜索
	$.mSearch(function () {
		$.dxlGaPageTracker("/VPTracker/WapHunShaSheYing/Search");
	});

	//动态取值 排序区域宽高
	sortUlWidth()
	$(window).on("resize", sortUlWidth);


	//全部商户 婚宴/婚纱/婚庆业务切换
	$(".selectTag").touchClick(function () {
		$(".allStyle").find(".active").removeClass("active");
		$(this).parent().addClass("active");
	});

	//点击显示筛选条目
	$(".selectShow").touchClick(function (e) {

		//添加虚拟url
		var parentIndex = $(this).parent().index(); //父级的索引
		var gaUrl = "";
		switch (parentIndex) {
		case 0:
			gaUrl = "/VPTracker/WapList/ShangQu";
			break;
		case 1:
			gaUrl = "/VPTracker/WapList/YeWu";
			break;
		case 2:
			gaUrl = "/VPTracker/WapList/PaiXu";
			break;
		case 3:
			gaUrl = "/VPTracker/WapList/ShaiXuan";
			break;
		}
		$.dxlGaPageTracker(gaUrl);

		$(this).next(".popup").toggleClass("show")
			.parent().siblings().find(".popup").removeClass("show");

		$(this).find("span").toggleClass("cur")
			.parents('.sortNav').siblings().find("span").removeClass("cur");

		if ($(this).next(".popup").hasClass("show")) {
			$("#sellerList,footer").css("display", "none");
			$.dxlGaPageTracker('/VPTracker/WapHunShaSheYing/' + $.cookie("city") + '/ShangHu-filter?filter=' + $(this).data("type"));
			if ($(this).data("type") == "4") {
				groupSubmit.show();
			} else {
				groupSubmit.hide();
			}
		} else {
			groupSubmit.hide();
			$("input").blur();
			$("#sellerList,footer").css("display", "block");
		};

	});

	//折扣和优惠
	$(".defaultSort .discounts span").touchClick(function (e) {
		$(this).toggleClass("selected");
	});

	//价格区间（元）
	$(".defaultSort .priceRange span").touchClick(function (e) {
		$(this).toggleClass("selected").siblings().removeClass("selected");
	});

	//将价格tag存入json
	priceRangeSpan.each(function (i, n) {
		if ($(this).hasClass("dSpanInput")) return;
		var _thisText = $(this).text();
		jsonPrice[i] = _thisText.match(/下|上/) ? (_thisText.indexOf("下") != -1 ? "-" + parseInt(_thisText) : parseInt(_thisText) + "-") : _thisText;
	})

	// 滑动获取数据	
	$.dxlInclud(["fall"], function () {
		$.isUrlPar("q") ? par.q = $.isUrlPar("q") : "";
		$("#sellerSort").data("help") ? par.helpTag = $("#sellerSort").data("help") : "";
		var option = {
			"setting": {
				url: urlTemp + $.param(par), //获取数据网址
				tpl: tpl,
				dom: "ul", //竖列容器元素标签（可省略）
				selector: "#sellerList", //瀑布流容器
				preLoad: false, //无图片或无需预加载时设为false, 默认为true（可省略）
				imgUrl: "path",
				initNum: 15, //初始化获取数量
				newNum: 15, //每次新获取数量
				watchHeight: 100 //页面离底部多远拉取数据，单位px（可省略）
			},
			"haddle": {
				"onLoading": onLoading,
				"onLoadingOk": loadingOk,
				"onComplete": onComplete,
				"onNoData": onNoData
			}
		};
		$.dxlWaterFall(option);

		//input聚焦 失焦
		$(".priceRange input").focus(function () {
			$(this).parent().addClass("selected").siblings(".dSpanInput").addClass("selected");
			groupSubmit.css({
				position: "absolute",
				top: $(".popup.show").height() - 20 + "px"
			});
		}).blur(function () {
			if ($(this).val() == "") {
				$(this).parent().removeClass("selected").siblings(".dSpanInput").removeClass("selected");
			};
			groupSubmit.css({
				position: "fixed",
				top: ""
			});
		});

		//价格筛选后赋值输入框
		priceRangeSpan.touchClick(function () {
			if ($(this).hasClass("dSpanInput")) return;
			var minPrice,
				maxPrice;
			priceStr = $(this).text();
			if (!priceStr) return;
			if (priceStr.indexOf("-") != -1) {
				minPrice = parseInt(priceStr.substring(0, priceStr.indexOf("-")));
				maxPrice = parseInt(priceStr.substr(priceStr.indexOf("-") + 1));
			}
			if (priceStr.indexOf("以下") != -1) {
				maxPrice = parseInt(priceStr);
			}
			if (priceStr.indexOf("以上") != -1) {
				minPrice = parseInt(priceStr);
			}
			minPriceInput.val(minPrice);
			maxPriceInput.val(maxPrice);
			priceRangeSpan.find("input").removeClass("cur");
		})

		//价格区间输入框，匹配价格tag
		$(".priceRange input").on("input", function () {
			var minPriceInputVal = parseInt(minPriceInput.val()) || "";
			var maxPriceInputVal = parseInt(maxPriceInput.val()) || "";
			var priceStr = minPriceInputVal + "-" + maxPriceInputVal;
			$(this).parent().parent().siblings().find("span").removeClass("selected");

			$.each(jsonPrice, function (i, v) {
				v == priceStr && priceRangeSpan.eq(i).addClass("selected");
			})
		})

		//提交
		$(".defaultSort .submit").touchClick(function (e) {
			var _price = priceJudge();

			//价格为空或价格左小右大符合条件
			if (!_price || (!_price.unfill && _price[1] < _price[0])) {
				$.mAlert("价格区间格式不正确，请重新输入");
				return false;
			}

			//符合条件：
			if ($.dxlWaterFall && $.isFunction($.dxlWaterFall)) {
				$("#sellerList ul").empty();
				$.dxlWaterFall("emptyData");

				var group0 = $(".defaultSort .group").eq(0).find("span"),
					regionVal = $.trim(allSellerSpan.attr("url")), //商区
					featureVal = $.trim(allStyleSpan.attr("url")); //商户
				var obj = {
					city: $.cookie("city"),
					min_price: _price[0],
					max_price: _price[1],
					region: regionVal == "" ? "" : regionVal, //商区
					feature: featureVal == "" ? "" : featureVal, //商户
					sort: smartSortSpan.attr("url"), //智能排序
					libao: $(group0[0]).hasClass("selected") ? 1 : 0,
					youhui: $(group0[1]).hasClass("selected") ? 1 : 0,
				};
				option.setting.url = urlTemp + $.param(obj);
				$(".dataEmpty").remove();
				$.dxlWaterFall(option);
				sortItemHide();
			}
		});

		//全城商区
		$(".allSeller .popup li").touchClick(function () {
			var _thisText = $.trim($(this).text()),
				_thisUrl = $.trim($(this).attr("url"));
			$(".allSeller .selectShow span").html(_thisText + '<i class="sortIconI"></i>');
			$(".allSeller .selectShow span").attr("url", _thisUrl);
			$(this).addClass("selected").siblings().removeClass("selected");
			searchAjax($(this), "region");
		});

		//全部商户
		$(".allStyle .popup div:nth-child(2)").find("li").touchClick(function () {
			var _thisText = $.trim($(this).text()),
				_thisUrl = $.trim($(this).attr("url"));
			$(".allStyle .selectShow span").html(_thisText + '<i class="sortIconI"></i>');
			$(".allStyle .selectShow span").attr("url", _thisUrl);
			$(this).addClass("selected").siblings().removeClass("selected");
			searchAjax($(this), "feature");
		});

		//智能排序
		$(".smartSort .popup li").touchClick(function () {
			var _thisText = $.trim($(this).text()),
				_thisUrl = $.trim($(this).attr("url"));
			smartSortSpan.html(_thisText + '<i class="sortIconI"></i>');
			smartSortSpan.attr("url", _thisUrl);
			$(this).addClass("selected").siblings().removeClass("selected");
			searchAjax($(this), "sort");
		})

		//全城商区/全部商户请求接口时传参
		function searchAjax(elem, pa) {
			if ($.dxlWaterFall && $.isFunction($.dxlWaterFall)) {
				var liHuiDiv = $(".defaultSort .group").eq(0);

				$("#sellerList ul").empty();
				$.dxlWaterFall("emptyData");
				par[pa] = elem.attr("url") != "" ? elem.attr("url") : "";

				par.min_price = minPriceInput.val(); //最低价格
				par.max_price = maxPriceInput.val(); //最高价格
				par.libao = liHuiDiv.find("span:nth-child(1)").hasClass("selected") ? 1 : 0; //礼包 
				par.youhui = liHuiDiv.find("span:nth-child(2)").hasClass("selected") ? 1 : 0; //优惠 
				par.sort = smartSortSpan.attr("url") //智能排序

				option.setting.url = urlTemp + $.param(par);
				$(".dataEmpty").remove();
				$.dxlWaterFall(option);
			}
			sortItemHide();
		}
	});

	//动态赋值  banner高/弹层宽高
	function sortUlWidth() {
		$("#sellerSort .sortNav .popup").css({
			"width": $(window).width(),
			"height": $(window).height() - 86
		});
		$(".banner img").height($(window).width() * 50 / 320);
	}

	//关闭排序条件总区域
	function sortItemHide() {
		setTimeout(function () {
			$("input").blur();
			groupSubmit.hide().css("position", "fixed");
			$("#sellerSort .sortNav .popup").removeClass("show");
			$("#sellerSort .sortNav span").removeClass("cur");
			$("#sellerList,footer").css("display", "block");
		}, 300);
	}

	//筛选弹层 价格区间判断
	function priceJudge() {
		var price = [];
		$(".priceRange input").each(function (i) {
			if (is_money_withzero($(this).val())) {
				price[i] = Number($(this).val());
			} else if ($(this).val() == "") {
				price.unfill = true;
			} else {
				price = false;
				return false;
			}
		});
		return price;
	}

	//瀑布流设置对象生成器
	function tpl(data, obj) {
		var html = '<li>' +
			'<a href="' + dxlHttp.m + CITY + '/HunShaSheYing/' + data.url + '-Info" class="sellerListItem">' +
			'<dl class="clearfix">' +
			'<dt><img src="' + data.image + '" ></dt>' +
			'<dd>' +
			'<div class="title">' +
			'<h3>' +
			'<i>' + data.name + '</i>' +
			(data.xixuntong_status == 1 ? (data.coupon_daodianli_id ? '<span class="gift"></span>' : "") +
				/*(data.price_back ? '<span class="fan"></span>':"") +*/
				(data.coupon_putong_id ? '<span class="sale"></span>' : "") : '') +
			 
				(data.fu_flag ? '<span class="fu"></span>' : '') +
			'</h3>' +
			'</div>' +
			'<div class="returnCash">' +
			'<p class="row1">' +
			'<span class="big">￥';
		if (data.price_min == data.price_max) { //如果最低价格 和 最高价格一样，取其中一个
			html += '<i>' + data.price_min + '</i>/套';
		} else {
			html += '<i>' + data.price_min + '-' + data.price_max + '</i>/套';
		}
		html += '</span>' +
			/*(data.xixuntong_status==1 && data.price_back ? '<span class="spetial">'+ data.price_back +'</span>' : '') + */
			//(data.xixuntong_status==1 ? '<span class="spetial">最高返'+ data.price_back +'</span>' : '') + 
			'</p>' +
			'<p class="row2">' +
			'<span class="district">' + data.region + '</span>' +
			'<span class="style">' + data.features + '</span>' +
			'</p>' +
			'</div>' +
			'</dd>' +
			'</dl>' +
			'</a>' +
			'</li>';
		obj.append(html);
	}

	//加载数据中处理
	function onLoading() {
		loadWrap.show();
	}

	//本次拉取成功处理
	function loadingOk() {
		loadWrap.hide();
	}

	//加载数据完成
	function onComplete() {
		loadWrap.html("没有更多了哦").show();
	}

	//首次获取数据量为0时
	function onNoData() {
		loadWrap.hide();
		var str = '<div class="dataEmpty"><h3>没有找到合适的商户</h3><p>换个条件再试试吧</p></div>';
		$("#sellerList").append(str);
	}

	//判断金额是否为正整数和0==为正整数和0返回true,不为正整数和0返回false
	function is_money_withzero(value) {
		var reg = /^[1-9]\d*$|^0$/;
		return reg.test(value);
	};
})