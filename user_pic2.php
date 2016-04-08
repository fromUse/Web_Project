<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
require 'uploadfontion.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="generator" content="WebMotionUK">
	<title>WebMotionUK - PHP &amp; Jquery image upload &amp; crop</title>
	<script type="text/javascript" src="js/jquery-pack.js"></script>
	<script type="text/javascript" src="js/jquery.imgareaselect.min.js"></script>
</head>
 <?php
if ($user=='') Msg('','m_login.php');
if ($_POST['act']=='saveimg'){
 
	
}
?>
 
             <?php
				$query=mysql_query('select * from user where u_id='.$user_id);
				$row=mysql_fetch_array($query);
				?>
                <img src="<?php echo $row['u_thumb_image'] ?>" alt="" width="144" height="192" />
<?php

echo "<p>上传相片说明：相片的宽144高192，文件大小不超过1MKB。</p>";
echo "<p>如果上传的相片头部不完整、看不清、出现变形、空白、其他颜色填充，都需要重新上传。</p>";

echo "<p><a href=\"index.php?act=mydata\">填写个人资料</a></p>";
  ?>
<a href="user_pic.php">返回上传</a>
</body>
</html>
