<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/administrators/administrators_list.html";i:1493013811;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>婚纱后台</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css" />
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="__PUBLIC__/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                href="#">管理员管理</a>&nbsp;-</span>&nbsp;管理员列表
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">管理员ID</td>
                        <td width="600px" class="tdColor">管理员姓名</td>
                        <td width="600px" class="tdColor">添加时间</td>
                        <td width="400px" class="tdColor">操作</td>
                    </tr>
                    <?php foreach($list as $k => $v){?>
                    <tr>
                        <td><?php echo $v['administrators_id']; ?></td>
                        <td><?php echo $v['administrators_name']; ?></td>
                        <td><?php echo date("Y-m-d H:i:s",$v['administrators_time']);?></td>
                        <td><a href="<?php echo url('administrators/administrators_delete'); ?>?id=<?php echo $v['administrators_id']; ?>">删除</a></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>

</body>

</html>