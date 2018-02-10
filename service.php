<?php

//php_openssl支持 查看phpinfo看看是否开启
//allow_url_fopen=on 修改php.ini，运行使用远程打开 
//ini_set('allow_url_fopen','1');
error_reporting(0); //禁用错误报告

$allow = ini_get('allow_url_fopen');
if(!$allow)
	exit("请开启 php.ini 文件 allow_url_fopen = 1");

$url="http://www.tp-shop.cn/phpgjx/"; 
//$url2="http://www.tp-shop.cn/phpgjx/phpgjx_log.php"; 
stream_context_set_default(
    array(
        'http' => array(
             'timeout' => 3, //设置一个超时时间，单位为秒
            )
    )
);
 
$headers = @get_headers($url);
 
if(preg_match('/200/',$headers[0])) 
{
   // echo '文件存在';
	echo  @file_get_contents($url);
	// 	  @file_get_contents($url2);
}
else
{
   // echo '文件不存在';
	$url = dirname($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $url.='/control_panel.php';
	$url = 'http://'.$url;
	echo  @file_get_contents($url); 	
}
