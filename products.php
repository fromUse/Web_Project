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
<link rel="stylesheet" href="css/products.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script type="text/javascript" src="inc/products.js"></script>
</head>
<body>
<?php
$search_key=ReStr2($_GET['search_key']);
if ($cid=='' && $search_key=='') $cid=RsField('select p_id from '.$language.'_products_class where p_sid=0 and p_tid=0 order by p_order,p_id limit 0,1');
if ($cid!=''){
$query=mysql_query('select * from '.$language.'_products_class where p_id='.$cid,$conn);
if (mysql_num_rows($query)>0){
	$row=mysql_fetch_array($query);
	if ($row['p_sid']==0 && $row['p_tid']==0){
		$cid=$row['p_id'];
	}
	elseif ($row['p_sid']!=0 && $row['p_tid']==0){
		$cid=$row['p_sid'];
		$sid=$row['p_id'];
	}
	else {
		$cid=$row['p_sid'];
		$sid=$row['p_tid'];
		$tid=$row['p_id'];
	}
	$class_name=$row['p_name'];
}
}
?>
<div id="main">
	<?php require 'header.php'?>
	<div id="content">
		<div id="left"><?php require 'left.php'?> </div>
		<div id="right">
         <form name="form1" method="post" action="checkout.php">
        	<?php
			$str='';
			 
			if ($search_key==''){
				if ($cid==''){
					$str.='<p id="title"></p>';
					$page_sql='select * from '.$language.'_products order by p_id desc';
				}
				else{
					$str.='<p id="title">'.$class_name.' &nbsp;&nbsp;&nbsp;现在时间是'.date('Y-m-d H:i:s',time()).'</p>';
					$page_sql='select * from '.$language.'_products where p_class='.$cid.' order by p_order,p_id desc';
				}
			}
			else{
				$str.='<p id="title">搜索 </span></p>';
				$page_sql="select * from {$language}_products where p_name like '%$search_key%' order by p_id desc";
			}
			$page_size=10;
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size",$conn);
			if (mysql_num_rows($query)==0){
				$str.=NoData();
			}
			else{
				if ($_GET['cid']!='') $cid=$_GET['cid'];
				$str.='<div id="products_blk">';
				$str.='<div id="products">';
				while($row=mysql_fetch_array($query)){
					$str.='<dl>';
				 
				 
					$str.='<strong class="products_list_name">等级考试名称：'.$row['p_name'].'</strong>';
					
					$str.='<span style="float:right">';	
						 if (strtotime($row['p_date1']) > strtotime(date('Y-m-d H:i:s',time())))
						 {
							 if ($user==''){
								$str.='<a href="login.php" style="color:#000;">立即报名</a>';
							}
							else {
				 				if (RsField('select u_image from user where u_id='.$user_id)=='')
								{
								$str.='<a href="user_info.php"><strong>请完善资料之后报名</strong></a>';
								}else
								{
			 $query2=mysql_query('select * from orders where o_user_id='.$user_id.' and o_products='.$row['p_id'],$conn);
								   if (mysql_num_rows($query2)==0){
									 
									$str.='<input name="立即报名" type="submit" value="立即报名"/><input name="id" type="hidden" value="'.$row['p_id'].'" /> 
								<input name="act" type="hidden" value="baoming" />  ';
									}
									else
									{
									$str.='您已经报名了';
									}
								}
							}
						 }
						  else
						 {
						 $str.='<a  style="color:#fa000c;">已经截止报名</a> ';
						 }
						$str.='</span>';	
					
					
					$str.='报名截止时间：'.date('Y-m-d',strtotime($row['p_date1'])).'&nbsp;&nbsp;&nbsp;考试时间：'.date('Y-m-d',strtotime($row['p_date'])).'&nbsp;&nbsp;&nbsp;报考费用：'.$row['p_price'].'元';
					$str.='<br>考试要求：<p class="products_list_desc">'.CutStr($row['p_desc'],70).'</p>';
				   $str.='<br>等级:
				   <select name="p_class" "><option value="">请选择</option>';
					$query=mysql_query('select * from dz_dengji  order by p_id');
					if(mysql_num_rows($query)>0){
					while($row=mysql_fetch_array($query)){
						$str.='<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>';
					}
					}
					 $str.=' </select>
				   
				   类别：<select name="p_class" "><option value="">请选择</option>';
					$query=mysql_query('select * from dz_leibie  order by p_id');
					if(mysql_num_rows($query)>0){
					while($row=mysql_fetch_array($query)){
						$str.='<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>';
					}
					}
					 $str.=' </select>';
					$str.='</dd>';
					$str.='</dl>';
				}
				$str.='<div class="clear"></div>';
				$str.='</div>';
				$str.='</div>';
				if ($page_count>1) $str.='<div id="products_page">'.ShowPage3($page,$page_count,$language).'</div>';
			}
			echo $str;
			?>
            </form>
        </div>
		<div class="clear"></div>
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>