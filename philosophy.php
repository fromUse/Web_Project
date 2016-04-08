<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $site_keyword?>" />
<meta name="description" content="<?php echo $site_description?>" />
<link rel="stylesheet" href="css/style_<?php echo $language?>.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
</head>
<body>
<div id="main">
	<?php require 'header.php'?>
	<div id="content">
		<img src="images/t1.jpg" />
	</div>
	<p style="margin-top:180px; height:570px; background:url(images/t2.jpg) no-repeat center center;"></p>
	<p style="height:462px; background:url(images/t3.jpg) no-repeat center center;"></p>
	<p style="height:490px; background:url(images/t4.jpg) no-repeat center center;"></p>
	<p style="height:462px; background:url(images/t5.jpg) no-repeat center center;"></p>
    <?php require 'footer.php'?>
</div>
</body>
</html>