<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"D:\phpStudy\WWW\php\new\wuzu\tp5\public/../application/admin\view\carousel\carousel_list.html";i:1492605550;}*/ ?>
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
                href="#">轮播图管理</a>&nbsp;-</span>&nbsp;轮播图列表
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">轮播图ID</td>
                        <td width="600px" class="tdColor">轮播图</td>
                        <td width="600px" class="tdColor">轮播图链接</td>
                        <td width="600px" class="tdColor">是否显示</td>
                        <td width="600px" class="tdColor">轮播图排序</td>
                        <td width="600px" class="tdColor">添加时间</td>
                        <td width="400px" class="tdColor">操作</td>
                    </tr>
                    <?php foreach($list as $k => $v){?>
                    <form action="<?php echo url('carousel/carousel_update'); ?>?id=<?php echo $v['carousel_id']; ?>" method="post" enctype="multipart/form-data">
                    <tr>
                        <td><?php echo $v['carousel_id']; ?></td>
                        <td><img src="__PUBLIC__/uploads/<?php echo $v['carousel_img'];?>" alt="" width="300px"><br/><input type="file" name="carousel_img"></td>
                        <td><input type="text" name="carousel_url"  value="<?php echo $v['carousel_url'];?>" style="width: 350px; height: 50px;"></td>
                        <td>
                            <input type="radio" name="is_show" value="1"<?php if($v['is_show']==1){echo "checked";}?> >是
                            <input type="radio" name="is_show" value="2" <?php if($v['is_show']==2){echo "checked";}?>>否
                        </td>
                        <td><input type="text" name="carousel_sort" value="<?php echo $v['carousel_sort'];?>"></td>
                        <td><?php echo date("Y-m-d H:i:s",$v['carousel_time']);?></td>
                        <td>
                            <button type="submit">修改</button>
                            <a href="<?php echo url('carousel/carousel_delete'); ?>?id=<?php echo $v['carousel_id']; ?>"><button type="button">删除</button></a>
                        </td>
                    </tr>
                    </form>
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