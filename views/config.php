<style>
th{
	color:white;
}
.container-fluid{
	 padding:0px;
 }

#login{
	
/* 	background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
	background-image: url('<?php echo base_url();?>images1/gg.jpg');
	background-repeat: no-repeat;
   /*  background: linear-gradient(to top, rgb(28, 89, 157), rgb(75, 153, 219)); */
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
	
 }
 .warning-text
 {
	 color:#fff;
	 margin-bottom:0;
 }
   .btn-primary {
	margin-top:15px;
}
form{
	margin-top: 44px;
}
 #content {
    margin-top: 34px;
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
		<div class="container" id="content">

   
 
  



<div class="row">


<form class="form-signin" method="post" action="<?php echo site_url('dashboard/config');?>" >
<h4 style="color:white;"><?php echo $this->lang->line('config');?></h4>
<br>

			<p class="warning-text"><?php echo $this->lang->line('config_warning');?></p>
			
<br>
<div class="form-group">	
<textarea name="config_val" style="width:800px;height:500px; padding: 7px 0 0 15px;"><?php echo $result;?></textarea>
 

 			</div>
 			<div class="form-group">
			
					<button class="btn btn-primary" type="submit"><?php echo $this->lang->line('submit');?></button>
			</div>
 <input type="checkbox" name="force_write"  > <span style="font-size:11px;color:white;"> Tick if server required 777 permission to write file </span>

			</form>
</div>
 



</div>

<br><br>
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