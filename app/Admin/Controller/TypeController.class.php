<?php
namespace Admin\Controller;
class TypeController extends AdminController {
    public function _initialize() {
        parent::_initialize();
    }
    public function index(){
        $list = D('Type')->order('sort asc')->select();
        $array = array();
        foreach($list as $k => $r) {
            $r['id']      = $r['id'];
            $r['submenu'] = "<a href='javascript:void(0)' data-pid=\"".$r['id']."\" data-title=\"".$r['title']."\" data-level=\"".$r['level']."\" class=\"_add\">添加子栏目</a>";
            $r['edit']    = "<a href='".U('Type/edit',array('id'=>$r['id']))."'>修改</a>";
            // 弹出样式 $r['edit']    = "<a href='javascript:void(0)' onclick='dialogIfram(\"修改\",\"".U('Type/edit',array('id'=>$r['id']))."\",\"".currentUrl()."\",1000,800)'>修改</a>";
            $r['del']     = "<a class='del' data-id='".$r['id']."' href='javascript:void(0)'>删除</a>";
            $r['template_type_name'] = $r['template_type'] ? '详情' : '';
            $array[]      = $r;
        }
        $str  = "<tr class='tr'>
                    <td align='center'><input type='text' value='\$sort' size='3' name='sort[\$id]'></td>
                    <td align='center'>\$id</td> 
                    <td >\$spacer \$title</td>
                    <td align='center'>\$template_type_name</td>
                    <td align='center'>\$template_index</td>
                    <td align='center'>\$template_list</td>
                    <td align='center'>\$template_detail</td>
                    <td align='center'>
                        \$submenu | \$edit | \$del
                    </td>
                  </tr>";
        $Tree = new \Common\Extend\Tree();
        $Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $Tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $Tree->init($array);
        $html_tree = $Tree->get_tree(0, $str);
        $this->assign('html_tree',$html_tree);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            !$_POST['title'] ? exit($this->error('标题不能为空')) : null;
            $d=D('Type');
            $data=$d->create();
            $data['flags'] = $data['flags'] ? ','.implode(',', $data['flags']).',' : '';
            if($data['pid']){
                $plevel=$d->where(array('id'=>$data['pid']))->getField('level');
                $data['level']=$plevel+1;
            }else{
                $data['level']=0;
            }
            if($data['id']=$d->add($data)){
                $image=new \Common\Extend\Image();
                if($_FILES['img']['size']>0){
                    $img           =$image->upload($_FILES['img'],filePath($data['id'],'type'),'thumb');
                    $update['img'] =$img['origin_'];
                    $update['id']  =$data['id'];
                    $d->save($update);
                }
                cacheType(0);
                $this->success('添加成功','','',$data);
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->select=A('Communal/Type')->getOptionById(1,$_GET['pid']);
            $this->display();
        }
    }
    public function edit(){
        if(IS_POST){
            !$_POST['title'] ? exit($this->error('标题不能为空')) : null;
            $d=D('Type');
            $data=$d->create();
            $data['flags'] = $data['flags'] ? ','.implode(',', $data['flags']).',' : '';
            if($data['pid']){
                $plevel=$d->where(array('id'=>$data['pid']))->getField('level');
                $data['level']=$plevel+1;
            }else{
                $data['level']=0;
            }
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
            if($_FILES['img']['size']>0){
                $img=$image->upload($_FILES['img'],filePath($data['id'],'type'),'thumb');
                $data['img']    =$img['origin_'];
            }else{
                unset($data['img']);
            }
            //查看text字段是否有远程图片，如果有抓取到服务器
            $img_array      = array();
            $data['text'] = htmlspecialchars_decode($data['text']);
            preg_match_all("/(src|SRC)=[\"|'| ]{0,}(http:\/\/(.*)\.(gif|jpg|jpeg|bmp|png))/isU",$data['text'],$img_array);
            if($img_array){
                foreach ($img_array[2] as $key => $value) {
                    $remote['old'][$key] = $value;
                    $new              = $image->upload($value,filePath($data['id'],'type'));
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
                        $vimg=$image->upload($value,filePath($id,'type'),'thumb');
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
            if($d->save($data))
            {
                cacheType(0);
                $this->success('修改成功',U('index'));
            }else{
                $this->error('修改失败');
            }
        }else{
            $d=D('Type');
            $this->row=$d->find(I('get.id'));
            $this->display();
        }
    }
    public function del(){
        $id=I('post.id');
        $id ? null : exit($this->error('参数错误!'));
        $unlink=array(1,2,3);
        if(in_array($id, $unlink))  exit($this->error('系统默认分类，不可删除'));
        $d = D('Type');
        $child = $d ->where(array('pid'=>$id))->count();
        $child ? exit($this->error('存在子分类，不可删除!')) : null;
        cacheType(0);
        $d->delete($id) ? $this->success('删除成功') : $this->error('删除失败!');
    }
    public function sort(){
        $sorts = I('post.sort');
        is_array($sorts) ?  null : exit($this->error('参数错误!'));
        $d=D('Type');
        foreach ($sorts as $id => $sort) {
            $d->save( array('id' =>$id , 'sort' =>intval($sort) ) );
        }
        cacheType(0);
        $this->success('排序完成');
    }

}

?>