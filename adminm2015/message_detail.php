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
<style type="text/css">
.edit td {
	line-height:20px;
}
</style>
</head>
<body>
<?php
$query=mysql_query('select * from message where m_id='.$id);
$row=mysql_fetch_array($query);
?>
<div id="container">
  <div class="edit">
      <h1>留言管理޸</h1>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td class="edit_title">姓名：</td>
            <td><?php echo $row['m_name'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">联系电话：</td>
            <td><?php echo $row['m_tel'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">传真号码：</td>
            <td><?php echo $row['m_fax'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">电子邮箱：</td>
            <td><?php echo $row['m_email'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">公司名称：</td>
            <td><?php echo $row['m_company'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">联系地址：</td>
            <td><?php echo $row['m_address'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">留言主题：</td>
            <td><?php echo $row['m_title'] ?>&nbsp;</td>
          </tr>
		  <tr>
            <td class="edit_title">留言时间：</td>
            <td><?php echo $row['m_date'] ?>&nbsp;</td>
          </tr>
          <tr>
            <td class="edit_title">留言内容：</td>
            <td style="line-height:18px;"><?php echo $row['m_content'] ?>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
			<td><input name="button" type="button" value=" 返回 " class="button" onclick="history.back();" /></td>
          </tr>
        </table>
    </div>
</div>
</body>
</html>