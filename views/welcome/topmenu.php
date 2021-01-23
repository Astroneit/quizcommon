    <div class="header header-default header-style-default v1 absolute header-sticky no-header-sticky-mobile " style=" background-color:#fff;height:90px;" ><div class="navbar navbar-default iw-header" >
                <div class="navbar-default-inner">
                    <h1 class="iw-logo float-left">
				<a href="<?php echo base_url();?>index.php/login/reply" title="Astrone">
					<img class="main-logo" style="width:60%;margin-bottom:8%;    background-color: white;
    padding: 10px;
    border-radius: 30px;" src="<?php echo base_url();?>images1/AICLNEW.png" alt="Astrone" >
    
					<img class="sticky-logo"  src="<?php echo base_url();?>images1/AICLNEW.png" alt="Astrone" style="width:55%;    background-color: white;
    padding: 10px;
    border-radius: 30px;">
					<img class="logo-mobile" style="width:48%;" src="<?php echo base_url();?>images1/AICLNEW.png" alt="Astrone">
				</a>
			</h1>
                    <div class="header-btn-action" style="margin-left: 20px;height: 90px;">

                        <div class="btn-action-wrap">
                            <span class="off-canvas-btn">
                            <i class="fa fa-bars"></i>
                    </span>

                            <div class="iwj-author-mobile float-right" style="display:none;"><span class="login-mobile"><a class="login action-button" href=""><i class="fa fa-user"></i></a></span><span class="register-mobile"><a class="login action-button" href=""><i class="fa fa-user-plus"></i></a></span></div>
							
							
							<div class="notification" style="display:none;">
<a href="#" class="iwj_link_notice notice_active off-notification" data-user_id="0">
<i class="icon ion-person" style="color:white;"></i>

</a><div class="iwj-notification-menu" data-user_id=""><ul>

<li>
<a href="<?php echo base_url();?>index.php/login/edit_profile" data-notice_item="iwj_notice_register">

<span><b class="highlight">Update Profile</b> </span></a></li>


<li <?php if($this->uri->segment(2)=='online_exam'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115"><a href="<?php echo base_url();?>index.php/quiz">Online Exam </a>
                                     
                                    </li> 
                                    	<li <?php if($this->uri->segment(2)=='courses'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115"><a href="<?php echo base_url();?>index.php/login/courses">Courses </a>
                                     
                                    </li>

</ul></div></div>

                        </div>
                    </div>
                    <div class="iw-menu-header-default float-right" >
                        <nav class="main-menu iw-menu-main nav-collapse">
                            <!--Menu desktop-->
                            <div class="iw-main-menu">
                                <ul id="menu-main-menu-1" class="iw-nav-menu  nav-menu nav navbar-nav">
                                    <li <?php if($this->uri->segment(2)=='reply'){ echo "class='current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  page_item page-item-1485 current_page_item menu-item-has-children menu-item-1680"><a href="<?php echo base_url();?>index.php/login/reply">Home</a>
                                       
                                    </li>
                                    
                                   <?php /*<li <?php if($this->uri->segment(2)=='online_tutorial'){ echo "class='menuactive current-menu-item'"; } ?>  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-783"><a href="<?php echo base_url();?>index.php/login/online_tutorial">Tutorials</a>
                                       
                                    </li> <li <?php if($this->uri->segment(2)=='samp'){ echo "class='menuactive current-menu-item'"; } ?>  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-569"><a href="<?php echo base_url();?>index.php/compiler/comp">Compiler</a>
                                       
                                    </li><li <?php if($this->uri->segment(2)=='educational_updates'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-568"><a href="<?php echo base_url();?>index.php/login/educational_updates">Tech Events</a>
                                        
                                    </li> <li <?php if($this->uri->segment(2)=='cont'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children menu-item-2232"><a href="<?php echo base_url();?>index.php/Contact">Contact us</a>
                                        
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='courses'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115"><a href="<?php echo base_url();?>index.php/login/courses">Courses </a>
                                     
                                    </li>
                                    
                                    */ ?>
                                    	 
                                   <li <?php if($this->uri->segment(2)=='online_exam'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115"><a href="<?php echo base_url();?>index.php/quiz">Online Exam </a>
                                     
                                    </li> 
                                      <li <?php if($this->uri->segment(2)=='myjobs'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115"><a href="<?php echo base_url();?>index.php/login/myjobs">My Jobs</a>
                                     
                                    </li> 
                                    
                                    			<?php  
				if($this->session->userdata('admin_su')==1){ ?>
					     <li <?php if($this->uri->segment(2)=='myjobs'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115"><a href="<?php echo base_url();?>index.php/login/applied_jobs">Applied Jobs</a>  </li> 
                 <?php                    
                                  
				}?>
                                    
									<?php	if($this->session->userdata('uid')!="")
	{ ?>
	<li><a href="<?php echo base_url('');?>index.php/user/logout">Logout</a></li><?php } ?>
	
<li <?php if($this->uri->segment(2)=='edit_profile'){ echo "class='menuactive current-menu-item'"; } ?> class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115">
<a href="<?php echo base_url();?>index.php/login/edit_profile" data-notice_item="iwj_notice_register">

<span><b class="highlight"><i class="icon ion-person" style="color:black;"></i></b> </span></a></li>
                                </ul>
                            </div>
                        </nav>
                        
                    </div>
                </div>
            </div>
	<!-- 		<script>    
    

        var aurl = window.location.href; 

        $('#menu-main-menu-1  li a').filter(function() { 

            alert($(this).prop('href'));
           
            return $(this).prop('href') === aurl;
        }).parent('li').addClass('menuactive');
    
    </script>
 -->  </div>