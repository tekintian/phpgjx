<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>调试php代码</title>
</head>
<style>
 iframe{ min-width:600px;}
 textarea{ max-height:600px}
 table{ margin:0 auto;}
</style>
<body>
<table border="0" width="100px">
<tr>
<th>PHP 代码调试</th>
<th></th>
<th></th>
</tr>

<tr>

<form action="./run2.php" target="run_iframe" method="post">
<td valign="top" align="center"><textarea name="php_code" cols="50" rows="43"><?php echo file_get_contents('./run3.php');?></textarea></td>
<td valign="middle"><button type="submit" style=" width:60px;">执行</button></td>
</form>

<td valign="top"><iframe id="run_iframe" name="run_iframe" src="./run3.php"  height="600px"></iframe></td>

</tr>
</table>
</body>
</html>
