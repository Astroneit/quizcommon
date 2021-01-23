<style>
.container-fluid{
	 padding:0px;
 }
.panel{
	 box-shadow: 5px 5px 21px grey;
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
 
 #foot{
	     position: absolute;
    bottom: 0px; 
    width: 100%;
 }
 
 .error p{
	 color:red;
 }
</style> 
<div class="container-fluid"id="login">
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
		<div class="container">

   
 <h3 style="color:black;font-weight:bold;">Add New Video</h3>
   
 

  <div class="row">
     <form method="post" enctype="multipart/form-data" action="<?php echo site_url('video/insert_video/');?>">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
 
 <div class="panel-head" style="    background: mediumslateblue;
    padding: 1%;
    color: white;
    font-size: 15px;"> 
 <label style="margin-bottom:0px;">Add New Video</label>
 
 </div>
 
 
 
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
		<div class="form-group">	 
					<label for="inputEmail" >Select Course</label> 
						<select class="form-control" name="cname"  id="course" >
								<option value="">  Select the Course</option>
						   <?php 
						  
						   foreach($course_list as $c_name)
						   {?>
						    <option value="<?php echo $c_name['id'];?>"><?php echo $c_name['course_name'];?></option>
						   <?php } ?>
							
							
							</select>
							<span class="error"><?php echo form_error('cname');?>
			</div>
		
		
		 			<div class="form-group">	 
					<label for="inputEmail" >Video Title</label> 
					<input type="text"  name="video_name"  class="form-control" placeholder="Enter Video Title" value="<?php echo set_value('video_name'); ?>"  autofocus>
					<span class="error"><?php echo form_error('video_name');?></span>
                       			
					
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Video Description</label> 
					<textarea   name="description"  class="form-control tinymce_textarea" placeholder=""><?php echo set_value('video_name'); ?></textarea>
					<span class="error"><?php echo form_error('description');?></span>
                    
			</div>
			
			<div class="form-group">	 
					<label for="inputEmail" >Upload Video File</label> 
					<input type="file"  name="userfile"  class="form-control" placeholder=""  required autofocus>
			</div>
			

			
			
							
							
 
	<button class="btn btn-success" type="submit"><?php echo $this->lang->line('next');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>
</div>
<div class="container-fluid" id="foot">
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
