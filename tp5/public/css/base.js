function popup(closeBtn,obj,mask){
	//closeBtn: 关闭按钮
	//obj:ID对象
	//mask:遮罩层
	
	var a = function (e) { e.preventDefault(); }
	
	jQuery(closeBtn).on('click',function(){
		jQuery(mask).hide().css('height','100%');
		jQuery('body').css('overflow','');
		document.removeEventListener('touchmove', a, false);	
	});
	
	jQuery(obj).on('click',function(){
		jQuery(mask).show().css('height',jQuery(window).scrollTop()+jQuery(mask).height());
		jQuery('body').css('overflow','hidden');
		document.addEventListener('touchmove', a, false);
	});
}


function hlm_setCookie(name, value, expires, path, domain, secure) {
        document.cookie = name + '=' + escape(value) + ((expires) ? '; expires=' + expires : '') + ((path) ? '; path=' + path : '') + ((domain) ? '; domain=' + domain : '') + ((secure) ? '; secure' : '')
}

function hlm_getCookie(name) {
        var arg = name + '=';
        var alen = arg.length;
        var clen = document.cookie.length;
        var i = 0;
        while (i < clen) {
                var j = i + alen;
                if (document.cookie.substring(i, j) == arg) {
                        var endstr = document.cookie.indexOf(';', j);
                        if (endstr == -1) {
                                endstr = document.cookie.length
                        }
                        return unescape(document.cookie.substring(j, endstr)) == 'null' ? null : unescape(document.cookie.substring(j, endstr))
                }
                i = document.cookie.indexOf(' ', i) + 1;
                if (i == 0) break
        }
        return ''
}

function hideTop(){
	jQuery('.j_top').hide();
	jQuery('header,.searchCont').css('top','0');
	jQuery('#wrapperM').css('top','44px');
	
	if(jQuery('#wrapperM').length==1){
		jQuery('#wrapper').css('top','90px');
	}else{
		jQuery('#wrapper').css('top','44px');
	}
	
	jQuery('.tabMenu2').css('top','0');
	
	if(jQuery('#thelist').length==1){
		jQuery('#thelist').children().eq(0).css('marginTop','0');
	}else{
		jQuery('#wedding').css('marginTop','44px');
	}
	jQuery('.categorymod').css('marginTop','0');
	
	if(jQuery('.tabMenuT').length==1){
		jQuery('.tabMenuT').css('top','45px');
		jQuery('#wrapper').css('top','90px');
		jQuery('#wedding').css('marginTop','90px');
	}
	
}

function closeTop(){
	hideTop();
	var expires=new Date();
	expires.setDate(expires.getDate() + 1000);
	hlm_setCookie("hideAppDownLoad","1",0,'/',document.domain);
}

function showTop(){
	var hideAppDownLoad=hlm_getCookie("hideAppDownLoad");
	if (hideAppDownLoad=="") {
		jQuery('.j_top').show();
		jQuery('header,.searchCont').css('top','40px');
		jQuery('#wrapperM').css('top','85px');
		
		if(jQuery('#wrapperM').length==1){
			jQuery('#wrapper').css('top','130px');
		}else{
			jQuery('#wrapper').css('top','85px');
		}
		
		jQuery('.tabMenu2').css('top','0');
		
		if(jQuery('#thelist').length==1){
			jQuery('#thelist').children().eq(0).css('marginTop','0');
		}else{
			jQuery('#wedding').css('marginTop','85px');
		}
		
		if(jQuery('.tabMenuT').length==1){
			jQuery('.tabMenuT').css('top','85px');
			jQuery('#wrapper').css('top','130px');
			jQuery('#wedding').css('marginTop','130px');	
		}
		
		jQuery('.categorymod').css('marginTop','40px');
	}else{
		jQuery('#wrapperM').css('top','44px');
		jQuery('.tabMenu2').css('top','0');
		
		if(jQuery('.tabMenu2').length==0){
			jQuery('#wrapper').css('top','44px');
		}else{
			jQuery('.tabMenuT').css('top','45px');
			jQuery('#wrapper').css('top','90px');
		}
		
		if(jQuery('#thelist').length==1){
			jQuery('#thelist').children().eq(0).css('marginTop','0');
		}
		
		if(jQuery('.tabMenuT').length==1){
			jQuery('.tabMenuT').css('top','45px');
			jQuery('#wrapper').css('top','90px');
			jQuery('#wedding').css('marginTop','90px');
		}
	}
	
	
}
		
