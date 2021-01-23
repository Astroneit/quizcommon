<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Add New Technology</title>
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
<script type="text/javascript" src="<?php echo base_url();?>js1/common.js"></script>
<style>
input[placeholder], [placeholder], *[placeholder] {
    color: white!important;
}
.container-fluid{
	 padding:0px;
 }
#content {
    margin-top: 56px;
	height:100% !important;
}
#login{
	
/* 	background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
	/* background-image: url('<?php echo base_url();?>images1/gg.jpg'); */
	
	background-repeat: no-repeat;
   /*  background: linear-gradient(to top, rgb(28, 89, 157), rgb(75, 153, 219)); */
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
 }
 #add-user .form-group .form-control {
    color: #fff;
}
.info-btn .sub_btn {
    background: #2db795 none repeat scroll 0 0;
}
.info-btn .reset_btn{
	 background: #f7b156 none repeat scroll 0 0;
}

#skill{
	text-transform:uppercase !important;
	    padding-right: 5%;
		

}
#skillinput{
	 margin-right: 1%;
}


</style>

</head>
<body>
<div class="container-fluid"id="login">
<div id="wrapper"> 

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

	<div class="container" id="content">
		<h2>Add New Technology</h2>
		
		
		
		<a href="<?php echo site_url('Dashboard/Jobupdates');?>" class="btn" style="float:right;background:wheat;">Back to Job Updates</a>
		
		
		
	<span style="color:red;">	
		<?php 
if(isset($val)){
	echo $val;
}
?></span>	
		
		<div class="row">
		
		<?php 
if(isset($message_display)){
	echo $message_display;
}

		?>
		<form method="post"  style="color:white;"class="form-horizontal" action="<?php echo site_url('Dashboard/insert_newtech/');?>">
			<div class="report-block">
				<div class="col-lg-6" id="add-user" style="border-top: 30px solid #e42767 !important;border: 1px solid #e42767;">
				<?php 
		if($this->session->flashdata('message')){
			
			echo $this->session->flashdata('message');	
			
		}
		?>	
					
						<fieldset>

						
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="skillreq">New Technology</label>  
							<div class="col-md-6">
								<!--<input id="email" name="email" type="text" placeholder="Email Address" class="form-control"/>!-->
								
								<input type="text" id="inputskills" name="newtech" placeholder="Add New Technology here" class="form-control" style="color:#000 !important;"   autofocus>
								
								<span style="color:#000 !important;" >(Type with Only Caps, no spaces.Use underscores for spaces )</span>
								<span style="color:red;"><?php echo form_error('newtech') ; ?></span>
							</div>
						</div>

						
						
						
						
						
						
						

						<div class="form-group">
							<label class="col-md-6 control-label" for="login"></label>
							<div class="col-md-6 info-btn">
								<button type="submit" class="btn sub_btn" title="Submit">Submit</button>
								<button type="reset" class="btn reset_btn" title="Reset">Reset</button>
							</div>
						</div>

						</fieldset>
					</form>
				</div>

			</div>
			</form>
		</div>
	</div>	

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
<script>
getexpiry();
</script>
</div>
</body>
</html>