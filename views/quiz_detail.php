<style>
.container-fluid{
	 padding:0px;
 }
#login{
	
		/*background-image: url('<?php echo base_url();?>images1/gg.jpg');*/
	background-repeat: no-repeat;
   /*  background: linear-gradient(to top, rgb(28, 89, 157), rgb(75, 153, 219)); */
	background-size:cover;
	background-attachment: fixed;
	position: relative;
	z-index: 10;
	overflow: hidden;
	margin-top:-20px;
	
 }

 .panel{
	  box-shadow: 5px 5px 21px grey;
 }
 b, strong {
    font-weight: bold;
    color: #c5382d;
}
.alert-danger {
    color: #ea1414 !important;
	
}
 </style><script>
   var blink_speed = 1000;
var t = setInterval(function () {
  var ele = document.getElementById('blinker');
  ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
}, blink_speed);
   </script><div class="container-fluid"id="login">

 <div class="container">

   
 <!--<h3 style="color:white;"><?php //echo $title;?></h3>-->
   
 

  <div class="row">
     <form method="post" id="quiz_detail" name="myform"  action="<?php echo site_url('quiz/validate_quiz/'.$quiz['quid']);?>">
	
<div class="col-md-12">
<br> 
 <div class="login-panel panel panel-default" style="margin-top: 4%;">
		<div class="panel-body"> 
	
	
	
		<span style="color:red;">	<?php 
			
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		} ?></span><?php
		function des($dep) {
    return implode(',', array_keys(array_flip(explode(',', $dep))));
}
					  $sss=des($quiz['cids']);
			  $this->load->model('quiz_model');
 $quiz_cat_list=$this->quiz_model->get_quiz_category(rtrim($sss,",")); 
		?>	
		


<h3 style="font-weight:bold;color:#5ab7c4; margin-bottom:2%;"><?php echo $title;?></h3>		
<div style="padding-right: 29%;">
<table class="table table-bordered" style="font-size:13px;">
<tr><td><?php echo $this->lang->line('quiz_name');?></td><td><?php echo $quiz['quiz_name'];?></td></tr>
<tr><td>No of Questions</td><td><?php echo $quiz['noq'];?></td></tr>

<?php /* <tr><td><?php echo $this->lang->line('start_date');?></td><td><?php echo date('Y-m-d H:i:s',$quiz['start_date']);?></td></tr>
<tr><td><?php echo $this->lang->line('end_date');?></td><td><?php echo date('Y-m-d H:i:s',$quiz['end_date']);?></td></tr> */ ?>
<tr><td><?php echo $this->lang->line('duration');?></td><td><?php echo $quiz['duration'];?></td></tr>
<?php /* <tr><td><?php echo $this->lang->line('maximum_attempts');?></td><td><?php echo $quiz['maximum_attempts'];?></td></tr>
<tr><td>Percentage Required to Pass</td><td><?php echo $quiz['pass_percentage'];?></td></tr>
<tr><td><?php echo $this->lang->line('correct_score');?></td><td><?php echo $quiz['correct_score'];?></td></tr> */ ?>
<tr><td>Test Categories</td><td><?php echo  rtrim($quiz_cat_list,",");?></td></tr>
<tr><td><span style="color:red;">Starts by</span></td><td><span style="color:red;" id="blinker"><?php echo date('d M Y H:i:s',$quiz['start_date']); ?></span></td></tr>

</table>
  </div>
  
  <!-- jothi  -->
  <div>
 <h3 style="font-weight:bold;text-align:left;color:#5ab7c4; margin-bottom:2%;">Terms and Conditions</h3>
  
  <ol style="padding-left: 7%;padding-right: 7%;">
 <li style="font-weight:bold;">Candidate strictly <span style="color:red;">not allowed to open new window or tabs or minimize the Exam Tab during the time of an exam</span>, else the Exam will be cancelled and marked as <span style="color:red;">Fake Attempt</span>.</li> 
  
  
  
  </ol>
  
  
  
  <div style="padding-left: 5%;padding-top: 2%;padding-bottom: 2%;">
 <label style="display: block !important;"> <input type="checkbox" name="accept" id="accept" value="accepted" style="margin-right: 1%;"><span >I accept your Terms and Condition</span> </label>
  </div>
  
  <script>
  $(document).ready(function() {
     $('#start_quiz').prop('disabled', true);
     $('#resume_quiz').prop('disabled', true);
     $('#accept').click(function() {
		 
      
		if($(this). prop("checked") == true){

           $('#start_quiz').prop('disabled', false);
           $('#resume_quiz').prop('disabled', false);
		   
		   
        }
		else{
			 $('#start_quiz').prop('disabled', true);
			 $('#resume_quiz').prop('disabled', true);
		}
     });
 });
  
  </script>
  
  </div>
  
  
  
  
  
  
  
  
  
  
  

<?php 
if($quiz['camera_req']==1 && $this->config->item('webcam')==true){
?>
<div style="color:#ff0000;"><?php echo $this->lang->line('camera_instructions');?></div>
<div id="my_photo" style="width:500px;height:500px;background:#212121;padding:2px;border:1px solid #666666;color:red"></div>
<br><br>
<script type="text/javascript" src="<?php echo base_url();?>js/webcamjs/webcam.js"></script>
	<script language="JavaScript">
		Webcam.set({
			width: 500,
			height: 500,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_photo' );

		
		 function take_snapshot() {
		     Webcam.snap( function(data_uri) {
                document.getElementById('my_photo').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
		
		function upload_photo(){
		Webcam.snap( function(data_uri) {

    Webcam.upload( data_uri, '<?php echo site_url('quiz/upload_photo');?>',function(code, text) {
        // Upload complete!
        // 'code' will be the HTTP response code from the server, e.g. 200
        // 'text' will be the raw response content
	 document.getElementById('quiz_detail').submit();
    });
	});
	
	}
	
	 function capturephoto(){
		 
		void(take_snapshot());upload_photo(); 
	 }
	</script>
	
	<button class="btn btn-success" type="button" onClick="javascript:capturephoto();"><?php echo $this->lang->line('capture_start_quiz');?></button>

<?php 
}else{
	
	if($checkquiz['rid']=="")
	{
		?>
		<button class="btn btn-success" type="submit" id="start_quiz"><?php echo $this->lang->line('start_quiz');?></button>
		<?php
		
	}
	else{
?>	
	
	<button class="btn btn-warning" id="resume_quiz" type="submit">Resume</button>
	<?php } ?>
 
 <?php 
}
?>
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>


<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
<center><b> <?php echo $this->lang->line('to_which_position');?></b><br><input type="text" style="width:30px" id="qposition" value=""><br><br>
<a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;">Cancel</a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="javascript:movequestion();"   class="btn btn-info"  style="cursor:pointer;">Move</a>

</center>
</div>


</div>
<div class="container-fluid" >
	<footer style="margin-top:100px;">
	<div class="container">
	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
                <p>&copy; 2020 AICL. All Rights Reserved.</p>
            </div>
			</div>
		
	</div>	
</footer>
	</div>
	
	
	
	