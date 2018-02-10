<?php
/**
此工具永久开源, 免费升级. 开发者开发后 必须免费开源,不得收费.
php工具箱
群主开发的,作者 IT宇宙人 QQ 1273276548 和木偶人 QQ467661992
*/ 


/*

如果是 mysql5.4以下版本
在my.ini 文件中 设置 log='你的log 日志路径'  这个配置下面数组配置需要用得上
在[mysqld]后面增加一行  然后重启mysql 生效
log=D:/wamp/www/mysql_bz.log


* 如果是 mysql5.5以上版本  一次性修改方法 重启后无效
SHOW VARIABLES LIKE '%general_log%'
SET GLOBAL general_log = 1
SET GLOBAL general_log_file = '你的log 日志路径' 这个配置下面数组配置需要用得上


长期有效修改方法在 my.ini 里面 [mysqld] 后面加上如下代码 没有 [mysqld] 自己加上
[mysqld]
general_log=ON
general_log_file=D:/wamp/www/mysql_bz.log // 这里设置你 log日志路径  这个配置下面数组配置需要用得上
# log-raw=true  如果错误日志没记录 则开启这行, 参考地址 http://dev.mysql.com/doc/refman/5.7/en/query-log.html
# http://dev.mysql.com/doc/refman/5.7/en/password-logging.html
然后重启mysql 生效
错误的sql不会被成功解析，所以不会记录到general log中
如果需要记录所有的语句，包括那些错误的，请加 log-raw选项  log-raw=true
*/
return array(
	'web_url'  =>'http://127.0.0.1/phpgjx/index.php', // php工具箱访问 url 根路径  能访问到你工具箱的 地址
	'mysql_log'=>'D:/mysql_bz2.log', // mysql 标准日志文件路径			
    'mysql_host' =>'localhost', //mysql连接地址
	'mysql_user' =>'root', //mysql账号
	'mysql_password' =>'', //mysql密码
	'mysql_port' =>'3306', //mysql端口	
	'menu'=>array( // 菜单配置项
	     '在线工具'=>'http://tool.oschina.net/',   // 如果自己配置的地址打不卡 请加上 http://   如 www.baidu.com  打不开 前面加上  http://www.baidu.com
	     '工具百宝箱'=>'http://tool.lu/',  		 
		 '运行代码'=>'http://tool.lu/coderunner/',
		 '模拟提交'=>'test_request.html',		 
		 '时间戳转换'=>'http://tool.chinaz.com/Tools/unixtime.aspx',  		 
		 '英文翻译'=>'http://fanyi.baidu.com/?aldtype=16047#auto/zh/',  		 
		 'TP手册'=>'http://document.thinkphp.cn/manual_3_2.html',  		 		 		 
		 '正则测试'=>'http://tool.oschina.net/regex',		 
		 '代码比对'=>'http://tool.oschina.net/diff',
		 'JSON格式化'=>'http://tool.oschina.net/codeformat/json',
		 'phpinfo'=>'phpinfo.php', 
		 'php探针'=>'tz.php',
		 '运行代码'=>'run.php',
		 'phpmyadmin'=>'phpmyadmin.php',
		 'php手册'=>'http://www.w3school.com.cn/php/index.asp',  // http://www.tp-shop.cn/phpgjx/ip_city.php
		 '文件复制'=>'file_copy.php',
		 'TPshop官网'=>'http://www.tp-shop.cn',
	),
);


/* 如果学了有不明白的地方 加以下群, 有专门老师免费辅导 */

/**   
php北京群:224612563
php上海群:203320537
php深圳2群:209669661
php深圳1群:182127670
php杭州群:209983691
php成都群:488097296
php广州群:364702379
php武汉群:312123912
php南京 496341851
php重庆 243249226
ecshop群:216961593 
TPshop官方群:571797355
*/
