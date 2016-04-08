<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';

$str='';
$meter=$_GET['meter'];
switch($meter){
case 'cart':
	$p_type=$_GET['type'];
	$p_quantity=$_GET['quantity'];
	if ($p_type==1){
		if (RsNum('select c_id from cart where c_user_id='.$user_id.' and c_products_type=1 and c_products_id='.$id)==0){
			mysql_query("insert into cart(c_user,c_user_id,c_products_type,c_products_id,c_products_quantity) values('$user',$user_id,1,$id,$p_quantity)");
		}
		else {
			mysql_query('update cart set c_products_quantity='.$p_quantity.' where c_user_id='.$user_id.' and c_products_type=1 and c_products_id='.$id);
		}
	}
	if ($p_type==2){
		$cart_id=RsField('select c_id from cart where c_user_id='.$user_id.' and c_products_type=2 and c_products_id='.$id);
		if ($cart_id==''){
			mysql_query("insert into cart(c_user,c_user_id,c_products_type,c_products_id,c_products_quantity) values('$user',$user_id,2,$id,1)");
			$cart_id=mysql_insert_id();
		}
		else {
			mysql_query('delete from cart_kw where c_cart_id='.$cart_id);
		}
		$p1=explode(',',$_GET['p1']);
		foreach($p1 as $p1_array){
		if ($p1_array!=''){
			$p1_array_val=explode('|',$p1_array);
			mysql_query("insert into cart_kw(c_user,c_user_id,c_cart_id,c_products2_type,c_products2_id,c_products2_quantity) values('$user',$user_id,$cart_id,1,$p1_array_val[0],$p1_array_val[1])");
		}
		}
		$p2=explode(',',$_GET['p2']);
		foreach($p2 as $p2_array){
		if ($p2_array!=''){
			$p2_array_val=explode('|',$p2_array);
			mysql_query("insert into cart_kw(c_user,c_user_id,c_cart_id,c_products2_type,c_products2_id,c_products2_quantity) values('$user',$user_id,$cart_id,2,$p2_array_val[0],$p2_array_val[1])");
		}
		}
		$p3=explode(',',$_GET['p3']);
		foreach($p3 as $p3_array){
		if ($p3_array!=''){
			$p3_array_val=explode('|',$p3_array);
			mysql_query("insert into cart_kw(c_user,c_user_id,c_cart_id,c_products2_type,c_products2_id,c_products2_quantity) values('$user',$user_id,$cart_id,3,$p3_array_val[0],$p3_array_val[1])");
		}
		}
	}
	$price=0;
	$query=mysql_query('select * from cart where c_user_id='.$user_id);
	if (mysql_num_rows($query)>0){
		$quantity=mysql_num_rows($query);
		while($row=mysql_fetch_array($query)){
			if ($row['c_products_type']==1){
				$p_price=RsField('select p_price from '.$language.'_products where p_id='.$row['c_products_id']);
				$price=$price+$row['c_products_quantity']*$p_price;
			}
			if ($row['c_products_type']==2){
				$query2=mysql_query('select * from cart_kw where c_cart_id='.$row['c_id']);
				if (mysql_num_rows($query2)>0){
				while($row2=mysql_fetch_array($query2)){
					switch($row2['c_products2_type']){
					case 1:
						$sql_kw='kw';
						break;
					case 2:
						$sql_kw='rc';
						break;
					case 3:
						$sql_kw='sc';
						break;
					}
					$p_price=RsField('select p_price from '.$language.'_products2_'.$sql_kw.' where p_id='.$row2['c_products2_id']);
					$price=$price+$row2['c_products2_quantity']*$p_price;
				}
				}
			}
		}
	}
	$str.='<p id="addcart_carts">您的购物车中共有 <span id="addcart_quantity">'.$quantity.'</span> 个商品，合计：￥<strong>'.$price.'</strong>元</p>';
	$str.='<div id="addcart_button"><input type="button" class="addcart_button1" value="继续购物" onclick="UnAddCart()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="addcart_button2" value="去购物车结算" onclick="location.href=\'cart.php\'" /></div>';
	break;
case 'cart_update':
	mysql_query('update cart set c_products_quantity='.$_GET['quantity'].' where c_user_id='.$user_id.' and c_id='.$id);
	break;
case 'dz_city';
	$str.='<select name="u_city" onchange="dz_District(this.value)">';
	$query=mysql_query('select * from dz_city where c_pid='.$id.' order by c_id');
	if (mysql_num_rows($query)==0){
		$str.='<option value="0">请选择</option>';
	}
	else{
		$str.='<option value="">请选择</option>';
		while($row=mysql_fetch_array($query)){
			$str.='<option value="'.$row['c_id'].'">'.$row['c_name'].'</option>';
		}	
	}
	$str.='</select>';
	break;
case 'dz_district';
	$str.='<select name="u_district">';
	$query=mysql_query('select * from dz_district where d_cid='.$id.' order by d_id');
	if (mysql_num_rows($query)==0){
		$str.='<option value="0">请选择</option>';
	}
	else{
		$str.='<option value="">请选择</option>';
		while($row=mysql_fetch_array($query)){
			$str.='<option value="'.$row['d_id'].'">'.$row['d_name'].'</option>';
		}
	}
	$str.='</select>';
	break;
}

echo $str;
?>