<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/index/head.html";i:1493013816;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>头部-有点</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/public.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/public.js"></script>
</head>

<body>
	<!-- 头部 -->
	<div class="head">
		<div class="headL">
			<img class="headLogo" src="__PUBLIC__/img/headLogo.png" />
		</div>
		<div class="headR">
			<p class="p1">
				欢迎，			<?php use think\Session; echo Session::get('name');?>
			</p>
			<p class="p2">
				<a href="#" class="resetPWD">管理员</a>&nbsp;&nbsp;
				<a href="<?php echo url('login/sign_out'); ?>" target="_top" class="goOut">退出</a>
					
			</p>
		</div>
		<!-- onclick="{if(confirm(&quot;确定退出吗&quot;)){return true;}return false;}" -->
	</div>

	<div class="closeOut">
		<div class="coDiv">
			<p class="p1">
				<span>X</span>
			</p>
			<p class="p2">确定退出当前用户？</p>
			<P class="p3">
				<a class="ok yes" href="#">确定</a><a class="ok no" href="#">取消</a>
			</p>
		</div>
	</div>



</body>
</html>