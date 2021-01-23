	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	
	<!-- custom css -->
	<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('js/jquery-linedtextarea.css');?>" rel="stylesheet">
	
	 <script src="<?php echo base_url('record_js/RecordRTC.js');?>"></script>
    
    <!-- web streams API polyfill to support Firefox -->
    <script src="<?php echo base_url('record_js/polyfill.min.js');?>"></script>

    <!-- ../libs/DBML.js to fix video seeking issues 
    <script src="<?php echo base_url('record_js/EBML.js');?>"></script>-->

    <!-- for Edge/FF/Chrome/Opera/etc. getUserMedia support -->
    <script src="<?php echo base_url('record_js/adapter-latest.js');?>"></script>
    <script src="<?php echo base_url('record_js/DetectRTC.js');?>"> </script>

    <!-- video element -->
    <link href="<?php echo base_url('record_js/getHTMLMediaElement.css');?>" rel="stylesheet">
    <script src="<?php echo base_url('record_js/getHTMLMediaElement.js');?>"></script>
	
	<script>
	
	var base_url="<?php echo base_url();?>";

	</script>
	
	<!-- jquery -->
	
	<script src="<?php echo base_url('js/jquery-linedtextarea.js');?>"> </script>
	
	<!-- custom javascript -->
	<script src="<?php echo base_url('js/basic.js');?>"> </script>
		
	
	
	<!-- bootstrap js  (showing error) -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"> </script>
	
	
	
	
	
<script>
/* function disableselect(e) {
    return false;
}

function reEnable() {
    return true;
}

document.onselectstart = new Function("return false");

if (window.sidebar) {
    document.onmousedown = disableselect;
    document.onclick = reEnable;
   // document.onchange = reEnable;
} */
</script>


<script>
$(function() {
	$(".lined").linedtextarea(
		{selectedLine: 1}
	);
});
</script>
<style>
.quesdiv{
	max-height: 80px;
    overflow: auto;
}

input[type=radio]{
	cursor:pointer;
}


/* .panbody::-webkit-scrollbar {
    width: 0.9em !important;
}

.panbody::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3) !important;
}
 
.panbody::-webkit-scrollbar-thumb {
  background-color: lightgrey !important;
  outline: 1px solid slategrey !important;
}

.panbody::-webkit-scrollbar-thumb:active {
  background-color: darkgrey !important;
  outline: 1px solid slategrey !important;
}
 */


 td{
		font-size:14px;
		padding:4px;
	}

	 /*   .runbtn {
		background: #3a559f;
		border: unset;
		padding: 6px 24px 6px 24px;
		color: #fff;
		border-radius: 4px;
	} */
	
    
    /* .runbtn:hover {
        background: #0d2f84;
    } */
    
    .tab-content {
        padding-top: 30px;
    }
	.nav.nav-tabs li a:focus
	{
		outline:unset;
	}
	/* .eheight
	{
		height:290px;
	} */
	
	.timeleft{
		    font-weight: bold;
    font-size: 18px;
    float: right;
    text-align: center;
    background: blueviolet;
   /*  width: 186px; */
    width: auto;
    padding: 6px;
    margin-right: 10px;
    color: white;
	}
	
	.question_div {
   
    overflow-y: auto !important;
    max-height: 370px !important;
    min-height: 370px !important;
	
	border: 4px solid lightslategray;
    box-shadow: 0px 0px 14px grey;
    padding-left: 3%;
	margin-top: 2% !important;
	    border-radius: 4px;
	}
	
	
	.footer_buttons{
		   /*  margin-left: 10px !important; */
    padding: 20px !important;
   /*  padding-left: 6% !important; */
  /*  z-index:999; */
    	
	}
	
	.op{
		font-weight: bold !important;
	}
</style>
<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    styleActiveLine: true,
    matchBrackets: true
  });
  var input = document.getElementById("select");
  function selectTheme() {
    var theme = input.options[input.selectedIndex].textContent;
    editor.setOption("theme", theme);
    location.hash = "#" + theme;
  }
  var choice = (location.hash && location.hash.slice(1)) ||
               (document.location.search &&
                decodeURIComponent(document.location.search.slice(1)));
  if (choice) {
    input.value = choice;
    editor.setOption("theme", choice);
  }
  CodeMirror.on(window, "hashchange", function() {
    var theme = location.hash.slice(1);
    if (theme) { input.value = theme; selectTheme(); }
  });
</script>



<script language="javascript">
 document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}     
</script>

<script>

var Timer;
var TotalSeconds;


function CreateTimer(TimerID, Time) {
Timer = document.getElementById(TimerID);
TotalSeconds = Time;

UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function Tick() {
if (TotalSeconds <= 0) {
alert("Time's up!")
return;
}

TotalSeconds -= 1;
UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
	
var Seconds = TotalSeconds;

var Days = Math.floor(Seconds / 86400);
Seconds -= Days * 86400;

var Hours = Math.floor(Seconds / 3600);
Seconds -= Hours * (3600);

var Minutes = Math.floor(Seconds / 60);
Seconds -= Minutes * (60);


var TimeStr = ((Days > 0) ? Days + " days " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds)

Timer.innerHTML = TimeStr;

}


function LeadingZero(Time) {

return (Time < 10) ? "0" + Time : + Time;

}

//var myCountdown1 = new Countdown({time:<?php echo $seconds;?>, rangeHi:"hour", rangeLo:"second"});
setTimeout(submitform,'<?php echo $seconds * 1000;?>');

function submitform(){
alert('Time Over');
window.location="<?php echo site_url('quiz/submit_quiz/');?>";
}

setTimeout(submitforms,'<?php $mul=$seconds * 1000; echo $mul - 300000;?>');

function submitforms()
{
alert('Few more minutes more to complete');
}
 
 

var window_focus;
 
$(window).focus(function() {
    window_focus = true;
});

   $(window).blur(function() {
        window_focus = false;
		
		ajax_fake();


		
    //    $this->session->userdata('compiler_rowid');
		
        // window.location="<?php echo site_url('quiz/submit_quiz/');?>",2000;
    /*     setTimeout(function() {
  window.location.href = "<?php echo site_url('quiz/submit_quiz/');?>";
}, 1000);
    setTimeout(function() {
alert("Don't use new tab or Right Click");
}, 1000); */
    });
		 function ajax_fake()
{
	//alert("");
   $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/result/fake",
  data: {res_id:<?php echo $this->session->userdata('compiler_rowid');?>}, 

  success: function (response1) {

  }
  }); 
 
}
</script>



<div class="container" >

<button id="btn-start-recording" style="display:none;">Enable Camera Recording</button>


<div class="save_answer_signal" id="save_answer_signal2"></div>
<div class="save_answer_signal" id="save_answer_signal1"></div>

<div class="timeleft"  >

	<b>Time left:</b> <span id='timer'>
	<script type="text/javascript"> window.onload =function()
	{
		CreateTimer("timer", <?php echo $seconds;?>);
		document.getElementById("btn-start-recording").click();
	}
	</script>
</span>
</div>
<div style="float:left;width:250px; " >
 <h4 style="font-weight: bold;"><?php echo $title;?></h4>
</div>
	
<div style="clear:both;"></div>

<!-- Category button -->

 <div class="row">
<?php 

 $categories=explode(',',$quiz['categories']);
$quiz['category_range'];
$category_range=explode(',',$quiz['category_range']);
//  print_r($categories);

function getfirstqn($cat_keys='0',$category_range) {
	if($cat_keys==0){
		return 0;
	} else {
		$r=0;
		for($g=0; $g < $cat_keys; $g++){
		 $r+=$category_range[$g];	
		}
		return $r;
	}
	
	
}
/* 

  if(count($categories) > 1 ){
	$jct=0;
	foreach($categories as $cat_key => $category){
?>

<a href="javascript:switch_category('cat_<?php echo $cat_key;?>');"   class="btn btn-info"  style="cursor:pointer;"><?php echo $category;?></a>

<input type="hidden" id="cat_<?php echo $cat_key;?>" value="<?php echo getfirstqn($cat_key,$category_range);?>">
<?php 
}
} 
 */
?>
</div> 


 
 <div class="row"  style="margin-top:5px;">
 <div class="col-md-12" style=" padding-right:0px;">
 <div <?php if($quiz['compiler_status']==1) {?> class="col-md-7"  <?php } else { ?>  class="col-md-12" <?php } ?> id="colA">
<form method="post" action="<?php echo site_url('quiz/submit_quiz/'.$quiz['rid']);?>" id="quiz_form" >
<input type="hidden" name="rid" value="<?php echo $quiz['rid'];?>">
<input type="hidden" name="noq" value="<?php echo $quiz['noq'];?>">
<input type="hidden" name="individual_time"  id="individual_time" value="<?php echo $quiz['individual_time'];?>">
 
