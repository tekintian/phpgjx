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
<body style="background:#E5E5E5">
<?php 
//include_once 'tools.php';
$config = include_once 'config.php';
?>
<style>
	a{
		text-decoration:none
	}
	.success {
		background:#00B2EE;
		border:1px solid;
		border-color:#009ACD;
		padding:5px 5px 5px 5px;
		border-radius: 15px;
	}
	
</style>
<div class='contents' style="padding:10px;font-size:16px;">
<font style="color:#FF6600;font-size:19px;">sql调试工具，sql追踪 v2.0 版,  TPshop版权所有 违者必究</font>
<a href="http://www.tp-shop.cn" target="_blank">查看TPshop官网</a>
<br><br>
<div name="end" id='end' style="clear:both">
<a href="mysql_query.php?act=del" class="success">清空log日志文件</a>&nbsp;&nbsp;&nbsp;
<a href="mysql_query.php?act=freshen<?php echo time();?>#end" class="success">刷新页面</a>
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
$start_time = microtime(true);
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
	if(abs(filesize($filename) > (1024*1014*1))) // 1M
	{
		 file_put_contents($filename, $log_str);
	}
	$fp=@fopen($filename, "r") or exit("log文件打不开!");; //打开文件指针，创建文件
	
	$upstr = ''; //上一次匹配的值
	
	while(!feof($fp))
	{	
		$str = fgets($fp);
		
		
		if(preg_match("/Connect/", $str)){
			$str = '<div style="background:#ebf8a4;border:1px solid;border-color:#a2d246;padding:10px 10px 10px 10px;">' . 
						htmltag('p','font-size:14px',$str).
					'</div>';
		}else{
		
			/* MYSQL关键字类 */
			//防止关键字被短字符串先替换,按字符串长度排列
			$str = str_replace('SELECT',htmltag('span','color:#708','SELECT'), $str);//SELECT比较特别
			$preplace = array(
					'SQL_CALC_FOUND_ROWS',
					'MINUTE_MICROSECOND','NO_WRITE_TO_BINLOG','SECOND_MICROSECOND',
					'CURRENT_TIMESTAMP',
					'HOUR_MICROSECOND','SQL_SMALL_RESULT',
					'DAY_MICROSECOND',
					'LOCALTIMESTAMP','SQL_BIG_RESULT',
					'DETERMINISTIC','HIGH_PRIORITY','MINUTE_SECOND','STRAIGHT_JOIN','UTC_TIMESTAMP',
					'CURRENT_DATE','CURRENT_TIME','CURRENT_USER','LOW_PRIORITY','SQLEXCEPTION','VARCHARACTER',
					'DISTINCTROW','HOUR_MINUTE','HOUR_SECOND','INSENSITIVE',
					'ASENSITIVE','CONNECTION','CONSTRAINT','DAY_MINUTE','DAY_SECOND','MEDIUMBLOB','MEDIUMTEXT','REFERENCES','SQLWARNING','TERMINATED','YEAR_MONTH',
					'CHARACTER','CONDITION','DATABASES','LOCALTIME','MEDIUMINT','MIDDLEINT','PRECISION','PROCEDURE','SENSITIVE','SEPARATOR','VARBINARY',
					'CONTINUE','DATABASE','DAY_HOUR','DESCRIBE','DISTINCT','ENCLOSED','FULLTEXT','INTERVAL','LONGBLOB','LONGTEXT','MODIFIES','OPTIMIZE','RESTRICT','SMALLINT','SPECIFIC','SQLSTATE','STARTING','TINYBLOB','TINYTEXT','TRAILING','UNSIGNED','UTC_DATE','UTC_TIME','ZEROFILL',
					'ANALYZE','BETWEEN','CASCADE','COLLATE','CONVERT','DECIMAL','DECLARE','DEFAULT','DELAYED','ESCAPED','EXPLAIN','FOREIGN','INTEGER','ITERATE','LEADING','NATURAL','NUMERIC','OUTFILE','PRIMARY','RELEASE','REPLACE','REQUIRE','SCHEMAS','SPATIAL','TINYINT','TRIGGER','VARCHAR','VARYING',
					'BEFORE','BIGINT','BINARY','CHANGE','COLUMN','CREATE','CURSOR','DELETE','DOUBLE','ELSEIF','EXISTS','FLOAT4','FLOAT8','HAVING','IGNORE','INFILE','INSERT','LINEAR','OPTION','REGEXP','RENAME','REPEAT','RETURN','REVOKE','SCHEMA','SELECT','UNIQUE','UNLOCK','UPDATE','VALUES',
					'ALTER','CHECK','CROSS','FALSE','FETCH','FLOAT','FORCE','GRANT','GROUP','INDEX','INNER','INOUT','LABEL','LEAVE','LIMIT','LINES','MATCH','ORDER','OUTER','PURGE','RAID0','RANGE','READS','RIGHT','RLIKE','UNION','USAGE','USING','WHERE','WHILE','WRITE',
					'BLOB','BOTH','CALL','CASE','CHAR','DESC','DROP','DUAL','EACH','ELSE','EXIT','FROM','GOTO','INT1','INT2','INT3','INT4','INT8','INTO','JOIN','KEYS','KILL','LEFT','LIKE','LOAD','LOCK','LONG','LOOP','READ','REAL','SHOW','THEN','TRUE','UNDO','WHEN','WITH','X509',
					'ADD','ALL','AND','ASC','DEC','DIV','FOR','INT','KEY','MOD','NOT','OUT','SET','SQL','SSL','USE','XOR',
					'AS','BY','IF','IN','IS','ON','OR','TO'
			);
			
			foreach($preplace as $keyword){
				$keyword = $keyword . ' ';
				$str = str_replace($keyword,htmltag('span','color:#708',$keyword), $str);
			}
			/* MYSQL函数类 */
			// 防止函数被短字符串先替换,按字符串长度排列
			$preplace2 = array(
					'UNCOMPRESSED_LENGTH',
					'CURRENT_TIMESTAMP',
					'CHARACTER_LENGTH',
					'SUBSTRING_INDEX','MASTER_POS_WAIT',
					'UNIX_TIMESTAMP','LAST_INSERT_ID',
					'FROM_UNIXTIME','TIMESTAMPDIFF','UTC_TIMESTAMP','CONNECTION_ID',
					'GROUP_CONCAT','CURRENT_DATE','CURRENT_TIME','OCTET_LENGTH','TIMESTAMPADD','OLD_PASSWORD','COERCIBILITY','CURRENT_USER','SESSION_USER','IS_FREE_LOCK','IS_USED_LOCK','RELEASE_LOCK',
					'FIND_IN_SET','DATE_FORMAT','AES_ENCRYPT','AES_DECRYPT','TIME_FORMAT','CHAR_LENGTH','PERIOD_DIFF','SEC_TO_TIME','TIME_TO_SEC','STR_TO_DATE','DES_DECRYPT','DES_ENCRYPT','SYSTEM_USER','STDDEV_SAMP',
					'BIT_LENGTH','DAYOFMONTH','EXPORT_SET','PERIOD_ADD','UNCOMPRESS','CONVERT_TZ','GET_FORMAT','WEEKOFYEAR','FOUND_ROWS','NAME_CONST','STDDEV_POP',
					'CONCAT_WS','DAYOFWEEK','DAYOFYEAR','MONTHNAME','INET_ATON','INET_NTOA','SUBSTRING','LOAD_FILE','FROM_DAYS','LOCALTIME','CROSECOND','BENCHMARK','COLLATION','ROW_COUNT',
					'GREATEST','TRUNCATE','POSITION','PASSWORD','DATABASE','DISTINCT','DATE_ADD','DATE_SUB','MAKE_SET','COMPRESS','DATEDIFF','LAST_DAY','MAKEDATE','MAKETIME','UTC_TIME','GET_LOCK','VAR_SAMP','VARIANCE',
					'CEILING','REVERSE','CURDATE','CURTIME','DAYNAME','QUARTER','EXTRACT','ENCRYPT','VERSION','SOUNDEX','REPLACE','WEEKDAY','ADDDATE','ADDTIME','SUBDATE','TO_DAYS','SYSDATE','DEGREES','RADIANS','AGAINST','CHARSET','DEFAULT','BIT_AND','BIT_XOR','VAR_POP',
					'CONCAT','INSERT','LENGTH','REPEAT','STRCMP','MINUTE','DECODE','ENCODE','IFNULL','NULLIF','FORMAT','SECOND','LOCATE','SCHEMA','VALUES','BIT_OR','STDDEV',
					'FLOOR','ROUND','COUNT','ASCII','LCASE','LOWER','LTRIM','QUOTE','RIGHT','RTRIM','UCASE','UPPER','MONTH','INSTR','SPACE','FIELD','UNHEX','ATAN2','CRC32','LOG10','POWER','MATCH','SLEEP',
					'RAND','SIGN','SQRT','LEFT','TRIM','HOUR','WEEK','YEAR','CAST','USER','CONV','CHAR','LPAD','RPAD','ACOS','ASIN','ATAN','CEIL','LOG2','DATE','UUID',
					'ABS','BIN','EXP','LOG','MOD','AVG','MIN','MAX','SUM','NOW','MD5','SHA','ORD','OCT','HEX','MID','ELT','COS','COT','POW','SIN','TAN','DAY','STD',
					'LN','IF','IN','PI'
			);
			
			foreach($preplace2 as $function){
				$function1 = $function . '(';
				$function2 = $function . ' (';
				$str = str_ireplace($function1,htmltag('span','color:#FF3E96',$function).'(', $str);
				$str = str_ireplace($function2,htmltag('span','color:#FF3E96',$function).'(', $str);
			}
		}
		//$str = str_replace('Query', '<br/>', $str);
		$str = preg_replace('/([0-9]{1,} Query)|([0-9]{1,} Quit)/', "", $str);
		$str = preg_replace('/([0-9]{1,})\sInit/', "Init", $str);
		echo $str = htmltag('p','padding:2px;color:#05a;font-size:14px',$str);

	} 	
	@fclose($fp);  //关闭指针
       
}	
$end_time = microtime(true);
$interval = $end_time - $start_time;
echo $str = htmltag('p','padding:2px;color:#8B0000;font-size:14px','获取花费:'.$interval.'秒');
/* 封装标签 */
function htmltag($tag,$style,$str){
	return '<'.$tag.' style="'.$style.'">'.$str.'</'.$tag.'>';
}
	
?>

<br>
<div name="end" id='end' style="clear:both;">
<a href="mysql_query.php?act=del" class="success" >清空log日志文件</a>&nbsp;&nbsp;&nbsp;
<a href="mysql_query.php?act=freshen<?php echo time();?>#end" class="success">刷新页面</a>
</div>

</div>
<script>
$(document).ready(function(){
	scroll(0,document.body.scrollHeight);
});
</script>

</body>
</html>