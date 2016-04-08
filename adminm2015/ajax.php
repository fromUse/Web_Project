<?php
require '../conn.php';
require 'config.php';
require '../inc/function.php';

$str='';
switch($meter){
case 'ProductsClass':
	$str.='<select name="p_tid">';
	$str.='<option value="0">请选择</option>';
	$query=mysql_query('select * from '.$language.'_products_class where p_sid='.$id.' and p_tid=0 order by p_order,p_id',$conn);
	if (mysql_num_rows($query)>0){
		while($row=mysql_fetch_array($query)){
			$str.='<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>';
		}
	}
	$str.='</select>';
	break;
case 'ProSubClass':
	$str.='<select name="p_subclass" onchange="ProThdClass(this.value);">';
	$str.='<option value="0">请选择</option>';
	$query=mysql_query('select * from '.$language.'_products_class where p_sid='.$id.' and p_tid=0 order by p_order,p_id',$conn);
	if (mysql_num_rows($query)>0){
		while($row=mysql_fetch_array($query)){
			$str.='<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>';
		}
	}
	$str.='</select>';
	break;
case 'ProThdClass':
	$str.='<select name="p_thdclass">';
	$str.='<option value="0">请选择</option>';
	if ($id==0){
	}
	else{
		$query=mysql_query('select * from '.$language.'_products_class where p_sid<>0 and p_tid='.$id.' order by p_order,p_id',$conn);
		if (mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){
				$str.='<option value="'.$row['p_id'].'">'.$row['p_name'].'</option>';
			}
		}
	}
	$str.='</select>';
	break;
case 'DownSubClass':
	$str.='<select name="d_subclass">';
	$str.='<option value="0">请选择</option>';
	$query=mysql_query('select * from '.$language.'_download_class where d_fid='.$id.' order by d_order,d_id',$conn);
	if (mysql_num_rows($query)>0){
		while($row=mysql_fetch_array($query)){
			$str.='<option value="'.$row['d_id'].'">'.$row['d_name'].'</option>';
		}
	}
	$str.='</select>';
	break;
case 'orders':
	$table_name=$_GET['table_name'];
	$filed_name=substr($table_name,0,1);
	$order_val=$_GET['order_val'];
	mysql_query('update '.$language.'_'.$table_name.' set '.$filed_name.'_order='.$order_val.' where '.$filed_name.'_id='.$id);
	$str=$order_val;
	break;
}

echo $str;
?>