<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><meta name="renderer" content="webkit"><meta http-equiv="X-UA-Compatible" content="IE=EDGE"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>登陆管理中心</title><base href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>/zhihuiweb/" /><link href="/zhihuiweb/Public/admin/css/style.css" rel="stylesheet" type="text/css"><script type="text/javascript" src="/zhihuiweb/Public/common/js/jquery.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/js/function.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/jquery.artDialog.js"></script></head><body><table class="logintb"><tbody><tr><td class="login"><h1></h1><p>天津智汇时代后台管理系统</p></td><td><form method="post" autocomplete="off" name="login" id="loginform" ><input type="hidden" name="frames" value="yes"><p class="logintitle">用户名: </p><p class="loginform"><input name="username" tabindex="1" type="text" class="txt" autocomplete="off"></p><p class="logintitle">密　码:</p><p class="loginform"><input name="password" tabindex="1" type="password" class="txt" autocomplete="off"></p><p class="logintitle">验证码:</p><p class="loginform"><input name="verify" id="verify" type="text" tabindex="1" class="txt" autocomplete="off" /><img src="<?php echo U('Communal/Public/verify',array('width'=>45,'height'=>22));?>" id="login_verify_img" onclick="javascript:this.src=this.src+'?'"/></p><p class="loginnofloat"><span name="submit" tabindex="3" type="submit" class="btn btn-default" id="submit">提交</span></p></form></td></tr></tbody></table><script type="text/javascript">$("html").on("keydown",'body',function(event){