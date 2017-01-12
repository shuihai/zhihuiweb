<?php
namespace Common\Model;
use Think\Model\RelationModel;
class InfoModel extends RelationModel{
	/* 关联模型 */
	protected $_link=array(
		'type'=>array(
			'mapping_type'=>self::BELONGS_TO,
			'class_name'=>'Type',
			'foreign_key'=>'tid'
			)
		);
	/* 自动验证规则 */
	// protected $_validate = array(
	// 	array('name', '/^[a-zA-Z]\w{0,30}$/', '文档标识不合法', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
	// 	array('name', '', '标识已经存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
	// 	array('title', 'require', '标题不能为空', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
	// 	array('tid', 'require', '分类不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_INSERT),
	// 	array('tid', 'require', '分类不能为空', self::EXISTS_VALIDATE , 'regex', self::MODEL_UPDATE),
	// 	array('tid,type', 'checkCategory', '内容类型不正确', self::MUST_VALIDATE , 'callback', self::MODEL_INSERT),
	// 	array('tid', 'checkCategory', '该分类不允许发布内容', self::EXISTS_VALIDATE , 'callback', self::MODEL_BOTH),
	// 	array('model_id,tid', 'checkModel', '该分类没有绑定当前模型', self::MUST_VALIDATE , 'callback', self::MODEL_INSERT),
	// );
	public $page = '';
	/**
	 * 获取文档列表
	 * @param  integer  $map 查询条件
	 * @param  string   $order    排序规则
	 * @param  integer  $status   状态
	 * @param  boolean  $count    是否返回总数
	 * @param  string   $field    字段 true-所有字段
	 * @return array              文档列表
	 */
	public function lists($map, $order = '`sort` ASC`,id` DESC', $status = 1, $field = true){

		return $this->where($map)->field($field)->order($order)->select();
	}

	/**
	 * 计算列表总数
	 * @param  number  $type 分类ID
	 * @param  integer $status   状态
	 * @return integer           总数
	 */
	public function listCount($type, $status = 1){
		return $this->where($map)->count('id');
	}
	/**
	 * 获取详情页数据
	 * @param  integer $id 文档ID
	 * @return array       详细数据
	 */
	public function detail($id){
		/* 获取基础数据 */
		$info = $this->field(true)->relation(true)->find($id);
		if(!(is_array($info) || 1 !== $info['status'])){
			$this->error = '文档被禁用或已删除！';
			return false;
		}
		return $info;
	}

	/**
	 * 返回前一篇文档信息
	 * @param  array $info 当前文档信息
	 * @return array
	 */
	public function prev($info){
		$map = array(
			'id'          => array('lt', $info['id']),
			'tid' 		  => $info['tid'],
			'status'      => 1,
		);

		/* 返回前一条数据 */
		return $this->field(true)->where($map)->order('id DESC')->find();
	}

	/**
	 * 获取下一篇文档基本信息
	 * @param  array    $info 当前文档信息
	 * @return array
	 */
	public function next($info){
		$map = array(
			'id'          => array('gt', $info['id']),
			'tid' => $info['tid'],
			'status'      => 1,
		);
		/* 返回下一条数据 */
		return $this->field(true)->where($map)->order('id')->find();
	}




}

?>