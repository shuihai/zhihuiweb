<?php 
namespace Common\TagLib;
use Think\Template\TagLib;
class Type extends TagLib{
    /**
     * 定义标签列表
     * @var array
     */
    protected $tags   =  array(
        'siblings'    => array('attr' => 'name,tid,field,order', 'close' => 1), //兄弟栏目
        'tree'        => array('attr' => 'name,tid', 'close' => 0), //某个点的树形结构
        'son'        => array('attr' => 'name,tid', 'close' => 0), //某个点的树形结构
        'sonlist'        => array('attr' => 'name,tid,field,order', 'close' => 1), //某个点的树形结构
    );
    // 兄弟栏目
    public function _siblings($tag,$content){
        $parse  = '<?php ';
        $parse .= '$__SIBLINGS__= D(\'Type\')->siblings('.$tag['tid'].',"'.$field.'","'.$order.'");';
        $parse .= ' ?>';
        $parse .= '<volist name="__SIBLINGS__" id="' . $tag['name'] . '">';
        $parse .= $content;
        $parse .= '</volist>';
        return $parse;
    }
    // 树形
    public function _tree($tag){
        return '<?php $'.$tag['name'].'=A("Communal/Type")->getChildTree('.$tag['tid'].');?>';
    }
    //字栏目
    public function _son($tag){
        return '<?php $'.$tag['name'].'=A("Communal/Type")->getSon('.$tag['tid'].');?>';
    }
     //子分类
    public function _sonlist($tag,$content){
        $parse  = '<?php ';
        $parse .= '$__SIBLINGS__= A("Communal/Type")->getSon('.$tag['tid'].') ;';
        $parse .= ' ?>';
        $parse .= '<volist name="__SIBLINGS__" id="' . $tag['name'] . '">';
        $parse .= $content;
        $parse .= '</volist>';
        return $parse;
    }

}
?> 