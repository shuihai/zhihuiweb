<?php
namespace Common\TagLib;
use Think\Template\TagLib;
class Flink extends TagLib{
    /**
     * 定义标签列表
     * @var array
     */
    protected $tags   =  array(
        'list'     => array('attr' => 'name,where,ispage,page,order,rows,field,cache', 'close' => 1), //获取指定分类列表
    );
    //分类这块未来需要解决分类多效率低的问题
    public function _list($tag, $content){
        $name   = $tag['name'];
        $tid    = $tag['tid'];
        $child  = empty($tag['child']) ? 'false' : $tag['child'];
        $rows   = empty($tag['rows'])   ? '10' : $tag['rows'];
        $field  = empty($tag['field']) ? '"*"' : $tag['field'];
        $order  = empty($tag['order']) ? '"`sort` ASC,`id` DESC"' : $tag['order'];
        $where  = $tag['where']?$tag['where']:0;
        $parse  = '<?php ';
        $parse  .='if("'.$where.'"){';
        $parse  .='    $map="'.$where.'";';
        $parse  .='}';
        $parse  .= '$__FLINK_LIST__ = M(\'Flink\')';
        if(!empty($tag['cache'])){
            $parse .= '->cache("'.$tag['cache'].'")';
        }
        $parse .= '->where($map)->order('.$order.')->field('.$field.')->page(!empty($_GET["p"])?$_GET["p"]:1,'.$rows.')->select();';
        if($tag['ispage']){
            $parse.='$__PAGE__= new \Common\Extend\Page(M(\'Flink\')';
            if(!empty($tag['cache'])){
                $parse .= '->cache("'.$tag['cache'].'")';
            }
            $parse.='->where($map)->count(),'.$rows.');$page=$__PAGE__->show();';
        }
        $parse .= '?>';
        $parse .= '<volist name="__FLINK_LIST__" id="'. $name .'">';
        $parse .= $content;
        $parse .= '</volist>';
        return $parse;
    }
}
?> 