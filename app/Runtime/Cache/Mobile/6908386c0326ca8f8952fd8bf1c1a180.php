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
			<strong><?php echo getTypeName($row['tid']);?></strong>
		</div>
		
		<!--内容-->
		<div class="Article">
			<div class="Article_q">
				<div class="news_title"><?php echo ($row['title']); ?></div>
				<div class="news_center"><?php echo ($row['text']); ?></div>
			</div>
		</div>
<!--联系我们-->
<div class="Contact_us">
    <p>联系我们   <a href="#"><?php echo ($config['ex']['tel']); ?></a></p>
</div>
	</body>
</html>