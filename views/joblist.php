
  <link type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/>
    
<style>
.container-fluid{
	 padding:0px;
 }

 .lisrt{
	  box-shadow: 5px 5px 21px grey;
 }
#search{
	border:1px solid black;
} 
 
#login{
	
	/* background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
	/* background-image: url('<?php echo base_url();?>/images1/gg.jpg'); */
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
    background: #5bc0de none repeat scroll 0 0;
    border-color: #5bc0de;
    color: #fff;
}
select
{
	padding:4px;
}
.filter_btn{
	 padding: 3px 12px;
    position: relative;
    top: -2px;
}
th
{
	background:#f4b609;
}
 #content {
   margin-top: 19px;
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

   
 <h3 style="color:black;font-weight:bold;text-align:center;margin-bottom: 22px;">List of Jobs Available</h3>
    <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('qbank/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" id="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
	 
	  
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		




<div class="panel " style="border:1px solid purple;" >
  <div class="panel-heading" style="background: purple; color: wheat;font-weight: bold;font-size: 16px;border:1px solid purple;">List of Jobs</div>
  <div class="panel-body">
  
<table style="color:white;"class="table table-bordered lisrt" id="example">
<thead>
<tr>
 <th>#</th>
 <th><?php echo "Company Name";?></th>
<th><?php echo "Technology";?></th>
<th><?php echo "Designation";?></th>
<th><?php echo "Location";?></th>
 


</tr>
</thead>
<tbody>
	<?php

$rowcount=1;
foreach($jobs as $key => $val){
?>
<tr>
 <td><?php echo $rowcount;?></td>
 <td><?php echo $val['company_name'];?></td>
<td><?php echo $val['technology'];?></td>
<td><?php echo $val['designation'];?></td>
<td><?php echo $val['location'];?></td>


</tr>

<?php 
$rowcount++;
}
?>
</tbody>
</table>
  
  </div>
</div>
		
	
</div>

</div>


<?php
/* if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('qbank/index/'.$back.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('qbank/index/'.$next.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a> */

?>





<br><br><br><br>




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

	
	 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 
  
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
	
</script>	
	