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
switch($meter){
case 1:
	$title='企业图片';
	$thumb_width=200;
	$thumb_height=150;
	break;
case 2:
	$title='企业荣誉';
	$thumb_width=200;
	$thumb_height=150;
	break;
}

if ($act=='modify'){
	$a_order=ReStra($_POST['a_order']);
	$a_name=ReStra($_POST['a_name']);
	$a_image=ReStra($_POST['a_image']);
	$a_thumb=GetThumbPath($a_image);
	$image_original=RsField_Array('select a_image,a_thumb from '.$language.'_about_image where a_id='.$id);
	if ($a_image!=$image_original[0]){
		CreateThumbs($a_image,$thumb_width,$thumb_height,0,$a_thumb);
		DeleteFile('../'.$image_original[0]);
		DeleteFile('../'.$image_original[1]);
	}
	$sql="update ".$language."_about_image set a_class=$meter,a_order=$a_order,a_name='$a_name',a_image='$a_image',a_thumb='$a_thumb' where a_id=$id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','about_image.php?meter='.$meter.'&page='.$page);
}

$query=mysql_query('select * from '.$language.'_about_image where a_id='.$id);
$row=mysql_fetch_array($query);
?>
<div id="container">
	<div class="edit">
      	<h1><?php echo $title ?></h1>
      	<form name="form1" method="post" action="?act=modify&meter=<?php echo $meter ?>&page=<?php echo $page ?>&id=<?php echo $id ?>" onsubmit="return CheckAboutImage(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">图片名称：</td>
            <td><input name="a_name" type="text" class="inputtext" value="<?php echo $row['a_name'] ?>" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">上传图片：</td>
            <td><input name="a_image" id="a_image" type="text" class="inputtext" value="<?php echo $row['a_image'] ?>" size="50" maxlength="50" readonly="readonly" />&nbsp;(图片宽高比例：4:3，最小尺寸：200*150)<iframe src="../upload_fy.php?file_type=0&file_id=a_image" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <tr>
            <td class="edit_title">图片排序：</td>
            <td><input name="a_order" type="text" class="inputtext" value="<?php echo $row['a_order'] ?>" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 保存 " class="button" />&nbsp;&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="history.back()" /></td>
          </tr>
        </table>
    	</form>
    </div>
</div>
</body>
</html>