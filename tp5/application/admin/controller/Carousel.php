<?php
/**
 * 轮播管理
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Carousel extends Controller
{
    //导航添加
    public function carousel_add()
    {
        if($_POST){
            $file = request()->file('carousel_img');
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            //上传成功
            if($info){
                //上传本地的路径 放到post中一起入库
                $_POST['carousel_img'] = $info->getSaveName();
                $_POST['carousel_time'] = time();
                $insert = Db::table('carousel')->insert($_POST);
                //上传成功
                if($insert){
                  $this->redirect('carousel/carousel_list');
                }
            }
        }else{
            return view('carousel_add');
        }
    }
    //导航列表
    public function carousel_list()
    {
        $list = Db::table('carousel')->select();
        return view('carousel_list',['list'=>$list]);
    }
    //导航修改
    public function carousel_update()
    {
        $id = $_GET['id'];
        if($_POST){
            $file = request()->file('carousel_img');
            if($file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                //上传本地的路径 放到post中一起入库
                $_POST['carousel_img'] = $info->getSaveName();
            }

            $_POST['carousel_time'] = time();
            $update= Db::table('carousel')->where('carousel_id='.$id)->update($_POST);
            //上传成功
            if($update){
                $this->redirect('carousel/carousel_list');
            }
        }
    }
    //导航删除
    public function carousel_delete()
    {
        $id = $_GET['id'];
        $delete = Db::table('carousel')->where('carousel_id='.$id)->delete();
        if($delete){
            $this->redirect('carousel/carousel_list');
        }
    }
}
