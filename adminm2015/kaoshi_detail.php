
<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';

if ($_SESSION['admin_user']=='') header("location:login.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" >
<title></title>
<link rel=Stylesheet href=stylesheet.css>

 
<?php
if ($id=='')
 {  Msg('非法参数','back');
	}
//$id=$id+1;
$query=mysql_query('select * from kaochang,user where kaochang.k_shenfenzheng=`user`.u_zj_num and k_id='.$id,$conn);
if (mysql_num_rows($query)>0){
	$row=mysql_fetch_array($query);
	 
	
	$k_xingming=$row['k_xingming'];
	$k_xingbie=$row['k_xingbie'];
	$k_kaoshenghao=$row['k_kaoshenghao'];
	$k_kaoheshijian=$row['k_kaoheshijian'];
	$k_kaohekemu=$row['k_kaohekemu'];
	$k_kaochang=$row['k_kaochang'];
    $k_kaoshishishi=$row['k_kaoshishishi'];
	$k_kaoshishishi=$row['k_kaoshishishi'];
	$k_kaoshibianpai=$row['k_kaoshibianpai'];
    $k_zuoweihao=$row['k_zuoweihao'];
	$k_shenfenzheng=$row['k_shenfenzheng'];

	$k_img=$row['u_image'];

//	$k_img=RsField('select u_image as CstrField from user  where not ISNULL(u_image) and u_zj_num='.$row['k_shenfenzheng']);
	

}
?>
</head>

<body>
<style type="text/css">
.content{width:750px;border:1px solid #000; margin:0 auto;}
.ch{height:450px;}
.ch h1{ width:100%; display:block; height:26px; line-height:26px; font-size:12px; text-align:center; font-weight:100;}
.ch h2{width:100%; display:block; height:26px; line-height:26px;text-align:center; margin:0;}
.cleft{ width:364px; border-right:1px solid #000; float:left;}
.c01{ width:208px; height:155px; float:left; margin-left:20px;}
.c01 p input{ width:94px; border:0; border-bottom:1px solid #000;}
.ch img{ width:120px; height:134px; float:right; margin-right:15px; margin-top:15px;}
.c02{ width:340px; height:200px; float:left; margin-left:20px;}
.c02 p input{ width:170px;border:0; border-bottom:1px solid #000;}
.cright{ width:365px;float:left;}
</style>
<div class="content ch">
<div class="cleft ch">
<h1> 2015年广东省三二分段转段考核准考证存根 </h1>
<h2> 存     根  </h2>
<div class="c01">
<p>姓名：<input name="" type="text" value="<?php echo $k_xingming?>" /></p>
<p>性别：<input name="" type="text" value="<?php echo $k_xingbie?>"/></p>
<p>考生号：<input name="" type="text" value="<?php echo $k_kaoshenghao?>"/></p>
<p>技能考核科目：<input name="" type="text" value="<?php echo $k_kaohekemu?>"/></p>
</div>

<img src="/<?php echo $k_img?>"  />
<div class="c02">
<p>技能考核时间:<input name="" type="text" value="<?php echo $k_kaoheshijian?>"/></p>

<p>技能考核考场：<input name="" type="text" value="<?php echo $k_kaochang?>"/></p>
<p>考试教室地点：<input name="" type="text" value="<?php echo $k_kaoshishishi?>"/></p>
<p>考试编排：<input name="" type="text" style="width:90px;" value="<?php echo $k_kaoshibianpai?>" />座位号：<input name="" type="text" style="width:90px;" value="<?php echo $k_zuoweihao?>" /></p>
<p>身份证号码：<input name="" type="text" value="<?php echo $k_shenfenzheng?>" /></p>
</div>
</div>

<div class="cright ch">
<h1> 2015年广东省三二分段转段考核准考证 </h1>
<h2> 准  考  证 </h2>
<div class="c01">
<p>姓名：<input name="" type="text" value="<?php echo $k_xingming?>" /></p>
<p>性别：<input name="" type="text" value="<?php echo $k_xingbie?>"/></p>
<p>考生号：<input name="" type="text" value="<?php echo $k_kaoshenghao?>"/></p>
<p>技能考核科目：<input name="" type="text" value="<?php echo $k_kaohekemu?>"/></p>
</div>

<img src="/<?php echo $k_img?>"  />
<div class="c02">
<p>技能考核时间:<input name="" type="text" value="<?php echo $k_kaoheshijian?>"/></p>
<p>技能考核考场：<input name="" type="text" value="<?php echo $k_kaochang?>"/></p>
<p>考试教室地点：<input name="" type="text" value="<?php echo $k_kaoshishishi?>"/></p>
<p>考试编排：<input name="" type="text" style="width:90px;" value="<?php echo $k_kaoshibianpai?>" />座位号：<input name="" type="text" style="width:90px;" value="<?php echo $k_zuoweihao?>" /></p>
<p>身份证号码：<input name="" type="text" value="<?php echo $k_shenfenzheng?>" /></p>
</div>
</div>

</div>
 



<style media="print">.Noprint { DISPLAY: none }</style>
<OBJECT id=WebBrowser classid=CLSID:8856F961-340A-11D0-A96B-00C04FD705A2 width=0 
height=0 VIEWASTEXT></OBJECT>

<CENTER class=noprint><INPUT onclick=document.all.WebBrowser.ExecWB(6,1) value=打印 type=button> 
<INPUT onclick=document.all.WebBrowser.ExecWB(6,6) value=直接打印 type=button> <INPUT onclick=document.all.WebBrowser.ExecWB(8,1) value=页面设置 type=button> <INPUT onclick=document.all.WebBrowser.ExecWB(7,1) value=打印预览 type=button>&nbsp;<INPUT onclick=javascript:window.close() value=关闭窗口 type=button> 
<BR>说明：本打印功能需要允许使用ActiveX控件，如果不能打印，请使用菜单："文件"--&gt;"打印" 
</CENTER>

</body>
</html>