
<!DOCTYPE HTML>
<html>

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>AICL Training</title>
<!-- Custom Theme files -->
<link href="<?php echo base_url();?>register/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<!-- //for-mobile-apps -->
<!-- font-awesome icons -->
<link href="<?php echo base_url();?>register/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!--Google Fonts-->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">


<link rel="stylesheet" href="<?php echo base_url();?>register/css/multiple-select.css" /> 

<style>
.agileinfo-follow {
    margin: 2em 0 2em 0 !important;
	
	}
	
	.content-info {
    padding: 4em 3em !important;
	
	}

	
	#domain{
	width: 100%;
    padding: 5%;
    background: transparent;
    color: white;
    border: 1px solid white;
	}
	
	#domain option{
	color: #000;
	}
	
	#name:focus,#mobile:focus,#email:focus,#pass:focus{
	    border: 1px solid #b2d236;
	}
	
	.ms-choice{
	background-color: transparent;
    
	
	padding: 8%;
    border: 1px solid white !important;
    border-radius: 0px;
	
	
	}
	
	.ms-choice span{
	color:#fff;
	
	padding-top: 4%;
    
    padding-left: 5%;
	}
	
	.ms-choice > span.placeholder{
	padding-top: 4%;
    color: white;
    padding-left: 5%;
	}
	
	ms-parent{
	    padding: 2%;
    background: transparent;
    color: white;
    border: 1px solid white;
	}
	
	body{
		   background: url(<?php echo base_url();?>register/images/banner-4.jpg) no-repeat 0px 0px;
		
	}
	
	#addr,#sigin{
	font-weight:bold;
		
	}
	
	.error p
{
		color:#b7041d;
	font-size:12px;
	
	    margin-top: -7%;
    margin-bottom: 1%;
}

.errors p{
	color:wheat;
	font-size:12px;
	
	    margin-top: 1%;
   
}

#but{
	
	margin-top: 5%;
}

#mainerr{
	
	color: wheat;
    text-transform: uppercase;
}

#group{
	    width: 100%;
    height: 46px;
    background: transparent;
    border: 1px solid white;
    color: white;
    margin-bottom: 7%;
}
#group option{
	    color: black;
}
</style>

</head>
<body>
<script src='../../../../../../../ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="../../../../../../../m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>

<body>
<div class="wthree-dot">




	<div class="profile" style="margin-top:-4%;">
		<div class="wrap">
			<div class="wthree-grids">
				
				<div class="content-main" style="margin-top:5%;">
				
					<div class="w3ls-subscribe" style="padding-top: 7%;">
					<center><img src="<?php echo base_url();?>images1/AICL_Logo.png" style="background-color: white;
    border-radius: 32px;
    padding: 6px;width: 45%;" /></center>

	
	
					<span id="mainerr">
					<?php
if(isset($message_display)){
	echo $message_display;
}
?>
					</span>
						<h4 style="padding-top:5%;">New Visitor?</h4>
						<form method="post" action="<?php echo site_url('Login/register_account');?>">
						
							<input type="text" name="name" id="name" placeholder="Full Name *" value="<?php echo set_value('name'); ?>" autocomplete="off" >							
							<span class="error"><?php echo form_error('name');?></span>
							
							<?php /* <input type="text" name="register_no" id="register_no" placeholder="University Roll No *" value="<?php echo set_value('register_no'); ?>" autocomplete="off" >							
							<span class="error"><?php echo form_error('register_no');?></span> */
                       							?>
						
							<input type="text" name="mobile" id="mobile" placeholder="Mobile Number *" value="<?php echo set_value('mobile'); ?>"  autocomplete="off">
							<span class="error"><?php echo form_error('mobile');?></span> 
                       
							
							<input type="email" name="email" id="email" placeholder="Email Address *" value="<?php echo set_value('email'); ?>" onkeyup="checkemail();" autocomplete="off">
							<span class="error"><?php echo form_error('email');?></span>
                       														
							
							<input type="password" name="password" id="pass" placeholder="Password *" >
							<span class="error"><?php echo form_error('password');?></span>
							
							<input type="password" name="retype_password" id="retype_password" placeholder="Retype Password *" >
							<span class="error"><?php echo form_error('retype_password');?></span>
							
<select class="form-control" name="degree"  id="group">
								<option value="">  Select Your Degree</option>
						
						    <option value="Bachelor">Bachelor</option>
						    <option value="Master">Master</option>
						    <option value="Others">Others</option>
						 
							</select>
					   	<span class="error" style=""><?php echo form_error('degree');?></span>
	<select class="form-control" name="department"  id="group">
								<option value="">  Select Your Department</option>
						 
						    		<option value="cse">CSE</option>
											<option value="it">IT</option>
											<option value="ece">ECE</option>
												<option value="eee">EEE</option>
												<option value="eie">EIE</option>
															<option value="mech">Mech</option>
																<option value="civil">Civil</option>
																	<option value="bme">BME</option>
																		<option value="biotech">Bio-Tech</option>
																			<option value="aero">Aero</option>
																				<option value="agri">Agri</option>
											<option value="others">Others</option>
						 
							</select>
							
							<span class="error"><?php echo form_error('department');?></span>
							 
								<?php /* <select class="form-control" name="group"  id="group">
								<option value="">  Select Your Group *</option>
						   <?php 
						  
						   foreach($group_list as $group_name)
						   {?>
						    <option value="<?php echo $group_name['gid'];?>"><?php echo $group_name['group_name'];?></option>
						   <?php } ?>
							</select>
							<span class="error"><?php echo form_error('group');?></span>	 */  ?>
							
						
							
							<input type="submit" value="Sign Up" id="but">
						</form><p style="color:white;margin-top: 4%;">Already Registered? <a href="<?php echo site_url();?>/Login" style=" color: wheat; font-family: -webkit-body;font-weight: bold;font-size: 16px;">Login</a></p>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="wthree_footer_copy">
				<p>© 2020 All rights reserved | Design by <a href="https://aicl.training/">AICL</a></p>
			</div>
		</div>
	</div>
</div>
									<!--banner Slider starts Here-->
									
									
									
									
									
					<script src="<?php echo base_url();?>register/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>register/js/multiple-select.js"></script>
<script>
    $(function() {
        $('#domain').change(function() {
            console.log($(this).val());
        }).multipleSelect({
		    placeholder: 'Select Your Domain',
            width: '100%'
			
          
        });
    });
</script>
       


<script type="text/javascript">


function checkemail()
{
	//alert("ss");
 var email=document.getElementById("email").value;
//	alert(email);
 if(email)
 {
	//alert("ss");
  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/Register/check_email_avalibility",
  data: {
   user_email:email
  },
  success: function (response) {
	  //alert(response);
   $( '#name_status' ).html(response);
   if(response=="OK")	
   {
    return true;	
   }
   else
   {
    return false;	
   }
  }
  });
 }
 else
 {
  $( '#name_status' ).html("");
  return false;
 }
}



</script>	   
</body>


</html>