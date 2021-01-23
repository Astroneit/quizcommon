
    <!DOCTYPE html>
    <html lang="en">

	
	
	
	
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Portal</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="<?php echo base_url();?>css2/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/toaster.css">
		
        <style>
            #panel {
                display: none;
            }
            span.multiselect-native-select {
	position: relative
}
.checkbox {
    color: #222;
}
.control-label {
    text-align: left;
    font-size: 12px;
}
span.multiselect-native-select select {
	border: 0!important;
	clip: rect(0 0 0 0)!important;
	height: 1px!important;
	margin: -1px -1px -1px -3px!important;
	overflow: hidden!important;
	padding: 0!important;
	position: absolute!important;
	width: 1px!important;
	left: 50%;
	top: 30px
}
.multiselect-container.dropdown-menu
{
    width: 32vw;
    -moz-width:100%;
    z-index: 99999;
 
}
.multiselect-container {
	position: absolute;
	list-style-type: none;
	margin: 0;
	padding: 0
}
.multiselect-container .input-group {
	margin: 5px
}
.multiselect-container>li {
	padding: 5px 0 3px 0;
    width: 100% !important;
    float: left;
}
.multiselect-container>li>a.multiselect-all label {
	font-weight: 700
}
.multiselect-container>li.multiselect-group label {
	margin: 0;
	padding: 3px 20px 3px 20px;
	height: 100%;
	font-weight: 700
}
.multiselect-container>li.multiselect-group-clickable label {
	cursor: pointer
}
.multiselect-container>li>a {
	padding: 0
}
.multiselect-container>li>a>label {
	margin: 0;
	height: 100%;
	cursor: pointer;
	font-weight: 400;
	padding: 3px 0 3px 30px;
	width: 100%;
}
.multiselect-container>li>a>label.radio, .multiselect-container>li>a>label.checkbox {
	margin: 0
}
.multiselect-container>li>a>label>input[type=checkbox] {
	margin-bottom: 5px
}
.btn-group>.btn-group:nth-child(2)>.multiselect.btn {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px
}
.form-inline .multiselect-container label.checkbox, .form-inline .multiselect-container label.radio {
	padding: 3px 20px 3px 40px
}
.form-inline .multiselect-container li a label.checkbox input[type=checkbox], .form-inline .multiselect-container li a label.radio input[type=radio] {
	margin-left: -20px;
	margin-right: 0
}
.multiselectwrap
{
    float: left;
    width: 100%;
}
.error p
{
	color:red;
	font-size:12px;
}
        </style>

    </head>

    <body style="background:url('<?php echo base_url();?>css2/banner-4.jpg'); background-repeat:no-repeat; background-position: center; background-size:cover; position:relative; height: 100%;  ">

        <div class="container-fluid pinkbg">

            <div class="">
                <div class="row">
                    <div class="col-md-12 p0">
                        <div class="info ">
                            <div class="top-left col-md-5">
                                <ul class="leftbar">
                                    <li>
                                        <span class="glyphicon glyphicon-earphone"></span> +91 801 555 2626
                                    </li>
                                    <li>
                                        <span class="glyphicon glyphicon-envelope"></span> pokeme@infoziant.com
                                    </li>
                                </ul>
                                <!-- <div class="logo">
					<h3>Student Portal</h3>
				</div> -->
                            </div>
                            <div class="login col-md-7">
                                <form id="login" method="post" class="form-inline loginform windowlogin"  action="<?php echo site_url('Login/verifylogin');?>">
                                    <div class="form-group">
                                       
                                        <input type="email" name="emails" placeholder="Enter Email" />
										
										<span style="color:red;"><?php echo form_error('emails'); ?></span>
                                    </div>
                                    <div class="form-group">
                                     

                                        <input type="password" name="passwords" placeholder="Password" />
										<span style="color:red;"><?php echo form_error('passwords'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit" value="send">Login</button>
                                        <!--<a href="#" class="colorwhite forgot">Forgot Password?</a>-->
                                    </div>
                                </form>
<?php 
		if($this->session->flashdata('message')){
	
		echo "<script>   setTimeout(function() {
               toastr.options = {
                   closeButton: true,
                   progressBar: true,
                   showMethod: 'slideDown',
                   timeOut: 4000
               };
               toastr.error('invalid username or password');

           }, 100);
		   
		   </script>";
		}
		?>
                              <?php  /* <div class="loginslide">
                                    <div id="flip">Click here to login</div>
                                    <div id="panel">

                                        <form id="login" method="post" class="form-inline loginform">
                                            <div class="form-group">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="username" placeholder="Email or phone number" />
                                            </div>
                                            <div class="form-group">
                                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>

                                                <input type="password" name="password" placeholder="Password" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" value="send">Login</button>
                                                <a href="#" class="colorwhite forgot">Forgot Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div> */?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form">
            <div class="regwrapper">

                <!--  <div class="thumbnail"><img src="gc.png"/></div> -->
