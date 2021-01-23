<nav class="off-canvas-menu off-canvas-menu-scroll">
        <h2 class="canvas-menu-title">Main Menu <span class="text-right"><a href="#" id="off-canvas-close"><i class="fa fa-times"></i></a></span></h2>
        <ul id="menu-main-menu" class="canvas-menu">
            <li id="menu-item-1680" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1485 current_page_item menu-item-has-children menu-item-1680 selected active "><a href="<?php echo base_url();?>index.php/login/reply">Home</a>
            </li>
           
            <li id="menu-item-569" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-569"><a href="<?php echo base_url();?>index.php/login/online_tutorial">Tutorials</a>
            </li>
			
            <li id="menu-item-568" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-568"><a href="#">Compiler</a>
              
            </li>
            <li id="menu-item-2115" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2115"><a href="<?php echo base_url();?>index.php/login/educational_updates"">Tech Events</a>
              
            </li>
			
            <li id="menu-item-2232" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor menu-item-has-children menu-item-2232"><a href="<?php echo base_url();?>index.php/login/online_exam">Online Exam</a>
                
            </li>
			<li id="menu-item-286" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-286"><a href="#">Contact Us </a></li>
		        
                                    </li>
									<?php	if($this->session->userdata('uid')!="")
	{ ?>
	<li><a href="<?php echo site_url('user/logout');?>"><?php echo $this->lang->line('logout');?></a></li><?php } ?>
        </ul>
    </nav>