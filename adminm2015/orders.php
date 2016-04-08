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

if ($_SESSION['admin_user']<>'admin')
{
echo '你无权限进行此操作';
break;
}
switch($act){
case 'delete';
     if ($_SESSION['admin_user']<>'admin'){
		 
		 echo '你无权限进行此操作';
		 
	 }
	 else{
	mysql_query('delete from orders where o_id='.$id);
	$o_code=RsField('select o_code from orders where o_id='.$id);
	 
	Msg('','Referer');
	 }
	break;
case 'index';
      $qianzui=$_GET['qianzui'];
	$new_qianzui=RsField('select new_qianzui from cn_products where p_id='.$qianzui);
	 
   	 $kaoshinum=$new_qianzui.sprintf("%05d",RsNum('select o_id from orders where o_status=1')+1);
	mysql_query('update orders set o_status=1,o_code='.$kaoshinum.' where o_id='.$id);

	Msg('','Referer');
	break;
case 'unindex';
    // $kaoshinum='0';
	 $qianzui=$_GET['qianzui'];
	$new_qianzui=RsField('select new_qianzui from cn_products where p_id='.$qianzui);
	mysql_query("update orders set o_status=0  where o_id=".$id);
	
	
	 $sql1="update orders set o_code=''";
	 mysql_query($sql1);	

	 $tttt=RsNum('select o_id from orders where o_status=1');
	 FOR ($zkz = 1; $zkz <= $tttt; $zkz++) 
	{		
	    $qwert=$new_qianzui.sprintf("%05d",$zkz);
	    $queryqq=mysql_query("select * from orders where (o_code='' or o_code is null) and o_status=1  order by o_id desc limit 0,1",$conn);
	    if (mysql_num_rows($queryqq)>0)
            {
			$rowqq=mysql_fetch_array($queryqq);
			$minid=$rowqq['o_id'];	
	    }
	    $sql="update orders set o_code='$qwert' where o_id='$minid'";
	    mysql_query($sql);	
	}
	
	//mysql_query('update orders set o_status=0 where o_id='.$id);
	Msg('','Referer');
	break;

}

?>

<div id="container">
	<?php
	$str='';	 
		$str.='<a href="orders.php" style="color:#ff0000; font-weight:bold;">全部</a>';	 
	 
		$str.='&nbsp;&nbsp;&nbsp;<a href="orders.php?o_status=1">已经缴费</a>';
	   $str.='&nbsp;&nbsp;&nbsp;<a href="orders.php?o_status=0">未缴费</a>';
	 
	echo $str;
	?>
	<input type="text" id="search_key" class="search_input" size="30" value="<?php echo  $search_key ?>" />&nbsp;<input type="button" name="button" class="search_button" value="搜 索" onclick="location.href='?search_key='+$('search_key').value" />&nbsp;&nbsp;&nbsp;可以通过学号，用户名，姓名进行搜索查找<?php //echo $_SESSION['admin_user']?>
	<div class="view">
		<h1>报名管理</h1>
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr class="v_title">
            	<td width="4%">ID号</td>				
				<td width="5%">用户名</td>
				<td width="5%">姓名</td>
              <td width="14%">报考科目</td>
              <td width="5%">等级</td>
              <td width="6%">类别</td>
              <td width="7%">省码</td>
              <td width="7%">旧准考证号</td>
                <td width="8%">准考证号</td>               
				<td width="9%">状态</td>
                
				<td width="5%">报名时间</td>
				<td width="5%">操作</td>
        	</tr>
			<?php
			$page_size=15;
			
			$page_sql='select * from orders order by o_id desc';
			if ($_GET['o_status']!='')
				{
				$page_sql='select * from orders where o_status='.$_GET['o_status'].' order by o_id desc';
				}
			if ($search_key!=''){
		// $u_sql=RsField("select u_id from user where u_stu_num like '%{$search_key}%' or  u_user like '%{$search_key}%' or  u_zj_num like '%{$search_key}%' or u_name like '%{$search_key}%' order by u_id desc");

		$query=mysql_query("select * from user where u_stu_num like '%$search_key%' or u_name like '%$search_key%' or u_user like '%$search_key%' order by u_id desc");

		
		

		if (mysql_num_rows($query)>0)
				{
					$qwe='';
					$i==0;
                                        
				        while($rowss=mysql_fetch_array($query))
                                       {
					   $i=$i+1;
				  
					   if ($i==1)
					  {
						 $qwe.= ' o_user='.$rowss['u_id'] ;
					   }
					   else
                                          {					 
					         $qwe.=' or '.'o_user='.$rowss['u_id'] ;
					  }
					 	 
			 
				       }
					
				      $page_sql='select * from orders where '.$qwe.' order by o_id desc';
					
				}
				else
				{
					echo '没找到相关数据！';
					exit;
					}
			 
			
			}
			$page_count=GetPageCount($page_size,$page_sql);
			if ($page>$page_count) $page=$page_count;
			$page_number=($page-1)*$page_size;
			$query=mysql_query($page_sql." limit $page_number,$page_size");

		
			
			if (mysql_num_rows($query)>0){
				$str='';



				while($row=mysql_fetch_array($query))
                                {
					
					$str.='<tr onmouseover="this.className=\'view_trover\';" onmouseout="this.className=\'view_trout\';">';
					$str.='<td>&nbsp;'.$row['o_id'].' </td>';
					
					if ($row['o_user_id']==0){
						$str.='<td>匿名用户</td>';
					}
					else { 
					  $o_user0=RsField('select u_user from user where u_id='.$row['o_user']);


						$str.='<td>&nbsp;'.$o_user0.'</td>';
					}
					$str.='<td>&nbsp;<a href="print.php?id='.$row['o_id'].'" target="_blank">'.RsField('select u_name from user where u_id='.$row['o_user']).'</a></td>';
					$str.='<td>&nbsp;'.RsField('select p_name from cn_products where p_id='.$row['o_products']).'</td>';
					$str.='<td>&nbsp;'.RsField('select p_name from dz_dengji where p_id='.$row['o_dengji']).'</td>';
					$str.='<td>&nbsp;'.RsField('select p_name from dz_leibie where p_id='.$row['o_leibie']).'</td>';
					$str.='<td>&nbsp;'.RsField('select p_name from dz_shengma where p_zhi='.$row['shengma']).'</td>';
					$str.='<td>&nbsp;'.$row['old_zkz'].'</td>';
					$str.='<td>&nbsp;'.$row['o_code'].'</td>';
					
					 $str.='<td>';
					 	
					//if($row['o_status']==1){
					
					//$str.='<span style="color:#ff0000;">已缴费</span> <a href="?act=unindex&id='.$row['o_id'].'&qianzui='.$row['o_products'].'" onclick="return Confirmquxiao();">(取消付款)</a>';}else{
					//$str.='未支付 <a href="?act=index&id='.$row['o_id'].'&qianzui='.$row['o_products'].'">(确认付款)</a>';}
					 
					$str.='</td>';
					//$str.='<td>￥'.RsField('select p_price from cn_products where p_id='.$row['o_products']).'</td>';
					$str.='<td>'.date('Y-m-d',strtotime($row['o_date'])).'</td>';
					//$str.='<td> <a href="?act=delete&id='.$row['o_id'].'" onclick="return ConfirmDel();">删除</a></td>';
					$str.='</tr>';
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