<?php
if(isset($message_display)){
	echo $message_display;
}
   ?>             
              <form class="login-form toggleform" method="post" action="<?php echo site_url('Login/register_account');?>">
                    <div class="txtwrap">
                        <h3>REGISTER ACCOUNT</h3>

                    </div>
					
					                    <div class="form-group">
										
                        <label> EMAIL ADDRESS</label>
						<span class="error"><?php echo form_error('email');?></span>
                       

                        <input type="text" placeholder="Enter email address" name="email" id="email" onkeyup="checkemail();" />
						
						
                    </div>
					
					                    <div class="form-group">
                       <label>  PASSWORD</label><span class="error"><?php echo form_error('password');?></span>
                     
                        <input type="password" name="password" placeholder="Enter your Password" />
						
                    </div>
					
                    <div class="form-group">
                        <label>Full NAME</label><span class="error"><?php echo form_error('name');?></span>
                       
                        <input type="text" placeholder="Enter your name" name="name"/>
						
                    
                    </div>

                    <div class="form-group">
                        <label>MOBILE NUMBER</label>	<span class="error"><?php echo form_error('mobile');?></span>
                       

                        <input type="text" placeholder="Enter mobile number" name="mobile"/>
					
                    </div>



                    <div class="form-group">
                        <label>DEPARTMENT</label>	<span class="error"><?php echo form_error('department');?></span>
                     

                        <input type="text" placeholder="Enter Department" name="department"/>
					
                    </div>

                     <div class="form-group multiselectwrap">
                        <label class="col-md-12 p0 control-label" for="rolename">DOMAIN INTERESTED?</label>		<span class="error"><?php echo form_error('interest');?></span>
                        <div class="col-md-12 p0">
                            <select size="3" id="dates-field2" name="interest[]" class="multiselect-ui form-control" multiple="multiple">
                                <option value="PHP">PHP</option>
                                <option value="JAVA">JAVA</option>
                                <option value="ANDROID">ANDROID</option>
                                <option value="DOTNET">DOTNET</option>
                                <option value="IOT">IOT</option>
                                <option value="Others">Others</option>
                              
                            </select>
					
                        </div>
                    </div> 
                                <?php 
								/* <div class="form-group">
                        <label>DEPARTMENT</label>
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>

                        <input type="text" name="interest" placeholder="Enter Interested" />
						<?php echo form_error('interest');?>
                    </div>         */         
?>
                    <div class="form-group">
                        <button>Create Account</button>
                        <!--<p class="message">Already registered? <a href="<?php echo site_url('Register/login_check'); ?>">Sign In</a></p>-->
                    </div>
                </form>

            </div>
            <div class="loginwrapper">

                <form class="register-form toggleform userlogin" method="post" action="<?php echo site_url('Register/login_check')?>" >
                    <div class="txtwrap">
                        <h3>LOGIN ACCOUNT</h3>

                    </div>
                    <div class="form-group">
                        <label>EMAIL</label>
                        <i class="fa fa-user"></i>
                        <input type="text" placeholder="Enter Email" name="email" />
                    </div>

                    <div class="form-group">
                        <label>PASSWORD</label>
                        <i class="fa fa-key" aria-hidden="true"></i>

                        <input type="password" placeholder="Enter password" name="password" />
                    </div>

                    <div class="form-group">
                        <button>Login</button>
                        <p class="message">Not registered? <a href="<?php echo site_url('Register/index'); ?>">Create an account</a></p>
                    </div>
                </form>

            </div>
        </div>

        <div class="container-fluid footer">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center colorwhite">Copyright @ 2018 Students Portal. All rights reserved. Designed by <a href="http://infoziant.com/" target="_blank">Infoziant Systems Pvt Ltd</a></p>
                </div>
            </div>
        </div>
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
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="<?php echo base_url();?>js2/index.js"></script>
		        <script src="<?php echo base_url();?>js/toastr.min.js"></script>
          <script src="<?php echo base_url();?>js2/multiselect.js"></script>
               
        <script>
            $(document).ready(function() {
                $("#flip").click(function() {
                    $("#panel").slideToggle("slow");
                });
            });
        </script>
 <script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>
    </body>

    </html>