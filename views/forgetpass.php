<html>
<head>

<style>
@import url("https://fonts.googleapis.com/css?family=Open+Sans");
*, *:after, *:before {
  box-sizing: border-box;
}

body {
background:url('<?php echo base_url(); ?>forgetpass/imgs.jpg');
  font-family: 'Open Sans', sans-serif;
 
  background-size:cover;
  height:100%;
}

.grop-from {
  width: 500px;
  height: 70px;
  position: fixed;
  left: 27%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  border-radius: 50px;
}
.grop-from .form-body {
  height: 70px;
  overflow: hidden;
  border-radius: 50px;
}
.grop-from .form-body .error-text {
  position: absolute;
  left: 80px;
  top: 4px;
  z-index: 25;
  color: #b71c1c;
  font-size: 10px;
  font-weight: 600;
  display: none;
}
.grop-from .form-body .form-controls {
  position: relative;
  z-index: 5;
  transition: ease-in 0.2s;
  top: 0;
}
.grop-from .form-body .form-controls input {
  display: block;
  width: 100%;
  height: 70px;
  padding: 10px 60px 10px 80px;
  font-size: 18px;
  color: #666;
  border: none;
}
.grop-from .form-body .form-controls input:focus {
  outline: none;
}
.grop-from .form-head {
  position: absolute;
  left: 0;
  top: 0;
  width: 70px;
  height: 100%;
  background: #F50057;
  border-radius: 50px;
  text-align: center;
  line-height: 70px;
  font-size: 22px;
  color: #fff;
  cursor: pointer;
  z-index: 40;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
  transition: ease-in 0.2s;
}
.grop-from .form-head .text {
  display: none;
}
.grop-from .form-head .text:before {
  font-family: 'Open Sans', sans-serif;
}
.grop-from .form-action {
  position: absolute;
  width: 50px;
  height: 50px;
  background: #fefefe;
  text-align: center;
  right: 10px;
  top: 50%;
  border-radius: 50px;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index: 50;
  cursor: pointer;
  transition: 0.3s;
  border: none;
  outline: none;
  color: inherit;
}
.grop-from .form-action:hover {
  background: #f9f9f9;
}
.grop-from .form-action .icon-action {
  transition: ease-in 0.2s;
}
.grop-from .form-action .icon-action:after {
  line-height: 50px;
  content: 'arrow_forward';
}
.grop-from .form-action .icon-action.back {
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}
.grop-from .icon-placeholder {
  font-size: 40px;
  line-height: 70px;
}
.grop-from#signup {
  color: #fff;
}
.grop-from#signup .form-head {
  width: 100%;
}
.grop-from#signup .form-head .icon-placeholder {
  display: none;
}
.grop-from#signup .form-head .text {
  display: block;
}
.grop-from#signup .form-head .text:before {
  content: 'Forget Password';
}
.grop-from#signup .form-action {
 /*  right: 100px; */
  background: none;
  line-height: 65px;
}
.grop-from#signup .form-action .icon-action.back {
  -webkit-transform: rotate(0);
  transform: rotate(0);
}
.grop-from#success {
  color: #fff;
}
.grop-from#success .form-head {
  width: 100%;
  background: #00E676;
}
.grop-from#success .form-head .icon-placeholder {
  display: none;
}
.grop-from#success .form-head .text {
  display: block;
}
.grop-from#success .form-head .text:before {
  content: 'Success';
}
.grop-from#success .form-action {
  right: 90px;
  background: none;
  line-height: 65px;
}
.grop-from#success .form-action .icon-action.back {
  -webkit-transform: rotate(0);
  transform: rotate(0);
}
.grop-from#success .form-action .icon-action:after {
  content: 'mood';
}
.grop-from#name {
  color: #9C27B0;
}
.grop-from#name .form-head {
  background: #9C27B0;
}
.grop-from#name .form-head .icon-placeholder:after {
  content: 'face';
}
.grop-from#phone {
  color: #009688;
}
.grop-from#phone .form-head {
  background: #009688;
}
.grop-from#phone .form-head .icon-placeholder:after {
  content: 'phone';
}
.grop-from#phone .form-body .form-controls {
  top: -70px;
}
.grop-from#email {
  color: #039BE5;
}
.grop-from#email .form-head {
  background: #039BE5;
}
.grop-from#email .form-head .icon-placeholder:after {
  content: 'mail_outline';
}
.grop-from#email .form-body .form-controls {
  top: -140px;
}
.grop-from#password {
  color: #37474F;
}
.grop-from#password .form-head {
  background: #37474F;
}
.grop-from#password .form-head .icon-placeholder:after {
  content: 'lock_outline';
}
.grop-from#password .form-body .form-controls {
  top: -210px;
}
.grop-from#password-repeat {
  color: #212121;
}
.grop-from#password-repeat .form-head {
  background: #212121;
}
.grop-from#password-repeat .form-head .icon-placeholder:after {
  content: 'lock';
}
.grop-from#password-repeat .form-body .form-controls {
  top: -280px;
}
.grop-from.error .form-head {
  background: #b71c1c !important;
}
.grop-from.error .form-head .icon-placeholder:after {
  content: 'close' !important;
}
.grop-from.error .form-body .form-controls input:-moz-placeholder {
  color: #b71c1c;
}
.grop-from.error .form-body .form-controls input::-moz-placeholder {
  color: #b71c1c;
}
.grop-from.error .form-body .form-controls input:-ms-input-placeholder {
  color: #b71c1c;
}
.grop-from.error .form-body .form-controls input::-webkit-input-placeholder {
  color: #b71c1c;
}

