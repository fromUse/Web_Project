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
</head>
<body>
<?php
if ($act=='add'){
	$l_class=$meter;
	$l_name=ReStra($_POST['l_name']);
	$l_image=ReStra($_POST['l_image']);
	$l_url=ReStra($_POST['l_url']);
	$sql="insert into ".$language."_links(l_class,l_name,l_image,l_url) values($meter,'$l_name','$l_image','$l_url')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('添加合作伙伴成功！','PageUrl');
}
?>
<div id="container">
    <div class="edit">
      <h1>合作伙伴</h1>
      <form method="post" action="?act=add&meter=<?php echo $meter ?>" onsubmit="return CheckLinks<?php echo $meter ?>(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">链接名称：</td>
            <td><input name="l_name" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
		  <?php if($meter==2){ ?>
          <tr>
            <td class="edit_title">链接图片：</td>
            <td><input name="l_image" id="l_image" type="text" class="inputtext" size="50" />&nbsp;(图片尺寸：150*40)<iframe src="../upload_fy.php?file_type=0&file_id=l_image" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <?php } ?>
          <tr>
            <td class="edit_title">链接地址：</td>
            <td><input name="l_url" type="text" class="inputtext" size="50" maxlength="255" /></td>
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