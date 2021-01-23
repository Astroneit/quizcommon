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
	    text-transform: uppercase;
    color: brown;
    font-weight: bold;
	font-size: 14px !important;
	
	    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
	
}
 #skill:hover{
	 
  overflow: visible !important; 
  
 
  white-space: unset !important;
/*   word-wrap: break-word !important; */
z-index: 999999 !important;
    color: black;
	cursor:pointer;
  }
#skillinput{
  width: 16px; /*Desired width*/
  height: 16px; /*Desired height*/
}
#login{
	
/* 	background-image: url('<?php echo base_url();?>/images1/gg.jpg'); */
/* background:azure; */
   /* background: linear-gradient(to top, rgb(114, 167, 226), rgb(240, 242, 243)); */
		background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
	padding-top:3%;
}

.label{
	color:#000 !important;
	    font-size: 16px;
		
		
}

.exprow{
	display:none;
}

.req{
	color:red;
}
</style>
        <script src="<?php echo base_url();?>datatable/bootstrap.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url();?>datatable/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="<?php echo base_url();?>datatable/bootstrap-multiselect.js"></script>

  <script type="text/javascript">
        $(document).ready(function() {
            $('#boot-multiselect-demo').multiselect({
            includeSelectAllOption: true,
            buttonWidth: 350,
            enableFiltering: true
        });
		
		    $('#boot-multiselect-demo1').multiselect({
            includeSelectAllOption: true,
            buttonWidth: 350,
            enableFiltering: true
        });
        });
    </script>
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
		<a href="<?php echo site_url('Dashboard/newtech');?>" class="btn" style="float:right;background:wheat;margin-right:7px;">Add New Technology</a>
		
			<a href="<?php echo site_url('Dashboard/newcompany');?>" class="btn" style="float:right;background:wheat;margin-right:7px;">Add New Company</a>
		

		<div class="row">
		
		<?php 
