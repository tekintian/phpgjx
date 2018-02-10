<script type="text/javascript" src="js/fn.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<div id="box">
 
	<span class="title">php工具箱︾</span>	    
	<span class='info'>    
	<img border="0" src="images/gj1.jpg" width='20' height='20'/>
		<a href="javascript:showPage('control_panel.php');" >土豪php</a>
	</span>    
	<span class='info'>
	<img border="0" src="images/gj2.jpg" width='20' height='20'/>
		<a href="javascript:showPage('mysql_query.php');" >SQL追踪器</a>
	</span>
    <?php
    foreach($config['menu'] as $key => $val)
	{
	?>
	<span class='info'> 
	<img border="0" src="images/gj4.jpg" width='20' height='20'/>
    <?php 
	   if(!strstr($val,'http'))
		     echo "<a href=\"javascript:showPage('{$val}')\">{$key}</a>";
		else
		     echo "<a target='_blank' href='{$val}'>{$key}</a>";
	?>		
	</span>
	<?php
	}
	?>
	<span class='info'>
	<img border="0" src="images/gj2.jpg" width='20' height='20'/>
		<a href="javascript:alert('请去config.php文件添加菜单')" >自定义菜单</a>
	</span>    
</div>
<script>
$(document).ready(function(){
	  
	$('.return').mouseover(function(){
		if($('.return').css('left') == '-30px')
		{
			 $('.return').css({"left":"0px"});		
			 ret();
		}
	});
	  
});
	  
   temp_time = 0; // 零时定义的计数时间	  
	  
	function ret()
	{				
	    temp_time =  temp_time + 1;
		if(temp_time > 5 ){
			$('.return').css({"left":"-30px"});		
			temp_time = 0;
		}		
		else
			 var t=  setTimeout('ret()', 1000);			 
	}	
	ret();	  
	

</script>
<div class="return"><a href="index.php">首页</a></div>