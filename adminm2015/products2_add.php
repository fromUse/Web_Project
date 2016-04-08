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
	$p_class=ReStra($_POST['p_class']);
	$p_order=ReStra($_POST['p_order']);
	$p_index=ReStra($_POST['p_index']);
	$p_commend=ReStra($_POST['p_commend']);
	$p_hot=ReStra($_POST['p_hot']);
	$p_new=ReStra($_POST['p_new']);
	$p_name=ReStra($_POST['p_name']);
	$p_price=ReStra($_POST['p_price']);
	$p_image=ReStra($_POST['p_image']);
	$p_thumb=GetThumbPath($p_image);
	$p_imagei=ReStra($_POST['p_imagei']);
	$p_nd=ReStra($_POST['p_nd']);
	$p_time=ReStra($_POST['p_time']);
	$p_file=ReStra($_POST['p_file']);
	$p_desc=ReStra($_POST['p_desc']);
	$p_video=ReStra($_POST['p_video']);
	$p_content=ReStra($_POST['p_content']);
	$p_content2=ReStra($_POST['p_content2']);
	$p_date=date('Y-m-d H:i:s');
	$k_name=ReStra($_POST['k_name']);
	$k_keyword=ReStra($_POST['k_keyword']);
	$k_description=ReStra($_POST['k_description']);

	CreateThumbs($p_image,300,205,0,$p_thumb);
	$sql="insert into ".$language."_products2(p_order,p_name,p_image,p_thumb,p_nd,p_time,p_file,p_desc,p_video,p_content,p_content2,p_date,k_name,k_keyword,k_description) 
	values($p_order,'$p_name','$p_image','$p_thumb',$p_nd,'$p_time','$p_file','$p_desc','$p_video','$p_content','$p_content2','$p_date','$k_name','$k_keyword','$k_description')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('添加菜品成功！','');
}
?>
<div id="container">
  <div class="edit">
      <h1>火锅大杂烩管理</h1>
      <form name="form1" method="post" action="?act=add" onsubmit="return CheckProducts2(this);">
        <table id="protbe" width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">菜品名称：</td>
            <td><input name="p_name" type="text" class="inputtext" size="50" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">菜品图片：</td>
            <td><input name="p_image" id="p_image" type="text" class="inputtext" size="50" readonly="readonly" />&nbsp;(图片尺寸：600*410)<iframe src="../upload_fy.php?file_type=0&file_id=p_image" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <tr>
            <td class="edit_title">菜品难度：</td>
            <td><select name="p_nd">
			<option value="1">1星</option>
			<option value="2">2星</option>
			<option value="3">3星</option>
			<option value="4">4星</option>
			<option value="5">5星</option>
			</select></td>
          </tr>
		  <tr>
            <td class="edit_title">所需时间：</td>
            <td><input name="p_time" type="text" class="inputtext" size="20" maxlength="50" /></td>
          </tr>
		  <tr>
            <td class="edit_title">菜品简介：</td>
            <td><textarea name="p_desc" style="padding:5px; width:99%; height:100px; line-height:16px;"></textarea></td>
		  </tr>
		  <tr>
            <td class="edit_title">食谱PDF文件：</td>
            <td><input name="p_file" id="p_file" type="text" class="inputtext" size="50" readonly="readonly" /><iframe src="../upload_fy.php?file_type=1&file_id=p_file" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
          <tr>
            <td class="edit_title">菜品排序：</td>
            <td><input name="p_order" type="text" class="inputtext" value="<?php echo RsNum('select p_id from '.$language.'_products2')+1 ?>" size="10" maxlength="10" /></td>
          </tr>
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
		  <tr>
            <td class="edit_title">视频地址：</td>
            <td><input name="p_video" type="text" class="inputtext" maxlength="255" style="width:99%;" /></td>
          </tr>
		  <tr>
            <td class="edit_title">食材配料：</td>
            <td><div class="edit_contents"><textarea name="p_content2" class="ckeditor"></textarea></div></td>
		  </tr>
          <tr>
            <td class="edit_title">制作方法：</td>
            <td><div class="edit_contents"><textarea name="p_content" class="ckeditor"></textarea></div></td>
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