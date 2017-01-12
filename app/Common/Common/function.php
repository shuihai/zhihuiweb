<?php
/**
 * [返回info的链接]
 * @return [string] [返回当前地址]
 */
function info_url($row){
    return strstr($row['flags'],',j,') ? $row['url'] : U('Info/detail',array('id'=>$row['id']));
}
/**
 * [返回分类的链接]
 * @return [string] [返回当前地址]
 */
function type_url($row){
    return U('Info/index',array('tid'=>$row['id']));
}
/**
 * [返回当前地址]
 * @return [string] [返回当前地址]
 */
function currentUrl(){
    return 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
/**
* 对查询结果集进行排序
* @access public
* @param array $list 查询结果
* @param string $field 排序的字段名
* @param array $sortby 排序类型
* asc正向排序 desc逆向排序 nat自然排序
* @return array
*/
function list_sort_by($list,$field, $sortby='asc') {
   if(is_array($list)){
       $refer = $resultSet = array();
       foreach ($list as $i => $data)
           $refer[$i] = &$data[$field];
       switch ($sortby) {
           case 'asc': // 正向排序
                asort($refer);
                break;
           case 'desc':// 逆向排序
                arsort($refer);
                break;
           case 'nat': // 自然排序
                natcasesort($refer);
                break;
       }
       foreach ( $refer as $key=> $val)
           $resultSet[] = &$list[$key];
       return $resultSet;
   }
   return false;
}
/**
 * 创建Tree
 */
 function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0) {
    $tree = array();
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = & $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] = & $list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent = & $refer[$parentId];
                    $parent[$child][] = & $list[$key];
                }
            }
        }
    }
    return $tree;
 }
/**
 * 返回某个子数组 以树形的结构
 */
 function pid_list_to_tree( $id ,$list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0){
    $list=list_to_tree($list, $pk, $pid, $child, $root);
    foreach ($list as $key => $value) {
        if($value['id']==$id){
            return $value;
        }
    }
 }
 /**
 * pid 获得子数组
 */
function pid_list($list,$pid,$flag='e') {
    static $tree=array();
    if(!isset($tree[$flag])) $tree[$flag]=array();
    foreach($list as $vo) {
        if ($vo['pid'] == $pid) {
            array_push($tree[$flag],$vo);
            pid_list($list,$vo['id'],$flag);
        }
    }
    return $tree[$flag];
}
 /**
 * 获得所有分类下的某个父级下的及本身的数组
 */
 function get_list_by_pid($list,$pid,$flag){
    $plist=array();
    //父级放第一个
    foreach ($list as $value) {
        if($value['id']==$pid){
            $plist[] = $value;
            break;
        }
    }
    $child = pid_list($list,$pid,$flag);
    foreach ($child as $v) {
        array_push($plist,$v);
    }
    return $plist;
 }
 /**
 * 获得某个分类下的某个字段的数组
 */
 function get_key_arr($list,$field){
    foreach ($list as  $value) {
        $arr[]=$value[$field];
    }
    return $arr;
 }
/**
 * 字符串转换为数组，主要用于把分隔符调整到第二个参数
 * @param  string $str  要分割的字符串
 * @param  string $glue 分割符
 * @return array
 */
function str2arr($str, $glue = ','){
    return explode($glue, $str);
}
/**
 * 是否包含子串
 */
function strexists($string, $find) {
    return !(strpos($string, $find) === FALSE);
}
/**
 * 数组转换为字符串，主要用于把分隔符调整到第二个参数
 * @param  array  $arr  要连接的数组
 * @param  string $glue 分割符
 * @return string
 */
function arr2str($arr, $glue = ','){
    return implode($glue, $arr);
}
//统计总数
function eCount($result){
    return $result?count($result):0;
}
/////////////////////////////////
/**
 *
 * 把对象转成数组
 * @param $object 要转的对象$object
 */
