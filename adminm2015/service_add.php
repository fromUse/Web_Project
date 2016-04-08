<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/admin.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script type="text/javascript" src="../fy_ckeditor/ckeditor.js"></script>
</head>
<body>
<?php
if ($act=='add'){
	$s_class=ReStra($_POST['a_class']);
	$s_order=ReStra($_POST['a_order']);
	$s_name=ReStra($_POST['a_name']);
	$s_content=ReStra($_POST['a_content']);
	$sql="insert into ".$language."_service(s_class,s_order,s_name,s_cuslink,s_content) values($s_class,$s_order,'$s_name','','$s_content')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('添加子栏目成功！','');
}
?>
<div id="container">
    <div class="edit">
      <h1>服务中心</h1>
      <form method="post" action="?act=add" onsubmit="return CheckAboutUs(this);">
	  <input type="hidden" name="a_class" value="99" />
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">子栏目名称：</td>
            <td><input name="a_name" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">子栏目排序：</td>
            <td><input name="a_order" type="text" class="inputtext" value="<?php echo RsNum('select s_id from '.$language.'_service')+1 ?>" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td class="edit_title">子栏目内容：</td>
            <td><div class="edit_contents"><textarea name="a_content" id="a_content" class="ckeditor"></textarea></div></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 添加 " class="button" /></td>
          </tr>
        </table>
      </form>
    </div>
</div>
</body>
</html>