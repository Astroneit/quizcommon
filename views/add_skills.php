<style>
th{
	color:white;
}
.container-fluid{
	 padding:0px;
 }
th
 {
	background-color: #f4b609;
	color:#fff;
 }
 td {
    padding: 11px;
}
.tbl{
	 box-shadow: 5px 5px 21px grey;
}
#login{
	/* 
	background-image: url('<?php echo base_url();?>images1/blue.jpg'); 
	background-image: url('<?php echo base_url();?>images1/gg.jpg');*/
	
	background-repeat: no-repeat;
   /*  background: linear-gradient(to top, rgb(28, 89, 157), rgb(75, 153, 219)); */
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
	
 }
 .btn-default {
    background-color: #21629c;
    border-color: #21629c;
    color: #fff;
}
 #content {
    margin-top: 34px;
}
</style> 
<div class="container-fluid"id="login">

		<div class="container" id="content" style="height:520px";>

   
 


  <div class="row">
 
<div class="col-md-12">
<br> 
				
		<div id="message"></div>
		  <div class="row">
		   <div class="row">
     <form method="post" action="<?php echo site_url('user/insert_skills/');?>">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
 
 <div class="panel-head" style="    background: mediumslateblue;
    padding: 1%;
    color: white;
    font-size: 15px;"> 
 <label style="margin-bottom:0px;">Add Skills</label>
 
 </div>
 
 
 
		<div class="panel-body"> 
	
	
	<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	<div id="message"></div>
			<span style="color:red;"><?php echo validation_errors(); ?></span>
		
			<div class="form-group">	 
					<label   ><?php echo $this->lang->line('select_category');?></label> 
					<select class="form-control" name="cid">
					<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>"><?php echo $val['category_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>
		
		 			<div class="form-group">	 
						 <select name="tech_type" id="tech_type" class="form-control">
		 <option value="">Select Type</option>
		 	 <?php 
					foreach($skills as $val){
						?>
		<option value="<?php echo $val['sno'];?>"><?php echo $val['skill_type'];?></option> 
		
					<?php } ?>		
		 </select>
			</div>
			
<div class="form-group">
  <input type="text" name="skills" value="<?php echo set_value('skills'); ?>" class="form-control" placeholder="Skill"  >
   </div>
  
  
  
	<button class="btn btn-success" type="submit">Save</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

		 
</div>

</div>



</div>
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