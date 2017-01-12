<?php
return array(
	'TAGLIB_PRE_LOAD'   => 	  'Common\\TagLib\\Info,Common\\TagLib\\Type,Common\\TagLib\\Flink,Common\\TagLib\\Focus',
	'HTML_CACHE_ON'     =>    false, // 开启静态缓存
	'HTML_CACHE_TIME'   =>    60*60*24*31*12,   // 全局静态缓存有效期（秒）
	'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
	'TMPL_STRIP_SPACE'  => false,
)
?>