<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="php工具箱" />
<meta name="description" content="php工具箱" />
<title>php工具箱</title>
<link rel="stylesheet" type="text/css" href="css/control_panel.css">
</head>
<body>
<style>
div img{max-width:600px;}
</style>
<div id='center'>
 <?php
   @include("service_r.php"); 
   $arr = glob('images/dscxy/*');
   $key = array_rand($arr,1);
   $image = $arr[$key]; 
//   $image ="images/dscxy/19.jpg";
 ?>
<div class="fLeft" id="feature">            
    <div class="ucontent">      
      <font style="color:#FF6600;font-size:19px;">php最土豪的工具 v2.0 土豪版,版权归群主所有 违者必究</font>
    </div>
    <div class="ucontent" style="padding:10px;">
    <img src="<?php echo $image; ?>" onclick="location.href=location.href;"/>
    </div>
  </div>
</div>
</body>
</html>