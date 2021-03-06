<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Online Portal - Forgot Password Page</title>
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
<script type="text/javascript" src="<?php echo base_url();?>js1/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js1/bootstrap.js"></script>
</head>
<body>
<div id="wrapper"> 
<!--Header--> 
<header>
	<div class="container">
		<div class="row" id="header">
			<div class="col-lg-3 col-md-3 col-sm-3">
				<a href="javascript:void(0);" id="logo"><img src="<?php echo base_url();?>images1/logo.png" alt="logo"/></a>
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
				<!--Login Block-->
					<div class="login-block">
					<form method="post" class="form-signin" action="<?php echo site_url('login/forgot');?>">
					
		<?php 
		if($this->session->flashdata('message')){
			?>
			<div class="alert alert-danger">
			<?php echo $this->session->flashdata('message');?>
			</div>
		<?php	
		}
		?>		
						<div class="login-header">
							<h2><i class="fa fa-key"></i> Reset Password</h2>
						</div>
						
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<!-- <input type="text" class="form-control" id="email" name="email" aria-label="email" placeholder="Email Address" />  !-->  
                                <input type="email" id="inputEmail" name="email" class="form-control" aria-label="email" placeholder="<?php echo $this->lang->line('email_address');?>" required autofocus>								
						</div>
									
						<div class="input-group text-center">
							<!--<button type="submit" class="btn" title="Reset">Reset Password</button>!-->
							<button class="btn" type="submit"><?php echo $this->lang->line('send_new_password');?></button>
						</div>

						<div class="login-links">
							<!--<a href="#" class="pull-left">Login</a>
							<a href="#" class="pull-right">Register</a>!-->
							<?php 
if($this->config->item('user_registration')){
	?>
	<a href="<?php echo site_url('login/registration');?>" class="pull-left"><?php echo $this->lang->line('register_new_account');?></a>
	
<?php
}
?>
	<a href="<?php echo site_url('login');?>" class="pull-right"><?php echo $this->lang->line('login');?></a>

			
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