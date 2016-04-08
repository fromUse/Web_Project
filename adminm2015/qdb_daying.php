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
	//mysql_query('delete from kaochang where k_id='.$id);
	//Msg('','Referer');
	break; 
}
?>
<style type="text/css">
.qiandao{ width:135px; height:165px; float:left;}
.qiandao p{ width:22px; height:132px; float:left; text-align:center;}
.qiandao img{ width:105px; height:132px; float:left;}
.qiandao span{float:left;}
.view2{ width:702px; height:auto}
.view2 h1{ width:100%; height:32px; line-height:32px; font-size:20px;}
.view2 h1{ width:100%; height:22px; line-height:22px; font-size:14px;text-align:center;}
.view2 h1 p{ width:100%;}
</style>
<div id="container">
	<div class="view2">
		<h1>汕尾职业技术学院三二分段转段考核---签到表</h1>
     	
		<?php		
			$query=mysql_query('select * from kaochang where k_kaoshibianpaiid='.$id,$conn);
			if (mysql_num_rows($query)>0){
				$row=mysql_fetch_array($query);			
					}
		?>
		
        <p>技能考核科目：<?php echo $row['k_kaohekemu'];?>考试时间：<?php echo $row['k_kaoheshijian'];?>考试教室地点：<?php echo $row['k_kaoshibianpai'];?>（<?php echo $row['k_kaoshishishi'];?>）</p>
	<br> 
			<?php
			$page_size=30;
			$page_sql='select * from kaochang,user where kaochang.k_shenfenzheng=`user`.u_zj_num and k_kaoshibianpaiid='.$id.' order by k_zuoweihao';
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size");
			if (mysql_num_rows($query)>0){
				$str='';
				while($row=mysql_fetch_array($query)){
				

					 
					  $str.='<div class="qiandao">'; 
					  $str.='<p>'.$row['k_xingming'].' '; 
					  $str.=''.$row['k_zuoweihao'].'</p>';
					  $str.='<img src="../'.$row[u_image].'"  />' ;
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