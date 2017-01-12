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
			<strong>产品服务</strong>
		</div>
		
		<!--内容-->
		<div class="P_center backgroundColor">
			<div class="P_up">
				<div class="P_img">
					<img src="/Uploads/<?php echo ($row['mobile_img']); ?>"  />
				</div>
				<div class="P_right">
					<strong><?php echo ($row['title']); ?></strong>
					<p class="detail"><?php echo ($row['desc']); ?></p>
				</div>
			</div>
			<div class="P_chart backgroundColor">
				<?php echo ($row['text']); ?>
			</div>
		</div>
		
<!--联系我们-->
<div class="Contact_us">
    <p>联系我们   <a href="#"><?php echo ($config['ex']['tel']); ?></a></p>
</div>
	<script type="text/javascript">
		$(function(){
			$('.detail').each(function(){
				var html=$(this).html();
				$(this).html('<span class="short">'+html.substring(0,90)+'...</span><span class="all">'+html+'</span><div class="more"><img src="/Public/mobile/image/12.png" /><span>向下</span> 展开</div>');
			});
			$('.detail .more').each(function(){
				$(this).click(function(){
					$(this).parent().children('.all,.short').toggle();
					//			   if($(this).html()=='(更多)')
//							$(this).html('(收起)');
					//			   else $(this).html('(更多)');
				});
			});
		});
	</script> 	
		
	</body>
</html>