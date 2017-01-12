<?php
/**
* 网站配置缓存
* @param $clear int 0清理 1获取
* return array
*/
function cacheConfig($clear=1){
	switch ($clear) {
		case '0':
			S("Config/setting",null);
			break;
		case '1':
			$cache=S("Config/setting");
			if(empty($cache)){
				$cache = array_merge(C(),M('Config')->find());
				$extend=jsonToArray($cache['config_extend']);
				$ex=array();
		        foreach ($extend as $key => $value) {
		            $ex[$value['field_var']]=$value['field_content'];
		        }
		        $cache['ex']=$ex;
			    S("Config/setting",$cache);
			}
			break;
	}
	return $cache;
}

/**
 * 获得酷站分类的缓存
 * @param 0为清除缓存 1为获取缓存
 * @return array 请求数据结构
 */
function cacheCoolType($clear=1){
	switch ($clear) {
		case '0':
			S('CoolType',NULL);
			break;
		case '1':
			$cache=S('CoolType');
		if(empty($cache)){
			$cache = D('CoolType')->select();
			S('CoolType',$cache);
		}
		break;
	}
	return $cache;
}
/**
 * 获得所有分类的缓存
 * @param 0为清除缓存 1为获取缓存
 * @return array 请求数据结构
 */
function cacheType($clear=1){
	switch ($clear) {
		case '0':
			S('type',null);
			break;
		case '1':
			$cache=S('type');
			if(empty($cache)){
				$cache=M('Type')->order('sort asc')->select();
				S('type',$cache);
			}
			break;
	}
	return $cache;
}
/**
 * 根据分类id获得分类名字
 * @param $id 分类id
 * @return string 分类名字
 */
function getTypeRow($id){
	$type=cacheType(1);
	foreach ($type as $key => $value) {
		if($value['id']==$id){
			return $value;
		}
	}
}
/**
 * 根据分类id获得分类名字
 * @param $id 分类id
 * @return string 分类名字
 */
function getTypeName($id){
	$type=cacheType(1);
	foreach ($type as $key => $value) {
		if($value['id']==$id){
			return $value['title'];
		}
	}
}
/**
 * 根据分类id获得分类字段
 * @param $id 分类id
 * @param $field 字段名
 * @return string 分类名字
 */
function getTypeField($id,$field){
	$type=cacheType(1);
	foreach ($type as $key => $value) {
		if($value['id']==$id){
			if($field=='*'){
				return $value;
			}else{
				return $value[$field];
			}
		}
	}
}
?>