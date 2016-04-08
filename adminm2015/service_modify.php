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
	$s_class=ReStra($_POST['a_class']);
	$s_order=ReStra($_POST['a_order']);
	$s_name=ReStra($_POST['a_name']);
	$s_content=ReStra($_POST['a_content']);
	$sql="update ".$language."_service set s_class=$s_class,s_order=$s_order,s_name='$s_name',s_content='$s_content' where s_id=$id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','service.php');
}
$query=mysql_query('select * from '.$language.'_service where s_id='.$id);
$row=mysql_fetch_array($query);
?>
<div id="container">
	<div class="edit">
      <h1>服务中心</h1>
      <form name="form1" method="post" action="?act=modify&id=<?php echo $id ?>" onsubmit="return CheckAboutUs(this);">
	  <input type="hidden" name="a_class" value="99" />
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">子栏目名称：</td>
            <td><input name="a_name" type="text" class="inputtext" value="<?php echo $row['s_name'] ?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">子栏目排序：</td>
            <td><input name="a_order" type="text" class="inputtext" value="<?php echo $row['s_order'] ?>" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td class="edit_title">子栏目内容：</td>
            <td><div class="edit_contents"><textarea name="a_content" id="a_content" class="ckeditor"><?php echo $row['s_content'] ?></textarea></div></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="submit" type="submit" value=" 保存 " class="button" />&nbsp;&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="location.href='service.php'" /></td>
          </tr>
        </table>
      </form>
    </div>
</div>
</body>
</html>