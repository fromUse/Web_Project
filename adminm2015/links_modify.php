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
if ($act=='modify'){
	$l_name=ReStra($_POST['l_name']);
	$l_image=ReStra($_POST['l_image']);
	$l_url=ReStra($_POST['l_url']);
	$sql="update ".$language."_links set l_name='$l_name',l_image='$l_image',l_url='$l_url' where l_id=$id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','links.php?'.$urls);
}
$query=mysql_query('select * from '.$language.'_links where l_id='.$id);
$row=mysql_fetch_array($query);
?>
<div id="container">
    <div class="edit">
      <h1>޸合作伙伴</h1>
      <form name="form1" method="post" action="?act=modify&<?php echo $urls.'&id='.$id ?>" onsubmit="return CheckLinks<?php echo $meter ?>(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">链接名称：</td>
            <td><input name="l_name" type="text" class="inputtext" value="<?php echo $row['l_name'] ?>" size="50" maxlength="50" /></td>
          </tr>
		  <?php if($meter==2){ ?>
          <tr>
            <td class="edit_title">链接图片：</td>
            <td><input name="l_image" id="l_image" type="text" class="inputtext" value="<?php echo $row['l_image'] ?>" size="50" />&nbsp;(图片尺寸：150*40)<iframe src="../upload_fy.php?file_type=0&file_id=l_image" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <?php } ?>
          <tr>
            <td class="edit_title">链接地址：</td>
            <td><input name="l_url" type="text" class="inputtext" value="<?php echo $row['l_url'] ?>" size="50" maxlength="255" /></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 保存 " class="button" />&nbsp;&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="history.back();" /></td>
          </tr>
        </table>
      </form>
    </div>
</div>
</body>
</html>