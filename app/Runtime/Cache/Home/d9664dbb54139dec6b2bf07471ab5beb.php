<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>/zhihuiweb/" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
<link rel="shortcut icon" type="image/x-icon" href="/zhihuiweb/Public/home/images/favicon.ico" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($row['title']): echo ($row['title']); ?>|<?php endif; echo ($config['title']); ?></title>
<meta name="keywords" content="<?php if($row['keywords']): echo ($row['keywords']); ?>|<?php endif; echo ($config['keywords']); ?>">
<meta name="description" content="<?php if($row['desc']): echo ($row['desc']); ?>|<?php endif; echo ($config['description']); ?>">
<link type="text/css" rel="stylesheet" href="/zhihuiweb/Public/home/css/common.css?version=1.0" />
<link type="text/css" rel="stylesheet" href="/zhihuiweb/Public/home/css/index.css" />
<script type="text/javascript" src="/zhihuiweb/Public/home/js/jquery.min.js"></script>z
<!--[if lte IE 6]>
<style type="text/css">
    body { behavior:url("css/csshover.htc"); }
</style>
<![endif]-->
</head>
<body>
<div id="header">
    <div class="container">     
        <div class="logo">
            <a href="#"><img src="/zhihuiweb/Public/home/images/logo.png" alt="科学技术研究院" title="科学技术研究院" /></a>
        </div>
        <div id="menu_nav">
          <ul>
<!--             <?php if(is_array($headerType)): $i = 0; $__LIST__ = $headerType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="menu_item"><a href="<?php echo ($vo['template_index']); ?>" hidefocus="true" class="menu_bg" ><?php echo ($vo['title']); ?></a>
                    
                </li><?php endforeach; endif; else: echo "" ;endif; ?> -->
            <li class="menu_item"><a href="<?php echo U('Index/index');?>" hidefocus="true" <?php if($CAName == indexindex): ?>class="menu_bg current"<?php else: ?>class="menu_bg"<?php endif; ?> >首页</a></li>
            <li class="menu_item"><a href="<?php echo U('Info/productServer');?>" hidefocus="true"  <?php if($CAName == infoproductserver): ?>class="menu_bg current"<?php else: ?>class="menu_bg"<?php endif; ?>>产品服务</a></li>            
            <li class="menu_item"><a href="<?php echo U('Info/companynews');?>" hidefocus="true"  <?php if(($CAName == infocompanynews) OR ($CAName == infotechnologynews)): ?>class="menu_bg current"<?php else: ?>class="menu_bg"<?php endif; ?>>新闻动态</a>
                    <div>
                      <a href="<?php echo U('Info/companynews');?>" hidefocus="true">公司新闻</a>
                      <a href="<?php echo U('Info/technologynews');?>" hidefocus="true">科学新闻</a>
                    </div>  
            </li>
            <li class="menu_item"><a href="<?php echo U('Info/cases');?>" hidefocus="true"  <?php if($CAName == infocases): ?>class="menu_bg current"<?php else: ?>class="menu_bg"<?php endif; ?>>应用案例</a></li>
            <li class="menu_item">
                   <a href="<?php echo U('Info/aboutUs');?>" hidefocus="true"  <?php if($CAName == infoaboutus): ?>class="menu_bg current"<?php else: ?>class="menu_bg"<?php endif; ?>>关于我们</a>
                   <div>
                      <a href="<?php echo U('Info/aboutUs');?>/#aboutus" hidefocus="true">公司简介</a>
                      <a href="<?php echo U('Info/aboutUs');?>/#people" hidefocus="true">专家介绍</a>
                      <a href="<?php echo U('Info/aboutUs');?>/#field" hidefocus="true">下属机构</a>
                      <a href="<?php echo U('Info/aboutUs');?>/#friend" hidefocus="true">合作伙伴</a>
                     <!--  <a href="<?php echo U('Info/aboutUs');?>/#cases" hidefocus="true">应用案例</a> -->
                      <a href="<?php echo U('Info/aboutUs');?>/#service" hidefocus="true">售后服务</a>
                  </div>
            </li>
          </ul>
        </div>
        <div class="right phone">
            <i class="icon iconfont">&#xe624;</i><span><?php echo ($config['ex']['tel']); ?></span>
        </div> 
    </div>    
</div>
<div class="header_line"></div>
<script src="/zhihuiweb/Public/home/js/jquery.flexslider-min.js"></script>
<div class="flexslider">
    <ul class="slides">
    	<?php if(is_array($focus)): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="background:url(/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>) #CCE1F3 center 0 no-repeat"></li><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--<a href="#"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" /></a>-->
    </ul>        
