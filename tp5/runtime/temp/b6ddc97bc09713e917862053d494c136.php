<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/miyue/miyue.html";i:1493013817;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>miyue_travel</title>
</head>
<body>
    <center>
    <h2>蜜月游项目添加</h2>
    <form action="__PUBLIC__/index.php/admin/miyue/add" method="post">
        <table>
            <tr height="50">
                <td width="20"><span>景点名称：</span><br><input type="text" name="address"></td>
            </tr>
            <tr height="50">
                <td><span>图片地址：</span><br><input type="text" name="url"></td>
            </tr>
            <tr height="50">
                <td><span>价格：</span><br><input type="text" name="price"></td>
            </tr>
            <tr height="50">
                <td><span>入住酒店名称：</span><br><input type="text" name="hotel_name"></td>
            </tr>
            <tr height="50">
                <td><span>入住酒店星级：</span><br><input type="text" name="hotel_level"></td>
            </tr>
            <tr height="50">
                <td><span>联系电话：</span><br><input type="text" name="tel"></td>
            </tr>
            <tr height="50">
                <td><span>优惠政策：</span><br>
                    <textarea name="youhui" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr height="50">
                <td><span>蜜月详情：</span><br>
                    <textarea name="miyue_info" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr height="50">
                <td><span>签证须知：</span><br>
                    <textarea name="visa" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr height="50">
                <td><span>费用说明：</span><br>
                    <textarea name="payexplain" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr height="50">
                <td><span>预定须知：</span><br>
                    <textarea name="reserve" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
            </tr>
        </table>
        
        
        
        
    </form>
    </center>
</body>
</html>