<?php
$path = explode(PHP_EOL,$_POST['path']);
$path1 = $_POST['path1'];
$path2 = $_POST['path2'];
foreach($path as $key => $val)
{
	$val = trim($val);
	if(empty($val)) continue;
		
	$p1 = substr($val,0,strripos($val,'/'));			
	
	if(!is_dir($path2.$p1))
		mkdir($path2.$p1, 0700,true);

    if(!is_file($path1.$val))
	   continue;
	 
	if(copy($path1.$val, $path2.$val))	
		echo "<font>" .$path2.$val ."</font>";
	else	
		echo "<font color='#FF0000'>" .$path2.$val."</font>";
	
	echo "<br/>";
}
 
?>