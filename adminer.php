<?php 
$config = include_once 'config.php';
$url = $_SERVER['HTTP_REFERER'].'adminer-4.6.1.php';



?>
<script>
   //parent.location.href = '$url;';
   window.open ('<?php echo $url;?>','_blank');   
</script>

