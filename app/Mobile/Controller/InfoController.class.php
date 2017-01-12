<?php
namespace Mobile\Controller;
class InfoController extends MobileController{
    public function index(){
        /* 分类信息 */
        $type = $this->type();
        /*  频道页只显示模板，默认不读取任何内容
         *  内容可以通过模板标签自行定制
         *  模板赋值并渲染模板
        **/
        $this->assign('row', $type);
        $this->display($type['template_type'] ? $type['template_index'] : $type['template_list']);
    }
    /* 文档分类检测 */
    private function type($id = 0){
        /* 标识正确性检测 */
        $id = $id ? $id : I('get.tid', 0);
        if(empty($id)){
            exit($this->error('没有指定文档分类'));
        }
        /* 获取分类信息 */
        $type = D('Type')->info($id);
        if($type && 1 == $type['status']){
            return $type;
        } else {
            $this->error('分类不存在或被禁用');
        }
    }
    //产品服务
    public function productServer(){
        $d=D("Info");
        $this->row=$d->where(array('tid'=>I('get.tid')))->field('id,title,desc,mobile_img,text')->order('id desc')->find();
        $this->display();
    }
    //新闻动态
    public function news(){
        $d=D("Info");
        //公司动态
        if(!IS_POST){
            $where['tid'] = array('in','9,10');
            $where['status'] =  1;
            $count  = $d->where($where)->count();
            $Page   = new \Common\Extend\Page($count,3);
            $Page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%');
            $p = I('post.page');
            $nowPage= empty($p) ? 1:$p;
            $this->list   = $d->where($where)->order('time desc')->page($nowPage.','.$Page->listRows)->select();
            $this->display();
        }else{
            $where['tid'] = array('in','9,10');
            $where['status'] =  1;
            $count  = $d->where($where)->count();
            $Page   = new \Common\Extend\Page($count,3);
            $Page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%');
            $p = I('post.page');
            $nowPage= empty($p) ? 1:$p;
            $list   = $d->where($where)->order('time desc')->page($nowPage.','.$Page->listRows)->select();
            $this->ajaxReturn($list);
        }
    }
    //关于我们
    public function aboutUs(){
        $d=D("Info");
        //公司简介
        $this->desc=$d->where(array("tid"=>15))->order('time desc')->getField('text');
        //专家介绍
        $expert=$d->where(array("tid"=>16))->order('time desc')->getField('images');
        $this->expert=json_decode($expert,true);
        $this->display();
    }
    //手机详情页
    public function details(){
        $d=D("Info");
        $this->row=$d->where(array('id'=>I('get.id')))->find();
        $this->display();
    }
    //应用案例
    public function cases(){
        $d=D("Info");
        $this->row=$d->where(array('id'=>I('get.id')))->find();
        $this->display();
    }

}
?>
