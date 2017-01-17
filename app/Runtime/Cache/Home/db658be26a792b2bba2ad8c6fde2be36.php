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
				<div class="present21">团队介绍</div>
				<div class="present22 present24">
					<p class="">我们拥有实力精良的技术研发团队、机器人相关技术的尖端科研人士和实锤经验丰富的产品开发人员。他们各自在相关领域中成就不菲，而今相聚在智汇时代，新的团队和新的发展目标更为他们带来了前进的动力。创意、创新、创造，不故步自封，勇于发展试错，扁平化的管理体系为每个人的未来发展提供了优质平台，互联网的工作氛围带来了轻松舒适、团结融洽的办公环境。我们拥有实力，也善于表现，智汇时代特种兵，为人类未来科技变革保驾护航。</p>
				</div>
			</div>
			<div class="present2 width1225">
				<div class="present21">核心成员</div>
				<div class="present22 present24">
					<div class="team1">
						<div class="fleft">
							<span class="present251">黄玮</span>
							<span class="present252">特聘专家</span>
							<ul>
								<li>- 带领博士生进行技术攻关</li>
								<li>- 博士后 多年韩国留学经历</li>
								<li>- 主要从事生物识别算法</li>
								<li>- 2015年获得国家生物识别算法大赛一等奖</li>
							</ul>
						</div>
						<div class="fleft">
							<span class="present251">薛山</span>
							<span class="present252">CTO</span>
							<ul>
								<li>- 美国麻省理工硕士</li>
								<li>- 著名图像分析处理专家</li>
								<li>- 曾任Adobe公司技术高管，2004年回国帮助广电集团设计IPTV项目</li>
							</ul>
						</div>
						<div class="fleft">
							<span class="present251">葛为民</span>
							<span class="present252">机器人项目指导专家</span>
							<ul>
								<li>- 天津理工大学自动化学院院长</li>
								<li>- 美国广电协会正式会员</li>
								<li>- 多年机器人自动化项目研究</li>
								<li>- 获得国家及天津市多项科技奖项</li>
							</ul>
						</div>
					</div>
					<div class="team1">
						<div class="fleft">
							<span class="present251">莫秀良</span>
							<span class="present252">项目经理</span>
							<ul>
								<li>- 计算机安全专家</li>
								<li>- 曾任职国家安全部门专业分析导师</li>
								<li>- 从事多年计算机及网络的安全研究，有多篇论文被专业学术期刊收录</li>
							</ul>
						</div>
						<div class="fleft">
							<span class="present251">刘则</span>
							<span class="present252">市场总监</span>
							<ul>
								<li>- 科技金融专家</li>
								<li>- 多年国际化互联网项目并购经验，丰富的证券行业和上市公司的改制经验 -擅长公司改制和科技资本合作方面的资源整合</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
			<div class="present2 width1225">
				<div class="present21">我们的企业文化</div>
				<div class="present22 present24">
					<ul class="present241">
						<li>
							<span class="present24span1">· 目标 </span>
							<span class="present24span2">用科技服务未来生活。</span>
						</li>
						<li>
							<span class="present24span1">· 愿景 </span>
							<span class="present24span2">做科技行业中的特种兵。</span>
						</li>
						<li>
							<span class="present24span1">· 口号 </span>
							<span class="present24span2">智慧拥抱未来 科技服务生活。</span>
						</li>
						<li>
							<span class="present24span1">· 企业文化 </span>
							<span class="present24span2">团结向前 共享成果。</span>
						</li>
					</ul>
				</div>
			</div>
			<div class="present2 width1225">
				<div class="present21">我们的六大核心观念</div>
				<div class="present22 present24 present25">
					<ul class="present241">
						<li>
							<span class="present24span1">· 勇于创新 </span>
							<span class="present24span2">用独到的眼光创造、创新，打破常规，才能让企业立于不败之地。</span>
						</li>
						<li>
							<span class="present24span1">· 勤与沟通 </span>
							<span class="present24span2">沟通是解决问题的开端与桥梁。建立信任，时时沟通，打破误会与隔阂，并在沟通的过程中激发新灵感。</span>
						</li>
						<li>
							<span class="present24span1">· 强壮自身 支援战友 </span>
							<span class="present24span2">个人力量的强大抵不过团队的力量。在自我提升的同时，懂得付出，学会感恩，团队的强大才能带来利益最大化。</span>
						</li>
						<li>
							<span class="present24span1">· 大胆试错 </span>
							<span class="present24span2">科技研发是艰辛的“试错”过程。科学精神的修养实质上就是“知错—改错”，只有领悟其实质，面对深层次的认知和创造挑战，才能无所畏惧，创造成果。</span>
						</li>
						<li>
							<span class="present24span1">· 和谐家庭 </span>
							<span class="present24span2">· “修身、齐家、治国、平天下”</span>
							<span class="present24span2">和谐的家庭是生活的支柱，是调节心态的温暖港湾。美好的生活为自己带来乐趣，更能为公司带来动力。</span>
						</li>
						<li>
							<span class="present24span1">· 首问责任制 </span>
							<span class="present24span2">有问必答、有疑必释，责任明确到人，所有员工必须迅速响应，做到效率最大化的同时提升企业形象。</span>
						</li>
					</ul>
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