<form name="form1" method="post" action="checkout.php">
		<?php
		$str='';
		$query=mysql_query('select * from '.$language.'_products_class where p_sid=0 and p_Tid=0 order by p_order,p_id');
		if (mysql_num_rows($query)>0){
			$col=0;
			$str.='<ul id="iproducts_menu">';
			while($row=mysql_fetch_array($query)){
				$str.='<li onmouseover="iProducts('.$col.')">'.$row['p_name'].'</li>';
				$col++;
			}
			$str.='</ul>';
			$col=0;
			mysql_data_seek($query,0);
			
			
			$str.='<div class="iproducts_blk">';
			while($row=mysql_fetch_array($query)){
				$str.='<div class="iproducts" id="iproducts_'.$col.'">';
				$query22=mysql_query('select * from '.$language.'_products where p_class='.$row['p_id'].'  order by p_id desc limit 0,6');
				if (mysql_num_rows($query22)>0){
				 
				while($row22=mysql_fetch_array($query22)){
			 
					$str.='<dl>';
					$str.='<strong class="products_list_name">等级考试名称：'.$row22['p_name'].'</strong>';
					
					$str.='<span style="float:right">';	
						 if (strtotime($row22['p_date1']) > strtotime(date('Y-m-d H:i:s',time())))
						 {
							 if ($user==''){
								$str.='<a href="login.php" style="color:#000;">立即报名</a>';
							}
							else {
				 				if (RsField('select u_image from user where u_id='.$user_id)=='')
								{
								$str.='<a href="index.php?act=mydata"><strong>请完善资料之后报名</strong></a>';
								}else
								{
			 $query23=mysql_query('select * from orders where o_user_id='.$user_id.' and o_products='.$row22['p_id'],$conn);
								   if (mysql_num_rows($query23)==0){
									 
									$str.='<input name="立即报名" type="submit" class="baoming" onclick="baoming(this.form);" value="立即报名"/>
									 <input name="id" type="hidden" value="'.$row22['p_id'].'" />';
									}
									else
									{
									$str.='您已经报名了<br><a href="index.php?act=jilu">点击查看详细</a>';
									}
								}
							}
						 }
						  else
						 {
						 $str.='<a  style="color:#fa000c;">已经截止报名</a> ';
						 }
						$str.='</span>';	
					

					
					$str.='<br>报名截止时间：'.date('Y-m-d',strtotime($row22['p_date1'])).'&nbsp;&nbsp;&nbsp;考试时间：'.date('Y-m-d',strtotime($row22['p_date'])).'&nbsp;&nbsp;&nbsp;';
					$str.='<br>考试要求：<p class="products_list_desc">'.CutStr($row22['p_desc'],70).'</p>';
					
				
				   $str.='<br><span style="float:left;position:relative; display:block;width:278px; ">等级:
				   <select name="o_dengji" class="index_select" >';
					$query3=mysql_query('select * from dz_dengji  order by p_id');
					if(mysql_num_rows($query3)>0){
					while($row3=mysql_fetch_array($query3)){
						$str.='<option value="'.$row3['p_id'].'">'.$row3['p_name'].'</option>';
					}
					}
					 $str.=' </select>
				   
				   &nbsp;&nbsp;&nbsp;类别：<select name="o_leibie" class="index_select" onchange = "showandhide(this.value)"><option value="">请选择</option>';
					$query4=mysql_query('select * from dz_leibie  order by p_id');
					if(mysql_num_rows($query4)>0){
					while($row4=mysql_fetch_array($query4)){
						$str.='<option value="'.$row4['p_id'].'">'.$row4['p_name'].'</option>';
					}
					}
					 $str.=' </select></span>';


$str.='</span></br><span   style="color:#f60707;  margin:5px 0 0 0; ">
                                        <br> 如果类别选择“只考口试”或“只考笔试”，那么一定要选择“旧省码”并填写“旧准考证号”，否则报名视为无效。</span>';

					  $str.=' <input name="id" type="hidden" value="'.$row22['p_id'].'" /> ';
				 $str.='&nbsp;&nbsp;&nbsp;</br><span id="yinchang" style="display:none; " class="yinchang">旧&nbsp&nbsp省&nbsp&nbsp码&nbsp：<select name="shengma" class="index_select">';
						$query5=mysql_query('select * from dz_shengma  order by p_id');
							if(mysql_num_rows($query5)>0){
							while($row5=mysql_fetch_array($query5)){
								$str.='<option value="'.$row5['p_zhi'].'">'.$row5['p_name'].'</option>';
							}
							}
					   $str.=' </select>';
					  
					 $str.='有保留成绩的考生填写 <br>旧准考证号:<input name="old_zkz" type="text" style="width:100px;" />有保留成绩的考生填写 </span> ';
					 
					$str.='</dd>';
					$str.='</dl>';
					 
					$cols++;
				}
				}
				$col++;
				$str.='<div class="clear"></div>';
				 
				$str.='</div>';
			}
			$str.='</div>	<input name="act" type="hidden" value="baoming" />';
			$str.='<script type="text/javascript">iProducts(0)</script>';
		}
		
		echo $str;
		?>
        </form>
         <script type="text/javascript">document.form1.shengma.value="44";</script>
          <script type="text/javascript">document.form1.o_dengji.value="41";</script>
          <script type="text/javascript">document.form1.o_leibie.value="38";</script>
        <style type="text/css">
		.yinchang{float:left; width:100%; position:relative; display:block; margin-top:5px;}
		</style>
        <script>
 function showandhide(v){
  
   if(v!=38){
    document.getElementById('yinchang').style.display = 'block';
   }
   else
   { document.getElementById('yinchang').style.display = 'none';
	   }
  
 }
</script>