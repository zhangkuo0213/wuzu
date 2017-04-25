<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/miyue/miyueimg_manage.html";i:1493013817;}*/ ?>
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
        td {
            padding:10px;
        }
    </style>
</head>
<body>
    <center>
        <br><br>
        <span style="font-size:24px;">图片列表</span><br><br>
        <table border="1" style="margin:20px;">
            <tr>
                <td>ID</td>
                <td>酒店名称</td>
                <td>图片连接地址</td>
                <td>图片位置</td>
                <td width="100px" class="tdColor">操作</td>
            </tr>
            
            <?php foreach ($list as $key => $val): ?>
            <tr>
                <td><?= $val['img_id']?></td>
                <td><?= $val['address']?></td>
                <td><?= $val['img_url']?></td>
                <td><?= $val['position_name']?></td>
                <td>                  
                    <a href="__PUBLIC__/index.php/admin/miyue/img_update?id=<?php echo $val['img_id']; ?>">
                        <img class="operation" src="__PUBLIC__/img/update.png">
                    </a>
                    <a href="__PUBLIC__/index.php/admin/miyue/img_del?id=<?php echo $val['img_id']; ?>">
                        <img class="operation delban" src="__PUBLIC__/img/delete.png">
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
            
        </table>
        <div class="add">
            <a class="addA" href="__PUBLIC__/index.php/admin/miyue/img_add?id=<?php echo $id; ?>">
                图片添加&nbsp;&nbsp;+
            </a>
        </div>
    </center>
</body>
</html>
