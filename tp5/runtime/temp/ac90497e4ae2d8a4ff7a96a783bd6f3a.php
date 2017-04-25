<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/alidata/www/wx/wuzu/wuzu/tp5/public/../application/admin/view/miyue/img_add.html";i:1493013817;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>miyue_travel</title>
</head>
<body>
    <center>
    <h2>图片添加</h2>
    <form action="__PUBLIC__/index.php/admin/miyue/img_add_do" method="post">
        <table>
            <input type="hidden" name="miyue_id" value="<?php echo $id; ?>">
            <tr height="50">
                <td width="20"><span>图片链接地址：</span><br><input type="text" name="img_url"></td>
            </tr>
           <tr>
                <td>
                    <select name="imgposition_id" >
                        <option value="">请选择</option>
                        <?php foreach ($data as $key => $val): ?>
                            <option value="<?php echo $val['imgposition_id']; ?>"><?php echo $val['position_name']; ?></option>
                        <?php endforeach ?>                        
                    </select>
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