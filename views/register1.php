
<center>  <div class="log" style="height: 86px;">
         <img src="<?php echo base_url();?>img/logo.png">
        </div> </center> 
 <div class="container" align="center" style="margin-left:5px;">

  <div class="main-cont login1" style="width:1328px; height:490px;  padding-top: 21px;">  
<h2><?php echo $title;?></h2> 
   
 <div class="col-md-4"></div>

  <div class="row" align="center" style="width:950px;">
   
	<?php echo form_open_multipart('login/insert_user/');?>
<div class="col-md-6">
<br> 
 
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
		
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('email_address');?></label> 
					<input type="email" id="inputEmail" name="email" class="form-control" value="<?php echo set_value('email');?>" placeholder="<?php echo $this->lang->line('email_address');?> *"  autofocus>
			</div>
			<div class="form-group">	  
					<label for="inputPassword" class="sr-only"><?php echo $this->lang->line('password');?></label>
					<input type="password" id="inputPassword" name="password"  class="form-control" value="<?php echo set_value('password');?>" placeholder="<?php echo $this->lang->line('password');?> *"  >
			 </div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('first_name');?></label> 
					<input type="text"  name="first_name"  class="form-control" placeholder="<?php echo $this->lang->line('first_name');?> *" value="<?php echo set_value('first_name');?>"    autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('last_name');?></label> 
					<input type="text"   name="last_name" value="<?php echo set_value('last_name');?>"  class="form-control" placeholder="<?php echo $this->lang->line('last_name');?>"    autofocus>
			</div>
			<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('contact_no');?></label> 
					<input type="text" name="contact_no"  class="form-control" value="<?php echo set_value('contact_no');?>" placeholder="<?php echo $this->lang->line('contact_no');?> *"    autofocus>
			</div>
				<div class="form-group">	 
					<label> <?php echo $this->lang->line('select_group');?> </label> 
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
 

	<button type="submit" class="btn1 btn btn-primary btn-md"><?php echo $this->lang->line('submit');?> </button>
 &nbsp;&nbsp;&nbsp;&nbsp; 
 
 <a href="<?php echo site_url('login/login');?>" class="btn1 btn btn-success btn-md"> <?php echo $this->lang->line('login');?> </a>

		</div>
</div>
 
 </div>
 
 
</div>
      </form>
</div>

 



</div>
<script>
 
</script>