<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/miyueroom/roomstyle_add.html";i:1493013817;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>miyue_travel</title>
</head>
<body>
    <center>
    <h2>房间套餐添加</h2>
    <form action="__PUBLIC__/index.php/admin/miyueroom/add_do" method="post">
        <table>
			<input type="hidden" name="miyue_id" value="<?php echo $id; ?>">
            <tr height="50">
                <td><span>房间套餐类型：</span><br><input type="text" name="style_name"></td>
            </tr>
            <tr height="50">
                <td><span>价格：</span><br><input type="text" name="room_price"></td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
            </tr>
        </table>
            
    </form>
    </center>
</body>
</html>


