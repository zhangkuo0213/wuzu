<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/miyue/miyue_show.html";i:1493013817;}*/ ?>
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
		<span style="font-size:24px;">蜜月游展示</span><br><br>
		<div>
            <form action="__PUBLIC__/index.php/admin/miyue/miyue_search" method="get">
            蜜月地点：<input type="text"  name="address"/>
            酒店星级：<input type="text"  name="hotel_level"/>
            价格：<input type="text"  name="price1"/>~<input type="text"  name="price2"/>
            <input type="submit" class="search" value="搜索"/>
            </form>
        </div>
		<table border="1" style="margin:20px;">
			<tr>
				<td>蜜月游地点</td>
				<td>详情链接地址</td>
				<td>下榻酒店名称</td>
				<td>酒店星级</td>
				<td>价格</td>
				<td>优惠政策</td>
				<td>咨询电话</td>
				<td>蜜月游详情</td>
				<td>签证须知</td>
				<td>费用说明</td>
				<td>预定须知</td>
				<td width="100px" class="tdColor">操作</td>
			</tr>
			
			<?php foreach ($list as $key => $val): ?>
			<tr>
				<td><?= $val['address']?></td>
				<td><?= $val['url']?></td>
				<td>
					<a href="__PUBLIC__/index.php/admin/miyueroom/show?id=<?php echo $val['miyue_id']; ?>">
						<?= $val['hotel_name']?>
					</a>
				</td>
				<td><?= $val['hotel_level']?></td>
				<td><?= $val['price']?></td>
				<td><?= $val['youhui']?></td>
				<td><?= $val['tel']?></td>
				<td>
					<a href="__PUBLIC__/index.php/admin/miyue/miyue_info?id=<?php echo $val['miyue_id']; ?>">蜜月游详情</a>
				</td>
				<td>
					<a href="__PUBLIC__/index.php/admin/miyue/visa?id=<?php echo $val['miyue_id']; ?>">签证须知</a>
				</td>
				<td>
					<a href="__PUBLIC__/index.php/admin/miyue/payexplain?id=<?php echo $val['miyue_id']; ?>">费用说明</a>
				</td>
				<td>
					<a href="__PUBLIC__/index.php/admin/miyue/reserve?id=<?php echo $val['miyue_id']; ?>">预定须知</a>
				</td>
				<td>
					<a href="__PUBLIC__/index.php/admin/miyue/manage?id=<?php echo $val['miyue_id']; ?>">
						图片管理&nbsp;&nbsp;&nbsp;
					</a>
					<a href="__PUBLIC__/index.php/admin/miyue/miyue_update?id=<?php echo $val['miyue_id']; ?>">
						<img class="operation" src="__PUBLIC__/img/update.png">
					</a>
					<a href="__PUBLIC__/index.php/admin/miyue/miyue_del?id=<?php echo $val['miyue_id']; ?>">
						<img class="operation delban" src="__PUBLIC__/img/delete.png">
					</a>
				</td>
			</tr>
			<?php endforeach ?>
			
		</table>
		<div class="paging"><?php echo $page; ?></div>
	</center>
</body>
</html>
