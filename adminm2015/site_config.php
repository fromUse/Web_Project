<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	$s_name=ReStra($_POST['s_name']);
	$s_domain=ReStra($_POST['s_domain']);
	$s_keyword=ReStra($_POST['s_keyword']);
	$s_description=ReStra($_POST['s_description']);
	$s_copyright=ReStra($_POST['s_copyright']);
	$s_tel=ReStra($_POST['s_tel']);
	$s_tdc=ReStra($_POST['s_tdc']);
	$s_weibo=ReStra($_POST['s_weibo']);
	$s_tqq=ReStra($_POST['s_tqq']);
	$s_postage=$_POST['s_postage'];
	$s_postage_amount=$_POST['s_postage_amount'];
	$s_soc2=$_POST['s_soc2'];
	$s_soc2_code=ReStra($_POST['s_soc2_code']);
	$s_stat=$_POST['s_stat'];
	$s_stat_code=ReStra($_POST['s_stat_code']);
	$sql="update ".$language."_config set 
	s_name='$s_name',
	s_domain='$s_domain',
	s_keyword='$s_keyword',
	s_description='$s_description',
	s_copyright='$s_copyright',
	s_tel='$s_tel',
	s_tdc='$s_tdc',
	s_weibo='$s_weibo',
	s_tqq='$s_tqq',
	s_postage=$s_postage,
	s_postage_amount=$s_postage_amount,
	s_soc2=$s_soc2,
	s_soc2_code='$s_soc2_code',
	s_stat=$s_stat,
	s_stat_code='$s_stat_code'
	 where s_id=1";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','');
}
$query=mysql_query('select * from '.$language.'_config where s_id=1',$conn);
$row=mysql_fetch_array($query);
?>
<div id="container">
	<div class="edit">
		<h1>网站配置</h1>
		<form name="form1" method="post" action="?act=modify">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
   	  	<tr>
   	  	  <td colspan="2"><strong>网站信息</strong></td>
   	  	</tr>
   	  	<tr>
			<td class="edit_title">网站名称：</td>
			<td><input name="s_name" type="text" class="inputtext" value="<?php echo $row['s_name'] ?>" maxlength="255" style="width:99%;" /></td>
        </tr>
		<tr>
			<td class="edit_title">网站地址：</td>
			<td><input name="s_domain" type="text" class="inputtext" value="<?php echo $row['s_domain'] ?>" maxlength="255" style="width:99%;" /></td>
        </tr>
        <tr>
          <td class="edit_title">关 键 字：</td>
          <td><textarea name="s_keyword" style="padding:3px; width:99%; height:100px;"><?php echo $row['s_keyword'] ?></textarea></td>
      	</tr>
        <tr>
          <td class="edit_title">描述信息：</td>
          <td><textarea name="s_description" style="padding:3px; width:99%; height:100px;"><?php echo $row['s_description'] ?></textarea></td>
      	</tr>
		<tr>
		  <td class="edit_title">底部信息：</td>
          <td><div id="edit_content"><textarea name="s_copyright" id="s_copyright"><?php echo $row['s_copyright'] ?></textarea><script type="text/javascript">CKEDITOR.replace('s_copyright',{height:150});</script></div></td>
        </tr>
<!--		<tr>
            <td class="edit_title">二 维 码：</td>
            <td><input name="s_tdc" id="s_tdc" type="text" class="inputtext" value="<?php echo $row['s_tdc'] ?>" size="50" maxlength="50" readonly="readonly" />&nbsp;(图片尺寸：200*200)<iframe src="../upload_fy.php?file_type=0&file_id=s_tdc" frameborder="0" allowtransparency="true" scrolling="no" width="100%" height="25"></iframe></td>
        </tr>
		<tr>
			<td class="edit_title">服务热线：</td>
			<td><input name="s_tel" type="text" class="inputtext" value="<?php echo $row['s_tel'] ?>" size="50" maxlength="50" /></td>
        </tr>
		<tr>
			<td class="edit_title">腾讯微博：</td>
			<td><input name="s_weibo" type="text" class="inputtext" value="<?php echo $row['s_weibo'] ?>" size="50" maxlength="50" /></td>
        </tr>
		<tr>
			<td class="edit_title">新浪微博：</td>
			<td><input name="s_tqq" type="text" class="inputtext" value="<?php echo $row['s_tqq'] ?>" size="50" maxlength="50" /></td>
        </tr>
		<tr>
			<td class="edit_title">邮费：</td>
			<td><input name="s_postage" type="text" class="inputtext" value="<?php echo $row['s_postage'] ?>" size="20" maxlength="20" />&nbsp;(只能输入数字)</td>
        </tr>
		<tr>
			<td class="edit_title">免邮费：</td>
			<td><input name="s_postage_amount" type="text" class="inputtext" value="<?php echo $row['s_postage_amount'] ?>" size="20" maxlength="20" />&nbsp;(只能输入数字，订单满足此金额即免运费)</td>
        </tr>
        <tr>
		    <td class="edit_title" style="line-height:20px;"><strong>第三方浮动客服：</strong></td>
       		<td>&nbsp;</td>
       	</tr>
        <tr>
        	<td class="edit_title">浮动开关：</td>
        	<td><select name="s_soc2"><option value="1">开</option><option value="0">关</option></select>&nbsp;<span style="color:#ff0000;">(<?php if ($row['s_soc2']==0){echo '浮动开关已关闭，前台已隐藏';}else{echo '浮动开关已打开，前台正常显示';} ?>)</span>
			<script type="text/javascript">document.form1.s_soc2.value="<?php echo $row['s_soc2'] ?>";</script></td>
      	</tr>
        <tr>
          	<td class="edit_title">客服代码：</td>
          	<td><textarea name="s_soc2_code" style="padding:3px; width:99%; height:100px;"><?php echo $row['s_soc2_code'] ?></textarea>(在这里输入53客服，TQ客服等客服代码)</td>
        </tr>-->
        <tr>
		    <td class="edit_title" style="line-height:20px;"><strong>第三方流量统计：</strong></td>
       		<td>&nbsp;</td>
       	</tr>
        <tr>
        	<td class="edit_title">统计开关：</td>
        	<td><select name="s_stat"><option value="1">开</option><option value="0">关</option></select>&nbsp;<span style="color:#ff0000;">(<?php if ($row['s_stat']==0){echo '统计开关已关闭，前台已隐藏';}else{echo '统计开关已打开，前台正常显示';} ?>)</span>
			<script type="text/javascript">document.form1.s_stat.value="<?php echo $row['s_stat'] ?>";</script></td>
      	</tr>
        <tr>
          	<td class="edit_title">统计代码：</td>
          	<td><textarea name="s_stat_code" style="padding:3px; width:99%; height:100px;"><?php echo $row['s_stat_code'] ?></textarea>(在这里输入CNZZ，51，百度等统计代码)</td>
        </tr>
        	<tr>
				<td height="40">&nbsp;</td>
				<td><input name="button" type="submit" value="保存配置" class="button" /></td>
        	</tr>
        </table>
	</form>
	</div>
</div>
</body>
</html>