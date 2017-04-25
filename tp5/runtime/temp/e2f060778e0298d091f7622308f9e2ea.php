<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/miyue/img_update.html";i:1493013817;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>miyue_travel</title>
</head>
<body>
    <center>
    <h2>图片修改</h2>
    <form action="__PUBLIC__/index.php/admin/miyue/img_update_do" method="post">
        <table>
            <input type="hidden" name="img_id" value="<?php echo $list['0']['img_id']; ?>">
            <input type="hidden" name="miyue_id" value="<?php echo $list['0']['miyue_id']; ?>">
            <tr height="50">
                <td width="20"><span>图片链接地址：</span><br><input type="text" name="img_url" value="<?php echo $list['0']['img_url']; ?>"></td>
            </tr>
           <tr>
                <td>
                    <select name="imgposition_id">
                        <?php foreach ($data as $key => $val): ?>
                            <option value="<?php echo $val['imgposition_id']; ?>"><?php echo $val['position_name']; ?></option>
                        <?php endforeach ?>                        
                    </select>
                </td>
           </tr>
            <tr>
                <td><input type="submit" value="修改"></td>
            </tr>
        </table>
        
        
        
        
    </form>
    </center>
</body>
</html>