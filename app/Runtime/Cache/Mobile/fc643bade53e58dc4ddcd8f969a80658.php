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
<link href="/Public/mobile/css/iscroll.css" rel="stylesheet" type="text/css" />
	<body style="background-color: #FFFFFF;">
		<div id="wrapper">
			<div id="scroller">
				<!-- 头部 -->
				<div class="P_top backgroundColor">
					<a onclick="window.history.back()"><img src="/Public/mobile/image/10.png" /></a>
					<strong>新闻动态</strong>
				</div>
				<!--内容-->					
				<div class="news" id="scroller-content">
		    		<ul>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								<a href="<?php echo U('details',array('id'=>$vo['id']));?>">
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
		</div>
<!--联系我们-->
<div class="Contact_us">
    <p>联系我们   <a href="#"><?php echo ($config['ex']['tel']); ?></a></p>
</div>
		<script src="/Public/mobile/js/iscroll.js"></script>
		<script>
			$(function(){
				var page=1;
				var myScroll,
						upIcon = $("#up-icon"),
						downIcon = $("#down-icon");

				myScroll = new IScroll('#wrapper', { probeType: 3, mouseWheel: true , click:true});
				myScroll.on("scroll",function(){
					var y = this.y,
							maxY = this.maxScrollY - y,
							downHasClass = downIcon.hasClass("reverse_icon"),
							upHasClass = upIcon.hasClass("reverse_icon");
					if(y >= 40){
						!downHasClass && downIcon.addClass("reverse_icon");
						return "";
					}else if(y < 40 && y > 0){
						downHasClass && downIcon.removeClass("reverse_icon");
						return "";
					}

					if(maxY >= 40){
						!upHasClass && upIcon.addClass("reverse_icon");
						return "";
					}else if(maxY < 40 && maxY >=0){
						upHasClass && upIcon.removeClass("reverse_icon");
						return "";
					}
				});

				myScroll.on("slideUp",function(){
					if(this.maxScrollY - this.y > 40){
						page++;
						$.ajax({
							url:"<?php echo U('news');?>",
							type:'post',
							data:{'page':page},
							success:function(data){
								if(data.length>0){
									//data = eval( "(" + data + ")" );
									//console.log(data);
									for(var i = 0;i<data.length;i++){
										$('.news ul').append("<li>"
												+"<a href='<?php echo U('details',array('id'=>$vo['id']));?>'>"
												+		"<div class='news_left'><img src='/Uploads/<?php echo ($vo['mobile_img']); ?>' /></div>"
												+		"<div class='news_right'>"
												+	"<div class='news_title'><?php echo ($vo['title']); ?></div>"
												+"<div class='news_center'><?php echo ($vo['desc']); ?></div>"
												+"</div>"
												+"</a>"
												+"</li>");
									}
								}
							}
						});
						upIcon.removeClass("reverse_icon")
					}
				});
			});
		</script>
	</body>
</html>