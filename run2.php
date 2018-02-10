<?php
	$code = $_POST['php_code'];
	 	 
	if(!strstr($code,'<?php'))
		$code = '<?php'.PHP_EOL.$code ;
		
	file_put_contents('run3.php',$code);	
	
	header("Location:./run3.php");