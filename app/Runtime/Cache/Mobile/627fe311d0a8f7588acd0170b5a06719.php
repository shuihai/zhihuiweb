<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://<?php echo ($_SERVER['SERVER_NAME']); ?>/" />
    <meta charset="UTF-8">
    <meta name="description" content="<?php if($row['desc']): echo ($row['desc']); ?>|<?php endif; echo ($config['description']); ?>">
    <meta name="keywords" content="<?php if($row['keywords']): echo ($row['keywords']); ?>|<?php endif; echo ($config['keywords']); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, maximum-scale=1.3, user-scalable=0, minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <title><?php if($row['title']): echo ($row['title']); ?>|<?php endif; echo ($config['title']); ?></title>

    <link href="/Public/mobile/css/Style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/mobile/css/normalize.css" rel="stylesheet" type="text/css" />
    <link href="/Public/mobile/css/swiper.min.css" rel="stylesheet" type="text/css" />

    <script src="/Public/mobile/js/swiper.min.js"></script>
    <script src="/Public/mobile/js/jquery.min.js"></script>

</head>
	<body>
		<!-- 头部 -->
		<div class="Top backgroundColor">
			<div class="logo"><img src="/Public/mobile/image/logo.png" /></div>
			<div class="Top_right">
				<p class="p1">天津智汇时代科技有限公司</p>
				<p class="p2">智慧 创新 科技 未来</p>
			</div>
		</div>
		
			
		<!-- 滚动 -->
		<div class="Roll">
		    <div class="swiper-container">
		        <div class="swiper-wrapper">
					<?php if(is_array($focus)): $i = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide" style="background: url('/Uploads/<?php echo ($vo['img']); ?>') center 0px no-repeat; width: 100%;    background-size: 100% 100%;" ></div><?php endforeach; endif; else: echo "" ;endif; ?>
		        </div>
		        <!-- 滚动条-->
		        <div class="swiper-pagination"></div>
		    </div>
	    </div>
	    
	    	
	    <!--产品服务-->
	    <div class="Product backgroundColor">
	    	<div class="Product_top">
	    		<span>产品服务</span>
	    	</div>
	    	<div class="Product_border"></div>
	    	<div class="nav">
	    		<ul>
	    			<li>
	    				<a href="<?php echo U('Info/productServer',array('tid'=>39));?>">
		    				<img src="/Public/mobile/image/1.png" />
		    				<span>智能机器人</span>
	    				</a>
	    			</li>
	    			<li>
	    				<a href="<?php echo U('Info/productServer',array('tid'=>40));?>">
		    				<img src="/Public/mobile/image/2.png" />
		    				<span>虚拟现实</span>
	    				</a>
	    			</li>
	    			<li>
	    				<a href="<?php echo U('Info/productServer',array('tid'=>41));?>">
		    				<img src="/Public/mobile/image/3.png" />
		    				<span>生物识别</span>
	    				</a>
	    			</li>
	    			<li>
	    				<a href="<?php echo U('Info/productServer',array('tid'=>42));?>">
		    				<img src="/Public/mobile/image/4.png" />
		    				<span>智慧城市</span>
	    				</a>
	    			</li>
	    			<li>
	    				<a href="<?php echo U('Info/productServer',array('tid'=>43));?>">
	    					<img src="/Public/mobile/image/5.png" />
	    					<span>外骨骼</span>
	    				</a>
	    			</li>
	    			<li>
	    				<a href="<?php echo U('Info/productServer',array('tid'=>44));?>">
		    				<img src="/Public/mobile/image/6.png" />
		    				<span>传感器</span>
	    				</a>
	    			</li>
	    		</ul>
	    	</div>
	    </div>
	    
	    <!--应用案例-->
	    <div class="Product backgroundColor">
	    	<div class="Product_top">
	    		<span>应用案例</span>
	    	</div>
	    	<div class="Product_border"></div>
	    	<div class="Application">
	    		<div class="Application_es">
	    			<div class="Img"><img src="/Public/mobile/image/7.png" /></div>
	    			<div class="Substance">
		    			<div class="Content">
		    				<div class="Content_top">
		    					<p class="Content_p1">智能机器人</p>
		    					<p class="Content_p2">我研究院研发的智能服务机器人(智汇侠）</p>
		    				</div>
		    			</div>
		    			<div class="Case">
		    				<div class="Case_left">
								<?php if(is_array($robot)): $i = 0; $__LIST__ = array_slice($robot,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Info/details',array('id'=>$vo['id']));?>"><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		    				</div>
							<?php if(count($robot) > 4): ?><div class="Case_right"><img src="/Public/mobile/image/12.png" /></div>
								<div class="Case_left display">
									<?php if(is_array($robot)): $i = 0; $__LIST__ = array_slice($robot,5,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Info/details',array('id'=>$vo['id']));?>"><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
								</div><?php endif; ?>
		    			</div>
	    			</div>
	    		</div>
	    		<!--线-->
	    		<div class="Border"></div>
	    		<!--线-->
	    		<div class="Application_es">
	    			<div class="Img"><img src="/Public/mobile/image/8.png" /></div>
	    			<div class="Substance">
		    			<div class="Content">
		    				<div class="Content_top">
		    					<p class="Content_p1">虚拟现实</p>
		    					<p class="Content_p2">我研究院利用计算机技术搭建虚拟现实平台，可以使用户超越时空的限制，身临其境体验各种场景。</p>
		    				</div>
		    			</div>
		    			<div class="Case">
		    				<div class="Case_left">
								<?php if(is_array($vr)): $i = 0; $__LIST__ = array_slice($vr,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Info/details',array('id'=>$vo['id']));?>"><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		    				</div>
						<?php if(count($vr) > 4): ?><div class="Case_right"><img src="/Public/mobile/image/12.png" /></div>
								<div class="Case_left display">
									<?php if(is_array($vr)): $i = 0; $__LIST__ = array_slice($vr,5,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Info/details',array('id'=>$vo['id']));?>"><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div><?php endif; ?>
		    			</div>
		    			<!--<div class="Case_right"><img src="image/12.png" /></div>-->
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    
	     <!--新闻动态-->
	    <div class="Product backgroundColor">
	    	<div class="Product_top">
	    		<span>新闻动态</span>
	    		<a href="<?php echo U('Info/news');?>">更多新闻</a>
	    	</div>
	    	<div class="Product_border"></div>
	    	<div class="news">
	    		<ul>
					<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo U('Info/details',array('id'=>$vo['id']));?>">
								<div class="news_left"><img src="/Uploads/<?php echo ($vo['mobile_img']); ?>" /></div>
								<div class="news_right">
									<div class="news_title"><?php echo ($vo['title']); ?></div>
									<div class="news_center"><?php echo ($vo['desc']); ?></div>
								</div>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
	    		</ul>
	    	</div>
	    </div>
	    
	    <!--关于我们-->
	    <div class="About_us backgroundColor">
	    	<p><?php echo ($config['ex']['beian']); ?>     <a href="<?php echo U('Info/aboutUs');?>">关于我们</a> </p>
	    	<p><?php echo ($config['ex']['banquan']); ?></p>
	    </div>
	    
<!--联系我们-->
<div class="Contact_us">
    <p>联系我们   <a href="#"><?php echo ($config['ex']['tel']); ?></a></p>
</div>
	<script>
	(function($){
		$(document).ready(function(){
	    	$(".Case_right").click(function(){
				$(".display").toggle();
				$(".Case_right img").attr('src',$(".Case_right img").attr('src')=='/Public/mobile/image/12.png'?'/Public/mobile/image/13.png':'/Public/mobile/image/12.png');
			
	    		
	    	});
	    });
    })(jQuery);
	//滚动条
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        //autoplay : 2000,    //可选选项，自动滑动
    	autoplayDisableOnInteraction : false,
    	paginationBulletRender: function (index, className) {
            return '<span class="' + className + '"></span>';
        }

    });
    
    
    </script>
	
	</body>
</html>