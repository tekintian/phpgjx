<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="php工具箱" />
<meta name="description" content="php工具箱" />
<link rel="stylesheet" type="text/css" href="css/mysql_query.css">
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<title>php工具箱</title>
</head>
<body>
<?php 
//include_once 'tools.php';
$config = include_once 'config.php';
?>
<div class='contents' style="padding:10px;font-size:16px;">
<font style="color:#FF6600;font-size:19px;">sql调试工具，sql追踪 v1.8 版,  TPshop版权所有 违者必究</font>

<div name="end" id='end' style="clear:both">
<a href="mysql_query.php?act=del" style=" text-decoration:none;">清空log日志文件</a>&nbsp;&nbsp;&nbsp;
<a href="mysql_query.php?act=freshen<?php echo time();?>#end" style=" text-decoration:none;">刷新页面</a>
</div>
<?php
/**
* mysql 5 log 分析工具
*/
$log_str = "";
/**
*配置说明
* 1.在mysql.ini 中加入 log=D:/web/mysql.log  重启mysql 看看 mysql.log 文件有没有生成
*   mysql.log 文件名如果在 mysql.ini 中已经使用 请换个名字
* 2.配置你的 mysql_query.php 访问路径 我这里是  $url_path='http://127.0.0.1:8080/mysql_query.php';
*
*/
$filename = $config['mysql_log'];
$url_path = $config['web_url'].'/mysql_query.php';

if(isset($_GET['act']) && $_GET['act'] == 'del') 
{
	//@unlink("$log_dir$log_file"); // 删除日志文件
	
	$fp=@fopen($filename, "w+"); //打开文件指针，创建文件
	if ( !is_writable($filename) ){
		  echo '<a href="doc/sql追踪器使用说明.html" target="_blank">点击查看安装使用说明</a>';
		  echo "<br/>";
		  die("log文件:" .$filename. "不可写，请检查！ 或尝试删除log文件 , 重启mysql");
	}else
	{
	   fwrite($fp, $log_str."\r\n");
	}	
	@fclose($fp);  //关闭指针

}

if(!file_exists($filename))
{
	echo "log文件不存在, 请到config.php 文件中配置";
	echo '<a href="doc/sql追踪器使用说明.html" target="_blank">点击查看安装使用说明</a>';		
	exit;
}
else
{
	if(abs(filesize($filename) > (1024*1014*3))) // 1M
	{
		 file_put_contents($filename, $log_str);
	}
	$fp=@fopen($filename, "r") or exit("log文件打不开!");; //打开文件指针，创建文件
	
	$upstr = ''; //上一次匹配的值
	
	while(!feof($fp))
	{	
		$str = fgets($fp);
		
		
		if(preg_match("/Connect/", $str))
			$str = "<p style='background:#FF6600;'>$str</p>";										
 
			//$str = str_replace('Query', '<br/>', $str);						
			$str = preg_replace('/([0-9]{1,} Query)|([0-9]{1,} Quit)/', "", $str);
			$str = preg_replace('/([0-9]{1,})\sInit/', "Init", $str);
		    echo $str = "<p style='padding:2px;'>$str</p>";	
			
	} 	
	@fclose($fp);  //关闭指针
       
}	
	
	
?>
<div name="end" id='end' style="clear:both">
<a href="mysql_query.php?act=del" style=" text-decoration:none;" >清空log日志文件</a>&nbsp;&nbsp;&nbsp;
<a href="mysql_query.php?act=freshen<?php echo time();?>#end" style=" text-decoration:none;">刷新页面</a>
</div>

</div>
<script>
$(document).ready(function(){
	scroll(0,document.body.scrollHeight);
});

</script>

</body>
</html>