<?php
namespace Common\Model;
use Think\Model\RelationModel;
class OrderModel extends RelationModel{
	/* 关联模型 */
	protected $_link=array(
		'style'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Info',
			'foreign_key'=>'style_id'
			)
		);
}

?>