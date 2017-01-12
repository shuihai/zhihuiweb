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


<link rel="stylesheet" href="/zhihuiweb/Public/home/css/base.css" />
<link rel="stylesheet" href="/zhihuiweb/Public/home/css/swiper.css" />
<link rel="stylesheet" href="/zhihuiweb/Public/home/css/animate.css" />

<script type="text/javascript" src="/zhihuiweb/Public/home/js/jquery.min.js" ></script>
<script type="text/javascript" src="/zhihuiweb/Public/home/js/swiper.min.js" ></script>
<script type="text/javascript" src="/zhihuiweb/Public/home/js/wow.min.js"></script>
<script type="text/javascript" src="/zhihuiweb/Public/home/js/prefixfree.min.js"></script>


<!--[if lte IE 6]>
<style type="text/css">
    body { behavior:url("css/csshover.htc"); }
</style>
<![endif]-->
</head>

<body>
        <div class="head">
                <div class="headLogo fleft"><img src="/zhihuiweb/Public/home/images/logo.png"/></div>
                <div class="nav fleft">
                        <ul>
                                <li class="navli"><a href="<?php echo U('Index/Index');?>">首页</a></li>
                                <li><a href="<?php echo U('Info/Company_introduction');?>">公司介绍</a></li>
                                <li><a href="Customer-service.html">解决方案</a></li>
                                <li><a href="Product-introduction.html">产品介绍</a></li>
                                <li><a href="Business-contact.html">业务联系</a></li>
                                <li><a href="Channel-cooperation.html">渠道合作</a></li>
                                <li><a href="After-sale-platform.html">售后平台</a></li>
                                <li><a href="Join-us.html">加入我们</a></li>
                        </ul>
                </div>
        </div>
<link type="text/css" rel="stylesheet" href="/zhihuiweb/Public/home/css/about.css" />
<div class="banner_inner">
    <div class="aboutUs_outer">
        <div class="aboutUs_inner">
            <h1><?php echo ($about['title']); ?></h1>
            <p><?php echo ($about['desc']); ?></p>
        </div>
    </div>
	<img src="/zhihuiweb/Public/home/images/banner_about.jpg" />
</div>
<div class="container_inner" style="margin-top:40px;">
	<div class="about">
    	<h3><a id="aboutus"><?php echo ($desc['title']); ?></a></h3>

        <div class="about_con">
            <img src="/zhihuiweb/Uploads/<?php echo ($desc['img']); ?>" />
            <p style="text-indent:34px;"><?php echo htmlspecialchars_decode($desc['text']);?></p>
        </div>
    </div>
    <div class="about"  style="width:1400px">
    	<h3><a id="people"><?php echo ($expert['title']); ?></a></h3>
       	<ul class="people_list ul_clear">
            <?php if(is_array($expert['images'])): $i = 0; $__LIST__ = $expert['images'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
               <!--      <a href="javascript:void(0)"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" title="<?php echo ($vo['title']); ?>" /></a> -->
                    <div class="people_des">
                        <h4><a href="javascript:void(0)"><?php echo ($vo['title']); ?></a></h4>
                        <p><?php echo ($vo['desc']); ?></p>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="about">
    	<h3><a id="field"><?php echo ($mechanism['title']); ?></a></h3>
        <div class="about_con">
        	<p><?php echo htmlspecialchars_decode($mechanism['text']);?></p>
       	</div>
    </div>
    <div class="about friend_about">
    	<h3><a id="friend">合作伙伴</a></h3>
        <ul class="friend_list ul_clear">
            <?php if(is_array($friends)): $i = 0; $__LIST__ = $friends;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a <?php if($v['url']): ?>href=<?php echo ($v['url']); ?> target="_blank"<?php else: ?> href="javascript:void(0)"  style="cursor:default"<?php endif; ?> ><img src="/zhihuiweb/Uploads/<?php echo ($v['img']); ?>" alt="<?php echo ($v['title']); ?>" title="<?php echo ($v['title']); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
<!--     <div class="about" style="width:1180px; margin-top:30px;">
    	<h3><a href="<?php echo U('Info/aboutUs');?>" id="cases">应用案例</a></h3>
       	<ul class="cases_list case_bg ul_clear">
        	<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <a href="<?php echo U('Info/cases');?>"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" title="<?php echo ($vo['title']); ?>" /></a>
                    <div class="cases_des">
                        <h4><a href="#"><?php echo ($vo['title']); ?></a></h4>
                      
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div> -->
    <div class="about">
    	<h3><a id="service"><?php echo ($aftermarket['title']); ?></a></h3>
        <div class="about_con">
        	<p><?php echo ($aftermarket['desc']); ?></p>
       	</div>
    </div>		
</div>
<div class="clearfix"></div>
    <script>  
        $(function(){   
            $('a[href*=#],area[href*=#]').click(function() {  
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {  
                    var $target = $(this.hash);  
                    $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');  
                    if ($target.length) {  
                        var targetOffset = $target.offset().top;  
                        $('html,body').animate({  
                                    scrollTop: targetOffset  
                                },  
                                1000);  
                        return false;  
                    }  
                }  
            });  
        })  
    </script>  
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