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

		<div class="companytitle Solutions">
			<div class="companytitle1"></div>
			<div class="companytitle2 fleft">
				<div class="title-c fleft">
					<i class="title-i1">解决方案</i>
					<i class="title-i2">Industry Solutions</i>
				</div>
				<div class="title-slant fleft"></div>
				<div class="title-n fleft">
					<i class="title-i3">您的满意是我们存在的价值。</i>
				</div>
			</div>
			
		</div>
		
		<div class="centre">
			<div class="present1 margin100"> <span>解决方案</span> </div>
			<div class="present2 width1225">
				<div class="Solutions1">
					<div class="present21">综合型酒店</div>
					<div class="Solutions11">
						<div class="Solutions111 fleft">
							<p>酒店行业涉及服务项目众多，类型各异。且国内酒店发展竞争激烈，整体市场供求关系不平衡，星级酒店长期处于亏损状态，传统经营模式陷入低谷。互联网+的出现及智慧科技的发展，为酒店行业带来了全新的转机。</p>
							<p>智汇智能机器人在功能深度及应用广度方面可以提供多角度解决方案，为酒店日常接待及会议服务带来不可替代的优化作用，助力酒店突破转型，实现从管理效率到用户体验的全面价值提升。</p>
							<span>行业关键词：</span>
							<span>前台工作辅助 智能导航监控</span>
							<span>身份识别保障隐私安全 移动服务提升用户满意度</span>
							<span>大屏展示 深度交互 资料派送 会议需求的最强辅助</span>
							<span>人体感应 场景化语音交互 定点监控更安心</span>
						</div>
						<div class="Solutions112 fright"><img src="/zhihuiweb/Public/home/images/img_19.png" /></div>
					</div>
				</div>
				<div class="Solutions1">
					<div class="present21">价值体现</div>
					<div class="Solutions12">
						<ul>
							<li class="Solutions121">
								<span>打破边界，紧密连接房企与客户</span>
								<span>连接线上客户，为房企提高客户转化率；对于购房者，可以轻松获取项目信息，享受更优质高效的服务。</span>
							</li>
							<li class="Solutions122">
								<span>互联网 + 房地产，打破传统流程壁垒</span>
								<span>将房地产企业所有业务集中于统一的系统平台，结合移动互联网技术，打破传统流程壁垒。</span>
							</li>
						</ul>
						<ul>
							<li class="Solutions123">
								<span>打造供应商门，户实现产业链协同</span>
								<span>解决采购过程中，缺乏计划性，随意性大，招标质量不高、缺乏目标成本指导，成本虚高或者虚低，监管不到位等问题。</span>
							</li>
							<li class="Solutions124">
								<span>打破边界，紧密连接房企与客户</span>
								<span>从成本管控到建立信息真实透明的供应商平台，到覆盖整个项目生命周期的经营分析，一体化管理各项业务流程。</span>
							</li>
						</ul>
						<ul>
							<li class="Solutions125">
								<span>分角色的智能办公工具</span>
								<span>为不同岗位的员工、职工，提供更有针对性的工具，以人为中心打造极致的用户体验。</span>
							</li>
							<li class="Solutions126">
								<span>商业地产运营信息一体化</span>
								<span>帮助运营商实现招商、租赁、客服、物业、财务等全过程的运营管理信息化。</span>
							</li>
						</ul>
					</div>
					<div class="Solutions13">
						<p>实施高端精品战略之路是融创强势升级，持久发展的必然选择。 通过对成本的监督和管理，实现更合理的投资回报率，让股东满意。</p>
						<p>——融创集团副总裁兼财务总监 汪孟德</p>
					</div>
				</div>
				<div class="Solutions1">
					<div class="present21">更多成功客户</div>
					<div class="Solutions14">
						<ul>
							<li>万科企业股份有限公司</li>
							<li>合生创展集团有限公司</li>
							<li>俊发地产有限公司</li>
							<li>金地（集团）股份有限公司</li>
							<li>深业集团有限公司</li>
							<li>厦门建发集团股份有限公司</li>
							<li>招商局（集团）股份有限公司</li>
							<li>建业地产股份有限公司</li>
							<li>杭州宋都房地产集团有限公司</li>
							<li>融创中国控股有限公司</li>
							<li>越秀地产股份有限公司</li>
							<li>上海城建置业发展有限公司</li>
							<li>旭辉控股（集团）有限公司</li>
							<li>宝龙地产控股有限公司</li>
							<li>力高（中国）地产有限公司</li>
							<li>金科地产集团股份有限公司</li>
							<li>中国奥园地产集团股份有限公司</li>
							<li>新城控股集团有限公司</li>
							<li>协信地产控股有限公司</li>
							<li>龙光地产股份有限公司</li>
						</ul>
					</div>
					<div class="Solutions15">
						<p>现在开始申请体验</p>
						<p>申请现场方案演示或聆听销售专家为您定制的解决方案以及相关知识。</p>
						<span>联系我们</span>
						<p>有问题？ 我们的销售代表会为您解答。请致电：4008-517-517 </p>
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