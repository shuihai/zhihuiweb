<?php
return array(
	'URL_HTML_SUFFIX'=>'html',	//伪静态后缀
	'URL_ROUTER_ON'=>true,
	'URL_MODEL'  => 2,		    //URL模式：0 :普通模式 1 :PATHINFO 2 :REWRITE 3 :兼容模式
	'DB_TYPE'   => 'mysql', 	// 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'zhihuishidai',// 数据库名
	'DB_USER'   => 'root',		// 用户名
	'DB_PWD'    => '123456', 			// 密码
	'DB_PORT'   => '3306', 		// 端口
	'DB_PREFIX' => 'zh_', 		// 数据库表前缀
	'TMPL_ACTION_ERROR' => 'Public/dispatch_jump',
 	'TMPL_ACTION_SUCCESS' => 'Public/dispatch_jump',
	/* SESSION 和 COOKIE 配置 */
	'SESSION_PREFIX'=>'zh_',
	'COOKIE_PATH'=> '/',
	'COOKIE_PREFIX'=>'zh_',
	/* 模版 配置 */
	'TMPL_PARSE_STRING'  =>array(
    	'__PUBLIC__' 	=> __ROOT__.'/Public', 	// 更改默认的/Public 替换规则
   		'__JS__' 		=> __ROOT__.'/Public/js',// 增加新的JS类库路径替换规则
    	'__UPLOAD__' 	=> __ROOT__.'/Uploads', 	// 增加新的上传路径替换规则
	),
	/* 加密 配置 */
	'DATA_AUTH_KEY'=>'lkjhgfdsa', //默认数据加密KEY
	/* 分页相关配置 */
	'VAR_PAGE'        =>  'p',
	'PAGE'=>array(
		'theme'=>'%upPage% %linkPage% %downPage% %ajax%'
	),
	/* 404 */
	'ERROR_PAGE'=>__ROOT__.'/404.html',
);
?>