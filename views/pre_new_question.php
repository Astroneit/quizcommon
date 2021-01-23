<style>
.container-fluid{
	 padding:0px;
 }

.panel{
    box-shadow: 5px 5px 21px grey;
}

#login{
	
/* 	background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
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
 #content {
    margin-top: 34px;
}
 .btn-default {
    background-color: #5cb85c;
    border-color: #5cb85c;
    color: #fff;
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
<div class="container " id="content" style="height:520px;">

   
 <h3 style="color: #000;font-weight: bold;"><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('qbank/pre_new_question/');?>">
	
<div class="col-md-8 ">
<br> 
 <div class="login-panel panel panel-default" >
	<div class="panel-head" style="background:  tomato;
    border-radius: 0px;color:white; padding: 1.5%;font-size: 16px;">
	<label style="margin-bottom:0px;">Add Questions Here</label>
	</div>
	
		<div class="panel-body" style=""> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
		
		
				<div class="form-group">	 
					<label> <?php echo $this->lang->line('select_question_type');?> </label> 
					<select class="form-control" name="question_type" onChange="hidenop(this.value);">
						<option value="1"><?php echo $this->lang->line('multiple_choice_single_answer');?></option>
				<?php	/* 	<option value="2"><?php echo $this->lang->line('multiple_choice_multiple_answer');?></option>
						<option value="3"><?php echo $this->lang->line('match_the_column');?></option> */ ?>
						<option value="4"><?php echo $this->lang->line('short_answer');?></option>
						<option value="5"><?php echo $this->lang->line('long_answer');?></option>
						<option value="6"><?php echo $this->lang->line('image_question');?></option>
					
					</select>
			</div>

			<div class="form-group" id="nop" >	 
					<label for="inputEmail"  ><?php echo $this->lang->line('nop');?></label> 
					<input type="text"   name="nop"  class="form-control" value="4"   >
			</div>


 
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('next');?></button>
 
		</div>
</div>
 
 
 
 
</div>




      </form>
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
