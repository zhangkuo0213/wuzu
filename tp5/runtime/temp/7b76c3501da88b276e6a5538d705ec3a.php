<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/login/login.html";i:1493013817;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录-有点</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/public.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/page.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/public.js"></script>
</head>
<body>

	<!-- 登录页面头部 -->
	<div class="logHead">
		<img src="__PUBLIC__/img/logLOGO.png" />
	</div>
	<!-- 登录页面头部结束 -->

	<!-- 登录body -->
	<div class="logDiv">
		<img class="logBanner" src="__PUBLIC__/img/logBanner.png" />
		<div class="logGet">
			<!-- 头部提示信息 -->
			<div class="logD logDtip">
				<p class="p1">登录</p>
				<p class="p2">后台人员登录</p>
			</div>
			<form action="<?php echo url('login/verification'); ?>" method="post">
			<!-- 输入框 -->
			<div class="lgD">
				<img class="img1" src="__PUBLIC__/img/logName.png" />
				<input type="text" name="user" placeholder="输入用户名" />
			</div>
			<div class="lgD">
				<img class="img1" src="__PUBLIC__/img/logPwd.png" />
				<input type="password" name="pwd" placeholder="输入用户密码" />
			</div>
			<div class="lgD logD2">

					<input class="getYZM" name="verify" type="text"  />
					<img src="<?php echo captcha_src(); ?>" alt="captcha" id="code" width="136px" onclick="yun()" />
			</div>
			<div class="logC">
				<button>登 录</button>
			</div>
			</form>
		</div>
	</div>
	<!-- 登录body  end -->

	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">版权所有：婚庆开发小组</p>
		<p class="p2">北京五组 开发版本：V 1.0</p>
	</div>
	<!-- 登录页面底部end -->
</body>
</html>
<!---验证码的切换-->
<script>
    function yun(){
        var ts = Date.parse(new Date())/1000;
        document.getElementById('code').src="__PUBLIC__/index.php/captcha?id="+ts;
    }
</script>
