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
<link rel="stylesheet" type="text/css" href="/zhihuiweb/Public/home/css/news.css">
<div class="container_inner news_content"> 
    <h3><span></span>公司动态</h3>       
    <div class="product_news">
            <div class="pn_sublist">            
                <ul class="ul_clear">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a <?php if($vo['url']): ?>href=<?php echo $vo['url']; else: ?>href="<?php echo U('Info/detail',array('id'=>$vo['id']));?>"<?php endif; ?> ><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" alt="<?php echo ($vo['title']); ?>" title="<?php echo ($vo['title']); ?>" /></a>
                            <div class="product_des">
                                <h4><a <?php if($vo['url']): ?>href=<?php echo $vo['url']; else: ?>href="<?php echo U('Info/detail',array('id'=>$vo['id']));?>"<?php endif; ?>><?php echo ($vo['title']); ?></a></h4>
                                <p><?php echo ($vo['desc']); ?></p>
                            </div>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?>          
                </ul>                
            </div>
            <div class="cutpage"><?php echo ($page); ?></div>       
        </div>
	</div>         	
</div>
<script type="text/javascript">
$(function($){	
	$(".pn_sublist ul li:nth-child(4n)").css("marginRight",0);		
});
</script>
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

</body>
</html>