<?php if (!defined('THINK_PATH')) exit(); $user=session('admin_user') ;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" class="indexhtml"><head><base href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>/zhihuiweb/" /><meta name="renderer" content="webkit"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>管理中心</title><link href="/zhihuiweb/Public/admin/css/style.css" rel="stylesheet" type="text/css"><script type="text/javascript" src="/zhihuiweb/Public/common/js/jquery.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/jquery.artDialog.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/plugins/artDialog.iframeTools.source.js"></script><style type="text/css">html{_overflow-y:scroll}
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