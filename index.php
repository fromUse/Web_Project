<?php
require 'conn.php';
require 'config.php';
require 'inc/function.php';
$act=$_GET['act'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
<title><?php echo $site_name?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $site_keyword?>" />
<meta name="description" content="<?php echo $site_description?>" />
<link rel="stylesheet" href="css/style_<?php echo $language?>.css" type="text/css" />
<link rel="stylesheet" href="css/user.css" type="text/css" />
<script type="text/javascript" src="inc/function.js"></script>
<script src="laydate/laydate.js"></script>

</head>
<body>
<?php
require 'index_login_check.php'
?>
<div id="main">
	<?php require 'header.php'?>
	<div id="flash_blk">
		<div id="flash">
		<?php
		$str='';
		$query=mysql_query('select * from '.$language.'_ad where a_class=1 order by a_order,a_id');
		if (mysql_num_rows($query)>0){
		while ($row=mysql_fetch_array($query)){
			if ($row['a_url']!=''){
				$str.='<p><a href="'.$row['a_url'].'" target="_blank"><img src="'.$row['a_image'].'" /></a></p>';
			}
			else{
				$str.='<p><img src="'.$row['a_image'].'" /></p>';
			}
		}
		}
		echo $str
		?>
		</div>
		<div id="flash_button"></div>
	</div>
	<script type="text/javascript" src="jquery/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="jquery/jquery.cycle.all.js"></script>
	<script type="text/javascript">
	$(function(){
		$('#flash').cycle({ 
			fx:'fade',
			pager:'#flash_button'
		});
	})
	</script>
    <div id="content" >
         <div id="left" <?php if ($act!='') {?> style="width:130px;" <?php }?> >      
           <?php require 'index_left.php'?>
         </div>
    
		 <div id="right"  <?php if ($act!='') {?> style="width:850px;" <?php }?> >
         
         
          <?php	
		  
		 
		  	if ($act=='reg')
			{  
		      require 'index_reg.php';
		    }	
			 
			elseif( $act=='mydata' )
			{ 
			 require 'user_info.php';
				 
	       	}
			elseif( $act=='password' )
			{ 
			 require 'user_pass.php';
				 
	       	}
			elseif($act=='' or $act=='xuzhi')
			{
			 require 'index_xuzhi.php';
			}
			?>
    </div>
     
	<?php
	 
	
	//require 'footer.php';
	?>
    <div class="cls"></div>
</div>
<div class="cls"></div>
</div>
</body>
</html>
