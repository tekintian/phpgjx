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
	'web_url'  =>'http://tools.dd/phpgjx/index.php', // php工具箱访问 url 根路径  能访问到你工具箱的 地址
	'mysql_log'=>'/home/wwwlogs/mariadb-10.1/mysql_bz.log', // mysql 标准日志文件路径			
    'mysql_host' =>'localhost', //mysql连接地址
	'mysql_user' =>'root', //mysql账号
	'mysql_password' =>'888888', //mysql密码
	'mysql_port' =>'3306', //mysql端口	
	'menu'=>array( // 菜单配置项
		 'Adminer'=>'adminer.php',
		 'PMA新版'=>'phpmyadmin.php',
		 'PMA旧版'=>'phpmyadmin_old.php',
		 '二维码生成'=>'http://dev.yunnan.ws/tools/jquery-qrcode.html',
	     '工具百宝箱'=>'http://tool.lu/',  		 
		 '运行代码'=>'http://tool.lu/coderunner/',
		 '模拟提交'=>'test_request.html',		 
		 '时间戳转换'=>'http://tool.chinaz.com/Tools/unixtime.aspx',  		 		 
		 'TP5手册'=>'https://www.kancloud.cn/manual/thinkphp5/118003',  		 		 		 
		 '正则测试'=>'http://tool.oschina.net/regex',		 
		 '代码比对'=>'http://tool.oschina.net/diff',
		 'JSON格式化'=>'https://www.json.cn/',
		 'phpinfo'=>'phpinfo.php', 
		 'php探针'=>'tz.php',
		 '运行代码'=>'run.php',
		 'php手册'=>'http://www.w3school.com.cn/php/index.asp',  // http://www.tp-shop.cn/phpgjx/ip_city.php
		 '文件复制'=>'file_copy.php',
		 '云南网'=>'http://yunnan.ws',
	),
);
