<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Online Portal - Login Page</title>
<meta charset="UTF-8" />
<meta name="description" content="Merchant">
<meta name="keywords" content="Merchant Login">
<meta name="viewport" id="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="MobileOptimized" content="320"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="shortcut icon" href="<?php echo base_url();?>images1/favicon.ico" type="image/x-icon" />	
<link rel="stylesheet" href="<?php echo base_url();?>css1/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css1/online-style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css1/font-awesome.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js1/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js1/bootstrap.js"></script>
	<script src="<?php echo base_url('js/jquery.js');?>"> </script>
		<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	<!-- custom javascript -->
	<script src="<?php echo base_url('js/basic.js');?>"> </script>
		
	<!-- bootstrap js -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"> </script>
</head>
<body>
<div id="wrapper"> 
<!--Header--> 
<header>
	<div class="container">
		<div class="row" id="header">
			<div class="col-lg-3 col-md-3 col-sm-3">
				<a href="javascript:void(0);" id="logo"> <img src="<?php echo base_url();?>img/logo.png"></a>
			</div>
		</div>
	</div>
</header>
<!--//Header-->

<!--Login Section-->
<section id="login-container">
	<h1 class="login-head">Welcome to Online Portal</h1>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
			<?php 
		if($this->session->flashdata('message')){
			?>
			
			<span style="color:white;"><?php echo $this->session->flashdata('message');?></span>
		
		<?php	
		}
		?>		<span style="color:white;"> <?php 
		if($this->session->flashdata('message1')){
			echo $this->session->flashdata('message1');	
		}
		?></span>
				<!--Login Block-->
					<div class="login-block">
						<div class="login-header">
							<h2><i class="fa fa-lock"></i> Login</h2>
						</div>
						<form class="form-signin" method="post" action="<?php echo site_url('login/verifylogin');?>">
						
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<!--<input type="text" class="form-control" id="username" name="username" aria-label="Username" placeholder="Username" />  !--> 
                                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="<?php echo $this->lang->line('email_address');?>" required autofocus>								
						</div>
									
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								
								<input type="password" id="inputPassword" name="password" class="form-control"  placeholder="<?php echo $this->lang->line('password');?>" required >
						</div>
						
						<div class="input-group text-center">
						 <input name="submit_signin" value="post" type="hidden" />
                <input type="reset" value="Reset" style="display:none;" />
							<button type="submit" class="btn" title="Login">Login</button>
							<button type="reset" class="btn" title="Reset">Reset</button>
						</div>

						<div class="login-links">
							<!--<a href="#" class="pull-left">Register</a>!-->
							<br>
			<?php 
if($this->config->item('user_registration')){
	?>
	<a href="<?php echo site_url('login/registration');?>" class="pull-left"><?php echo $this->lang->line('register_new_account');?></a>
	&nbsp;&nbsp;&nbsp;&nbsp;
<?php
}
?>
	<a href="<?php echo site_url('login/forgot');?>" class="pull-right"><?php echo $this->lang->line('forgot_password');?></a>
							<!--<a href="#" class="pull-right">Forgot Password</a>!-->
						</div>
						</form>
					</div>					
				<!--//Login Block-->
			</div>
		</div>	
		</div>
		<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		
</section>	
<!--//Login Section-->


<!--Footer-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<p>&copy; 2018 Infoziant. All Rights Reserved.</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<p class="pull-right hidden-xs"></p>
			</div>
		</div>
	</div>	
</footer>
<!--//Footer-->
</div>

</body>
</html>
