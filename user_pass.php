 
<script type="text/javascript">
function CheckUserPass(ObjForm){
	if (ObjForm.u_pass_old.value==""){
		alert("请输入原始密码！");
		ObjForm.u_pass_old.focus();
		return false;
	}
	var Reg=/^\w{5,30}$/;
	if (ObjForm.u_pass.value==""){
		alert("请输入新密码！");
		ObjForm.u_pass.focus();
		return false;
	}
	if (!Reg.test(ObjForm.u_pass.value)){
		alert("非法的密码！");
		ObjForm.u_pass.value="";
		ObjForm.u_pass.focus();
		return false;
	}
	if (ObjForm.u_pass.value!=ObjForm.u_pass2.value){
		alert("确认密码错误！");
		ObjForm.u_pass2.value="";
		ObjForm.u_pass2.focus();
		return false;
	}
}
</script>
 
<?php
if ($user=='') Msg('','index.php');
if ($_POST['act']=='user_pass'){
	$u_pass_old=md5(ReStra($_POST['u_pass_old']));
	$u_pass=md5(ReStra($_POST['u_pass']));
	if (RsField('select u_pass from user where u_id='.$user_id)==$u_pass_old){
		$sql="update user set u_pass='$u_pass' where u_id=$user_id";
		mysql_query($sql) or die(mysql_error($sql));
		Msg('修改密码成功！','');
	}
	else {
		Msg('原始密码错误！','');
	}
}
?>
<div id="user_right">
			<p id="user_title">修改密码</p>
			<div class="reg">
				<form name="form1" method="post" action="user_pass.php" onsubmit="return CheckUserPass(this);">
					<table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td width="40%" align="right">原始密码：</td>
						<td width="60%"><input name="u_pass_old" type="password" class="inputtext" size="50" maxlength="30" /></td>
					  </tr>
					  <tr>
						<td style="padding:0px 5px 6px 5px;">&nbsp;</td>
						<td style="padding:0px 5px 6px 5px;"><span>请输入原来的密码</span></td>
					  </tr>
					  <tr>
						<td align="right">新&nbsp;&nbsp;密&nbsp;&nbsp;码：</td>
						<td><input name="u_pass" type="password" class="inputtext" size="50" maxlength="30" /></td>
					  </tr>
					  <tr>
						<td style="padding:0px 5px 6px 5px;">&nbsp;</td>
						<td style="padding:0px 5px 6px 5px;"><span>由5-30个字符(A-Z,a-z,0-9,下划线)组成</span></td>
					  </tr>
					  <tr>
						<td align="right">确认密码：</td>
						<td><input name="u_pass2" type="password" class="inputtext" size="50" maxlength="30" /></td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td><br /><input type="submit" name="button" class="button" value="修 改" /></td>
					  </tr>
					</table>
				<input type="hidden" name="act" value="user_pass" />
			  </form>
           	</div>
		</div>
</body>
</html>