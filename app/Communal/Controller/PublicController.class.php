<?php
namespace Communal\Controller;
use Think\CommonController;
class PublicController extends CommonController{
    public function verify(){
        $image=new \Common\Extend\Image();
        ob_end_clean();
        $image::buildImageVerify(4, 1, 'png', $_GET['width']?$_GET['width'] :120,  $_GET['height']?$_GET['height'] :50);
    }
    public function checkVerify(){
    	session('verify') != md5(I('post.verify')) ? $this->error('验证码错误') : $this->success('验证码正确');
    }
}