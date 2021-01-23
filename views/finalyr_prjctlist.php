 <style>
.container-fluid{
	 padding:0px;
 }
.nav.navbar-nav.navbar-right a
{
	color:#000!important;
}
#nav-dropdown .dropdown-menu li a
{
	color:#fff!important;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: #fff!important;
}
#login{
		background-image: url('<?php echo base_url();?>images1/blue.jpg');
	background-repeat: no-repeat;
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
} 
th {
    background: #f4b609 none repeat scroll 0 0;
}
.btn-default {
    background-color: #5bc0de;
    border-color: #5bc0de;
    color: #fff;
}
 #content {
    margin-top: 34px;
}
 </style>
 <div class="container-fluid"id="login">
  <div class="container" id="content">
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
			<li></li>
			<li></li>
		
		
		</ul>

<?php 
$logged_in=$this->session->userdata('logged_in');
			 
			
			?>
   
 <h3 style="color:white;margin-bottom:20px;"><?php echo $title;?></h3>
 
    <?php 
	if($logged_in['su']=='1'){
		?>
		<div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('quiz/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?php echo $this->lang->line('search');?></button>
      </span>
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
	}
?>

  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
<table style="color:white;" class="table table-bordered">
<tr>
 <th>#</th>
 <th><center><?php echo $this->lang->line('project_title');?></center></th>
<th><center><?php echo $this->lang->line('project_platform');?></center></th>
<th><center><?php echo $this->lang->line('project_domain');?> </center></th>
<th><center><?php echo "Action";?> </center></th>
</tr>
<?php 
if(count($ieee_desc)== 0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
$j=1;
 foreach($ieee_desc as $key => $val)
 {
?>
<tr>
 <td><?php echo $j;?></td>
 <td><?php echo $val['p_title']; ?></td>
<td><?php echo $val['p_platform']; ?></td>
 <td><?php echo $val['p_domain']; ?></td>
 <?php
 $this->load->model('user_model');
$proj= $this->user_model->project_req1($val['sno'],$this->session->userdata('uid'));
 
if($proj == 1)
{
?>
<td> <span id="pro_req<?php echo $j; ?>"><input type= "button" value="Requested" id="project" name="project" style="background-color:blue;"></span></td>
<?php 
}
else{
?>
<td> <span id="pro_req<?php echo $j; ?>"><input type= "button" value="Request" id="project" name="project" style="background-color:blue;" onclick="project_req('<?php echo $val['sno']; ?>','<?php echo $val['p_title']; ?>','<?php echo $val['p_platform']; ?>','<?php echo $val['p_domain']; ?>','<?php echo $j; ?>');" ></span></td>
<?php
}
?>
</tr>

<?php 
$j++;
}
?>
</table>
</div>

</div>


<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('quiz/index/'.$back);?>"  class="btn btn-primary"><?php echo $this->lang->line('back');?></a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('quiz/index/'.$next);?>"  class="btn btn-primary"><?php echo $this->lang->line('next');?></a>


<br>
<br>


</div>
</div>

<div class="container-fluid" >
	<footer>
	<div class="container">
	
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<p>&copy; 2018 Infoziant. All Rights Reserved.</p>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<p class="pull-right hidden-xs"></p>
			</div>
			</div>
		
	</div>	<script>
function project_req(pro_id,title,platform,domain,incre)
{
//alert(" ");
 
$.ajax({
url: "<?php echo site_url('result/project_request');?>",
data:{project_id:pro_id,project_title:title,project_platform:platform,project_domain:domain},
type:"POST",
success:function(fffff){
$("#pro_req"+incre).html(fffff);
}
});
}
</script>
</footer>
	</div>