if(isset($message_display)){
	echo $message_display;
}

		?>
		
		
		<?php 
		if($this->session->flashdata('message')){
			
			echo $this->session->flashdata('message');	
			
		}
		?>			
		<form method="post"  style="color:white;"class="form-horizontal" action="<?php echo site_url('Dashboard/insert_job/');?>">
		
		
		<div class="panel panel-primary" style="margin-top: 3%;">
  <div class="panel-heading">Add New Jobs Here</div>
  <div class="panel-body">
  
  <div class="container">
  <div class="row">
  
  
  <div class="col-md-6">
          <div class="form-group">
							<label class="control-label label col-md-3" for="company_name">Company Name <span class="req">*</span></label>  
							<div class="col-md-9">
							
								
								<select  id="inputcompany"  name="company_name"  class="form-control" placeholder="Company Name"   >
								
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
							<label class="col-md-3 control-label label" for="Company Type">Technology <span class="req">*</span></label>  
							<div class="col-md-9">
								<!--<input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control"/>!-->
								<select  id="Companytype"  name="technology"  class="form-control" placeholder="Company type"  >
								
								<option value="">Select Technology</option>
								
								<?php
							foreach($techs as $techval){?>	
								
								<option value="<?php echo $techval['newtech'] ?>" style="text-transform:uppercase;"><?php echo $techval['newtech'] ?></option>
								
								
							<?php }  ?>	
								
								</select>
								
								<span style="color:red"><?php echo form_error('technology')  ?></span>
							</div>
			</div>
			
			<div class="form-group">
							<label class="col-md-3 control-label label" for="Designation">Designation <span class="req">*</span></label>
							<div class="col-md-9">
								<!--<input id="password" name="password" type="password" placeholder="Password" class="form-control"/>!-->
								<input type="text" id="inputDesignation" name="designation"  placeholder="Designation" class="form-control"  >
								
								<span style="color:red"><?php echo form_error('designation')  ?></span>
    
							</div>
						</div>
			
			
						<div class="form-group">
							<label class="col-md-3 control-label label" for="fname">Skill Required <span class="req">*</span></label>  
							<div class="col-md-9">
							
								<select id="boot-multiselect-demo1" multiple="multiple"  name="skill[]"  class="form-control" placeholder="Company type"  >
								
					
								
								<?php
								for($i=2;$i<count($skill);$i++)
					{?>
								
								<option value="<?php echo $skill[$i]; ?>" style="text-transform:uppercase;"><?php echo $skill[$i]; ?></option>
								
								
							<?php }  ?>	
								
								</select>
							<?php 
				/*	for($i=2;$i<count($skill);$i++)
					{
						?>
				<div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 3%;">		
                 <input type="checkbox" id="skillinput"  class="col-md-2"  name="skill[]" value="<?php echo $skill[$i]; ?>"><span id="skill" class="col-md-10"><?php echo $skill[$i]; ?></span>
				</div>
						<?php 
					}
*/
					?>
						<span style="color:red"  ><?php echo form_error('skill[]')  ?>	</span>	
							</div>
						</div>
						
	<div class="form-group">
							<label class="col-md-3 control-label label" for="Company Type">Company Type <span class="req">*</span></label>  
							<div class="col-md-9">
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
				<div class="row">
							<label class="col-md-3 control-label label" for="salary">Salary <span class="label" style="font-size: 10px;">(optional)</span> </label>
							<div class="col-md-9">
							
                             	<div class="col-md-5 col-sm-5 col-xs-5">						
								<input type="text" id="salary" name="salary1"  placeholder="Rs.xxxxx" class="form-control"  >
								</div>
									<div class="col-md-2 col-sm-2 col-xs-2">
								<span class="label">to</span>
									</div >
									<div class="col-md-5 col-sm-5 col-xs-5">
								<input type="text" id="salary" name="salary2"  placeholder="Rs.xxxxx" class="form-control"  >
								</div>
							
    
							</div>
							
							</div>
					
							
						</div>	



     <div class="form-group">
							<label class="col-md-3 control-label label" for="openings">No. of Openings </label>
							<div class="col-md-9">
								
								<input type="text" id="openings" name="openings"  placeholder="Enter No.of openings (optional)" class="form-control"  >
								
								<span style="color:red"><?php echo form_error('openings')  ?></span>
    
							</div>
						</div>	


			</div>
			
			
		<div class="col-md-6">	
		
		     <div class="form-group">
			 <div class="row">
							<label class="col-md-3 control-label label" for="Company Type">Fresher / Expr. <span class="req">*</span></label>  
							<div class="col-md-8">
							<select name="fresh_exp" id="fresh_exp" class="form-control">
							<option value="">Select Fresher or Experience</option>
							<option value="Fresher">Fresher</option>
							<option value="Experience">Experience</option>
							<option value="Fresher & Experience">Both</option>
							</select>
				</div>	
 				
				</div>	
				
				
				
					 <div class="row exprow" style="margin-left: 1%; margin-top: 3%;">	
           <label class="col-md-3 col-sm-3 col-xs-3 control-label label" for="Company Type">if Expr., <span class="req">*</span></label>  
                      
             <div class="col-md-2 col-sm-2 col-xs-2">					  
								<input type="number" id="experience1"  name="experience1"  class="form-control" placeholder="1"   >
				</div>	
				
<div class="label col-md-1 col-sm-1 col-xs-1"  >to</div>

               <div class="col-md-2 col-sm-2 col-xs-2">					  
								<input type="number" id="experience2"  name="experience2"  class="form-control" placeholder="5"   >
				</div>	
				
