<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title>Reset Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		
	<link href="<?php echo base_url(); ?>resetpass/css/style.css" rel='stylesheet' type='text/css'/>
	<link href="<?php echo base_url(); ?>resetpass/css/font-awesome.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
	<link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700&amp;subset=devanagari,latin-ext" rel="stylesheet">

	<style>
	.main-agile1 {
    width: 29% !important;
}

input[type="submit"] {
border-radius:0px !important;
padding: 9px 0px 9px !important;
       width: 48% !important;

}

.layer{
    height: -webkit-fill-available !important;
}
body{
	    background: url(<?php echo base_url(); ?>resetpass/images/bg.jpg) no-repeat 0px 0px;
		background-size:cover;
}
.w3layouts-main{

    width: 100% !important;

}

@media (min-width:500px) and (max-width:975px){

.main-agile1 {
    width: 49% !important;
}

}


@media (min-width:294px) and (max-width:499px){

.main-agile1 {
    width: 76% !important;
}

input[type="submit"] {

       width: 58% !important;

}

}

	</style>
		
</head>


<body>
<div class="layer">


	<h1>Reset Your Password</h1>
	<div class="main-agile1">
		<div class="w3layouts-main">

<?php	if(isset($invalid))
	{
	?>
<p style="color:red;margin-left:30px;"> Sorry!! Go back to your Email and Try again</p>
<?php		
	}?>
					<h2>Reset Here</h2>
					
						
						<form action="<?php echo site_url() ; ?>/Forgetpass_controller/resetnewpass/<?php echo $this->uri->segment(3);  ?>" method="post">
						
							<div class="email">
							<input placeholder="New Password" name="password" type="password" >
							<span class="icons i2"><i class="fa fa-lock" aria-hidden="true"></i></span>
							</div>
							<span class="error"><?php echo form_error('password');?></span>
                       
							<div class="email">
							<input placeholder="Confirm Password" name="confirm_pass" type="password" >
							<span class="icons i2"><i class="fa fa-lock" aria-hidden="true"></i></span>
							</div>
							<span class="error"><?php echo form_error('confirm_pass');?></span>
                       
							<input type="submit" value="Get Started" name="login">
						</form>
		</div>
		
		
		
		
		
		<div class="clear"></div>
	</div>
	
	<div class="footer-w3l">
		<p class="agileinfo"> </p>
	</div>
</div>
</body>

</html>