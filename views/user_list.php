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

#search{
border: 1px solid black;
}
 #content {
    margin-top: 56px;
}
 #mytable th
 {
	background-color: #9C27B0;
	color:#fff;
	text-align:center;
 }
 
 
 #mytable tr:hover{
	 background:lightgrey;
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
 .list_header
 {
	 margin-bottom:20px!important;
 }
 
 .link{
	 padding: 6% !important;
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
						<input type="text" class="form-control" name="search" placeholder="Search by Username 
 or UserID or Email ID Here" id="search" value=""/>
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
			
<div class="row">

<?php $kk=1;foreach($result as $key => $val){ ?>

<div class="col-lg-3 col-md-3 col-sm-4 ">




<div class="card card_<?php echo $kk; ?>"style="background:white;     margin-bottom: 6%;   margin-left: 3%;   width: 100%;     padding: 9%;    border-radius: 3px;  box-shadow: 5px 5px 24px grey;">
   
    <div class="card-body" style="padding-bottom: 2%;">
	<label>User ID: <span style="color: palevioletred;"><?php echo $val['uid'];?></span></label>
	<div style="text-align:center;">
	
	
	<?php if($val['img']!=""){ ?>
	
	<img src="<?php echo base_url();  ?>upload/<?php echo $val['img']; ?>" class="rounded-circle" style="border-radius:50%;width: 110px;margin-top: 3%;
    border: 3px solid grey;    min-height: 110px;">
	
	
<?php } else {  ?>
	
	<img src="<?php echo base_url();  ?>upload/nobody.jpg" class="rounded-circle" style="border-radius:50%;width: 110px;margin-top: 3%;
    border: 3px solid grey;">
	
<?php }?>
	
	<h3 class="fname"   style="font-weight:bold;font-size: 20px;color: navy; text-overflow: ellipsis;
  overflow: hidden; max-height: 22px;  white-space: nowrap;"><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></h3>
  
  <style>
  .fname::first-letter{
	  text-transform:uppercase;
  }
  .card{
	      max-height: 312px !important;
  }
  .fname:hover{
	 
  overflow: visible !important; 
  
  max-height: 38px !important;
  white-space: unset !important;
 
  }
  
  
   .grplab:hover{
	 
  overflow: visible !important; 
  
  max-height: 31px !important;
  white-space: unset !important;
 
  }
  

  <?php if ($kk % 2 != 0) {  ?>
 
 /*  .card_<?php echo $kk; ?>
{
  background: papayawhip !important;
}
 */
<?php } ?>
  
  </style>
  
  
    

  
  
	<label  class="grplab" style="font-weight:bold;text-overflow: ellipsis;
  overflow: hidden; max-height: 22px;  white-space: nowrap;">Group : <?php echo $val['group_name'];?></label>
	
	
	<?php if($this->session->userdata('gid')==0)
{?>
	<div style="margin-top: 5%;">
	<a href="<?php echo site_url('user/edit_user/'.$val['uid']);?>" class="btn btn-success" style="border-radius: 0px;font-weight: bold;border:none;outline:none;" >Update</a>
	<a href="javascript:remove_entry('user/remove_user/<?php echo $val['uid'];?>');" class="btn btn-danger" style="border-radius: 0px;font-weight: bold;border:none;outline:none;">Delete</a>
	
	</div>
	
<?php } ?>
	</div>
	</div>
  </div>
  
  
  </div>
  
<?php $kk++; } ?>

  </div>








	<!--		<table id="mytable" class="table table-bordered table-striped">
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
<a class='btn btn-success btn-xs link' href="<?php echo site_url('user/edit_user/'.$val['uid']);?>"><span class="glyphicon glyphicon-pencil"></span></a>
<a class="btn btn-danger btn-xs link" href="javascript:remove_entry('user/remove_user/<?php echo $val['uid'];?>');"><span class="glyphicon glyphicon-remove"></span></a>

</td><?php } ?>
</tr>

<?php 
$j++;
}
?>
						
					   
					</table>-->
					
					
					
					
					
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
			<div style="text-align:center;">
				<p>&copy; 2018 Infoziant. All Rights Reserved.</p>
			</div>
		</div>
	</div>	
</footer>
<!--//Footer-->
</div>

</body>
</html>