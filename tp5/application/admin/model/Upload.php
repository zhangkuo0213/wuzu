<?php
namespace app\admin\model;
use think\Model;
class Upload{
	public function upload($file)
	{
		// 移动到框架应用根目录/public/uploads/ 目录下    
		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		if($info){
			// 成功上传后 获取上传信息   
			$path='uploads/'.str_replace("\\", "/", $info->getSaveName());   
			return $path;
		}else{
			// 上传失败获取错误信息
			echo $file->getError();
		}
	}
}
?>