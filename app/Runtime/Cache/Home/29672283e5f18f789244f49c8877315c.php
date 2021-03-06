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
				<div class="present21">公司简介</div>
				<div class="present22 fleft">
					<p class="">智汇时代科学技术研究院，前身为高通盛融财富集团科学技术研究部，配合公司国际投资战略进行高精尖科学技术研究工作。后经集团战略部署，将科学技术研究部从集团内部拆分，独立设置企业型研究院，并于2016年1月在天津设立科研基地——天津智汇时代科技有限公司，以专注于高精尖科技项目的研发、生产、投资、整合及推广 。</p>
					<p class="">智汇时代研究院的主体任务是研发国际高精尖的科技项目，以高科技产业为依托，通过完善研发环节、打造生产供应链、调用商务推广资源的方式，将研发成果转化到实际和未来的生产生活中，为打造科技型智慧城市增添动力。</p>
				</div>
				<div class="present23 fleft"><img src="/zhihuiweb/Public/home/images/img_c2.png" /></div>
			</div>
			<div class="present2 width1225">
				<div class="present21">大事件</div>
				<div class="present22 present24">
					<p class="">2013年12月  与中国城市科学研究会签订了战略合作协议</p>
					<p class="">2014年1月  与善林(上海)金融信息服务有限公司达成长期战略合作协议</p>
					<p>2014年8月  与新疆生产建设兵团第十二师签订战略合作协议</p>
					<p>2015年1月  与中交第一公路勘察设计研究院有限公司签订了“新疆生产建设兵团第十二师轻型轨道交通规划设计”战略协议</p>
					<p>2015年1月  启动国内航空应急救援合作项目</p>
					<p>2015年4月  与贵州安远新能源汽车有限公司达成战略合作，共同推进新能源汽车项目，建造以新能源汽车制造基地为核心的全新汽车产研集合群，打造新能源汽车国家级科技城和示范城</p>
					<p>2015年5月  入选亚洲企业家协会理事单位</p>
					<p>2015年8月  与国际著名的台湾超能新能源动力研究团队签署了关于新能源项目的战略合作协议</p>
					<p>2015年9月  与安顺市人民政府签署了战略合作框架协议，确立“中国安顺市新能源国际汽车城”为安顺市重大项目</p>
					<p>2015年11月  受邀出席“2015加拿大安大略省高科技访华团投资洽谈会”</p>
					<p>2015年12月  受邀出席2015全国养老服务业信息化论坛暨国际数字化健康社区示范项目启动仪式</p>
					<p>2016年1月  研究院在天津设立科学实验基地——天津智汇时代科技有限公司</p>
					<p>2016年2月  与北京航空航天大学达成机器人研发战略合作意向</p>
					<p>2016年3月  与天津理工大学达成合作意向，共建校企合作基地</p>
					<p>2016年4月  基于我院自主研发的生物识别技术及传感器设备，率先全国研发出颠覆传统金融行业运行模式的金融柜台集成化方案——智能自助终端机 </p>
					<p>2016年6月  美国Enerblu安妮布鲁校车公司总裁、CEO、董事副总3人莅临我院新能源汽车研发基地参观考察，并达成战略合作，共同致力研发校车新产品、开发中美校车新市场。此前，我院智能电动车已经获得国家产品3Ｃ强制性认证、PK5040XLC5冷藏运输车顺利通过国家汽车整车产品定型试验，并获中国工业和信息化部装备工业司产品第284批公告</p>
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