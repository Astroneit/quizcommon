<center>  <div class="log" style="height: 86px;">
         <img src="<?php echo base_url();?>img/logo.png">
        </div> </center> 
       <div class="full-container" style="margin-bottom: 126px;">
      <div class="container-fluid containerfull-1">
     <div class="main-cont login" style="width: 1333px;">
         <center> <h2 style="padding-top: 31px;">Welcome to Infoziant</h2></center><br>
			
          <div class="col-md-4 col-md-offset-4 login">
    	<form class="form-signin" method="post" action="<?php echo site_url('login/verifylogin');?>">
		
		<?php 
		if($this->session->flashdata('message')){
			?>
			<div class="alert alert-danger">
			<?php echo $this->session->flashdata('message');?>
			</div>
		<?php	
		}
		?>		 <?php 
		if($this->session->flashdata('message1')){
			echo $this->session->flashdata('message1');	
		}
		?>
            <fieldset>
             <div class="form-group">
     <label for="email">username:</label>
					<input type="email" id="inputEmail" name="email" class="form-control" placeholder="<?php echo $this->lang->line('email_address');?>" required autofocus>

    </div>
    <div class="form-group">
    <label for="pwd">Password:</label>
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="<?php echo $this->lang->line('password');?>" required >
    </div>
            	<!--<p>
					<label for="login-username">username</label>
					<input type="text" id="login-username" name="username" class="form-control round full-width-input" autofocus />
				</p>
				<p>
					<label for="login-password">password</label>
					<input type="password" id="login-password" name="password" class="form-control round full-width-input" />
				</p>			
                -->
                <div class="aln">
                <input name="submit_signin" value="post" type="hidden" />
                <input type="reset" value="Reset" style="display:none;" />
      <button type="submit" class="btn1 btn btn-primary btn-md">Submit</button>
      <button type="reset" class="btn1 btn btn-success btn-md">Reset</button>
    </div>
                <img src="images/loading.gif" id="loadingimg" style="position:absolute;display:none; margin:-20px 0 0 100px; height: auto; width: auto;"  />
            </fieldset>
			<br>
			<?php 
if($this->config->item('user_registration')){
	?>
	<a href="<?php echo site_url('login/registration');?>"><?php echo $this->lang->line('register_new_account');?></a>
	&nbsp;&nbsp;&nbsp;&nbsp;
<?php
}
?>
	<a href="<?php echo site_url('login/forgot');?>"><?php echo $this->lang->line('forgot_password');?></a>
			
			
        </form>
 </div>
        </div>
		
       </div>
   
    </div>  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>