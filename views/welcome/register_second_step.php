<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Astrone</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/elements.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/ico/apple-touch-icon-57-precomposed.png">

  
  
  
    <style id='font-awesome-inline-css' type='text/css'>
        [data-font="FontAwesome"]:before {
            font-family: 'FontAwesome' !important;
            content: attr(data-icon) !important;
            speak: none !important;
            font-weight: normal !important;
            font-variant: normal !important;
            text-transform: none !important;
            line-height: 1 !important;
            font-style: normal !important;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
        }

.fixedElement {
   
    position:fixed;
    bottom:-20px !important;
    width:100%;
    z-index:99999;
}
.error
{
	color:red;
}

.company{
	    max-height: 23px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.badgebox
{
opacity:0;	
}

.iwj-item{
	    height: max-content !important;
}
.jobtitles,.address,.domainsi{
    max-width: 235px !important;
    text-overflow: ellipsis !important;
    white-space: nowrap !important;
    overflow: hidden !important;

}

.jobtitles:hover, .domainsi:hover{
 white-space: unset !important;
   /* word-wrap: break-word !important; */

}

.iwj-employers-slider .employer-image img {
    max-width: 100px !important;
    max-height: 65px !important;
	    min-height: 60px !important;
    
}
.iwj-employers-slider .employer-title {
	
	margin-top:4px !important;
	line-height: 18px !important;
	
	    max-height: 24px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.iwj-employers-slider .employer-title:hover {
white-space: unset;
    word-wrap: break-word;
    max-height: 67px;
	
}

.iwj-employers-slider .employer-item {
	
	height:256px !important;
}

.iwj-employers-slider .total-jobs{
	    background: #2980B9 !important;
		font-weight:bold;
		color:#fff !important;
	
}
.job-image {
    border-radius: 5px;
    float: left;
    margin-top: 9px;
    overflow: hidden;
    max-width: 60px;
}

/* Hiding the checkbox, but allowing it to be focused */
.badgebox
{
    opacity: 0;
}

.badgebox + .badge
{
    /* Move the check mark away when unchecked */
    text-indent: -999999px;
    /* Makes the badge's width stay the same checked and unchecked */
	width: 27px;
}

.badgebox:focus + .badge
{
    /* Set something to make the badge looks focused */
    /* This really depends on the application, in my case it was: */
    
    /* Adding a light border */
    box-shadow: inset 0px 0px 5px;
    /* Taking the difference out of the padding */
}

.badgebox:checked + .badge
{
    /* Move the check mark back when checked */
	text-indent: 0;
}
    </style>
    </head>

    <body>

		<!-- Top menu -->
	

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Astrone</strong> Second Step Registration</h1>
                         
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	
                        	 <?php echo form_open_multipart('Profile_controller/do_upload')?>
							 
						<div class="input-group">
								<label>First Name</label>
                                <input type="text"  name="first_name" aria-label="Firstname" class="form-control" placeholder="Enter first name" value="<?php echo $profile[0]['first_name'] ;?>"    autofocus>		
								<!--<span class="error"><?php //echo form_error('first_name');?></span>-->
						</div>
						
					
						
						<div class="input-group">
								<label>Contact Number</label>
                                <input type="number" name="contact_no"  id="contactno"class="form-control" value="<?php echo $profile[0]['contact_no'] ;?>" placeholder="Enter contact number"  >								
						</div>
						<?php 
						
						$domain = $profile[0]['reg_no'];
						$dom = explode(',',$domain);
						?>
						<div class="input-group">
							<label>Domain Interested</label><br>
							<div class="chkwrap">
							 <label class="checkbox-inline pull-left">
							  <input type="checkbox" <?php if(in_array("PHP",$dom)){echo "checked"; } ?> name="domain[]" value="PHP">PHP
							</label>
							<label class="checkbox-inline pull-left">
							  <input type="checkbox" <?php if(in_array("JAVA",$dom)){echo "checked"; } ?> name="domain[]" value="JAVA">JAVA
							</label>
							<label class="checkbox-inline pull-left">
							  <input type="checkbox" <?php if(in_array("PYTHON",$dom)){echo "checked"; } ?> name="domain[]" value="PYTHON">PYTHON
							</label>
							<label class="checkbox-inline pull-left">
							  <input type="checkbox" <?php if(in_array("ANDROID",$dom)){echo "checked"; } ?> name="domain[]" value="ANDROID">ANDROID
							</label>
							<label class="checkbox-inline pull-left">
							  <input type="checkbox" <?php if(in_array("DOTNET",$dom)){echo "checked"; } ?> name="domain[]" value="DOTNET">DOTNET
							</label>
							<label class="checkbox-inline pull-left">
							  <input type="checkbox" <?php if(in_array("IOT",$dom)){echo "checked"; } ?> name="domain[]" value="IOT">INTERNET OF THINGS
							</label>
							<label class="checkbox-inline pull-left">
							  <input type="checkbox" <?php if(in_array("IS",$dom)){echo "checked"; } ?> name="domain[]" value="IS">INFORMATION SECURITY
							</label>
							<label class="checkbox-inline pull-left">
							  <input type="checkbox" <?php if(in_array("OTHERS",$dom)){echo "checked"; } ?> name="domain[]" value="OTHERS">OTHERS
							</label>
							
							</div>
						</div>
	
							
						
						<div class="input-group text-center btngroup">
						    <button type="submit" class="btn orangebtn">Update</button>
							<!--<button type="submit" class="btn" title="Login">Register</button>!-->
						
						</div>
</form>
		                    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/retina-1.1.0.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
        <script>
		function next_ques(curren_profile)
		{
			alert(curren_profile);
			if(curren_profile==1)
			{
				$("#third_two").css({"display": "none"});
			}
			else if(curren_profile==2)
			{
				$("#third_one").css({"display": "none"});
			}
			
		}
		</script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>