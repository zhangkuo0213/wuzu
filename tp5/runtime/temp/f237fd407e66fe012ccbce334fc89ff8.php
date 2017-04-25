<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/actives/actives.html";i:1493013811;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告-有点</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/css.css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="__PUBLIC__/js/page.js" ></script> -->
<style>
	.pagination li
	{
		float: left;
		margin: 0 10px 0 10px;
		width: 10px;
		height: 10px;
		background-color: blue;
		display: inline-block;
	}
</style>
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="__PUBLIC__/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
			</div>
		</div>
		<div class="page">
			<!-- banner页面样式 -->
			<div class="banner">
				<div class="add">
					<a class="addA" href="<?php echo url('admin/actives/activesadd'); ?>">上传广告&nbsp;&nbsp;+</a>
				</div>
				<!-- banner 表格 显示 -->
				<div class="banShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="315px" class="tdColor">图片</td>
							<td width="308px" class="tdColor">活动名称</td>
							<td width="450px" class="tdColor">活动价格</td>
							<td width="215px" class="tdColor">添加时间</td>
							<td width="180px" class="tdColor">结束时间</td>
							<td width="125px" class="tdColor">操作</td>
						</tr>
						<?php if(is_array($arr) || $arr instanceof \think\Collection): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<tr>
							<td><?php echo $vo['av_id']; ?></td>
							<td><div class="bsImg">
									<img src="__PUBLIC__/uploads/<?php echo str_replace('\\', '/',$vo['imgs']); ?>">
								</div></td>
							<td><?php echo $vo['av_name']; ?></td>
							<td><?php echo $vo['av_price']; ?></td>
							<td><?php echo date("Y-m-d H:i:s",$vo['add_time']); ?></td>
							<td><?php echo $vo['end_time']; ?></td>
							<td><a href="banneradd.html"><img class="operation"
									src="__PUBLIC__/img/update.png"></a> <a href="dele?id=<?php echo $vo['av_id']; ?>"><img
								src="__PUBLIC__/img/delete.png"></a></td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
					<div style="float:left;"><?php echo $arr->render(); ?></div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>

	</div>


	 <!-- 删除弹出框 -->
	<!--<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="__PUBLIC__/img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>-->
	<!-- 删除弹出框  end--> 
</body>

<script type="text/javascript">
// 广告弹出框
// $(".delban").click(function(){
//   $(".banDel").show();
// });
// $(".close").click(function(){
//   $(".banDel").hide();
// });
// $(".no").click(function(){
//   $(".banDel").hide();
// });
// // 广告弹出框 end

// function del(){
//     var input=document.getElementsByName("check[]");
//     for(var i=input.length-1; i>=0;i--){
//        if(input[i].checked==true){
//            //获取td节点
//            var td=input[i].parentNode;
//           //获取tr节点
//           var tr=td.parentNode;
//           //获取table
//           var table=tr.parentNode;
//           //移除子节点
//           table.removeChild(tr);
//         }
//     }     
// }
</script>
</html>