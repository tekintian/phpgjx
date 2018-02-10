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
<th>文件 递归 复制</th>
<th></th>
<th></th>
</tr>
<form action="./file_copy2.php" target="run_iframe" method="post">
<tr>

<td valign="top" align="center">
    从:<input type="text" name="path1" value="D:\wamp\www\svn_tpshop" style="width:610px;" />
    <br/><br/>
    <textarea name="path" cols="80" rows="43"></textarea>
    </td>
    <td valign="middle"><button type="submit" style=" width:60px;">执行</button>
</td>

<td valign="top">
    复制到:<input type="text" name="path2" value="Z:/a" style="width:620px;" />
    <br/><br/>
    <iframe id="run_iframe" name="run_iframe"  width="800px" height="600px"></iframe>
</td>
</tr>
</table>
</form>
</body>
</html>
