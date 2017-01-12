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



		<div class="banner">
			
		    <div class="swiper-container gallery-top">
		        <div class="swiper-wrapper">
                            <?php if(is_array($focus)): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide" style="background-image:url(/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>)"></div><?php endforeach; endif; else: echo "" ;endif; ?>

		        </div>
		        
		    </div>
		    <div class="previewqqs">
		    	<div class="swiper-container gallery-thumbs">
			        <div class="swiper-wrapper">
                                    <?php if(is_array($focus)): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide" style="background-image:url(/zhihuiweb/Uploads/<?php echo ($vo['img']); ?>)"></div><?php endforeach; endif; else: echo "" ;endif; ?>

			        </div>
			        
			    </div>
			    <div class="swiper-button-next swiper-button-white"></div>
		        <div class="swiper-button-prev swiper-button-white"></div>
		    </div>
		    
		</div>
		
		<div class="centre">
			<div class="resolve ">
				<div class="margin15 margin150">
					<div class="resolve1 fleft wow fadeInLeft">
						<div class="resolvescript">
							<span>电商解决方案</span>
							<p>从商务和财务到销售与服务，金蝶的解决方案覆盖所有业务线。深入了解面向你所在业务线部门的解决方案组合，连接所有数据，驱动成功，连接所有数据，驱动成功。</p>
						</div>
						<div class="resolveprint">
							<div class="resolveimg"><img src="/zhihuiweb/Public/home/images/img_resolve1.png" /></div>
							<div class="resolvewriting">
								<p>从商务和财务到销售与服务，金蝶的解决方案覆盖所有业务线。深入了解面向你所在业务线部门的解决方案组合，连接所有数据，驱动成功，连接所有数据，驱动成功。</p>
							</div>
						</div>
					</div>
					<div class="resolve1 fleft wow fadeInRight">
						<div class="resolvescript">
							<span>音视频解决方案</span>
							<p>采用数字化音频传输和智能化的系统管理解决方案，借助先进的音频数字处理传输技术，把先进的数字技术和音频技术完美结合；文件输入输出可控化；电源时序器等设备的无缝连接。</p>
						</div>
						<div class="resolveprint">
							<div class="resolveimg"><img src="/zhihuiweb/Public/home/images/img_resolve2.png" /></div>
							<div class="resolvewriting">
								<p>采用数字化音频传输和智能化的系统管理解决方案，借助先进的音频数字处理传输技术，把先进的数字技术和音频技术完美结合；文件输入输出可控化；电源时序器等设备的无缝连接。</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="margin15 customized">
				<div class="marginbig">功能定制<i class="margins-i"></i></div>
				<div class="margin60 customizedul wow fadeInUp">
					<div class="">
						<span class="customized1">智能导航</span><span class="customized2">人体感应</span><span class="customized3">高清监控</span>
						<span class="customized4">智能系统</span><span class="customized5">资料派送</span><span class="customized6">真人外形</span>
						<span class="customized7">数据统计</span>
					</div>
					<div class="">
						<span class="customized8">自主避障</span><span class="customized9">语音交互</span><span class="customized10">生物识别</span>
						<span class="customized11">触屏展示</span><span class="customized12">自动充电</span><span class="customized13">关节活动</span>
						<span class="customized14">后台管理</span>
					</div>
					
				</div>
			</div>
			<div class="cooperate">
				<div class="margin15">
					<div class="marginbig">合作案例<i class="margins-i"></i></div>
					<div class="cooperateul margin60">
						<div class="cooperateleft fleft wow fadeInLeft" style=" animation-delay: 0.2s;">
							<div class="cooperate11 cooperate11width">
								<div class="cooperate11img"><img src="/zhihuiweb/Public/home/images/img_cooperate1.png" /></div>
								<div class="cooperate11div"><div class="cooperate11span">青岛地铁合作案例</div></div>
								<i  class="light"></i>
							</div>
						</div>
						<div class="cooperateright fleft wow fadeInRight" style=" animation-delay: 0.6s;">
							<ul>
								<li>
									<div class="cooperate11 cooperate22width">
										<div class="cooperate11img"><img src="/zhihuiweb/Public/home/images/img_cooperate2.png" /></div>
										<div class="cooperate11div"><div class="cooperate11span">善林金融合作案例</div></div>
										
									</div>
								</li>
								<li>
									<div class="cooperate11 cooperate22width">
										<div class="cooperate11img"><img src="/zhihuiweb/Public/home/images/img_cooperate3.png" /></div>
										<div class="cooperate11div"><div class="cooperate11span">万豪酒店合作案例</div></div>
										
									</div>
								</li>
								<li>
									<div class="cooperate11 cooperate22width">
										<div class="cooperate11img"><img src="/zhihuiweb/Public/home/images/img_cooperate4.png" /></div>
										<div class="cooperate11div"><div class="cooperate11span">浙江省国家大学科技园</div></div>
										
									</div>
								</li>
								<li>
									<div class="cooperate11 cooperate22width">
										<div class="cooperate11img"><img src="/zhihuiweb/Public/home/images/img_cooperate5.png" /></div>
										<div class="cooperate11div"><div class="cooperate11span">万科合作案例</div></div>
										
									</div>
								</li>
                                                                
                    
                                                                
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="margin15 trends">
				<div class="marginbig">智汇动态<i class="margins-i"></i></div>
				<div class="trendsul margin60">
					<ul>
						<li class=" wow fadeInDown" style=" animation-delay: 0.2s;">
							<div class="trendscontent">
								<div class="contentimg"><img src="/zhihuiweb/Public/home/images/img_trends1.png" /></div>
								<div class="contentwriting">
									<p class="writingp">美国机器人市场正方兴未艾，新一代主力机型即将推出。</p>
									<span class="writingtime">2016-12-26</span>
								</div>
							</div>
						</li>
						<li class="wow fadeInDown" style=" animation-delay: 0.4s;">
							<div class="trendscontent">
								<div class="contentimg"><img src="/zhihuiweb/Public/home/images/img_trends2.png" /></div>
								<div class="contentwriting">
									<p class="writingp">启智玩具等市场新风越吹越烈AR玩具成“当红炸子鸡”</p>
									<span class="writingtime">2016-12-26</span>
								</div>
							</div>
						</li>
						<li class="wow fadeInDown" style=" animation-delay: 0.6s;">
							<div class="trendscontent">
								<div class="contentimg"><img src="/zhihuiweb/Public/home/images/img_trends3.png" /></div>
								<div class="contentwriting">
									<p class="writingp">阿瑞拉机器人科技运动领导加强制作许可专业短片即将上市。</p>
									<span class="writingtime">2016-12-26</span>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		

		
		
		
		<script>
			new WOW().init();
		    var galleryTop = new Swiper('.gallery-top', {
		        spaceBetween: 10,
		        loop:true,
		        loopedSlides: 5, 
		    });
		    var galleryThumbs = new Swiper('.gallery-thumbs', {
		        nextButton: '.swiper-button-next',
		        prevButton: '.swiper-button-prev',
		        spaceBetween: 10,
		        slidesPerView: 4,
		        touchRatio: 0.2,
		        autoplay : 3000,
		        autoplayDisableOnInteraction : false, 
		        loop:true,
		        loopedSlides: 5, 
		        slideToClickedSlide: true
		    });
		    galleryTop.params.control = galleryThumbs;
		    galleryThumbs.params.control = galleryTop;
	    
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