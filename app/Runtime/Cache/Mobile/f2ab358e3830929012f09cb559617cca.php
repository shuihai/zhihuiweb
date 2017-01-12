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
<link rel="stylesheet" type="text/css" href="/Public/home/css/cases.css">

<div class="container cases_content">        
    <h3><span></span>应用案例</h3>
    <ul class="cases_list">
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
          <img src="/Uploads/<?php echo ($vo['img']); ?>" />
          <div class="cases_des">
            <h4 class="ellipsis"><?php echo ($vo['title']); ?></h4>
            <p><?php echo ($vo['desc']); ?></p>
            <!-- <a href="#">查看详情</a> -->
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>  


<!--<div class="cutpage">
      <a href="#" class="current"><span>1</span></a>
      <a href="#"><span>2</span></a>
      <a href="#"><span>3</span></a>
      <a href="#"><span>4</span></a>
      <span>. . .</span>
      <a href="#"><span>10</span></a>
    </div> -->
    <div class="cutpage"><?php echo ($page); ?></div>
</div>



<div style="height:100px;"></div>


<div class="clearfix"></div>


<!--联系我们-->
<div class="Contact_us">
    <p>联系我们   <a href="#"><?php echo ($config['ex']['tel']); ?></a></p>
</div>
</body>
</html>