<?php 
$abc=array(
'0'=>'A',
'1'=>'B',
'2'=>'C',
'3'=>'D',
'4'=>'E',
'6'=>'F',
'7'=>'G',
'8'=>'H',
'9'=>'I',
'10'=>'J',
'11'=>'K'
);
foreach($questions as $qk => $question) 
{
	
?>
 
 <div id="q<?php echo $qk;?>" class="question_div">
			 </br>
		<div class="question_container" >
		<span style="font-size: 16px;"><b> <?php echo $this->lang->line('question');?> <?php echo $qk+1;?>)</b></span><br/><br/>
		<?php 

		
 if($question['question_type']!=$this->lang->line('image_question'))
		 {
			 
		 echo $question['question'];
		 
		 }
		 else {
			 ?>
			 
			 <img src='<?php echo base_url($question['question']);?>'  style="width:200px;height:200px;" >
			 
			 <?php
		 } ?>
		 <br/>
		 <?php
		 if($question['description'] !=""){
			?>
			<p class="label" style="padding: 0.8%;background:tomato;border-radius: 0px;font-size: 12px;"><b>Hint:</b> </p><p><?php  echo $question['description'];?></p>
		
	 <?php	} ?>
		 </div>
		<div class="option_container">
		 <?php 
		 // multiple single choice
		 if($question['question_type']==$this->lang->line('multiple_choice_single_answer'))
		 {
			 
			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
				 
			 }
			
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="1" >
			 <input type="hidden"  name="questcat_id[]"  id="quscat_id<?php echo $qk;?>" value="<?php echo $question['cid'];?>" >
			 <?php
			$i=0;
			foreach($options as $ok => $option){
				
				if($option['qid']==$question['qid']) {
			?>
			 
		<div class="op"> 
		
		<?php echo $abc[$i];?>) <input type="radio" name="answer[<?php echo $qk;?>][]"  id="answer_value<?php echo $qk.'-'.$i;?>" value="<?php echo $option['oid'];?>" <?php if(in_array($option['oid'],$save_ans)) { echo 'checked'; } ?>> <?php echo strip_tags($option['q_option']);?> 
		
		</div>
			 
			 
			 <?php 
			 $i+=1;
				} 
				else 
				{
					
				$i=0;	
					
				}
			}
		 }
		 
		  if($question['question_type']==$this->lang->line('image_question'))
		 {
			 
			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="5">
			 <?php
			$i=0;
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']) {
			?>
			 
		<div class="op"> 
		
		<?php echo $abc[$i];?>) <input type="radio" name="answer[<?php echo $qk;?>][]"  id="answer_value<?php echo $qk.'-'.$i;?>" value="<?php echo $option['oid'];?>" <?php if(in_array($option['oid'],$save_ans)) { echo 'checked'; } ?>  > <?php echo $option['q_option'];?> 
		
		</div>
			 
			 
			 <?php 
			 $i+=1;
				} 
				else 
				{
					
				$i=0;	
					
				}
			}
		 }
			
// multiple_choice_multiple_answer	

		 if($question['question_type']==$this->lang->line('multiple_choice_multiple_answer')){
			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="2">
			 <?php
			$i=0;
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
			?>
			 
		<div class="op"><?php echo $abc[$i];?>) <input type="checkbox" name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$i;?>"   value="<?php echo $option['oid'];?>"  <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?> > <?php echo $option['q_option'];?> </div>
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
		 }
			 
	// short answer	

		 if($question['question_type']==$this->lang->line('short_answer')){
			 			 $save_ans="";
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				 }
			 }
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="3" >
			 <input type="hidden"  name="question_idd_short" id="qiddshort_<?php echo $qk;?>"  value="<?php echo $question['qid'];?>">
			 <?php
			 ?>
			 
		<div class="op"> 
		<span style="color:red;"><?php echo "Enter your final ouput here";?> </span>
		<input type="text" name="answer[<?php echo $qk;?>][]" value="<?php echo $save_ans;?>" id="answer_value<?php echo $qk;?>"   >  
		</div>
			 
			 
			 <?php 
			 
			 
		 }
		 
		 
		 	// long answer	

		 if($question['question_type']==$this->lang->line('long_answer')){
			 $save_ans="";
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				 }
			 }
			 ?>
			 <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk;?>" value="4">
			 <input type="hidden"  name="question_idd" id="qidd_<?php echo $qk;?>"  value="<?php echo $question['qid'];?>">
			 
			 <?php
			 $logged_in=$this->session->userdata('logged_in');
	        $uid=$logged_in['uid'];
			 	 $rid=$this->session->userdata('rid');
			 $quess_id=$question['qid'];	
			
			  $this->load->model("quiz_model");
			 $whr_count=$this->quiz_model->get_attmpt_count($uid,$rid,$quess_id); 
			  
			
			 
			 ?>
			 
		<div class="op"> 
		<?php echo $this->lang->line('answer');?> <br>
		<?php echo $this->lang->line('word_counts');?> <span id="char_count<?php echo $qk;?>">0</span>
		<textarea name="answer[<?php echo $qk;?>][]" <?php if($whr_count>0){?> readonly<?php } ?> id="answer_value<?php echo $qk;?>" style="width:100%;height:100%;" onKeyup="count_char(this.value,'char_count<?php echo $qk;?>');"><?php echo $save_ans;?></textarea>
		</div>
			 
			 
			 <?php 
			 
			 
		 }
			 
		
		
		
		
		
		
		// matching	

		 if($question['question_type']==$this->lang->line('match_the_column')){
			 			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					// $exp_match=explode('__',$saved_answer['q_option_match']);
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 
			 ?>
			 <input type="hidden" name="question_type[]" id="q_type<?php echo $qk;?>" value="5">
			 <?php
			$i=0;
			$match_1=array();
			$match_2=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					$match_1[]=$option['q_option'];
					$match_2[]=$option['q_option_match'];
			?>
			 
			 
			 
			 <?php 
			 $i+=1;
				} else {
				$i=0;	
					
				}
			}
			?>
			<div class="op">
						<table>
						
						<?php 
			shuffle($match_1);
			shuffle($match_2);
			foreach($match_1 as $mk1 =>$mval)
			
			{
						?>
						<tr><td>
						<?php echo $abc[$mk1];?>)  <?php echo $mval;?> 
						</td><td>
						
							<select name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$mk1;?>"  >
							<option value="0"><?php echo $this->lang->line('select');?></option>
							<?php 
							foreach($match_2 as $mk2 =>$mval2){
								?>
								<option value="<?php echo $mval.'___'.$mval2;?>"  <?php $m1=$mval.'___'.$mval2; if(in_array($m1,$save_ans)){ echo 'selected'; } ?> ><?php echo $mval2;?></option>
								<?php 
							}
							?>
							</select>

						</td>
						</tr>
				
						
						<?php 
			}
			
			
			?>
			</table>
			 </div>
			<?php
			
		 }
			
		 ?>

		</div> 
 </div>
 
 
 
 <?php
}
?>
</form>



<!-- new ques button div -->

<div>
<span style="float:left;"><b> <?php echo $this->lang->line('questions');?></b></span>
<div style="float:right;margin-top: -1%;">
	<?php echo $this->session->userdata('errormessage'); ?>
<form id="img_ans" method="post" enctype="multipart/form-data" style="display:none;">
<span style="color:red;">Upload Diagram (image): </span> <input type="file" name="image_name_ans" id="image_name_ans" value="">
<input type="hidden" name="rid_for_image" value="<?php echo $quiz['rid'];?>">
<input type="hidden" name="rid_for_user" value="<?php echo $uid;?>">

<input type="submit" name="upload" value="upload">
 </form></div>
 <script>
$('#img_ans').submit(function(e){
    e.preventDefault(); 
         $.ajax({
             url:'<?php echo site_url('quiz/upload_answer_photo/');?>',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                  alert("file uploaded");
           }
         });
    }); 
</script>
</div>
<br>
	<div class="quesdiv" >
		<?php 
		//style="pointer-events:none;" 
		for($j=0; $j < $quiz['noq']; $j++ )
		{
			?>
			
			<div class="qbtn"  onClick="javascript:show_question('<?php echo $j;?>');"  id="qbtn<?php echo $j;?>" > <?php echo ($j+1);?> </div>
			
			<?php 
		}
		
		?>
<div style="clear:both;"></div>

	</div>
	
	
	<!--<br>-->
	<div class="horiline">
	<br>
	<hr>
	<br>
	</div>
	<!--<br>-->
	
	
	<div>
	
	
<?php /* <table>
<tr><td style="font-size:12px;"><div class="qbtn" style="background:#449d44;">&nbsp;</div> <?php echo $this->lang->line('Answered');?> </td></tr>
<tr><td style="font-size:12px;"><div class="qbtn" style="background:#c9302c;">&nbsp;</div> <?php echo $this->lang->line('UnAnswered');?> </td></tr>
<tr><td style="font-size:12px;"><div class="qbtn" style="background:#ec971f;">&nbsp;</div> <?php echo $this->lang->line('Review-Later');?> </td></tr>
<tr><td style="font-size:12px;"><div class="qbtn" style="background:#212121;">&nbsp;</div> <?php echo $this->lang->line('Not-visited');?> </td></tr>
</table>
 */ ?>


	<div style="clear:both;"></div>

	</div>



