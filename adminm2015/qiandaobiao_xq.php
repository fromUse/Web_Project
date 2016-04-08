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
$u_type=$_GET['type'];
switch($act){
case 'delete';
	mysql_query('delete from kaochang where k_id='.$id);
	Msg('','Referer');
	break; 
}
?>
<style type="text/css">
.qiandao{ width:135px; height:165px; float:left;}
.qiandao p{ width:22px; height:132px; float:left; text-align:center}
.qiandao img{ width:112px; height:132px; float:left;}
.view2{ width:702px; height:auto; margin:0 auto;}
.view2 h1{ width:100%; height:32px; line-height:32px; font-size:20px;}
.view2 h2{ width:100%; height:22px; line-height:22px; font-size:14px;}
.view2 h3{ width:100%; padding:10px 0;}
.view2 h1,.view2 h2,.view2 h3{ text-align:center}
</style>
<div id="container">
	<div class="view2">
		<h1>汕尾职业技术学院三二分段转段考核</h1>
        <h2>签到表</h2>
        <h3>技能考核科目：考试时间：考试教室地点：</h3>
	     
			<?php
			$page_size=30;
			$page_sql='select * from kaochang order by k_id desc';
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size");
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
				 $k_img=RsField("select u_thumb_image as CstrField from user  where u_thumb_image!='' and u_zj_num=".$row['k_shenfenzheng']);
					 
					  $str.='<div class="qiandao">'; 
					  $str.='<p>'.$row['k_xingming'].' '; 
					  $str.=''.$row['k_zuoweihao'].'</p>';
					  $str.='<img src="../'.$k_img.'"  />' ;
					  $str.='<span>签名：</span>'; 
					  $str.='</div>'; 
					 
					$page_number++;
				}
				echo $str;
			}
			else {
				$page_show=false;
			}
			?>
		</table> 
		<?php if($page_show) echo ShowPage($page,$page_size,$page_sql); ?>
	</div>
</div>
</body>
</html>