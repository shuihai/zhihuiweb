<?php if (!defined('THINK_PATH')) exit(); $user=session('admin_user');?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><base href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>/zhihuiweb/" /><meta name="renderer" content="webkit"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>管理后台</title><script type="text/javascript">var $config=[];$config['app']='http://<?php echo ($_SERVER['SERVER_NAME']); ?>/zhihuiweb/';$config['site_url']='<?php echo ($config['site_url']); ?>';$config['domain']='<?php echo ($config['domain']); ?>';$config['public']='/zhihuiweb/Public';$config['upload']='/zhihuiweb/Uploads';var $kindeditor=[];$kindeditor['image_upload_json']='<?php echo U('Communal/Kindeditor/uploadJson');?>';$kindeditor['path']='<?php echo strtolower(CONTROLLER_NAME).'/data/';?>';</script><?php if($notyle): else: ?><link href="/zhihuiweb/Public/admin/css/style.css" rel="stylesheet" type="text/css"><?php endif; ?><script type="text/javascript" src="/zhihuiweb/Public/common/js/jquery.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/js/function.js"></script><script type="text/javascript" src="/zhihuiweb/Public/admin/js/function.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/jquery.artDialog.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/plugins/artDialog.iframeTools.source.js"></script></head><body><div class="so_main"><div class="Toolbar_inbox"><a href="<?php echo U('Info/add',array('tid'=>$_GET['tid']?$_GET['tid']:0));?>"  class="btn btn-default"><span>添加</span></a>&nbsp;    <a href="javascript:void(0);" onclick="eEvent.delAll()" class="btn btn-default">删除</a><form method="get" action="<?php echo U('Info/index');?>" class="fr" id="search_form"><select name="tid" id="tid"><option value="">全部分类</option><?php echo A('Communal/Type')->getOptionById(2,$_GET['tid']?$_GET['tid']:0);?></select>&nbsp;          <input name="keywords" type="text"  value="<?php echo ($_GET['keywords']); ?>" placeholder="标题关键词"/>          发布日期 <input name="start" type="text" id="start" value="<?php echo ($_GET['start']); ?>"/>-<input name="end" type="text" id="end" value="<?php echo ($_GET['end']); ?>"/>&nbsp;          <select name="order"><option value="" <?php if(empty($_GET['order'])): ?>selected<?php endif; ?>>排序</option><option value="1" <?php if($_GET['order'] == '1'): ?>selected<?php endif; ?>>小到大</option><option value="2" <?php if($_GET['order'] == '2'): ?>selected<?php endif; ?>>大到小</option></select>&nbsp;          <select name="status"><option value=""  <?php if(empty($_GET['status'])): ?>selected<?php endif; ?>>全部显示</option><option value="1" <?php if($_GET['status'] == '1'): ?>selected<?php endif; ?>>只显示是</option><option value="0" <?php if($_GET['status'] == '0'): ?>selected<?php endif; ?>>只显示否</option></select>&nbsp;          <input type="submit"  class="btn btn-default" id="submit" value="搜索" /></form></div><div class="list"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><th style="width:30px;"><input type="checkbox" id="checkbox_handle" onclick="checkAll(this)" value="0"><label for="checkbox"></label></th><th class="line_l">ID</th><th class="line_l">名字</th><th class="line_l">图片</th><th class="line_l">发布时间</th><th class="line_l">[分类id]分类名</th><th class="line_l">属性</th><th class="line_l">作者</th><th class="line_l">点击率</th><th class="line_l">排序</th><th class="line_l">操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr overstyle='on' id=""><td><input type="checkbox" name="ids[]" id="ids[]" value="<?php echo ($vo['id']); ?>"></td><td><?php echo ($vo['id']); ?></td><td><?php echo (msubstr($vo['title'],0,50)); ?></td><td><?php if($vo['img']): ?><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" style="height:35px;" onerror="this.style.display='none'" /><?php endif; ?></td><td><?php echo (date('Y-m-d H:i',$vo['time'])); ?></td><td><a href="<?php echo U('Info/index',array('tid'=>$vo['tid']));?>"/>[<?php echo ($vo['tid']); ?>]<?php echo ($vo['type']['title']); ?></a></td><td><?php echo str_replace(array('h','c','f','a','s','b','i','j'), array('头条','推荐','幻灯','特荐','滚动','加粗','图片','跳转'), $vo['flags']); ?></td><td><?php echo ($vo['author']); ?></td><td><?php echo ($vo['hits']); ?></td><td><?php echo ($vo['sort']); ?></td><td><a href="<?php echo U('Info/edit',array('id'=>$vo['id']));?>">修改</a>&nbsp;&nbsp;            <a href="javascript:void(0)" onclick="eEvent.del('<?php echo ($vo['id']); ?>');">删除</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table></div><div class="Toolbar_inbox"><div class="page fr"><?php echo ($page); ?></div></div></div><link type="text/css" rel="stylesheet" href="/zhihuiweb/Public/common/datetime/datetimepicker.css" /><script src="/zhihuiweb/Public/common/datetime/bootstrap-datetimepicker.min.js" type="text/javascript" charset="UTF-8"></script><script src="/zhihuiweb/Public/common/datetime/bootstrap-datetimepicker.zh-CN.js" type="text/javascript" charset="UTF-8"></script><script type="text/javascript">eEvent.delUrl="<?php echo U('Info/del');?>";$('#start').datetimepicker({    format: 'yyyy-mm-dd',    language:"zh-CN",    minView:2,    autoclose:true});$('#end').datetimepicker({    format: 'yyyy-mm-dd',    language:"zh-CN",    minView:2,    autoclose:true});$('#search_form select').change(function(event) {  $('#submit').click();});</script><script type="text/javascript">$(function () {  $('[data-toggle="tooltip"]').tooltip()})</script></body></html>