<!-- new ques button div -->



<div class="footer_buttons" style=" ">
<!--	 <button class="btn btn-warning"   onClick="javascript:review_later();" style="margin-top:2px;" >Review Later</button>-->

	<button class="btn btn-info"  onClick="javascript:clear_response();"  style="margin-top:2px;"  ><?php echo $this->lang->line('clear');?></button>

	<button class="btn btn-success"  id="backbtn" style="visibility:hidden;" onClick="javascript:show_back_question();"  style="margin-top:2px;" ><?php echo $this->lang->line('back');?></button> 
	
	<button class="btn btn-success" id="nextbtn" onClick="javascript:show_next_question();" style="margin-top:2px;" ><?php echo $this->lang->line('save_next');?></button>
	
	<button class="btn btn-danger"  onClick="javascript:cancelmove();" style="margin-top:2px;" ><?php echo $this->lang->line('submit_quiz');?></button>
</div>








 </div>
 
 
 
 
 <div class="col-md-5" id="colB" style="padding-bottom:0 0 80px 0; padding-right:0px;">
 
 <style>
 @media (min-width:294px) and (max-width:990px){
	.footer_buttons{
		width:100% !important;
		z-index:999 !important;
	} 
	.horiline{
		display:block !important;
	}
	
 #colB{
	     border-left: none !important;
		
		 
 }
 
 #hide-question-area{
	 display:none !important;
 }
 
 .panel{
	 margin-left:0% !important;
	 margin-bottom: 77px !important;
	    
 }
 #code{
	 width:86% !important;
 }
	
 }
 
 
  @media (min-width:990px) and (max-width:1200px){
	 #code{
	  width:279px !important;
 } 
  }
 
 .horiline{
		display:none;
	}
 .footer_buttons{
		width:49%;
	} 
 #colB{
	     border-left: 4px solid #dadada;
		   /*  height: -webkit-fill-available; */
			 max-height:544px !important;
		
 }
 #hide-question-area {
    width: 16px;
    height: 32px;
    background-color: #dadada;
   /*  background-image: url(<?php echo base_url(); ?>images1/back.jpg); */
    background-repeat: no-repeat;
    background-position: -313px -72px;
    display: block;
    position: absolute;
    left: 0;
    text-decoration: none;
    top: 20px;
    z-index: 102;
    border-radius: 0 3px 3px 0;
}

.runbtn {
	background: #d7263d;
		color:#fff;
	float:right;
	    
    border: 1px solid #d7263d;
    border-radius: 3px;
    font-weight: bold;
	}

	
	.runbtn:hover {
       background: white;
    color: #d7263d;
    }
	
	.linedwrap{
		padding-left:0px !important;
		padding-top:0px !important;
		width:100% !important;
	}
	
	.linedwrap .lines {
		       background: #e8e8e8 !important;
			 /*   height: 292px !important; */
			   height: 417px !important;
	}
	.lines{
		margin:0px !important;
	}
	.linedwrap .codelines .lineno{
		color:black !important;
		    font-size: 15px; !important;
	}
	.fonto{
		    margin-top: 55%;
			color:black;
	}
	
	.clicked {
    -webkit-transition: width 1.3s ease, margin 1.3s ease;
    -moz-transition: width 1.3s ease, margin 1.3s ease;
    -o-transition: width 1.3s ease, margin 1.3s ease;
    transition: width 1.3s ease, margin 1.3s ease;
}

.extendcode{
	 -webkit-transition: width 1.3s ease, margin 1.3s ease;
    -moz-transition: width 1.3s ease, margin 1.3s ease;
    -o-transition: width 1.3s ease, margin 1.3s ease;
    transition: width 1.3s ease, margin 1.3s ease;
	width: 91.2% !important;

}

.iconrotate{
	 transform:rotate(180deg);
    -webkit-transform:rotate(180deg);
}

#code{
	
	padding-right:0px !important ;
	padding-top:0.3em !important ;
	
}

.eheight
	{
		/* height:290px; */
		height: 414px;
		
		
	}
	
	
	
	#code:disabled{
		background-color:whitesmoke !important;
	}
 </style>
 <?php if($quiz['compiler_status']==1) {?>
 <a href="javascript:void(0);" id="hide-question-area"><i class="fa fa-backward fonto" aria-hidden="true"></i></a>
 
 <script>
 
 $(document).ready(function () {
    $("#hide-question-area").on("click", function () {
		
		  var colRight = $("#colB");
        var colLeft = $("#colA");
		
		colRight.toggleClass("col-md-5 col-md-7");
		
		
    $("#colB").toggleClass('clicked');
    
    $("#code").toggleClass('extendcode');
    //$("#code").toggleClass("code extendcode");
    $(".fonto").toggleClass('iconrotate');
		
		
		
         colLeft.toggleClass("col-md-7 col-md-5");
	});
	
	
	
	
	
	
	});
 </script>
 

<div class="panel" style="border:1px solid lightgrey;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;   margin-left: 6%;margin-bottom:0px;">
 
 <form method="post" action="" style="margin-bottom: 0px;">
  <div class="panel-heading" style="height: 55px;border-bottom:1px solid lightgrey;">
  <div  style="float:left;">
               
                <select id="select_lang" name="select_lang" class="form-control" style="cursor:pointer;border:1px solid #70627d;"  >
                    <option value="">Select Language</option>
                    <option value="11">C</option>
                    <option value="1">C++ (5.1.1)</option>
                    <option value="41">C++ (4.3.2)</option>
                    <option value="27">C#</option>
                    <option value="10">Java</option>
                    <option value="112">Javascript</option>
               
                    <option value="29">PHP 5</option>
                    <option value="4">Python 2.7</option>
                    <option value="99">Python 2.6</option>
                    <option value="116">Python 3</option>
                  
                    <option value="50">VB .NET</option>

                </select>
				
	
            </div>
  
				   <input type="button" name="" class="runbtn btn " onClick="ajax_compiler();" value="Compile & Run" >
				   <input type="hidden" name="com_question" id="com_question" value="0" >
  </div>
  <div class="panel-body panbody" style="padding:0px;max-height: 489px;overflow-y: auto;">
  <?php /* <textarea class="lined eheight" rows="8" style="font-size:15px;width:434px ;" id="code" name="code" >** Please Select the Language **</textarea> */ ?>
   
     <div id="code" class="tag eheight" style="font-size:15px;width:434px ;" ></div>
    <div>
	 <span class="input-group-addon" style="color: black;font-weight: bold; font-size: 17px;  border-radius: 0px;">Input</span>
	 <input type="text" id="input" name="input" class="form-control" style="width:100%;    border-radius: 0px; height: 42px;" placeholder="Enter your Input Here">
	</div>
	
	
	
	<!--<div id="result1" class="tab-pane fade">
        <div class="input-group">

            <span class="input-group-addon" style="background: purple;color: white;font-weight: bold;">Output</span>
            <textarea id="output" name="output"  rows="5" cols="60" class="form-control" style="width:100%;height: 204px;"> </textarea>
        </div>
        <br>
    </div>-->
	
	
	<div class="history">
	<style>
	.his{
		display:block;
	}
	
	.outputs{
		display:none;
	}
	
	</style>
	
	
	<!-- OUTPUT  -->
	
	
	<div class="alert alert-info alert-dismissible fade in outputs" >
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Output!</strong> <span id="output" style="margin-left:7%;font-size:15px;font-weight:bold;"></span>
   </div>
	
	
	<!-- OUTPUT  -->


	<h3 style="text-align:center;" class="his" >History of Compilation</h3>
<?php
$rids=$this->uri->segment(3);

//print_r($data['result_compile']);
?>
	
	

<div class="alert alert-info alert-dismissible fade in" id="nocomp">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>No Previous Compilation</strong> 
  </div>

	<span id="history_of_compile"></span>
	
	
	</div>
	
	</form>
	
  </div>
  
  
	<?php } ?>
	
	
	
	
	
	    
</div>
  
 
 
 
 
 
 
