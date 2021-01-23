<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Online Portal - Add User Page</title>
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
}

.panel{
	box-shadow: 5px 5px 44px grey;
}

#login{
	
	/* background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
	/*background-image: url('<?php echo base_url();?>/images1/gg.jpg');*/
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
    color: #000 !important;
	    border: 1px solid gainsboro;
}
 #add-user .form-group .form-control:focus {
   
	     border: 1px solid darkmagenta;
}


#add-user .form-group .form-control:hover {
	background:gainsboro;
}
   
	
	
.info-btn .sub_btn {
    background: #2db795 none repeat scroll 0 0;
}
.info-btn .reset_btn{
	 background: #f7b156 none repeat scroll 0 0;
}

#logo img {
    width: 92% !important;
	    margin-top: 3%;
}
.navbar { 
    min-height: 83px !important;
}
.centered {
 
  top: 50%;
  left: 50%;
  margin-top: 3%;
  padding:133px;
 
}

.need:hover{
	background-color:orange !important;
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

	<div class="container" id="content" style="margin-top: 14px;">
	
<h3 style="color: #000;font-weight: bold;">Add New User</h3>
	
	
	<div class="panel panel-default">
  <div class="panel-heading" style="font-weight: bold;color: white;font-size: 16px; background-color: #ef0b59;">Add Details for New User</div>
  <div class="panel-body">
  
	<!--	<h2>Add New User</h2>-->
		<div class="row">
		<form method="post"  style="color:white;"class="form-horizontal" action="<?php echo site_url('user/insert_user/');?>">
			<div class="report-block">
				<div class="col-lg-6 col-md-6" id="add-user">
				<?php 
		if($this->session->flashdata('message')){
			
			echo $this->session->flashdata('message');	
			
		}
		?>	
					
					

						
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="email">Email Address</label>  
							<div class="col-md-7">
								<!--<input id="email" name="email" type="text" placeholder="Email Address" class="form-control"/>!-->
								
								<input type="email" id="inputEmail" name="email" placeholder="<?php echo $this->lang->line('email_address');?>" class="form-control" required autofocus>
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="password">Password </label>
							<div class="col-md-7">
								<!--<input id="password" name="password" type="password" placeholder="Password" class="form-control"/>!-->
								<input type="password" id="inputPassword" name="password"  placeholder="<?php echo $this->lang->line('password');?>" class="form-control" required >
    
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="fname">First Name</label>  
							<div class="col-md-7">
								<!--<input id="fname" name="fname" type="text" placeholder="First Name" class="form-control"/>!-->
								<input type="text"  id="fname" name="first_name"  class="form-control" placeholder="<?php echo $this->lang->line('first_name');?>"   autofocus>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="lname">Last Name</label>  
							<div class="col-md-7">
								<!--<input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control"/>!-->
								<input type="text" id="lname"  name="last_name"  class="form-control" placeholder="<?php echo $this->lang->line('last_name');?>"   autofocus>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="contactno">Contact Number</label>  
							<div class="col-md-7">
								<!--<input id="contactno" name="contactno" type="text" placeholder="Contact Number" class="form-control"/>!-->
								<input type="text" id="contactno" name="contact_no"  class="form-control" placeholder="<?php echo $this->lang->line('contact_no');?>"   autofocus>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="group">Select Group</label>  
							<div class="col-md-7">
								
								<select class="form-control" name="gid" id="group" onChange="getexpiry();">
					<?php 
					foreach($group_list as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>"><?php echo $val['group_name'];?> </option>
						<?php 
					}
					?>
					</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="group">Subscription Expired</label>  
							<div class="col-md-7">
								<input type="text" name="subscription_expired"  id="subscription_expired" class="form-control" placeholder="<?php echo $this->lang->line('subscription_expired');?>"    autofocus>
							</div>
							 
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" for="group">Account Type</label>  
							<div class="col-md-7">
								
								<select class="form-control" name="su" id="account">
						<option value="0"><?php echo $this->lang->line('user');?></option>
						<option value="1"><?php echo "Placement officer";?></option>
					</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-6 control-label" for="login"></label>
							<div class="col-md-6 info-btn">
								<button type="submit" class="btn sub_btn" title="Submit">Submit</button>
								<button type="reset" class="btn reset_btn" title="Reset">Reset</button>
							</div>
						</div>

						
					</form>
				</div>
				
		
		
				<div class="col-md-6">
<div class="centered">
<h3 style="color: slategrey;font-weight:bold;font-style: italic;">Need to View User List?</h3>
<a href="<?php echo site_url();  ?>/user" class="btn btn-warning need" style="border-radius:0px;border: none;outline:none;background-color: #11588a;font-weight:bold;">View Users</a>

</div>
</div>
		
		
		

			</div>
			</form>
		</div>
  </div>
</div>
	
	
	</div>	

<!--Footer-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<p>&copy; 2018 Infoziant. All Rights Reserved.</p>
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