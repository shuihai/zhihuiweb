<?php 
namespace Common\Model;
use Think\Model;
class NodeModel extends Model {
	protected $_validate=array(
		array('title','require','菜单名称必须！',1,'',3),
	);
}