<script type="text/javascript" src="js/idcard.js"></script>
<?php

if ($user=='') Msg('','login.php');
if ($_POST['actt']=='user_info'){
	
	$u_email=ReStr($_POST['u_email']);
	$u_user=ReStr($_POST['u_user']);
	$u_name=ReStr($_POST['u_name']);
	$u_name_old=ReStr($_POST['u_name_old']);
	$u_zk_num=ReStr($_POST['u_zk_num']);
	$u_czby_date=ReStr($_POST['u_czby_date']);
	$u_zj_num=ReStr($_POST['u_zj_num']);
	$u_birth=ReStr($_POST['u_birth']);
	$u_sex=ReStr($_POST['u_sex']);
	$u_image=ReStr($_POST['u_image']);
	$u_address_hk=ReStr($_POST['u_address_hk']);
	$u_address_city=ReStr($_POST['u_address_city']);
	$u_address_xian=ReStr($_POST['u_address_xian']);
	$u_huji=ReStr($_POST['u_huji']);
	$u_minzu=ReStr($_POST['u_minzu']);
	$u_zzmm=ReStr($_POST['u_zzmm']);
	$u_at_school=ReStr($_POST['u_at_school']);
	$u_vocational=ReStr($_POST['u_vocational']);
	$u_applyfor=ReStr($_POST['u_applyfor']);
	$u_tel=ReStr($_POST['u_tel']);
	$u_address=ReStra($_POST['u_address']);
	$u_addressee=ReStra($_POST['u_addressee']); 
	 $u_code=ReStra($_POST['u_code']); 
	 $u_skills=ReStra($_POST['u_skills']); 
	 $u_skills_grade=ReStra($_POST['u_skills_grade']); 
	 $u_match=ReStra($_POST['u_match']); 
	 $u_match_grade=ReStra($_POST['u_match_grade']); 
	 

	 
	 $u_resume1_date_star=ReStra($_POST['u_resume1_date_star']); 
	 $u_resume1_date_end=ReStra($_POST['u_resume1_date_end']); 
	 $u_resume1_content=ReStra($_POST['u_resume1_content']); 
	 $u_resume1_position=ReStra($_POST['u_resume1_position']);
	 
	 $u_resume2_date_star=ReStra($_POST['u_resume2_date_star']); 
	 $u_resume2_date_end=ReStra($_POST['u_resume2_date_end']); 
	 $u_resume2_content=ReStra($_POST['u_resume2_content']); 
	 $u_resume2_position=ReStra($_POST['u_resume2_position']);
	 
	 $u_resume3_date_star=ReStra($_POST['u_resume3_date_star']); 
	 $u_resume3_date_end=ReStra($_POST['u_resume3_date_end']); 
	 $u_resume3_content=ReStra($_POST['u_resume3_content']); 
	 $u_resume3_position=ReStra($_POST['u_resume3_position']);
	 
	 $u_members1_name=ReStra($_POST['u_members1_name']); 
	 $u_members1_relationship=ReStra($_POST['u_members1_relationship']); 
	 $u_members1_work=ReStra($_POST['u_members1_work']); 
	 $u_members1_chief=ReStra($_POST['u_members1_chief']);
	 
	 $u_members2_name=ReStra($_POST['u_members2_name']); 
	 $u_members2_relationship=ReStra($_POST['u_members2_relationship']); 
	 $u_members2_work=ReStra($_POST['u_members2_work']); 
	 $u_members2_chief=ReStra($_POST['u_members2_chief']);
	 
	 $u_members3_name=ReStra($_POST['u_members3_name']); 
	 $u_members3_relationship=ReStra($_POST['u_members3_relationship']); 
	 $u_members3_work=ReStra($_POST['u_members3_work']); 
	 $u_members3_chief=ReStra($_POST['u_members3_chief']);      
	  
	 
	$sql="update user set 
	u_email='$u_email',
	u_user='$u_user',
	u_name='$u_name',
	u_name_old='$u_name_old',
	u_zk_num='$u_zk_num',
	u_czby_date='$u_czby_date',
	u_zj_num='$u_zj_num',
	u_birth='$u_birth',
	u_sex='$u_sex',
	u_address_hk='$u_address_hk', 
	u_address_city='$u_address_city',
	u_address_xian='$u_address_xian',
	u_huji='$u_huji',
	u_minzu='$u_minzu',
	u_zzmm='$u_zzmm',
	u_at_school='$u_at_school',
	u_vocational='$u_vocational',
	u_applyfor='$u_applyfor',
	u_tel='$u_tel',
	u_address='$u_address',
	u_addressee='$u_addressee',
	u_code='$u_code',
	u_skills='$u_skills',
	u_skills_grade='$u_skills_grade',
	u_match='$u_match',
	u_match_grade='$u_match_grade',
	u_resume1_date_star='$u_resume1_date_star',
	u_resume1_date_end='$u_resume1_date_end',
	u_resume1_content='$u_resume1_content',
	u_resume1_position='$u_resume1_position',
	
	u_resume2_date_star='$u_resume2_date_star',
	u_resume2_date_end='$u_resume2_date_end',
	u_resume2_content='$u_resume2_content',
	u_resume2_position='$u_resume2_position',
	
	u_resume3_date_star='$u_resume3_date_star',
	u_resume3_date_end='$u_resume3_date_end',
	u_resume3_content='$u_resume3_content',
	u_resume3_position='$u_resume3_position',
	
	u_members1_name='$u_members1_name',
	u_members1_relationship='$u_members1_relationship',
	u_members1_work='$u_members1_work',
	u_members1_chief='$u_members1_chief',
	
	u_members2_name='$u_members2_name',
	u_members2_relationship='$u_members2_relationship',
	u_members2_work='$u_members2_work',
	u_members2_chief='$u_members2_chief',
	
	u_members3_name='$u_members3_name',
	u_members3_relationship='$u_members3_relationship',
	u_members3_work='$u_members3_work',
	u_members3_chief='$u_members3_chief' 
	where u_id=$user_id";
	 
	mysql_query($sql) or die(mysql_error($sql));

	Msg('','?act=mydata');
}
?>
 
   <div id="user_right" style=" width:850px;">
      <p id="user_title">个人资料</p>
              <?php
				$query=mysql_query('select * from user where u_id='.$user_id);
				$row=mysql_fetch_array($query);
				?>
           <style type="text/css">
		  select{ border:1px solid #CCC; width: auto; max-width:80px;padding-left:3px; margin-left:2px;}
		   input{ width:90%; height:20px; line-height:20px;  border:1px solid #CCC; float:left; padding-left:3px; margin-left:2px;}
		  .userinput table tr,.userinput table tr td{ border:1px solid #f2f2f2; font-size:12px;}
		   </style>
       
<form name="form1" method="post" action="index.php?act=mydata" >
          <p>
            <input type="hidden" name="actt" value="user_info" />
            
          </p>
          <div class="userinput">
          <table width="850" border="0" align="center" cellpadding="0" cellspacing="0" >
             <tr>
              <td width="76" height="31" align="center">用户名</td>
              <td height="31" colspan="9" align="left"><input name="u_user" type="hidden"  value="<?php echo $row['u_user'] ?>"  id="u_name" size="10" maxlength="30" /><?php echo $row['u_user'] ?></td>
            </tr>
            <tr>
              <td width="76" height="30" align="center">考生姓名</td>
              <td width="71" height="30" align="center"><input name="u_name" type="text"  value="<?php echo $row['u_name'] ?>"     id="u_name" size="10" maxlength="30" /></td>
              <td width="70" height="30" align="center">曾用名</td>
              <td width="93" height="30" align="center"><input name="u_name_old" type="text"  value="<?php echo $row['u_name_old'] ?>"  id="u_name_old" size="10" maxlength="30" /></td>
              <td width="73" height="30" align="center">性别</td>
              <td width="172" height="30" align="center"><select name="u_sex">
                <option value="0">请选择</option>
                <option value="1">男</option>
                <option value="2">女</option>
              </select></td>
              <td width="64" height="30" align="center">&nbsp;</td>
              <td width="77" height="30" align="center">&nbsp;</td>
              
              <td height="30" colspan="2" rowspan="4" align="center"><span style="height:192px;"><a href="user_pic.php"><img src="<?php echo $row['u_thumb_image'] ?>" alt=""   height="100" /><br />相片（大一寸彩照）</a></span></td>
            </tr>
           
             <tr>
              <td height="30" align="center">身份证号</td>
              <td height="30" colspan="3" align="center"><input name="u_zj_num" type="text"  value="<?php echo $row['u_zj_num'] ?>"    id="u_zj_num" size="10" maxlength="30" /></td>
              <td height="30" align="center">出生年月</td>
              <td height="30" align="center"><input  id="u_birth" name="u_birth"  value="<?php  if ($row['u_birth']!='0000-00-00') echo date('Y-m-d',strtotime($row['u_birth'])) ?>"  placeholder="请输入日期" /></td>
              <td height="30" align="center">&nbsp;</td>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30" align="center">户口所在地</td>
              <td width="71" height="30" align="center"><input name="u_address_city" type="text"  value="<?php echo $row['u_address_city'] ?>"   id="u_address_city" size="10" maxlength="30" /></td>
              <td height="30" align="center">市</td>
              <td height="30" align="center"><input name="u_address_xian" type="text"   value="<?php echo $row['u_address_xian'] ?>"   id="u_address_xian" size="10" maxlength="30" /></td>
              <td width="73" height="30" align="center">县(市、区)</td>
              <td height="30" align="center">&nbsp;</td>
              <td height="30" align="center">&nbsp;</td>
              <td height="30">&nbsp;</td>
            </tr>
            <tr>
              <td height="30" align="center">民族</td>
              <td height="30"><select name="u_minzu" id="u_minzu" >
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
              <td height="30" align="center">                政治面貌              </td>
              <td height="30"><select name="u_zzmm" id="u_zzmm">
                <option value="">请选择</option>
                <option value="0" >党员</option>
                <option value="1">团员</option>
                <option value="2">其他</option>
              </select></td>
              <td height="30" align="center">户籍类型              </td>
              <td height="30"><select name="u_huji" id="u_huji">
                <option value="">请选择</option>
                <option value="0">城镇</option>
                <option value="1">农村</option>
              </select></td>
              <td height="30">&nbsp;</td>
              <td height="30">&nbsp;</td>
            </tr>
            
             <tr>
              <td height="30" align="center">中职学籍号</td>
              <td height="30" colspan="2" align="center"><input name="u_zk_num" type="text"    id="u_zk_num"  value="<?php echo $row['u_zk_num'] ?>"  size="10" maxlength="30" /></td>
              <td height="30" align="center">初中毕业年月</td>
              <td height="30" colspan="2" align="center"><input   id="u_czby_date" name="u_czby_date"  value="<?php  if ($row['u_czby_date']!='0000-00-00') echo $row['u_czby_date'] ?>"  placeholder="请输入日期" /></td>
              <td height="30" align="center">现就读学校</td>
              <td height="30" colspan="3" align="center"><input name="u_at_school" type="text"   value="<?php echo $row['u_at_school'] ?>"  id="u_at_school" size="10" maxlength="30" /></td>
            </tr>
            <tr>
              <td height="30" align="center">中职专业</td>
              <td height="30" colspan="2" align="center"><input name="u_vocational" type="text"   value="<?php echo $row['u_vocational'] ?>"   id="u_vocational" size="10" maxlength="30" /></td>
              <td height="30" align="center">报考专业</td>
              <td height="30" colspan="2" align="center"><input name="u_applyfor" type="text" value="<?php echo $row['u_applyfor'] ?>"   id="u_applyfor" size="10" maxlength="30" /></td>
              <td height="30" align="center">联系电话</td>
              <td height="30" colspan="3" align="center"><input name="u_tel" type="text"  value="<?php echo $row['u_tel'] ?>"  id="u_tel" size="10" maxlength="30" /></td>
            </tr>
            <tr>
              <td height="30" align="center">通信地址</td>
              <td height="30" colspan="5" align="center"><input name="u_address" type="text"  value="<?php echo $row['u_address'] ?>"  id="u_address" size="10" maxlength="30" /></td>
              <td height="30" align="center">收件人</td>
              <td height="30" align="center"><input name="u_addressee" type="text"    id="u_addressee" value="<?php echo $row['u_addressee'] ?>" size="10" maxlength="30" /></td>
              <td width="60" height="30" align="center">邮政编码</td>
              <td width="94" height="30" align="center"><input name="u_code" type="text"  value="<?php echo $row['u_code'] ?>"  id="u_code" size="10" maxlength="30" /></td>
            </tr>
            
             <tr>
              <td height="26" colspan="10" bgcolor="#CCCCCC">技能证书</td>
            </tr>
            <tr >
              <td height="30" colspan="2" align="center" >技能证书名称</td>
              <td height="30" colspan="5" align="center"><input name="u_skills" type="text"  value="<?php echo $row['u_skills'] ?>"  id="u_skills" size="10" maxlength="30" /></td>
              <td height="30" align="center">等级</td>
              <td height="30" colspan="2" align="center"><input name="u_skills_grade" type="text"   value="<?php echo $row['u_skills_grade'] ?>" id="u_skills_grade" size="10" maxlength="30" /></td>
            </tr>
            <tr>
              <td height="30" colspan="2" align="center">技能比赛名称</td>
              <td height="30" colspan="5" align="center"><input name="u_match" type="text"  value="<?php echo $row['u_match'] ?>"  id="u_match" size="10" maxlength="30" /></td>
              <td height="30" align="center">获奖等级</td>
              <td height="30" colspan="2" align="center"><input name="u_match_grade" type="text"   value="<?php echo $row['u_match_grade'] ?>"  id="u_match_grade" size="10" maxlength="30" /></td>
            </tr>
             <tr>
              <td height="26" colspan="10" bgcolor="#CCCCCC">个人简历</td>
            </tr>
            <tr>
              <td height="30" colspan="3" align="center"> 起至时间</td>
              <td height="30" colspan="5" align="center">在何地、何单位学习</td>
              <td height="30" colspan="2" align="center">担任职务</td>
            </tr>
            <tr>
              <td height="30" colspan="3" align="center">
              <input name="u_resume1_date_star" type="text" 
               value="<?php if ($row['u_resume1_date_star']!='0000-00-00') echo $row['u_resume1_date_star'];  ?>"  id="u_resume1_date_star" size="10" maxlength="30" style="width:40%; float:none" />
                -
              <input name="u_resume1_date_end" type="text" style="width:40%;float:none"   value="<?php if ($row['u_resume1_date_end']!='0000-00-00') echo $row['u_resume1_date_end'] ?>" id="u_resume1_date_end" size="10" maxlength="30" /></td>
              <td height="30" colspan="5" align="center"><input name="u_resume1_content" type="text"  value="<?php echo $row['u_resume1_content'] ?>"  id="u_resume1_content" size="10" maxlength="255" /></td>
              <td height="30" colspan="2" align="center"><input name="u_resume1_position" type="text"  value="<?php echo $row['u_resume1_position'] ?>"  id="u_resume1_position" size="10" maxlength="30" /></td>
            </tr>
            <tr>
              <td height="30" colspan="3" align="center"><input name="u_resume2_date_star" type="text"  style="width:40%; float:none"  
              value="<?php if ($row['u_resume2_date_star']!='0000-00-00') echo $row['u_resume2_date_star'] ?>"  id="u_resume2_date_star" size="10" maxlength="30" />
                -
              <input name="u_resume2_date_end" type="text"  style="width:40%; float:none" value="<?php  if ($row['u_resume2_date_end']!='0000-00-00') echo $row['u_resume2_date_end'] ?>"  id="u_resume2_date_end" size="10" maxlength="30" /></td>
              <td height="30" colspan="5" align="center"><input name="u_resume2_content" type="text"  value="<?php echo $row['u_resume2_content'] ?>"  id="u_resume2_content" size="10" maxlength="255" /></td>
              <td height="30" colspan="2" align="center"><input name="u_resume2_position" type="text"  value="<?php echo $row['u_resume2_position'] ?>"   id="u_resume2_position" size="10" maxlength="30" /></td>
            </tr>
            <tr>
              <td height="30" colspan="3" align="center"><input name="u_resume3_date_star"  style="width:40%; float:none" type="text"  value="<?php if ($row['u_resume3_date_star']!='0000-00-00') echo $row['u_resume3_date_star'] ?>"  id="u_resume3_date_star" size="10" maxlength="30" />
                -
              <input name="u_resume3_date_end" type="text"  style="width:40%; float:none"   id="u_resume3_date_end" size="10" value="<?php if ($row['u_resume3_date_end']!='0000-00-00')  echo $row['u_resume3_date_end'] ?>"  maxlength="30" /></td>
              <td height="30" colspan="5" align="center"><input name="u_resume3_content" type="text"  value="<?php  echo $row['u_resume3_content'] ?>"  id="u_resume3_content" size="10" maxlength="255" /></td>
              <td height="30" colspan="2" align="center"><input name="u_resume3_position" type="text"   value="<?php echo $row['u_resume3_position'] ?>" id="u_resume3_position" size="10" maxlength="30" /></td>
            </tr>
             <tr>
              <td height="26" colspan="10" bgcolor="#CCCCCC">主要家庭成员</td>
            </tr>
            <tr>
              <td rowspan="4" align="center">主要家<br />
              庭成员</td>
              <td height="30" align="center">姓 名</td>
              <td height="30" align="center">关 系</td>
              <td height="30" colspan="5" align="center">单           位</td>
              <td height="30" colspan="2" align="center">职   务</td>
            </tr>
            <tr>
              <td height="30" align="center"><input name="u_members1_name" type="text"  value="<?php echo $row['u_members1_name'] ?>"  id="u_members1_name" size="10" maxlength="30" /></td>
              <td height="30" align="center"><input name="u_members1_relationship" type="text"  value="<?php echo $row['u_members1_relationship'] ?>"  id="u_members1_relationship" size="10" maxlength="30" /></td>
              <td height="30" colspan="5" align="center"><input name="u_members1_work" type="text"   value="<?php echo $row['u_members1_work'] ?>" id="u_members1_work" size="10" maxlength="255" /></td>
              <td height="30" colspan="2" align="center"><input name="u_members1_chief" type="text"   value="<?php echo $row['u_members1_chief'] ?>" id="u_members1_chief" size="10" maxlength="30" /></td>
            </tr>
            <tr>
              <td height="30" align="center"><input name="u_members2_name" type="text"   value="<?php echo $row['u_members2_name'] ?>"  id="u_members2_name" size="10" maxlength="30" /></td>
              <td height="30" align="center"><input name="u_members2_relationship" type="text"   value="<?php echo $row['u_members2_relationship'] ?>"  id="u_members2_relationship" size="10" maxlength="30" /></td>
              <td height="30" colspan="5" align="center"><input name="u_members2_work" type="text"   value="<?php echo $row['u_members2_work'] ?>"  id="u_members2_work" size="10" maxlength="255" /></td>
              <td height="30" colspan="2" align="center"><input name="u_members2_chief" type="text"   value="<?php echo $row['u_members2_chief'] ?>"  id="u_members2_chief" size="10" maxlength="30" /></td>
            </tr>
            <tr>
              <td height="30" align="center"><input name="u_members3_name" type="text"  value="<?php echo $row['u_members3_name'] ?>"   id="u_members3_name" size="10" maxlength="30" /></td>
              <td height="30" align="center"><input name="u_members3_relationship" type="text"    value="<?php echo $row['u_members3_relationship'] ?>" id="u_members3_relationship" size="10" maxlength="30" /></td>
              <td height="30" colspan="5" align="center"><input name="u_members3_work" type="text"   value="<?php echo $row['u_members3_work'] ?>"  id="u_members3_work" size="10" maxlength="255" /></td>
              <td height="30" colspan="2" align="center"><input name="u_members3_chief" type="text"   value="<?php echo $row['u_members3_chief'] ?>"  id="u_members3_chief" size="10" maxlength="30" /></td>
            </tr>
            <tr>
              <td height="109" align="center">个人诚<br />
              信承诺</td>
              <td height="109" colspan="9" align="right"> <p style="line-height:22px; padding:5px;"> 本人已仔细阅读《汕尾职业技术学院2015年对口中职学校自主招生三二分段转段考核工作方案》，符合报名条件，现郑重承诺：一、报名所提供的个人信息真实、准确、完整，不弄虚作假，不伪造和使用假证明、假证书，如因个人信息错误、失真、缺失造成不良后果，责任由本人承担。二、自觉服从考场工作人员和监考老师的管理，自觉遵守考试纪律和考场规则，考试诚实守信，不违规，不作弊。<br />
              </p>
              <p style="padding-right:50px;line-height:22px;">考生签名：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 年&nbsp;&nbsp; &nbsp;&nbsp;月 &nbsp;&nbsp;&nbsp;&nbsp;日</p></td>
            </tr>
            <tr>
              <td height="84" align="center">考生所在<br />
              学校意见</td>
              <td height="84" colspan="9" align="center"><p style="line-height:22px;"><br />
负 责 人：<br />
联系电话：<br />
二〇一  年   月   日（学校盖章）</p> </td>
            </tr>
            <tr>
              <td height="98" colspan="10"><p style=" line-height:22px; padding:5px;">备注： 1.推荐意见栏中，若中职学校或单位同意见推荐，请批注：情况属实，同意推荐。<br />
2.寄送的纸质报名材料：三二分段转段考核报名表、有效期内的二代身份证正反面复印件、户口本户主页及本人页复印件、中考录取或入学名册复印件，上述材料（除均录取名册外）用A4纸打印或复印，由考生所在中职学校统一收集寄送到我院，凡在6月2日前前尚未送抵，则视为放弃报名资格。<br />
3.学院联系方式：0660-3386864，地址：广东省汕尾市城区文德路汕尾职业技术学院招生办公室。</p></td>
            </tr>
              <tr>
              <td height="98" colspan="10"><input type="submit" name="submit" style="float:left" class="button" onClick="myclick()" value="保 存" />
              
             
              <a href="print.php?id=<?php echo $row['u_id'] ?>" target="_blank" onclick="CheckReg(this.form);"  style="width:60px; height:22px; margin-left:50px; text-align:center; line-height:22px; float:left; display:block; background:#0CF">打印 </a>
              
              </td>
            </tr>
          </table>
          </div>
<p>&nbsp;</p><p id="u_name">&nbsp;</p>
 
       <script type="text/javascript">document.form1.u_sex.value="<?php echo $row['u_sex']?>";</script>
       <script type="text/javascript">document.form1.u_minzu.value="<?php echo $row['u_minzu']?>";</script>
       <script type="text/javascript">document.form1.u_zzmm.value="<?php echo $row['u_zzmm']?>";</script>
       <script type="text/javascript">document.form1.u_huji.value="<?php echo $row['u_huji']?>";</script>
     <script type="text/javascript">
			function CheckReg(ObjForm){
				var Reg=/^\w{5,30}$/;
				if (ObjForm.u_name.value==""){
					alert("请输入用户名！");
					ObjForm.u_name.focus();
					return;
				}
				 
				ObjForm.submit();
			}
			</script>     
         
    <script>
var u_czby_date = {
    elem: '#u_czby_date', 
};
var u_birth = {
    elem: '#u_birth', 
};

var u_resume1_date_star = {
    elem: '#u_resume1_date_star',
	 
    choose: function(datas){
         u_resume1_date_end.min = datas; //开始日选好后，重置结束日的最小日期
         end.u_resume1_date_star = datas //将结束日的初始值设定为开始日
    }
};
var u_resume1_date_end = {
    elem: '#u_resume1_date_end', 
    choose: function(datas){
        u_resume1_date_star.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
//-------------
var u_resume2_date_star = {
    elem: '#u_resume2_date_star',
	 
    choose: function(datas){
         u_resume2_date_end.min = datas; //开始日选好后，重置结束日的最小日期
         end.u_resume2_date_star = datas //将结束日的初始值设定为开始日
    }
};
var u_resume2_date_end = {
    elem: '#u_resume2_date_end', 
    choose: function(datas){
        u_resume2_date_star.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
//-------------
var u_resume3_date_star = {
    elem: '#u_resume3_date_star',
	 
    choose: function(datas){
         u_resume3_date_end.min = datas; //开始日选好后，重置结束日的最小日期
         end.u_resume3_date_star = datas //将结束日的初始值设定为开始日
    }
};
var u_resume3_date_end = {
    elem: '#u_resume3_date_end', 
    choose: function(datas){
        u_resume3_date_star.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
laydate(u_resume1_date_star);
laydate(u_resume1_date_end);
laydate(u_resume2_date_star);
laydate(u_resume2_date_end);
laydate(u_resume3_date_star);
laydate(u_resume3_date_end);


laydate(u_czby_date);
laydate(u_birth);

 
 
</script>       
          
    </form>
     <div class="cls"></div>
  </div>
    

   
 
</body>
</html>