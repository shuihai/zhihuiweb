<?php
namespace Common\Model;
use Think\Model\RelationModel;
class FlinksModel extends RelationModel{

	//定义关联关系
	protected $_link=array(
		'FlinksType'=>array(
			'mapping_type'=>BELONGS_TO,
			'class_name'=>'FlinksType',
			'foreign_key'=>'tid',
			'mapping_fields'=>'title',
			'as_fields'=>'title:ttitle',
			)
		);
    //修改
    function modify($where,$data)
    {
        $result=$this->where($where)->save($data);
        return $result;
    }
}
?>