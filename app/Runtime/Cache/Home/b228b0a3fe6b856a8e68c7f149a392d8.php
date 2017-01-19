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
<link href="/zhihuiweb/Public/home/css/adipoli.css" rel="stylesheet" type="text/css"/>



<script type="text/javascript" src="/zhihuiweb/Public/home/js/jquery-1.7.1.js" ></script>
<script src="/zhihuiweb/Public/home/js/jquery.adipoli.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/zhihuiweb/Public/home/js/swiper.min.js" ></script>
<script type="text/javascript" src="/zhihuiweb/Public/home/js/wow.min.js"></script>
<script type="text/javascript" src="/zhihuiweb/Public/home/js/jquery.SuperSlide.2.1.1.js" ></script>


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
                                <li <?php if(($CAName == indexindex) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Index/index');?>">首页</a></li>
                                <li  <?php if(($CAName == infocompany_introduction) or ($CAName == infoteam) or ($CAName == infomechanism) or ($CAName == infonews) or ($CAName == infodetail)): ?>class="navli"<?php endif; ?> ><a href="<?php echo U('Info/company_introduction');?>">公司介绍</a></li>
                                <li <?php if(($CAName == infocustomer_service) or ($CAName == infosolutions1)): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/customer_service');?>">解决方案</a></li>
                                <li <?php if(($CAName == infoproduct_introduction) or ($CAName == infoproducts1) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/product_introduction');?>">产品介绍</a></li>
                                <li <?php if(($CAName == infobusiness_contact) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/business_contact');?>">业务联系</a></li>
                                <li <?php if(($CAName == infochannel_cooperation) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/channel_cooperation');?>">渠道合作</a></li>
                                <li <?php if(($CAName == infoafter_sale_platform) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/after_sale_platform');?>">售后平台</a></li>
                                <li <?php if(($CAName == infojoin_us) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/join_us');?>">加入我们</a></li>
                        </ul>
                </div>
        </div>
<link type="text/css" rel="stylesheet" href="/zhihuiweb/Public/home/css2/news.css" />

<!--图片滚动-->
<?php if($row['images'] != null): ?><div class="news_detail">
        <div id="news_detail_img">
            <ul>
            	<?php if(is_array($row['images'])): $i = 0; $__LIST__ = $row['images'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div><?php endif; ?>
<script src="/zhihuiweb/Public/home/js/jquery.min.js"></script>
<script src="/zhihuiweb/Public/home/js/jquery.kxbdMarquee.js"></script>

<script type="text/javascript">
(function(){
    $("#news_detail_img").kxbdMarquee({direction:"left"});
})();
</script>
<!--图片滚动-->
<div class="clearfix"></div>
<!--新闻详情-->

<div class="news_detail_con">        
    
    <h4 class="detail_title"><?php echo ($row['title']); ?></h4>
    <div class="detail_con">
   	<?php echo htmlspecialchars_decode($row['text']);?><br />
    </div>


    <div class="detail_page">
        <div class="detail_page_link">
        	<?php if($uprow): ?><a href="<?php echo U('Info/detail',array('id'=>$uprow['id']));?>"><span>上一篇</span><i class="icon iconfont">&#xe65d;</i></a><?php endif; ?>
        </div>
        <div class="detail_page_link">
            <a href="javascript: history.go(-1);"><span>返回</span></a>
        </div>

    </div>


     	
</div>
<script type="text/javascript">
$(function(){
    $(".detail_page .detail_page_link:nth-child(3)").css("marginRight",0);
});
</script>
<!--新闻详情-->
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
                                                <img src="/zhihuiweb/Public/home/images/img_orwzma.png" />
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