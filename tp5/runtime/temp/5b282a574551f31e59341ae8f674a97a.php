<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/user/user_list.html";i:1493013818;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>婚纱后台</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/manhuaDate.1.0.css">

    <script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/manhuaDate.1.0.js"></script>
    <script type="text/javascript">
        $(function (){
            $("input.mh_date").manhuaDate({
                Event : "click",//可选
                Left : 0,//弹出时间停靠的左边位置
                Top : -16,//弹出时间停靠的顶部边位置
                fuhao : "-",//日期连接符默认为-
                isTime : false,//是否开启时间值默认为false
                beginY : 1949,//年份的开始默认为1949
                endY :2100//年份的结束默认为2049
            });
        });
    </script>
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
            <img src="__PUBLIC__/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                href="#">用户管理</a>&nbsp;-</span>&nbsp;用户列表
        </div>
    </div>
    <div class="conform">
        <form action="<?php echo url('user/user_list'); ?>" method="get">
            <div class="cfD">

                用户名：<input class="addUser" type="text" value="<?php if(isset($search['user_openid'])){ echo $search['user_openid'];}?>" name="user_openid" placeholder="输入用户名" />
                手机号：<input class="addUser" type="text" value="<?php if(isset($search['user_phone'])){ echo $search['user_phone'];}?>" name="user_phone" placeholder="输入手机号" />
                性别：<select name="user_sex" id="">
                            <option value="">请选择</option>
                            <option value="1" <?php if(isset($search['user_sex'])&&$search['user_sex']==1){ echo "selected=selected"; }?>>男</option>
                            <option value="2" <?php if(isset($search['user_sex'])&&$search['user_sex']==2){ echo "selected=selected"; }?>>女</option>
                        </select>
            </div>
            <div class="cfD">
                时间段：<input class="vinput mh_date" type="text" value="<?php if(isset($search['user_time1'])){ echo $search['user_time1'];}?>" name="user_time1" readonly="true" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                        <input class="vinput mh_date" type="text" value="<?php if(isset($search['user_time2'])){ echo $search['user_time2'];}?>" name="user_time2" readonly="true" />
                <button class="button" type="submit">搜索</button>
            </div>
        </form>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">用户ID</td>
                        <td width="600px" class="tdColor">用户姓名</td>
                        <td width="600px" class="tdColor">用户性别</td>
                        <td width="600px" class="tdColor">添加时间</td>
                        <td width="600px" class="tdColor">用户手机号</td>
                        <td width="400px" class="tdColor">操作</td>
                    </tr>
                    <tbody id="content">
                    <?php foreach($list as $k => $v){?>
                    <tr>
                        <td><?php echo $v['user_id']; ?></td>
                        <td><?php echo $v['user_openid']; ?></td>
                        <td><?php if($v['user_sex']==1){echo "男";}else{echo "女";}?></td>
                        <td><?php echo date("Y-m-d H:i:s",$v['user_time']);?></td>
                        <td><?php echo $v['user_phone']; ?></td>
                        <td><a href="<?php echo url('user/user_update'); ?>?id=<?php echo $v['user_id']; ?>">修改</a><a href="<?php echo url('user/user_delete'); ?>?id=<?php echo $v['user_id']; ?>">删除</a></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <?php echo $list->render(); ?>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>

</body>

</html>
