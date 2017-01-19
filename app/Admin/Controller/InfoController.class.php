<?php
namespace Admin\Controller;
class InfoController extends AdminController {
    
    public function _initialize() {
        parent::_initialize();
    }
    public function index(){
        $d                       = D('Info');
        $map                     = array();
        $_GET['tid']?$map['tid'] = $_GET['tid']:null;
        $_GET['keywords']        !=''?$map['title'] = array('like','%'.I('get.keywords').'%'):null;
        if($_GET['start'] && $_GET['end']){
            $map['time']=array(array('gt',strtotime(I('get.start'))),array('lt',strtotime(I('get.end'))));
        }elseif($_GET['start']){
            $map['time']=array('gt',strtotime(I('get.start')));
        }elseif($_GET['end']){
            $map['time']=array('lt',strtotime(I('get.end')));
        }
        if($_GET['status']!=''){
            $map['status']=I('get.status');
        }
        if($_GET['order']=='1'){
            $order="sort asc";
        }elseif($_GET['order']=='2'){
            $order="sort desc";
        }else{
            $order="id desc";
        }
        $this->lists($d,array(
            'where'=>$map,
            'relation'=>true,
            'field'=>'id,title,tid,time,img,author,hits,sort,flags'
        ));
        $this->display();
    }
    public function add(){
        if(IS_POST){
            if(!trim($_POST['title'])) exit($this->error('标题不能为空'));
            $d             = D('Info');
            $data          = $d->create();
            $data['time']  = strtotime($data['time']);
            $data['zan']  = rand(300, 500);
            $data['flags'] = $data['flags'] ? ','.implode(',', $data['flags']).',' : '';
            //拓展
            foreach ($_POST['field_name'] as $key => $value) {
                $data['extend'][$key]['field_name'] =$value;
                $data['extend'][$key]['field_type'] =$_POST['field_type'][$key];
                $data['extend'][$key]['field_var']  =$_POST['field_var'][$key];
                $data['extend'][$key]['field_content']=$_POST['field_content'][$key];
            }
            $data['extend']=json_encode($data['extend']);
            if($data['img']){
                $data['img']="./".substr($data['img'],9);
            }
            $data['mobile_img'] = I('post.mobile_img');
            if($data['mobile_img']){
                $data['mobile_img']="./".substr($data['mobile_img'],9);
            }
            //添加
            if($id=$d->add($data)){
                $image=new \Common\Extend\Image();
                //上传封面图
                $img_array      = array();
                $update['text'] = htmlspecialchars_decode($data['text']);
                preg_match_all("/(src|SRC)=[\"|'| ]{0,}(http:\/\/(.*)\.(gif|jpg|jpeg|bmp|png))/isU",$update['text'],$img_array);
                if($img_array){
                    foreach ($img_array[2] as $key => $value) {
                        $remote['old'][$key] = $value;
                        $new              = $image->upload($value,filePath($id,'info'));
                        $remote['new'][$key] = STATIC_PATH.$new['origin_'];
                    }
                    $update['text'] = str_replace($remote['old'], $remote['new'], $update['text']);
                }else{
                    unset($update['text']);
                }
                //拓展 多图上传
                $img_path=I('post.img_path');
                $img_title=I('post.img_title');
                $img_desc=I('post.img_desc');
                if($img_path){
                    foreach ($img_path as $key => $value) {
                        if(strstr($value,'/temp/')){
                            $vimg=$image->upload($value,filePath($id,'info'),'thumb');
                            $_img_path[$key]['img']    = $vimg['origin_'];
                            $_img_path[$key]['title']  =$img_title[$key];
                            $_img_path[$key]['desc']   =$img_desc[$key];
                        }else{
                            $_img_path[$key]['img']   =$value;
                            $_img_path[$key]['title']  =$img_title[$key];
                            $_img_path[$key]['desc']  =$img_desc[$key];
                        }
                    }
                    $update['images'] = json_encode($_img_path);
                }
                if(isset($update['images']) || isset($img)  || $img_array){
                    $update['id']       = $id;
                    $d->save($update);
                }
                $this->success('添加成功',U('Info/index',array('tid'=>$data['tid'])));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }
    }
    public function edit(){
//        var_dump(I('post.'));die;
        if(IS_POST){
            if(!trim($_POST['title'])) exit($this->error('标题不能为空'));
            $d             = D('Info');
            $data          = $d->create();
            $data['time']  = strtotime($data['time']);
       
            $data['flags'] = $data['flags'] ? ','.implode(',', $data['flags']).',' : '';
            // 拓展
            foreach ($_POST['field_name'] as $key => $value) {
                $data['extend'][$key]['field_name'] =$value;
                $data['extend'][$key]['field_type'] =$_POST['field_type'][$key];
                $data['extend'][$key]['field_var']  =$_POST['field_var'][$key];
                $data['extend'][$key]['field_content']=$_POST['field_content'][$key];
            }
            $data['extend']=json_encode($data['extend']);
            //封面图上传
             $image=new \Common\Extend\Image();
            //查看text字段是否有远程图片，如果有抓取到服务器
            $img_array      = array();
            if($data['img']){
               $data['img']="./".substr($data['img'],9); 
            }
            $data['mobile_img'] = I('post.mobile_img');
            if($data['mobile_img']){
                $data['mobile_img']="./".substr($data['mobile_img'],9);
            }
            $data['text'] = htmlspecialchars_decode($data['text']);
            preg_match_all("/(src|SRC)=[\"|'| ]{0,}(http:\/\/(.*)\.(gif|jpg|jpeg|bmp|png))/isU",$data['text'],$img_array);
            if($img_array){
                foreach ($img_array[2] as $key => $value) {
                    $remote['old'][$key] = $value;
                    $new              = $image->upload($value,filePath($data['id'],'info'));
                    $remote['new'][$key] = STATIC_PATH.$new['origin_'];
                }
                $data['text'] = str_replace($remote['old'], $remote['new'], $data['text']);
            }else{
                unset($data['text']);
            }
            //多图上传
            $img_path=I('post.img_path');
            $img_title=I('post.img_title');
            $img_desc=I('post.img_desc');
            if($img_path){
                foreach ($img_path as $key => $value) {
                    if(strstr($value,'/temp/')){
                        $vimg=$image->upload($value,filePath($id,'info'),'thumb');
                        $_img_path[$key]['img']    = $vimg['origin_'];
                        $_img_path[$key]['title']  =$img_title[$key];
                        $_img_path[$key]['desc']   =$img_desc[$key];
                    }else{
                        $_img_path[$key]['img']   =$value;
                        $_img_path[$key]['title']  =$img_title[$key];
                        $_img_path[$key]['desc']  =$img_desc[$key];
                    }
                }
                $data['images'] = json_encode($_img_path);
            }else{
                $data['images']='';
            }
            $d->save($data)?$this->success('修改成功',I('redirect_url') ? I('redirect_url') : '' ):$this->error('修改失败');
        }else{
            $this->row=M('Info')->find(I('get.id'));
            $this->display();
        }
    }
    public function del(){
        $ids=I('post.ids');
        D('Info')->where(
            array(
                'id'=>is_array($ids) ? array('in',implode(',', $ids)) : $ids,
            )
        )->delete() ? $this->success('删除成功') : $this->error('删除失败');
    }
}
?>