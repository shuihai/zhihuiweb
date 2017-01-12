<?php
namespace Admin\Controller;
class FlinkController extends AdminController {
    public function _initialize() {
        parent::_initialize();
    }
    public function index(){
        $d                       = D('Flink');
        $map                     = array();
        $this->lists($d,array(
            'where'=>$map,
            'field'=>'*'
        ));
        $this->display();
    }
    public function add(){
        if(IS_POST){
            if(!trim($_POST['title'])) exit($this->error('标题不能为空'));
            $d             = D('Flink');
            $data          = $d->create();
            if($id=$d->add($data)){
                $image=new \Common\Extend\Image();
                if($_FILES['img']['size']>0){
                    $img=$image->upload($_FILES['img'],filePath($id,'flink'),'thumb');
                    $update['img']      =$img['origin_'];
                    $update['id']       =$id;
                    $d->save($update);
                }
                $this->success('添加成功',U('Flink/index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }
    }
    public function edit(){
        if(IS_POST){
            if(!trim($_POST['title'])) exit($this->error('标题不能为空'));
            $d             = D('Flink');
            $data          = $d->create();
            $image=new \Common\Extend\Image();
            if($_FILES['img']['size']>0){
                $img=$image->upload($_FILES['img'],filePath($data['id'],'flink'),'thumb');
                $data['img']    =$img['origin_'];
            }else{
                unset($data['img']);
            }
            $d->save($data)?$this->success('修改成功',U('Flink/index')):$this->error('修改失败');
        }else{
            $this->row=M('Flink')->find(I('get.id'));
            $this->display();
        }
    }
    public function del(){
        $ids=I('post.ids');
        D('Flink')->where(
            array(
                'id'=>is_array($ids) ? array('in',implode(',', $ids)) : $ids,
            )
        )->delete() ? $this->success('删除成功') : $this->error('删除失败');
    }
}
?>