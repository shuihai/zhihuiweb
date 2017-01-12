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
<script type="text/javascript" src="/zhihuiweb/Public/home/js/jquery.min.js"></script>
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
<link type="text/css" rel="stylesheet" href="/zhihuiweb/Public/home/css/product.css" />
<div class="container_inner" style="margin-top:100px;">            
    <div class="product_title">    
        <ul class="pttabbtn ul_clear" id="protitletab">
                <li class="on">
                    <img src="/zhihuiweb/Uploads/<?php echo ($robot['img']); ?>" />
                    <a href="javascript:void(0);"><?php echo ($robot['title']); ?></a>
                </li>
                <li>
                    <img src="/zhihuiweb/Uploads/<?php echo ($vr['img']); ?>" />
                    <a href="javascript:void(0);"><?php echo ($vr['title']); ?></a>
                </li>
                <!--<li>-->
                    <!--<img src="/zhihuiweb/Uploads/<?php echo ($biometrics['img']); ?>" />-->
                    <!--<a href="javascript:void(0);"><?php echo ($biometrics['title']); ?></a>-->
                <!--</li>-->
        </ul>
        <div class="pttabcon" id="protitlecon">       
                <div class="pt_sublist">            
                    <h3><?php echo ($robot['title']); ?></h3>
                    <p>
                       <?php echo ($robot['desc']); ?>
                    </p>
                    <!--参数及焦点图部分-->
                    <div class="clearfix"></div>
                    <div class="container_inner product_parameter">
                        <?php echo htmlspecialchars_decode($robot['text']);?>
                        <div class="product_parameter_img">
                            <!--图片滚动-->
                            <div id="parameter_img">
                                <ul>
                                    <?php if(is_array($roMidFocus)): $i = 0; $__LIST__ = $roMidFocus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="fancybox"  data-fancybox-group="gallery"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" rel="lightbox" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                            <script src="/zhihuiweb/Public/home/js/jquery.kxbdMarquee.js"></script>
                            <script type="text/javascript">
                            (function(){
                                $("#parameter_img").kxbdMarquee({direction:"left"});
                            })();
                            </script>
                        </div>
                    </div>
                    <!--产品参数部分-->
                    <div class="clearfix"></div>
                    <!--底部应用场景图片轮播-->
                    <div class="container_inner" style="height:399px;">
                       <div class="callbacks_container">
                            <ul id="scene_slider" class="scene_slider">
                                <?php if(is_array($roBottomFocus)): $i = 0; $__LIST__ = $roBottomFocus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="javascript:void(0)"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <!--参数及焦点图部分结束-->
                </div>
                <div class="pt_sublist">            
                    <h3><?php echo ($vr['title']); ?></h3>
                    <p>
                       <?php echo ($vr['desc']); ?>
                    </p>
                    <div class="clearfix"></div>

                        <!--产品参数部分-->
                        <div class="clearfix"></div>
                        <!--底部应用场景图片轮播-->
                        <div class="container_inner" style="height:399px;">
                           <div class="callbacks_container">
                                <ul id="scene_slider" class="scene_slider">
                                    <?php if(is_array($VRBottomFocus)): $i = 0; $__LIST__ = $VRBottomFocus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="javascript:void(0)"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>    
                <!--<div class="pt_sublist">            -->
                    <!--<h3><?php echo ($biometrics['title']); ?></h3>-->
                    <!--<p>-->
                       <!--<?php echo ($biometrics['desc']); ?>-->
                    <!--</p>-->
                    <!--<div class="clearfix"></div>-->

                        <!--&lt;!&ndash;产品参数部分&ndash;&gt;-->
                        <!--<div class="clearfix"></div>-->
                        <!--&lt;!&ndash;底部应用场景图片轮播&ndash;&gt;-->
                        <!--<div class="container_inner" style="height:399px;">-->
                           <!--<div class="callbacks_container">-->
                                <!--<ul id="scene_slider" class="scene_slider">-->
                                    <!--<?php if(is_array($biBottomFocus)): $i = 0; $__LIST__ = $biBottomFocus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                                        <!--<li><a href="javascript:void(0)" style="width:1200px;height:399px;"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" style="width:1200px;height:399px;"/></a></li>-->
                                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                <!--</ul>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>         -->
        </div>   
    </div> 

</div>  
<script type="text/javascript" src="/zhihuiweb/Public/home/js/jquery.tabso_yeso.js"></script>
<script type="text/javascript">
$(function($){
    //产品标题内容部分选项切换  
    $("#protitletab").tabso({
        cntSelect:"#protitlecon",
        tabEvent:"mouseover",
        tabStyle:"normal"
    });
});
</script>

<script type="text/javascript" src="/zhihuiweb/Public/home/js/responsiveslides.min.js"></script>
<script type="text/javascript">

$(function () {
  $(".scene_slider").responsiveSlides({
    auto: true,
    pager: false,
    nav: true,
    speed: 300,
    namespace: "callbacks",
    before: function () {
      $('.events').append("<li>before event fired.</li>");
    },
    after: function () {
      $('.events').append("<li>after event fired.</li>");
    }
  });
});
</script>


<!--底部应用场景图片轮播-->

<div id="footer">
    <div class="footer_con">
        <div class="footer_concat">
            <div class="footer_concat_con">
                <h4>联系方式</h4>
                <p>服务热线：<?php echo ($config['ex']['tel']); ?></p>
                <p>公司QQ：<?php echo ($config['ex']['qq']); ?></p>
            </div>
            <div class="footer_concat_con" style="margin-top: 40px;width: 350px;">
                <h4></h4>
                <p>邮箱：<?php echo ($config['ex']['email']); ?></p>
                <p>地址：<?php echo ($config['ex']['address']); ?></p>
            </div>
            <div class="footer_code">
                <p class="sweep_code">扫一扫 关注我</p>
                <img src="<?php echo ($config['ex']['erweima']); ?>" alt="二维码" title="二维码" />
            </div>
        </div>
        
        <div class="underline_footer"></div>
        
        <div class="footer_copyright">
            <ul class="footer_list">
                <li><a href="<?php echo U('Info/aboutus');?>">关于我们</a><span>|</span></li>
                <li><a href="#">使用指南</a><span>|</span></li>
                <li><a href="#">联系我们</a><span>|</span></li>
                <li><a href="#">服务条款</a></li>
            </ul>
            <p style="margin-left:200px;"><?php echo ($config['ex']['beian']); ?></p>
            <p class="copyright"><?php echo ($config['ex']['banquan']); ?></p>
        </div>
    </div>
</div>
<div class="go-top dn" id="go-top">
    <a href="javascript:void(0)" class="go"></a>
</div>
<script type="text/javascript">
$(function(){
    
    
    /*设置每行的最后一个元素margin-right为0*/
    $(".about ul.people_list li:nth-child(5n)").css("marginRight",0);
    $(".cases_list li:nth-child(6n)").css("marginRight",0);
    $(".friend_list li:nth-child(6n)").css("marginRight",0);
    
    
    
    /*backtop start*/
    $(window).on('scroll',function(){
        var st = $(document).scrollTop();
        if( st>0 ){
            $('#go-top').fadeIn(function(){
                $(this).removeClass('dn');
            });
           
        }else{
            $('#go-top').fadeOut(function(){
                $(this).addClass('dn');
            });
        }   
    });
    
    $('#go-top .go').on('click',function(){
        $('html,body').animate({'scrollTop':0},500);
    });
    /*backtop end*/
    

});
</script>
</body>
</html>