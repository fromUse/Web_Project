<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo '报名确认 - '.$site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $class_name.' - '.$site_keyword?>" />
<meta name="description" content="<?php echo $class_name.' - '.$site_description?>" />
<link rel="stylesheet" href="css/style_cn.css" type="text/css" />
<link rel="stylesheet" href="css/carta.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
</head>
<body>
<?php
if ($user=='') Msg('','login.php');
if ($_POST['act']=='add'){
	$o_user_id=ReStra($_POST['o_user_id']);
	//$o_code='swvtc'.time();
	$o_code='';
	$o_products=ReStra($_POST['o_products']);
	 $o_dengji=ReStra($_POST['o_dengji']);
	 $o_leibie=ReStra($_POST['o_leibie']);
	  $old_zkz=ReStra($_POST['old_zkz']);
	   $shengma=ReStra($_POST['shengma']);
	$o_date=date('Y-m-d H:i:s',time());
	 
	   $query2=mysql_query('select * from orders where o_user_id='.$o_user_id.' and o_products='.$o_products,$conn);
				if (mysql_num_rows($query2)==0){
		       $sql="insert into orders(o_user,o_user_id,o_products,o_date,o_code,o_dengji,o_leibie,old_zkz,shengma) 
	           values('$o_user_id','$o_user_id','$o_products','$o_date','$o_code','$o_dengji','$o_leibie','$old_zkz','$shengma')";
	 
				mysql_query($sql) or die(mysql_error($sql));
				Msg('报名成功！','index.php?act=jilu');
				   }
				  else
					 {
					 Msg('您已经报名了！','index.php?act=jilu');
				 }
	
 }
 if ($_POST['act']=='baoming'){
	 
	 if ($_POST['o_leibie']==39 and $_POST['old_zkz']=='') Msg('请填写旧准考证号或者选择旧省码！','Back');
	 if ($_POST['o_leibie']==40 and $_POST['old_zkz']=='') Msg('请填写旧准考证号或者选择旧省码！','Back');
	 if ($_POST['o_leibie']==39 or $_POST['o_leibie']==40)
	 {
	
	 $qianzui=RsField('select qianzui from cn_products where p_id='.$_POST['id']);//获取上次准考证的前缀	 
		 
	  if(!is_numeric($_POST['old_zkz'])) Msg('准考证只有数字！请填写正确的旧准考证号！','Back');
	  if  (strlen(str_replace(' ','',$_POST['old_zkz']))!=12)  Msg('准考证长度不对！请填写正确的旧准考证号！','Back');
	  if(substr($_POST['old_zkz'] , 0 , 7)!=$qianzui)Msg('请填写正确的旧准考证号！','Back');
	  
	  //验证准考证的准确性！
	  
	 }
	  
	 $id=ReStra($_POST['id']);
	 $o_dengji=ReStra($_POST['o_dengji']);
	 $o_leibie=ReStra($_POST['o_leibie']);
	 $old_zkz=ReStra($_POST['old_zkz']);
	 $shengma=ReStra($_POST['shengma']);
	 //接收报考传过来的值
 }
?>
<div id="main">
	<?php
	require 'header.php';
	 
	 
		$query=mysql_query('select * from user where u_id='.$user_id);
		$row=mysql_fetch_array($query);
		$u_name=$row['u_name'];
		$u_tel=$row['u_tel'];
		$u_stu_num=$row['u_stu_num'];
		$u_address=$row['u_address'];
		
		//读取用户信息
	?>
    <div id="content">
		<form name="form1" method="post" action="checkout.php">
		<div id="cart_address">
			<p class="cart_address_title">个人信息</p>
			<div class="cart_address_form">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="15%" align="right"><span>*</span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</td>
					<td width="85%"><?php echo $u_name ?></td>
				  </tr>
				  <tr>
					<td align="right"><span>*</span>联系电话：</td>
					<td><?php echo $u_tel ?></td>
				  </tr>
				  <tr>
					<td align="right"><span>*</span>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</td>
					<td><?php echo $u_stu_num ?></td>
				  </tr>
				  <tr>
					<td align="right"><span>*</span>报考科目：</td>
					<td>
                    
                    <input type="hidden" name="o_code"  value="<?php echo 'swvtc'.time() ?>"   />
                    <input type="hidden" name="o_user_id"  value="<?php echo $user_id ?>"   />
					<input type="hidden" name="o_products"  value="<?php echo $id ?>"   />
                    <input type="hidden" name="o_dengji"  value=" <?php echo $o_dengji ?>"   />
                    <input type="hidden" name="o_leibie"  value=" <?php echo $o_leibie ?>"   />
                     <input type="hidden" name="old_zkz"  value=" <?php echo $old_zkz ?>"   />
                      <input type="hidden" name="shengma"  value=" <?php echo $shengma ?>"   />
                    
                 
					<?php echo RsField('select p_name from '.$language.'_products where p_id='.$id)?>
                   </td>
				  </tr>
                   <tr>
					<td align="right"><span>*</span>省&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
					<td> <?php echo $shengma ?></td>
				  </tr>
                   <tr>
					<td align="right"><span>*</span>旧准考证号</td>
					<td>  <?php echo $old_zkz ?></td>
				  </tr>
                   <tr>
					<td align="right"><span>*</span>等&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;级：</td>
					<td> <?php echo RsField('select p_name from dz_dengji where p_id='.$o_dengji) ?></td>
				  </tr>
                   <tr>
					<td align="right"><span>*</span>类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
					<td> <?php echo RsField('select p_name from dz_leibie where p_id='.$o_leibie) ?></td>
				  </tr>
                  <tr>
					<td align="right"><span>*</span>温馨提示：</td>
					<td>请您尽快去班级负责人那缴纳考试相关费用，并关注考试时间！</td>
				  </tr>				 
				 
				</table>
			</div>
			 
			 
		</div>
		 
		 
		<p id="cart_button"> <input  type="submit" class="cart_button_back" value="确定报考" style="position:absolute; top:0px; right:0px;"  /></p>
		 
		<input type="hidden" name="act" value="add" />
		</form>
		 
	</div>
    <?php require 'footer.php'?>
</div>
</body>
</html>