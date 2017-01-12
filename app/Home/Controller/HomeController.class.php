<?php
namespace Home\Controller;
use Think\CommonController;
class HomeController extends CommonController{
    public function _initialize(){
    	parent::_initialize();
        //$this->assign("headerType",A("Communal/Type")->getSon("2"));
        $this->assign("CAName",strtolower(CONTROLLER_NAME.ACTION_NAME)); 
        $this->assign('config',cacheConfig());
        $this->assign('',currentUrl());
    }
    public function _empty(){
        $this->redirect('Index/index');
    }
    public function lists($model,$options){
        if(!isset($options['where'])) $options['where']=array();
        if(!isset($options['order'])) $options['order']='`id` DESC';
        if(!isset($options['field'])) $options['field']=true;
        if(!isset($options['rows']))  $options['rows']=20;
        $count                   = $model->where($options['where'])->count();
        $Page                    = new \Common\Extend\Page($count,$options['rows']);
        $Page->setConfig('theme','%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%');
        $nowPage                 = isset($_GET['p'])?$_GET['p']:1;
        if(!isset($options['relation'])){
            $list                    = $model->where($options['where'])->order($options['order'])->field($options['field'])->page($nowPage.','.$Page->listRows)->select();
        }else{
            $list                    = $model->where($options['where'])->order($options['order'])->field($options['field'])->page($nowPage.','.$Page->listRows)->relation($options['relation'])->select();
        }
        $this->assign('total',$count);
        $this->assign('page',$Page->show());
        $this->assign('list',$list);
    }

}