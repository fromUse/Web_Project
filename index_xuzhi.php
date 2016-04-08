<div style="padding:5px; ">
<?php
if ($id=='') $id=RsField('select a_id from '.$language.'_aboutus order by a_order,a_id limit 0,1');
$query=mysql_query('select * from '.$language.'_aboutus where a_id='.$id,$conn);
if (mysql_num_rows($query)>0){
	$row=mysql_fetch_array($query);
	$a_class=$row['a_class'];
	$a_name=$row['a_name'];
	$a_content=$row['a_content'];
	echo $a_content;
}
?>

</div>
<!--<div style=" width:700px; height:30px; position:  relative; margin-bottom:20px; text-align:center; line-height:30px;">
<a href="index.php?act=bm" style="display:block; width:100px; height:30px; margin:0 auto; background:#6fb43f; text-align:center; font-size:18px; color:#fff; font-weight:bold; position:relative; border-bottom:60px;">立即报名</a>
</div>-->