<?php
namespace Common\Model;
use Think\Model\RelationModel;
class FocusModel extends RelationModel{

	//定义关联关系
	protected $_link=array(
		'type'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
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