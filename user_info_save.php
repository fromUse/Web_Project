 
<?php

require 'conn.php';
require 'config.php';
require 'inc/function.php';
require 'uploadfontion.php';






if ($user=='') Msg('','login.php');
if ($_POST['act']=='user_info'){
	
	$u_name=ReStr($_POST['u_name']);
	$u_sex=ReStr($_POST['u_sex']);
	$u_tel=ReStr($_POST['u_tel']);
	$u_qq=ReStr($_POST['u_qq']);
	$u_address=ReStr($_POST['u_address']);
	$u_stu_num=ReStr($_POST['u_stu_num']);
	$u_birth=ReStr($_POST['u_birth']);
	$u_minzu=ReStr($_POST['u_minzu']);
	$u_zj_type=ReStr($_POST['u_zj_type']);
	$u_zj_num=ReStr($_POST['u_zj_num']);
	$u_zj_num=ReStr($_POST['u_zj_jjz']);
	$u_email=ReStr($_POST['u_email']);
	$u_huji=ReStr($_POST['u_huji']);
	$u_zzmm=ReStr($_POST['u_zzmm']);
	$u_xueli=ReStr($_POST['u_xueli']);
	$u_zhiye=ReStr($_POST['u_zhiye']);
	$u_zhicheng=ReStr($_POST['u_zhicheng']);
	$u_work=ReStr($_POST['u_work']);
	$u_code=ReStr($_POST['u_code']);
	 
	 
	$sql="update user set 
	u_name='$u_name',
	u_sex='$u_sex',
	u_tel='$u_tel',
	u_qq='$u_qq',
	u_address='$u_address',
	u_stu_num='$u_stu_num',
	u_birth='$u_birth',
	u_work='$u_work',
	u_zhiye='$u_zhiye',
	u_minzu='$u_minzu',
	u_zj_type='$u_zj_type',
	u_zj_num='$u_zj_num',
	u_zj_jjz='$u_zj_jjz',
	u_email='$u_email',
	u_huji='$u_huji',
	u_zzmm='$u_zzmm',
	u_xueli='$u_xueli',
	u_zhicheng='$u_zhicheng',
	u_code='$u_code'
	 
	
	where u_id=$user_id";
	 
	mysql_query($sql) or die(mysql_error($sql));

	Msg('','index.php?act=mydata');
}
?>
 
   <div id="user_right">
      <p id="user_title">个人资料</p>
              <?php
				$query=mysql_query('select * from user where u_id='.$user_id);
				$row=mysql_fetch_array($query);
				?>
           <style type="text/css">
		  select{ border:1px solid #CCC; width:135px;}
		   </style>
        <form name="form1" method="post" action="user_info.php" onsubmit="return CheckUserInfo(this)">
        
          <input type="hidden" name="act" value="user_info" />
        
      <table width="700" border="0" align="center" cellpadding="0" cellspacing="0"  class="reg">
  <tr>
    <td width="100" align="right">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</td>
    <td width="234"><?php echo $row['u_user'] ?></td>
    <td colspan="2" rowspan="6" align="center"><span style="height:260px;"><img src="<?php echo $row['u_image'] ?>" alt="" width="150" height="176" /></span></td>
    </tr>
  <tr>
    <td align="right">姓　&nbsp;名：</td>
    <td><input name="u_name" type="text"   class="inputtext" value="<?php echo $row['u_name'] ?>" size="22" maxlength="20" /></td>
    </tr>
  <tr>
    <td align="right">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</td>
    <td><input name="u_stu_num" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type="text" class="inputtext" id="u_stu_num" value="<?php echo $row['u_stu_num'] ?>" size="22" maxlength="30" /></td>
    </tr>
  <tr>
    <td align="right">姓　别：</td>
    <td><select name="u_sex">
      <option value="">请选择</option>
      <option value="1">男</option>
      <option value="2">女</option>
    </select></td>
    </tr>
  <tr>
    <td align="right">出生年月日：</td>
    <td><input class="laydate-icon inputtext" id="u_birth" name="u_birth"  value="<?php echo date("Y-m-d",time($row['u_birth']));?>" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})" size="20" placeholder="请输入日期" /></td>
    </tr>
  <tr>
    <td height="86" align="right">民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族： </td>
    <td><select name="u_minzu" id="u_minzu" >
    
      <option value="">请选择</option>
      <?php
			$str1='';
			$query1=mysql_query('select * from dz_minzu  order by p_id');
			if(mysql_num_rows($query1)>0){
			while($row1=mysql_fetch_array($query1)){
				$str1.='<option value="'.$row1['p_id'].'">'.$row1['p_name'].'</option>';
			}
			}
			echo $str1;
			?>
    </select></td>
    </tr>
  <tr>
    <td align="right">证件类型：</td>
    <td><select name="u_zj_type" id="u_zj_type">
      <option value="">请选择</option>
      <option value="0">身份证</option>
      <option value="1">军人证</option>
    </select></td>
    <td colspan="2"> 
    <a href="upload_crop_v1.2.php"><span style="display:block; width:80px; float:left; text-align:center; cursor:pointer; height:22px; line-height:22px; background:#ccc;">上传一寸照</span></a>(图片尺寸：150*210px )  </td>
    </tr>
  <tr>
    <td align="right">证件号码：</td>
    <td><input name="u_zj_num" type="text" class="inputtext" id="u_zj_num" value="<?php echo $row['u_zj_num'] ?>" size="22" maxlength="30" /></td>
    <td align="right">邮编：</td>
    <td><input name="u_code" type="text" class="inputtext" id="u_code" value="<?php echo $row['u_code'] ?>" size="10" maxlength="30" /></td>
    </tr>
  <tr>
    <td align="right">QQ号码： </td>
    <td><input name="u_qq" type="text" class="inputtext" value="<?php echo $row['u_qq'] ?>" size="22" maxlength="50" /></td>
    <td width="78" align="right">联系电话： </td>
    <td width="317"><input name="u_tel" type="text" class="inputtext" id="u_tel" value="<?php echo $row['u_tel'] ?>" size="22" maxlength="30" /></td>
  </tr>
  <tr>
    <td align="right">电子邮箱： </td>
    <td><input name="u_email" type="text" class="inputtext" value="<?php echo $row['u_email'] ?>" size="22" maxlength="50" /></td>
    <td align="right"> 政治面貌： </td>
    <td><select name="u_zzmm" id="u_zzmm">
      <option value="">请选择</option>
      <option value="0" >党员</option>
      <option value="1">团员</option>
      <option value="2">其他</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;籍： </td>
    <td><select name="u_huji" id="u_huji">
      <option value="">请选择</option>
      <option value="0">城镇</option>
      <option value="1">农村</option>
    </select></td>
    <td align="right">学历：</td>
    <td><select name="u_xueli" id="u_xueli" >
      <option value="">请选择</option>
      <?php
			$str2='';
			$query2=mysql_query('select * from dz_xueli  order by p_id');
			if(mysql_num_rows($query2)>0){
			while($row2=mysql_fetch_array($query2)){
				$str2.='<option value="'.$row2['p_id'].'">'.$row2['p_name'].'</option>';
			}
			}
			echo $str2;
			?>
    </select></td>
  </tr>
  <tr>
    <td align="right">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业：</td>
    <td><select name="u_zhiye" id="u_zhiye" >
      <option value="">请选择</option>
      <?php
			$str4='';
			$query4=mysql_query('select * from dz_zhiye  order by p_id');
			if(mysql_num_rows($query4)>0){
			while($row4=mysql_fetch_array($query4)){
				$str4.='<option value="'.$row4['p_id'].'">'.$row4['p_name'].'</option>';
			}
			}
			echo $str4;
			?>
    </select></td>
    <td align="right">职称：</td>
    <td><select name="u_zhicheng" id="u_zhicheng">
      <option value="0">请选择</option>
      <option value="1">高级</option>
      <option value="2">中级</option>
      <option value="3">初级</option>
      <option value="4">其他</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">工作单位：</td>
    <td><input name="u_work" type="text" class="inputtext" id="u_work" value="<?php echo $row['u_work'] ?>" size="22" maxlength="30" /></td>
    <td align="right">联系地址：</td>
    <td><input name="u_address" type="text" class="inputtext" value="<?php echo $row['u_address'] ?>" maxlength="300" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td colspan="3"><input type="submit" name="submit" class="button" value="保 存" /></td>
    </tr>
</table>

   
        <script type="text/javascript">document.form1.u_sex.value="<?php echo $row['u_sex']?>";</script>
          
          <script type="text/javascript">document.form1.u_minzu.value="<?php echo $row['u_minzu']?>";</script>
          <script type="text/javascript">document.form1.u_zj_type.value="<?php echo $row['u_zj_type']?>";</script>
        
          <script type="text/javascript">document.form1.u_huji.value="<?php echo $row['u_huji']?>";</script>
           <script type="text/javascript">document.form1.u_zzmm.value="<?php echo $row['u_zzmm']?>";</script>
           <script type="text/javascript">document.form1.u_xueli.value="<?php echo $row['u_xueli']?>";</script>
           <script type="text/javascript">document.form1.u_zhiye.value="<?php echo $row['u_zhiye']?>";</script>
           
        <script type="text/javascript">document.form1.u_zhicheng.value="<?php echo $row['u_zhicheng']?>";</script>
          
       
            
          
    </form>
     <div class="cls"></div>
  </div>
    

   
 
</body>
</html>