<?php
namespace Common\Model;
use Think\Model\RelationModel;
class FocusTypeModel extends RelationModel{
	//自动验证
	protected $_validate=array(
		array('title','require','分类名称必须！',1,'',3),
	);

	 //所有分类
	public function allType($where = '' , $order = 'sort DESC') {
		return $this->where($where)->order($order)->select();
	}
	// 获取信息
	public function getType($where = '',$field = '*') {
		return $this->field($field)->where($where)->find();
	}

	// 删除
	public function delType($where) {
		if($where){
			return $this->where($where)->delete();
		}else{
			return false;
		}
	}
	// 子
	public function childType($id){
		return $this->where(array('pid'=>$id))->select();
	}
	// 更新节点
	public function upType($data) {
		if($data){
			return $this->save($data);
		}else{
			return false;
		}
	}
}
?>