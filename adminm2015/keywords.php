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
<script src="inc/function.js" language="javascript"></script>
</head>
<body>
<?php
switch($id){
case 1:
	$title='网站首页';
	break;
case 2:
	$title='关于我们';
	break;
case 3:
	$title='产品展示';
	break;
case 4:
	$title='新闻中心';
	break;
case 5:
	$title='技术支持';
	break;
case 6:
	$title='服务中心';
	break;
case 7:
	$title='下载中心';
	break;
case 8:
	$title='人才招聘';
	break;
case 9:
	$title='在线留言';
	break;
case 10:
	$title='联系我们';
	break;
}
if ($act=='modify'){
	$k_name=ReStra($_POST['k_name']);
	$k_keyword=ReStra($_POST['k_keyword']);
	$k_description=ReStra($_POST['k_description']);
	mysql_query("update ".$language."_keywords set k_name='$k_name',k_keyword='$k_keyword',k_description='$k_description' where k_id=$id",$conn);
	Msg('','keywords.php?id='.$id);
}
$query=mysql_query('select * from '.$language.'_keywords where k_id='.$id,$conn);
$row=mysql_fetch_array($query);
?>
<div id="container">
  <div class="edit">
      <h1>关键字设置 - <?php echo $title ?></h1>
      <form name="form1" method="post" action="?act=modify&id=<?php echo $id ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">Title：</td>
            <td><input name="k_name" type="text" class="inputtext" value="<?php echo $row['k_name'] ?>" style="width:99%" maxlength="255" /></td>
          </tr>
          <tr>
            <td class="edit_title">Keyword：</td>
            <td><textarea name="k_keyword" style="padding:3px; width:99%; height:100px;"><?php echo $row['k_keyword'] ?></textarea></td>
          </tr>
          <tr>
            <td class="edit_title">Description：</td>
            <td><textarea name="k_description" style="padding:3px; width:99%; height:100px;"><?php echo $row['k_description'] ?></textarea></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 修改 " class="button" /></td>
          </tr>
        </table>
    </form>
    </div>
</div>
</body>
</html>