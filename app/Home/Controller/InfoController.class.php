<?php
namespace Home\Controller;
class InfoController extends HomeController{
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
    // public function detail(){
    //     $d =D('Info');
    //     $this->row=$d->detail(I('get.id'));
    //     if($this->row) $d->where(array('id'=>I('get.id')))->setInc('hits',1);//刚生成静态以后 此处无效 所以需要改写
    //     $this->display($this->row['template'] ? $this->row['template'] : $this->row['type']['template_detail']);
    // }
    //产品服务
    public function productServer(){
        $d=D("Info");
        //参数
        //$this->parameter=$d->where(array("tid"=>21))->order("time desc")->getField('text');
        //机器人智能
        $this->robot=$d->where(array("tid"=>22))->order("time desc")->find();
        //虚拟现实
        $this->vr=$d->where(array("tid"=>23))->order("time desc")->find();
//        //生物识别
//        $this->biometrics=$d->where(array("tid"=>24))->order("time desc")->find();
        //机器人智能中部焦点图
        $this->roMidFocus=D("Focus")->where(array("tid"=>26))->order("sort asc,id desc")->limit(4)->select();
        //机器人智能底部焦点图
        $this->roBottomFocus=D("Focus")->where(array("tid"=>27))->order('sort asc,id desc')->limit(4)->select();
        //VR虚拟现实中部焦点图
        $this->VRMidFocus=D("Focus")->where(array("tid"=>30))->order("sort asc,id desc")->limit(4)->select();
        //VR虚拟现实底部焦点图
        $this->VRBottomFocus=D("Focus")->where(array("tid"=>31))->order('sort asc,id desc')->limit(4)->select();
//        //生物识别中部焦点图
//        $this->biMidFocus=D("Focus")->where(array("tid"=>32))->order("sort asc,id desc")->limit(4)->select();
//        //生物识别底部焦点图
//        $this->biBottomFocus=D("Focus")->where(array("tid"=>33))->order('sort asc,id desc')->limit(4)->select();
        $this->display();
    }
    //新闻动态
    public function news(){
        $d=D("Info");
        //公司动态
        // $count                   = $model->where($options['where'])->count();
        // $Page                    = new \Common\Extend\Page($count,$options['rows']);
        // $Page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%');
        // $nowPage                 = isset($_GET['p'])?$_GET['p']:1;
        $this->company=$d->where(array("tid"=>9))->select();
        $this->news=$d->where(array("tid"=>10))->select();
        // $count                   = $model->where($options['where'])->count();
        // $Page                    = new \Common\Extend\Page($count,$options['rows']);
        // $Page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%');
        // $nowPage                 = isset($_GET['p'])?$_GET['p']:1;
        // if(!isset($options['relation'])){
        //     $list                    = $model->where($options['where'])->order($options['order'])->field($options['field'])->page($nowPage.','.$Page->listRows)->select();
        // }else{
        //     $list                    = $model->where($options['where'])->order($options['order'])->field($options['field'])->page($nowPage.','.$Page->listRows)->relation($options['relation'])->select();
        // }
        // $this->assign('total',$count);
        // $this->assign('page',$Page->show());
        //科学新闻
        $this->display();
    }
    //关于我们
    public function aboutUs(){
        $d=D("Info");
        //关于我们
        $this->about=$d->where(array("tid"=>14))->order('time desc')->find();
        //公司简介
        $this->desc=$d->where(array("tid"=>15))->order('time desc')->find();
        //专家介绍
        $expert=$d->where(array("tid"=>16))->order('time desc')->find();
        $expert['images']=json_decode($expert['images'],true);
        //下属机构
        $this->mechanism=$d->where(array("tid"=>17))->order('time desc')->find();
        //合作伙伴
        $friends=$d->where(array("tid"=>18))->order('sort asc')->select();
        //应用案例
        $this->case=$d->where(array("tid"=>19))->order('sort asc')->select();
        //售后服务
        $this->aftermarket=$d->where(array("tid"=>20))->order('time desc')->find();
        $this->assign("expert",$expert);
        $this->assign("friends",$friends);
        $this->display();
    }
    //应用案例
    public function cases(){
       
        $d=D("Info");
        $where['tid']   =   25;
        $count                   = $d->where($where)->count();
        $Page                    = new \Common\Extend\Page($count,4);
        $Page->setConfig('theme','%first% %prePage% %linkPage%');
        $nowPage                 = isset($_GET['p'])?$_GET['p']:1;
        $list              = $d->where($where)->order("time desc")->field('id,title,img,desc')->page($nowPage.','.$Page->listRows)->select();
        $this->assign('total',$count);
        $this->assign('page',$Page->show());
        $this->assign('list',$list);
        //dump($this->list);
        $this->display();
    }
    //内容页
    public function detail(){
        $d=D("Info");
        $id=I('get.id');
        $row=$d->where(array('id'=>$id))->find();
        $row['images']=json_decode($row['images'],true);
        $uwhere['id']=array('LT',$id);
        $uwhere['tid']=$row['tid'];
        $dwhere['id']=array('GT',$id);
        $dwhere['tid']=$row['tid'];
        $this->uprow=$d->where($uwhere)->find();
        $this->downrow=$d->where($dwhere)->find();
        $this->assign('row',$row);
        $this->display();
    }
    //公司新闻
    public function companyNews(){
        $d=D("Info");
        $where['tid']=9;
        $count                   = $d->where($where)->count();
        $Page                    = new \Common\Extend\Page($count,8);
        $Page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%');
        $nowPage                 = isset($_GET['p'])?$_GET['p']:1;
        $this->list                    = $d->where($where)->order('time desc')->page($nowPage.','.$Page->listRows)->select();
        $this->assign('total',$count);
        $this->assign('page',$Page->show());
        $this->display();
    }
    //科学新闻
    public function technologyNews(){
        $d=D("Info");
        $where['tid']=10;
        $count                   = $d->where($where)->count();
        $Page                    = new \Common\Extend\Page($count,8);
        $Page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%');
        $nowPage                 = isset($_GET['p'])?$_GET['p']:1;
        $this->list                    = $d->where($where)->order('time desc')->page($nowPage.','.$Page->listRows)->select();
        $this->assign('total',$count);
        $this->assign('page',$Page->show());
        $this->display();
    }

    
    
    //公司介绍
    public function company_introduction(){
        $d=D("Info");
        //关于我们
        $this->about=$d->where(array("tid"=>14))->order('time desc')->find();
        //公司简介
        $this->desc=$d->where(array("tid"=>15))->order('time desc')->find();
        //专家介绍
        $expert=$d->where(array("tid"=>16))->order('time desc')->find();
        $expert['images']=json_decode($expert['images'],true);
        //下属机构
        $this->mechanism=$d->where(array("tid"=>17))->order('time desc')->find();
        //合作伙伴
        $friends=$d->where(array("tid"=>18))->order('sort asc')->select();
        //应用案例
        $this->case=$d->where(array("tid"=>19))->order('sort asc')->select();
        //售后服务
        $this->aftermarket=$d->where(array("tid"=>20))->order('time desc')->find();
        $this->assign("expert",$expert);
        $this->assign("friends",$friends);
        $this->display();
    }    

    
    //公司介绍
    public function team(){

        $this->display();
    }        
    
}
?>
