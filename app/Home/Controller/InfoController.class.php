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
        
//        $this->news=$d->where(array("tid"=>10))->limit($Page->firstRow.','.$Page->listRows)->select();
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
        
        $count = $d->where(array("tid"=>9))->count();
   // echo $M_store->getLastSql();die;
        if ($count > 0) {
            $rowsnum = 10;//每页记录数
            $Page  = new \Think\Page($count,$rowsnum);
            
//            $Page->parameter['address'] =$address;
//            echo C('__PUBLIC__');DIE;

            define('__PUBLIC__', __ROOT__.'/Public');
//            $Page->setConfig('header','共<em>%TOTAL_ROW%</em>篇文章');
          
            $Page->setConfig('first','<img src="'.__PUBLIC__.'/home/images/btn_arrow1.png" />');
          $Page->setConfig('last','<img src="'.__PUBLIC__.'/home/images/btn_arrow2.png" />');
        //      $Page->setConfig('last','尾页');
           
            $Page->setConfig('prev','<img src="'.__PUBLIC__.'/home/images/btn_arrow3.png" />');
            $Page->setConfig('next','<img src="'.__PUBLIC__.'/home/images/btn_arrow4.png" />');
            
            // $Page->setConfig('theme',"<ul class=\"pagination\"><li class=\"paginate_button previous\" aria-controls=\"dynamic-table\" tabindex=\"0\" id=\"dynamic-table_previous\">%UP_PAGE%</li> <li class=\"paginate_button\" aria-controls=\"dynamic-table\" tabindex=\"0\">%LINK_PAGE%</li> <li class=\"paginate_button next\" aria-controls=\"dynamic-table\" tabindex=\"0\" id=\"dynamic-table_next\">%DOWN_PAGE%</li></ul>");
          $Page->setConfig('theme',"<ul class=\"pagination\"> <li>%FIRST%</li> <li>%UP_PAGE%</li> %LINK_PAGE% <li>%DOWN_PAGE%</li> <li>%END%</li> </ul>");

       //       $Page->setConfig('theme','%UP_PAGE% %FIRST% %PREPAGE% %LINK_PAGE% %NEXTPAGE% %DOWN_PAGE% %END%');
            $show     = $Page->show();
            $this->company=$d->where(array("tid"=>9))->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->page = $show;
            $this->count = $count;
            $this->display();
            
        }  else {
            $this->count = $count;
            $this->display();
        }

//    <ul>
//            <li><a href="#" class="paginimg"><img src="__PUBLIC__/home/images/btn_arrow1.png" /></a></li>
//            <li><a href="#" class="paginimg"><img src="__PUBLIC__/home/images/btn_arrow3.png" /></a></li>
//            <li><a href="#" class="padina"><span>1</span></a></li>
//            <li><a href="#"><span>2</span></a></li>
//            <li><a href="#"><span>3</span></a></li>
//            <li><a href="#"><span>4</span></a></li>
//            <li><a href="#"><span>5</span></a></li>
//            <li><a href="#" class="paginimg"><img src="__PUBLIC__/home/images/btn_arrow4.png" /></a></li>
//            <li><a href="#" class="paginimg"><img src="__PUBLIC__/home/images/btn_arrow2.png" /></a></li>
//    </ul>
        
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

    //加入我们
    public function join_us(){

        $this->display();
    }    
    //渠道合作 
    public function channel_cooperation(){
        $this->provice=D('province_city')->where(array("type"=>1))->select();
        $this->display();
    }       
    
    /**
     * 获得城市数据
     */        
    public function getcity(){
        $province_city = M('province_city');
        $province = I('province');

        $city = $province_city->distinct(true)->where(array('pid'=>$province))->select();

        $this->ajaxReturn($city);
//            echo JSON($city); //注意这里调用了json函数,需要更新一下common里的function函数
    }
    
    
    /**
     * 获得经销商数据
     */        
    public function getagent(){
        $agent = M('agent');
        $province = I('provinceid');
        $city = I('cityid');

        $map = array();
        
        if(!empty($province)){
            $map['province'] = $province;
        }
        if(!empty($city)){
            $map['city'] = $city;
        }
        
        if(!empty($status)){
          $map['status'] = 1;
        }
        
        $list = $agent->where($map)->order('id desc')->select();
        $list2 = [];
        foreach ($list as $value) {
            $city = M('province_city')->field('name')->where(array('id'=>$value['city']))->find();
            $province = M('province_city')->field('name')->where(array('id'=>$value['province']))->find();
            $value['city'] = $city['name'];
            $value['province'] = $province['name'];
            $list2[] = $value;
        }
        $list = $list2;
        $result = ['code'=>200,'data'=>$list];
        $this->ajaxReturn($result);

//            echo JSON($city); //注意这里调用了json函数,需要更新一下common里的function函数
    }
    
     //产品介绍 
    public function product_introduction(){

        $this->display();
    }         
    

    
    //业务联系 
    public function business_contact(){

        $this->display();
    } 

 
    //售后平台 
    public function after_sale_platform(){

        $this->display();
    }     
    //解决方案 
    public function customer_service(){

        $this->display();
    }       
    
    //下属机构 
    public function mechanism(){

        $this->display();
    }     
    
    //产品1 
    public function products1(){

        $this->display();
    }     
    
    //解决方案1 
    public function solutions1(){

        $this->display();
    }   
    
    //test 
    public function startcaptchaservlet(){
        if($_GET['type'] == 'pc'){
                $GtSdk = new \GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
        }elseif ($_GET['type'] == 'mobile') {
                $GtSdk = new\ GeetestLib(MOBILE_CAPTCHA_ID, MOBILE_PRIVATE_KEY);
        }
        session_start();
        $user_id = "test";
        $status = $GtSdk->pre_process($user_id);
        $_SESSION['gtserver'] = $status;
        $_SESSION['user_id'] = $user_id;
        echo $GtSdk->get_response_str();
//        $this->display();
    }      

    
    public function maitain(){
        $this->error('查无此编码');   
    }   
    
    public function feedback(){
        $this->success('感谢您的反馈意见!');   
    }      

    public function addzan(){
      
        $d = D('info');
        $d->where(['id'=>I('id')])->setInc('zan',1); 
    }       
    //test
    public function test(){

        $this->display();
    }      
}
?>
