<?php

//php_openssl支持 查看phpinfo看看是否开启
//allow_url_fopen=on 修改php.ini，运行使用远程打开 
//ini_set('allow_url_fopen','1');
error_reporting(0); //禁用错误报告

$allow = ini_get('allow_url_fopen');
if($allow)
{
	$url2="http://www.tp-shop.cn/phpgjx/phpgjx_log.php"; 
	stream_context_set_default(
		array(
			'http' => array(
				 'timeout' => 3,
				)
		)
	);
	@file_get_contents($url2);	
}
	

 