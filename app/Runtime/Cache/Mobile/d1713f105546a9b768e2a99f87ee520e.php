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
	<body style="background-color: #FFFFFF;">
		<!-- 头部 -->
		<div class="P_top backgroundColor">
			<a onclick="window.history.back()"><img src="/Public/mobile/image/10.png" /></a>
			<strong>关于我们</strong>
		</div>
		
		<!--内容-->
		<div class="A_center backgroundColor" style="margin-bottom: 60px">
			<div>
				<p class="A_p1"><strong>公司介绍</strong></p>
				<p class="A_p2"><?php echo ($desc); ?></p>
				<!--<p class="A_p2">研究院主体任务是研发国际高精尖的科技项目，并通过完善研发环节、打造生产供应链、调用商务推广资源的方式将研发成果转化到实际的未来人们的生产生活中。</p>-->
			</div>
			
			<div>
				<?php if(is_array($expert)): $i = 0; $__LIST__ = $expert;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p class="A_p1"><strong><?php echo ($vo['title']); ?></strong></p>
					<p class="A_p2"><?php echo ($vo['desc']); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
<!--联系我们-->
<div class="Contact_us">
    <p>联系我们   <a href="#"><?php echo ($config['ex']['tel']); ?></a></p>
</div>
	</body>
</html>