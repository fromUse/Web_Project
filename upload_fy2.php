<?php
session_start();
header('Content-type: text/html;charset=UTF-8');
require 'inc/function.php';
if ($_SESSION['admin_user']=='') exit();

$upfile_success=0;
$upfile_dir='uploadfiles/';
$upfile_type_mime='image/gif|image/jpeg|image/pjpeg|image/png|image/x-png|image/gif|application/x-zip-compressed|application/octet-stream|application/vnd.ms-powerpoint|application/vnd.ms-excel|application/msword|application/pdf';
$upfile_type_mime.='|application/vnd.openxmlformats-officedocument.wordprocessingml.document';
$upfile_type_mime.='|application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
$upfile_type_mime.='|application/vnd.openxmlformats-officedocument.presentationml.presentation';
$upfile_type_ext='gif|jpg|jpeg|png|gif|zip|rar|ppt|xls|pdf|pptx|xlsx|docx';
$upfile_maxsize=10*1024*1024;

if ($_POST['submit']=='上传'){
	if (is_uploaded_file($_FILES['file_name']['tmp_name'])){
		$upfile=$_FILES['file_name'];
		$upfile_name=$upfile['name'];
		$upfile_type=$upfile['type'];
		$upfile_size=$upfile['size'];
		$upfile_tmp_name=$upfile['tmp_name'];
		$upfile_error=$upfile['error'];
		$upfile_ext=substr($upfile_name,strripos($upfile_name,'.')+1);
		//Msg($upfile_type,'');
		switch($upfile_error){
		case 0:
			$upfile_success=1;
			$upfile_error_str='文件上传成功！文件大小：'.(round($upfile_size/1024,2)).'KB';
			break;
		case 1:
			$upfile_error_str='文件上传失败：文件大小超过限制！';
			break;
		case 2:
			$upfile_error_str='文件上传失败：文件大小超过限制，最大只能上传10MB的文件！';
			break;
		case 3:
			$upfile_error_str='文件上传失败：文件只有部分上传！';
			break;
		case 4:
			$upfile_error_str='文件上传失败：文件没有被上传！';
			break;
		case 5:
			$upfile_error_str='文件上传失败：文件大小为0！';
			break;
		}
		if (stripos($upfile_type_ext,$upfile_ext)===false){
			$upfile_success=0;
			$upfile_error_str='文件上传失败：该文件类型不允许上传1！';
		}
		if (stripos($upfile_type_mime,$upfile_type)===false){
			$upfile_success=0;
			$upfile_error_str='文件上传失败：该文件类型不允许上传2！';
		}
		if ($upfile_size>$upfile_maxsize){
			$upfile_success=0;
			$upfile_error_str='文件上传失败：文件大小超过限制，最大只能上传10MB的文件！';
		}
		if ($upfile_success==0) Msg($upfile_error_str,'Back');
		if ($upfile_success==1){
			//$upfile_ext=pathinfo($upfile_name,PATHINFO_EXTENSION);
			if ($_POST['file_type']==0) $upfile_name=File_RandomCode().'.'.$upfile_ext;
			if ($_POST['file_type']==1){
				if (file_exists(iconv('utf-8','GB2312',$upfile_dir.$upfile_name))){
					$upfile_name=substr($upfile_name,0,strripos($upfile_name,'.')).'['.mt_rand(10,100).'].'.$upfile_ext;
				}
			}
			move_uploaded_file($upfile_tmp_name,iconv('utf-8','GB2312',$upfile_dir.$upfile_name));
		}
	}
	else{
		Msg('文件上传失败！','Back');
	}
}

function File_RandomCode(){
	$frc_date=getdate();
	$frc_year=$frc_date['year'];
	$frc_mon=$frc_date['mon'];
	$frc_day=$frc_date['mday'];
	$frc_hours=$frc_date['hours'];
	$frc_minutes=$frc_date['minutes'];
	$frc_seconds=$frc_date['seconds'];
	if ($frc_mon<10) $frc_mon='0'.$frc_mon;
	if ($frc_day<10) $frc_day='0'.$frc_day;
	if ($frc_hours<10) $frc_hours='0'.$frc_hours;
	if ($frc_minutes<10) $frc_minutes='0'.$frc_minutes;
	if ($frc_seconds<10) $frc_seconds='0'.$frc_seconds;
	
	return $frc_year.$frc_mon.$frc_day.'_'.$frc_hours.$frc_minutes.$frc_seconds;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body {
	margin:0px;
	padding:0px;
	font-size:12px;
}
input {
	font-size:12px;
}
p {
	height:25px;
	line-height:25px;
	background:#E1F4EE;
}
-->
</style>
<script type="text/javascript">
function check(){
	var strFileName=document.form1.file_name.value;
	if (strFileName==""){
    	alert("请选择要上传的文件");
		document.form1.file_name.focus();
    	return false;
  	}
}
</script>
</head>
<body style="background:transparent;">
<?php if ($upfile_success==1){
	echo '<p>'.$upfile_error_str.'</p><script type="text/javascript">parent.document.getElementById("'.$_POST['file_id'].'").value="'.$upfile_dir.$upfile_name.'";</script>';
}
else{
?>
<form action="upload_fy.php" method="post" name="form1" onSubmit="return check()" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $upfile_maxszie ?>" />
<input type="file" name="file_name" size="35" style="100%" />
<input type="submit" name="submit" value="上传" />
<input name="file_type" type="hidden" value="<?php echo $_GET['file_type'] ?>" />
<input name="file_id" type="hidden" value="<?php echo $_GET['file_id'] ?>" />
</form>
<?php } ?>
</body>
</html>