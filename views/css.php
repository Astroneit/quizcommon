 <style>
#login {
    background-attachment: fixed;
    /* background-image: url("http://localhost/onlineexam2/images1/blue.jpg"); */
		background-image: url('<?php echo base_url();?>images1/gg.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: -20px;
    overflow: hidden;
    position: relative;
    z-index: 10;
}
.container-fluid{
	 padding:0px;
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
 
 <div id="login" class="container-fluid">
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
<div class="row">

<div class="container" id="content">
<form class="form-signin" method="post" action="<?php echo site_url('dashboard/css');?>" >
<h4 style="color:white;"><?php echo $this->lang->line('custom_css');?></h4>
<br>

			 
			
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
<div class="container-fluid p0" >
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