<!-- <form method="post" action="">
    <ul class="nav nav-tabs" style="background: palegreen;">
        <li class="active"><a data-toggle="tab" href="#code1">Code</a></li>
   <?php  /*     <li><a data-toggle="tab" href="#input1">Input</a></li> */ ?>
        <li class="start" ><a data-toggle="tab" href="#result1" style="color:black;font-weight:bold;">Output</a></li>
    </ul>

    <div class="tab-content">
        <div id="code1" class="tab-pane fade in active">
            <div class="input-group eheight">
                <span class="input-group-addon" style="    background: #009688;color: wheat;
    font-weight: bold;">Code</span>

                <textarea class="lined eheight" rows="8" style="width:100%;" id="code" name="code"> </textarea>
            </div>
            <br>
			
			
	<div class="row">		
	<div class="col-md-6">		
  <div class="input-group">

            <span class="input-group-addon" style="background: #c9302c;color: white;">Input</span>
            <input type="text" id="input" name="input" class="form-control" style="width:100%;">
        </div>
        </div>
		<div class="col-md-6">		
            <div class="input-group">
                <span class="input-group-addon" style="background: #c9302c;color: white;">Language</span>
                <select id="select_lang" name="select_lang" class="form-control" >
                    <option selected>Select</option>
                    <option value="11">C</option>
                    <option value="1">C++ (5.1.1)</option>
                    <option value="41">C++ (4.3.2)</option>
                    <option value="27">C#</option>
                    <option value="10">Java</option>
                    <option value="112">Javascript</option>
                    <option value="56">Node.js</option>
                    <option value="3">Perl 5</option>
                    <option value="54">Perl 6</option>
                    <option value="29">PHP 5</option>
                    <option value="4">Python 2.7</option>
                    <option value="99">Python 2.6</option>
                    <option value="116">Python 3</option>
                    <option value="117">R 3.2</option>
                    <option value="17">Ruby 2.1.5</option>
                    <option value="39">Scala</option>
                    <option value="50">VB .NET</option>

                </select>
            </div>
            </div>
			
            </div>
			
			
			
        </div>
   
  
  
  
  
<?php  /*    <div id="input1" class="tab-pane fade">
        <div class="input-group">

            <span class="input-group-addon">Input</span>
            <input type="text" id="input" name="input" class="form-control" style="width:100%;">
        </div>
        <br>
    </div> */ ?>
    <div id="result1" class="tab-pane fade">
        <div class="input-group">

            <span class="input-group-addon" style="background: purple;color: white;font-weight: bold;">Output</span>
            <textarea id="output" name="output"  rows="5" cols="60" class="form-control" style="width:100%;height: 204px;"> </textarea>
        </div>
        <br>
    </div>
    <div class="input-group" style="width:100%;">
        <br>

        <input type="button" name="" class="runbtn" onClick="ajax_compiler();" value="Run">
		
		
    </div>
</div>
</form>-->


<style>

#footer_buttons_right{
	display:none;
}
</style>
<div class="footer_buttons" id="footer_buttons_right" style="">
<?php 	/* <button class="btn btn-warning"   onClick="javascript:review_later();" style="margin-top:2px;" ><?php echo $this->lang->line('review_later');?></button>*/ ?>
	
	<button class="btn btn-info"  onClick="javascript:clear_response();"  style="margin-top:2px;"  ><?php echo $this->lang->line('clear');?></button>

	<button class="btn btn-success"  id="backbtn" style="visibility:hidden;" onClick="javascript:show_back_question();"  style="margin-top:2px;" ><?php echo $this->lang->line('back');?></button> 
	
	<button class="btn btn-success" id="nextbtn" onClick="javascript:show_next_question();" style="margin-top:2px;" ><?php echo $this->lang->line('save_next');?></button>
	
	<button class="btn btn-danger"  onClick="javascript:cancelmove();" style="margin-top:2px;" ><?php echo $this->lang->line('submit_quiz');?></button>
</div>




</div>
</div>









  <!--<div class="col-md-6" style="padding:0 0 80px 0;">

  
 ques button div
  
 </div>-->
 
 
 </div>
  
 



</div>


<script>

  $(document).ready(function() {
     $('#code').prop('disabled', true);
	 
	  $('#select_lang').change(function() {

           $('#code').prop('disabled', false);
          
	
     }); 
	 
	 
	//disable run button
	 var coding = document.getElementById("code").value;
	 
  if(coding=="** Please Select the Language **"){
	 $('.runbtn').prop('disabled', true); 
  }
   else if(coding==""){
	 $('.runbtn').prop('disabled', true); 
  }
 
	 
 
 
	 
  });

</script>


<script>
var ctime=0;
var ind_time=new Array();
<?php 
$ind_time=explode(',',$quiz['individual_time']);
for($ct=0; $ct < $quiz['noq']; $ct++){
	?>
	ind_time[<?php echo $ct;?>]=<?php echo $ind_time[$ct];?>;
	<?php 
}
?>
noq="<?php echo $quiz['noq'];?>";
show_question('0');


function increasectime(){
	
	ctime+=1;
 
}
 setInterval(increasectime,1000);
 setInterval(setIndividual_time,30000);
 
</script>
 
 <script>
 function ajax_compiler()
{

    var input = $('#input').val();
    var qidcomwhr = $('#com_question').val();
	
	 var com_question_history = $('#qiddshort_'+qidcomwhr).val();
	//alert(com_question_history);

   var editor = ace.edit("code");
		var code= editor.session.getValue();
		//alert(code);
           //var code = $('#code').val();
            var select_lang = $('#select_lang').val();
//alert(select_lang);

  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/quiz/ffff",
  data: {keyinput:input,keycode:code,select_lang:select_lang,quiz_id:<?php echo $this->session->userdata('rid');?>,qus_id:com_question_history}, 
   beforeSend: function(){
        $("#code").css("background","url(<?php echo base_url();?>images/LoaderIcon.gif) no-repeat 165px");
        },
  success: function (response1) {
	  alert("Compiled Successfully");
	// alert(response1);
//$('#output').html(response1);
   $("#code").css("background","#FFF");
 ajax_compiler1();
 get_compil_det();

  }
  });
 
}

function ajax_compiler1()
{

	// alert("Please wait for the response!!!");
	
  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/quiz/get_web_page",
  data: {keyinput:""}, 



   beforeSend:  function(){
        $("#code").css("background"," url(<?php echo base_url();?>images/LoaderIcon.gif) no-repeat 165px");
        },
  success: function (response) {

// setTimeout(function() {

	   $("#code").css("background","#FFF");
	   $("#code1").removeClass("active");
	   $("#result1").addClass("in active");
	   $('.nav-tabs li.active').removeClass('active');
	    $("li.start").addClass("active");
// alert(response);

$(".outputs").css("display", "block");

//$(".panbody").animate({ scrollTop: $('.panbody').prop("scrollHeight")}, 1000); //scroll to bottom
  $(".panbody").animate({ scrollTop: '+=424px' }, "slow");

$('#output').html(response);


//}, 7000);



  }
  });
	
	}

</script>
 
 
 <script>
 
/*  $('#select_lang').change(function(){
	
	 var c2 = $(this).val();
	 $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url(); ?>index.php/quiz/sel_syntax",
    data: {keyword:c2},
  success: function (response) {

document.getElementById("code").value = response;


 $('.runbtn').prop('disabled', false); 
 
  }
  }); 
}); */
 
 
 /* function myheaders(sel){
	 
	var val= sel.value;
	 
 //alert(val);
 
 
  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/Quiz/sel_syntax",
  data: {
   data:+val
  },
  success: function (response) {
	  alert(response);
   $( '#code' ).html(response);
 //document.getElementById('code').innerHTML=response;
  }
  
  
  });
 
 
 
 
 } */
 
 </script>
 
 <?php
 $rids=$this->uri->segment(3);
 ?>
 <script>

 	 function get_compil_det()
{
	    var rids = <?php echo $rids; ?>;
	 
	
	 $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url(); ?>index.php/quiz/com_det_exam", 
    data: {keywords:rids},

  success: function (response) {
//alert(response);

$( '#history_of_compile' ).html(response);

  

  }
  
  
  });
  
}
 

 </script>
 
<script>
$(document).ready(function() {
get_compil_det();
});

</script>



<style>
.quesdiv_to_right{
	 width: 42% !important;
    padding-left: 0px !important;

}

.quesdiv_to_right_onmedia{
	 width: 100% !important;
   

}


</style>
<script>
$("#extend").click(function(){
	
	if($(this). prop("checked") == true){
		
		 $(".quesdiv").css("max-height", "299px");
		  $("body").animate({ scrollTop: '+=194px' }, "slow");
		 
		  $(".footer_buttons").css("display", "none");
		  $("#footer_buttons_right").css("display", "block");
		  $("#footer_buttons_right").addClass("quesdiv_to_right");
		  
		 if (window.matchMedia('(max-width: 990px)').matches) {
          
		  	  $("#footer_buttons_right").addClass("quesdiv_to_right_onmedia");
		  
    }   
	}
	else{
		 $(".quesdiv").css("max-height", "78px"); 
		  $(".footer_buttons").css("display", "block");
		   $("#footer_buttons_right").css("display", "none");
	}
	
  
    });

</script>
  <script src="https://rawgithub.com/ajaxorg/ace-builds/master/src/ace.js" type="text/javascript" charset="utf-8"></script>
  <script src="https://rawgithub.com/ajaxorg/ace-builds/master/src/ext-language_tools.js" type="text/javascript" charset="utf-8"></script>
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
  
  
<script>
    var langTools = ace.require("ace/ext/language_tools");
    var editor = ace.edit("code");
	editor.setTheme("ace/theme/TextMate");
    editor.session.setMode("ace/mode/php");
     editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true
    });
 
