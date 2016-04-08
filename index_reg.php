<div id="reg_right">
			<p id="reg_title2">注册</p>
			<div class="reg">
                <form id="form1" method="post" action="check_reg.php">
                <table width="100%" border="0" cellspacing="3" cellpadding="0">
                  <tr>
                    <td width="10%" align="right">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</td>
                    <td width="80%"><input name="u_user" type="text" class="inputtext" size="50" maxlength="30" /></td>
                  </tr>
				  <tr>
				  	<td style="padding:0px 5px 6px 5px;">&nbsp;</td>
                    <td style="padding:0px 5px 6px 5px;"><span>由5-30个字符(A-Z,a-z,0-9,下划线)组成</span></td>
                  </tr>
                  <tr>
                    <td align="right">登录密码：</td>
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
                    <td align="right">联系电话：</td>
                    <td><input name="u_tel" type="text" class="inputtext" size="50" maxlength="30" /></td>
                  </tr>
				  <tr>
					<td align="right">验&nbsp;&nbsp;证&nbsp;&nbsp;码：</td>
					<td><input type="text" name="u_code" class="inputtext2" size="5" maxlength="4" />&nbsp;<img src="inc/code2.php" style="cursor:pointer; vertical-align:bottom;" title="点击更换图片" onclick="this.src='inc/code2.php?sj='+Math.random()" /></td>
				  </tr>
                  <tr>
				  	<td>&nbsp;</td>
                    <td><input type="button" name="button2" value="注 册" class="button" onclick="CheckReg(this.form);" /></td>
                  </tr>
                </table>
				<input type="hidden" name="act" value="reg" />
				<input type="hidden" name="backurl" value="<?php echo $_SERVER['HTTP_REFERER'] ?>" />
                </form>
           	</div>
			<script type="text/javascript">
			function CheckReg(ObjForm){
				var Reg=/^\w{5,30}$/;
				if (ObjForm.u_user.value==""){
					alert("请输入用户名！");
					ObjForm.u_user.focus();
					return;
				}
				if (!Reg.test(ObjForm.u_user.value)){
					alert("非法的用户名！");
					ObjForm.u_user.value="";
					ObjForm.u_user.focus();
					return;
				}
				if (ObjForm.u_pass.value==""){
					alert("请输入登录密码！");
					ObjForm.u_pass.focus();
					return;
				}
				if (!Reg.test(ObjForm.u_pass.value)){
					alert("非法的登录密码！");
					ObjForm.u_pass.value="";
					ObjForm.u_pass.focus();
					return;
				}
				if (ObjForm.u_pass.value!=ObjForm.u_pass2.value){
					alert("确认密码不正确！");
					ObjForm.u_pass2.value="";
					ObjForm.u_pass2.focus();
					return;
				}
			 
				if (ObjForm.u_tel.value==""){
					alert("请输入联系电话！");
					ObjForm.u_tel.focus();
					return false;
				}
				if (ObjForm.u_code.value==""){
					alert("请输入验证码！");
					ObjForm.u_code.focus();
					return false;
				}
				Reg=/^\w{4}$/;
				if (!Reg.test(ObjForm.u_code.value)){
					alert("非法的验证码！");
					ObjForm.u_code.value="";
					ObjForm.u_code.focus();
					return false;
				}
				ObjForm.submit();
			}
			</script>
        </div>