function objectToArray($object){ 
    $result = array(); 
    $object = is_object($object) ? get_object_vars($object) : $object; 
    foreach ($object as $key => $val) { 
        $val = (is_object($val) || is_array($val)) ? objectToArray($val) : $val; 
        $result[$key] = $val; 
    } 
    return $result; 
}
//这个json是数据库读出来的
function jsonToArray($json){
    return objectToArray(json_decode($json));
}
//获得某天前的最后一秒时间戳
function xtime($day){
    $day = intval($day);
    return mktime(23,59,59,date("m"),date("d")-$day,date("y"));
}
//获得当前ip地址  return string
function getIp()
{
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
      $ip = $_SERVER["HTTP_CLIENT_IP"];
    }elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
      $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }elseif(!empty($_SERVER["REMOTE_ADDR"])){
      $ip = $_SERVER["REMOTE_ADDR"];
    }else{
      $ip = 'error';//无法获取
    }
    return $ip;
}
// 获取时间颜色
function get_color_date($type='Y-m-d H:i:s',$time,$color='red'){
    if($time > xtime(1)){
        return '<font color="'.$color.'">'.date($type,$time).'</font>';
    }else{
        return date($type,$time);
    }
}
//根据键值和值返回对应的数组
//参数$arr 要取值的数组  $key=>$val
//返回多维数组 array
function seekarr($arr=array(),$key,$val){
    $res = array();
    $str = json_encode($arr);   
    preg_match_all("/\{[^\{]*\"".$key."\"\:\"".$val."\"[^\}]*\}/",$str, $m);
    if($m && $m[0]){
    foreach($m[0] as $val) $res[] = json_decode($val,true);
    }
    return $res;
}
function str_replace_json($search, $replace, $subject){ 
     return json_decode(str_replace($search, $replace,  json_encode($subject))); 
}
//给图片加前缀
function imgPrefix($prefix,$string){
    list($name,$type)=explode('.',basename($string));
    return dirname($string).'/'.$prefix.$name.".{$type}";
}
/**
 * 获得select option
 */
function selectOption($all,$pid=null,$focus=null,$root=0,$disabled=array()){
    foreach($all as $k => $r) {
        // if($r['level']==$disabled['level']){
        //     $r['disabled']='disabled=disabled';
        //     $array[$r['id']] = $r;
        // }else{
            $array[$r['id']] = $r;
        // }
    }
    $str  = "<option value='\$id' \$selected \$disabled ".$disabled['level'].">\$spacer \$title</option>";
    $Tree = new \Common\Extend\Tree();
    $Tree->init($array);
    return $select = $Tree->get_tree_multi($root, $str, $pid);
}
//移动到某个文件夹
//$id是数据库对应的文章id
function copyFileTo($id,$floder)
{
    $path=STATIC_PATH.'/'.filePath2($id,$floder).''; //路径
    if ( !file_exists( $path ) ) {
    if ( mkdir( $path , 0777 , true ) ) {
       //移动临时文件夹里的图片到这里
            $all_file=scandir(STATIC_PATH.'ueditor_temp/');
            if($all_file)
            {
                //复制原文件到
                foreach ($all_file as $value) {
                    copy(STATIC_PATH.'ueditor_temp/'.$value, $path.'/'.$value);
                }
                //删除原文件
                foreach ($all_file as $value) {
                    unlink(STATIC_PATH.'ueditor_temp/'.$value);
                }
                return true;
            }
        }
    }else{
         //移动临时文件夹里的图片到这里
            $all_file=scandir(STATIC_PATH.'ueditor_temp/');
            if($all_file)
            {
                //复制原文件到
                foreach ($all_file as $value) {
                    copy(STATIC_PATH.'ueditor_temp/'.$value, $path.'/'.$value);
                }
                //删除原文件
                foreach ($all_file as $value) {
                    unlink(STATIC_PATH.'ueditor_temp/'.$value);
                }
                return true;
            }
    }
}
/**
 * 删除整个目录
 * @param $dir
 * @return bool
 */
