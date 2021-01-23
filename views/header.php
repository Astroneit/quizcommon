<?php 

?><!DOCTYPE html>
<head>
<title>AICL Training</title>
<meta charset="UTF-8" />
<meta name="description" content="Merchant">
<meta name="keywords" content="Merchant Login">
<meta name="viewport" id="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="MobileOptimized" content="320"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="shortcut icon" href="<?php echo base_url();?>images1/favicon.ico" type="image/x-icon" />	
<link rel="stylesheet" href="<?php echo base_url();?>css1/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css1/online-style.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js1/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js1/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js1/common.js"></script>
	<script>
	
	var base_url="<?php echo base_url();?>";

	</script>
	
	<!-- jquery -->
	<script src="<?php echo base_url('js/jquery.js');?>"> </script>
	
	<!-- custom javascript -->
	<script src="<?php echo base_url('js/basic.js');?>"> </script>  <style>
    .navbar-nav > li > a {
    padding: 9px 11px 9px 11px !important;
    color:#222!important;
    }
	
	
	

	#logo img{
	
    margin-top: 3%;
 }
 
 .navbar{
	 min-height: 83px !important;
 }


.navbar-default {
  
    border-color: transparent !important;
}
    </style>
	
</head>

<?php 
			if($this->session->userdata('logged_in')){
				if($this->uri->segment(2)!='attempt'){
				$logged_in=$this->session->userdata('logged_in');
	?>
	<nav class="navbar navbar-default" role="navigation" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-dropdown">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="javascript:void(0);" id="logo"><img src="<?php echo base_url(); ?>images1/AICLNEW.png" style="width:60%;" alt="logo"/> </a>
				
			</div>
			<div class="collapse navbar-collapse" id="nav-dropdown">
				<ul class="nav navbar-nav navbar-right">
				
				   <li><a href="<?php echo base_url();?>index.php/quiz">Home</a></li>
				<?php  
				if($logged_in['su']==1){
			?>
					<!--<li><a href="#">Dashboard</a></li>!-->
					 <li class="dropdown" <?php if($this->uri->segment(1)=='dashboard'){ echo "class='active'"; } ?> ><a href="<?php echo site_url('dashboard');?>"><?php echo $this->lang->line('dashboard');?></a></li>
					<!--<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">List of Users</a></li>
								<li><a href="#">Add Users</a></li>
							</ul>
					</li>!-->
					<li class="dropdown" <?php if($this->uri->segment(1)=='user'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('users');?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo site_url('user/new_user');?>"><?php echo $this->lang->line('add_new');?></a></li>
                  <li><a href="<?php echo site_url('user/userlists');?>"><?php echo $this->lang->line('users');?> <?php echo $this->lang->line('list');?></a></li>
                  
                </ul>
              </li>
			<?php /*   <li class="dropdown" <?php if($this->uri->segment(1)=='video'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Videos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo site_url('video/add_new');?>">Add New Video</a></li>
                  <li><a href="<?php echo site_url('video/viewlist');?>">View Video</a></li>
                  <li><a href="<?php echo site_url('video/rearrange_video');?>">Rearrange Video</a></li>
                  
                </ul>
              </li>
			  
			  
			    <li class="dropdown" <?php if($this->uri->segment(1)=='learning'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Course <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo site_url('learning/add_new_course');?>">Add New Course</a></li>
                  <li><a href="<?php echo site_url('learning/viewcourse');?>">View Course</a></li>
                  
                </ul>
              </li> */
		 ?>
		
			   <?php 
			   
			 	if($this->session->userdata('gid')==0)
		{ ?>
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='qbank'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('qbank');?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo site_url('qbank/pre_new_question');?>"><?php echo $this->lang->line('add_new');?></a></li>
                  <li><a href="<?php echo site_url('qbank');?>"><?php echo $this->lang->line('question');?> <?php echo $this->lang->line('list');?></a></li>
                  
                </ul>
              </li>
			 
			
		    <?php
		}			
				}
				else
{
			?>
			 <?php /* <li <?php if($this->uri->segment(1)=='dashboard'){ echo "class='active'"; } ?> ><a href="<?php echo site_url('dashboard1');?>"><?php echo $this->lang->line('dashboard');?></a></li> */?>
			
			<?php 
				}
			?>
			  <li class="dropdown" <?php if($this->uri->segment(1)=='qbank'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('quiz');?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                 <?php  
				if($logged_in['su']==1){
			?>     <li><a href="<?php echo site_url('quiz/add_new');?>"><?php echo $this->lang->line('add_new');?></a></li>
              <?php 
				}
?>				 <li><a href="<?php echo site_url('quiz');?>"><?php echo $this->lang->line('quiz');?> <?php echo $this->lang->line('list');?></a></li>
               
                </ul>
              </li>
			  
			   <li><a href="<?php echo site_url('result');?>"><?php echo $this->lang->line('result');?></a></li>
			 <li><a href="<?php echo site_url('user/edit_user/'.$logged_in['uid']);?>"><?php echo $this->lang->line('myaccount');?></a></li>
			 
			 
			  <?php  
				if($this->session->userdata('admin_su')==1){
					
					
			?><?php /* <li><a href="<?php echo site_url('dashboard/Jobupdates');?>">Jobupdates</a></li>
			 <li><a href="<?php echo site_url('dashboard/Joblists');?>">Job Lists</a></li>
		  <li><a href="<?php echo site_url('user/edit_user/'.$logged_in['uid']);?>"><?php echo $this->lang->line('myaccount');?></a></li> <li><a href="<?php echo site_url('login/courses');?>">Courses</a></li>	 <li><a href="<?php echo site_url('payment_gateway');?>"><?php echo $this->lang->line('payment_history');?></a></li> */ ?>
			  <?php 
			 	if($this->session->userdata('gid')==0)
		{?>
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='user_group'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('setting');?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 
				 		<li><a href="<?php echo site_url('user/skills');?>">Add Skills</a></li>
				 		<li><a href="<?php echo site_url('Dashboard/newcompany');?>">Add Company</a></li>
						
								<li><a href="<?php echo site_url('dashboard/css');?>"><?php echo $this->lang->line('custom_css');?></a></li>
				 
                  <li><a href="<?php echo site_url('user/group_list');?>"><?php echo $this->lang->line('group_list');?></a></li>
                  <li><a href="<?php echo site_url('qbank/category_list');?>"><?php echo $this->lang->line('category_list');?></a></li>
                  <li><a href="<?php echo site_url('qbank/level_list');?>"><?php echo $this->lang->line('level_list');?></a></li>
                  
					<li><a href="<?php echo site_url('dashboard/config');?>"><?php echo $this->lang->line('config');?></a></li>
					 
					<li><a href="<?php echo site_url('dashboard/css');?>"><?php echo $this->lang->line('custom_css');?></a></li>
						  
                  
                </ul>
              </li>
			
			<?php 
		}
				}
				?><?php /*<li><a href="<?php echo site_url('result/final_yr_project');?>"><?php echo $this->lang->line('finalyr_project');?></a></li>*/ ?>
             <li><a href="<?php echo site_url('user/logout');?>"><?php echo $this->lang->line('logout');?></a></li>
			  
					
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
<?php 
			}
			}
	?>
	</html>