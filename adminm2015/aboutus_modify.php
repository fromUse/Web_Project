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
if ($act=='modify'){
	$a_class=ReStra($_POST['a_class']);
	$a_order=ReStra($_POST['a_order']);
	$a_name=ReStra($_POST['a_name']);
	//$a_cuslink=ReStra($_POST['a_cuslink']);
	$a_content=ReStra($_POST['a_content']);
	//$k_name=ReStra($_POST['k_name']);
	//$k_keyword=ReStra($_POST['k_keyword']);
	//$k_description=ReStra($_POST['k_description']);
	$sql="update ".$language."_aboutus set a_class=$a_class,a_order=$a_order,a_name='$a_name',a_content='$a_content' where a_id=$id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','aboutus.php');
}
$query=mysql_query('select * from '.$language.'_aboutus where a_id='.$id);
$row=mysql_fetch_array($query);
?>
<div id="container">
	<div class="edit">
      <h1>&nbsp;</h1>
      <form name="form1" method="post" action="?act=modify&id=<?php echo $id ?>" onsubmit="return CheckAboutUs(this);">
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
            </select></td>
          </tr>
		  -->
          <tr>
            <td class="edit_title">子栏目名称：</td>
            <td><input name="a_name" type="text" class="inputtext" value="<?php echo $row['a_name'] ?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">自定义链接：</td>
            <td><input name="a_cuslink" type="text" class="inputtext" value="<?php echo $row['a_cuslink'] ?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">子栏目排序：</td>
            <td><input name="a_order" type="text" class="inputtext" value="<?php echo $row['a_order'] ?>" size="10" maxlength="10" /></td>
          </tr>
		  <!--
          <tr>
            <td class="edit_title">Title：</td>
            <td><input name="k_name" type="text" class="inputtext" value="?php echo $row['k_name'] ?>" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Keyword：</td>
            <td><input name="k_keyword" type="text" class="inputtext" value="?php echo $row['k_keyword'] ?>" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Description：</td>
            <td><input name="k_description" type="text" class="inputtext" value="?php echo $row['k_description'] ?>" style="width:99%" maxlength="255" /></td>
          </tr>
		  -->
          <tr>
            <td class="edit_title">子栏目内容：</td>
            <td><div class="edit_contents"><textarea name="a_content" id="a_content" class="ckeditor"><?php echo $row['a_content'] ?></textarea></div></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="submit" type="submit" value=" 保存 " class="button" />&nbsp;&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="location.href='aboutus.php'" /></td>
          </tr>
        </table>
      </form>
	  <script type="text/javascript">
	  //document.form1.a_class.value="?php echo $row['a_class'] ?>";
	  </script>
    </div>
</div>
</body>
</html>