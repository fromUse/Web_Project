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

if ($_SESSION['admin_user']<>'admin')
{
echo '你无权限进行此操作';
break;
}


?>

<div id="container">
	
	
缴费人数:<?php echo RsNum('select o_id from orders where o_status=1') ?><br>
-------------------------<br>
一级:<br>
总共人数:<?php echo RsNum('select o_id from orders where o_dengji=38') ?><br>
全考人数:<?php echo RsNum('select o_id from orders where o_dengji=38 and o_leibie=38') ?><br>
笔试人数:<?php echo RsNum('select o_id from orders where o_dengji=38 and o_leibie=39') ?><br>
口试人数:<?php echo RsNum('select o_id from orders where o_dengji=38 and o_leibie=40') ?><br><br>
-------------------------<br>
一级B:<br>
总共人数:<?php echo RsNum('select o_id from orders where o_dengji=39') ?><br>
全考人数:<?php echo RsNum('select o_id from orders where o_dengji=39 and o_leibie=38') ?><br>
笔试人数:<?php echo RsNum('select o_id from orders where o_dengji=39 and o_leibie=39') ?><br>
口试人数:<?php echo RsNum('select o_id from orders where o_dengji=39 and o_leibie=40') ?><br><br>
-------------------------<br>
二级:<br>
总共人数:<?php echo RsNum('select o_id from orders where o_dengji=40') ?><br>
全考人数:<?php echo RsNum('select o_id from orders where o_dengji=40 and o_leibie=38') ?><br>
笔试人数:<?php echo RsNum('select o_id from orders where o_dengji=40 and o_leibie=39') ?><br>
口试人数:<?php echo RsNum('select o_id from orders where o_dengji=40 and o_leibie=40') ?><br><br>
-------------------------<br>
三级:<br>
总共人数:<?php echo RsNum('select o_id from orders where o_dengji=41') ?><br>
全考人数:<?php echo RsNum('select o_id from orders where o_dengji=41 and o_leibie=38') ?><br>
笔试人数:<?php echo RsNum('select o_id from orders where o_dengji=41 and o_leibie=39') ?><br>
口试人数:<?php echo RsNum('select o_id from orders where o_dengji=41 and o_leibie=40') ?><br><br>




	
</div>
</body>
</html>