</div>
<script type="text/javascript">
$(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
	$(".field_list li:nth-child(3n)").css("marginRight",0);
	$(".case_list li:nth-child(4n)").css("marginRight",0);
	$(".friend_list li:nth-child(6n)").css("marginRight",0);
});
</script>
<div class="field">
    <div class="container">
     	<ul class="title_ul">            	
            <li class="title_line"></li>
            <li class="left">
                <span class="index_title">涉及领域</span>             
            </li>
            <li class="title_line"></li>               
        </ul>
        	
        <div class="clearfix"></div>
        
        <ul class="field_list ul_clear">
        	<?php if(is_array($field)): $i = 0; $__LIST__ = $field;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
	                <img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" title="<?php echo ($vo['title']); ?>" />
	                <p class="field_title"><a href="javascript:void(0)" style="cursor:default"><?php echo ($vo['title']); ?></a></p>
	                <p class="field_con"><?php echo ($vo['desc']); ?></p>
	            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>


<div class="clearfix"></div>

<div class="case_bg">
	<div class="container">
        
        <ul class="title_ul">            	
            <li class="title_line"></li>
            <li class="left">
                <span class="index_title">智能机器人应用</span>
            </li>
            <li class="title_line"></li>               
        </ul>
        	
        <div class="clearfix"></div>
        
        <ul class="case_list ul_clear">
        	<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
	                <a href="javascript:void(0)"  style="cursor:default"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" title="<?php echo ($vo['title']); ?>" /></a>
	                <div class="case_des">
	                    <h4><a href="javascript:void(0)"  style="cursor:default"><?php echo ($vo['title']); ?></a></h4>
	                    <p><?php echo ($vo['desc']); ?></p>
	                </div>
	            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<div class="friend">
	
    <ul class="title_ul">            	
        <li class="title_line"></li>
        <li class="left">
            <span class="index_title">合作伙伴</span>             
        </li>
        <li class="title_line"></li>               
    </ul>
        
    <div class="clearfix"></div>
    
	<ul class="friend_list ul_clear">
        <?php if(is_array($friends)): $i = 0; $__LIST__ = $friends;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a <?php if($v['url']): ?>href=<?php echo ($v['url']); ?> target="_blank"<?php else: ?> href="javascript:void(0)"  style="cursor:default"<?php endif; ?> ><img src="/zhihuiweb/Uploads/<?php echo ($v['img']); ?>" alt="<?php echo ($v['title']); ?>" title="<?php echo ($v['title']); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

<div class="clearfix"></div>
<div class="bottom">
        <div class="bottom1">
                <ul>
                        <li>
                                <div class="img_fault"><span class="img_span">100倍故障时长赔偿</span></div>
                        </li>
                        <li>
                                <div class="img_customer"><span class="img_span">24小时售后支持</span></div>
                        </li>
                        <li>
                                <div class="img_return"><span class="img_span">5天无理由退换</span></div>
                        </li>
                </ul>
        </div>

        <div class="bottom2 margin15"></div>

        <div class="bottom3">
                <div class="bottomLeft fleft">
                        <div><span class="bottomspan1">联系电话</span><span class="bottomspan2">022-83560730</span></div>
                </div>
                <div class="bottomRight fleft">
                        <div class="bottomRight1">
                                <span>全方位的购买咨询  |</span>
                                <span>精准的配套推荐  |</span>
                                <span>灵活的价格方案  |</span>
                                <span>1对1贴心服务</span>
                        </div>

                        <div class="bottomRight2">
                                <div class="bottomRight21 fleft">
                                        <span>联系方式</span>
                                        <ul>
                                                <li>天津市南开区慧谷大厦2413</li>
                                                <li>http://www.itcrm.com/</li>
                                        </ul>
                                </div>
                                <div class="bottomRight22 fleft">
                                        <span>关注智汇</span>
                                        <div>
                                                <img src="/zhihuiweb/Public/home/images/img_qrcode.png" />
                                        </div>
                                </div>
                        </div>

                        <div class="bottomRight3">
                                <span class="bottomRight31">合作伙伴</span>
                                <div class="bottomRight32">
                                        <span>安远新能源</span>
                                        <span>HFRT</span>
                                        <span>高通盛融</span>
                                        <span>博盛地产</span>
                                        <span>中国科学院计算机研究所</span>
                                        <span>万卓智汇</span>
                                </div>
                        </div>
                </div>
        </div>
</div>


</body>
</html>