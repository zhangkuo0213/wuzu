<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/miyueroom/roomstyle_show.html";i:1493013817;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员管理-有点</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css" />
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
    <style>
        .pagination li {
            float:left;
            padding-left: 25px;;
        }
    </style>
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="__PUBLIC__/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;管理员管理
        </div>
    </div>

    <br /><br />
    	<center><span style="font-size: 24px;">酒店房间套餐</span>
    <div class="page">
        <!-- user页面样式 -->
        <div class="connoisseur">
            
            <!-- user 表格 显示 -->
            <div class="conShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="150px" class="tdColor tdC">酒店名称</td>
                        <td width="150px" class="tdColor tdC">酒店电话</td>
                        <td width="66px" class="tdColor tdC">酒店房间类型</td>
                        <td width="66px" class="tdColor tdC">酒店房间价格</td>
                        <td width="130px" class="tdColor">操作</td>
                    </tr>
                   <?php foreach($list as $k=>$v){ ?>
                    <tr height="40px">
                        <td><?php echo $v['hotel_name']; ?></td>
                        <td><?php echo $v['tel']; ?></td>
                        <td><?php echo $v['style_name']; ?></td>
                        <td><?php echo $v['room_price']; ?></td>
                        <td>
                            <a href="__PUBLIC__/index.php/admin/miyueroom/add?id=<?php echo $v['miyue_id']; ?>">添加</a>
                            <a href="__PUBLIC__/index.php/admin/miyueroom/update?id=<?php echo $v['roomstyle_id']; ?>"><img class="operation" src="__PUBLIC__/img/update.png"></a>
                            <a href="__PUBLIC__/index.php/admin/miyueroom/del?id=<?php echo $v['roomstyle_id']; ?>"><img class="operation delban" src="__PUBLIC__/img/delete.png"></a>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
            <!-- user 表格 显示 end-->
            <div class="add">
                <a class="addA" href="__PUBLIC__/index.php/admin/miyueroom/add?id=<?php echo $id; ?>">
                    添加房间套餐&nbsp;&nbsp;+
                </a>
            </div>
    </div>
        <!-- user页面样式end -->
    </div>
        </center>
</div>


</body>

<script type="text/javascript">
    // 广告弹出框

    $(".delban").click(function(){
        $(".banDel").show();
    });
    $(".close").click(function(){
        $(".banDel").hide();
    });
    $(".no").click(function(){
        $(".banDel").hide();
    });
    // 广告弹出框 end
</script>

</html>
