	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	
	<!-- custom css -->
	<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('js/jquery-linedtextarea.css');?>" rel="stylesheet">
	
	
	
	<script>
	
	var base_url="<?php echo base_url();?>";

	</script>
	
	<!-- jquery -->
	
	<script src="<?php echo base_url('js/jquery-linedtextarea.js');?>"> </script>
	
	<!-- custom javascript -->
	<script src="<?php echo base_url('js/basic.js');?>"> </script>
		
	
	
	<!-- bootstrap js  (showing error) -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"> </script>
	
	
	
	
	
<script>function disableselect(e) {
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
}</script>


<script>
$(function() {
	$(".lined").linedtextarea(
		{selectedLine: 1}
	);
});
</script>
<style>
 td{
		font-size:14px;
		padding:4px;
	}

	   .runbtn {
		background: #3a559f;
		border: unset;
		padding: 6px 24px 6px 24px;
		color: #fff;
		border-radius: 4px;
	}
    
    .runbtn:hover {
        background: #0d2f84;
    }
    
    .tab-content {
        padding-top: 30px;
    }
	.nav.nav-tabs li a:focus
	{
		outline:unset;
	}
	.eheight
	{
		height:290px;
	}
	
	.timeleft{
		    font-weight: bold;
    font-size: 18px;
    float: right;
    text-align: center;
    background: blueviolet;
    width: 186px;
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
		    margin-left: 10px !important;
    padding: 20px !important;
    padding-left: 6% !important;
    	
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
alert('Only 5 minutes more to complete');
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




<div class="save_answer_signal" id="save_answer_signal2"></div>
<div class="save_answer_signal" id="save_answer_signal1"></div>

<div class="timeleft"  >

	<b>Time left:</b> <span id='timer'>
	<script type="text/javascript"> window.onload = CreateTimer("timer", <?php echo $seconds;?>); </script>
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
 <div class="col-md-12">
 <div class="col-md-7">
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
		<?php if($question['description'] !=""){
			?>
			<p class="label" style="padding: 1%;background:tomato;border-radius: 0px;font-size: 12px;"><b>Description:</b> <?php  echo $question['description'];?></p>
		<br/>
		<br/>
	 <?php	}

		
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
		
		<?php echo $abc[$i];?>) <input type="radio" name="answer[<?php echo $qk;?>][]"  id="answer_value<?php echo $qk.'-'.$i;?>" value="<?php echo $option['oid'];?>" <?php if(in_array($option['oid'],$save_ans)) { echo 'checked'; } ?>> <?php echo $option['q_option'];?> 
		
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
			 <?php
			 ?>
			 
		<div class="op"> 
		<?php echo $this->lang->line('answer');?> 
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
			 <?php
			 ?>
			 
		<div class="op"> 
		<?php echo $this->lang->line('answer');?> <br>
		<?php echo $this->lang->line('word_counts');?> <span id="char_count<?php echo $qk;?>">0</span>
		<textarea name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk;?>" style="width:100%;height:100%;" onKeyup="count_char(this.value,'char_count<?php echo $qk;?>');"><?php echo $save_ans;?></textarea>
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


<b> <?php echo $this->lang->line('questions');?></b>
	<div>
		<?php 
		for($j=0; $j < $quiz['noq']; $j++ )
		{
			?>
			
			<div class="qbtn" onClick="javascript:show_question('<?php echo $j;?>');" id="qbtn<?php echo $j;?>" > <?php echo ($j+1);?> </div>
			
			<?php 
		}
		
		?>
<div style="clear:both;"></div>

	</div>
	
	
	<br>
	<hr>
	<br>
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












 </div>
 
 <div class="col-md-5" style="padding-bottom:0 0 80px 0;">
<form method="post" action="">
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
   
  <!--  <br>  -->
  
  
  
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
</form>
</div>
</div>







  <!--<div class="col-md-6" style="padding:0 0 80px 0;">

  
 ques button div
  
 </div>-->
 
 
 </div>
  
 



</div>



<div class="footer_buttons" style="margin-left: 10px;">
	<button class="btn btn-warning"   onClick="javascript:review_later();" style="margin-top:2px;" ><?php echo $this->lang->line('review_later');?></button>
	
	<button class="btn btn-info"  onClick="javascript:clear_response();"  style="margin-top:2px;"  ><?php echo $this->lang->line('clear');?></button>

	<button class="btn btn-success"  id="backbtn" style="visibility:hidden;" onClick="javascript:show_back_question();"  style="margin-top:2px;" ><?php echo $this->lang->line('back');?></button>
	
	<button class="btn btn-success" id="nextbtn" onClick="javascript:show_next_question();" style="margin-top:2px;" ><?php echo $this->lang->line('save_next');?></button>
	
	<button class="btn btn-danger"  onClick="javascript:cancelmove();" style="margin-top:2px;" ><?php echo $this->lang->line('submit_quiz');?></button>
</div>

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

           var code = $('#code').val();
            var select_lang = $('#select_lang').val();


  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/quiz/ffff",
  data: {keyinput:input,keycode:code,select_lang:select_lang,quiz_id:<?php echo $this->session->userdata('rid');?>}, 
   beforeSend: function(){
        $("#code").css("background","#FFF url(<?php echo base_url();?>images/LoaderIcon.gif) no-repeat 165px");
        },
  success: function (response1) {
//	 alert(response1);
//$('#output').html(response1);
   $("#code").css("background","#FFF");
 ajax_compiler1();
  }
  });
 
}

function ajax_compiler1()
{
	// alert("Confirm to submit");
	
  $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url();?>index.php/quiz/get_web_page",
  data: {keyinput:""}, 
 beforeSend: function(){
        $("#code").css("background","#FFF url(<?php echo base_url();?>images/LoaderIcon.gif) no-repeat 165px");
        },
  success: function (response) {
	   $("#code").css("background","#FFF");
	   $("#code1").removeClass("active");
	   $("#result1").addClass("in active");
	   $('.nav-tabs li.active').removeClass('active');
	    $("li.start").addClass("active");
// alert(response);
$('#output').html(response);

  }
  });
	
	}

</script>
 
 
 <script>
 
 $('#select_lang').change(function(){
	 

	 var c2 = $(this).val();

	 
	 $.ajax({
	  
  type: 'POST',
  url: "<?php echo base_url(); ?>index.php/quiz/sel_syntax",
 // data: {
  // data:+c2
 // },
  
    data: {keyword:c2},
  
  
  // data:'keyword='+c2,
   
   
  success: function (response) {

document.getElementById("code").value = response;

  }
  
  
  });
 
  
	 
	 
});
 
 
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
 
 
<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
<center><b> <?php echo $this->lang->line('really_Want_to_submit');?></b> <br><br>
<span id="processing"></span>

<a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;"><?php echo $this->lang->line('cancel');?></a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="javascript:submit_quiz();"   class="btn btn-info"  style="cursor:pointer;"><?php echo $this->lang->line('submit_quiz');?></a>

</center>
</div>