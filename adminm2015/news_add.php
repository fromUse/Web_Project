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
	$n_class=ReStra($_POST['n_class']);
	$n_index=ReStra($_POST['n_index']);
	$n_title=ReStra($_POST['n_title']);
	$n_content=ReStra($_POST['n_content']);
	$n_date=ReStra($_POST['n_date']);
	$k_name=ReStra($_POST['k_name']);
	$k_keyword=ReStra($_POST['k_keyword']);
	$k_description=ReStra($_POST['k_description']);
	if (!isDate($n_date)) Msg('错误的日期格式！','Back');
	
	$sql="insert into ".$language."_news(n_class,n_index,n_title,n_content,n_date,k_name,k_keyword,k_description) 
	values($n_class,$n_index,'$n_title','$n_content','$n_date','$k_name','$k_keyword','$k_description')";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('添加新闻成功！','');
}
?>
<div id="container">
  <div class="edit">
      <h1>新闻管理</h1>
      <form method="post" action="?act=add" onsubmit="return CheckNews(this);">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">新闻分类：</td>
            <td><select name="n_class"><option value="">请选择</option><?php
			$str='';
			$query2=mysql_query('select * from '.$language.'_news_class order by n_order,n_id');
			if (mysql_num_rows($query2)>0){
			while($row2=mysql_fetch_array($query2)){
				$str.='<option value="'.$row2['n_id'].'">'.$row2['n_name'].'</option>';
			}
			}
			echo $str;
			?></select></td>
          </tr>
		  <tr>
            <td class="edit_title">首页显示：</td>
            <td><select name="n_index"><option value="0">否</option><option value="1">是</option></select></td>
          </tr>
          <tr>
            <td class="edit_title">新闻标题：</td>
            <td><input name="n_title" type="text" class="inputtext" size="100" maxlength="255" /></td>
          </tr>
		  <tr>
            <td class="edit_title">发布时间：</td>
            <td><input name="n_date" type="text" class="inputtext" value="<?php echo date('Y-m-d H:i:s') ?>" size="30" maxlength="50" /></td>
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
            <td class="edit_title">新闻内容：</td>
            <td><div class="edit_contents"><textarea name="n_content" id="n_content" class="ckeditor"></textarea></div></td>
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