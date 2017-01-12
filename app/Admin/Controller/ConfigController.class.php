<?php
namespace Admin\Controller;
class ConfigController extends AdminController {
    public function _initialize() {
        parent::_initialize();
    }
    public function setting(){
		$config=cacheConfig();
        if(IS_POST)
        {
            $d=D('Config');
            $data=$d->create();
            foreach ($_POST['field_name'] as $key => $value) {
                $data['config_extend'][$key]['field_name'] =$value;
                $data['config_extend'][$key]['field_type'] =$_POST['field_type'][$key];
                $data['config_extend'][$key]['field_var']  =$_POST['field_var'][$key];
                $data['config_extend'][$key]['field_content']=$_POST['field_content'][$key];
            }
            $data['config_extend']=json_encode($data['config_extend']);
            if($d->save($data))
            {
                cacheConfig(0);
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }else{
            cacheConfig(0);
            $this->assign('config',$config);
            $this->display();
        }
    }
}