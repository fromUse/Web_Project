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
	$a_class=ReStra($_POST['a_class']);
	$a_order=ReStra($_POST['a_order']);
	$a_name=ReStra($_POST['a_name']);
	//$a_cuslink=ReStra($_POST['a_cuslink']);
	$a_content=ReStra($_POST['a_content']);
	//$k_name=ReStra($_POST['k_name']);
	//$k_keyword=ReStra($_POST['k_keyword']);
	//$k_description=ReStra($_POST['k_description']);
	$sql="insert into ".$language."_aboutus(a_class,a_order,a_name,a_cuslink,a_content) values($a_class,$a_order,'$a_name','','$a_content')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('添加子栏目成功！','');
}
?>
<div id="container">
    <div class="edit">
      <h1>关于我们</h1>
      <form method="post" action="?act=add" onsubmit="return CheckAboutUs(this);">
	  <input type="hidden" name="a_class" value="99" />
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		<!--
          <tr>
            <td class="edit_title">子栏目类型：</td>
            <td><select name="a_class">
            <option value="99">自定义内容</option>
            <option value="98">自定义链接</option>
            <option value="1">企业图片</option>
            <option value="2">企业荣誉</option>
            </select>
            </td>
          </tr>
		  -->
          <tr>
            <td class="edit_title">子栏目名称：</td>
            <td><input name="a_name" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">自定义链接：</td>
            <td><input name="a_cuslink" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">子栏目排序：</td>
            <td><input name="a_order" type="text" class="inputtext" value="<?php echo RsNum('select a_id from '.$language.'_aboutus')+1 ?>" size="10" maxlength="10" /></td>
          </tr>
		  <!--
          <tr>
            <td class="edit_title">Title：</td>
            <td><input name="k_name" type="text" class="inputtext" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Keyword：</td>
            <td><input name="k_keyword" type="text" class="inputtext" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Description：</td>
            <td><input name="k_description" type="text" class="inputtext" style="width:99%" maxlength="255" /></td>
          </tr>
		  -->
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