<div class="label col-md-2 col-sm-2 col-xs-2"  >years</div>				
								
					 </div>
								
								<span style="color:red"><?php echo form_error('experience')  ?></span>
							</div>
					



					
		<div class="form-group">
							<label class="col-md-3 control-label label" for="location">Job Location <span class="req">*</span></label>  
							<div class="col-md-8">
								
								<input type="text" id="location" name="location"  class="form-control" placeholder="Location" >
								
								<span style="color:red"><?php echo form_error('location')  ?></span>
							</div>
			</div>			
							
			<div class="form-group">
							<label class="col-md-3 control-label label" for="contactno">Interview Timing</label>  
							<div class="col-md-8">
								
								<input type="text" id="interview_on" name="interview_on"  class="form-control" placeholder="Interview Timings (eg: dd/mm/yyyy  hh:mm) (optional)"   >
								
							<span style="color:red">	<?php echo form_error('interview_on')  ?></span>
							</div>
						</div>	

			<div class="form-group">
							<label class="col-md-3 control-label label" for="contactno">End Date</label>  
							<div class="col-md-8">
								
								<input type="text" id="end_date" name="end_date"  class="form-control" placeholder="Interview End date (yyyy-mm-dd)"   >
								
							<span style="color:red">	<?php echo form_error('interview_on')  ?></span>
							</div>
						</div>				
		
		
		<div class="form-group">
							<label class="col-md-3 control-label label" style="padding-top: 2px;" for="venue">Venue Address</label>  
							<div class="col-md-8">
								
								<textarea id="venue" name="venue"  class="form-control" placeholder="Enter Venue Address (optional)"></textarea>
								
							<span style="color:red">	<?php echo form_error('interview_on')  ?></span>
							</div>
						</div>				
		
		
		<div class="form-group">
							<label class="col-md-3 control-label label"  style="padding-top: 5px;" for="hrmail">HR Email ID</label>  
							<div class="col-md-8">
								
								<input type="email" id="hremail" name="hremail"  class="form-control" placeholder="Enter HR Email Address (optional) ">
								
							<span style="color:red">	<?php echo form_error('hremail')  ?></span>
							</div>
						</div>		
		
		
			<div class="form-group">
							<label class="col-md-3 control-label label" for="contactno">Contact Number </label>  
							<div class="col-md-8">
								
								<input type="text" id="contactno" name="contact_no"  class="form-control" placeholder="<?php echo $this->lang->line('contact_no');?> (optional)"  >
								
								
								
								<span style="color:red"><?php echo form_error('contact_no')  ?></span>
							</div>
						</div>
		     
			 
						<div class="form-group">
							<label class="col-md-3 control-label label" for="posted_on">Posted on <span class="req">*</span></label>  
							<div class="col-md-8">
								
								<input type="date" id="posted_on" name="posted_on"  class="form-control" placeholder="Posted on"    autofocus>
								
							<span style="color:red">	<?php echo form_error('posted_on')  ?></span>
							</div>
						</div>
		
						<div class="form-group">
							<label class="col-md-3 control-label label" for="posted_by">Posted by <span class="req">*</span></label>  
							<div class="col-md-8">
								<!--<input id="contactno" name="contactno" type="text" placeholder="Contact Number" class="form-control"/>!-->
								<input type="text" id="posted_by" name="posted_by"  class="form-control" placeholder="Enter the Website Name"   autofocus>
								
								
								<span style="color:red"><?php echo form_error('posted_by')  ?></span>
							</div>
						</div>
						
							<div class="form-group">
							<label class="col-md-3 control-label label" for="posted_by">Website URL </label>  
							<div class="col-md-8">
						
								<input type="text" id="website_url" name="website_url"  class="form-control" placeholder="Enter the Website URL"   autofocus>
								
								
							<span style="color:red">	<?php echo form_error('website_url')  ?></span>
							</div>
						</div>
						
						
					<div class="form-group">
							<label class="col-md-3 control-label label" for="posted_by">Comments</label>  
							<div class="col-md-8">
								
								<textarea id="comments" name="comments"  class="form-control" placeholder="Candidate must be strong in...??   (optional)"   ></textarea>
								
								
								<span style="color:red"><?php echo form_error('comments')  ?></span>
							</div>
						</div>	
		
		
		
			</div>
						
					
					
		
		</div>
		
		<div class="row" style="margin-top: 2%;text-align: right;margin-right: 3%;">
		
						<div class="form-group">
							<label class="col-md-6 control-label" for="login"></label>
							<div class="col-md-6 info-btn">
								<button type="submit" class="btn sub_btn" title="Submit">Submit</button>
								<button type="reset" class="btn reset_btn" title="Reset">Reset</button>
							</div>
						</div>
		</div>
		
		</div>
		</div>
			
  
  
  </div>
</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<!-- form start  -->
		
		
			</form>
		</div>
	</div>	

	
	
<script type="text/javascript">
		 $(document).ready(function() {	
$("#fresh_exp").change(function(){
	
	//alert();
	
	var value= $(this).val();
	
	if(value!="Fresher"){
		 $(".exprow").css("display", "block");
		 $("#experience1").prop('required',true);
		 $("#experience2").prop('required',true);
	}
	else{
		 $(".exprow").css("display", "none");
		 $("#experience1").prop('required',false);
		 $("#experience2").prop('required',false);
	}
	
});
});
	
	
	</script>
	
	
	
<!--Footer-->
<footer>
	<div class="container-fluid" style="padding-right:0px;padding-left:0px;">
		<div class="row">
			<div style="text-align:center;">
				<p>&copy; 2018 Infoziant. All Rights Reserved.</p>
			</div>
			
		</div>
	</div>	
</footer>
<!--//Footer-->
</div>

</div>
</body>
</html>