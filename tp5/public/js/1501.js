// JavaScript Document


//获取图片验证码

$(document).ready(function(){

  yzmImage(".codeImg");

	function yzmImage(selector) {
	$(selector).attr("src", dxlHttp.my + "jsonp/?act=imageVerify&v=" + new Date().getTime());
    }
	var register = $("#register");
	var from_url_click = $.cookie("from_url_click");
	register.find("input[name='acc']").val() != "" ? register.find(".leb").hide() : "";
	register.find("input[name='acc']").on({
		"focus":function(){
			register.find(".leb").hide();
		},
		"blur":function(){
			$.trim(register.find(".acc input").val()) != "" ? register.find(".leb").hide() : register.find(".leb").show();
			register.find("input").val().isPhone() ? register.find(".msg").removeClass("error").addClass("ok") : register.find(".msg").removeClass("ok").addClass("error");
			register.find("input").val().isPhone() ? register.find(".allTips").hide().text("") : register.find(".allTips").show().html("<span id='loginError'></span>请输入正确的手机号码");
            $('.inp').blur(function(){
                var phone = $("input[name='acc']").val()
                $.ajax({
                    type: "POST",
                    url: "phone",
                    data: {phone:phone},
                    success: function(msg){
                        if(msg==1){
                            register.find(".msg").removeClass("ok").addClass("error")
                            register.find(".allTips").show().html("<span id='loginError'></span>手机号码已注册")
						}
                    }
                });
            })
		},
		"keyup":function(event){
			$.trim(register.find(".acc input").val()) != "" ? register.find(".leb").hide() : register.find(".leb").show();
			if(event.keyCode == 13){
				register.find(".btn").click();
			}
		}
	});

	register.find("input[name='password']").val() != "" ? register.find(".leb2").hide() : "";
	register.find("input[name='password']").on({
		"focus":function(){
			register.find(".leb2").hide();
		},
		"blur":function(){
			$.trim(register.find(".password input").val()) != "" ? register.find(".leb2").hide() : register.find(".leb2").show();
			register.find("input[name='password']").val().isPassword() ? register.find(".allTips").hide().text("") : register.find(".allTips").show().html("<span id='loginError'></span>密码格式不正确，长度6-18位字符");
		}
	});

	register.find("input[name='checkCode']").on({
		"blur":function(){
			$.trim($(this).val()) != "" ? register.find(".allTips").hide().text("") : register.find(".allTips").show().html("<span id='loginError'></span>请输入收到的手机动态码");
		}
	});
	register.find("input[name='imgCode']").on({
		"keyup":function(){
			if($.trim($(this).val())== ""){
				register.find(".allTips").show().html("<span id='loginError'></span>请输入正确的图片验证码");
			}
		},
		"blur":function(){
			$.trim($(this).val()) != "" ? register.find(".allTips").hide().text("") : register.find(".allTips").show().html("<span id='loginError'></span>请输入正确的图片验证码");
		}
	});

	register.find(".leb").on({
		"click":function(){
			register.find("input[name='acc']").focus();
		}
	});
	register.find(".leb2").on({
		"click":function(){
			register.find("input[name='password']").focus();
		}
	});
	//自动登录状态切换
	register.find(".autoLogin").on("click",function(){
		$(this).find("i").toggleClass("cur");
		register.find(".btn").toggleClass("greyBtn");
	});
	
	register.find(".autoLogin a").on("click",function(e){
		e.stopPropagation();
	});
	
	// //重获图片验证码
	// register.find("#next").on("click",function(){
	// 	 yzmImage(".codeImg");
	// });
	// register.find(".codeImg").on("click",function(){
	// 	 yzmImage(".codeImg");
	// });
	// //重获图片验证码end
	//
	// register.find(".btn").on("click",function(){
	// 	if(register.find(".autoLogin i").hasClass("cur")){
	// 		if(!register.find("input[name='acc']").val().isPhone()){
	// 			register.find(".allTips").show().html("<span id='loginError'></span>请输入正确的手机号码");
	// 			return;
	// 		}
	// 		if(!register.find("input[name='password']").val().isPassword()){
	// 			register.find(".allTips").show().html("<span id='loginError'></span>密码格式不正确，长度6-18位字符");
	// 			return;
	// 		}
	// 		if(register.find("input[name='checkCode']").val()==""){
	// 			register.find(".allTips").show().html("<span id='loginError'></span>请输入收到的手机动态码");
	// 			return;
	// 		}
	// 		register.find(".allTips").hide().text("");
	// 		checkCode(register);
	// 	}
	//
	// });
	
	// //获取短信验证码
	// register.find(".getCode0").on("click",function(){
	//    var imgcodetext=$("input[name='imgCode']").val();
	//    var def = {
	// 	  //"mobphone" : $.trim(register.find("input[name='acc']").val()),
	// 	  "img_code" : $.trim(register.find("input[name='imgCode']").val()),
	// 	  "verifyType":"ucenter_verify_normal"
	// 	};
	// 	if(imgcodetext==""){
	// 	   register.find(".allTips").show().html("<span id='loginError'></span>请输入正确的图片验证码");
	// 	}
	// 	if(imgcodetext!=""){
	// 		$.getJSON(dxlHttp.com + "jsonpnew/?act=verifyImgCode&" + $.param(def) + "&callback=?",function(data){
	// 			if(data.code==-1){
	// 				register.find(".allTips").show().html("<span id='loginError'></span>请输入正确的图形验证码");
	// 				 register.find(".codeImg").trigger("click");
	// 			}else{
	// 				register.find(".getCode").show();
	// 				register.find(".getCode0").hide();
	// 			    register.find(".getCode").dxlCountdown({
	// 				   sendText:"获取动态码",
	// 				   waitText:"秒",
	// 				   mobile:register.find("input[name='acc']"),
	// 				   sendError:function(){
	// 						register.find(".allTips").show().html("<span id='loginError'></span>请输入正确的手机号码");
	// 				   },
	// 				   sendAction:function(){
	// 					  yzmSend();
	// 				   }
	// 			   });
	// 			   setTimeout(function(){
	// 				   register.find(".getCode0").show();
	// 				   register.find(".getCode").hide();
	// 				    register.find(".codeImg").trigger("click");
	// 				},60000);
	//
	// 			 }
	// 		});
	//   }
    //
	// })

	
	// 失去焦点事件
	function inpBlur(obj){
		obj.find("input[name='acc']").blur();
		obj.find("input[name='password']").blur();
		obj.find("input[name='checkCode']").blur();
		obj.find("input[name='imgCode']").blur();
	}
	
	//发送验证码
	function yzmSend(){
		
		$.dxlSmsSend({
		  "mobile":$.trim(register.find("input[name='acc']").val()),  //手机号
		  "type":"ucenter_verify_normal",
		  "img_code":$.trim(register.find("input[name='imgCode']").val())     //类型ucenter_verify_normal  ucenter_verify_normal
		},function(data){
			if (data.code == -1) {
				alert("验证码发送太频繁，请明天再试，有问题可联系客服：400—820—1709");
				dxlThisObj = ""
			} else if (data.code == -2) {
				alert("提交频繁，一分钟后再试");
			} else if (data.code == -9) {
				$.alert("图形验证码为空");
			}
		});
	}

	
	//验证码验证
	function checkCode(doObj){
		$.dxlSmsCheck({
			"mobile":$.trim(register.find("input[name='acc']").val()),	//手机号
			"type":"ucenter_verify_normal",		//短信模版
			"code":$.trim(doObj.find("input[name='checkCode']").val())		//验证码
			//"login":""		//是否做登陆操作 1为登录
		},function(data){
			if (data.code == 1) {				
				var def = {
					"account" : $.trim(register.find("input[name='acc']").val()),
					"password": $.trim(register.find("input[name='password']").val()),
					"verifyCode" : $.trim(register.find("input[name='checkCode']").val()),
					/*"img_code" : $.trim(register.find("input[name='imgCode']").val()),*/
					"verifyType":"ucenter_verify_normal"
				};
				
			} else {
				doObj.find(".allTips").show().html("<span id='loginError'></span>手机动态码错误，请重新输入");
			}
		}); 					
	}

	
});