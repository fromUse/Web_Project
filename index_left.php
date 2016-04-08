<?php		if ($user==''){ ?>

<div id="reg_left">
			<p id="reg_title1">考生登录</p>
			<div class="reg">
				<form action="index.php" method="post" name="form2" onsubmit="return CheckLogin(this)">
				<table class="tbe" width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="35%" align="right">用 户 名：</td>
					<td width="72%"><input type="text" name="u_user" class="inputtext" style="width:130px;" size="50" maxlength="30" /></td>
				  </tr>
				  <tr>
					<td style="padding:0px 5px 6px 5px;">&nbsp;</td>
					<td style="padding:0px 5px 6px 5px;"><span>姓名、身份证号码和用户名都可以登录</span></td>
				  </tr>
				  <tr>
					<td style="padding:0px 5px 6px 5px;">&nbsp;</td>
					<td style="padding:0px 5px 6px 5px;">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="right">登录密码：</td>
					<td><input type="password" name="u_pass" class="inputtext" size="50" style="width:130px;"  maxlength="30" /></td>
				  </tr>
				  <tr>
					<td style="padding:0px 5px 6px 5px;">&nbsp;</td>
					<td style="padding:0px 5px 6px 5px;"><span>请输入登录密码</span></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td><br /><input type="checkbox" name="u_auto" value="1" style="vertical-align:middle;" /> 自动登录</td>
				  </tr>
				  <tr>
					<td colspan="2" align="center"><br /><input type="submit" name="button" class="button" value="登 录" />
					  &nbsp;
                    <a href="index.php?act=reg" style="font-size:18px; padding:3px 5px; text-align:center; line-height:30px;" > 注册</a><br><br><a href="forget.php" target="_blank" style="font-size:12px;">找回密码</a></td>
				  </tr>
				</table>
                <input type="hidden" name="backurl" value="<?php echo $_SERVER['HTTP_REFERER'] ?>" />
                <input type="hidden" name="act" value="login" />
				</form>
			</div>
			<script type="text/javascript">
			function CheckLogin(ObjForm){
				//var Reg=/^[a-zA-Z0-9@_.-]{5,30}$/;
				if (ObjForm.u_user.value==""){
					alert("请输入用户名！");
					ObjForm.u_user.focus();
					return false;
				}
				//if (!Reg.test(ObjForm.u_user.value)){
//					alert("非法的用户名！");
//					ObjForm.u_user.value="";
//					ObjForm.u_user.focus();
//					return false;
//				}
				if (ObjForm.u_pass.value==""){
					alert("请输入密码！");
					ObjForm.u_pass.focus();
					return false;
				}
				if (!Reg.test(ObjForm.u_pass.value)){
					alert("非法的密码！");
					ObjForm.u_pass.value="";
					ObjForm.u_pass.focus();
					return false;
				}
			}
			</script>
		</div>


<?php 	}	else { ?>
		
<?php
$str='';
$str.='<div class="user_left_menu">';
$str.='<p class="user_left_out"><a href="index.php?act=xuzhi">首页</a></p>';
$str.='<p class="user_left_out"><a href="index.php?act=xuzhi">考生须知</a></p>';

if (stripos($url,'user_info.php')!==false){
	$str.='<p class="user_left_over"><a href="index.php?act=mydata">个人资料</a></p>';
}
else{
	$str.='<p class="user_left_out"><a href="index.php?act=mydata">个人资料</a></p>';
}


$str.='<p class="user_left_out"><a href="user_pic.php" target="_blank">上传相片</a></p>';
$str.='<p class="user_left_out"><a href="user_pic2.php" target="_blank">查看相片</a></p>';

 

  
 
if (stripos($url,'user_pass.php')!==false){
	$str.='<p class="user_left_over"><a href="index.php?act=password">修改密码</a></p>';
}
else{
	$str.='<p class="user_left_out"><a href="index.php?act=password">修改密码</a></p>';
}
$str.='<p class="user_left_out"><a href="loginout.php">退出登录</a></p>';
$str.='</div>';

echo $str;
?>
    <?php } ?>
