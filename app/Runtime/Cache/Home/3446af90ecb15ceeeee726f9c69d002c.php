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
                                <li class="navli"><a href="<?php echo U('Index/Index');?>">首页</a></li>
                                <li><a href="<?php echo U('Info/company_introduction');?>">公司介绍</a></li>
                                <li><a href="<?php echo U('Info/customer_service');?>">解决方案</a></li>
                                <li><a href="<?php echo U('Info/product_introduction');?>">产品介绍</a></li>
                                <li><a href="<?php echo U('Info/business_contact');?>">业务联系</a></li>
                                <li><a href="<?php echo U('Info/channel_cooperation');?>">渠道合作</a></li>
                                <li><a href="<?php echo U('Info/after_sale_platform');?>">售后平台</a></li>
                                <li><a href="<?php echo U('Info/join_us');?>">加入我们</a></li>
                        </ul>
                </div>
        </div>
		<div class="companytitle">
			<div class="companytitle1">
				
			</div>
			<div class="companytitle2">
				<div class="title-c fleft">
					<i class="title-i1">加入我们</i>
					<i class="title-i2">Join Us</i>
				</div>
				<div class="title-slant fleft"></div>
				<div class="title-n fleft">
					<i class="title-i3">您的满意是我们存在的价值。</i>
				</div>
			</div>
		</div>
		
		<div class="centre">
			<div class="present1 margin100"> <span>加入我们</span> </div>
			<div class="present2 width1225 join">
				<div class="joinborder"></div>
				<div class="joinUs">
					<div class="join1 fleft">
						<div class="present21">活动策划执行</div>
						<div class="join12">
							<ul>
								<li>岗位职责：</li>
								<li>1、根据公司的战略以及推广需求，制定线上、线下活动执行计划，并提出相应活动执行方案；</li>
								<li>2、参与活动现场的管理，解决突发问题；</li>
								<li>3、结合产品、用户需求、节日、热点事件等，进行活动营销策划，独立策划整体方案及相关活动落地；</li>
								<li>4、负责整合活动各项数据指标，进行用户分析，并提交相关数据报告及整改，优化建议。</li>
								<li>要求：</li>
								<li>1、专科以上学历，市场营销、广告、传媒相关专业；</li>
								<li>2、两年以上独立策划执行活动经验，熟悉科技行业；</li>
								<li>3、具有较强的语言组织能力和营销文案撰写能力，执行力强，有良好的策略思考能力；</li>
								<li>4、有媒体资源，有异业联盟经验优先。</li>
	
							</ul>
						</div>
					</div>
					<div class="join1 fleft">
						<div class="present21">JAVA工程师</div>
						<div class="join12">
							<ul>
								<li>岗位职责：</li>
								<li>1、本科及以上学历，3年以上软件开发经验；</li>
								<li>2、JAVA基础扎实，精通IO，并发，集合的运用，熟悉分布式，缓存，消息，搜索等机制；</li>
								<li>3、有坚实的基于J2EE/J2SE编程技巧，精通MYSQL数据库，熟练运用索引，分区，备份；</li>
								<li>4、熟练掌握现有Java web开发框架体系（如Spring，Struts，Hibernate等）；</li>
								<li>5、熟悉http协议，有编写利用http协议对外提供http service的经验。</li>
								<li>优先考虑：</li>
								<li>1、熟练使用Linux，精通Shell，熟悉Linux内核及进程模型者优先；</li>
								<li>2、有Elasticsearch, Hadoop, Spark开发经验者优先。</li>
								<li>3、有数据挖掘，深度学习经验者优先。</li>
								<li>4、熟悉前台jQuery，Charts组件及大数据可视化者优先。</li>
							</ul>
						</div>
					</div>
					<div class="join1 fleft">
						<div class="present21">嵌入式工程师</div>
						<div class="join12">
							<ul>
								<li>岗位职责：</li>
								<li>1、本科及以上学历，机电一体化、电子、通信、计算机相关专业；</li>
								<li>2、精通C/C++，可编写下位机程序，至少熟练掌握一种ARM芯片，可以进行系统移植和裁剪；</li>
								<li>3、熟悉Linux脚本，能熟练的使用Linux下的开发和调试工具，如gcc，g++，gdb等；</li>
								<li>4、熟悉图像识别，模式识别算法，有图像识别工作经验会使用opencv者优先；</li>
								<li>5、了解ros开发，了解slam，有运动规划算法工作经验优先；有仿生机器人行业经验者优先。</li>
							</ul>
						</div>
					</div>
					<div class="join1 fleft">
						<div class="present21">机器人销售工程师</div>
						<div class="join12">
							<ul>
								<li>岗位职责：</li>
								<li>1、大专以上学历，2年以上销售经验；</li>
								<li>2、思维敏捷，较强的商务谈判和独立的市场开拓能力；</li>
								<li>3、有代理商、经销商渠道资源的优先；</li>
								<li>4、有商超、酒店等服务行业资源，或熟悉科委、工信委等政府部门优先。</li>
							</ul>
						</div>
					</div>
					<div class="join1 fleft">
						<div>福利待遇：双休，五险一金，带薪年假，防暑降温采暖费，节日福利，零食，定期体检，各种团建活动等</div>
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