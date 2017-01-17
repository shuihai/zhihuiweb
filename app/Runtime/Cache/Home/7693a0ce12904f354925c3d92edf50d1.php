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
                                <li <?php if(($CAName == infocustomer_service) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/customer_service');?>">解决方案</a></li>
                                <li <?php if(($CAName == infoproduct_introduction) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/product_introduction');?>">产品介绍</a></li>
                                <li <?php if(($CAName == infobusiness_contact) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/business_contact');?>">业务联系</a></li>
                                <li <?php if(($CAName == infochannel_cooperation) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/channel_cooperation');?>">渠道合作</a></li>
                                <li <?php if(($CAName == infoafter_sale_platform) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/after_sale_platform');?>">售后平台</a></li>
                                <li <?php if(($CAName == infojoin_us) ): ?>class="navli"<?php endif; ?>><a href="<?php echo U('Info/join_us');?>">加入我们</a></li>
                        </ul>
                </div>
        </div>
		<div class="companytitle">
			<div class="companytitle1">
				<ul>
					<li class="titlec"><a href="<?php echo U('Info/company_introduction');?>">公司介绍</a></li>
					<li><a href="<?php echo U('Info/team');?>">团队介绍</a></li>
					<li><a href="<?php echo U('Info/mechanism');?>">下属机构</a></li>
					<li><a href="<?php echo U('Info/news');?>">新闻动态</a></li>
				</ul>
			</div>
			<div class="companytitle2">
				<div class="title-c fleft">
					<i class="title-i1">公司介绍</i>
					<i class="title-i2">Company profile</i>
				</div>
				<div class="title-slant fleft"></div>
				<div class="title-n fleft">
					<i class="title-i3">您的满意是我们存在的价值。</i>
				</div>
			</div>
		</div>
		
		<div class="centre">
			<div class="present1 margin100"> <span>公司介绍</span> </div>
			<div class="present2 width1225">
				<div class="present21">新闻动态</div>
				<div class="present22 present24 news">
					<ul>
                                            
                                            <?php if(is_array($company)): $i = 0; $__LIST__ = $company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                      
							<span class="newstitle"><?php echo ($vo['title']); ?></span>
							<div class="newscentre1">
								<div class="newscentre11 fleft"><span><?php echo (date("Y-m-d",$vo['time'])); ?></span><span><?php echo (date("h:i:s",$vo['time'])); ?><span></span></div>              
								<div class="newscentre12 fleft"><a href="
                                                                                    <?php if(empty($vo['url'])){ echo U('Info/detail',array('id'=>$vo['id'])); }else{ echo $vo['url']; } ?>
                                                                                                   ">查看源网页</a><span>|</span></div>
								<div class="newscentre13 fleft">
									<span class="newscentre31">12</span>
								
									<span class="newscentre33"> &nbsp
                                                                        <div class="newsqimg"><img src="/zhihuiweb/Public/home/images/img_orwzma.png" /></div>
                                                                        </span>
								</div>
							</div>
							<div class="newsimg"><img src="/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>"/></div>
							<div class="newscentre2">
								<p><?php echo ($vo['desc']); ?></p>
							</div>
							<div class="newscentre3"><a href="
                                                                                    <?php if(empty($vo['url'])){ echo U('Info/detail',array('id'=>$vo['id'])); }else{ echo $vo['url']; } ?>
                                                                                    ">+ 更多</a></div>
                                                        
                                                  
                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            
						
					</ul>
                                        <div class="paging">
						<div>
							<ul>
								<li><a href="#" class="paginimg"><img src="/zhihuiweb/Public/home/images/btn_arrow1.png" /></a></li>
								<li><a href="#" class="paginimg"><img src="/zhihuiweb/Public/home/images/btn_arrow3.png" /></a></li>
								<li><a href="#" class="padina"><span>1</span></a></li>
								<li><a href="#"><span>2</span></a></li>
								<li><a href="#"><span>3</span></a></li>
								<li><a href="#"><span>4</span></a></li>
								<li><a href="#"><span>5</span></a></li>
								<li><a href="#" class="paginimg"><img src="/zhihuiweb/Public/home/images/btn_arrow4.png" /></a></li>
								<li><a href="#" class="paginimg"><img src="/zhihuiweb/Public/home/images/btn_arrow2.png" /></a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>
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