function delDir( $dir )
{
    //先删除目录下的所有文件：
    $dh = opendir( $dir );
    while ( $file = readdir( $dh ) ) {
        if ( $file != "." && $file != ".." ) {
            $fullpath = $dir . "/" . $file;
            if ( !is_dir( $fullpath ) ) {
                unlink( $fullpath );
            } else {
                delDir( $fullpath );
            }
        }
    }
    closedir( $dh );
    //删除当前文件夹：
    return rmdir( $dir );
}
//截取中文字符串方法 
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $str_lenth = count($match[0]);
    if(function_exists("mb_substr"))
{ 
        if($suffix && $str_lenth>$length) 
        return mb_substr($str, $start, $length, $charset)."...";
        else
        return mb_substr($str, $start, $length, $charset);
}
    elseif(function_exists('iconv_substr')) {
  if($suffix && $str_lenth>$length) 
       return iconv_substr($str,$start,$length,$charset)."...";
       else
       return iconv_substr($str,$start,$length,$charset); 
    }    
}
/**
 * 字符截取 支持UTF8/GBK
 * @param $string
 * @param $length
 * @param $dot
 */
function str_cut($string, $length, $dot = '...') {
    $strlen = strlen($string);
    if($strlen <= $length) return $string;
    $string = str_replace(array(' ','&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array('∵',' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
    $strcut = '';
    if(strtolower(CHARSET) == 'utf-8') {
        $length = intval($length-strlen($dot)-$length/3);
        $n = $tn = $noc = 0;
        while($n < strlen($string)) {
            $t = ord($string[$n]);
            if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                $tn = 1; $n++; $noc++;
            } elseif(194 <= $t && $t <= 223) {
                $tn = 2; $n += 2; $noc += 2;
            } elseif(224 <= $t && $t <= 239) {
                $tn = 3; $n += 3; $noc += 2;
            } elseif(240 <= $t && $t <= 247) {
                $tn = 4; $n += 4; $noc += 2;
            } elseif(248 <= $t && $t <= 251) {
                $tn = 5; $n += 5; $noc += 2;
            } elseif($t == 252 || $t == 253) {
                $tn = 6; $n += 6; $noc += 2;
            } else {
                $n++;
            }
            if($noc >= $length) {
                break;
            }
        }
        if($noc > $length) {
            $n -= $tn;
        }
        $strcut = substr($string, 0, $n);
        $strcut = str_replace(array('∵', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), array(' ', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), $strcut);
    } else {
        $dotlen = strlen($dot);
        $maxi = $length - $dotlen - 1;
        $current_str = '';
        $search_arr = array('&',' ', '"', "'", '“', '”', '—', '<', '>', '·', '…','∵');
        $replace_arr = array('&amp;','&nbsp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;',' ');
        $search_flip = array_flip($search_arr);
        for ($i = 0; $i < $maxi; $i++) {
            $current_str = ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
            if (in_array($current_str, $search_arr)) {
                $key = $search_flip[$current_str];
                $current_str = str_replace($search_arr[$key], $replace_arr[$key], $current_str);
            }
            $strcut .= $current_str;
        }
    }
    return $strcut.$dot;
}
function cleanJs($text){
    $text = trim($text);
    $text = stripslashes($text);
    //完全过滤动态代码
    $text = preg_replace('/<\?|\?'.'>/','',$text);
    //完全过滤js
    $text = preg_replace('/<script?.*\/script>/','',$text);
    //过滤多余html
    $text = preg_replace('/<\/?(html|head|meta|link|base|body|title|style|script|form|iframe|frame|frameset|p|div)[^><]*>/i','',$text);
    //过滤on事件lang js
    while(preg_match('/(<[^><]+)(lang|onfinish|onmouse|onexit|onerror|onclick|onkey|onload|onchange|onfocus|onblur)[^><]+/i',$text,$mat)){
        $text=str_replace($mat[0],$mat[1],$text);
    }
    while(preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i',$text,$mat)){
        $text=str_replace($mat[0],$mat[1].$mat[3],$text);
    }
    return $text;
} 
//计算文件大小
function format_bytes($size) {    
    $units = array(' B', ' KB', ' MB', ' GB', ' TB');    
    for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;    
    return round($size, 2).$units[$i];
}
/**
 * 获得数组格式
 * @param $array (array) 要转换的数组
 * @param $levle (int)   层级
 * @return string
 */
function arrayval($array, $level = 0) {
    $space = '';
    for($i = 0; $i <= $level; $i++) {
        $space .= "\t";
    }
    $evaluate = "Array\n$space(\n";
    $comma = $space;
    foreach($array as $key => $val) {
        $key = is_string($key) ? '\''.addcslashes($key, '\'\\').'\'' : $key;
        $val = !is_array($val) && (!preg_match("/^\-?\d+$/", $val) || strlen($val) > 12 || substr($val, 0, 1)=='0') ? '\''.addcslashes($val, '\'\\').'\'' : $val;
        if(is_array($val)) {
            $evaluate .= "$comma$key => ".arrayeval_r($val, $level + 1);
            } else {
            $evaluate .= "$comma$key => $val";
        }
            $comma = ",\n$space";
        }
        $evaluate .= "\n$space)";
    return $evaluate;
}
//创建文件
function createFolders($path)  {
    //递归创建  
    if (!file_exists($path)){
        createFolders(dirname($path));//取得最后一个文件夹的全路径返回开始的地方  
        mkdir($path, 0777);  
    }  
}
//二位数组排序
function multi_array_sort($multi_array,$sort_key,$sort=SORT_DESC)
{ 
    if(is_array($multi_array)){ 
        foreach ($multi_array as $row_array){ 
        if(is_array($row_array)){ 
            $key_array[] = $row_array[$sort_key]; 
            }else{ 
            return false; 
            } 
        } 
        }else{ 
            return false; 
    } 
    array_multisort($key_array,$sort,$multi_array); 
    return $multi_array; 
} 
/*
*垃圾词过滤
*$text  string
*return string
*/
function antiWord($text){
    global $config;
    $patterns=explode('|', $config['badwords']);
    return $result=str_replace($patterns,'**', $text);
}
//根据id生成对应的路径
function filePath($id,$floder){
    $menu2=intval($id/1000);
    $menu1=intval($menu2/1000);
    $path = strtolower($floder).'/'.$menu1.'/'.$menu2.'/'.$id;
    createFolders(STATIC_PATH.$path);
    return $path;
}
/**
 * 将上传文件移动到临时文件的函数 
 * @param $files  文件
 * @param $uptypes 上传类型，数组 array('jpg','png','gif')
 * @return 返回数组：array('name'=>'','path'=>'','url'=>'','path'=>'','size'=>'')
 * @author HanWenbo weibo.com/tiancaili123
 **/
 function filesMoveToTemp($files,$uptypes=array('jpg','png','gif','jpeg')){
    if (!$files['size']>0) return false;
    $path='temp/'.time();
    $dest_dir=STATIC_PATH.$path;
    createFolders($dest_dir);     //创建文件夹
    $arrType = explode('.',strtolower($files['name'])); //转小写一下 
    $type = array_pop($arrType);      //array_pop() 弹出并返回 array 数组的最后一个单元，并将数组 array 的长度减一。 
    if (!in_array($type,$uptypes)) return false;
    $name = rand(1000000000,9999999999).'.'.$type;
    $dest=$dest_dir.'/'.$name;         
    if(!move_uploaded_file($files['tmp_name'],$dest)) return false;
    unlink($files);
    chmod($dest, 0777);
    return array(
        'name'=>$files['name'],
        'path'=>$path,
        'url'=>$dest,
        'type'=>$type,
        'size'=>$files['size'],
    );
}
/**
* 使用正则验证数据
* @access public
* @param string $value  要验证的数据
* @param string $rule 验证规则
* @return boolean
*/
function regex($value,$rule) {
    $validate = array(
        'phone'     =>  '/^((\(\d{3}\))|(\d{3}\-))?1\d{10}$/',
        'require'   =>  '/\S+/',
        'email'     =>  '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
        'url'       =>  '/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/',
        'currency'  =>  '/^\d+(\.\d+)?$/',
        'number'    =>  '/^\d+$/',
        
        'id'        =>  '/^[0-9]+$/',
        'zip'       =>  '/^\d{6}$/',
        'integer'   =>  '/^[-\+]?\d+$/',
        'double'    =>  '/^[-\+]?\d+(\.\d+)?$/',
        'english'   =>  '/^[A-Za-z]+$/',
        'special'  =>  '/[\'.,:;*?~`!@#$%^&+=)(<{}]|\]|\[|\/|\\\|\"|\|/',//是否有特殊字符
    );
    // 检查是否有内置的正则表达式
    if(isset($validate[strtolower($rule)]))
        $rule       =   $validate[strtolower($rule)];
    return preg_match($rule,$value)===1;
}
/**
 * 系统加密方法
 * @param string $data 要加密的字符串
 * @param string $key  加密密钥
 * @param int $expire  过期时间 单位 秒
 * @return string
 */
function ez_encrypt($data, $key = '', $expire = 0) {
    $key  = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data = base64_encode($data);
    $x    = 0;
    $len  = strlen($data);
    $l    = strlen($key);
    $char = '';
    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }
    $str = sprintf('%010d', $expire ? $expire + time():0);
    for ($i = 0; $i < $len; $i++) {
        $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1)))%256);
    }
    return str_replace('=', '',base64_encode($str));
}
/**
 * 系统解密方法
 * @param  string $data 要解密的字符串 （必须是ez_encrypt方法加密的字符串）
 * @param  string $key  加密密钥
 * @return string
 */