jQuery(function(){
	
	setTimeout(function(){showTop()},100);

	//--默认图片
	var img=document.getElementsByTagName('img');
	(function(root) {        
		var x = root.xlk  || {};
			x.IMG_DEFAULT_SRC = "http://static5.baihe.com/hunliM/images/default_07.jpg";
		x.imgErr = function(img, src) {
			img.src = src || x.IMG_DEFAULT_SRC;
		}
		root.xlk = x;
	})(window);
	
	for(var i=0;i<img.length;i++){
		img[i].onerror=function(){
			xlk.imgErr(this);
		}
	}
	
	//设置高度
	var iHeight = jQuery(window).height();
	jQuery('.map').height(iHeight-45);
	
	//设置宽度
	var countP = jQuery('#scroller2 ul li').size();
	var ulWidth = jQuery('#scroller2 ul li').outerWidth(true)* countP;
	jQuery('#scroller2,#scroller2 ul').width(ulWidth);	

	var ulWidth2 = 0;
	jQuery('#scrollerM a').each(function(i,elem) {
	  ulWidth2 += jQuery('#scrollerM a').eq(i).outerWidth(true);
	});
	jQuery('#scrollerM,.tabMenu2').width(ulWidth2);	

		
	//a点击后样式
	
//	function keepClick(){
//		jQuery('.bottomIcon .follow,.infoTxt .keep,.infoList .keep,.infoList .keepL').on('click',function(){
//			jQuery(this).addClass('active');
//		});
//	}
	
	//keepClick();
	
	jQuery('.tabMenu2 a').on('click',function(){
		jQuery(this).addClass('active').siblings().removeClass('active');
	});

	/*textarea文本框事件*/
	$('.my textarea').on('keyup',function(){
		$('.my .orangeBtnO').addClass('orangeBtn');
	});
	
	/*input文本框事件*/
	/*$('.apply input').on('keyup',function(){
		
		$('.apply dl').addClass('active');
		$('.apply .del').css('display','block');
		if($(this).val().length==11){
			$('.apply a').addClass('orangeBtn');
		}
		
		if($('.apply input').val()==''){
			$('.apply .del').css('display','none');
		}
		
	});*/
	
	//加边线
	if(window.devicePixelRatio && devicePixelRatio >= 2){
		jQuery('.layer .list li').addClass('borderT');
		jQuery('#layer_info .infoBox p').addClass('borderB');
	}

	//浮层点击效果	
	popup(jQuery('.layer .closeBtn'),jQuery('.expIcon,.expLink a'),jQuery('#layer_info'));
	popup(jQuery('.layer .icon'),jQuery('.bottomIcon .follow,.bottomIcon .orange'),jQuery('#layer_download'));
	
	//我的意见反馈 点击样式切换
	jQuery('.my .choose a').on('click',function(){
		jQuery(this).addClass('active').siblings().removeClass('active');
	});
	
	var a = function (e) { e.preventDefault(); }
	
	//--排序 去header .region
	jQuery('header .sort').on('click',function(){
		if(jQuery('.layer2,.sortLayer').css('display')=='block'){
			jQuery('.sortLayer').slideUp(600);
			jQuery('.layer2').fadeOut(600);
			jQuery('body').css('overflow','');
			document.removeEventListener('touchmove', a, false);
		}else{
			jQuery('.layer2').fadeIn(600);
			jQuery('.sortLayer').slideDown(600);
			jQuery('body').css('overflow','hidden');
			document.addEventListener('touchmove', a, false);
		}
	});
	
	jQuery('.sortLayer a').on('click',function(event){
		jQuery(this).addClass('active').siblings().removeClass('active');
		jQuery('.sortLayer').slideUp(600);
		jQuery('.layer2').fadeOut(600);
		jQuery('body').css('overflow','');
		document.removeEventListener('touchmove', a, false);
	});
	
	jQuery('.layer2').click(function(){
		jQuery('.sortLayer,.topInfoLayer').slideUp(600);
		jQuery('.layer2').fadeOut(600);
		jQuery('body').css('overflow','');
		document.removeEventListener('touchmove', a, false);
	});

	//--首页 我的 搜索 
	jQuery('header .more').on('click',function(){
		if(jQuery('.layer2,.topInfoLayer').css('display')=='block'){
			jQuery('.topInfoLayer').slideUp(600);
			jQuery('.layer2').fadeOut(600);
			jQuery('body').css('overflow','');
			document.removeEventListener('touchmove', a, false);
		}else{
			jQuery('.layer2').fadeIn(600);
			jQuery('.topInfoLayer').slideDown(600);
			jQuery('body').css('overflow','hidden');
			document.addEventListener('touchmove', a, false);
		}
	});
	
	jQuery('.topInfoLayer a').on('click',function(event){
		jQuery(this).addClass('active').siblings().removeClass('active');
		jQuery('.topInfoLayer').slideUp(600);
		jQuery('.layer2').fadeOut(600);
		jQuery('body').css('overflow','');
		document.removeEventListener('touchmove', a, false);
	});
	
	jQuery('header .tel').on('click',function(){
		jQuery('.layer2').fadeOut(600);
		jQuery('.sortLayer').slideUp(600);
	})
	
	//--搜索框
	jQuery('header .search').on('click',function(){
		$("#searchInput").val("");
		if(jQuery('.layer2,.topInfoLayer,.sortLayer').css('display')=='block'){
			jQuery('.topInfoLayer,.sortLayer').slideUp(600);
			jQuery('.layer2').fadeOut(600);
			jQuery('body').css('overflow','');
			document.removeEventListener('touchmove', a, false);
		}
		jQuery('header').fadeOut(600);
		jQuery('.searchCont').fadeIn(600);		
	});
	
	jQuery('.topInfoLayer .search').on('click',function(){
		$("#searchInput").val("");
		jQuery('.topInfoLayer,header').fadeOut(600);
		jQuery('.searchCont').fadeIn(600);
		jQuery('.layer2').fadeOut(600);
		jQuery('body').css('overflow','');
		document.removeEventListener('touchmove', a, false);		
	});
	
	jQuery('.searchCont .del').on('click',function(event){
		if(jQuery('.searchCont .left input').val()!=''){
			jQuery('.searchCont .left input').val('');
		}
	});
	
	jQuery('.searchCont .orgText').click(function(){
		jQuery('.searchCont').fadeOut(600);
		jQuery('header').fadeIn(600);
		jQuery('.layer2').fadeOut(600);
		jQuery('body').css('overflow','');
		document.removeEventListener('touchmove', a, false);
	});
	
});

jQuery(window).scroll(function(){
	//下载页头部
	if(jQuery(this).scrollTop()>=40){
		hideTop();
	}else{
		showTop();	
	}
});


	
	var _hmt = _hmt || []; 
	(function() { 
	var hm = document.createElement("script"); 
	hm.src = "//hm.baidu.com/hm.js?96c5dc397e46524e7d236e225f0e3cfe"; 
	var s = document.getElementsByTagName("script")[0]; 
	s.parentNode.insertBefore(hm, s); 
	})(); 