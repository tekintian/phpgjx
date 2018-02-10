<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php工具箱</title>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
</head>
<script>
function showPage(page){
	$('#control_panel').attr('src',page);
}

$(document).ready(function(){
	//this.height=0;
	//var fdh=(this.Document?this.Document.body.scrollHeight:this.contentDocument.body.offsetHeight);
	//this.height=(fdh>700?fdh+200:700);
	$('iframe').hide();
	$('#control_panel').show();
	
	setTimeout("dsPHP()", 3000);
	
});

var request = 1;	// 上一次请求有没回来
function dsPHP(){	
    
	 
	   var timestamp = Date.parse(new Date());  //JavaScript 获取当前时间戳：
	   	 
	   if(request == 0) //  上一次请求没回来 不再继续请求
		   return false;
		   
	   request = 0;   
	 	
       $.ajax({
            type:"GET",            //提交数据的类型 POST GET
            url:"service.php",            //提交的网址
            data:{time:timestamp,ip:"ip"},            //提交的数据
            datatype: "html",//"xml", "html", "script", "json", "jsonp", "text".            //返回数据的格式
//            beforeSend:function(){$("#msg").html("logining");},            //在请求之前调用的函数
            //成功返回之后调用的函数            
            success:function(data){
				request = 1;  // 请求回来了 				
				//$(document.getElementById('control_panel').contentWindow.document.body).html(data);
			  //	$('#control_panel').attr('src','http://www.tp-shop.cn/phpgjx/');
            },
            //调用出错执行的函数
            error: function(err){
				 request = 1;  // 请求回来了 				
				//$('#control_panel').attr('src','http://www.tp-shop.cn/phpgjx/');
                //请求出错处理
				//alert("IE的信任站点中把 '通过域访问数据资源' 设成启用");
				// 解决方法如下：点击IE浏览器的的"工具->Internet 选项->安全->自定义级别"将"其他"选项中的"通过域访问数据源"选中为
            }
         });		
}
 
</script>
<body>
<?php 
$config = include_once 'config.php';
include_once 'tools.php';
?>
<style>
#control_panel{ margin-top:10px; margin-bottom:10px;}
</style>
<!--控制面板-->
<iframe width="100%" height="800" name="control_panel" id='control_panel'  frameborder="0" scrolling="auto"  src="control_panel.php"  vspace="0" hspace="0" 
 onload="this.height=0;var fdh=(this.Document?this.Document.body.scrollHeight:this.contentDocument.body.offsetHeight);this.height=(fdh>700?fdh+200:700)" ></iframe>

<!-- mysql_query-->
<!--
<iframe width="90%" height="0" name="mysql_query" id='mysql_query'  frameborder="0" scrolling="yes"  src="mysql_query.php" onload="this.height=0;var fdh=(this.Document?this.Document.body.scrollHeight:this.contentDocument.body.offsetHeight);this.height=(fdh>700?fdh+200:700)" style="display:none;"></iframe>
-->
</body>
</html>