function ez_decrypt($data, $key = ''){
    $key    = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $x      = 0;
    $data   = base64_decode($data);
    $expire = substr($data,0,10);
    $data   = substr($data,10);
    if($expire > 0 && $expire < time()) {
        return '';
    }
    $len  = strlen($data);
    $l    = strlen($key);
    $char = $str = '';
    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }
    for ($i = 0; $i < $len; $i++) {
        if (ord(substr($data, $i, 1))<ord(substr($char, $i, 1))) {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        }else{
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return base64_decode($str);
}
/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 */
function is_login(){
    $user = session('vip_user');
    if (empty($user)) {
        return 0;
    } else {
        return session('user_auth_sign') == data_auth_sign($user) ? $user['id'] : 0;
    }
}
/**
 * 数据签名认证
 * @param  array  $data 被认证的数据
 * @return string       签名
 */
function data_auth_sign($data){
    //数据类型检测
    if(!is_array($data)){
        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名
    return $sign;
}
/**
 * 记录行为日志，并执行该行为的规则
 * @param string $action 行为标识
 * @param string $model 触发行为的表名（不加表前缀）
 * @param int $rid 触发行为的记录id
 * @param int $uid 执行行为的用户id
 * @return boolean
 */
function action_log($action = null, $model = null, $rid = null, $uid = null){
    //参数检查
    if(empty($action) || empty($model) || empty($rid)){
        return '参数不能为空';
    }
    if(empty($uid)){
        $uid = is_login();
    }
    //查询行为,判断是否执行
    $action_info = M('Action')->getByName($action);
    if($action_info['status'] != 1){
        return '该行为被禁用';
    }
    //插入行为日志
    $data['aid'] = $action_info['id'];
    $data['uid'] = $uid;
    $data['action_ip'] = ip2long(get_client_ip());
    $data['model'] = $model;
    $data['rid'] = $rid;
    $data['time'] = NOW_TIME;
    M('ActionLog')->add($data);
    //解析行为
    $rules = parse_action($action, $uid);
    //执行行为
    //$over是否超过 0为未超过  1为超过
    $over = execute_action($rules, $action_info['id'], $uid);
    $result['over']=$over;
    $result['rules']=$rules[0];
    return $result;
}
/**
 * 解析行为规则
 * 规则定义  table:$table|field:$field|condition:$condition|rule:$rule[|cycle:$cycle|max:$max][;......]
 * 规则字段解释：table->要操作的数据表，不需要加表前缀；
 *              field->要操作的字段；
 *              condition->操作的条件，目前支持字符串，默认变量{$self}为执行行为的用户
 *              rule->对字段进行的具体操作，目前支持四则混合运算，如：1+score*2/2-3
 *              cycle->执行周期，单位（小时），表示$cycle小时内最多执行$max次
 *              max->单个周期内的最大执行次数（$cycle和$max必须同时定义，否则无效）
 * 单个行为后可加 ； 连接其他规则
 * @param string $action 行为id或者name
 * @param int $self 替换规则里的变量为执行用户的id
 * @return boolean|array: false解析出错 ， 成功返回规则数组
 */
function parse_action($action = null, $self){
    if(empty($action)){
        return false;
    }
    //参数支持id或者name
    if(is_numeric($action)){
        $map = array('id'=>$action);
    }else{
        $map = array('name'=>$action);
    }
    //查询行为信息
    $info = M('Action')->where($map)->find();
    if(!$info || $info['status'] != 1){
        return false;
    }
    //解析规则:table:$table|field:$field|condition:$condition|rule:$rule[|cycle:$cycle|max:$max][;......]
    $rules = $info['rule'];
    $rules = str_replace('{$self}', $self, $rules);
    $rules = explode(';', $rules);
    $return = array();
    foreach ($rules as $key=>&$rule){
        $rule = explode('|', $rule);
        foreach ($rule as $k=>$fields){
            $field = empty($fields) ? array() : explode(':', $fields);
            if(!empty($field)){
                $return[$key][$field[0]] = $field[1];
            }
        }
        //cycle(检查周期)和max(周期内最大执行次数)必须同时存在，否则去掉这两个条件
        if(!array_key_exists('cycle', $return[$key]) || !array_key_exists('max', $return[$key])){
            unset($return[$key]['cycle']);
            unset($return[$key]['max']);
        }
    }
    return $return;
}
/**
 * 执行行为
 * @param array $rules 解析后的规则数组
 * @param int $aid 行为id
 * @param array $uid 执行的用户id
 * @return boolean false 失败 ， true 成功
 */
function execute_action($rules = false, $aid = null, $uid = null){
    if(!$rules || empty($aid) || empty($uid)){
        return false;
    }
    $return = true;
    $over=0;
    foreach ($rules as $rule){
        //检查执行周期
        $map = array('aid'=>$aid, 'uid'=>$uid);
        $map['time'] = array('gt', NOW_TIME - intval($rule['cycle']) * 3600);
        $exec_count = M('ActionLog')->where($map)->count();
        if($exec_count > $rule['max']){
            $over=1;
            continue;
        }
        //执行数据库操作
        $Model = M(ucfirst($rule['table']));
        $field = $rule['field'];
        $res = $Model->where($rule['condition'])->setField($field, array('exp', $rule['rule']));
        if(!$res){
            $return = false;
        }
    }
    return $over;
}
/**
 * 设置跳转页面URL
 * 使用函数再次封装，方便以后选择不同的存储方式（目前使用cookie存储）
 */
function set_redirect_url($url){
    cookie('redirect_url', $url);
}
/**
 * 获取跳转页面URL
 * @return string 跳转页URL
 */
function get_redirect_url(){
    $url = cookie('redirect_url');
    return empty($url) ? __APP__ : $url;
}
//根据用户id和帐号id生成路径
function filePath2($uid,$floder,$aid){
    $menu2=intval($uid/1000);
    $menu1=intval($menu2/1000);
    if($aid)$aid ='/'.$aid;
    $path = strtolower($floder).'/'.$menu1.'/'.$menu2.'/'.$uid.$aid;
    createFolders(STATIC_PATH.$path);
    return $path;
}
//基于数组创建目录和文件
function create_dir_or_files($files){
    foreach ($files as $key => $value) {
        if(substr($value, -1) == '/'){
            mkdir($value);
        }else{
            @file_put_contents($value, '');
        }
    }
}
/**
 * select返回的数组进行整数映射转换
 *
 * @param array $map  映射关系二维数组  array(
 *                                          '字段名1'=>array(映射关系数组),
 *                                          '字段名2'=>array(映射关系数组),
 *                                           ......
 *                                       )
 * @return array
 *
 *  array(
 *      array('id'=>1,'title'=>'标题','status'=>'1','status_text'=>'正常')
 *      ....
 *  )
 *
 */
function int_to_string(&$data,$map=array('status'=>array(1=>'正常',-1=>'删除',0=>'禁用',2=>'未审核',3=>'草稿'))) {
    if($data === false || $data === null ){
        return $data;
    }
    $data = (array)$data;
    foreach ($data as $key => $row){
        foreach ($map as $col=>$pair){
            if(isset($row[$col]) && isset($pair[$row[$col]])){
                $data[$key][$col.'_text'] = $pair[$row[$col]];
            }
        }
    }
    return $data;
}
/**
 * 获取酷站分类的名字
 * @return string 
 */
function getCoolTypeName($id){
    $list=cacheCoolType(1);
    foreach ($list as $key => $value) {
        if($value['id']==$id){
            return $value['title'];
        }
    }
}
/**
 * 压缩引入jscss   统一去Public里面寻找 暂时的
 * @param $file Public里的路径
 * @param $clear int 0清理 1获取
 * @return string 
 */
function minJsCss($file,$clear=1){
    $Jsmin      =   new \Common\Extend\Jsmin();
    $result     =   '';
    //判断是不是多个
    if($file){
        $ex=explode(',', $file.',');
        foreach ($ex as $target) {
            $target=trim($target);
            $basename=basename($target);
            $dirname='./Public/'.dirname($target);
            $cachename=$dirname.'/_cache_'.$basename;
            //判断是js还是css
            if(strrchr($target,'.css')=='.css'){
               $format='<link href="{cache}" rel="stylesheet" type="text/css" />';
               if(APP_DEBUG==true){
                    $result.=str_replace('{cache}', __ROOT__.'/Public/'.$target , $format );
                    unlink($cachename);
               }else{
                    if($clear=='0'){
                        unlink($cachename);
                        $result.=str_replace('{cache}', __ROOT__.'/Public/'.$target , $format );
                    }else{
                        if(!file_exists($cachename)){
                            if(file_put_contents($cachename, str_replace(array("\r\n", "\r", "\n"), "", file_get_contents('./Public/'.$target))  )){
                                $result.=str_replace('{cache}', str_replace('./',__ROOT__.'/',$cachename) , $format );
                            }
                        }else{
                            $result.=str_replace('{cache}', str_replace('./',__ROOT__.'/',$cachename) , $format );
                        }
                    }
               }
            }elseif(strrchr($target,'.js')=='.js') {
               $format='<script src="{cache}"></script>';
               if(APP_DEBUG==true){
                    $result.=str_replace('{cache}', __ROOT__.'/Public/'.$target , $format );
                    unlink($cachename);
               }else{
                    if($clear=='0'){
                        unlink($cachename);
                        $result.=str_replace('{cache}', __ROOT__.'/Public/'.$target , $format);
                    }else{
                        if(!file_exists($cachename)){
                            if(file_put_contents($cachename, $Jsmin->minify(file_get_contents('./Public/'.$target)) )){
                                $result.=str_replace('{cache}', str_replace('./',__ROOT__.'/',$cachename), $format);
                            }
                        }else{
                            $result.=str_replace('{cache}', str_replace('./',__ROOT__.'/',$cachename) , $format );
                        }
                    }
               }
               
            }else{}
            unset($format);
        }
        return $result;
    }else{
        return false;
    }
}
/**
 * 压缩引入jscss   统一去Public里面寻找 暂时的 没写好 暂时不能用 全部压缩到一个里面 如果网页太大会打不开
 * $file 文件路径
 * $noneed 不需要压缩的文件  暂时只接受js  因为css不会报错  js压缩过的再压缩就会报错
 * @return string 
 */
function minMergeJsCss($file,$noneed){
    //保存文件名
    $current_str=   strtolower(MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME);
    $Jsmin      =   new \Common\Extend\Jsmin();
    $result     =   '';
    $css        =   '';
    $js         =   '';
    $css_exists =   file_exists('./Public/Home/css/'.$current_str.'.css');
    $js_exists  =   file_exists('./Public/Home/js/'.$current_str.'.js');
    if($file){
        $ex=explode(',', $file.',');
        foreach ($ex as $target) {
            $target=trim($target);
            if(!$css_exists && strrchr($target,'.css')=='.css'){
                $css.=file_get_contents('./Public/'.$target);
            }
            if(!$js_exists && strrchr($target,'.js')=='.js'){
                if(strstr($noneed,$target)){
                    $js.= file_get_contents('./Public/'.$target)."\r\n";
                }else{
                    $js.= $Jsmin->minify(file_get_contents('./Public/'.$target))."\r\n" ;
                }
            }
        }
        if(!empty($css)){
            !$css_exists ? file_put_contents('./Public/Home/css/'.$current_str.'.css', str_replace(array("\r\n", "\r", "\n"), "" ,$css) ) : null;
            $result.='<link href="'.__ROOT__.'/Public/Home/css/'.$current_str.'.css" rel="stylesheet" type="text/css" />';
        }
        if($css_exists){
            $result.='<link href="'.__ROOT__.'/Public/Home/css/'.$current_str.'.css" rel="stylesheet" type="text/css" />';
        }
        if(!empty($js)){
            !$js_exists ? file_put_contents('./Public/Home/js/'.$current_str.'.js', $js) : null;
            $result.='<script src="'.__ROOT__.'/Public/Home/js/'.$current_str.'.js"></script>';
        }
        if($js_exists){
            $result.='<script src="'.__ROOT__.'/Public/Home/js/'.$current_str.'.js"></script>';
        }
        return $result;
    }else{
        return false;
    }
}
/*
 * 发送邮件
 *
 * $title-邮件标题，$content-邮件内容，$target-收件人，$tUserName-收件人名称
 */
function sendEmail($title,$content,$target,$tUserName){
    $smtp =new \Common\Extend\PHPMailer\smtp();
    $mail =new \Common\Extend\PHPMailer\phpmailer();
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    //$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->CharSet    = "UTF-8";                 // 设置编码
    $config=cacheConfig();
    $mail->Host       = $config['email_host'];
    $mail->Port       = $config['email_port'];
    $mail->Username   = $config['email'];
    $mail->Password   = $config['email_password'];
    $mail->From       = $config['email_from_name'];
    $mail->FromName   = $config['email'];
    $mail->Subject    = $title;
    //$mail->AltBody    = "This is the body when user views in plain text format附加内容"; //Text Body
    $mail->WordWrap   = 50; // set word wrap
    $mail->MsgHTML($content);
    //$mail->Body = $content;
    $mail->AddAddress($target,$tUserName);
    return $mail->Send();
}
/*
 * 发送短信---仅供http://www.webchinese.cn/ 专用
 * $phone发送手机号，$content发送内容
 *  短信发送后返回值    说　明
 *  -1  没有该用户账户
 *  -2  接口密钥不正确 [查看密钥] 不是账户登陆密码
 *  -21 MD5接口密钥加密不正确
 *  -3  短信数量不足
 *  -11 该用户被禁用
 *  -14 短信内容出现非法字符
 *  -4  手机号格式不正确
 *  -41 手机号码为空
 *  -42 短信内容为空
 *  -51 短信签名格式不正确 接口签名格式为：【签名内容】
 *  -6  IP限制
 *  大于0 短信发送数量
 *
*/
function sendMessage($phone,$content,$code='utf8')
{
    $config=cacheConfig();
    $url='http://'.$code.'.sms.webchinese.cn/?Uid='.$config['sms_name'].'&Key='.$config['sms_password'].'&smsMob='.$phone.'&smsText='.$content;
    if(function_exists('file_get_contents'))
    {
        $file_contents = file_get_contents($url);
    }
    else
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
    }
    return $file_contents;
}
/*************************************** ***************************/
require_once APP_PATH.'Common/Common/cache.php';
//require './app/Common/Common/cache.php';
?>