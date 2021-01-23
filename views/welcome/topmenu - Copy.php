 <div class="navbar navbar-default iw-header">
                <div class="navbar-default-inner">
                    <h1 class="iw-logo float-left">
				<a href="index.html" title="JobBoard">
					<img class="main-logo" src="http://jobboard.inwavethemes.com/wp-content/themes/injob/assets/images/logo.png" alt="JobBoard">
					<img class="sticky-logo" src="http://jobboard.inwavethemes.com/wp-content/themes/injob/assets/images/logo.png" alt="JobBoard">
					<img class="logo-mobile" src="http://jobboard.inwavethemes.com/wp-content/themes/injob/assets/images/logo-mobile.png" alt="JobBoard">
				</a>
			</h1>
                    <div class="header-btn-action">

                        <div class="btn-action-wrap">
                            <span class="off-canvas-btn">
                            <i class="fa fa-bars"></i>
                    </span>

                            <div class="iwj-author-mobile float-right"><span class="login-mobile"><a class="login action-button" href="http://jobboard.inwavethemes.com/login/"><i class="fa fa-user"></i></a></span><span class="register-mobile"><a class="login action-button" href="http://jobboard.inwavethemes.com/register/"><i class="fa fa-user-plus"></i></a></span></div>

                        </div>
                    </div>
                    <div class="iw-menu-header-default float-right">
                        <nav class="main-menu iw-menu-main nav-collapse">
                            <!--Menu desktop-->
                            <div class="iw-main-menu">
                                <ul id="menu-main-menu-1" class="iw-nav-menu  nav-menu nav navbar-nav">
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1485 current_page_item menu-item-has-children menu-item-1680 selected active "><a href="<?php echo base_url();?>index.php/login/reply">Home</a>
                                       
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-783"><a href="<?php echo base_url();?>index.php/login/online_tutorial">Tutorials</a>
                                       
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-569"><a href="#">Compiler</a>
                                       
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-568"><a href="<?php echo base_url();?>index.php/login/educational_updates">Tech Events</a>
                                        
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115"><a href="<?php echo base_url();?>index.php/login/online_exam">Online Exam </a>
                                     
                                    </li>
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-has-children menu-item-2232"><a href="#">Contact us</a>
                                        
                                    </li>
									<?php	if($this->session->userdata('uid')!="")
	{ ?>
	<li><a href="<?php echo base_url('');?>index.php/user/logout"><?php echo $this->lang->line('logout');?></a></li><?php } ?>
                                </ul>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
			<script>    
    

        var aurl = window.location.href; 

        $('#menu-main-menu-1  li a').filter(function() { 
           
            return $(this).prop('href') === aurl;
        }).parent('li').addClass('menuactive');
    
    </script>