</script>

        <script>
		/*function closetest()
			{
				document.getElementById('starttest').style.display = 'none';
				document.getElementById('test_content').style.display='block';
				document.getElementById('browser').style.display='none';
				document.getElementById('welcometesting').disabled=true;
				
				document.getElementById('btn-start-recording').style.display = 'block';
				var button=document.getElementById('btn-start-recording');
				button.disabled=false;
			}*/
			
			/*if(DetectRTC.browser.name === 'Edge') {
                // webp isn't supported in Microsoft Edge
                // neither MediaRecorder API
                // so lets disable both video/screen recording options

                console.warn('Neither MediaRecorder API nor webp is supported in Microsoft Edge. You cam merely record audio.');

               document.getElementById('browser').innerHTML = '<p>This is Edge. Click on the Allow button  Select Entire Screen<p>';
                setMediaContainerFormat(['WAV']);
            }

            if(DetectRTC.browser.name === 'Firefox') {
                // Firefox implemented both MediaRecorder API as well as WebAudio API
                // Their MediaRecorder implementation supports both audio/video recording in single container format
                // Remember, we can't currently pass bit-rates or frame-rates values over MediaRecorder API (their implementation lakes these features)

               document.getElementById('browser').innerHTML = '<p>This is firefox. Select your camera and microphone and Click Allow button<p>';
            }

            // disabling this option because currently this demo
            // doesn't supports publishing two blobs.
            // todo: add support of uploading both WAV/WebM to server.
            if( DetectRTC.browser.name === 'Chrome') {
                document.getElementById('browser').innerHTML = '<p>This is chrome. Click on Allow Button  <p>';
                console.info('This RecordRTC demo merely tries to playback recorded audio/video sync inside the browser. It still generates two separate files (WAV/WebM).');
            }*/
            (function() {
                var params = {},
                    r = /([^&=]+)=?([^&]*)/g;

                function d(s) {
                    return decodeURIComponent(s.replace(/\+/g, ' '));
                }

                var match, search = window.location.search;
                while (match = r.exec(search.substring(1))) {
                    params[d(match[1])] = d(match[2]);

                    if(d(match[2]) === 'true' || d(match[2]) === 'false') {
                        params[d(match[1])] = d(match[2]) === 'true' ? true : false;
                    }
                }

                window.params = params;
            })();

            function addStreamStopListener(stream, callback) {
                stream.addEventListener('ended', function() {
                    callback();
                    callback = function() {};
                }, false);
                stream.addEventListener('inactive', function() {
                    callback();
                    callback = function() {};
                }, false);
                stream.getTracks().forEach(function(track) {
                    track.addEventListener('ended', function() {
                        callback();
                        callback = function() {};
                    }, false);
                    track.addEventListener('inactive', function() {
                        callback();
                        callback = function() {};
                    }, false);
                });
            }
        </script>

        <script>
		const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);
		var nameoffile = urlParams.get('name');
            var video = document.createElement('video');
            video.controls = false;
            var mediaElement = getHTMLMediaElement(video, {
                title: 'Recording status: inactive',
                buttons: ['full-screen'/*, 'take-snapshot'*/],
                showOnMouseEnter: false,
                width: 360,
                onTakeSnapshot: function() {
                    var canvas = document.createElement('canvas');
                    canvas.width = mediaElement.clientWidth;
                    canvas.height = mediaElement.clientHeight;

                    var context = canvas.getContext('2d');
                    context.drawImage(recordingPlayer, 0, 0, canvas.width, canvas.height);
                    window.open(canvas.toDataURL('image/png'));
                }
            });
            //document.getElementById('recording-player').appendChild(mediaElement);

            var div = document.createElement('section');
            mediaElement.media.parentNode.appendChild(div);
            mediaElement.media.muted = false;
            mediaElement.media.autoplay = true;
            mediaElement.media.playsinline = true;
            div.appendChild(mediaElement.media);
            
           // var recordingPlayer = mediaElement.media;
            var recordingMedia='record-audio-plus-video';
			//var recordingMedia = document.querySelector('.recording-media');
            //var mediaContainerFormat = document.querySelector('.media-container-format');
			var mediaContainerFormat ='h264';
            var mimeType = 'video/webm';
            var fileExtension = 'mp4';
            var type = 'video';
            var recorderType;
            var defaultWidth;
            var defaultHeight;
			 var btnStartRecording = document.querySelector('#btn-start-recording');
			

           
			
            window.onbeforeunload = function() {
                btnStartRecording.disabled = false;
                recordingMedia.disabled = false;
                mediaContainerFormat.disabled = false;

                //chkFixSeeking.parentNode.style.display = 'inline-block';
            };
			
            btnStartRecording.onclick = function(event) {
                var button = btnStartRecording;
				console.log("Recording Started");
                if(button.innerHTML === 'Submit Test') {
					//document.getElementById('starttest').style.display = 'none';
                   // btnPauseRecording.style.display = 'none';
                    button.disabled = true;
                    button.disableStateWaiting = true;
                    setTimeout(function() {
                        button.disabled = false;
                        button.disableStateWaiting = false;
                    }, 2000);

                    button.innerHTML = 'Enable Face Recording';

                    function stopStream() {
                        if(button.stream && button.stream.stop) {
                            button.stream.stop();
                            button.stream = null;
                        }

                        if(button.stream instanceof Array) {
                            button.stream.forEach(function(stream) {
                                stream.stop();
                            });
                            button.stream = null;
                        }

                        videoBitsPerSecond = null;
                        var html = 'Recording status: stopped';
                        html += '<br>Size: ' + bytesToSize(button.recordRTC.getBlob().size);
                        //recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = html;
                    }

                    if(button.recordRTC) {
                        if(button.recordRTC.length) {
                            button.recordRTC[0].stopRecording(function(url) {
                                if(!button.recordRTC[1]) {
                                    button.recordingEndedCallback(url);
                                    stopStream();

                                    saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                    return;
                                }

                                button.recordRTC[1].stopRecording(function(url) {
                                    button.recordingEndedCallback(url);
                                    stopStream();
                                });
                            });
                        }
                        else {
                            button.recordRTC.stopRecording(function(url) {
                                if(button.blobs && button.blobs.length) {
                                    var blob = new File(button.blobs, getFileName(fileExtension), {
                                        type: mimeType
                                    });
                                    
                                    button.recordRTC.getBlob = function() {
                                        return blob;
                                    };

                                    url = URL.createObjectURL(blob);
                                }

                                /*if(chkFixSeeking.checked === true) {
                                    // to fix video seeking issues
                                    getSeekableBlob(button.recordRTC.getBlob(), function(seekableBlob) {
                                        button.recordRTC.getBlob = function() {
                                            return seekableBlob;
                                        };

                                        url = URL.createObjectURL(seekableBlob);

                                        button.recordingEndedCallback(url);
                                        saveToDiskOrOpenNewTab(button.recordRTC);
                                        stopStream();
                                    })
                                    return;
                                }*/

                               // button.recordingEndedCallback(url);
                                saveToDiskOrOpenNewTab(button.recordRTC);
                                stopStream();
                            });
                        }
                    }

                    return;
                }
				//document.getElementById('starttest').style.display = 'block';
				document.getElementById('btn-start-recording').style.display = 'none';
				//document.getElementById('welcometesting').disabled=true;
				document.getElementById('btn-start-recording').innerHTML='End Test';
				
				console.log("Recording Started");
                if(!event) return;

                button.disabled = true;

                var commonConfig = {
                    onMediaCaptured: function(stream) {
                        button.stream = stream;
                        if(button.mediaCapturedCallback) {
                            button.mediaCapturedCallback();
                        }

                        button.innerHTML = 'Submit Test';
                        button.disabled = false;

                       // chkFixSeeking.parentNode.style.display = 'none';
                    },
                    onMediaStopped: function() {
                        button.innerHTML = 'Enable Face Recording';

                        if(!button.disableStateWaiting) {
                            button.disabled = false;
                        }

                        //chkFixSeeking.parentNode.style.display = 'inline-block';
                    },
                    onMediaCapturingFailed: function(error) {
                        console.error('onMediaCapturingFailed:', error);

                        if(error.toString().indexOf('no audio or video tracks available') !== -1) {
                            alert('RecordRTC failed to start because there are no audio or video tracks available.');
                        }
                        
                        if(error.name === 'PermissionDeniedError' && DetectRTC.browser.name === 'Firefox') {
                            alert('Firefox requires version >= 52. Firefox also requires HTTPs.');
                        }

                        commonConfig.onMediaStopped();
                    }
                };

                if(mediaContainerFormat === 'h264') {
                    mimeType = 'video/webm\;codecs=h264';
                    fileExtension = 'mp4';

                    // video/mp4;codecs=avc1    
                    if(isMimeTypeSupported('video/mpeg')) {
                        mimeType = 'video/mpeg';
                    }
                }

                

                if(mediaContainerFormat === 'default') {
                    mimeType = 'video/webm';
                    fileExtension = 'webm';
                    recorderType = null;
                    type = 'video';
                }

               

                if(recordingMedia === 'record-audio-plus-video') {
					console.log("Web Cam Started");
                    captureAudioPlusVideo(commonConfig);
					
                    button.mediaCapturedCallback = function() {
                        if(typeof MediaRecorder === 'undefined') { // opera or chrome etc.
                            button.recordRTC = [];

                            if(!params.bufferSize) {
                                // it fixes audio issues whilst recording 720p
                                params.bufferSize = 16384;
                            }

                            var options = {
                                type: 'audio', // hard-code to set "audio"
                                leftChannel: params.leftChannel || false,
                                disableLogs: params.disableLogs || false,
                                video: recordingPlayer
                            };

                            if(params.sampleRate) {
                                options.sampleRate = parseInt(params.sampleRate);
                            }

                            if(params.bufferSize) {
                                options.bufferSize = parseInt(params.bufferSize);
                            }

                            if(params.frameInterval) {
                                options.frameInterval = parseInt(params.frameInterval);
                            }

                            if(recorderType) {
                                options.recorderType = recorderType;
                            }

                            if(videoBitsPerSecond) {
                                options.videoBitsPerSecond = videoBitsPerSecond;
                            }

                            options.ignoreMutedMedia = false;
                            var audioRecorder = RecordRTC(button.stream, options);

                            options.type = type;
                            var videoRecorder = RecordRTC(button.stream, options);

                            // to sync audio/video playbacks in browser!
                            videoRecorder.initRecorder(function() {
                                audioRecorder.initRecorder(function() {
                                    audioRecorder.startRecording();
                                    videoRecorder.startRecording();
                                   // btnPauseRecording.style.display = '';
								   
                                });
                            });

                            button.recordRTC.push(audioRecorder, videoRecorder);
							
                            button.recordingEndedCallback = function() {
                                var audio = new Audio();
                                audio.src = audioRecorder.toURL();
                                audio.controls = true;
                                audio.autoplay = true;

                                //recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                                //recordingPlayer.parentNode.appendChild(audio);

                                if(audio.paused) audio.play();
                            };
                            return;
                        }

                        var options = {
                            type: type,
                            mimeType: mimeType,
                            disableLogs: params.disableLogs || false,
                            getNativeBlob: false, // enable it for longer recordings
                            //video: recordingPlayer
                        };

                        if(recorderType) {
                            options.recorderType = recorderType;

                            if(recorderType == WhammyRecorder || recorderType == GifRecorder || recorderType == WebAssemblyRecorder) {
                                options.canvas = options.video = {
                                    width: defaultWidth || 320,
                                    height: defaultHeight || 240
                                };
                            }
                        }

                        if(videoBitsPerSecond) {
                            options.videoBitsPerSecond = videoBitsPerSecond;
                        }

                        /*if(timeSlice && typeof MediaRecorder !== 'undefined') {
                            options.timeSlice = timeSlice;
                            button.blobs = [];
                            options.ondataavailable = function(blob) {
                                button.blobs.push(blob);
                            };
                        }*/

                        options.ignoreMutedMedia = false;
                        button.recordRTC = RecordRTC(button.stream, options);

                       // button.recordingEndedCallback = function(url) {
                            //setVideoURL(url);
                      //  };

                        button.recordRTC.startRecording();
                       // btnPauseRecording.style.display = '';
					   
					   //document.getElementById('welcometesting').disabled=false;
                       // recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = '<img src="https://www.webrtc-experiment.com/images/progress.gif">';
                    };
                }

            };

            function captureVideo(config) {
                captureUserMedia({video: true, audio: false}, function(videoStream) {
                    config.onMediaCaptured(videoStream);

                    addStreamStopListener(videoStream, function() {
                        config.onMediaStopped();
                    });
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureAudio(config) {
                captureUserMedia({audio: true}, function(audioStream) {
                    config.onMediaCaptured(audioStream);

                    addStreamStopListener(audioStream, function() {
                        config.onMediaStopped();
                    });
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            function captureAudioPlusVideo(config) {
				
                captureUserMedia({video: true, audio: false}, function(audioVideoStream) {
                    config.onMediaCaptured(audioVideoStream);

                    if(audioVideoStream instanceof Array) {
                        audioVideoStream.forEach(function(stream) {
                            addStreamStopListener(stream, function() {
                                config.onMediaStopped();
                            });
                        });
						
                        return;
                    }

                    addStreamStopListener(audioVideoStream, function() {
                        config.onMediaStopped();
                    });
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }

            var MY_DOMAIN = 'webrtc-experiment.com';

            function isMyOwnDomain() {
                // replace "webrtc-experiment.com" with your own domain name
                return document.domain.indexOf(MY_DOMAIN) !== -1;
            }

            function isLocalHost() {
                // "chrome.exe" --enable-usermedia-screen-capturing
                // or firefox => about:config => "media.getusermedia.screensharing.allowed_domains" => add "localhost"
                return document.domain === 'localhost' || document.domain === 'www.infoziant.com';
            }

            var videoBitsPerSecond;

            function setVideoBitrates() {
                //var select = document.querySelector('.media-bitrates');
                var value ='300000';
                if(value == 'default') {
                    videoBitsPerSecond = null;
                    return;
                }

                videoBitsPerSecond = parseInt(value);
            }

            function getFrameRates(mediaConstraints) {
                if(!mediaConstraints.video) {
                    return mediaConstraints;
                }

                //var select = document.querySelector('.media-framerates');
                var value = 'default';

                if(value == 'default') {
                    return mediaConstraints;
                }

                value = parseInt(value);

                if(DetectRTC.browser.name === 'Firefox') {
                    mediaConstraints.video.frameRate = value;
                    return mediaConstraints;
                }

                if(!mediaConstraints.video.mandatory) {
                    mediaConstraints.video.mandatory = {};
                    mediaConstraints.video.optional = [];
                }

                var isScreen = recordingMedia.value.toString().toLowerCase().indexOf('screen') != -1;
                if(isScreen) {
                    mediaConstraints.video.mandatory.maxFrameRate = value;
                }
                else {
                    mediaConstraints.video.mandatory.minFrameRate = value;
                }

                return mediaConstraints;
            }

           /* function setGetFromLocalStorage(selectors) {
                selectors.forEach(function(selector) {
                    var storageItem = selector.replace(/\.|#/g, '');
                    if(localStorage.getItem(storageItem)) {
                        document.querySelector(selector).value = localStorage.getItem(storageItem);
                    }

                    addEventListenerToUploadLocalStorageItem(selector, ['change', 'blur'], function() {
                        localStorage.setItem(storageItem, document.querySelector(selector).value);
                    });
                });
            }*/

            function addEventListenerToUploadLocalStorageItem(selector, arr, callback) {
                arr.forEach(function(event) {
                    document.querySelector(selector).addEventListener(event, callback, false);
                });
            }

            //setGetFromLocalStorage(['.media-resolutions', '.media-framerates', '.media-bitrates', '.recording-media', '.media-container-format']);

            function getVideoResolutions(mediaConstraints) {
                if(!mediaConstraints.video) {
                    return mediaConstraints;
                }

                //var select = document.querySelector('.media-resolutions');
                var value = 'default';
              //  var value = 'default';

                if(value == 'default') {
                    return mediaConstraints;
                }

                value = value.split('x');

                if(value.length != 2) {
                    return mediaConstraints;
                }

                defaultWidth = parseInt(value[0]);
                defaultHeight = parseInt(value[1]);

                if(DetectRTC.browser.name === 'Firefox') {
                    mediaConstraints.video.width = defaultWidth;
                    mediaConstraints.video.height = defaultHeight;
                    return mediaConstraints;
                }

                if(!mediaConstraints.video.mandatory) {
                    mediaConstraints.video.mandatory = {};
                    mediaConstraints.video.optional = [];
                }

                var isScreen = recordingMedia.value.toString().toLowerCase().indexOf('screen') != -1;

                if(isScreen) {
                    mediaConstraints.video.mandatory.maxWidth = defaultWidth;
                    mediaConstraints.video.mandatory.maxHeight = defaultHeight;
                }
                else {
                    mediaConstraints.video.mandatory.minWidth = defaultWidth;
                    mediaConstraints.video.mandatory.minHeight = defaultHeight;
                }

                return mediaConstraints;
            }

            function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
                if(mediaConstraints.video == true) {
                    mediaConstraints.video = {};
                }

                setVideoBitrates();

                mediaConstraints = getVideoResolutions(mediaConstraints);
                mediaConstraints = getFrameRates(mediaConstraints);

                var isBlackBerry = !!(/BB10|BlackBerry/i.test(navigator.userAgent || ''));
                if(isBlackBerry && !!(navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia)) 
				{
                    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
                    navigator.getUserMedia(mediaConstraints, successCallback, errorCallback);
                    return;
                }
                navigator.mediaDevices.getUserMedia(mediaConstraints).then(function(stream) {
                successCallback(stream);
                    //setVideoURL(stream, true);
                }).catch(function(error){
                    if(error && (error.name === 'ConstraintNotSatisfiedError' || error.name === 'OverconstrainedError')) {
                        alert('Your camera or browser does NOT supports selected resolutions or frame-rates. \n\nPlease select "default" resolutions.');
                    }
                    else if(error && error.message) {
						//alert("");
                        validate_recording();
                    }
                    else {
                        alert('Unable to make getUserMedia request. Please check browser console logs.');
                    }

                    errorCallback(error);
                });
            }
			
			function validate_recording()
			{
				//alert("validate");
			var rids = <?php echo $rids;?>;
			$.ajax({
			type: "POST",
			data: {keywords:rids},
			url: "<?php echo base_url();?>index.php/result/reset_quiz",
			//url: base_url + "index.php/result/"+cid+'/'+lid,
			success: function(data){
				window.location="<?php echo base_url();?>index.php/quiz";
			}	
			});				
			}

            /*function setMediaContainerFormat(arrayOfOptionsSupported) {
                var options = Array.prototype.slice.call(
                    mediaContainerFormat.querySelectorAll('option')
                );

                var localStorageItem;
                if(localStorage.getItem('media-container-format')) {
                    localStorageItem = localStorage.getItem('media-container-format');
                }

                var selectedItem;
                options.forEach(function(option) {
                    option.disabled = true;

                    if(arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                        option.disabled = false;

                        if(localStorageItem && arrayOfOptionsSupported.indexOf(localStorageItem) != -1) {
                            if(option.value != localStorageItem) return;
                            option.selected = true;
                            selectedItem = option;
                            return;
                        }

                        if(!selectedItem) {
                            option.selected = true;
                            selectedItem = option;
                        }
                    }
                });
            }*/

            function isMimeTypeSupported(mimeType) {
                if(typeof MediaRecorder === 'undefined') {
                    return false;
                }

                if(typeof MediaRecorder.isTypeSupported !== 'function') {
                    return true;
                }

                return MediaRecorder.isTypeSupported(mimeType);
            }

            

            if(typeof MediaRecorder === 'undefined' && (DetectRTC.browser.name === 'Edge' || DetectRTC.browser.name === 'Safari')) {
                // webp isn't supported in Microsoft Edge
                // neither MediaRecorder API
                // so lets disable both video/screen recording options

                console.warn('Neither MediaRecorder API nor webp is supported in ' + DetectRTC.browser.name + '. You cam merely record audio.');

                recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
                //setMediaContainerFormat(['pcm']);
            }

            function stringify(obj) {
                var result = '';
                Object.keys(obj).forEach(function(key) {
                    if(typeof obj[key] === 'function') {
                        return;
                    }

                    if(result.length) {
                        result += ',';
                    }

                    result += key + ': ' + obj[key];
                });

                return result;
            }

            function mediaRecorderToStringify(mediaRecorder) {
                var result = '';
                result += 'mimeType: ' + mediaRecorder.mimeType;
                result += ', state: ' + mediaRecorder.state;
                result += ', audioBitsPerSecond: ' + mediaRecorder.audioBitsPerSecond;
                result += ', videoBitsPerSecond: ' + mediaRecorder.videoBitsPerSecond;
                if(mediaRecorder.stream) {
                    result += ', streamid: ' + mediaRecorder.stream.id;
                    result += ', stream-active: ' + mediaRecorder.stream.active;
                }
                return result;
            }

            function getFailureReport() {
                var info = 'RecordRTC seems failed. \n\n' + stringify(DetectRTC.browser) + '\n\n' + DetectRTC.osName + ' ' + DetectRTC.osVersion + '\n';

                if (typeof recorderType !== 'undefined' && recorderType) {
                    info += '\nrecorderType: ' + recorderType.name;
                }

                if (typeof mimeType !== 'undefined') {
                    info += '\nmimeType: ' + mimeType;
                }

                Array.prototype.slice.call(document.querySelectorAll('select')).forEach(function(select) {
                    info += '\n' + (select.id || select.className) + ': ' + select.value;
                });

                if (btnStartRecording.recordRTC) {
                    info += '\n\ninternal-recorder: ' + btnStartRecording.recordRTC.getInternalRecorder().name;
                    
                    if(btnStartRecording.recordRTC.getInternalRecorder().getAllStates) {
                        info += '\n\nrecorder-states: ' + btnStartRecording.recordRTC.getInternalRecorder().getAllStates();
                    }
                }

                if(btnStartRecording.stream) {
                    info += '\n\naudio-tracks: ' + getTracks(btnStartRecording.stream, 'audio').length;
                    info += '\nvideo-tracks: ' + getTracks(btnStartRecording.stream, 'video').length;
                    info += '\nstream-active? ' + !!btnStartRecording.stream.active;

                    btnStartRecording.stream.getTracks().forEach(function(track) {
                        info += '\n' + track.kind + '-track-' + (track.label || track.id) + ': (enabled: ' + !!track.enabled + ', readyState: ' + track.readyState + ', muted: ' + !!track.muted + ')';

                        if(track.getConstraints && Object.keys(track.getConstraints()).length) {
                            info += '\n' + track.kind + '-track-getConstraints: ' + stringify(track.getConstraints());
                        }

                        if(track.getSettings && Object.keys(track.getSettings()).length) {
                            info += '\n' + track.kind + '-track-getSettings: ' + stringify(track.getSettings());
                        }
                    });
                }

              

                else if(btnStartRecording.recordRTC && btnStartRecording.recordRTC.getBlob()) {
                    info += '\n\nblobSize: ' + bytesToSize(btnStartRecording.recordRTC.getBlob().size);
                }

                if(btnStartRecording.recordRTC && btnStartRecording.recordRTC.getInternalRecorder() && btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder && btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder()) {
                    info += '\n\ngetInternalRecorder: ' + mediaRecorderToStringify(btnStartRecording.recordRTC.getInternalRecorder().getInternalRecorder());
                }

                return info;
            }

             function saveToDiskOrOpenNewTab(recordRTC) 
			{
               

					//var fileName = nameoffile + getFileName(fileExtension);
					var fileName = <?php echo $quiz['rid'];?> + getFileName(fileExtension);


					

					// upload to PHP server
					
					
						if(isMyOwnDomain()) {
							alert('PHP Upload is not available on this domain.');
							return;
						}

						if(!recordRTC) return alert('No recording found.');
						this.disabled = true;

						var button = this;
						uploadToPHPServer(fileName, recordRTC, function(progress, fileURL) {
							if(progress === 'ended') {
								button.disabled = false;
								button.innerHTML = 'Click to download from server';
								button.onclick = function() {
									SaveFileURLToDisk(fileURL, fileName);
								};

								setVideoURL(fileURL);

								var html = 'Uploaded to PHP.<br>Download using below link:<br>';
								html += '<a href="'+fileURL+'" download="'+fileName+'" style="color: yellow; display: block; margin-top: 15px;">'+fileName+'</a>';
								//recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = html;
								return;
							}
							button.innerHTML = progress;
							//recordingPlayer.parentNode.parentNode.querySelector('h2').innerHTML = progress;
						});
              

               
                   
                    
            };

                
        
                
          

           function uploadToPHPServer(fileName, recordRTC, callback) {
				console.log("upload to server");
                var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.getBlob();
                
                blob = new File([blob], getFileName(fileExtension), {
                    type: mimeType
                });

                // create FormData
                var formData = new FormData();
                formData.append('video-filename', fileName);
                formData.append('video-blob', blob);

                callback('Uploading recorded-file to server.');
// controller function 

                // var upload_url = 'https://your-domain.com/files-uploader/';
                 var upload_url = "<?php echo base_url(); ?>index.php/recorder_controller/index";

                // var upload_directory = upload_url;
               var upload_directory = 'recorder/';

                makeXMLHttpRequest(upload_url, formData, function(progress) {
                    if (progress !== 'upload-ended') {
                        callback(progress);
                        return;
                    }
				//	window.location.replace("testended.html");
                    callback('ended', upload_directory + fileName);
					
                });
				//document.getElementById('test_content').style.display='none';
				//document.getElementById('starttest').style.display = 'none';
				//document.getElementById('starttest').innerHTML = "<p>Your answer saved Successfully</p>";
				document.getElementById('btn-start-recording').style.display = 'none';
				//document.getElementById('redirect').style.display='block';
				
				
            }
			
			
			

            function makeXMLHttpRequest(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        if(request.responseText === 'success') {
                            callback('upload-ended');
                            return;
                        }

                       // document.querySelector('.header').parentNode.style = 'text-align: left; color: red; padding: 5px 10px;';
                       // document.querySelector('.header').parentNode.innerHTML = request.responseText;
                    }
                };

                request.upload.onloadstart = function() {
                    callback('Upload started...');
                };

                request.upload.onprogress = function(event) {
                    callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
                };

                request.upload.onload = function() {
                    callback('progress-about-to-end');
                };

                request.upload.onload = function() {
                    callback('Getting File URL..');
                };

                request.upload.onerror = function(error) {
                    callback('Failed to upload to server');
                };

                request.upload.onabort = function(error) {
                    callback('Upload aborted.');
                };

                request.open('POST', url);
                request.send(data);
            }

            function getRandomString() {
                if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
                    var a = window.crypto.getRandomValues(new Uint32Array(3)),
                        token = '';
                    for (var i = 0, l = a.length; i < l; i++) {
                        token += a[i].toString(36);
                    }
                    return token;
                } else {
                    return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
                }
            }

            function getFileName(fileExtension) {
                var d = new Date();
                var year = d.getUTCFullYear();
                var month = d.getUTCMonth();
                var date = d.getUTCDate();
               // return '_AICL' +  getRandomString() + '.' + fileExtension;
                return '_AICL' + '.' + fileExtension;
            }

            function SaveFileURLToDisk(fileUrl, fileName) {
                var hyperlink = document.createElement('a');
                hyperlink.href = fileUrl;
                hyperlink.target = '_blank';
                hyperlink.download = fileName || fileUrl;

                (document.body || document.documentElement).appendChild(hyperlink);
                hyperlink.onclick = function() {
                   (document.body || document.documentElement).removeChild(hyperlink);

                   // required for Firefox
                   window.URL.revokeObjectURL(hyperlink.href);
                };

                var mouseEvent = new MouseEvent('click', {
                    view: window,
                    bubbles: true,
                    cancelable: true
                });

                hyperlink.dispatchEvent(mouseEvent);
            }

            function getURL(arg) {
                var url = arg;

                if(arg instanceof Blob || arg instanceof File) {
                    url = URL.createObjectURL(arg);
                }

                if(arg instanceof RecordRTC || arg.getBlob) {
                    url = URL.createObjectURL(arg.getBlob());
                }

                if(arg instanceof MediaStream || arg.getTracks) {
                    // url = URL.createObjectURL(arg);
                }

                return url;
            }

           /* function setVideoURL(arg, forceNonImage) {
                var url = getURL(arg);

                var parentNode = recordingPlayer.parentNode;
                parentNode.removeChild(recordingPlayer);
                parentNode.innerHTML = '';

                var elem = 'video';
                if(type == 'gif' && !forceNonImage) {
                    elem = 'img';
                }
                if(type == 'audio') {
                    elem = 'audio';
                }

               recordingPlayer = document.createElement(elem);
                
                if(arg instanceof MediaStream) {
                    recordingPlayer.muted = true;
                }

                recordingPlayer.addEventListener('loadedmetadata', function() {
                    if(navigator.userAgent.toLowerCase().indexOf('android') == -1) return;

                    // android
                    setTimeout(function() {
                        if(typeof recordingPlayer.play === 'function') {
                            recordingPlayer.play();
                        }
                    }, 2000);
                }, false);

                recordingPlayer.poster = '';

                if(arg instanceof MediaStream) {
                    recordingPlayer.srcObject = arg;
                }
                else {
                    recordingPlayer.src = url;
                }

                if(typeof recordingPlayer.play === 'function') {
                    recordingPlayer.play();
                }

                recordingPlayer.addEventListener('ended', function() {
                    url = getURL(arg);
                    
                    if(arg instanceof MediaStream) {
                        recordingPlayer.srcObject = arg;
                    }
                    else {
                        recordingPlayer.src = url;
                    }
                });

                parentNode.appendChild(recordingPlayer);
            }*/
        </script>

        

       

        <script>
            /* cors_upload.js Copyright 2015 Google Inc. All Rights Reserved. */

            var DRIVE_UPLOAD_URL = 'https://www.googleapis.com/upload/drive/v2/files/';

            var RetryHandler = function() {
              this.interval = 1000; // Start at one second
              this.maxInterval = 60 * 1000; // Don't wait longer than a minute 
            };

            RetryHandler.prototype.retry = function(fn) {
              setTimeout(fn, this.interval);
              this.interval = this.nextInterval_();
            };

            RetryHandler.prototype.reset = function() {
              this.interval = 1000;
            };

            RetryHandler.prototype.nextInterval_ = function() {
              var interval = this.interval * 2 + this.getRandomInt_(0, 1000);
              return Math.min(interval, this.maxInterval);
            };

            RetryHandler.prototype.getRandomInt_ = function(min, max) {
              return Math.floor(Math.random() * (max - min + 1) + min);
            };

            var MediaUploader = function(options) {
              var noop = function() {};
              this.file = options.file;
              this.contentType = options.contentType || this.file.type || 'application/octet-stream';
              this.metadata = options.metadata || {
                'title': this.file.name,
                'mimeType': this.contentType
              };
              this.token = options.token;
              this.onComplete = options.onComplete || noop;
              this.onProgress = options.onProgress || noop;
              this.onError = options.onError || noop;
              this.offset = options.offset || 0;
              this.chunkSize = options.chunkSize || 0;
              this.retryHandler = new RetryHandler();

              this.url = options.url;
              if (!this.url) {
                var params = options.params || {};
                params.uploadType = 'resumable';
                this.url = this.buildUrl_(options.fileId, params, options.baseUrl);
              }
              this.httpMethod = options.fileId ? 'PUT' : 'POST';
            };

            MediaUploader.prototype.upload = function() {
              var self = this;
              var xhr = new XMLHttpRequest();

              xhr.open(this.httpMethod, this.url, true);
              xhr.setRequestHeader('Authorization', 'Bearer ' + this.token);
              xhr.setRequestHeader('Content-Type', 'application/json');
              xhr.setRequestHeader('X-Upload-Content-Length', this.file.size);
              xhr.setRequestHeader('X-Upload-Content-Type', this.contentType);

              xhr.onload = function(e) {
                if (e.target.status < 400) {
                  var location = e.target.getResponseHeader('Location');
                  this.url = location;
                  this.sendFile_();
                } else {
                  this.onUploadError_(e);
                }
              }.bind(this);
              xhr.onerror = this.onUploadError_.bind(this);
              xhr.send(JSON.stringify(this.metadata));
            };

            MediaUploader.prototype.sendFile_ = function() {
              var content = this.file;
              var end = this.file.size;

              if (this.offset || this.chunkSize) {
                // Only bother to slice the file if we're either resuming or uploading in chunks
                if (this.chunkSize) {
                  end = Math.min(this.offset + this.chunkSize, this.file.size);
                }
                content = content.slice(this.offset, end);
              }

              var xhr = new XMLHttpRequest();
              xhr.open('PUT', this.url, true);
              xhr.setRequestHeader('Content-Type', this.contentType);
              xhr.setRequestHeader('Content-Range', 'bytes ' + this.offset + '-' + (end - 1) + '/' + this.file.size);
              xhr.setRequestHeader('X-Upload-Content-Type', this.file.type);
              if (xhr.upload) {
                xhr.upload.addEventListener('progress', this.onProgress);
              }
              xhr.onload = this.onContentUploadSuccess_.bind(this);
              xhr.onerror = this.onContentUploadError_.bind(this);
              xhr.send(content);
            };

            MediaUploader.prototype.resume_ = function() {
              var xhr = new XMLHttpRequest();
              xhr.open('PUT', this.url, true);
              xhr.setRequestHeader('Content-Range', 'bytes */' + this.file.size);
              xhr.setRequestHeader('X-Upload-Content-Type', this.file.type);
              if (xhr.upload) {
                xhr.upload.addEventListener('progress', this.onProgress);
              }
              xhr.onload = this.onContentUploadSuccess_.bind(this);
              xhr.onerror = this.onContentUploadError_.bind(this);
              xhr.send();
            };

            MediaUploader.prototype.extractRange_ = function(xhr) {
              var range = xhr.getResponseHeader('Range');
              if (range) {
                this.offset = parseInt(range.match(/\d+/g).pop(), 10) + 1;
              }
            };

            MediaUploader.prototype.onContentUploadSuccess_ = function(e) {
              if (e.target.status == 200 || e.target.status == 201) {
                this.onComplete(e.target.response);
              } else if (e.target.status == 308) {
                this.extractRange_(e.target);
                this.retryHandler.reset();
                this.sendFile_();
              }
            };

            MediaUploader.prototype.onContentUploadError_ = function(e) {
              if (e.target.status && e.target.status < 500) {
                this.onError(e.target.response);
              } else {
                this.retryHandler.retry(this.resume_.bind(this));
              }
            };

            MediaUploader.prototype.onUploadError_ = function(e) {
              this.onError(e.target.response); // TODO - Retries for initial upload
            };

            MediaUploader.prototype.buildQuery_ = function(params) {
              params = params || {};
              return Object.keys(params).map(function(key) {
                return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
              }).join('&');
            };

            MediaUploader.prototype.buildUrl_ = function(id, params, baseUrl) {
              var url = baseUrl || DRIVE_UPLOAD_URL;
              if (id) {
                url += id;
              }
              var query = this.buildQuery_(params);
              if (query) {
                url += '?' + query;
              }
              return url;
            };
        </script>
		
		
<div  id="warning_div" style="padding:10px; position:fixed;z-index:103;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
<center><b> <?php echo $this->lang->line('really_Want_to_submit');?></b> <br><br>
<span id="processing"></span>

<a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;"><?php echo $this->lang->line('cancel');?></a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="javascript:submit_quiz();"   class="btn btn-info"  style="cursor:pointer;"><?php echo $this->lang->line('submit_quiz');?></a>



</center>
</div>