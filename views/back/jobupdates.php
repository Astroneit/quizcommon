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
#skill{
	color:black;
}

#login{
	
	background-image: url('<?php echo base_url();?>/images1/gg.jpg');
		background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
	padding-top:3%;
}
</style>

</head>
<body>
<div class="container-fluid"id="login">
<div id="wrapper"> 

	<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>

		</ul>

	<div class="container" id="content">
		<h2>Add New Job</h2>
		
		<a href="<?php echo site_url('Dashboard/newskill');?>" class="btn" style="float:right;background:wheat;">Add New Skill</a>
		<a href="<?php echo site_url('Dashboard/newcompany');?>" class="btn" style="float:right;background:wheat;margin-right:7px;">Add New Company</a>
		

		<div class="row">
		
		<?php 
if(isset($message_display)){
	echo $message_display;
}

		?>
		<form method="post"  style="color:white;"class="form-horizontal" action="<?php echo site_url('Dashboard/insert_job/');?>">
			<div class="report-block">
				<div class="col-lg-7 col-md-offset-2" id="add-user">
				<?php 
		if($this->session->flashdata('message')){
			
			echo $this->session->flashdata('message');	
			
		}
		?>	
					
						<fieldset>

						
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="company_name">Company Name</label>  
							<div class="col-md-6">
							
								<!--<input id="email" name="email" type="text" placeholder="Email Address" class="form-control"/>!-->
								<select  id="inputcompany"  name="company_name"  class="form-control" placeholder="Company Name"  >
								
								<option value="">Select Company Name</option>
								<?php
							foreach($skills as $val){?>
								<option value="<?php echo $val['company_name'];?>"><?php echo $val['company_name'];?></option>
								<?php }?>
								</select>
							
								<span style="color:red"><?php echo form_error('company_name')  ?></span>
							</div>
						</div>
						
												<div class="form-group">
							<label class="col-md-6 control-label" for="Company Type">Technology</label>  
							<div class="col-md-6">
								<!--<input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control"/>!-->
								<select  id="Companytype"  name="technology"  class="form-control" placeholder="Company type"  >
								
								<option value="">Select Technology</option>
								<option value="php">PHP</option>
								<option value="java">JAVA</option>
								<option value="android">ANDROID</option>
								<option value="dotnet">DOTNET</option>
								</select>
								
								<span style="color:red"><?php echo form_error('technology')  ?></span>
							</div>
						</div>
						
						

						<div class="form-group">
							<label class="col-md-6 control-label" for="Designation">Designation </label>
							<div class="col-md-6">
								<!--<input id="password" name="password" type="password" placeholder="Password" class="form-control"/>!-->
								<input type="text" id="inputDesignation" name="designation"  placeholder="Designation" class="form-control"  >
								
								<span style="color:red"><?php echo form_error('designation')  ?></span>
    
							</div>
						</div>
						
						
						
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="fname">Skill Required</label>  
							<div class="col-md-6">
							
							
							<?php 
							
					//foreach($skill as $skillval){
						
					for($i=2;$i<count($skill);$i++)
					{
						?>
						
					
						
						<input type="checkbox" id="skillinput"  name="skill[]" value="<?php echo $skill[$i]; ?>"><span id="skill"><?php echo $skill[$i]; ?></span>
						
						
						
						<?php 
					}
					
					?>
						<span style="color:red"><?php echo form_error('skill[]')  ?>	</span>
							
							
								
								
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="Company Type">Company Type</label>  
							<div class="col-md-6">
								<!--<input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control"/>!-->
								<select  id="Companytype"  name="company_type"  class="form-control" placeholder="Company type"  >
								
								<option value="">Select company type</option>
								<option value="company">Company</option>
								<option value="consultancy">Consultancy</option>
								</select>
								
							<span style="color:red">	<?php echo form_error('company_type')  ?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="Company Type">Experience</label>  
							<div class="col-md-6">
								<!--<input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control"/>!-->
								<input id="experience"  name="experience"  class="form-control" placeholder="Experience"   >
								
								<span>eg: fresher(0-3)yrs</span>
								<span style="color:red"><?php echo form_error('experience')  ?></span>
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="location">Location</label>  
							<div class="col-md-6">
								<!--<input id="contactno" name="contactno" type="text" placeholder="Contact Number" class="form-control"/>!-->
								<input type="text" id="location" name="location"  class="form-control" placeholder="Location"    autofocus>
								
								<span style="color:red"><?php echo form_error('location')  ?></span>
							</div>
						</div>
						
							<div class="form-group">
							<label class="col-md-6 control-label" for="contactno">Interview Timing</label>  
							<div class="col-md-6">
								<!--<input id="contactno" name="contactno" type="text" placeholder="Contact Number" class="form-control"/>!-->
								<input type="text" id="interview_on" name="interview_on"  class="form-control" placeholder="Interview Timings"   autofocus>
								
							<span style="color:red">	<?php echo form_error('interview_on')  ?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="contactno">Contact Number</label>  
							<div class="col-md-6">
								<!--<input id="contactno" name="contactno" type="text" placeholder="Contact Number" class="form-control"/>!-->
								<input type="text" id="contactno" name="contact_no"  class="form-control" placeholder="<?php echo $this->lang->line('contact_no');?>"   autofocus>
								
								
								
								<span style="color:red"><?php echo form_error('contact_no')  ?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="posted_on">Posted on</label>  
							<div class="col-md-6">
								<!--<input id="contactno" name="contactno" type="text" placeholder="Contact Number" class="form-control"/>!-->
								<input type="date" id="posted_on" name="posted_on"  class="form-control" placeholder="Posted on"    autofocus>
								
							<span style="color:red">	<?php echo form_error('posted_on')  ?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-6 control-label" for="posted_by">Posted by</label>  
							<div class="col-md-6">
								<!--<input id="contactno" name="contactno" type="text" placeholder="Contact Number" class="form-control"/>!-->
								<input type="text" id="posted_by" name="posted_by"  class="form-control" placeholder="Enter the Website Name"   autofocus>
								
								
								<span style="color:red"><?php echo form_error('posted_by')  ?></span>
							</div>
						</div>
						
							<div class="form-group">
							<label class="col-md-6 control-label" for="posted_by">Website URL</label>  
							<div class="col-md-6">
						
								<input type="text" id="website_url" name="website_url"  class="form-control" placeholder="Enter the Website URL"   autofocus>
								
								
							<span style="color:red">	<?php echo form_error('website_url')  ?></span>
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