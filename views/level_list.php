<style>
th{
	color:white;
	background-color: #f4b609;
}
.container-fluid{
	 padding:0px;
 }
.tbl{
	 box-shadow: 5px 5px 21px grey;
}

#login{
	
	/* background-image: url('<?php echo base_url();?>images1/blue.jpg'); 
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
		<div class="container" id="content" style="height:520px;">

   
 <h3 style="color:black;font-weight:bold;"><?php echo $title;?></h3>


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		<div id="message"></div>
		
		 <form method="post" action="<?php echo site_url('qbank/insert_level/');?>">
	
<table class="table table-bordered tbl">
<tr>
 <th><?php echo $this->lang->line('level_name');?></th>
<th><?php echo $this->lang->line('action');?> </th>
</tr>
<?php 
if(count($level_list)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}

foreach($level_list as $key => $val){
?>
<tr>
 <td><input type="text"   class="form-control"  value="<?php echo $val['level_name'];?>" onBlur="updatelevel(this.value,'<?php echo $val['lid'];?>');" ></td>
<td>
<a href="javascript:remove_entry('qbank/remove_level/<?php echo $val['lid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

</td>
</tr>

<?php 
}
?>
<tr>
 <td>
 
 <input type="text"   class="form-control"   name="level_name" value="" placeholder="<?php echo $this->lang->line('level_name');?>"  required ></td>
<td>
<button class="btn btn-default" type="submit"><?php echo $this->lang->line('add_new');?></button>
 
</td>
</tr>
</table>
</form>
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