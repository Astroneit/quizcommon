<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Online Portal - User List Page</title>
<meta charset="UTF-8" />
<meta name="description" content="Merchant">
<meta name="keywords" content="Merchant Login">
<meta name="viewport" id="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="MobileOptimized" content="320"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />	
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="css/online-style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<style>
tr{
	background:white;
}
.container-fluid{
	 padding:0px;
 }
 #content {
    margin-top: 56px;
}
 #mytable th
 {
	background-color: #f4b609;
	color:#fff;
 }
.btn-info
{
	padding: 9px 13px;
}
.bn_btn
{
	background: #337ab7 none repeat scroll 0 0!important;
}

#login{
	
/* 	background-image: url('<?php echo base_url();?>images1/blue.jpg'); */
	background-image: url('<?php echo base_url();?>/images1/gg.jpg');
	background-repeat: no-repeat;
   /*  background: linear-gradient(to top, rgb(28, 89, 157), rgb(75, 153, 219)); */
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
 }
 .list_header
 {
	 margin-bottom:20px!important;
 }
</style>
</head>
<body>
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

<div id="wrapper"> 

	

	<div class="container" id="content">
		<h2 class="list_header">User List</h2>
			<div class="row">
				<div class="col-md-6" id="search-field">
				<form method="post" action="<?php echo site_url('user/index/');?>">
					<div class="input-group">
						<input type="text" class="form-control" name="search" placeholder="<?php echo $this->lang->line('search');?>..." id="search" value=""/>
							<span class="input-group-btn">
								<button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
							</span>
					</div>	
					</form>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12">
				<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
					<table id="mytable" class="table table-bordred table-striped">
						<tr>
<th>#</th>
<th><?php echo $this->lang->line('first_name');?> <?php echo $this->lang->line('last_name');?></th>
 <th><?php echo $this->lang->line('email');?></th>
 <th><?php echo "Mobile No";?></th>
<?php if($this->session->userdata('gid')==0)
{ ?>
<th><?php echo $this->lang->line('action');?> </th> <?php } ?>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}
$j=1;
foreach($result as $key => $val){
?>
<tr>
<td><?php echo $j;?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
 <td><?php echo $val['email'];?></td>
 <td><?php echo $val['contact_no'];?></td>
<?php if($this->session->userdata('gid')==0)
{?>
<td>
<a class='btn btn-success btn-xs' href="<?php echo site_url('user/edit_user/'.$val['uid']);?>"><span class="glyphicon glyphicon-pencil"></span></a>
<a class="btn btn-danger btn-xs" href="javascript:remove_entry('user/remove_user/<?php echo $val['uid'];?>');"><span class="glyphicon glyphicon-remove"></span></a>

</td><?php } ?>
</tr>

<?php 
$j++;
}
?>
						
					   
					</table>
					
					<div class="info-btn" id="user-back">
						<!--<button type="submit" class="btn" title="Back">Back</button>
						<button type="submit" class="btn" title="Next">Next</button>!-->
						
						<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('user/index/'.$back);?>"  class="btn bn_btn"><?php echo $this->lang->line('back');?></a>

<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('user/index/'.$next);?>"  class="btn bn_btn"><?php echo $this->lang->line('next');?></a>
						
					</div>
					
				</div>	
			</div>
	</div>
</div>	

<!--Footer-->
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
	</div>	
</footer>
<!--//Footer-->
</div>

</body>
</html>