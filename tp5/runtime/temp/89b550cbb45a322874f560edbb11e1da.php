<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/user/user_add.html";i:1493013818;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>婚纱后台</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css" />
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="__PUBLIC__/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                href="#">用户管理</a>&nbsp;-</span>&nbsp;用户添加
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>管理员添加</span>
            </div>
            <div class="baBody">
                <form action="<?php echo url('user/user_add'); ?>" method="post">
                    <div class="bbD">
                        用户姓名：<input type="text" name="user_openid" class="input1" />
                    </div>
                    <div class="bbD">
                        用户性别： &nbsp;&nbsp;<input type="radio" name="user_sex" value="1">男&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="radio" name="user_sex" value="2">女
                    </div>
                    <div class="bbD">
                        &nbsp;&nbsp;&nbsp;&nbsp;手机号：<input type="text" name="user_phone" class="input1" />
                    </div>

                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" type="submit">提交</button>
                        <a class="btn_ok btn_no"  type="reset">取消</a>
                    </p>
                </div>
                </form>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>