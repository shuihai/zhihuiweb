<?php if (!defined('THINK_PATH')) exit(); $user=session('admin_user');?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><base href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>/zhihuiweb/" /><meta name="renderer" content="webkit"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>管理后台</title><script type="text/javascript">var $config=[];$config['app']='http://<?php echo ($_SERVER['SERVER_NAME']); ?>/zhihuiweb/';$config['site_url']='<?php echo ($config['site_url']); ?>';$config['domain']='<?php echo ($config['domain']); ?>';$config['public']='/zhihuiweb/Public';$config['upload']='/zhihuiweb/Uploads';var $kindeditor=[];$kindeditor['image_upload_json']='<?php echo U('Communal/Kindeditor/uploadJson');?>';$kindeditor['path']='<?php echo strtolower(CONTROLLER_NAME).'/data/';?>';</script><?php if($notyle): else: ?><link href="/zhihuiweb/Public/admin/css/style.css" rel="stylesheet" type="text/css"><?php endif; ?><script type="text/javascript" src="/zhihuiweb/Public/common/js/jquery.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/js/function.js"></script><script type="text/javascript" src="/zhihuiweb/Public/admin/js/function.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/jquery.artDialog.js"></script><script type="text/javascript" src="/zhihuiweb/Public/common/artDialog/plugins/artDialog.iframeTools.source.js"></script></head><body><div class="row_main"><form action="<?php echo U('Admin/Agent/edit');?>" method="post" enctype="multipart/form-data"><div class="tab-content"><input type="hidden" name="id" value="<?php echo ($row["id"]); ?>"><table class="form_table"><tr class="tr rt"><td>代理商名称</td><td  class="lt"><input type="text" name="name" value="<?php echo ($row["name"]); ?>" class="form_table_title"/></td></tr><tr class="tr rt"><td>省</td><td  class="lt"><select name="province" id="province"><option value="">请选择</option><?php if(is_array($provice)): $i = 0; $__LIST__ = $provice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></td></tr><tr class="tr rt"><td>市</td><td  class="lt"><select name="city"  id="city"><option value="">请选择城市</option></select></td></tr><tr class="tr rt"><td>地址</td><td  class="lt"><input type="text" name="address" value="<?php echo ($row["address"]); ?>" class="form_table_title"/></td></tr><tr class="tr rt"><td>联系方式</td><td  class="lt"><input type="text" name="phone" value="<?php echo ($row["phone"]); ?>" class="form_table_title"/></td></tr><tr class="tr rt"><td>类型</td><td  class="lt"><select name="type"><option <?php if(($row["type"]) == "1"): ?>selected<?php endif; ?> value="1">一级代理</option><option <?php if(($row["type"]) == "2"): ?>selected<?php endif; ?> value="2">二级代理</option><option <?php if(($row["type"]) == "3"): ?>selected<?php endif; ?> value="3">三级代理</option></select></td></tr><tr class="tr rt"><td colspan="4"><input name="submit" type="submit" class="btn btn-default" value="添加" ></td></table></div></form></div><script >    var cityurl = "<?php echo U('getcity');?>";       $(function (){        $('#province').change(function(){            $.post(cityurl,{'province':$('#province').val()},                function(result){                                    $('#city option').remove();                    $("<option  value=''>请选择城市</option>").appendTo("#city");                    for(var i=0;i<result.length;i++){                        //alert(result[i]['city']);                        $("<option value="+result[i]['id']+" >"+result[i]['name']+"</option>").appendTo("#city");                    }                },'json')        })    })        </script><script type="text/javascript">$(function () {  $('[data-toggle="tooltip"]').tooltip()})</script></body></html>