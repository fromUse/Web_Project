<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<link rel="stylesheet" href="../css/admin.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>
<body>
<div id="rightmain">
<div id="container">
	<div id="sysinfo">
	<?php
	$str='';
	$str.='<table width="94%" align="center" border="0" cellspacing="0" cellpadding="0">';
  	$str.='<tr>';
  	$str.='<td colspan="2" class="table_title">系统信息</td>';
	$str.='</tr>';
  	$str.='<tr>';
   	$str.='<td width="50%">管理员账号：<span class="c_800000">'.$_COOKIE['admin_user'].'</span></td>';
    $str.='<td width="50%">上线次数：<span class="c_800000">'.RsNum('select a_count from admin where a_user=\''.$_COOKIE['admin_user'].'\'').'</span></span></td>';
  	$str.='</tr>';
  	$str.='<tr>';
    $str.='<td>身份过期：<span class="c_800000">60分钟</span></td>';
    $str.='<td>现在时间：<span class="c_800000">'.date('Y年m月d日 H:i').'</span></td>';
  	$str.='</tr>';
  	$str.='<tr>';
    $str.='<td>服务器域名：<span class="c_800000">'.$_SERVER['SERVER_NAME'].' / '. $_SERVER['HTTP_HOST'].' ('.$_SERVER['REMOTE_ADDR'].')</span></td>';
    $str.='<td>上线时间：<span class="c_800000">'.$_COOKIE['admin_time'].'</span></td>';
 	$str.='</tr>';
 	$str.='<tr>';
    $str.='<td>服务器操作系统：<span class="c_800000">'.$_SERVER['OS'].'</span></td>';
    $str.='<td>PHP版本号：<span class="c_800000">'.PHP_VERSION.'</span></td>';
  	$str.='</tr>';
  	$str.='<tr>';
    $str.='<td>服务器解释引擎：<span class="c_800000">'.$_SERVER['SERVER_SOFTWARE'].'</span></td>';
    $str.='<td>PHP运行方式：<span class="c_800000">'.strtoupper(php_sapi_name()).'</span></td>';
  	$str.='</tr>';
  	$str.='<tr>';
    $str.='<td colspan="2">浏览器版本：<span class="c_800000">'.$_SERVER['HTTP_USER_AGENT'].'</span></td>';
  	$str.='</tr>';
	$str.='</table>';	
	echo $str;
	?>
	</div>
</div>
</div>