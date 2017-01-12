<?php
namespace Admin\Controller;
class NodeController extends AdminController {
	public function _initialize() {
		parent::_initialize();
	}
	public function index(){
		$Node = D('Node')->order('sort asc')->select();
		$array = array();
		foreach($Node as $k => $r) {
			$r['id']      = $r['id'];
			$r['title']   = $r['title'];
			$r['name']    = $r['name'];
			$r['status']  = $r['status']==1 ? '<font color="red">√</font>' :'<font color="blue">×</font>';
			$r['submenu'] = $r['level']==3 ? '<font color="#cccccc">添加子菜单</font>' : "<a href='javascript:void(0)' onclick='dialogIfram(\"修改\",\"".U('Node/add',array('id'=>$r['id']))."\",\"".currentUrl()."\")'>添加子菜单</a>";
			$r['edit']    = $r['level']==1 ? '<font color="#cccccc">修改</font>' : "<a href='javascript:void(0)' onclick='dialogIfram(\"修改\",\"".U('Node/edit',array('id'=>$r['id']))."\",\"".currentUrl()."\")'>修改</a>";
			$r['del']     = $r['level']==1 ? '<font color="#cccccc">删除</font>' : "<a onClick='eEvent.del(".$r['id'].");' href='javascript:void(0)'>删除</a>";
			switch ($r['display']) {
				case 0:
					$r['display'] = '整节点不显示';
					break;
				case 1:
					$r['display'] = '主菜单';
					break;
				case 2:
					$r['display'] = '子菜单';
					break;
				case 3:
					$r['display'] = '该条显示';
					break;
			}
			switch ($r['level']) {
				case 0:
					$r['level'] = '非节点';
					break;
				case 1:
					$r['level'] = '应用';
					break;
				case 2:
					$r['level'] = '模块';
					break;
				case 3:
					$r['level'] = '方法';
					break;
			}
			$array[]      = $r;
		}
		$str  = "<tr class='tr'>
				    <td align='center'><input type='text' value='\$sort' size='3' name='sort[\$id]'></td>
				    <td align='center'>\$id</td> 
				    <td >\$spacer \$title (\$name)</td> 
				    <td align='center'>\$level</td> 
				    <td align='center'>\$status</td> 
				    <td align='center'>\$display</td> 
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
		if(IS_POST) {
			$d = D('Node');
			if($d->create()){
				$d->add() ? $this->success('添加成功') : $this->error('添加失败');
			}else{
				$this->error($d->getError());
			}
		}else{
			$Node = D('Node')->order('sort asc')->select();
			$array = array();
			foreach($Node as $k => $r) {
				$r['id']         = $r['id'];
				$r['title']      = $r['title'];
				$r['name']       = $r['name'];
				$r['disabled']   = $r['level']==3 ? 'disabled' : '';
				$array[$r['id']] = $r;
			}
			$str  = "<option value='\$id' \$selected \$disabled >\$spacer \$title</option>";
			$Tree = new \Common\Extend\Tree();
			$Tree->init($array);
			$this->select_categorys = $Tree->get_tree(0, $str, I('get.id') );
			$this->display();
		}
	}
	public function edit(){
		$d = D('Node');
		if(IS_POST) {
			if($data=$d->create()){
				$d->save($data) ? $this->success('修改成功') : $this->error('修改失败');
			}else{
				$this->error($d->getError());
			}
		}else{
			$id = I('get.id');
			if(!$id )$this->error('参数错误');
			$allNode = $d->order('sort asc')->select();
			$array = array();
			foreach($allNode as $k => $r) {
				$r['id']         = $r['id'];
				$r['title']      = $r['title'];
				$r['name']       = $r['name'];
				$r['disabled']   = $r['level']==3 ? 'disabled' : '';
				$array[$r['id']] = $r;
			}
			$str  = "<option value='\$id' \$selected \$disabled >\$spacer \$title</option>";
			$Tree = new \Common\Extend\Tree();
			$Tree->init($array);
			$this->row=$d->find($id);
			$this->select_categorys=$Tree->get_tree(0, $str, $this->row['pid']);
			$this->display();
		}
	}
	public function del(){
		$id = I('post.ids');
		if(!$id)$this->error('参数错误!');
		$d = D('Node');
		$row = $d ->find($id);
		if( $d->where(array('pid'=>$row['id']))->count() ) exit($this->error('存在子菜单，不可删除'));
		$d->delete($id) ? $this->success('删除成功' ) : $this->error('删除失败');
	}
	public function sort(){
		$sorts = I('post.sort');
		$d=M('Node');
		if(!is_array($sorts)) $this->error('参数错误');
		foreach ($sorts as $id => $sort) {
			$d->save( array('id' =>$id , 'sort' =>$sort ) );
		}
		$this->success('排序完成');
	}
}