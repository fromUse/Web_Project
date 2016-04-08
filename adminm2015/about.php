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
<script type="text/javascript" src="../fy_ckeditor/ckeditor.js"></script>
</head>
<body>
<?php
switch($id){
case 1:
	$title='联系我们';
	break;
case 2:
	$title='诚聘英才';
	break;
case 12:
	$title='联系方式(底部)';
	break;
}
if ($act=='modify'){
	$a_content=ReStra($_POST['a_content']);
	$sql="update ".$language."_about set a_content='$a_content' where a_id=$id";
	mysql_query($sql) or die(mysql_error($sql));
	Msg('','PageUrl');
}

$query=mysql_query('select * from '.$language.'_about where a_id='.$id);
$row=mysql_fetch_array($query);
?>
<div id="container">
	<div class="edit">
      <h1><?php echo $title ?></h1>
      <form name="form1" method="post" action="?act=modify&id=<?php echo $id ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		 <tr>
            <td><div id="edit_content"><textarea name="a_content" id="a_content"><?php echo $row['a_content'] ?></textarea><script type="text/javascript">CKEDITOR.replace('a_content',{height:430});</script></div></td>
          </tr>
          <tr>
            <td height="30"><input name="button" type="submit" value=" 修改 " class="button" /></td>
          </tr>
        </table>
      </form>
    </div>
</div>
</body>
</html>