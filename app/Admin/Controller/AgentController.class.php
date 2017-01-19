<?php
namespace Admin\Controller;

class AgentController extends AdminController {
    public function _initialize() {
        parent::_initialize();
    }
    public function index(){

        $this->agent = D("agent")->where(array())->order("sort desc")->select();
        $list2 = [];
        foreach ($this->agent as $value) {
            $city = M('province_city')->field('name')->where(array('id'=>$value['city']))->find();
            $province = M('province_city')->field('name')->where(array('id'=>$value['province']))->find();
            $value['city'] = $city['name'];
            $value['province'] = $province['name'];
            $list2[] = $value;
        }
        $this->agent = $list2;
//        var_dump($this->agent );die;
        $this->display();
    }
    
    public function add(){
        if(IS_POST){
            if(!trim($_POST['name'])) exit($this->error('参数不完整'));
            $this->provice=D('province_city')->where(array("type"=>1))->select();
            $d             = D('agent');
            $data          = $d->create();
            if($id=$d->add($data)){
    
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->provice=D('province_city')->where(array("type"=>1))->select();
            $this->display();
        }
    }
    public function edit(){
        if(IS_POST){
      
            if(!trim($_POST['name'])) exit($this->error('参数不完整'));
            $d             = D('agent');
            $data          = $d->create();

            $d->save($data)?$this->success('修改成功'):$this->error('修改失败');
        }else{
            $this->row=M('agent')->find(I('get.id'));
            $this->provice=D('province_city')->where(array("type"=>1))->select();
            $this->display();
        }
    }
    public function del(){
        $ids=I('post.ids');
        D('Focus')->where(
            array(
                'id'=>is_array($ids) ? array('in',implode(',', $ids)) : $ids,
            )
        )->delete() ? $this->success('删除成功') : $this->error('删除失败');
    }
    
    
    public function addcity(){
        if(IS_POST){
            
            $this->provice=D('province_city')->where(array("type"=>1,'status'=>1))->select();
       
            if(!trim($_POST['name'])) exit($this->error('数据不完整'));
            $d             = D('province_city');
            $data          = $d->create();
            if($id=$d->add($data)){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->provice=D('province_city')->where(array("type"=>1))->select();
            $this->display();
        }
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
}
?>