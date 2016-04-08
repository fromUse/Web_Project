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
    	<div id="contact_left">
			<?php echo '<div id="contact_content"><div class="editorc">'.RsField('select a_content from '.$language.'_about where a_id=1').'</div></div>'; ?>
			<p id="contact_tel">请使用右边的发信助手联系我们，我们会及时答复。<br />如有及时的问题与请求，请拨打<?php echo $site_tel ?>。</p>
		</div>
        <div id="contact_right">
			<div id="feedback">
			<form name="form1" method="post" action="send.php">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="52%"><strong>您的姓名：</strong><input type="text" name="f_name" class="input_text" style="width:256px;" maxlength="40" /></td>
				<td width="48%"><strong>联系电话：</strong><input type="text" name="f_tel" class="input_text" style="width:256px;" maxlength="40" /></td>
			  </tr>
			  <tr>
				<td colspan="2"><strong>电子邮箱：</strong><input type="text" name="f_email" class="input_text" style="width:256px;" maxlength="40" /></td>
			  </tr>
			  <tr>
			    <td colspan="2"><strong>留言内容：</strong><textarea name="f_content" class="input_area" style="width:570px; height:120px;"></textarea></td>
			  </tr>
              <tr>
                <td colspan="2" style="position:relative;"><strong>验&nbsp;&nbsp;证&nbsp;&nbsp;码：</strong><input type="text" name="f_code" class="input_text" size="5" maxlength="4" /> <img src="inc/code2.php" style="cursor:pointer;" title="点击更换图片" onclick="this.src='inc/code2.php?tm='+Math.random();" />
				<input name="button" class="button" type="button" value="发 送" onclick="CheckFeedback(this.form);" style="position:absolute; top:23px; right:16px;" />
				</td>
              </tr>
			</table>
			<input type="hidden" name="act" value="feedback" />
			</form>
			</div>
        </div>
        <div class="clear" style="height:20px;"></div>
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>