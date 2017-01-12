<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('APP_DEBUG',true); // 开启调试模式
define('APP_NAME', 'app');
define('APP_PATH', './app/');
define('STATIC_PATH','./Uploads/');

// define( "GZIP_ENABLE", function_exists ( 'ob_gzhandler') );
// ob_start( GZIP_ENABLE ? 'ob_gzhandler': null );
require 'ThinkPHP/ThinkPHP.php';

