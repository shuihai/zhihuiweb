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
		<div class="companytitle Cooperation">
			<div class="companytitle1"></div>
			<div class="companytitle2">
				<div class="title-c fleft">
					<i class="title-i1">渠道合作</i>
					<i class="title-i2">Cooperation</i>
				</div>
				<div class="title-slant fleft"></div>
				<div class="title-n fleft">
					<i class="title-i3">您的满意是我们存在的价值。</i>
				</div>
			</div>
		</div>
		
		<div class="centre">
			<div class="present1 margin100"> <span>渠道合作</span> </div>
			<div class="present2 width1225 cooperation ">
				<div class="cooperation1">
					<div class="cooperation11">
						<div class="point-area" style="top: 180px; left: 150px; position: absolute; width: 110px; height: 110px; visibility: visible; opacity: 1;">
							<p class="point-name" style="position: absolute; top: 45px; left: 65px;">西北</p>
							<div class="point point-dot"></div>
							<div class="point point-10"></div>
							<div class="point point-40"></div>
							<div class="point point-shadow point-80"></div>
						</div>
						<div class="point-area" style="top: 355px; left: 275px; position: absolute; width: 80px; height: 80px; visibility: visible; opacity: 1;">
							<p class="point-name" style="position: absolute; top: 30px; left: 0px;">西南</p>
							<div class="point point-dot"></div>
							<div class="point point-10"></div>
							<div class="point point-70"></div>
						</div>
						<div class="point-area" style="top: 150px; left: 540px; position: absolute; width: 200px; height: 200px; visibility: visible; opacity: 1;">
							<p class="point-name" style="position: absolute; top: 90px; left: 110px;">华北</p>
							<div class="point point-dot"></div>
							<div class="point point-10"></div>
							<div class="point point-40"></div>
							<div class="point point-shadow point-80"></div>
						</div>
						<div class="point-area" style="top: 400px; left: 575px; position: absolute; width: 80px; height: 80px; visibility: visible; opacity: 1;">
							<p class="point-name" style="position: absolute; top: 30px; left: 0px;">华中</p>
							<div class="point point-dot"></div>
							<div class="point point-10"></div>
							<div class="point point-70"></div>
						</div>
						<div class="point-area" style="top: 400px; left: 700px; position: absolute; width: 80px; height: 80px; visibility: visible; opacity: 1;">
							<p class="point-name" style="position: absolute; top: 30px; left: 0px;">华东</p>
							<div class="point point-dot"></div>
							<div class="point point-10"></div>
							<div class="point point-70"></div>
						</div>
						<div class="point-area" style="top: 530px; left: 600px; position: absolute; width: 80px; height: 80px; visibility: visible; opacity: 1;">
							<p class="point-name" style="position: absolute; top: 30px; left: 0px;">华南</p>
							<div class="point point-dot"></div>
							<div class="point point-10"></div>
							<div class="point point-70"></div>
						</div>
						<div class="point-area" style="top: 100px; left: 850px; position: absolute; width: 80px; height: 80px; visibility: visible; opacity: 1;">
							<p class="point-name" style="position: absolute; top: 30px; left: 0px;">东北</p>
							<div class="point point-dot"></div>
							<div class="point point-10"></div>
							<div class="point point-70"></div>
						</div>
						
					</div>
				</div>
				<div class="cooperation2">
					<select id="province"> 
					   <option  value="0">----请选择省份----</option> 
                                           <?php if(is_array($provice)): $i = 0; $__LIST__ = $provice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				
					</select>
					<span class="">省</span>
					<select class="city" id="city"> 
						<option value="0">----请选择城市----</option> 
                                        </select> 
				
				    <span class="">市</span>
				    <input type="button" value="查找代理商" id="getagent">
				</div>
				<div class="cooperation3">
					<span class="">代理商详情</span>
					<ul class="cooperation31">
						<li>省</li>
						<li>市</li>
						<li>代理商类型</li>
						<li>地址</li>
						<li>联系方式</li>
					</ul>
					<div class="cooperation32" id="showagent">
		
					</div>
					
				</div>
			</div>	
		</div>

<script >
    var cityurl = "<?php echo U('getcity');?>";
    var agenturl = "<?php echo U('getagent');?>";
    function getSelectValue(provinceid,cityid){
	$.ajax({
		url:agenturl,
		type:'post',
		dataType: 'json',
		data: { 'provinceid':provinceid , 'cityid':cityid} ,
		beforeSend: LoadFunction, //加载执行方法 
		error: erryFunction, //错误执行方法 
		success: succFunction //成功执行方法
	}) 
	function LoadFunction() { 
	} 
	function erryFunction() { 
	} 
	function succFunction(data) { 
		//alert(date);
		//alert(data['data']);
		//alert(data['data'][0]['roomname']);
         		
		var json = data;
		console.log(json);
      
		if(  json.code == 200 ){
			var str='';
			for( var i=0 ; i < json.data.length ; i++){
				
					str += "<ul><li>" + json.data[i]['province'] + "</li><li>" + json.data[i]['city'] + "</li><li>" + json.data[i]['type'] + "</li><li>" + json.data[i]['address'] + "</li><li>" + json.data[i]['phone'] + "</li>"+ "</ul>"
				
			}
			
			$("#showagent").html(str);
			return;
			
		}else{
			
			$(".showagent").html(
				"<li class='reminder-info'><div>暂无信息</div></li>"
			);
			return;
		}
		
	} 

    }

    $(function (){
        $('#province').change(function(){
            $.post(cityurl,{'province':$('#province').val()},
                function(result){
                
                    $('#city option').remove();
                    $("<option  value=''>请选择城市</option>").appendTo("#city");
                    for(var i=0;i<result.length;i++){
                        //alert(result[i]['city']);
                        $("<option value="+result[i]['id']+" >"+result[i]['name']+"</option>").appendTo("#city");
                    }
                },'json')
        })
        
        $('body').on('click','#getagent',function(){
            var provinceid = $('#province').val();
            var cityid = $('#city').val();
            getSelectValue(provinceid,cityid);

        })
    })
    
    
</script>
<!--底部应用场景图片轮播-->
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