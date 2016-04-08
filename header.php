  
<div id="header">
	<a href="./"><img src="images/logo.jpg" id="logo" /></a>
	 
    <div id="nav">
		<span id="nav2">
		<a href="./">首页</a>
		 
		 
		 
		</span>|&nbsp;&nbsp;&nbsp;&nbsp;<?php
		if ($user==''){
			echo '<a href="login.php">登录</a>';
		}
		else {
			echo '<a href="index.php?act=mydata"><strong>'.$user.'</strong></a>，<a href="loginout.php">退出登录</a>';
		}
		?>
	</div>
	<script type="text/javascript">Nav(<?php echo $uid-1 ?>)</script>

</div>
<?php if($uid!=1) echo '<div id="header_line"></div>'; ?>