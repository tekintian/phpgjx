<?php 
$config = include_once 'config.php';
$url = $_SERVER['HTTP_REFERER'].'phpMyAdmin-4.0.10.20-all-languages/';



?>
<script>
   //parent.location.href = '$url;';
   window.open ('<?php echo $url;?>','_blank');   
</script>

