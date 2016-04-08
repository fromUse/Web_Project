<?php
$str='';
$str.='<div class="left_menu">';
$query=mysql_query('select * from '.$language.'_products_class where p_sid=0 and p_tid=0 order by p_order,p_id');
if (mysql_num_rows($query)>0){
while($row=mysql_fetch_array($query)){
	if ($cid==$row['p_id']){
		$str.='<a href="products.php?cid='.$row['p_id'].'" class="left_menu_over">'.$row['p_name'].'</a>';
	}
	else {
		$str.='<a href="products.php?cid='.$row['p_id'].'" class="left_menu_out">'.$row['p_name'].'</a>';
	}
}
}
 
$str.='</div>';	

echo $str;
?>