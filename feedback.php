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
		<div id="left"><?php require 'left.php'?></div>
        <div id="right">
			<p id="title"><strong>信息反馈</strong>您现在的位置：<a href="./">首 页</a>&nbsp;>&nbsp;信息反馈</p>
			<div id="feedback">
			<form name="form1" method="post" action="send.php">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="15%" align="right">您的姓名：</td>
				<td width="85%"><input type="text" name="f_name" class="inputtext" size="40" maxlength="40" /><span>*</span></td>
			  </tr>
			  <tr>
				<td align="right">联系电话：</td>
				<td><input type="text" name="f_tel" class="inputtext" size="40" maxlength="40" /><span>*</span></td>
			  </tr>
			  <tr>
				<td align="right">传真号码：</td>
				<td><input type="text" name="f_fax" class="inputtext" size="40" maxlength="40" /></td>
			  </tr>
			  <tr>
				<td align="right">电子邮箱：</td>
				<td><input type="text" name="f_email" class="inputtext" size="40" maxlength="40" /><span>*</span></td>
			  </tr>
			  <tr>
				<td align="right">公司名称：</td>
				<td><input type="text" name="f_company" class="inputtext" style="width:500px;" /></td>
			  </tr>
			  <tr>
				<td align="right">联系地址：</td>
				<td><input type="text" name="f_address" class="inputtext" style="width:500px;" /></td>
			  </tr>
			  <tr>
				<td align="right">留言主题：</td>
				<td><input type="text" name="f_title" class="inputtext" style="width:500px;" /><span>*</span></td>
			  </tr>
			  <tr>
			    <td align="right">留言内容：</td>
				<td><textarea name="f_content" class="inputarea" style="width:500px; height:120px;"></textarea><span>*</span></td>
			  </tr>
              <tr>
                <td align="right">验 证 码：</td>
                <td><input type="text" name="f_code" class="inputtext" size="5" maxlength="4" /><span>*</span></td>
              </tr>
			  <tr>
                <td align="right">&nbsp;</td>
                <td><img src="inc/secode.php" style="cursor:pointer;" title="点击更换图片" onclick="this.src='inc/secode.php?tm='+Math.random();" /></td>
              </tr>
			  <tr>
			    <td align="right">&nbsp;</td>
				<td><br /><input name="button" class="button2" type="button" value="提 交" onclick="CheckFeedback(this.form,'cn');" /></td>
			  </tr>
			</table>
			<input type="hidden" name="act" value="feedback" />
			</form>
			</div>
		</div>
		<div class="clear"></div>
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>