<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>AICL Training</title>
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
			<div class="col-lg-4 col-lg-offset-4" id="register">
				<!--Login Block-->
					<div class="login-block">
						<div class="login-header">
							<h2><i class="fa fa-users"></i> Register</h2>
						</div>
						<?php echo form_open_multipart('login/insert_user/');?>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								
                                <input type="email" id="inputEmail" name="email" class="form-control" aria-label="email"  value="<?php echo set_value('email');?>" placeholder="<?php echo $this->lang->line('email_address');?> *"  autofocus>								
						</div>
									
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								
								<input type="password" id="inputPassword" name="password" aria-label="Password" class="form-control" value="<?php echo set_value('password');?>" placeholder="<?php echo $this->lang->line('password');?> *"  >
						</div>
						
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								
                                <input type="text"  name="first_name" aria-label="Firstname" class="form-control" placeholder="<?php echo $this->lang->line('first_name');?> *" value="<?php echo set_value('first_name');?>"    autofocus>								
						</div>
						
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								
                                <input type="text"   name="last_name" value="<?php echo set_value('last_name');?>" aria-label="Lastname" class="form-control" placeholder="<?php echo $this->lang->line('last_name');?>"    autofocus>								
						</div>
						
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
								<select class="form-control" name="gid" id="gid"  >
					<option value="">please select</option>
					<?php 
					foreach($group_list as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>"> <?php echo $val['group_name'];?> </option>

						<?php 
					}
					?>
					</select>
						</div>
						
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
								
                                <input type="text" name="contact_no"  id="contactno"class="form-control" value="<?php echo set_value('contact_no');?>" placeholder="<?php echo $this->lang->line('contact_no');?> *"    autofocus>								
						</div>
						
						<div class="input-group text-center">
						    <button type="submit" class="btn"><?php echo $this->lang->line('submit');?> </button>
							<!--<button type="submit" class="btn" title="Login">Register</button>!-->
							<button type="reset" class="btn" title="Reset">Reset</button>
						</div>

						<div class="login-links">
						    <a href="<?php echo site_url('login/login');?>" class="pull-left"> <?php echo $this->lang->line('login');?> </a>
							<!--<a href="#" class="pull-left">Login</a>
							<a href="#" class="pull-right">Forgot Password</a>!-->
							<a href="<?php echo site_url('login/forgot');?>" class="pull-right"><?php echo $this->lang->line('forgot_password');?></a>
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