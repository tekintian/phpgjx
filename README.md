# PHP工具箱V2.0 版本 PHPGJX V2.0


    本工具来源网络，欢迎下载使用！

只要看完几分钟的安装视频教程 再配置工具 就非常简单.
直接网页打开   “工具使用视频教程.html”  文件全屏就可以观看视频


一个中国人开发的php工具箱, 翻倍提高开发效率

    此工具能几秒钟追踪出sql 数据库操作, 
    能几分钟内分析任意项目系统数据库表结构
    瞬间无刷新测试 调试 php代码
    快捷链接在线几十种工具, 点击土豪图片自动切换

php工具箱 永久开源,免费升级
开发者可以二次开发,但是必须再次免费开源,不得收费.


本工具 只兼容 最新版  IE 火狐 谷歌

## docker容器中使用本工具方法
配置环境为tengine和mysql都是在Docker 容器中运行的

###———————————————tengine——————————————

	docker run  -d -it \
		--name tengine  \
		--restart=always \
		-p 80:80 \
		-p 443:443 \
		-v /Users/Tekin/web:/home/wwwroot  \
		-v /Users/Tekin/logs:/home/wwwlogs \
		tekintian/tengine-php:7.0.22

###———————————————mariadb——————————————
	https://hub.docker.com/_/mariadb/
	/etc/mysql  #mariadb 配置文件
	/var/lib/mysql  # 数据库文件存放目录
	/var/log/mysql/mysql_bz.log #日志文件夹
	/Users/Tekin/logs/mariadb-10.1 
	把日志文件放到tengine的日志目录中， 方便使用phpgjx 调用地址为  /home/wwwlogs/mariadb-10.1/mysql_bz.log 因为tengine设置的日志映射目录为 /home/wwwlogs/

	—————————— mariadb-10.1
	docker run  -d -it \
		--name mariadb  \
		--restart=always \
		-p 3306:3306 \
		-v /Users/Tekin/docker/opt/mariadb10.1/data:/var/lib/mysql \
		-v /Users/Tekin/docker/opt/mariadb10.1/etc:/etc/mysql \
		-v /Users/Tekin/Desktop/web/_logs/mariadb-10.1:/var/log/mysql \
		 -e MYSQL_ROOT_PASSWORD=888888 \
		mariadb:10.1


### mariadb my.cnf 配置
在[mysqld] 节点下增加general_log日志配置

	[mysqld]
	#
	# * Character sets
	# 
	# Default is Latin1, if you need UTF-8 set all this (also in client section)
	#
	character-set-server  = utf8 
	collation-server      = utf8_general_ci 
	character_set_server   = utf8 
	collation_server       = utf8_general_ci 

	#general log for phpgjx debug
	general_log_file        = /var/log/mysql/mysql_bz.log
	general_log             = 1

	log-raw=true #记录错误日志

## coonfig.php 配置文件配置

	'mysql_log'=>'/home/wwwlogs/mariadb-10.1/mysql_bz.log', // mysql 标准日志文件路径			
    'mysql_host' =>'localhost', //mysql连接地址
	'mysql_user' =>'root', //mysql账号
	'mysql_password' =>'888888', //mysql密码
	'mysql_port' =>'3306', //mysql端口	


