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
	$a_title=ReStra($_POST['a_title']);
	$a_content=ReStra($_POST['a_content']);
	$a_date=ReStra($_POST['a_date']);
	$k_name=ReStra($_POST['k_name']);
	$k_keyword=ReStra($_POST['k_keyword']);
	$k_description=ReStra($_POST['k_description']);
	if (!isDate($a_date)) Msg('错误的日期格式！','Back');
	$sql="update ".$language."_article set 
	a_class=$a_class,
	a_title='$a_title',
	a_content='$a_content',
	a_date='$a_date',
	k_name='$k_name',
	k_keyword='$k_keyword',
	k_description='$k_description'
	 where a_id=$id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','article.php?'.$urls);
}
$query=mysql_query('select * from '.$language.'_article where a_id='.$id);
$row=mysql_fetch_array($query);
?>
<div id="container">
  <div class="edit">
      <h1>文章管理޸</h1>
      <form name="form1" method="post" action="?act=modify&<?php echo $urls.'&id='.$id ?>" onsubmit="return CheckArticle(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">文章分类：</td>
            <td><select name="a_class"><?php
			$str='';
			$query2=mysql_query('select * from '.$language.'_article_class order by a_order,a_id');
			if (mysql_num_rows($query2)>0){
			while($row2=mysql_fetch_array($query2)){
				$str.='<option value="'.$row2['a_id'].'">'.$row2['a_name'].'</option>';
			}
			}
			echo $str;
			?></select></td>
          </tr>
          <tr>
            <td class="edit_title">文章标题：</td>
            <td><input name="a_title" type="text" class="inputtext" value="<?php echo $row['a_title'] ?>" size="80" maxlength="255" /></td>
          </tr>
		  <tr>
            <td class="edit_title">发布时间：</td>
            <td><input name="a_date" type="text" class="inputtext" value="<?php echo $row['a_date'] ?>" size="30" maxlength="50" /></td>
          </tr>
          <tr>
            <td class="edit_title">Title：</td>
            <td><input name="k_name" type="text" class="inputtext" value="<?php echo $row['k_name'] ?>" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Keyword：</td>
            <td><input name="k_keyword" type="text" class="inputtext" value="<?php echo $row['k_keyword'] ?>" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Description：</td>
            <td><input name="k_description" type="text" class="inputtext" value="<?php echo $row['k_description'] ?>" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">文章内容：</td>
            <td><div class="edit_contents"><textarea name="a_content" id="a_content" class="ckeditor"><?php echo $row['a_content'] ?></textarea></div></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 保存 " class="button" />&nbsp;<input name="button" type="button" value=" 返回 " class="button" onclick="location.href='article.php?<?php echo $urls ?>';" /></td>
          </tr>
        </table>
    </form>
	<script type="text/javascript">
	document.form1.a_class.value="<?php echo $row['a_class'] ?>";
	</script>
    </div>
</div>
</body>
</html>