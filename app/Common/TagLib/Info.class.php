<?php 
namespace Common\TagLib;
use Think\Template\TagLib;
class Info extends TagLib{
    /**
     * 定义标签列表
     * @var array
     */
    protected $tags   =  array(
        'prev'     => array('attr' => 'name,info,empty', 'close' => 1), //获取上一篇文章信息
        'next'     => array('attr' => 'name,info,empty', 'close' => 1), //获取下一篇文章信息
        'list'     => array('attr' => 'name,where,ispage,order,rows,field,cache', 'close' => 1), //获取指定分类列表
        'typelist'     => array('attr' => 'name,tid,ispage,order,rows,field,cache', 'close' => 1), //获取指定分类列表
        'varlist'     => array('attr' => 'name,where,ispage,order,rows,field,cache', 'close' => 0), //获取指定分类列表
        // 'position' => array('attr' => 'pos,cate,limit,filed,name', 'close' => 1), 
    );
    //由于分段以后需要扩充一个 定义list的闭标签方法来解决offset和length的问题来提高性能
    //分类这块未来需要解决分类多效率低的问题
    public function _list($tag, $content){
        $name   = $tag['name'];
        $tid    = $tag['tid'];
        $child  = empty($tag['child']) ? 'false' : $tag['child'];
        $rows   = empty($tag['rows'])   ? '10' : $tag['rows'];
        $field  = empty($tag['field']) ? '"id,title,desc,tid,hits,time,img"' : '"'.$tag['field'].'"';
        $order  = empty($tag['order']) ? '"`sort` ASC,`id` DESC"' : '"'.$tag['order'].'"';
        $where  = $tag['where']?$tag['where']:0;
        $parse  = '<?php ';
        $parse  .='if("'.$where.'"){';
        $parse  .='    $map="'.$where.'";';
        $parse  .='}elseif ($_GET[\'tid\']) {';
        $parse  .='    $__type=A("Communal/Type")->getAllChildId($_GET[\'tid\']);';
        $parse  .='    $map[\'tid\']=array(\'in\',$__type);$map[\'status\']=1;';
        $parse  .='}else{';
        $parse  .='    return \'有没该栏目\';';
        $parse  .='}';
        $parse  .= '$__LIST__ = M(\'Info\')';
        $parse .= '->where($map)->order('.$order.')->field('.$field.')';
        if(!empty($tag['cache'])){
            $parse .= '->cache("'.$tag['cache'].'")';
        }
        if($tag['ispage']=='1'){
            $parse .= '->page(!empty($_GET["p"])?$_GET["p"]:1,'.$rows.')';
        }else{
            $parse .= '->page(1,'.$rows.')';
        }
        $parse .= '->select();';
        if($tag['ispage']){
            $parse.='$__PAGE__= new \Common\Extend\Page(M(\'Info\')';
            if(!empty($tag['cache'])){
                $parse .= '->cache("'.$tag['cache'].'")';
            }
            $parse.='->where($map)->count(),'.$rows.'); $__PAGE__->setConfig(\'theme\',\'%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%\');$page=$__PAGE__->show();';
        }
        $parse .= '?>';
        $parse .= '<volist name="__LIST__" id="'. $name .'">';
        $parse .= $content;
        $parse .= '</volist>';
        return $parse;
    }
    //根据某个分类获得当前分类和子分类的列表
    public function _typelist($tag, $content){
        $name   = $tag['name'];
        $tid    = $tag['tid'];
        $child  = empty($tag['child']) ? 'false' : $tag['child'];
        $rows   = empty($tag['rows'])   ? '10' : $tag['rows'];
        $field  = empty($tag['field']) ? '"id,title,desc,tid,hits,time,img"' : $tag['field'];
        $order  = empty($tag['order']) ? '"`sort` ASC,`id` DESC"' : $tag['order'];
        $parse  = '<?php ';
        $parse  .='$__type=A("Communal/Type")->getAllChildId('.$tag['tid'].');';
        $parse  .='$map[\'tid\']=array(\'in\',$__type);$map[\'status\']=1;';
        $parse  .= '$__LIST__ = M(\'Info\')';
        $parse .= '->where($map)->order('.$order.')->field('.$field.')';
        if(!empty($tag['cache'])){
            $parse .= '->cache("'.$tag['cache'].'")';
        }
        if($tag['ispage']=='1'){
            $parse .= '->page(!empty($_GET["p"])?$_GET["p"]:1,'.$rows.')';
        }else{
            $parse .= '->page(1,'.$rows.')';
        }
        $parse .= '->select();';
        if($tag['ispage']){
            $parse.='$__PAGE__= new \Common\Extend\Page(M(\'Info\')';
            if(!empty($tag['cache'])){
                $parse .= '->cache("'.$tag['cache'].'")';
            }
            $parse.='->where($map)->count(),'.$rows.'); $__PAGE__->setConfig(\'theme\',\'%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%\');$page=$__PAGE__->show();';
        }
        $parse .= '?>';
        $parse .= '<volist name="__LIST__" id="'. $name .'">';
        $parse .= $content;
        $parse .= '</volist>';
        return $parse;
    }
    //闭合标签 指定一个变量 获得列表
    public function _varlist($tag, $content){
        $name   = $tag['name'];
        $tid    = $tag['tid'];
        $child  = empty($tag['child']) ? 'false' : $tag['child'];
        $rows   = empty($tag['rows'])   ? '10' : $tag['rows'];
        $field  = empty($tag['field']) ? '"id,title,desc,tid,hits,time,img"' : '"'.$tag['field'].'"';
        $order  = empty($tag['order']) ? '"`sort` ASC,`id` DESC"' : $tag['order'];
        $where  = $tag['where']?$tag['where']:0;
        $parse  = '<?php ';
        $parse  .='if("'.$where.'"){';
        $parse  .='    $map="'.$where.'";';
        $parse  .='}elseif ($_GET[\'tid\']) {';
        $parse  .='    $__type=A("Communal/Type")->getAllChildId($_GET[\'tid\']);';
        $parse  .='    $map[\'tid\']=array(\'in\',$__type);$map[\'status\']=1;';
        $parse  .='}else{';
        $parse  .='    return \'有没该栏目\';';
        $parse  .='}';
        $parse  .= '$'.$name.' = M(\'Info\')';
        $parse .= '->where($map)->order('.$order.')->field('.$field.')';
        if(!empty($tag['cache'])){
            $parse .= '->cache("'.$tag['cache'].'")';
        }
        if($tag['ispage']=='1'){
            $parse .= '->page(!empty($_GET["p"])?$_GET["p"]:1,'.$rows.')';
        }else{
            $parse .= '->page(1,'.$rows.')';
        }
        $parse .= '->select();';
        if($tag['ispage']){
            $parse.='$count=M(\'Info\')';
            if(!empty($tag['cache'])){
                $parse .= '->cache("'.$tag['cache'].'")';
            }
            $parse.='->where($map)->count();';
            $parse.='$__PAGE__= new \Common\Extend\Page($count,'.$rows.');';
            $parse.='$__PAGE__->setConfig(\'theme\',\'%upPage% %first% %prePage% %linkPage% %nextPage% %downPage% %end%\');$'.$name.'count=$count;$'.$name.'page=$__PAGE__->show();';
        }
        $parse .= '?>';
        return $parse;
    }
    /* 获取下一篇文章信息 */
    public function _next($tag, $content){
        $name   = $tag['name'];
        $info   = $tag['info'];
        $parse  = '<?php ';
        $parse .= '$' . $name . ' = D(\'Info\')->next('.$info.');';
        $parse .= ' ?>';
        $parse .= '<notempty name="' . $name . '">';
        $parse .= $content;
        $parse .= '<else/>'.$tag['empty'];
        $parse .= '</notempty>';
        return $parse;
    }

    /* 获取上一篇文章信息 */
    public function _prev($tag, $content){
        $name   = $tag['name'];
        $info   = $tag['info'];
        $parse  = '<?php ';
        $parse .= '$' . $name . ' = D(\'Info\')->prev(' . $info . ');';
        $parse .= ' ?>';
        $parse .= '<notempty name="' . $name . '">';
        $parse .= $content;
        $parse .= '<else/>'.$tag['empty'];
        $parse .= '</notempty>';
        return $parse;
    }
}
?> 