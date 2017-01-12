<?php if (!defined('THINK_PATH')) exit(); $user=session('admin_user') ;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" class="indexhtml"><head><base href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>/zhihuiweb/" /><meta name="renderer" content="webkit"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>管理中心</title><link href="/zhihuiweb/Public/admin/css/style.css" rel="stylesheet" type="text/css"><script type="text/javascript" src="/zhihuiweb/Public/common/js/jquery.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/jquery.artDialog.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/plugins/artDialog.iframeTools.source.js"></script><style type="text/css">html{_overflow-y:scroll}</style><script>if(self!=top){top.location=self.location;}</script></head><body scroll="no"><div class="topnav"><div class="sitenav"><div class=welcome>您好：<span class="username"><?php echo ($user['username']); ?></span></div><div class=sitelink> |    <a href="<?php echo U('Index/index');?>" target="_parent">后台首页</a> |    <a href="<?php echo U('Home/Index/index');?>" target="_blank">网站主页</a> |    <a href="<?php echo U('User/logout');?>">安全退出</a></div></div><div class="leftnav"><div class="logo"><a href="<?php echo U('Admin/Index/index');?>">ZHIHUI</a></div><ul><li class="navleft"></li><?php if(is_array($main_menu)): $i = 0; $__LIST__ = $main_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == 1){ $first_menu_id = $vo['id']; } ?><li id="d<?php echo ($i); ?>" <?php if(($i) == "1"): ?>class="thisclass"<?php endif; ?> onClick="ConClass(<?php echo ($i); ?>);"><a href="<?php echo U('Index/left',array('id'=>$vo['id']));?>" target="leftfra" ><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?><li class="navright"></li></ul></div></div><div id="Maincontent"><div id="leftMenu"><iframe src="<?php echo U('Index/left', array('id'=>$first_menu_id));?>" id="leftfra" name="leftfra" frameborder="0" scrolling="no"  style="border:none" width="100%" height="100%" ></iframe></div><div id="mainNav"><div class="cur_position"><div class="cur">当前位置：<span id='current'></span><span id='sub_current'></span></div></div><div class="mframe"><iframe name="main" id="main" src="<?php echo U('Index/main');?>" frameborder="false" scrolling="auto" width="100%" height="100%" ></iframe></div></div></div>
<script type="text/javascript">
function windowW(){
	if($(window).width()<980){
			$('#Maincontent').css('width',980+'px');
			$('body').attr('scroll','');
			$('body').css('overflow','');
	}
}
windowW();
$(window).resize(function(){
	if($(window).width()<980){
		windowW();
	}else{
		$('#Maincontent').css('width','auto');
		$('body').attr('scroll','no');
		$('body').css('overflow','hidden');
	}
});
window.onresize = function(){
	var heights = document.documentElement.clientHeight-49;document.getElementById('main').height = heights;
	var openClose = $("#main").height()+39;
}
window.onresize();
$(document).ready(function(){
	$("#delcache").click(function(){
		$ajaxurl = $(this).attr('href');
		$.get($ajaxurl,null,function(data){
			$("#cache").show();
			$("#cache").html(' <font color=#ff0000>'+data+'</font>');
			window.setTimeout(function(){
				$("#cache").hide();
			},2000);
		});
		return false;
	});
	$("#cache").click(function(){
		$("#cache").hide();
		return false;
	});
});
function left(url){
	leftfra.show(url);
}
function ConClass(id){
	var i,max;
	max = '{$i}';
	if(max == false) {max = 10;}
    var str=$('#d'+id).text()+' > ';
	for(i=1;i<=max;i++){
		if (id==i) {
		$('#d'+i).addClass('thisclass');
		}else{
		$('#d'+i).removeClass('thisclass');	
		}
	}
	$('#sub_current').html('');
	$('#current').html(str);
}
$('#leftMenu').css("height",$(window).height()+'px');
</script>
</body></html>