<!DOCTYPE html>
<html lang="en">
<head>
	<title>AICL Training</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>login/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>login/fonts/iconic/css/material-design-iconic-font.min.css">
	  <script type='text/javascript' src='<?php echo base_url();?>js/toastr.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>css/jquery-2.1.4.min'></script>  
<!--===============================================================================================-->
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>login/css/main.css">
	  <link rel="stylesheet" href="<?php echo base_url();?>css/toaster.css">
<!--===============================================================================================-->
<style>
#error p{
	color: wheat;
    margin-top: -6%;
    margin-bottom: 0%;
}

</style>
</head>
<body>
	
	

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>login/images/banner-4.jpg');">
	
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?php echo site_url('Login/verifylogin');?>">
					
					<center><img class="main-logo" style="width:45%; background-color: white;
    padding: 10px;
    border-radius: 30px; " src="<?php echo base_url();?>images1/AICL_Logo.png" alt="Astrone"></center>
	
		

					<span class="login100-form-title p-b-34 p-t-27">
						Sign In
					</span>	<?php
	if(isset($invalid))
	{
	?>
<p style="color: white;margin-left:30px;background-color: red;padding-left: 62px;"> <?php echo $invalid;?></p>
<?php		
	}
	if(isset($message_display))
	{
		?>
<p style="color: white;margin-left:30px;background-color: red;"><?php echo $message_display;?> </p>
<?php
	}
	?>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="emails" placeholder="Registered Email ID" value="<?php echo set_value('emails'); ?>" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
						
					</div>
                     <span id="error"><?php echo form_error('emails'); ?></span>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="passwords" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
<span id="error"><?php echo form_error('passwords'); ?></span>
					<!--<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>-->

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-16">
						<a class="txt1" href="<?php echo site_url();?>/Forgetpass_controller/toforget">
							Forgot Password
						</a> <br>
						<p style="color:white;">New User? <a href="<?php echo site_url();?>/Login/toregister" style=" color: wheat; font-family: -webkit-body;font-weight: bold;font-size: 16px;">Sign Up</a><br></p>
					</div><br>
				</form>
			</div>
		</div>
	</div>
	

</body>
</html>