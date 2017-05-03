<?php
namespace app\admin\model;
use think\Model;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
class Up{
	public function up($fileName,$filePath)
	{
		require_once ("/qiniu/autoload.php");
		$accessKey = 'HMaCKk3CHEuNOUhisQBHOFW-ECJ5ceBMBkEZCqeW';
		$secretKey = 'd3DqmNzZH8qOz6QgzDZ3ayHHqmL0YNpjq3I6mjBJ';
		$auth = new Auth($accessKey, $secretKey);
		$bucket = 'symei';
		$token = $auth->uploadToken($bucket);

		$uploadMgr = new UploadManager();
		list($ret, $err) = $uploadMgr->putFile($token, $fileName, $filePath);
		if ($err !== null) {
		    var_dump($err);
		} else {
		    $imgPath="http://omqpdpw6t.bkt.clouddn.com/".$fileName;
		    return $imgPath;
		}
	}

	public function duo($files)
	{
		$filePath = $files['tmp_name'];
		$name=$files['name'];
		foreach ($name as $key => $value) {
			$fileName[$key] = substr($value,0,strpos($value,"."));
		}
		require_once ("/qiniu/autoload.php");
		$accessKey = 'HMaCKk3CHEuNOUhisQBHOFW-ECJ5ceBMBkEZCqeW';
		$secretKey = 'd3DqmNzZH8qOz6QgzDZ3ayHHqmL0YNpjq3I6mjBJ';
		$auth = new Auth($accessKey, $secretKey);
		$bucket = 'symei';
		$token = $auth->uploadToken($bucket);

		$uploadMgr = new UploadManager();
		for($i=0;$i<count($filePath);$i++)
		{
			list($ret, $err) = $uploadMgr->putFile($token, $fileName[$i], $filePath[$i]);
			if ($err !== null) {
			    var_dump($err);
			} else {
				$imgPath[$i]="http://omqpdpw6t.bkt.clouddn.com/".$fileName[$i];
			}
		}
		return $imgPath;
	}
}
?>