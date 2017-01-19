<?php
namespace Admin\Controller;
use Think\CommonController;
class AdminController extends CommonController{
    public function _initialize(){

        $this->assign('config',cacheConfig() );
        $this->assign('current_url',currentUrl());
        $RBAC=new \Common\Extend\RBAC;
        if (C('USER_AUTH_ON') && !in_array(CONTROLLER_NAME, explode(',', C('NOT_AUTH_MODULE')))) {
             //检查认证识别号
            if (!$RBAC::AccessDecision(MODULE_NAME)) {
                session(C('USER_AUTH_KEY')) ? null : exit(redirect(PHP_FILE . C('USER_AUTH_GATEWAY'))) ;  //跳转到认证网关
                // 没有权限 抛出错误
                if (C('RBAC_ERROR_PAGE')) {
                    exit(redirect(C('RBAC_ERROR_PAGE')));// 定义权限错误页面
                } else {
                    C('GUEST_AUTH_ON') ? $this->assign('jumpUrl', PHP_FILE . C('USER_AUTH_GATEWAY')) : null;
                    exit($this->error(L('_VALID_ACCESS_')));// 提示错误信息
                }
            }
        }
    }
    public function lists($model,$options){
        if(!isset($options['where'])) $options['where']=array();
        if(!isset($options['order'])) $options['order']='`id` DESC';
        if(!isset($options['field'])) $options['field']=true;
        if(!isset($options['rows']))  $options['rows']=20;
        $count                   = $model->where($options['where'])->count();
        $Page                    = new \Common\Extend\Page($count,$options['rows']);
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