.material-icons, .grop-from .form-action .icon-action, .icon-placeholder {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  /* Preferred icon size */
  display: inline-block;
  line-height: 1;
  text-transform: none;
  letter-spacing: normal;
  word-wrap: normal;
  white-space: nowrap;
  direction: ltr;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-feature-settings: 'liga';
          font-feature-settings: 'liga';
}

#sub {
    padding: 6%;
    width: 60%;
    background: slategray;
    border: none;
    color: white;
    outline: none;
    margin-left: 12%;
    margin-top: 14%;
    cursor: pointer;
}
@media (min-width:870px) and (max-width:990px)
{
	.grop-from {
    width: 415px;
    height: 70px;
    position: fixed;
    left: 27%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    border-radius: 50px;
}
#sub {
    padding: 3%;
    width: 24%;
    background: slategray;
    border: none;
    color: white;
    outline: none;
    margin-left: 0%;
    margin-top: 10%;
    cursor: pointer;
    float: left;
}
}
@media (min-width:601px) and (max-width:869px)
{
	.grop-from {
    width: 468px;
    height: 70px;
    position: fixed;
    left: 50%;
    top: 40%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    border-radius: 50px;
}
	#sub {
    padding: 3%;
    width: 27%;
    background: slategray;
    border: none;
    color: white;
    outline: none;
    margin-left: -2%;
    margin-top: 10%;
    cursor: pointer;
}
}
@media (min-width:400px) and (max-width:600px)
{
	.grop-from {
    width: 376px;
    height: 70px;
    position: fixed;
    left: 50%;
    top: 38%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    border-radius: 50px;
}
#sub {
    padding: 3%;
    width: 33%;
    background: slategray;
    border: none;
    color: white;
    outline: none;
    margin-left: -1%;
    margin-top: 14%;
    cursor: pointer;
}
}
@media (min-width:301px) and (max-width:399px)
{
.grop-from {
    width: 272px;
    height: 70px;
    position: fixed;
    left: 50%;
    top: 40%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    border-radius: 50px;
}
#sub {
    padding: 4%;
    width: 42%;
    background: slategray;
    border: none;
    color: white;
    outline: none;
    margin-left: -3%;
    margin-top: 14%;
    cursor: pointer;
}
}
@media (min-width:280px) and (max-width:300px)
{
.grop-from {
    width: 272px;
    height: 70px;
    position: fixed;
    left: 50%;
    top: 40%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    border-radius: 50px;
}
#sub {
    padding: 4%;
    width: 42%;
    background: slategray;
    border: none;
    color: white;
    outline: none;
    margin-left: -3%;
    margin-top: 14%;
    cursor: pointer;
}
}
</style>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body >
<div class="container">
<div class="row">
<div class="col-md-12">
<form class="grop-from" method="POST" action="<?php echo site_url() ; ?>/Forgetpass_controller/forgetpass" id="signup">



<div class="col-md-8">

<div class="total">
  <div class="form-head"><span class="text"> </span><i class="icon-placeholder"></i></div>
  <div class="form-body"><span class="error-text">Please Fill Out This Field</span>
    <div class="form-controls">
      <input id="control-name" name="forgetemail" type="email" placeholder="Email Address" autocomplete="off" />
   
    </div>
  </div><a class="form-action"><i class="icon-action"></i></a>
 
  </div>
 
  </div>

 <div class="col-md-4">
  <input type="submit" id="sub" value="Submit">
 </div>
 


</form>
</div>
</div>


<div style="margin-top: 20%;">
  <span style="color:red;margin-left: 5%;">
	<?php
	
if(isset($message_display)){
	echo $message_display;
}


   ?>  
	  
	  </span>
	  
	  
	<span style="color:red;margin-left: 5%;">
<?php   

if(isset($err_msg)){
	echo $err_msg;
}


?>
	
	</span>  
	
<span style="color:red;margin-left: 5%;">
<?php   

if(isset($succ_msg)){
	echo $succ_msg;
}


?>
	
	</span>  	
	
</div>

 </div>
 
 
<script>

$('.form-head').click(function(){
  
    if($(this).closest('.grop-from').attr('id')=='signup'){
        $('.grop-from').attr('id' , 'name');
        $('.icon-action').addClass('back');
    }  
    else if($(this).closest('.grop-from').attr('id')=='success'){
          $('.grop-from').attr('id' , 'signup');
          $('input').val('');
    }
    
});





$('.form-action').click(function(){
 
    var form_id = $('.grop-from').attr('id');
      $('.icon-action').addClass('back');
  
    if($('#control-' + form_id).val() != ''){
      switch (form_id) {
          case 'name':
              form_id = "name";
              break;
          
         
          case "password-repeat":
              form_id = "success";
              break;   
        case "success":
              form_id = "signup";
              break; 
      }
       $('.icon-action').addClass('back');
      
  }
  
  else{
    
     switch (form_id) {
          case 'name':
              form_id = "signup";
              $('.icon-action').removeClass('back');
              break;
          case "phone":
              form_id = "name";
              break;
          case "email":
              form_id = "phone";
              break;
          case "password":
              form_id = "email";
              break;
          case "password-repeat":
              form_id = "password";
              break; 
         case "success":
              form_id = "signup";
              break; 
      }
     $('.icon-action').removeClass('back');
  }
 
  $('.grop-from').attr('id' , form_id);
  
});

$('input').keyup(function(){
   $('.grop-from').removeClass('error');
    $('.error-text').fadeOut();
    
    if($(this).val()!=''){
      $('.icon-action').removeClass('back');
    }
  else{
    $('.icon-action').addClass('back');
  }
  
  
})
</script>


</body>

</html>