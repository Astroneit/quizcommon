<style>
.container-fluid{
	 padding:0px;
 }

#login{
		
			/* background-image: url('<?php echo base_url();?>images1/gg.jpg'); */
	background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
} .alert-danger  
{
	color:red !important;
}

.panel{
	    box-shadow: 5px 5px 44px grey !important;
}
 </style>
 
 
 
 
 <div class="container-fluid" id="login">
 <div class="container">
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
			<li></li>
			<li></li>
		
		
		</ul>

   
 <h3 style="font-weight:bold;"><?php echo $title;?></h3>
   
 

  <div class="row" >
     <form method="post" action="<?php echo site_url('user/update_user/'.$uid);?>">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default" >
		<div class="panel-body"> 

			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
				<div class="form-group">	 
				<?php echo $this->lang->line('group_name');?>: <?php echo $result['group_name'];?> 
				</div>
				
				
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('email_address');?></label> 
					<input type="email" id="inputEmail" name="email" value="<?php echo $result['email'];?>" readonly=readonly class="form-control" placeholder="<?php echo $this->lang->line('email_address');?>" required autofocus>
			</div>
			<div class="form-group" style="display:none;">	  
					<label for="inputPassword" class="sr-only"><?php echo $this->lang->line('password');?></label>
					<input type="password" id="inputPassword" name="password"   value=""  class="form-control" placeholder="<?php echo $this->lang->line('password');?>"   >
			 </div>
			 <div class="form-group">	 
					<label for="inputEmail" class="sr-only">Register No</label> 
					<input type="text" name="reg_no"  class="form-control"  value="<?php echo $result['reg_no'];?>"  placeholder="Register Number"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('first_name');?></label> 
					<input type="text"  name="first_name"  class="form-control"  value="<?php echo $result['first_name'];?>"  placeholder="<?php echo $this->lang->line('first_name');?>"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('last_name');?></label> 
					<input type="text"   name="last_name"  class="form-control"  value="<?php echo $result['last_name'];?>"  placeholder="<?php echo $this->lang->line('last_name');?>"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('contact_no');?></label> 
					<input type="text" name="contact_no"  class="form-control"  value="<?php echo $result['contact_no'];?>"  placeholder="<?php echo $this->lang->line('contact_no');?>"   autofocus>
			</div>
				 <div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('contact_no');?></label>
 <select class="form-control" name="department"  id="group">
								<option value="">  Select Your Department</option>
						 
						    		<option value="cse" <?php if($result['dept']=="cse"){?> selected <?php } ?> >CSE</option>
											<option value="it" <?php if($result['dept']=="it"){?> selected <?php } ?>>IT</option>
											<option value="ece" <?php if($result['dept']=="ece"){?> selected <?php } ?>>ECE</option>
												<option value="eee" <?php if($result['dept']=="eee"){?> selected <?php } ?>>EEE</option>
												<option value="eie" <?php if($result['dept']=="eie"){?> selected <?php } ?>>EIE</option>
															<option value="mech" <?php if($result['dept']=="mech"){?> selected <?php } ?>>Mech</option>
																<option value="civil" <?php if($result['dept']=="civil"){?> selected <?php } ?>>Civil</option>
																	<option value="bme" <?php if($result['dept']=="bme"){?> selected <?php } ?>>BME</option>
																		<option value="biotech" <?php if($result['dept']=="biotech"){?> selected <?php } ?>>Bio-Tech</option>
																			<option value="aero" <?php if($result['dept']=="aero"){?> selected <?php } ?>>Aero</option>
																				<option value="agri" <?php if($result['dept']=="agri"){?> selected <?php } ?>>Agri</option>
											<option value="others" <?php if($result['dept']=="others"){?> selected <?php } ?>>Others</option>
						 
							</select></div>
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>



</div>
<br>
<br>
<br>
<br>
<br>
</div>


 
<div class="container-fluid" >
	<footer>
	<div class="container">
	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
                <p>&copy; 2018 Infoziant. All Rights Reserved.</p>
            </div>
			</div>
		
	</div>	
</footer>
	</div>
