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
		<div class="container" id="content" style="height:520px";>

   
 <h3 style="color:black; font-weight:bold;"><?php echo $title;?></h3>


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		<div id="message"></div>
		
		 <form method="post" action="<?php echo site_url('user/insert_group/');?>">
	
<table class="table table-bordered tbl">
<tr>
 <th><?php echo $this->lang->line('group_name');?></th>
<?php /*  <th><?php echo $this->lang->line('price'); ?></th> */ ?>
 <th><?php echo $this->lang->line('valid_for_days');?></th>
<th><?php echo $this->lang->line('action');?> </th>
<th><?php echo "Report";?> </th>
</tr>
<?php 
if(count($group_list)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}

foreach($group_list as $key => $val){
?>
<tr>
 <td><input type="text"   class="form-control"  value="<?php echo $val['group_name'];?>" onBlur="updategroup(this.value,'<?php echo $val['gid'];?>');" ></td>
<?php  /* <td>
 <?php echo $this->config->item('base_currency_prefix');?> <input type="text"      value="<?php echo $val['price'];?>" onBlur="updategroupprice(this.value,'<?php echo $val['gid'];?>');" >
  <?php echo $this->config->item('base_currency_sufix');?>  </td> */ ?>
 <td><input type="text"   class="form-control"  value="<?php echo $val['valid_for_days'];?>" onBlur="updategroupvalid(this.value,'<?php echo $val['gid'];?>');" ></td>
<td>
<a href="javascript:remove_entry('user/remove_group/<?php echo $val['gid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

</td>
<td>
<a href="<?php echo site_url('result/view_group_result/'.$val['gid']);?>" class="btn btn-success" ><?php echo $this->lang->line('view');?> </a></td>

</tr>

<?php 
}
?>
<tr>
 <td>
 
 <input type="text"   class="form-control"   name="group_name" value="" placeholder="<?php echo $this->lang->line('group_name');?>"  required ></td>
<td>
 
  <?php echo $this->config->item('base_currency_prefix');?> 
 <input type="text"     name="price" value="" placeholder="<?php echo $this->lang->line('price');?>"  required >
  <?php echo $this->config->item('base_currency_sufix');?>  </td>
<td>
 
 
 <input type="text"   class="form-control"   name="valid_for_days" value="" placeholder="<?php echo $this->lang->line('valid_for_days');?>"  required ></td>
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