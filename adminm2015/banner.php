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
	$b_image=$_POST['b_image'];
	for ($i=0;$i<count($b_image);$i++){
		$sql="update ".$language."_banner set b_image='{$b_image[$i]}' where b_id=".($i+1);
		mysql_query($sql) or die(mysql_error($sql));
	}
	Msg('','');
}
?>
<div id="container">
    <div class="edit">
      <h1>޸内页Banner图片管理</h1>
      <form method="post" action="?act=modify">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <?php
		  $query=mysql_query('select * from '.$language.'_banner order by b_id');
		  $row=mysql_fetch_array($query);
		  ?>
		  <tr>
            <td class="edit_title">关于我们：</td>
            <td><input name="b_image[]" type="text" class="inputtext" id="b_image1" value="<?php echo $row['b_image']?>" size="50" />&nbsp;(图片尺寸：1920*250)<iframe src="../upload_fy.php?file_type=0&file_id=b_image1" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <?php $row=mysql_fetch_array($query); ?>
          <tr>
            <td class="edit_title">产品展示：</td>
            <td><input name="b_image[]" type="text" class="inputtext" id="b_image2" value="<?php echo $row['b_image']?>" size="50" />&nbsp;(图片尺寸：1920*250)<iframe src="../upload_fy.php?file_type=0&file_id=b_image2" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <?php $row=mysql_fetch_array($query); ?>
		  <tr>
            <td class="edit_title">新闻中心：</td>
            <td><input name="b_image[]" type="text" class="inputtext" id="b_image3" value="<?php echo $row['b_image']?>" size="50" />&nbsp;(图片尺寸：1920*250)<iframe src="../upload_fy.php?file_type=0&file_id=b_image3" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <?php $row=mysql_fetch_array($query); ?>
		  <tr>
            <td class="edit_title">技术支持：</td>
            <td><input name="b_image[]" type="text" class="inputtext" id="b_image4" value="<?php echo $row['b_image']?>" size="50" />&nbsp;(图片尺寸：1920*250)<iframe src="../upload_fy.php?file_type=0&file_id=b_image4" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
		  <?php $row=mysql_fetch_array($query); ?>
		  <tr>
            <td class="edit_title">联系我们：</td>
            <td><input name="b_image[]" type="text" class="inputtext" id="b_image5" value="<?php echo $row['b_image']?>" size="50" />&nbsp;(图片尺寸：1920*250)<iframe src="../upload_fy.php?file_type=0&file_id=b_image5" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="submit" value=" 保存 " class="button" />&nbsp;</td>
          </tr>
        </table>
      </form>
    </div>
</div>
</body>
</html>