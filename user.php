<?php
$act_user=$_GET['act_user'];

 
	
switch($act_user){
case 'delete';
	mysql_query('delete from orders where o_user_id='.$user_id.' and o_status<>1 and  o_id='.$id);
	Msg('','?act=jilu');
	break;
}

?> 
<script language="javascript"> 
   function delcfm() {   
     if (!confirm("确认要删除？"))
	  {
	   window.event.returnValue = false; 
	  }  
   }</script>

 
			<p id="user_title"><span>最近报考</span></p>
			<div class="user_tbe">
				<table width="700" border="0" cellspacing="0" cellpadding="0">
				  	<tr class="user_tbe_title">
					<td width="10%">姓名</td>
					<td width="25%">报考科目</td>
					<td width="10%">等级</td>					 
					<td width="10%">类别</td>
					<td width="13%">旧省码</td>
                    <td width="13%">旧准考证号</td>
                    <td width="10%">打印</td>
                    <td width="13%">操作</td>
					 
				  	</tr>
					<?php
					$str='';
					$query=mysql_query('select * from orders where o_user='.$user_id.' order by o_id desc limit 0,10');
					if (mysql_num_rows($query)==0){
						$str.='<tr><td colspan="7"><p class="nodata">您目前还没有报考任何科目...</p></td></tr>';
					}
					else{
						while($row=mysql_fetch_array($query)){
							$str.='<tr>';
							$str.='<td>'.RsField('select u_name from user where u_id='.$row['o_user']).'</td>';
							$str.='<td>'.RsField('select p_name from cn_products where p_id='.$row['o_products']).'</td>';							
							$str.='<td>'.RsField('select p_name from dz_dengji where p_id='.$row['o_dengji']).'</td>';							 
							$str.='<td>'.RsField('select p_name from dz_leibie where p_id='.$row['o_leibie']).'</td>';
							$str.='<td>'.RsField('select p_name from dz_shengma where p_zhi='.$row['shengma']).'</td>';
							$str.='<td>&nbsp;'.$row['old_zkz'].'</td>';
							$str.='<td><a href="print.php?id='.$row['o_id'].'">打印</a></td>';
							//$str.='<td></td>';
							if($row['o_status']==1){
								
							$str.='<td>已交费</td>';
							}else
							{$str.='<td><a href="?act_user=delete&act=jilu&id='.$row['o_id'].'" class="a" onClick="delcfm()">取消报名</a><br></td>';
								}
							$str.='</tr>';
						}
					}
					echo $str;
					?>
				</table>
			</div>
 